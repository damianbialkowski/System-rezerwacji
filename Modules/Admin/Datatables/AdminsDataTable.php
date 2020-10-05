<?php


namespace Modules\Admin\Datatables;

use Modules\Core\src\Datatables\CoreDataTable;
use Modules\Admin\Entities\Admin;

class AdminsDataTable extends CoreDataTable
{
    public function __construct()
    {
        $this->model = new Admin;
        $this->tableId = 'admins-table';
    }

    public function dataTable($query)
    {
        return parent::dataTable($query);
    }
}
