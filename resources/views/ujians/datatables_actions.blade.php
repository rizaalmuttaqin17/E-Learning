@role('Admin')
{!! Form::open(['route' => ['ujians.destroy', $id], 'method' => 'delete', 'id' => 'form_id']) !!}
<div class='btn-group'>
    <a href="{{ route('ujians.show', $id) }}" class='btn btn-light btn-xs'>
        <i class="fa fa-eye"></i>
    </a>
    <a href="{{ route('ujians.edit', $id) }}" class='btn btn-light btn-xs'>
        <i class="fa fa-edit"></i>
    </a>
    {!! Form::button('<i class="fa fa-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs', 
        'onclick' => 'event.preventDefault();confirmDelete()'
    ]) !!}
</div>
{!! Form::close() !!}
@endrole
@role('Mahasiswa')
    @php
        $jawaban = DB::table('soal')
                ->where('id_ujian', $id)
                ->join('pilihan', 'pilihan.id_soal', '=', 'soal.id')
                ->join('jawaban', 'jawaban.id_pilihan', '=', 'pilihan.id')
                ->where('pilihan.benar', 'true')
                ->where('jawaban.id_user', Auth::id())->get();
        $soal = DB::table('soal')
                ->where('id_ujian', $id)
                ->join('pilihan', 'pilihan.id_soal', '=', 'soal.id')
                ->join('jawaban', 'jawaban.id_pilihan', '=', 'pilihan.id')
                ->where('jawaban.id_user', Auth::id())->get();
    @endphp
    @if ($jawaban != null)
        <p>{{ $nilai/count($soal)*count($jawaban) }}</p>
    @else
        <a href="{{ route('ujians.mahasiswa-ujian', $id) }}" class='btn btn-light btn-xs'>
            <i class="fa fa-edit"></i> Ujian
        </a>
    @endif
@endrole