<!-- Id Tipe Soal Field -->
<div class="form-group col-sm-3" hidden>
    {!! Form::label('id_tipe_soal', __('models/soals.fields.id_tipe_soal').':') !!}
    {{-- {!! Form::select('id_tipe_soal', $tipeSoal, null, ['class' => 'id_tipe_soal form-control', 'required', 'placeholder'=>'Pilih Tipe Soal']) !!} --}}
    <select name="id_tipe_soal" id="id_tipe_soal" class="id_tipe_soal form-control">
        <option value="1" selected>Pilihan Ganda</option>
    </select>
</div>

<!-- Id Ujian Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_ujian', __('models/soals.fields.id_ujian').':') !!}
    <select name="id_ujian" id="id_ujian" class="id_ujian form-control">
        @foreach ($ujian as $item)
            <option value="{{ $item['id'] }}">{{ $item['matkul']['nama'] }} - {{ $item['tipe_ujian'] }} {{ $item['semester'] }}</option>
        @endforeach
    </select>
</div>

<!-- Nilai Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nilai', __('models/soals.fields.nilai').':') !!}
    {!! Form::number('nilai', null, ['class' => 'form-control']) !!}
</div>

<!-- Pertanyaan Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('pertanyaan', __('models/soals.fields.pertanyaan').':') !!}
    {!! Form::textarea('pertanyaan', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-12 col-lg-12">
    <div class="table-responsive">  
        <table class="table table-bordered" id="dynamicTable">
            @php
                $j = 1;
            @endphp
            <tr>
                {{-- <th>No.</th> --}}
                <th style="width: 80%">Pilihan</th>
                <th>Benar</th>
                <th>Tambah Pilihan</th>
            </tr>
            <tr>
                <td>
                    <input type="text" name="pilihan[0]" class="form-control">
                </td>
                <td>
                    <input type="radio" name="benar[0]" class="form-control">
                </td>
                <td><button type="button" name="add" id="add" class="btn btn-success">Add</button></td>  
            </tr>
        </table>  
    </div>
    {{-- {!! Form::label('pilihan[]', __('models/soals.fields.pilihan1').':') !!}
    <div class="col-sm-10 col-lg-10">
        {!! Form::text('pilihan[1]', null, ['class' => 'form-control']) !!}
    </div>
    <div class="col-sm-2 col-lg-2 align-self-center">
        <input type="radio" name="benar[]" id="benar[]" value="benar[]" class="benar form-control">
    </div> --}}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('soals.index') }}" class="btn btn-light">@lang('crud.cancel')</a>
</div>

@push('scripts')
<script type="text/javascript">
    var i = 0;
        $("#add").click(function(){
            ++i;
            $("#dynamicTable").append(
            `<tbody>
                <tr>
                    <td>
                        <input type="text" name="pilihan[`+i+`]" placeholder="Pilihan `+i+`" class="form-control" />
                    </td>
                    <td>
                        <input type="radio" name="benar[`+i+`]" placeholder="Bidang" class="form-control" />
                    </td>
                    <td>
                        <button type="button" name="addDetail" id="addDetail" class="btn btn-success addDetail">+</button>
                    </td>
                </tr>
            </tbody>`);
        });

        /* $("#addDetail").click(function(){
            ++i;
            $("#dynamicTable").append(
            '<tr><td></td><td><input type="text" name="addBarang['+i+'][no_telepon]" placeholder="No. Telepon" class="form-control" /></td><td><input type="text" name="addBarang['+i+'][bidang_id]" placeholder="Bidang" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-tr-detail">-</button></td></tr>');
        });
   
        $(document).on('click', '.remove-tr', function(){  
             $(this).parents('tbody').remove();
        });

        $(document).on('click', '.remove-tr-detail', function(){  
            $(this).parents('tr').remove();
        });

        $(document).on('click', '.addDetail', function(){  
            ++i;
            $(this).parents('tbody').append(
            '<tr><td></td><td><input type="text" name="addmore['+i+'][no_telepon]" placeholder="No. Telepon" class="form-control" /></td><td><input type="text" name="addmore['+i+'][bidang_id]" placeholder="Bidang" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-tr-detail">-</button></td></tr>');
        }); */
</script>
@endpush