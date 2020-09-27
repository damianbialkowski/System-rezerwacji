<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Response;
use Modules\Admin\Datatables\AdminsDataTable;
use Modules\Admin\Http\Controllers\Controller as CoreController;
use Modules\Admin\Entities\Admin;
use DataTables;
use phpDocumentor\Reflection\Types\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Modules\Admin\Http\Requests\AdminCreateRequest;
use Modules\Admin\Http\Requests\AdminUpdateRequest;
use Modules\Admin\Forms\AdminForm;

class AdminController extends CoreController
{
    protected $model = Admin::class;
    protected $dataTable = AdminsDataTable::class;
    protected $form = AdminForm::class;
    protected $baseView = 'panel.admins';
    protected $baseRoute = 'admins';
    protected $requestList = [
        'store' => AdminCreateRequest::class,
        'update' => AdminUpdateRequest::class,
    ];

    /**
     * Update the specified resource in storage.
     * @param AdminCreateRequest $request
     * @param int $id
     * @return Response
     */
    public function update(AdminUpdateRequest $request, Admin $admin)
    {
        if ($request->has('password') && $request->password !== '') {
            $user = $admin->update($request->all());
        } else {
            $user = $admin->update($request->except('password'));
        }

        if ($user) {
            return $this->redirect('admins.edit', $admin->id);
        }
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
