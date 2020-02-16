<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Category;
use App\User;
use App\Settings;
use Auth;

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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::get();
        $last_articles = Article::latest()->where('visible',1)->take(3)->get(['id','title','category_id','slug','created_at']);
        $user = null;
        if(Auth::check()){
            $user = Auth::user();
        }
        
        return view('pages.main',['last_articles' => $last_articles,'categories' => $categories,'user' => $user]);

        
    }
}
