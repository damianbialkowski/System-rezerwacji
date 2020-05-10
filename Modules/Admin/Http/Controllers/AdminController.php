<?php

namespace Modules\Admin\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Admin\Http\Controllers\Controller;
use Modules\Admin\Entities\Admin;
use DataTables;
use phpDocumentor\Reflection\Types\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use \Modules\Admin\Repositories\Interfaces\AdminBaseRepositoryInterface;

class AdminController extends Controller
{

    protected $adminRepository;

    public function __construct(AdminBaseRepositoryInterface $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }

    protected function redirectNotFoundModel()
    {
        return $this->redirect('admins.'. $this->$defaultRedirect);
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Admin::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<div class="flex align-items-center justify-content-center flex-wrap">
                           <a href="' . route('admins.show', $row->id) . '" class="btn-action-table"><i class="far fa-eye"></i></a>
                           <a href="' . route('admins.edit', $row->id) . '" class="btn-action-table"><i class="fas fa-pencil-alt"></i></a>
                       </div>';
                    return $btn;
                })
                ->editColumn('role_id', function ($data) {
                    return ($data->role_id) ? $data->role->name : 'brak';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return $this->view('panel.admins.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $roles = Role::all();
        return $this->view('panel.admins.create', ['roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        dd($request->all());
    }

    /**
     * Show the specified resource.
     * @param Collection $admin
     * @return Response
     */
    public function show($id)
    {
        try {
            $admin = $this->adminRepository->findById($id);
            dd($admin);
            return view('admin::panel.admins.show', ['item' => $admin]);
        } catch (ModelNotFoundException $e) {
            dd($e);
            return $this->redirectNotFound();
        }

    }

    /**
     * Show the form for editing the specified resource.
     * @param Collection $admin
     * @return Response
     */
    public function edit(Admin $admin)
    {
        return view('admin::panel.admins.edit', ['item' => $admin, 'roles' => Role::all()]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
