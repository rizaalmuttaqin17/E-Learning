<?php

namespace App\DataTables;

use App\Models\User;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;
use Carbon\Carbon;

class UserDataTable extends DataTable
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
        ->editColumn('name', function($query){
            return $query['name']."</br><span class='badge badge-info'>".$query['email']."</span>";
        })
        ->editColumn('tempat_lahir', function($query){
            if($query['tanggal_lahir'] == null){
                return '-';
            } else {
                return $query['tempat_lahir'].', '.Carbon::parse($query['tanggal_lahir'])->locale('id')->isoFormat('DD MMMM Y');
            }
        })
        ->addColumn('action', 'users.datatables_actions')
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
            'alamat' => new Column(['title' => __('models/users.fields.alamat'), 'data' => 'alamat']),
            'telepon' => new Column(['title' => __('models/users.fields.telepon'), 'data' => 'telepon']),
            'tempat_lahir' => new Column(['title' => __('models/users.fields.tempat_lahir'), 'data' => 'tempat_lahir']),
            'foto' => new Column(['title' => __('models/users.fields.foto'), 'data' => 'foto']),
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
