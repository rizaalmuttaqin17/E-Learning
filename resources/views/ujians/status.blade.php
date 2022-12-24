{!! Form::open(['route' => ['ujians.changeStatus', $id], 'method' => 'post', 'id' => 'ubah_status']) !!}
@if ($status == '1')
    <input type="text" name="status" value="0" id="status" hidden>
@else
    <input type="text" name="status" value="1" id="status" hidden>
@endif
    {!! Form::button($status == '1' ? 'Ujian Selesai' : 'Berjalan', [
        'id' => 'status_selesai',
        'type' => 'submit',
        'class' => ['btn',  $status == '1' ? 'btn-success' : 'btn-danger', 'showSweetAlert' ],
        'onclick' => 'return false'
    ]) !!}
{!! Form::close() !!}