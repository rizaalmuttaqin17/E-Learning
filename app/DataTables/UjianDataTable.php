<?php

namespace App\DataTables;

use App\Models\Ujian;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class UjianDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        
        if(Auth::user()->hasRole('Admin|Dosen')){
            $dataTable = new EloquentDataTable($query);
            return $dataTable
            ->addColumn('action', 'ujians.datatables_actions')
            ->editColumn('tanggal_ujian', function($query){
                if($query['tanggal_ujian'] == null){
                    return '-';
                } else {
                    return Carbon::parse($query['tanggal_ujian'])->locale('id')->isoFormat('DD MMMM Y');
                }
            })
            ->editColumn('id_mata_kuliah', 'ujians.matkul')
            ->editColumn('jumlah_soal', 'ujians.jml_soal')
            ->addColumn('status', 'ujians.status')
            ->rawColumns(['action', 'status', 'id_mata_kuliah', 'jumlah_soal']);
        } else {
            $dataTable = new EloquentDataTable($query);
            return $dataTable
            ->addColumn('action', 'ujians.datatables_actions')
            ->editColumn('tanggal_ujian', function($query){
                if($query['tanggal_ujian'] == null){
                    return '-';
                } else {
                    return Carbon::parse($query['tanggal_ujian'])->locale('id')->isoFormat('DD MMMM Y');
                }
            })
            ->editColumn('id_mata_kuliah', 'ujians.matkul')
            ->editColumn('jumlah_soal', 'ujians.jml_soal')
            ->addColumn('status', 'ujians.status')
            ->rawColumns(['action', 'status', 'id_mata_kuliah', 'jumlah_soal']);
        }
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Ujian $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Ujian $model)
    {
        return $model->newQuery();
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
                       'extend' => 'create',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-plus"></i> ' .__('auth.app.create').''
                    ],
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
                       'extend' => 'reset',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-undo"></i> ' .__('auth.app.reset').''
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
            'id_mata_kuliah' => new Column(['title' => __('models/ujians.fields.id_mata_kuliah'), 'data' => 'id_mata_kuliah']),
            'jumlah_soal' => new Column(['title' => __('models/ujians.fields.jumlah_soal'), 'data' => 'jumlah_soal']),
            'tanggal_ujian' => new Column(['title' => __('models/ujians.fields.tanggal_ujian'), 'data' => 'tanggal_ujian']),
            'status' => new Column(['title' => __('models/ujians.fields.status'), 'data' => 'status'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'ujians_datatable_' . time();
    }
}
