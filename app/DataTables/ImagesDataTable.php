<?php

namespace App\DataTables;

use App\Models\Image;
use App\Models\Rubric;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ImagesDataTable extends DataTable
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
        ->editColumn('title', function ($image) {
                return $image->title;
        })
        ->editColumn('url', function ($image) {
             return '<img src='.getImage($image,false,true) .' height = "50px" align-midle/>';
        })
        ->editColumn('rubric_id', function ($image) {
            if (!empty($image)) {
            $rubric = $image->rubric;
                if ($rubric != null) {
                    return $image->rubric->title;
                }
            }
        })
        ->editColumn('action', function ($image) {
                return $this->button(
                    'images.edit', 
                    $image->id, 
                    'warning', 
                    __('Edit'), 
                    'edit'
                ).
                '&nbsp;&nbsp;'
                .$this->button(
                    'images.destroy', 
                    $image->id, 
                    'danger', 
                    __('Delete'), 
                    'trash-alt', 
                    __('Really delete this image?')
                );
        })
        ->rawColumns(['url','action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Image $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Image $image): QueryBuilder
    {
       return $image->select(
            'images.id',
            'images.title',
            'images.url',
            'images.created_at',
            'images.updated_at',
            'rubric_id'
        )->with(
                'rubric:id,title,description'
            )->where('rubric_id', '>', 0);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
        ->setTableId('images-table')
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
            Column::make('url')->title(__('Image')),
            Column::make('rubric_id')->title(__('Rubric')),
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
        return 'Images_' . date('YmdHis');
    }
}
