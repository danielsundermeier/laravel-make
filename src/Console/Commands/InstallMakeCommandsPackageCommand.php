<?php

namespace D15r\MakeCommands\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class InstallMakeCommandsPackageCommand extends Command
{
    protected $hidden = true;

    protected $signature = 'makecommands:install';

    protected $description = 'Install the MakeCommandsPackage';

    public function handle()
    {
        $this->info('Installing MakeCommandsPackage...');

        $this->info('Publishing stubs...');

        $this->publishStubs();

        $this->info('Installed MakeCommandsPackage');
    }

    protected function publishStubs() : void
    {
        if (! is_dir($stubs_path = $this->laravel->basePath('stubs'))) {
            (new Filesystem)->makeDirectory($stubs_path);
        }

        $source_path = __DIR__ . '/../../../stubs';

        $files = File::files($source_path);

        foreach ($files as $file) {
            file_put_contents($stubs_path . '/' . $file->getBasename(), file_get_contents($file->getPathname()));
        }

        $this->info('Stubs published successfully.');
    }
}
