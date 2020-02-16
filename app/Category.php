<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Article;

class Category extends Model
{
    protected $table = 'category';

    public function author()
    {
        return $this->belongsTo('App\User','created_by','id')->first();
    }

    public function categoryName($id)
    {
        return $this->where('id',$id)->pluck('name')->toArray();
    }

    public function articles()
    {
        return $this->hasMany('App\Article');
    }

    public function getCategoryArticles()
    {
        // dd($category_id);
        return $this->articles()->where('visible',1)->orderBy('created_at','desc');
        // return $this->article()->where('category_id',$category_id);
    }
}
