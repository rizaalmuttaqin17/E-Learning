<div class="table-responsive">
    <table class="table" id="permissions-table">
        <thead>
            <tr>
                <th>@lang('models/permissions.fields.name')</th>
        <th>@lang('models/permissions.fields.guard_name')</th>
                <th colspan="3">@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($permissions as $permission)
            <tr>
                       <td>{{ $permission->name }}</td>
            <td>{{ $permission->guard_name }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['permissions.destroy', $permission->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('permissions.show', [$permission->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('permissions.edit', [$permission->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
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
