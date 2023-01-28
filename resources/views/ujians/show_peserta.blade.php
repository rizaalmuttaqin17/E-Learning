@extends('layouts.app')
@section('title')
Peserta Ujian
@endsection
@section('content')
@section('css')
@include('layouts.datatables_css')
@endsection
<div class="section">
    <div class="section-header">
        <h1>Daftar Peserta Ujian {{ $ujian['matkul']['nama'] }}</h1>
        <div class="section-header-breadcrumb">
            <a href="{{ url()->previous() }}" class="btn btn-primary">@lang('crud.back')</a>
        </div>
    </div>
    <div class="section-body">
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
                    <li class="list-group-item">Durasi Jumlah Soal : {{ $ujian['jml_pg'] + $ujian['jml_essay'] }} buah
                    </li>
                    <li class="list-group-item">Ujian dibuka : {{ TanggalID($ujian->start) }}</li>
                    <li class="list-group-item">Ujian ditutup : {{ TanggalID($ujian->end) }}</li>
                </ul>
            </div>
            {!! $dataTable->table(['width' => '100%', 'class' => 'table table-striped table-bordered']) !!}

            <div class="card-footer">
            </div>
        </div>
        <div class="card">
            <div class="card-header">List Mahasiswa Yang Mengikuti Ujian</div>
            <div class="card-body">
                @push('scripts')
                @include('layouts.datatables_js')
                {!! $dataTable->scripts() !!}
                @endpush
            </div>
        </div>
    </div>
</div>

@endsection