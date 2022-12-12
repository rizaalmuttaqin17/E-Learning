<div class="table-responsive">
    <table class="table" id="pilihans-table">
        <thead>
            <tr>
                <th>No.</th>
                <th>@lang('models/pilihans.fields.id_soal')</th>
                <th>@lang('models/pilihans.fields.pilihan')</th>
                <th>@lang('models/pilihans.fields.benar')</th>
                <th>@lang('models/pilihans.fields.nilai')</th>
                <th colspan="3">@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($pilihans as $pilihan)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $pilihan->id_soal }}</td>
                <td>{{ $pilihan->pilihan }}</td>
                <td>{{ $pilihan->benar }}</td>
                <td>{{ $pilihan->nilai }}</td>
                <td class=" text-center">
                    {!! Form::open(['route' => ['pilihans.destroy', $pilihan->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('pilihans.show', [$pilihan->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                        <a href="{!! route('pilihans.edit', [$pilihan->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("'.__('crud.are_you_sure').'")']) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
