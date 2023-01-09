@extends('layouts.app')
@section('title')
@lang('crud.edit') @lang('models/ujians.singular')
@endsection
@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading m-0">Edit Soal Ujian {{ $ujian['matkul']['nama'] }}</h3>
        <div class="filter-container section-header-breadcrumb row justify-content-md-end">
            <a href="{{ route('ujians.index') }}" class="btn btn-primary">@lang('crud.back')</a>
        </div>
    </div>
    <div class="section-body">
        <h3 class="section-title">Ujian {{ $ujian['matkul']['nama'] }}</h3>
    </div>
    <div class="content">
        @include('stisla-templates::common.errors')
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        @livewire('edit-soal', ['id' => $id])
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
    $(document).ready(function () {
        $('.pertanyaan').summernote({
            tabsize: 5,
            dialogsInBody: true,
            height: 200,
            focus: true
        });
        $('.pilihan').summernote({
            tabsize: 5,
            dialogsInBody: true,
            height: 50,
            focus: true
        });
    });
</script>
<script type="text/javascript">
    $("input[type='checkbox']").click(function(e) {
        var checked = $(this).attr("checked");
        if(!checked){
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
@endpush

@stop
