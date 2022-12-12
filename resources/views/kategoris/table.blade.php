<div class="table-responsive">
    <table class="table" id="kategoris-table">
        <thead>
            <tr>
                <th>@lang('models/kategoris.fields.nama')</th>
        <th>@lang('models/kategoris.fields.slug')</th>
        <th>@lang('models/kategoris.fields.deskripsi')</th>
        <th>@lang('models/kategoris.fields.photos')</th>
        <th>@lang('models/kategoris.fields.is_active')</th>
                <th colspan="3">@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($kategoris as $kategori)
            <tr>
                       <td>{{ $kategori->nama }}</td>
            <td>{{ $kategori->slug }}</td>
            <td>{{ $kategori->deskripsi }}</td>
            <td>{{ $kategori->photos }}</td>
            <td>{{ $kategori->is_active }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['kategoris.destroy', $kategori->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('kategoris.show', [$kategori->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('kategoris.edit', [$kategori->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
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
