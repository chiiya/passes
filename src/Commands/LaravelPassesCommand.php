<?php

namespace Chiiya\LaravelPasses\Commands;

use Illuminate\Console\Command;

class LaravelPassesCommand extends Command
{
    public $signature = 'laravel-passes';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
