{!! Form::open(['route' => ['users.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('users.show', $id) }}" class='btn btn-icon btn-info btn-sm'>
        <i class="fa fa-eye"></i>
    </a>
    <a href="{{ route('users.edit', $id) }}" class='btn btn-icon btn-warning btn-sm'>
        <i class="fa fa-edit"></i>
    </a>
    {!! Form::button('<i class="fa fa-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-icon btn-danger btn-sm',
        'onclick' => 'return confirm("'.__('crud.are_you_sure').'")'
    ]) !!}
</div>
{!! Form::close() !!}
