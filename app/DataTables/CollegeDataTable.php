<?php

namespace App\DataTables;

// use App\Models\CollegeDataTable;

use App\College;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CollegeDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {

        return datatables()
            ->eloquent($query)
            ->addColumn('action',function ($row) { $btn = '<a href="javascript:void(0)" class="edit btn btn-info btn-sm">' . \Lang::get('site.show') . '</a> ';
                $btn = $btn . "<a href='colleges/$row->id/edit' class='edit btn btn-primary btn-sm'>" . \Lang::get('site.edit') . "</a> ";
                $btn = $btn . '
                <form action=" colleges/'.$row->id.'" method="POST">
                '.csrf_field().'
                '.method_field("DELETE").'
                <button type="submit" class="edit btn btn-danger btn-sm">' . \Lang::get('site.delete') .
                '</button>
                </form>';
            return $btn;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\CollegeDataTable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(College $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('collegedatatable-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(1)
            ->buttons(
                Button::make('create'),
                Button::make('export'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            )->parameters([
                'dom'          => 'Bfrtip',
                // 'buttons'      => ['excel', 'csv', 'print'],
            ])->parameters([
                'language' => [
                    'url' => url('/admin/' . config('app.locale') . '/Arabic.json'), //<--here
                ]
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make("id")->title(\Lang::get('site.id')),
            Column::make('name')->title(\Lang::get('site.name')),
            Column::make('users_count')->title(\Lang::get('site.users')),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center')->title(\Lang::get('site.action')),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'College_' . date('YmdHis');
    }
}
