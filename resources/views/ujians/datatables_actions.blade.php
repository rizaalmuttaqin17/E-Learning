@role('Admin|Dosen')
{!! Form::open(['route' => ['ujians.destroy', $id], 'method' => 'delete', 'id' => 'form_id']) !!}
<div class='d-flex'>
    <a href="{{ route('ujians.showPeserta', $id) }}" class='btn btn-outline-info btn-sm'><i class="fa fa-eye"></i></a>
    <button type="button" class="btn btn-outline-warning dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-exclamation-triangle"></i></button>
    <div class="dropdown-menu">
        <a href="{{ route('ujians.edit', $id) }}" class='dropdown-item has-icon'><i class="fa fa-edit"></i> Edit</a>
        <a href="" type="submit" class="dropdown-item has-icon" onclick="event.preventDefault();confirmDelete()"><i class="fa fa-trash"></i> Hapus</a>
    </div>
</div>
{!! Form::close() !!}
@endrole
@role('Mahasiswa')
    {{-- <a href="{{ route('ujians.mahasiswa-ujian', $id) }}" class='btn btn-light btn-xs'><i class="fa fa-edit"></i>Ujian</a> --}}
    <a href="{{ route('ujians.show', $id) }}" class='btn btn-outline-info btn-sm'><i class="fa fa-eye"></i> Ujian</a>
@endrole