<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Article;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $articles = Article::where('title','LIKE','%'.$request->search.'%')
                ->paginate(10);
        return view('pages.search',['articles' => $articles,'phrase' => $request->search]);
    }
}
