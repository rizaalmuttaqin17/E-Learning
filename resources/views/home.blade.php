@extends('layouts.app')
@section('title')
    Dashboard
@endsection
@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Dashboard</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-3">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Pengguna</h4>
                        </div>
                        <div class="card-body">
                            {{ $user }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-info">
                        <i class="fas fa-list-ol"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Ujian</h4>
                        </div>
                        <div class="card-body">
                            {{ $ujian }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="fas fa-user-graduate"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Mahasiswa</h4>
                        </div>
                        <div class="card-body">
                            {{ $mahasiswa }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-dark">
                        <i class="fas fa-chalkboard-teacher"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Dosen</h4>
                        </div>
                        <div class="card-body">
                            {{ $dosen }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection