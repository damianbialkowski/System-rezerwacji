<?php

namespace Modules\Blog\Entities;

use Modules\Cms\Entities\CmsModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Kalnoy\Nestedset\NodeTrait;
use Modules\Cms\Traits\CmsTrait;

class Category extends CmsModel
{
    use SoftDeletes,
        CmsTrait,
        Sluggable,
        NodeTrait {
        NodeTrait::replicate as replicateNode;
        Sluggable::replicate as replicateSlug;
    }

    protected $fillable = [
        'parent_id',
        'lft',
        'rgt',
        'depth',
        'name',
        'slug',
        'description',
        'active',
        'updated_by',
        'created_by'
    ];

    public function replicate(array $except = null)
    {
        $instance = $this->replicateNode($except);
        (new SlugService())->slug($instance, true);

        return $instance;
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }
}
