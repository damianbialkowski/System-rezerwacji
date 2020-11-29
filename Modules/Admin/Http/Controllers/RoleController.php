<?php

namespace Modules\Admin\Http\Controllers;

use Modules\Admin\Datatables\RolesDataTable;
use Modules\Admin\Http\Controllers\Controller as CoreController;
use Modules\Admin\Entities\Role;
use Modules\Admin\Forms\RoleForm;
use Bouncer;

class RoleController extends CoreController
{
    protected $model = Role::class;
    protected $dataTable = RolesDataTable::class;
    protected $form = RoleForm::class;
    protected $baseView = 'panel.roles';
    protected $baseRoute = 'roles';
    protected $requestList = [
//        'store' => RoleCreateRequest::class,
//        'update' => RoleUpdateRequest::class,
    ];

    private $abilityManager;

    public function __construct()
    {
        parent::__construct();
    }

    public function create()
    {
        if (!Bouncer::can('create', admin())) {
            return abort(403);
        }
        $form = $this->form($this->form, [
            'method' => 'POST',
            'route' => [implode('.', [$this->routeWithModulePrefix, 'store'])]
        ]);

        return $this->view($this->baseView . '.create', ['form' => $form]);
    }

}
