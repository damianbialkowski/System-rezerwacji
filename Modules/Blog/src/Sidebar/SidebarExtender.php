<?php

namespace Modules\Blog\src\Sidebar;

use Modules\Admin\src\Sidebar\AbstractAdminSidebar;
use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Bouncer;
use Modules\Blog\Entities\Article;
use Modules\Blog\Entities\Category;

class SidebarExtender extends AbstractAdminSidebar
{
    public function extendWith(Menu $menu): object
    {
        $canArticle = Bouncer::can('index', Article::class);
        $canCategory = Bouncer::can('index', Category::class);
        if ($canArticle || $canCategory) {
            $menu->group($this->getModuleName(), function (Group $group) use ($canArticle, $canCategory) {
                $group->item('Blog', function (Item $item) use ($canArticle, $canCategory) {
                    $item->icon('fa fa-cog');
                    if ($canArticle) {
                        $item->item('Articles', function (Item $item) {
                            $item->route($this->adminRoute('blog.articles.index'));
                            $item->icon('');
                        });
                    }
                    if ($canCategory) {
                        $item->item('Categories', function (Item $item) {
                            $item->route($this->adminRoute('blog.categories.index'));
                            $item->icon('');
                        });
                    }
                });
            });
        }
        return $menu;
    }

}
