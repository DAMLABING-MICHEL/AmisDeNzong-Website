<?php

namespace App\DataTables;

use App\Models\Feature;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class FeaturesDataTable extends DataTable
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
            ->editColumn('title', function ($feature) {
                return $feature->title;
            })
            ->editColumn('description', function ($feature) {
                return $feature->description;
            })
            ->addColumn('action', function ($feature) {
                return $this->button(
                          'features.edit', 
                          $feature->id, 
                          'warning', 
                          __('Edit'), 
                          'edit'
                      ).'&nbsp;&nbsp;'
                      . $this->button(
                          'features.destroy', 
                          $feature->id, 
                          'danger', 
                          __('Delete'), 
                          'trash-alt', 
                          __('Really delete this feature?')
                      );
            })
            ->rawColumns(['action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Feature $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Feature $model): QueryBuilder
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
        ->setTableId('features-table')
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
            Column::make('description')->title(__('Description')),
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
        return 'Features_' . date('YmdHis');
    }
}
