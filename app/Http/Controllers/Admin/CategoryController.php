<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use DataTables;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Category::latest()->get();
            // dd($data);
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                           $btn = '<div class="flex align-items-center justify-content-center flex-wrap">
                           <a href="'.url("/admin/category/show/".$row->id).'" class="btn-action-table"><i class="far fa-eye"></i></a>
                           <a href="'.url("/admin/category/edit/".$row->id).'" class="btn-action-table"><i class="fas fa-pencil-alt"></i></a>
                       </div>';
     
                            return $btn;
                    })
                    ->editColumn('parent_id',function($data){
                        return ($data->parent_id) ? $data->categoryName($data->parent_id) : 'brak';
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.pages.category.index');
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
            return view('admin.pages.category.create',['categories' => $categories]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $category = new Category;
        $category->name = $request->get('name');
        $category->content = $request->get('content');
        $category->is_subcategory = ($request->subcategory) ? 1 : 0;

        if($request->subcategory) $category->parent_id = $request->subcategory;

        $category->visible = ($request->visible) ? 1 : 0;
        $category->slug = str_slug($request->get('name'),'-');
        $category->created_by = 1;
        $category->save();

        if($category){
            return redirect('admin/category/index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.pages.category.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $subcategories = Category::where('id','!=',$id)->get();
        return view('admin.pages.category.edit',['category' => $category,'subcategories' => $subcategories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $category = Category::findOrFail($id);
        if($category){
            $category->name = $request->get('name');
            $category->content = $request->get('content');
            $category->is_subcategory = ($request->get('is_subcategory')) ? 1 : 0;
            $category->parent_id = ($request->get('is_subcategory')) ? $request->get('subcategory') : null;
            $category->visible = ($request->get('visible')) ? 1 : 0;
            $category->slug = str_slug($request->get('name'),'-');
            $category->updated_by = 2;
            $category->save();
            return redirect()->back()->with('success','Kategoria została pomyślnie zaktualizowana!');
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
        //
    }
}
