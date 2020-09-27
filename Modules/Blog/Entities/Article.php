<?php

namespace Modules\Blog\Entities;

use Modules\Cms\Entities\CmsModel;

class Article extends CmsModel
{
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

    protected $dates = [
        'published_at',
        'created_at',
        'deleted_at',
    ];

    protected $with = [
        'categories',
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
