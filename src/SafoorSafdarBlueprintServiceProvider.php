<?php

namespace SafoorSafdar\Blueprint;

use Illuminate\Support\ServiceProvider;
use SafoorSafdar\Blueprint\Command\DocsCommand;

class SafoorSafdarBlueprintServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    public function boot()
    {

    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerDocsCommand();
    }

    /**
     * Register the documentation command.
     *
     * @return void
     */
    protected function registerDocsCommand()
    {
        $this->app->singleton(DocsCommand::class,
            function ($app) {
                return new DocsCommand(
                    $app['Dingo\Blueprint\Blueprint'],
                    $app['Dingo\Blueprint\Writer'],
                    'Blueprint',
                    'v1'
                );
            });
        $this->commands([DocsCommand::class]);
    }
}