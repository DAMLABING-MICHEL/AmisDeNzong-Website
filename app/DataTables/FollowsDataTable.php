<?php

namespace App\DataTables;

use App\Models\Follow;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class FollowsDataTable extends DataTable
{
    use DataTableTrait;
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return datatables()
        ->eloquent($query)
        ->editColumn('title', function ($follow) {
            return $follow->title;
        })
        ->editColumn('icon', function ($follow) {
            return '<i class="far fa-'.$follow->title.'"></i>';
            // return '<span class="icon-'.$follow->title.'"></span>';
        })
        ->editColumn('action', function ($follow) {
            return $this->button(
                      'follows.edit', 
                      $follow->id, 
                      'warning', 
                      __('Edit'), 
                      'edit'
                  ).'&nbsp;&nbsp;'
                  . $this->button(
                      'follows.destroy', 
                      $follow->id, 
                      'danger', 
                      __('Delete'), 
                      'trash-alt', 
                      __('Really delete this follow?')
                  );
        })
        ->rawColumns(['icon', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Follow $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Follow $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
        ->setTableId('follows-table')
        ->columns($this->getColumns())
        ->minifiedAjax()
        ->dom('Blfrtip')
        ->lengthMenu();
    }

    /**
     * Get the dataTable columns definition.
     *
     * @return array
     */
    public function getColumns(): array
    {
        return [
            Column::make('title')->title(__('Title')),
            Column::make('icon')->title(__('Icon')),
            Column::computed('action')->title(__('Action'))->addClass('align-middle text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Follows_' . date('YmdHis');
    }
}
