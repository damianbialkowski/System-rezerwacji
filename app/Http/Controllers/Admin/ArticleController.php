<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use App\Http\Controllers\Controller;
use App\Article;
use App\Category;
use DataTables;
use Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Article::latest()->get();
            // dd($data);
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                        $btn = '<div class="flex align-items-center justify-content-center flex-wrap">
                           <a href="'.url("/admin/article/show/".$row->id).'" class="btn-action-table" title="Podgląd"><i class="far fa-eye"></i></a>
                           <a href="'.url("/admin/article/edit/".$row->id).'" class="btn-action-table" title="Edycja"><i class="fas fa-pencil-alt"></i></a>
                           <a href="'.url("/admin/article/destroy/".$row->id).'" class="btn-action-table prevent" title="Usunięcie"><i class="fas fa-trash-alt"></i></a>
                       </div>';
                        return $btn;
                    })
                    ->editColumn('category_id',function($data){
                        return ($data->category_id) ? $data->category->categoryName($data->category_id) : 'brak';
                    })
                    ->editColumn('title', function($data){
                        return str_limit($data->title,35);
                    })
                    ->editColumn('introduction', function($data){
                        return str_limit($data->title,35);
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.pages.article.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        if($categories){
            return view('admin.pages.article.create',['categories' => $categories]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        // dd($request->file('image_article'));
        $article = new Article;
        $article->title = $request->get('title');
        $article->category_id = $request->get('category');
        $article->visible = ($request->get('visible') == 'on') ? 1 : 0;
        $article->slug = str_slug($request->get('title'),'-');
        $article->content = $request->get('content');
        $article->created_by = Auth::user()->id;
        $article->save();

        if($article && $request->hasFile('image_article') && $request->file('image_article')->isValid()){
            $article->addMediaFromRequest('image_article')->toMediaCollection('images');
        }
        
        if($request->redirect_article){
            return redirect('/admin/article/show/'.$article->id);
        }
        return redirect('/admin/article');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::findOrFail($id);
        $categories = Category::all();
        if($article){
            return view('admin.pages.article.show',['article' => $article,'categories' => $categories]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $categories = Category::all();
        return view('admin.pages.article.edit',['article' => $article,'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        if($article){
            $article->title = $request->get('title');
            $article->category_id = ($request->get('category'));
            $article->visible = ($request->get('visible')) ? 1 : 0;
            $article->content = $request->get('content');
            $article->slug = str_slug($request->get('title'),'-');
            $article->updated_by = Auth::user()->id;
            $article->save();

            if($article && $request->has('image_article')){
                $article->addMediaFromRequest('image_article')->toMediaCollection('images');
            }
            return redirect()->back()->with('success','Artykuł został pomyślnie zaktualizowany!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Article::find($id);
        if($item){
            if($item->delete()){
                return redirect()->back();
            }
        }
    }
}
