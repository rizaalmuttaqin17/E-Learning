<div class="table-responsive">
    <table class="table" id="users-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Tempat, Tanggal Lahir</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Jenis Kelamin</th>
                <th>Agama</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        @php
            $no = 1;
        @endphp
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{!! $no++ !!}</td>
                <td>
                    {{ $user->name }} <br>
                    {{ $user->email }}
                </td>
                <td class=" text-center">
                    {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('users.show', [$user->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                        <a href="{!! route('users.edit', [$user->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("'.__('crud.are_you_sure').'")']) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
