<?php

namespace Modules\Booking\Entities;

use Modules\Cms\Entities\CmsModel;
use Modules\Cms\Entities\CmsUser;
use Modules\Cms\Scopes\JsonActiveScope;

class Reservation extends CmsModel
{
    protected $fillable = [
        'cms_user_id',
        'room_id',
        'date_from',
        'date_to',
        'total_price',
        'cancelled_at',
    ];

    protected $dates = [
        'cancelled_at'
    ];

    protected static function boot()
    {
        parent::boot();
        unset(static::$globalScopes[static::class][JsonActiveScope::class]);
    }

    public function user()
    {
        return $this->belongsTo(CmsUser::class, 'cms_user_id', 'id');
    }

    public function room()
    {
        return $this->hasOne(Room::class, 'id', 'room_id');
    }

    public function getRoomAttribute()
    {
        return $this->room()->first();
    }
}
