<?php

namespace Otisz\EloquentFilter\Console;

use Illuminate\Console\GeneratorCommand;

class CreateFilterCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:filter {name : The name of the filter}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new query filter class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Filters';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__.'/../../resources/stubs/filter.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     *
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace): string
    {
        return $rootNamespace.'\Filters';
    }
}
