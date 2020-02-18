<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Role;
use App\Http\Requests\UserRequest;
use App\User;
use DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::latest()->get();
            // dd($data);
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                           $btn = '<div class="flex align-items-center justify-content-center flex-wrap">
                           <a href="'.url("/admin/user/show/".$row->id).'" class="btn-action-table"><i class="far fa-eye"></i></a>
                           <a href="'.url("/admin/user/edit/".$row->id).'" class="btn-action-table"><i class="fas fa-pencil-alt"></i></a>
                       </div>';
     
                            return $btn;
                    })
                    ->editColumn('role_id',function($data){
                        return ($data->role_id) ? $data->role->name : 'brak';
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.pages.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.pages.user.create',['roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        // dd($request->all());
        $user = new User;
        $user->firstname = $request->get('firstname');
        $user->username = $request->get('username');
        $user->email = $request->get('email');
        $user->role_id = $request->get('role');
        $user->password = bcrypt('test');
        $user->created_by = 1;
        $user->save();
        if($user){
            return redirect()->back()->with('success','Konto użytkownika zostało pomyślnie utworzone.');
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

        return view('admin.pages.user.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('admin.pages.user.edit',['user' => $user,'roles' => $roles]);
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
        $user = User::findOrFail($id);
        if($user){
            $user->firstname = $request->get('firstname');
            $user->username = $request->get('username');
            $user->email = $request->get('email');
            $user->role_id = $request->get('role');
            $user->updated_by = 1;
            $user->save();
            return redirect()->back()->with('success','Użytkownik został pomyślnie zaktualizowany!');
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
