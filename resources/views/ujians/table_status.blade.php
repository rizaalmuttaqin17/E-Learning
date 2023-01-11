{!! Form::open(['route' => ['ujians.changeStatus', $id], 'method' => 'post', 'id' => 'ubah_status']) !!}
@if ($status == '1')
    <input type="text" name="status" value="0" id="status" hidden>
@else
    <input type="text" name="status" value="1" id="status" hidden>
@endif
@role(['Admin', 'Dosen'])
    {!! Form::button($status == '1' ? 'Ujian Selesai' : 'Berjalan', [
        'id' => 'status_selesai',
        'type' => 'submit',
        'class' => ['btn',  $status == '1' ? 'btn-success' : 'btn-danger' ],
        'onclick' => 'return confirm("'.__('crud.are_you_sure').'")'
    ]) !!}
@endrole
@role('Mahasiswa')
    <div class="badge {{ $status == '1' ? 'badge-success' : 'badge-info' }}"><i class="fa fa-book-open"></i> &nbsp; {{ $status == '1' ? ' Selesai' : ' Berjalan' }}</div>
@endrole
{!! Form::close() !!}