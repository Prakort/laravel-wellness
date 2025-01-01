<?php

namespace Tests\Unit;

use Spatie\Health\Enums\Status;
use Illuminate\Support\Facades\Storage;
use prakort\LaravelWellness\FileSizeCheck;
use prakort\LaravelWellness\Tests\TestCase;

class FileSizeCheckTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        // Fake the disk for testing
        Storage::fake('local');

        // Create test files with known sizes (e.g., 1 MB, 6 MB)
        Storage::disk('local')->put('uploads/file1.txt', str_repeat('A', 1 * 1024 * 1024)); // 1 MB
        Storage::disk('local')->put('uploads/file2.txt', str_repeat('A', 6 * 1024 * 1024)); // 6 MB
    }

    public function test_it_checks_file_sizes()
    {
        $fileSizeCheck = (new FileSizeCheck())
            ->disk('local')
            ->directory('uploads')
            ->warningThreshold(5)  // Set warning threshold to 5 MB
            ->errorThreshold(10);  // Set error threshold to 10 MB

        $result = $fileSizeCheck->run();
 
        $this->assertEquals(Status::ok(), $result->status);
    }

    public function test_it_fails_when_file_exceeds_error_threshold()
    {
        // Create a file that exceeds the error threshold
        Storage::disk('local')->put('uploads/large-file.txt', str_repeat('A', 12 * 1024 * 1024)); // 12 MB

        $fileSizeCheck = (new FileSizeCheck())
            ->disk('local')
            ->directory('uploads')
            ->warningThreshold(5)  // Set warning threshold to 5 MB
            ->errorThreshold(10);  // Set error threshold to 10 MB

        $result = $fileSizeCheck->run();

        $this->assertEquals(Status::failed(), $result->status);
        $this->assertStringContainsString('File \'uploads/large-file.txt\' exceeds the error threshold (10 MB).', $result->notificationMessage);
    }
}
