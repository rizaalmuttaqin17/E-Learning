<?php

namespace App\DataTables;

use App\Models\User;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

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

        return $dataTable->addColumn('action', 'users.datatables_actions');
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
            'name' => new Column(['title' => __('models/users.fields.name'), 'data' => 'name']),
            'email' => new Column(['title' => __('models/users.fields.email'), 'data' => 'email']),
            'email_verified_at' => new Column(['title' => __('models/users.fields.email_verified_at'), 'data' => 'email_verified_at']),
            'password' => new Column(['title' => __('models/users.fields.password'), 'data' => 'password']),
            'remember_token' => new Column(['title' => __('models/users.fields.remember_token'), 'data' => 'remember_token']),
            'foto' => new Column(['title' => __('models/users.fields.foto'), 'data' => 'foto']),
            'agama' => new Column(['title' => __('models/users.fields.agama'), 'data' => 'agama']),
            'alamat' => new Column(['title' => __('models/users.fields.alamat'), 'data' => 'alamat']),
            'telepon' => new Column(['title' => __('models/users.fields.telepon'), 'data' => 'telepon']),
            'tempat_lahir' => new Column(['title' => __('models/users.fields.tempat_lahir'), 'data' => 'tempat_lahir']),
            'tanggal_lahir' => new Column(['title' => __('models/users.fields.tanggal_lahir'), 'data' => 'tanggal_lahir']),
            'no_induk' => new Column(['title' => __('models/users.fields.no_induk'), 'data' => 'no_induk'])
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
