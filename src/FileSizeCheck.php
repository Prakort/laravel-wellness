<?php

namespace prakort\LaravelWellness;

use Illuminate\Support\Facades\Storage;
use Spatie\Health\Checks\Check;
use Spatie\Health\Checks\Result;

class FileSizeCheck extends Check
{
    public ?string $disk = null;
    public string $directory = ''; // Directory to scan for files (e.g., 'uploads/')
    public int $warningThreshold = 50; // MB
    public int $errorThreshold = 100;  // MB

    public array $fileTypes = [];

    public function disk(string $disk): self
    {
        $this->disk = $disk;

        return $this;
    }

    public function directory(string $directory): self
    {
        $this->directory = $directory;

        return $this;
    }

    public function warningThreshold(int $sizeInMB): self
    {
        $this->warningThreshold = $sizeInMB;

        return $this;
    }

    public function errorThreshold(int $sizeInMB): self
    {
        $this->errorThreshold = $sizeInMB;

        return $this;
    }

    public function fileTypes(array $fileTypes): self {

        $this->fileTypes = $fileTypes;

        return $this;
    }

    public function run(): Result
    {
        if (!$this->disk || !$this->directory) {
            return Result::make()->failed('Disk or directory not specified.');
        }

        $result = Result::make()->ok();
        $files = [];

        try {
            // Get all files in the specified directory
            $files = Storage::disk($this->disk)->allFiles($this->directory);

            // Iterate through all files and check their size
            foreach ($files as $file) {

                $type = Storage::mimeType($file);

                if (count($this->fileTypes) > 0 && !(in_array($type, $this->fileTypes))) {
                    continue;
                }   

                $fileSize = Storage::disk($this->disk)->size($file);
                $fileSizeMB = $fileSize / 1024 / 1024; // Convert size from bytes to MB
             
                // If the file exceeds the error threshold, fail the check
                if ($fileSizeMB > $this->errorThreshold) {
                    return Result::make()
                        ->failed("File '{$file}' exceeds the error threshold ({$this->errorThreshold} MB).")
                        ->meta(['file' => $file, 'size_mb' => round($fileSizeMB, 2)]);
                }
           
                // If the file exceeds the warning threshold, return a warning
                if ($fileSizeMB > $this->warningThreshold) {
                    $result->warning("File '{$file}' exceeds the warning threshold ({$this->warningThreshold} MB).")
                        ->meta(['file' => $file, 'size_mb' => round($fileSizeMB, 2)]);
                }
            }

        } catch (\Exception $e) {
            return $result->failed("Failed to retrieve file sizes: " . $e->getMessage());
        }

        return $result->ok();
    }
}
