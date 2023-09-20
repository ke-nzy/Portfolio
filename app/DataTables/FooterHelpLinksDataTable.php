<?php

namespace App\DataTables;

use App\Models\FooterHelpLink;
use App\Models\FooterHelpLinks;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class FooterHelpLinksDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function($query){
                return '<a href="'.route('admin.footer-help-links.edit', $query->id).'" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                <a href="'.route('admin.footer-help-links.destroy', $query->id).'" class="btn btn-danger delete-item"><i class="fas fa-trash"></i></a>';
            })
            ->addColumn('created_at', function($query){
                return date('d-M-Y | H:i:s', strtotime($query->created_at));
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(FooterHelpLinks $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('footerhelplinks-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(0)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('name'),
            Column::make('url'),
            Column::make('created_at')->width(150),
            // Column::make('updated_at'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(200)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'FooterHelpLinks_' . date('YmdHis');
    }
}
