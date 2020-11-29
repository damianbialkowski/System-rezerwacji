<?php

namespace Modules\Blog\Events\Sidebar;

use Modules\Admin\src\Sidebar\AbstractAdminSidebar;
use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;

class SidebarExtender extends AbstractAdminSidebar
{
    public function extendWith(Menu $menu)
    {
        $menu->group($this->getModuleName(), function (Group $group) {
            $group->item('Blog', function (Item $item) {
                $item->icon('fa fa-newspaper');

                $item->item('Articles', function (Item $item) {
                    $item->icon('fa fa-list');
                    $item->route('blog.articles.index');
                });
            });
        });

        return $menu;
    }

}
