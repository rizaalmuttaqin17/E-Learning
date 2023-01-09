@php
$totalPG = \App\Models\Soal::select('id')->where('id_ujian', $id)->where('id_tipe_soal', 1)->get();
$totalEssay = \App\Models\Soal::where('id_ujian', $id)->where('id_tipe_soal', 2)->get();
@endphp
Pilihan Ganda : {{ $totalPG != null ? count($totalPG) : '0' }} <br>
Essay : {{ $totalEssay != null ? count($totalEssay) : '0' }}