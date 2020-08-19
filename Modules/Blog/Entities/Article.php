<?php

namespace Modules\Blog\Entities;

use Modules\Cms\Entities\CmsModel;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;
use Modules\Cms\Traits\CmsTrait;

class Article extends CmsModel implements HasMedia
{
    use HasMediaTrait,
        SoftDeletes,
        Sluggable,
        CmsTrait;

    protected $fillable = [
        'domain_id',
        'title',
        'slug',
        'ordering',
        'author_id',
        'introduction',
        'content',
        'active',
        'published',
        'published_at',
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(Admin::class);
    }

}
