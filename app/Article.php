<?php

namespace App;

use App\TranslatableModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\Auth;

class Article extends TranslatableModel implements HasMedia
{
    use HasMediaTrait, SoftDeletes;

    protected $table = 'articles';
    protected $fillable = [
        'category_id',
        'active',
        'title',
        'slug',
        'introduction',
        'content',
    ];

    public $translatable = ['title', 'slug', 'introduction', 'content'];

    protected $dates = ['deleted_at'];

    protected $casts = [
        'slug' => 'json',
    ];
//
//    public function sluggable()
//    {
//        return [
//            'slug' => [
//                'source' => 'title'
//            ]
//        ];
//    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->created_by = Auth::id();
            $model->updated_by = Auth::id();
//            dd($model);
        });
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        // todo - find better option
        $this->attributes['slug'] = json_encode([\App::getLocale() => str_slug($value)]);
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
