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
            <div class="card-footer">
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h4><i class="fas fa-exam"></i>List Peserta Selesai Ujian</h4>
            </div>
            <div class="card-body">
                <div class="table table-striped">
                    <table class="table">
                        <thead>
                            <tr>
                                <td>No.</td>
                                <td>Nama Peserta</td>
                                <td>NIM</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item['name'] }}</td>
                                <td>{{ $item['no_induk'] }}</td>
                                <td>
                                    <a href="{{ route('ujians.showUjianPeserta', ['id' => $item['id'], 'idUjian' => $ujian['id']]) }}" class='btn btn-outline-info btn-sm'><i class="fa fa-eye"></i> Lihat Ujian</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script type="text/javascript">
    function confirmDelete() {
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                $('#form_id').submit();
            } 
        });
    }
</script>
@endpush
@endsection