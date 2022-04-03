<?php

namespace App\DataTables;

use App\College;
use App\Course;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CourseDataTable extends DataTable
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
                $btn = $btn . "<a href='courses/$row->id/edit' class='edit btn btn-primary btn-sm'>" . \Lang::get('site.edit') . "</a> ";
                $btn = $btn . '
                <form action=" courses/'.$row->id.'" method="POST">
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
     * @param \App\Models\CourseDataTable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Course $model)
    {
        return $model->newQuery()->with(['college']);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('coursedatatable-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(0, 'asc')
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
            Column::make('college.name')->title(\Lang::get('site.college')),
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
        return 'Course_' . date('YmdHis');
    }
}
