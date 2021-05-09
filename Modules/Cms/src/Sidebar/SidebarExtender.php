<?php

namespace Modules\Cms\src\Sidebar;

use Modules\Admin\src\Sidebar\AbstractAdminSidebar;
use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Bouncer;
use Modules\Cms\Entities\Domain;

class SidebarExtender extends AbstractAdminSidebar
{
    public function extendWith(Menu $menu): object
    {
        $canDomain = Bouncer::can('index', Domain::class);
        if ($canDomain) {
            $menu->group($this->getModuleName(), function (Group $group) use ($canDomain) {
                $group->item('Cms', function (Item $item) use ($canDomain) {
                    $item->icon('fa fa-cog');
                    if ($canDomain) {
                        $item->item('Domains', function (Item $item) {
                            $item->route($this->adminRoute('cms.domains.index'));
                            $item->icon('');
                        });
                    }
                });
            });

        }
        return $menu;
    }

}
