<?php

namespace App\DataTables;

// use App\Models\PostsDataTable;

use App\Post;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PostsDataTable extends DataTable
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
            ->addColumn('action',function ($row) { $btn = "<a href='/posts/$row->id' class='edit btn btn-info btn-sm'>" . \Lang::get('site.show') . '</a> ';
                $btn = $btn . '
                <form action=" posts/'.$row->id.'" method="POST">
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
     * @param \App\Models\PostsDataTable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Post $model)
    {
        return $model->newQuery()->with(['user']);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('postsdatatable-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(0, 'asc')
                    ->buttons(
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
            Column::make('user.username')->title(\Lang::get('site.user')),
            Column::make('content')->title(\Lang::get('site.content')),
            Column::make('type')->title(\Lang::get('site.type')),
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
        return 'Posts_' . date('YmdHis');
    }
}
