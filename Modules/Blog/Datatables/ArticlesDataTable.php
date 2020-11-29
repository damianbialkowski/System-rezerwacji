<?php


namespace Modules\Blog\Datatables;

use Modules\Core\src\Datatables\CoreDataTable;
use Modules\Blog\Entities\Article;

class ArticlesDataTable extends CoreDataTable
{
    public function __construct()
    {
        $this->model = new Article;
        $this->tableId = 'articles-table';
    }

    public function dataTable($query)
    {
        return parent::dataTable($query);
    }
}
