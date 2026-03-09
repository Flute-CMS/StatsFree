<?php

namespace Flute\Modules\StatsFree\Providers;

use Flute\Admin\Packages\Server\Factories\ModDriverFactory;
use Flute\Core\Support\ModuleServiceProvider;
use Flute\Core\ModulesManager\ModuleActions;
use Flute\Core\ModulesManager\ModuleManager;
use Flute\Modules\StatsFree\Admin\Drivers\LRModDriver;

class StatsFreeProvider extends ModuleServiceProvider
{
    public array $extensions = [];

    public function boot(\DI\Container $container) : void
    {
        // If paid stats exists, we disable free stats
        if(file_exists(path('app/Modules/Stats'))) {
            $statsModule = app(ModuleManager::class)->getModule('Stats');

            if($statsModule->status == ModuleManager::ACTIVE) {
                app(ModuleActions::class)->disableModule($statsModule);
                logs()->info('Stats module disabled because StatsFree module is installed');
                return;
            }
        }

        $this->bootstrapModule();

        $this->loadViews('Resources/views', 'module-statsfree');
        $this->loadScss('Resources/assets/sass/stats.scss');

        $modDriverFactory = $container->get(ModDriverFactory::class);
        $modDriverFactory->register('LR', LRModDriver::class);
    }

    public function register(\DI\Container $container) : void {}
} 