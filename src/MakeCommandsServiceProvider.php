<?php

namespace D15r\MakeCommands;

use D15r\MakeCommands\Console\Commands\ControllerMakeCommand;
use D15r\MakeCommands\Console\Commands\InstallMakeCommandsPackageCommand;
use D15r\MakeCommands\Console\Commands\ModelMakeCommand;
use D15r\MakeCommands\Console\Commands\ViewMakeCommand;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class MakeCommandsServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                ControllerMakeCommand::class,
                InstallMakeCommandsPackageCommand::class,
                ModelMakeCommand::class,
                ViewMakeCommand::class,
            ]);
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        //
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            ModelMakeCommand::class,
            ControllerMakeCommand::class,
            InstallMakeCommandsPackageCommand::class,
            ViewMakeCommand::class,
        ];
    }
}
