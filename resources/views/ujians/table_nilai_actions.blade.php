@if ($model['soals']['id_tipe_soal'] == 1)
@else
<a href="" class="btn btn-outline-primary btn-lg btn-block" role="button" aria-pressed="true" data-target="#isiNilai{{ $model['id'] }}" data-toggle="modal">Isi Nilai</a>
@include('ujians.modals.nilai_soal')
@endif