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
        'promoted',
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

    public function attributeValues()
    {
        $attributeIds = \DB::table('room_attribute_value')
        ->where('room_id', $this->id)
        ->distinct()
        ->select('attribute_id')
        ->get()
        ->pluck('attribute_id')->toArray();
        $valuesIds = \DB::table('room_attribute_value')
            ->where('room_id', $this->id)
            ->distinct()
            ->select('attribute_value_id')
            ->get()
            ->pluck('attribute_value_id')->toArray();
        return Attribute::with(['values' => function ($q) use ($valuesIds) {
            $q->whereIn('id', $valuesIds);
        }])->whereHas('values',  function ($q) use ($valuesIds) {
            return $q->whereIn('id', $valuesIds);
        })->whereIn('id', $attributeIds);
    }
}
