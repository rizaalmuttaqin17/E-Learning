@extends('layouts.app')
@section('title')
@lang('models/ujians.singular') @lang('crud.details')
@endsection
@section('content')
<div class="card">
    <div class="card-header">
        @if ($ujian['nama'] != null)
        <h4><i class="fas fa-exam"></i>Ujian {{ $ujian['nama'] }}</h4>
        @else
        <h4><i class="fas fa-exam"></i>Ujian {{ $ujian['matkul']['nama'] }}</h4>
        @endif
    </div>
    <div class="card-body">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Durasi Ujian : {{ $ujian['durasi'] }} Menit</li>
            <li class="list-group-item">Durasi Jumlah Soal : {{ $ujian['jml_pg'] + $ujian['jml_essay'] }} buah</li>
            <li class="list-group-item">Ujian dibuka : {{ TanggalID($ujian->start) }}</li>
            <li class="list-group-item">Ujian ditutup : {{ TanggalID($ujian->end) }}</li>
        </ul>
    </div>
    <div class="card-footer">
        @if (now() > $ujian->start && now() < $ujian->end)
        {{-- <a href="{{ route('ujians.show', $id) }}" data-target="#ambilUjian" data-toggle="modal" class='btn btn-outline-info btn-sm'><i class="fa fa-eye"></i> Ujian</a> --}}
        <a href="" class="btn btn-primary btn-lg btn-block" role="button" aria-pressed="true" data-target="#ambilUjian" data-toggle="modal">START</a>
        <a href="{{ route('ujians.index') }}" class="btn btn-light btn-lg btn-block" role="button" aria-pressed="true">@lang('crud.cancel')</a>
        @elseif (now() < $ujian->start)
        <a onclick="goBack()" class="btn btn-warning btn-lg btn-block" role="button" aria-pressed="true">UJIAN BELUM DIBUKA - KEMBALI</a>
        @elseif(now() > $ujian->end)
        <a onclick="goBack()" class="btn btn-danger btn-lg btn-block" role="button" aria-pressed="true">UJIAN SUDAH DITUTUP - KEMBALI</a>
        @endif
    </div>
</div>

<script type="text/javascript">
    function goBack() {
        window.history.back();
    }
</script>
@include('ujians.modals.ambil_ujian')

@endsection