<?php

namespace RalphJSmit\TallInstall\Commands;

use Illuminate\Console\Command;

class TallInstallCommand extends Command
{
    public $signature = 'tall-install';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
