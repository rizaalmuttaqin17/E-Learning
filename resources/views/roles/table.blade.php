<div class="table-responsive">
    <table class="table" id="roles-table">
        <thead>
            <tr>
                <th>@lang('models/roles.fields.name')</th>
        <th>@lang('models/roles.fields.guard_name')</th>
                <th colspan="3">@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($roles as $role)
            <tr>
                       <td>{{ $role->name }}</td>
            <td>{{ $role->guard_name }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['roles.destroy', $role->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('roles.show', [$role->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('roles.edit', [$role->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
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
