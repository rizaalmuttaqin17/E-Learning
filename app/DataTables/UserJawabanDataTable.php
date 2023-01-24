<?php

namespace App\DataTables;

use App\Models\Jawaban;
use App\Models\Soal;
use App\Models\User;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;
use Carbon\Carbon;

class UserJawabanDataTable extends DataTable
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
        ->addColumn('action', 'ujians.table_actions')
        ->editColumn('name', function($query){
            return $query['name']."</br><span class='badge badge-info'>".$query['email']."</span>";
        })
        ->rawColumns(['name','action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
    {
        $soals = Soal::select('id')->where('id_ujian', $this->attributes['id'])->get();
        $jawaban = Jawaban::select('id_user')->whereIn('id_soal', $soals)->get();
        
        return $model->newQuery()->whereIn('id', $jawaban);
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
                        'extend' => 'export',
                        'className' => 'btn btn-icon btn-warning btn-sm',
                        'text' => '<i class="fa fa-download"></i> ' .__('auth.app.export').''
                    ],
                    [
                        'extend' => 'reload',
                        'className' => 'btn btn-icon btn-success btn-sm',
                        'text' => '<i class="fa fa-undo"></i> ' .__('auth.app.reload').''
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
            'name' => new Column(['title' => __('models/users.fields.name'), 'data' => 'name']),
            'no_induk' => new Column(['title' => __('models/users.fields.no_induk'), 'data' => 'no_induk']),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'users_datatable_' . time();
    }
}
