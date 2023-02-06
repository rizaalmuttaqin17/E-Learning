@if ($model['soals']['id_tipe_soal'] == 1)
{!! Form::open(['route' => ['jawabans.destroy', $model['id']], 'method' => 'delete', 'id' => 'form_id']) !!}
{!! Form::button('<i class="fa fa-trash"></i>', [
    'type' => 'submit',
    'class' => 'btn btn-danger btn-lg btn-block',
    'onclick' => 'return confirm("'.__('crud.are_you_sure').'")'
]) !!}
{!! Form::close() !!}
@else
<a href="" class="btn btn-outline-primary btn-lg btn-block" role="button" aria-pressed="true" data-target="#isiNilai{{ $model['id'] }}" data-toggle="modal">Isi Nilai</a>
{!! Form::open(['route' => ['jawabans.destroy', $model['id']], 'method' => 'delete', 'id' => 'form_id']) !!}
{!! Form::button('<i class="fa fa-trash"></i>', [
    'type' => 'submit',
    'class' => 'btn btn-danger btn-lg btn-block',
    'onclick' => 'return confirm("'.__('crud.are_you_sure').'")'
]) !!}
{!! Form::close() !!}
@include('ujians.modals.nilai_soal')
@endif
