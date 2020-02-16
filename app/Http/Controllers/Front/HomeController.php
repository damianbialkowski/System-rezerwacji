<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Article;
use App\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application home.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        $categories = Category::get();
        $last_articles = Article::latest()->where('visible',1)->take(3)->get();
          
        return view('pages.main',['last_articles' => $last_articles,'categories' => $categories]);

        
    }
}
