<?php

namespace Modules\Booking\Entities;

use Modules\Cms\Entities\CmsModel;
use Modules\Cms\src\VisitorManager\Traits\InteractsWithVisitors;

class Room extends CmsModel
{
    use InteractsWithVisitors;

    protected $fillable = [
        'hotel_id',
        'name',
        'slug',
        'short_content',
        'content',
        'active',
        'cost',
        'quantity_places'
    ];

    public function hotel(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Hotel::class, 'hotel_id');
    }

    public function getHotelAttribute()
    {
        return $this->hotel()->first();
    }

    public function opinions()
    {
        return Opinion::where('entity_id', $this->id)->where('entity_type', get_class($this));
    }
}
