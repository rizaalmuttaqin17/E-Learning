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
            @if ($jawaban != null)
            @if (now() < $ujian['end']) <li class="list-group-item">Nilai :
                {{ ($jawabanPG->sum('nilai') + ($jawabanEssay->sum('nilai') / $ujian['jml_essay'])) / 2 }} <i>(Nilai
                    sementara)</i></li>
                @else
                <li class="list-group-item">Nilai :
                    {{ ($jawabanPG->sum('nilai') + ($jawabanEssay->sum('nilai') / $ujian['jml_essay'])) / 2 }}</li>
                @endif
                @endif
        </ul>
    </div>
    <div class="card-footer">
        @if ($soal == null)
        <a onclick="goBack()" class="btn btn-danger btn-lg btn-block" role="button" aria-pressed="true">UJIAN BELUM SIAP
            - KEMBALI</a>
        @else
        @if (now() > $ujian->start && now() < $ujian->end)
            {{-- <a href="{{ route('ujians.show', $id) }}" data-target="#ambilUjian" data-toggle="modal" class='btn
            btn-outline-info btn-sm'><i class="fa fa-eye"></i> Ujian</a> --}}
            <a href="" class="btn btn-primary btn-lg btn-block" role="button" aria-pressed="true"
                data-target="#ambilUjian" data-toggle="modal">START</a>
            <a href="{{ route('ujians.index') }}" class="btn btn-light btn-lg btn-block" role="button"
                aria-pressed="true">@lang('crud.cancel')</a>
            @elseif (now() < $ujian->start)
                <a onclick="goBack()" class="btn btn-warning btn-lg btn-block" role="button" aria-pressed="true">UJIAN
                    BELUM DIBUKA - KEMBALI</a>
                @elseif(now() > $ujian->end)
                <a onclick="goBack()" class="btn btn-danger btn-lg btn-block" role="button" aria-pressed="true">UJIAN
                    SUDAH DITUTUP - KEMBALI</a>
                @endif
                @endif
    </div>
</div>
@role('Mahasiswa')
<div class="card">
    <div class="card-header">List Jawaban Kamu</div>
    <div class="card-body">
        @if ($jawabans == null)
            Tidak Ada Data
        @else
            <div class="table-responsive">
                <table class="table" id="jawaban-table">
                    <thead class=" text-center">
                        <tr>
                            <th>No.</th>
                            <th>@lang('models/jawabans.fields.id_user')</th>
                            <th>@lang('models/jawabans.fields.id_soal')</th>
                            <th>@lang('models/jawabans.fields.id_pilihan')</th>
                            <th>@lang('models/jawabans.fields.nilai')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($jawabans as $item)
                        <tr>
                            <td class=" text-center">{{ $loop->iteration }}</td>
                            <td class=" text-center">{{ $item['users']['name'] }}</td>
                            <td>{{ $item['soals']['pertanyaan'] }}</td>
                            <td>
                                @if ($item['id_pilihan'] == null)
                                {{ $item['jawaban'] }}
                                @else
                                {{ $item['pilihan']['pilihan'] }}
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>
@endrole
<script type="text/javascript">
    function goBack() {
        window.history.back();
    }
</script>
@include('ujians.modals.ambil_ujian')

@endsection