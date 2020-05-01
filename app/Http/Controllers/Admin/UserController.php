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
                ->addColumn('action', function ($row) {

                    $btn = '<div class="flex align-items-center justify-content-center flex-wrap">
                           <a href="' . route('admin.users.show', $row->id) . '" class="btn-action-table"><i class="far fa-eye"></i></a>
                           <a href="' . route('admin.users.edit', $row->id) . '" class="btn-action-table"><i class="fas fa-pencil-alt"></i></a>
                       </div>';

                    return $btn;
                })
                ->editColumn('role_id', function ($data) {
                    return ($data->role_id) ? $data->role->name : 'brak';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', ['roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request, User $user)
    {
        dd($request->all());
        $user = new User;
        $user->firstname = $request->get('firstname');
        $user->username = $request->get('username');
        $user->email = $request->get('email');
        $user->role_id = $request->get('role');
        $user->password = bcrypt('test');
        $user->save();
        if ($user) {
            return redirect()->back()->with('success', 'Konto użytkownika zostało pomyślnie utworzone.');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort(404);
        return view('admin.users.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('admin.users.edit', ['user' => $user, 'roles' => $roles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $saved = $user->update($request->all());
        if ($saved) {
            return redirect()->back()->with('success', trans('admin.users.updated'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
