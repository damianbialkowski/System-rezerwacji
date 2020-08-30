<?php


namespace Modules\Admin\src\Sidebar;

use Maatwebsite\Sidebar\Sidebar;
use Maatwebsite\Sidebar\Menu;

class AdminSidebar implements Sidebar
{
    /**
     * @var Menu
     */
    protected $menu;

    /**
     * @param Menu $menu
     */
    public function __construct(Menu $menu)
    {
        $this->menu = $menu;
    }

    public function build()
    {
        $extender = new \Modules\Admin\Events\Sidebar\SidebarExtender;
//        dd($extender);

        $this->menu->add(
            $extender->extendWith($this->menu)
        );

    }

    public function getMenu()
    {
        $this->build();
        return $this->menu;
    }
}
