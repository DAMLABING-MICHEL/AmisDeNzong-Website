<?php

namespace App\DataTables;

use App\Models\Testimonial;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class TestimonialsDataTable extends DataTable
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
        ->editColumn('title', function ($testimonial) {
            return $testimonial->title;
        })
        ->editColumn('rating', function ($testimonial) {
            return $testimonial->rating;
        })
        ->editColumn('content', function ($testimonial) {
            return $testimonial->content;
        })
        ->editColumn('created_at', function ($testimonial) {
            return $this->getDate($testimonial);
        })
        ->editColumn('status', function ($testimonial) {
            return $testimonial->status == 'active' ? '<input
            type="checkbox"
            id="status"
            name="status"
            checked 
            data-id ="'.$testimonial->id.'"
            data-status ="'.$testimonial->status.'"
            data-name ="'.$testimonial->name.'" 
            data-content ="'.$testimonial->content.'"
            data-rating ="'.$testimonial->rating.'"/>' : '<input
            type="checkbox"
            id="status"
            name="status" class="text-center" 
            data-id ="'.$testimonial->id.'"
            data-status ="'.$testimonial->status.'"
            data-name ="'.$testimonial->name.'" 
            data-content ="'.$testimonial->content.'"
            data-rating ="'.$testimonial->rating.'"/>';
        })
        ->editColumn('action', function ($testimonial) {
            return $this->button(
                'testimonials.edit',
                $testimonial->id,
                'warning',
                __('Edit'),
                'edit'
            ).'&nbsp;&nbsp;' 
            . $this->button(
                'about',
                $testimonial->id,
                'success',
                __('Show'),
                'eye',
                '',
                '_blank'
            ).'&nbsp;&nbsp;' 
            . $this->button(
                'testimonials.destroy',
                $testimonial->id,
                'danger',
                __('Delete'),
                'trash-alt',
                __('Really delete this testimonial?')
            );
        })
        ->rawColumns(['action','created_at','status']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Testimonial $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Testimonial $model): QueryBuilder
    {
        return $model->newQuery();
    }
    
    protected function getDate($testimonial)
    {
        if (!empty($testimonial->created_at) && !empty($testimonial->updated_at)) {
            $updated = $testimonial->updated_at > $testimonial->created_at;
            $html = $this->badge($updated ? 'Last update' : '', 'success');

            $html .= '<br>' . formatDate($updated ? $testimonial->updated_at : $testimonial->created_at) . __(' at ') . formatHour($updated ? $testimonial->updated_at : $testimonial->created_at);

            return $html;
        }
    }
    
    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
        ->setTableId('testimonials-table')
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
            Column::make('name')->title(__('Name of Testifying')),
            Column::make('rating')->title(__('Evaluation')),
            Column::make('content')->title(__('Message')),
            Column::make('created_at')->title(__('Date')),
            Column::make('status')->title(__('Status')),
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
        return 'Testimonials_' . date('YmdHis');
    }
}
