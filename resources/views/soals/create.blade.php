@extends('layouts.app')
@section('title')
    @lang('crud.add_new') @lang('models/soals.singular')
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading m-0">@lang('crud.add_new') @lang('models/soals.singular')</h3>
            <div class="filter-container section-header-breadcrumb row justify-content-md-end">
                <a href="{{ route('soals.index') }}" class="btn btn-primary">@lang('crud.back')</a>
            </div>
        </div>
        <div class="content">
            @include('stisla-templates::common.errors')
            <div class="section-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Pilih Tipe Soal</h4>
                            </div>
                            <div class="card-body ">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="pilgan-tab" data-toggle="tab" href="#pilgan" role="tab" aria-controls="pilgan" aria-selected="true">Pilihan Ganda</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="essay-tab" data-toggle="tab" href="#essay" role="tab" aria-controls="essay" aria-selected="false">Essay</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="pilgan" role="tabpanel" aria-labelledby="pilgan-tab">
                                        {!! Form::open(['route' => 'soals.store']) !!}
                                        <div class="row">
                                            @include('soals.fields_pilgan')
                                        </div>
                                        {!! Form::close() !!}
                                    </div>
                                    <div class="tab-pane fade" id="essay" role="tabpanel" aria-labelledby="essay-tab">
                                        {!! Form::open(['route' => 'soals.store']) !!}
                                        <div class="row">
                                            @include('soals.fields')
                                        </div>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

