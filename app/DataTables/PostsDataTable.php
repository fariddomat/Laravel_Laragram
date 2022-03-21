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
        $btn = '<a href="javascript:void(0)" class="edit btn btn-info btn-sm">' . \Lang::get('site.show') . '</a> ';
        $btn = $btn . "<a href='javascript:void(0)' class='edit btn btn-primary btn-sm'>" . \Lang::get('site.edit') . "</a> ";
        $btn = $btn . '<a href="javascript:void(0)" class="edit btn btn-danger btn-sm">' . \Lang::get('site.delete') . '</a>';
        return datatables()
            ->eloquent($query)
            ->addColumn('action', $btn);
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
            Column::make('user.username')->title(\Lang::get('site.user')),
            Column::make('content')->title(\Lang::get('site.content')),
            Column::make('type')->title(\Lang::get('site.type')),
            Column::make('privacy')->title(\Lang::get('site.privacy')),
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
