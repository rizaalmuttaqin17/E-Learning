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
            $dataTable = new EloquentDataTable($query);
            return $dataTable
            ->addColumn('action', 'ujians.datatables_actions')
            ->editColumn('matkul.nama', function($query){
                if(Auth::user()->hasRole('Admin')){
                    return "<u>".$query['matkul']['nama']."</u><br>Kode Ujian : ".$query['kode']."<br>Pembuat : <u>". $query['users']['name'] . "</u>";
                } else if(Auth::user()->hasRole('Dosen')){
                    return "<u>".$query['matkul']['nama']."</u><br>Kode Ujian : ".$query['kode']."";
                } else {
                    return "<u>".$query['matkul']['nama'];
                }
            })
            ->editColumn('jml_pg', 'ujians.table_jml_soal')
            ->editColumn('start', function($query){
                return TanggalID($query['start']).'<br><span class="badge badge-info">Sampai</span><br>'.TanggalID($query['end']);
            })
            ->editColumn('status', 'ujians.table_status')
            ->rawColumns(['action', 'status', 'matkul.nama', 'jml_pg', 'start']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Ujian $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Ujian $model)
    {
        if(Auth::user()->hasRole('Admin')){
            return $model->newQuery()->with('matkul', 'users');
        } else if(Auth::user()->hasRole('Dosen')){
            return $model->where('id_user', Auth::id())->newQuery()->with('matkul');
        } else {
            return $model->where('id_prodi', Auth::user()->id_prodi)->orWhere('id_prodi', null)->newQuery()->with('matkul');
        }
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
                        'extend' => 'reload',
                        'className' => 'btn btn-default btn-sm no-corner',
                        'text' => '<i class="fa fa-sync"></i> ' .__('auth.app.reload').''
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
            'id_mata_kuliah' => new Column(['title' => __('models/ujians.fields.id_mata_kuliah'), 'data' => 'matkul.nama']),
            'jml_pg' => new Column(['title' => 'Jumlah Soal', 'data' => 'jml_pg']),
            'start' => new Column(['title' => __('models/ujians.fields.start'), 'data' => 'start', 'class'=>'text-center']),
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