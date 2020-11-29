<?php

namespace Modules\Admin\Events\Sidebar;

use Modules\Admin\src\Sidebar\AbstractAdminSidebar;
use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;

class SidebarExtender extends AbstractAdminSidebar
{
    public function extendWith(Menu $menu)
    {
        $menu->group($this->getModuleName(), function (Group $group) {
            $group->item('Admins', function (Item $item) {
                $item->icon('fa fa-user');

                $item->item('Admin', function (Item $item) {
                    $item->route('admin.admins.index');
                    $item->icon('');
                });
                $item->item('Roles', function (Item $item) {
                    $item->route('admin.roles.index');
                    $item->icon('');
                });
            });
        });

        return $menu;
    }

}
