<?php

namespace Modules\Blog\Http\Controllers\Frontend;

use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Blog\Entities\Article;
use Modules\Blog\Entities\Category;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $category = Category::where('id', 4)->first();
//        dd($category->url);
        return view('blog::index');
    }

    /**
     * Show the specified resource.
     * @param object $article
     * @return Response
     */
    public function show(Category $category, Article $article)
    {
        dd($category, $article->exists);
        return view('blog::show');
    }

}
