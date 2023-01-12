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
            <h3 class="section-title">Soal Terisi {{ $ujian['soals']->count() }} dari {{ $ujian['jml_pg'] + $ujian['jml_essay'] }}</h3>
            <p class="section-lead">Pilihan Ganda = <b>{{ count($soalPG) }}</b> dari <b>{{ $ujian['jml_pg'] }}</b> <br> Essay = <b>{{ count($soalEssay) }}</b> dari <b>{{ $ujian['jml_essay'] }}</b></p>
            <p class="section-lead">Tambahkan Soal, Sistem akan otomatis berpindah halaman jika sudah memenuhi kuota</p>
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
                            <div class="card-body">
                                <p>Pilih Tipe Soal</p>
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="pilgan-tab" data-toggle="tab" href="#pilgan" role="tab" aria-controls="pilgan" aria-selected="true">Pilihan Ganda</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="essay-tab" data-toggle="tab" href="#essay" role="tab" aria-controls="essay" aria-selected="false">Essay</a>
                                    </li>
                                </ul>
                                <div class="tab-content tab-bordered" id="myTabContent">
                                    <div class="tab-pane fade show active" id="pilgan" role="tabpanel" aria-labelledby="pilgan-tab">
                                        {!! Form::model($ujian, ['route' => ['ujians.saveSoal', $ujian->id], 'method' => 'patch', 'autocomplete' => 'off']) !!}
                                        <div class="row">
                                            @include('ujians.soal.fields_pilgan')
                                        </div>
                                        {!! Form::close() !!}
                                    </div>
                                    <div class="tab-pane tab-bordered fade" id="essay" role="tabpanel" aria-labelledby="essay-tab">
                                        {!! Form::model($ujian, ['route' => ['ujians.saveSoal', $ujian->id], 'method' => 'patch', 'autocomplete' => 'off']) !!}
                                        <div class="row">
                                            @include('ujians.soal.fields')
                                        </div>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="card-body ">
                            {!! Form::model($ujian, ['route' => ['ujians.saveSoal', $ujian->id], 'method' => 'patch', 'autocomplete' => 'off']) !!}
                                <div class="row">
                                    @include('ujians.fieldSoal')
                                </div>
                            {!! Form::close() !!}
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @push('scripts')
    <script type="text/javascript">
        $("input[type='checkbox']").click(function (e) {
            var checked = $(this).attr("checked");
            if (!checked) {
                $("input[type='checkbox']").not(this).attr("value", 'false');
                $("input[type='checkbox']").not(this).prop("checked", false);
                $(this).prop("checked", true);
                $(this).val('true');
            } else {
                $("input[type='checkbox']").not(this).attr("value", 'false');
                $("input[type='checkbox']").not(this).prop("checked", false);
            }
        });
    </script>
    <script type="text/javascript">
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $(document).ready(function () {
            $(".id_ujian").select2({
                placeholder: "Pilih Ujian...",
                tags: true,
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $('.pertanyaan').summernote({
                tabsize: 5,
                dialogsInBody: true,
                height: 200,
                focus: true,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['insert', ['picture', 'link', 'math']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['view', ['help']],
                ],
            });
            $('.pilihan').summernote({
                tabsize: 3,
                dialogsInBody: true,
                height: 100,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['insert', ['picture', 'link', 'math']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['view', ['help']],
                ],
            });
        });
    </script>
    @endpush
@endsection

