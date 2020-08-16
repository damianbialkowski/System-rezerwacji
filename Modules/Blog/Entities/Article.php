<?php

namespace Modules\Blog\Entities;

use Modules\Cms\Entities\CmsModel;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Article extends CmsModel implements HasMedia
{
    use HasMediaTrait, SoftDeletes;

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

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

}
