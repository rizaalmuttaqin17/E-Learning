<?php

namespace App\DataTables;

use App\Models\Soal;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class SoalDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable
        ->addColumn('action', 'soals.datatables_actions')
        ->editColumn('id_ujian', function($query){
            return $query['ujian']['matkul']['nama'];
        })
        ->editColumn('id_tipe_soal', function($query){
            return $query['tipeSoal']['nama'];
        })
        ->rawColumns(['pertanyaan', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Soal $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Soal $model)
    {
        return $model->newQuery()->where('id_ujian', $this->attributes['id']);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => true, 'title' => __('crud.action')])
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    [
                       'extend' => 'export',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-download"></i> ' .__('auth.app.export').''
                    ],
                    [
                       'extend' => 'print',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-print"></i> ' .__('auth.app.print').''
                    ],
                    [
                       'extend' => 'reload',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-refresh"></i> ' .__('auth.app.reload').''
                    ],
                ],
                 'language' => [
                   'url' => url('//cdn.datatables.net/plug-ins/1.10.12/i18n/English.json'),
                 ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'id' => ['title' => 'No.', 'orderable' => false, 'searchable' => false, 'render' => function() {
                return 'function(data,type,fullData,meta){return meta.settings._iDisplayStart+meta.row+1;}';
            }],
            'pertanyaan' => new Column(['title' => __('models/soals.fields.pertanyaan'), 'data' => 'pertanyaan']),
            'id_tipe_soal' => new Column(['title' => __('models/soals.fields.id_tipe_soal'), 'data' => 'id_tipe_soal']),
            'id_ujian' => new Column(['title' => __('models/soals.fields.id_ujian'), 'data' => 'id_ujian']),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'soals_datatable_' . time();
    }
}
