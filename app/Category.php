<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Spatie\Translatable\HasTranslations;
use Kalnoy\Nestedset\NodeTrait;
use App\Article;

class Category extends Model
{
    use SoftDeletes, HasTranslations;
    use Sluggable, NodeTrait {
        NodeTrait::replicate as replicateNode;
        Sluggable::replicate as replicateSlug;
    }

    protected $table = 'categories';
    protected $fillable = [
        'parent_id',
        'lft',
        'rgt',
        'depth',
        'name',
        'slug',
        'description',
        'active'
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

    public function author()
    {
        return $this->belongsTo('App\User', 'created_by', 'id')->first();
    }

    public function categoryName($id)
    {
        return $this->where('id', $id)->pluck('name')->toArray();
    }

    public function articles()
    {
        return $this->hasMany('App\Article');
    }

    public function getCategoryArticles()
    {
        // dd($category_id);
        return $this->articles()->where('visible', 1)->orderBy('created_at', 'desc');
        // return $this->articles()->where('category_id',$category_id);
    }

    public function getUrlAttribute()
    {
        return url('/categories/' . $this->id . ',' . $this->slug);
    }
}
