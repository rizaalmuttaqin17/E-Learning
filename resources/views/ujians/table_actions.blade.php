@php
    $idJawaban = \App\Models\Jawaban::where('id_user', $id)->first();
    $idSoal = \App\Models\Soal::where('id', $idJawaban['id_soal'])->first();
    $idUjian = \App\Models\Ujian::where('id', $idSoal['id_ujian'])->first();
@endphp
<p>{{ $idUjian }}</p>
<a href="{{ route('ujians.showUjianPeserta', ['id' => $id, 'idUjian' => $idUjian['id']]) }}" class='btn btn-outline-info btn-sm'><i class="fa fa-eye"></i> Lihat Ujian</a>