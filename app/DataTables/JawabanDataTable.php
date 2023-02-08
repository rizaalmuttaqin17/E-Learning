<?php

namespace App\DataTables;

use App\Models\Jawaban;
use App\Models\Pilihan;
use App\Models\Soal;
use App\Models\Ujian;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class JawabanDataTable extends DataTable
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
        ->addColumn('action', 'ujians.table_nilai_actions')
        ->editColumn('id_user', function($q){
            return $q['users']['name'];
        })
        ->editColumn('id_soal', function($q){
            return $q['soals']['pertanyaan'];
        })
        ->editColumn('id_pilihan', function($q){
            if($q['id_pilihan'] != null){
                $pilihan = Pilihan::where('id_soal', $q['id_soal'])->where('benar', true)->first();
                return $q['pilihan']['pilihan']."Benar : ".$pilihan['pilihan'];
            } else {
                return $q['jawaban'];
            }
        })
        ->rawColumns(['action', 'id_user', 'id_soal', 'id_pilihan']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Jawaban $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Jawaban $model)
    {
        $soal = Soal::select('id')->where('id_ujian', $this->attributes['idUjian'])->get();
        return $model->newQuery()->where('id_user', $this->attributes['id'])->whereIn('id_soal', $soal);
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
            ->addAction(['width' => '120px', 'printable' => false, 'title' => __('crud.action')])
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
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
            'id_user' => new Column(['title' => __('models/jawabans.fields.id_user'), 'data' => 'id_user']),
            'id_soal' => new Column(['title' => __('models/jawabans.fields.id_soal'), 'data' => 'id_soal']),
            'id_pilihan' => new Column(['title' => __('models/jawabans.fields.id_pilihan'), 'data' => 'id_pilihan']),
            'nilai' => new Column(['title' => __('models/jawabans.fields.nilai'), 'data' => 'nilai'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'jawabans_datatable_' . time();
    }
}