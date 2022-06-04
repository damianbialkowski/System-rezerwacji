<?php

namespace Modules\Booking\src\Sidebar;

use Modules\Admin\src\Sidebar\AbstractAdminSidebar;
use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Bouncer;
use Modules\Booking\Entities\Attribute;
use Modules\Booking\Entities\City;
use Modules\Booking\Entities\Hotel;
use Modules\Booking\Entities\Reservation;
use Modules\Booking\Entities\Room;

class SidebarExtender extends AbstractAdminSidebar
{
    public function extendWith(Menu $menu): object
    {
        $permissions = [
            'canHotel' => Bouncer::can('index', Hotel::class),
            'canRoom' => Bouncer::can('index', Room::class),
            'canCity' => Bouncer::can('index', City::class),
            'canAttribute' => Bouncer::can('index', Attribute::class),
            'canReservation' => Bouncer::can('index', Reservation::class),
        ];

        if ($this->hasAnyPermissions($permissions)) {
            $menu->group(
                trans('booking::module.name'),
                function (Group $group) use ($permissions) {
                    $group->item(
                        trans('booking::sidebar.module_name'),
                        function (Item $item) use ($permissions) {
                            $item->icon('fa fa-book');
                            if ($permissions['canHotel']) {
                                $item->item(trans('booking::sidebar.hotels'), function (Item $item) {
                                    $item->route($this->adminRoute('booking.hotels.index'));
                                    $item->icon('');
                                });
                            }
                            if ($permissions['canCity']) {
                                $item->item(trans('booking::sidebar.cities'), function (Item $item) {
                                    $item->route($this->adminRoute('booking.cities.index'));
                                    $item->icon('');
                                });
                            }
                            if ($permissions['canAttribute']) {
                                $item->item(trans('booking::sidebar.attributes'), function (Item $item) {
                                    $item->route($this->adminRoute('booking.attributes.index'));
                                    $item->icon('');
                                });
                            }
                            if ($permissions['canReservation']) {
                                $item->item(trans('booking::sidebar.reservations'), function (Item $item) {
                                    $item->route($this->adminRoute('booking.reservations.index'));
                                    $item->icon('');
                                });
                            }
                        }
                    );
                }
            );
        }
        return $menu;
    }
}
