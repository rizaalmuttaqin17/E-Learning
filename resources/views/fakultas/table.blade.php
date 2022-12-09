<div class="table-responsive">
    <table class="table" id="fakultas-table">
        <thead>
            <tr>
                <th>@lang('models/fakultas.fields.kode')</th>
        <th>@lang('models/fakultas.fields.nama')</th>
                <th colspan="3">@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($fakultas as $fakultas)
            <tr>
                       <td>{{ $fakultas->kode }}</td>
            <td>{{ $fakultas->nama }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['fakultas.destroy', $fakultas->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('fakultas.show', [$fakultas->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('fakultas.edit', [$fakultas->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
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
