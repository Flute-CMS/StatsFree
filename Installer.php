<?php

namespace Flute\Modules\StatsFree;

use Flute\Core\Database\Entities\NavbarItem;

class Installer extends \Flute\Core\Support\AbstractModuleInstaller
{
    public function install(\Flute\Core\ModulesManager\ModuleInformation &$module) : bool
    {
        $navbarItem = new NavbarItem();
        $navbarItem->title = 'Stats';
        $navbarItem->url = '/stats';
        $navbarItem->save();

        return true;
    }

    public function uninstall(\Flute\Core\ModulesManager\ModuleInformation &$module) : bool
    {
        return true;
    }
} 