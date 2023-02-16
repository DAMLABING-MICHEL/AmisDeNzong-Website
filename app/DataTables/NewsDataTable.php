<?php

namespace App\DataTables;

use App\Models\News;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class NewsDataTable extends DataTable
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
            ->editColumn('title', function ($news) {
                return $news->title;
            })
            ->editColumn('created_at', function ($news) {
                return $this->getDate($news);
            })
            ->editColumn('action', function ($news) {
                return $this->button(
                    'news.edit',
                    $news->id,
                    'warning',
                    __('Edit'),
                    'edit'
                ).'&nbsp;&nbsp;' 
                . $this->button(
                    'news-single',
                    $news->id,
                    'success',
                    __('Show'),
                    'eye',
                    '',
                    '_blank'
                ).'&nbsp;&nbsp;' 
                . $this->button(
                    'news.destroy',
                    $news->id,
                    'danger',
                    __('Delete'),
                    'trash-alt',
                    __('Really delete this staff?')
                );
            })
            ->rawColumns(['action','created_at']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\News $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(News $model): QueryBuilder
    {
        return $model->newQuery();
    }
    protected function getDate($news)
    {
        if (!empty($news->created_at) && !empty($news->updated_at)) {
            $updated = $news->updated_at > $news->created_at;
            $html = $this->badge($updated ? 'Last update' : '', 'success');

            $html .= '<br>' . formatDate($updated ? $news->updated_at : $news->created_at) . __(' at ') . formatHour($updated ? $news->updated_at : $news->created_at);

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
            ->setTableId('news-table')
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
        return 'News_' . date('YmdHis');
    }
}
