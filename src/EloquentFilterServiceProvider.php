<?php

namespace Otisz\EloquentFilter;

use Illuminate\Support\ServiceProvider;
use Otisz\EloquentFilter\Console\CreateFilterCommand;

class EloquentFilterServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands(CreateFilterCommand::class);
        }
    }
}
