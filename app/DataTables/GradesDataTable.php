<?php

namespace App\DataTables;

use App\Models\Grade;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class GradesDataTable extends DataTable
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
            ->editColumn('title', function ($grade) {
                return $grade->title;
            })
            ->editColumn('description', function ($grade) {
                return $grade->description;
            })
            ->editColumn('hight_grade', function ($grade) {
                return $grade->hight_grade ? '<i class="fas fa-check"></i>' : '';
            })
            ->addColumn('action', function ($grade) {
                return $this->button(
                          'grades.edit', 
                          $grade->id, 
                          'warning', 
                          __('Edit'), 
                          'edit'
                      ). $this->button(
                          'grades.destroy', 
                          $grade->id, 
                          'danger', 
                          __('Delete'), 
                          'trash-alt', 
                          __('Really delete this grade?')
                      );
            })
            ->rawColumns(['hight_grade', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Grade $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Grade $model): QueryBuilder
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
        ->setTableId('grades-table')
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
            Column::make('hight_grade')->title(__('Hight_grade'))->addClass('align-middle text-center'),            
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
        return 'Grades_' . date('YmdHis');
    }
}
