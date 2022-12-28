@role('Admin')
{!! Form::open(['route' => ['ujians.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('ujians.show', $id) }}" class='btn btn-light btn-xs'>
        <i class="fa fa-eye"></i>
    </a>
    <a href="{{ route('ujians.edit', $id) }}" class='btn btn-light btn-xs'>
        <i class="fa fa-edit"></i>
    </a>
    {!! Form::button('<i class="fa fa-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => 'return confirm("'.__('crud.are_you_sure').'")'
    ]) !!}
</div>
{!! Form::close() !!}
@endrole
@role('Mahasiswa')
    <a href="{{ route('ujians.mahasiswa-ujian', $id) }}" class='btn btn-light btn-xs'>
        <i class="fa fa-edit"></i> Ujian
    </a>
@endrole