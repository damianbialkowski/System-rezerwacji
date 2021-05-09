<?php

namespace Modules\Cms\Entities;

use Modules\Core\Entities\CoreModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;
use Modules\Cms\Traits\CmsTrait;
use Modules\Admin\Traits\OnlineModel;
use Modules\Core\Traits\Translatable;

class CmsModel extends CoreModel
{
    use SoftDeletes,
        Sluggable,
        CmsTrait,
        OnlineModel,
        Translatable;

    protected $dates = [
        'deleted_at',
        'created_at',
        'updated_at'
    ];

    public $translatable = [];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

}
