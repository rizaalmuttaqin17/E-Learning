@extends('layouts.app')
@section('title')
Ujian {{ $ujian['matkul']['nama'] }}
@endsection
@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading m-0"><b>Waktu Ujian <span id="timer"style="color: red">0.00</span></b></h3>
        <div class="filter-container section-header-breadcrumb row justify-content-md-end">
            <a href="{{ route('ujians.index') }}" class="btn btn-primary">@lang('crud.back')</a>
        </div>
    </div>
    <div class="section-body">
        <h3 class="section-title">Ujian {{ $ujian['matkul']['nama'] }}</h3>
        <p class="section-lead">{{ $ujian['tipe_ujian']=='UTS' ? 'Ujian Tengah Semester' : 'Ujian Akhir Semester' }} {{ $ujian['semester'] }}</p>
    </div>
    <div class="content">
        @include('stisla-templates::common.errors')
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    {{-- <div class="card"> --}}
                        @livewire('ujian', ['id' => $id])
                    {{-- </div> --}}
                </div>
            </div>
        </div>
    </div>
</section>
@stop