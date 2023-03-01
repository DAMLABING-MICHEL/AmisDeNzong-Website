<?php

namespace App\DataTables;

use App\Models\Slide;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SlidesDataTable extends DataTable
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
        ->editColumn('description', function ($slide) {
            return $slide->description;
        })
        ->editColumn('image', function ($slide) {
            return '<img src='.getImage($slide,false) .' height = "50px" align-midle/>';
        })
        ->editColumn('action', function ($slide) {
            return $this->button(
                      'slides.edit', 
                      $slide->id, 
                      'warning', 
                      __('Edit'), 
                      'edit'
                  ).'&nbsp;&nbsp;'
                  . $this->button(
                      'slides.destroy', 
                      $slide->id, 
                      'danger', 
                      __('Delete'), 
                      'trash-alt', 
                      __('Really delete this slide?')
                  );
        })
        ->rawColumns(['image', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Slide $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Slide $model): QueryBuilder
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
                    ->setTableId('slides-table')
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
            Column::make('description')->title(__('Description')),
            Column::make('image')->title(__('Image')),
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
        return 'Slides_' . date('YmdHis');
    }
}
