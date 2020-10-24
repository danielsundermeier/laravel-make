<?php

namespace D15r\MakeCommands\Console\Commands;

use Illuminate\Routing\Console\ControllerMakeCommand as Command;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputOption;

class ControllerMakeCommand extends Command
{
    /**
     * @inheritDoc
     */
    public function handle()
    {
        parent::handle();

        $this->createTest();
        $this->createViews();
    }

    /**
     * Create a test for the model.
     *
     * @return void
     */
    protected function createTest()
    {
        $name = Str::studly($this->argument('name'));

        $this->call('make:test', [
            'name' => 'Controllers\\' . $name  . 'Test',
            '--unit' => false,
        ]);
    }

    protected function createViews()
    {
        if ($this->option('model')) {
            $name = $this->getViewPath($this->option('model'));

            $this->call('make:view', ['name' => $name . '/index']);
            $this->call('make:view', ['name' => $name . '/show']);
            $this->call('make:view', ['name' => $name . '/edit']);
        }
    }

    protected function getViewPath(string $model_name) : string {

        $model_name = str_replace('Models\\', '', $model_name);
        $model_name = ltrim($model_name, 'App\\');

        $parts = explode('\\', $model_name);
        // foreach ($parts as $key => $part) {
        //     $parts[$key] = Str::singular($part);
        // }
        $parts = array_unique($parts);
        $parts = array_slice($parts, 0, -1);

        return strtolower(implode('/', $parts)) . '/';

    }

}