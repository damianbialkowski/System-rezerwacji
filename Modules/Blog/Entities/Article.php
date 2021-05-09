<?php

namespace Modules\Blog\Entities;

use Modules\Cms\Entities\CmsModel;

class Article extends CmsModel
{
    protected $fillable = [
        'domain_id',
        'name',
        'slug',
        'author_id',
        'introduction',
        'content',
        'active',
        'published',
        'published_at',
        'created_by',
        'updated_by'
    ];

    protected $dates = [
        'published_at',
        'created_at',
        'deleted_at',
    ];

    protected $casts = [
        'name' => 'json',
        'slug' => 'json',
        'introduction' => 'json',
        'content' => 'json'
    ];

    public $translatable = [
        'name',
        'slug',
        'introduction',
        'content'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(Admin::class);
    }

}
