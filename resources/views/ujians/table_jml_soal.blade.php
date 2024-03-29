@php
    $totalPG = \App\Models\Soal::select('id')->where('id_ujian', $id)->where('id_tipe_soal', 1)->get();
    $totalEssay = \App\Models\Soal::where('id_ujian', $id)->where('id_tipe_soal', 2)->get();
@endphp
@role('Mahasiswa')
    @if (count($totalPG) < $jml_pg)
        Pilihan Ganda : <b>{{ $totalPG != null ? count($totalPG) : '0' }}</b><br>
    @else
        Pilihan Ganda : <b>{{ $jml_pg }}</b><br>
    @endif

    @if (count($totalEssay) < $jml_essay)
        Essay : <b>{{ $totalEssay != null ? count($totalEssay) : '0' }}</b>
    @else
        Essay : <b>{{ $jml_essay }}</b>
    @endif
@endrole
@role('Admin|Dosen')
    Pilihan Ganda : <b>{{ $totalPG != null ? count($totalPG) : '0' }}</b> dari <b>{{ $jml_pg }}</b><br>
    Essay : <b>{{ $totalEssay != null ? count($totalEssay) : '0' }}</b> dari <b>{{ $jml_essay }}</b><br><br>
    <a href="{{ route('ujians.createSoal', $id) }}" class="btn btn-icon btn-outline-success btn-sm"><i class="fas fa-plus"></i> Tambah Soal</a>
    <a href="{{ route('ujians.edit-soal', $id) }}" class="btn btn-icon btn-outline-info btn-sm"><i class="fas fa-edit"></i> Edit Soal</a>
@endrole