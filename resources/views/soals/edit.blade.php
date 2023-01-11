@extends('layouts.app')
@section('title')
@lang('crud.edit') @lang('models/soals.singular')
@endsection
@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading m-0">@lang('crud.edit') @lang('models/soals.singular')</h3>
        <div class="filter-container section-header-breadcrumb row justify-content-md-end">
            <a href="{{ url()->previous() }}" class="btn btn-primary">@lang('crud.back')</a>
        </div>
    </div>
    <div class="section-body">
        <h3 class="section-title">Edit Soal Ujian Mata Kuliah {{ $soal['ujian']['matkul']['nama'] }}</h3>
    </div>
    <div class="content">
        @include('stisla-templates::common.errors')
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Soal {{ $soal['tipeSoal']['nama'] }}</h4>
                        </div>
                            <div class="tab-content" id="myTabContent">
                                @if ($soal['id_tipe_soal'] == 1)
                                <div class="tab-pane fade show active" id="pilgan" role="tabpanel" aria-labelledby="pilgan-tab">
                                    {!! Form::model($soal, ['route' => ['ujians.updateSoal', $soal->id], 'method' => 'patch']) !!}
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    @include('soals.fields_pilgan')
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                                @elseif($soal['id_tipe_soal'] == 2)
                                <div class="tab-pane fade" id="essay" role="tabpanel" aria-labelledby="essay-tab">
                                    {!! Form::model($soal, ['route' => ['ujians.updateSoal', $soal->id], 'method' => 'patch']) !!}
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    @include('soals.fields')
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                                @endif
                            </div>
                        </div>
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
            focus: true
        });
        $('.pilihan').summernote({
            tabsize: 3,
            dialogsInBody: true,
            height: 100,
            focus: true
        });
    });
</script>
@endpush
@endsection