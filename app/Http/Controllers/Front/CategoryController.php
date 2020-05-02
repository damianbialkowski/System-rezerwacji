<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::where('id',$id)->first();
        if($category){
            $items = $category->getCategoryArticles()->paginate(10);
            return view('pages.categories',['categories' => $category,'items' => $items]);
        }
        return abort(404);

    }

}
