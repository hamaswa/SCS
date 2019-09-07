<?php

namespace App\DataTables;

use App\AASource;
use Yajra\DataTables\Services\DataTable;

class FieldsDatatable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query)
            ->addColumn('action', 'aasource.action');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(AASource $model)
    {
        return $model->newQuery()->select('id','name','description','status','type');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->addAction(['width' => '80px'])
                    ->parameters($this->getBuilderParameters());
    }

    /**
     * Get columns.
     *
     * @return array
     */
    public function getBuilderParameters()
    {
        return [
        'dom'     => 'Bfrtip',
        'order'   => [[0, 'desc']],
        'buttons' => [
            'create',
            'reload',
        ],
    ];
    }

    protected function getColumns()
    {
        return [
            'id',
            'name','description','status','type'

        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Fields_' . date('YmdHis');
    }
}
