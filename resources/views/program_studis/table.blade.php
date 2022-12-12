<div class="table-responsive">
    <table class="table" id="programStudis-table">
        <thead class=" text-center">
            <tr>
                <th>No.</th>
                <th>@lang('models/programStudis.fields.id_fakultas')</th>
                <th>@lang('models/programStudis.fields.kode')</th>
                <th>@lang('models/programStudis.fields.nama')</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($programStudis as $programStudi)
            <tr>
                <td class=" text-center">{{ $loop->iteration }}</td>
                <td>{{ $programStudi['fakultas']['nama'] }}</td>
                <td class=" text-center">{{ $programStudi->kode }}</td>
                <td>{{ $programStudi->nama }}</td>
                <td class=" text-center">
                    {!! Form::open(['route' => ['programStudis.destroy', $programStudi->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('programStudis.show', [$programStudi->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                        <a href="{!! route('programStudis.edit', [$programStudi->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("'.__('crud.are_you_sure').'")']) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
