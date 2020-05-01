<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Article extends Model implements HasMedia
{
    use HasMediaTrait;
    use SoftDeletes;

    protected $table = 'articles';
    protected $fillable = ['title', 'introduction', 'content', 'slug'];
    protected $dates = ['deleted_at'];

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
        return url('/article/' . $this->id . ',' . $this->slug);
    }

    public function myArticles()
    {
        return $this->where('created_by', \Auth::user()->id)->get();
    }
}
