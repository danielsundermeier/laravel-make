<?php

namespace D15r\MakeCommands\Tests\Feature;

use D15r\MakeCommands\Tests\TestCase;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

class ExampleTest extends TestCase
{
    /**
     * @test
     */
    public function it_makes_a_model_and_a_test()
    {
        // if (File::exists(config_path('blogpackage.php'))) {
        //     unlink(config_path('blogpackage.php'));
        // }

        Artisan::call('make:model D15rModel');
    }
}
