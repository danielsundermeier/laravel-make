<?php

namespace D15r\MakeCommands\Console\Commands;

use Illuminate\Foundation\Console\ModelMakeCommand as Command;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputOption;

class ModelMakeCommand extends Command
{
    /**
     * @inheritDoc
     */
    public function handle()
    {
        parent::handle();

        $this->createTest();
        $this->createPolicy();
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
            'name' => 'Models\\' . $name  . 'Test',
            '--unit' => true,
        ]);
    }

    /**
     * Create a test for the model.
     *
     * @return void
     */
    protected function createPolicy()
    {
        $name = Str::studly($this->argument('name'));

        $this->call('make:policy', [
            'name' => $name  . 'Policy',
            '--model' => 'Models\\' . $name,
        ]);
    }

    /**
     * Create a controller for the model.
     *
     * @return void
     */
    protected function createController()
    {
        $controller = Str::studly($this->argument('name'));

        $modelName = $this->qualifyClass($this->getNameInput());

        $this->call('make:controller', array_filter([
            'name'  => "{$controller}Controller",
            '--model' => $this->option('resource') || $this->option('api') ? $modelName : null,
            '--api' => $this->option('api'),
            '--parent' => $this->option('parent'),
        ]));
    }

    /**
     * @inheritDoc
     */
    protected function getOptions()
    {
        return [
            ...parent::getOptions(),
            ['parent', null, InputOption::VALUE_OPTIONAL, 'Parent for the model'],
        ];
    }

}