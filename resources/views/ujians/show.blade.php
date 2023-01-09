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
            @php
                if ($ujian['jml_pg'] != null || $ujian['jml_pg'] != 0 || $ujian['jml_pg'] != '0') {
                    $jml_pg = $ujian['jml_pg'];
                } else {
                    $jml_pg = 0;
                }

                if ($ujian['jml_essay'] != null || $ujian['jml_essay'] != 0 || $ujian['jml_essay'] != '0') {
                    $jml_essay = $ujian['jml_essay'];
                } else {
                    $jml_essay = 0;
                }
            @endphp
            <li class="list-group-item">Durasi Jumlah Soal : {{ $jml_pg + $jml_essay }} buah</li>
            <li class="list-group-item">Ujian dibuka : {{ TanggalID($ujian->start) }}</li>
            <li class="list-group-item">Ujian ditutup : {{ TanggalID($ujian->end) }}</li>
        </ul>
    </div>
    <div class="card-footer">
        @if (now() > $ujian->start && now() < $ujian->end)
        <a href="{{ route('ujians.index', $ujian->id) }}" class="btn btn-primary btn-lg btn-block" role="button" aria-pressed="true">START</a>
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
@endsection