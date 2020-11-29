<?php


namespace Modules\Admin\Datatables;

use Modules\Core\src\Datatables\CoreDataTable;
use Modules\Admin\Entities\Role;

class RolesDataTable extends CoreDataTable
{
    public function __construct()
    {
        $this->model = new Role;
        $this->tableId = 'roles-table';
    }

    public function dataTable($query)
    {
        return parent::dataTable($query);
    }
}
