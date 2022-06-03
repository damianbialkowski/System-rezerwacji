<?php

namespace Modules\Booking\Entities;

use Modules\Cms\Entities\CmsModel;
use Modules\Cms\src\VisitorManager\Traits\InteractsWithVisitors;

class Hotel extends CmsModel
{
    use InteractsWithVisitors;

    protected $fillable = [
        'city_id',
        'name',
        'slug',
        'short_content',
        'content',
        'active',
    ];

    public function city(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function rooms(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Room::class, 'hotel_id', 'id');
    }

    public function hasRooms(): bool
    {
        return $this->rooms()->exists();
    }
}
