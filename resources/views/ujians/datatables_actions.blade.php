p@role('Admin')
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
        $soal = App\Models\Soal::select('id')->where('id_ujian', $id)->first();
        $pilihan = App\Models\Pilihan::select('id', 'benar')->where('id_soal', $soal['id'])->get();
        foreach ($pilihan as $item) {
            $jawaban = App\Models\Jawaban::select('id', 'id_pilihan')->where('id_user', \Auth::user()->id)->orWhere('id_soal', $soal['id'])->orWhere('id_pilihan', $item['id'])->get();
        }
    @endphp
    @if ($jawaban != null)
        <a href="{{ route('ujians.mahasiswa-ujian', $id) }}" class='btn btn-light btn-xs'>
            <i class="fa fa-edit"></i> Ujian
        </a>
    @else
        <p>{{ $nilai/count($jawaban) }}</p>
    @endif
@endrole