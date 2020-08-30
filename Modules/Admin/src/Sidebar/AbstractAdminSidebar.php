<?php

namespace Modules\Admin\src\Sidebar;

use Maatwebsite\Sidebar\Menu;
use Maatwebsite\Sidebar\SidebarExtender;

abstract class AbstractAdminSidebar implements SidebarExtender
{
    abstract public function extendWith(Menu $menu);

    public function getModuleName()
    {
        return ucfirst(module_prefix());
    }
}
