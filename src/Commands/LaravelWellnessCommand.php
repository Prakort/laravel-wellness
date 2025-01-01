<?php

namespace prakort\LaravelWellness\Commands;

use Illuminate\Console\Command;

class LaravelWellnessCommand extends Command
{
    public $signature = 'laravel-wellness';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
