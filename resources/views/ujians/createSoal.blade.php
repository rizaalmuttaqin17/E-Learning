@extends('layouts.app')
@section('title')
    Tambah Soal Ujian {{ $ujian['matkul']['nama'] }}
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading m-0">Soal Ujian {{ $ujian['matkul']['nama'] }}</h3>
            <div class="filter-container section-header-breadcrumb row justify-content-md-end">
                <a href="{{ route('ujians.index') }}" class="btn btn-primary">@lang('crud.back')</a>
            </div>
        </div>
        <div class="section-body">
            <h3 class="section-title">Soal Terisi {{ $ujian['soals']->count() }} dari {{ $ujian['jumlah_soal'] }}</h3>
            <p class="section-lead">Tambahkan Soal, Sistem akan otomatis berpindah halaman jika sudah terisi semua</p>
        </div>
        <div class="content">
            @include('stisla-templates::common.errors')
            <div class="section-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 style="color: unset">Pertanyaan Ke {{ $ujian['soals']->count() + 1 }}</h4>
                            </div>
                            <div class="card-body ">
                            {!! Form::model($ujian, ['route' => ['ujians.updateSoal', $ujian->id], 'method' => 'patch', 'autocomplete' => 'off']) !!}
                                <div class="row">
                                    @include('ujians.soal')
                                </div>
                            {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@push('scripts')
<script>
    $(document).ready(function () {
        $('#pertanyaan').summernote({
            tabsize: 5,
            dialogsInBody: true,
            height: 200,
            focus: true
        });
    });
</script>
@endpush

@endsection

