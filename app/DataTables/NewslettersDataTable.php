<?php

namespace App\DataTables;

use App\Models\Newsletter;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Route;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class NewslettersDataTable extends DataTable
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
        ->editColumn('created_at', function ($newsletter) {
            return formatDate($newsletter->created_at) . __(' at ') . formatHour($newsletter->created_at);
        })
        ->editColumn('email', function ($newsletter) {
            return '<a href = "mailto: ' . $newsletter->email . '">' . $newsletter->email . '</a>';
        })
        ->editColumn('action', function ($newsletter) {
            return $this->button(
                      'subscribers.destroy', 
                      $newsletter->id, 
                      'danger', 
                      __('Delete'), 
                      'trash-alt', 
                      __('Really delete this subscriber?')
                  );
        })
        ->rawColumns(['email', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Newsletter $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Newsletter $newsletter): QueryBuilder
    {
        $query = $newsletter->newQuery();

        if(Route::currentRouteNamed('subscribers.indexnew')) {
            $query->has('unreadNotifications');
        }
        return $query;
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
        ->setTableId('newsletters-table')
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
            Column::make('email')->title(__('Email')),
            Column::make('created_at')->title(__('Date')),
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
        return 'Newsletters_' . date('YmdHis');
    }
}
