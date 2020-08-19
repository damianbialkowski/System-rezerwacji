<?php

namespace Modules\Blog\Http\Controllers\Frontend;

use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Blog\Entities\Article;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        dd(2);
        return view('blog::index');
    }

    /**
     * Show the specified resource.
     * @param object $article
     * @return Response
     */
    public function show(Article $article)
    {
        dd($article);
        return view('blog::show');
    }

}
