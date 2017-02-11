<?php

namespace LifeSat\PageManager;

use Orchestra\Control\Command\Synchronizer;
use Orchestra\Control\Listeners\Timezone\OnShowAccount;
use Orchestra\Control\Listeners\Timezone\OnUpdateAccount;
use Orchestra\Foundation\Support\Providers\ModuleServiceProvider;
use Orchestra\Control\Listeners\Configuration\OnUpdateConfiguration;
use Orchestra\Control\Contracts\Command\Synchronizer as SynchronizerContract;

class PageManagerServiceProvider extends ModuleServiceProvider
{
    /**
     * The application or extension namespace.
     *
     * @var string|null
     */
    protected $namespace = 'LifeSat\PageManager\Http\Controllers';
    /**
     * The event handler mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'orchestra.saved: extension.orchestra/control' => [OnUpdateConfiguration::class],

        'orchestra.form: user.account'  => [OnShowAccount::class],
        'orchestra.saved: user.account' => [OnUpdateAccount::class],
    ];


    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(SynchronizerContract::class, Synchronizer::class);

    }

    /**
     * Boot extension components.
     *
     * @return void
     */
    protected function bootExtensionComponents()
    {
        $path = realpath(__DIR__.'/../resources');

        $this->addConfigComponent('lifesat/pagemanager', 'lifesat/pagemanager', "{$path}/config");
        $this->addLanguageComponent('lifesat/pagemanager', 'lifesat/pagemanager', "{$path}/lang");
        $this->addViewComponent('lifesat/pagemanager', 'lifesat/pagemanager', "{$path}/views");

        $this->loadMigrationsFrom([
            "{$path}/database/migrations",
        ]);
    }

    /**
     * Boot extension routing.
     *
     * @return void
     */
    protected function loadRoutes()
    {
        $path = realpath(__DIR__);

        $this->loadBackendRoutesFrom("{$path}/Http/backend.php");
    }
}
