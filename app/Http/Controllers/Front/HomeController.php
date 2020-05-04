<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Article;
use App\Category;

class HomeController extends Controller
{

    /**
     * Show the application home.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        $categories = Category::get();
        $last_articles = Article::latest()->where('active',1)->take(3)->get();

        return view('pages.home',['last_articles' => $last_articles,'categories' => $categories]);

    }
}
