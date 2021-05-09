<?php

namespace Modules\Blog\Entities;

use Modules\Cms\Entities\CmsNestedModel;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\Services\SlugService;

class Category extends CmsNestedModel
{
//    use NodeTrait {
//        NodeTrait::replicate as replicateNode;
//        Sluggable::replicate as replicateSlug;
//    }

    protected $fillable = [
        '_lft',
        '_rgt',
        'parent_id',
        'name',
        'slug',
        'description',
        'active',
        'params',
        'updated_by',
        'created_by'
    ];

    protected $casts = [
        'name' => 'json',
        'slug' => 'json',
        'description' => 'json',
    ];

//    public function replicate(array $except = null)
//    {
//        $instance = $this->replicateNode($except);
//        (new SlugService())->slug($instance, true);
//
//        return $instance;
//    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
