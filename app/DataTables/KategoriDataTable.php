<?php

namespace App\DataTables;

use App\Models\KategoriModel;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class KategoriDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
        {
        return (new EloquentDataTable($query))
        //js 5 no 3
        ->addColumn('Edit', function ($row) {
            return '<a class="edit btn btn-primary btn-sm" href="' . route('kategori.edit', $row->kategori_id) . '">edit</a>';
        })
        ->addColumn('Delete', function ($row) {
            return '<a class="edit btn btn-danger btn-sm" href="' . route('kategori.delete', $row->kategori_id) . '">delete</a>';
        })
        ->rawColumns(['Edit', 'Delete'])
        //->rawColumns(['Edit'])
        //--
            /* ->addColumn('action', 'kategori.action') */
            ->setRowId('id');
        }
 /**
 * Get the query source of dataTable.
 */
    public function query(KategoriModel $model): QueryBuilder
    {
        return $model->newQuery();
    }
 /**
 * Optional method if you want to use the html builder.
 */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('kategori-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(1)
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
            // js 5 no 3
            Column::make('kategori_id'),
            Column::make('kategori_kode'),
            Column::make('kategori_nama'),
            Column::make('created_at'),
            Column::make('updated_at'),
            Column::computed('Edit')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass(
                    'text-center'
                ),
                //js no 5
                Column::computed('Delete')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass(
                    'text-center'
                ),
        /* Column::computed('action')
        ->exportable(false)
        ->printable(false)
        ->width(60)
        ->addClass('text-center'), */
 ];
 }
 /**
 * Get the filename for export.
 */
    protected function filename(): string
    {
        return 'Kategori_' . date('YmdHis');
    }
}