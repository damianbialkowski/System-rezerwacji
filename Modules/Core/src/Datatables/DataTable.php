<?php


namespace Modules\Core\src\Datatables;

use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable as BaseDataTable;

class CoreDataTable extends BaseDataTable
{
    private $columns = [];
    public $model;
    public $tableId = 'default-table-id';

    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = datatables()
            ->eloquent($query);
        return $this->buildAction($dataTable);
    }

    public function buildAction($eloquent, $column = 'action')
    {
        //todo
        return $eloquent->addColumn($column, function ($row) {
            $btn = '<div class="flex align-items-center justify-content-center flex-wrap">
                           <a href="' . route('admin.admins.show', $row->id) . '" class="btn-action-table"><i class="far fa-eye"></i></a>
                           <a href="' . route('admin.admins.edit', $row->id) . '" class="btn-action-table"><i class="fas fa-pencil-alt"></i></a>
                       </div>';
            return $btn;
        });
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        $columns = [];
        if (method_exists($this->model, 'showableAttributes')) {
            foreach ($this->model->showableAttributes() as $attribute) {
                $columns[] = Column::make($attribute);
            }
        }
        //todo
        if (count($columns)) {
            $columns[] = Column::make('action');
        }

        return $columns;
    }

    /**
     * Get query source of dataTable.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $items = $this->model->query();
        return $this->applyScopes($items);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId($this->tableId)
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(1)
            ->buttons(
                Button::make('create'),
                Button::make('export'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            );
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return class_basename(get_called_class()) . date('YmdHis');
    }
}
