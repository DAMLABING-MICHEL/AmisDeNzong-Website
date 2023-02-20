<?php

namespace App\DataTables;

use App\Models\Staff;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class StafsDataTable extends DataTable
{
    use DataTableTrait;
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->editColumn('lastName', function ($staff) {
                return $staff->lastName;
            })
            ->editColumn('firstName', function ($staff) {
                return $staff->firstName;
            })
            ->editColumn('gender', function ($staff) {
                return $staff->gender;
            })
            ->editColumn('position', function ($staff) {
                return $staff->position;
            })
            ->editColumn('feature', function ($staff) {
                return $staff->feature->title;
            })
            ->editColumn('action', function ($staff) {
                return $this->button(
                          'staff.edit', 
                          $staff->id, 
                          'warning', 
                          __('Edit'), 
                          'edit' 
                      ).'&nbsp;&nbsp;'
                      . $this->button(
                          'staff.destroy', 
                          $staff->id, 
                          'danger', 
                          __('Delete'), 
                          'trash-alt', 
                          __('Really delete this staff?')
                      );
            })
            ->rawColumns(['action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Staff $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Staff $model): QueryBuilder
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
        ->setTableId('staff-table')
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
    protected function getColumns()
    {
        return [
            Column::make('firstName')->title(__('First Name')),
            Column::make('lastName')->title(__('Last Name')),
            Column::make('gender')->title(__('Gender')),
            Column::make('position')->title(__('Position')),
            Column::make('feature')->title(__('Occupation')),
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
        return 'Staff_' . date('YmdHis');
    }
}
