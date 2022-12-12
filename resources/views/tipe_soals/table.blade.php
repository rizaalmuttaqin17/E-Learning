<div class="table-responsive">
    <table class="table" id="tipeSoals-table">
        <thead>
            <tr>
                <th>No.</th>
                <th>@lang('models/tipeSoals.fields.nama')</th>
                <th colspan="3">@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($tipeSoals as $tipeSoal)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $tipeSoal->nama }}</td>
                <td class=" text-center">
                    {!! Form::open(['route' => ['tipeSoals.destroy', $tipeSoal->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('tipeSoals.show', [$tipeSoal->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                        <a href="{!! route('tipeSoals.edit', [$tipeSoal->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("'.__('crud.are_you_sure').'")']) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
