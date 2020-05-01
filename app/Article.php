<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\Translatable\HasTranslations;
use Cviebrock\EloquentSluggable\Sluggable;

class Article extends Model implements HasMedia
{
    use HasMediaTrait, SoftDeletes, Sluggable, HasTranslations;

    protected $table = 'articles';
    protected $fillable = [
        'title',
        'introduction',
        'content',
        'slug'
    ];

    public $translatable = ['title', 'slug', 'content'];

    protected $dates = ['deleted_at'];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function author()
    {
        return $this->belongsTo('App\User', 'created_by', 'id')->first();
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function getUrlAttribute()
    {
        return url('/articles/' . $this->id . ',' . $this->slug);
    }

    public function myArticles()
    {
        return $this->where('created_by', \Auth::user()->id)->get();
    }
}
