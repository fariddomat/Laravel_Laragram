<?php

namespace App\DataTables;

use App\Report;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ReportDataTable extends DataTable
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
            ->addColumn('action',function ($row) {
                $id=$row->post->id;
                $btn = "<a href='/posts/$id' class='edit btn btn-info btn-sm'>" . \Lang::get('site.show') . '</a> ';
                $btn = $btn . '
                <form action=" reportCheck/'.$row->id.'" method="POST">
                '.csrf_field().'
                '.method_field("Post").'
                <button type="submit" class="edit btn btn-success btn-sm"><i class="ft-clipboard"></i></button>
                </form>';
            return $btn;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Report $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Report $model)
    {
        return $model->newQuery()->with(['user', 'post', 'comment']);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('report-table')
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
                    ]);;
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('id')->title(\Lang::get('site.id')),
            Column::make('user.fname')->title(\Lang::get('site.user')),
            Column::make('post.id')->title(\Lang::get('site.post')),
            Column::make('comment.id')->title(\Lang::get('site.comment')),
            Column::make('status')->title(\Lang::get('site.status')),
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
        return 'Report_' . date('YmdHis');
    }
}
