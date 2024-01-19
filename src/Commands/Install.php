<?php

namespace Jeffgreco13\FilamentBreezy\Commands;

use Illuminate\Console\Command;

class Install extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'breezy:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install script for Breezy.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->line('***************************');
        $this->line('*     FILAMENT BREEZY     *');
        $this->line('***************************');
        $this->newLine(2);
        if ($this->confirm('Do you want to enable Two Factor Authentication? (This will publish a new migration)', true)) {
            $this->callSilent('vendor:publish', [
                '--tag' => 'filament-breezy-migrations',
            ]);
            if ($this->confirm('Do you want to run migrations now?', true)) {
                $this->call('migrate');
                $this->info('You may now enable 2FA by appending ->enableTwoFactorAuthentication() to BreezyCore::make(). See the docs for more info.');
            } else {
                $this->warn('You must run migrations before using Breezy.');
            }
        }
        $this->newLine();
        if ($this->confirm('All done! Would you like to show some love by starring the Breezy on GitHub?', true)) {
            if (PHP_OS_FAMILY === 'Darwin') {
                exec('open https://github.com/jeffgreco13/filament-breezy');
            }
            if (PHP_OS_FAMILY === 'Linux') {
                exec('xdg-open https://github.com/jeffgreco13/filament-breezy');
            }
            if (PHP_OS_FAMILY === 'Windows') {
                exec('start https://github.com/jeffgreco13/filament-breezy');
            }

            $this->components->info('Thank you!');
        }

        return static::SUCCESS;
    }
}
