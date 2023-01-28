@extends('layouts.app')
@section('title')
    Isi Nilai
@endsection
@section('content')
@section('css')
    @include('layouts.datatables_css')
@endsection
<div class="section">
    <div class="section-header">
        <h1>Isi Nilai Ujian Peserta</h1>
        <div class="section-header-breadcrumb">
            <a href="{{ url()->previous() }}" class="btn btn-primary">@lang('crud.back')</a>
        </div>
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h3>Ujian {{ $ujian['matkul']['nama'] }}</h3>
            </div>
            <div class="card-body">
                {!! $dataTable->table(['width' => '100%', 'class' => 'table table-striped table-bordered']) !!}
            
            @push('scripts')
            @include('layouts.datatables_js')
                {!! $dataTable->scripts() !!}
            @endpush
            </div>
            <div class="card-footer">
            </div>
        </div>
    </div>
</div>

@endsection