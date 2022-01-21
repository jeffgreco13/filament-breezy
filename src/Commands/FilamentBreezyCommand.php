<?php

namespace JeffGreco13\FilamentBreezy\Commands;

use Illuminate\Console\Command;

class FilamentBreezyCommand extends Command
{
    public $signature = 'filament-breezy';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
