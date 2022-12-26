@role(['Admin', 'Dosen'])
    <p>Terisi : {{ $model['soals']->count() }} dari {{ $jumlah_soal }}</p>
    <a href="{{ route('ujians.createSoal', $id) }}" class="btn btn-sm btn-outline-success form-btn"><p class="mb-0">Tambah Soal<i class="fas fa-plus"></i></p></a>
@endrole
@role('Mahasiswa')
    <p class="mb-0">Jumlah Soal : {{ $jumlah_soal }}</p>
@endrole