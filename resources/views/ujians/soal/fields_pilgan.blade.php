<!-- Id Tipe Soal Field -->
<div class="form-group col-sm-3" hidden>
    {!! Form::label('id_tipe_soal', __('models/soals.fields.id_tipe_soal').':') !!}
    {{-- {!! Form::select('id_tipe_soal', $tipeSoal, null, ['class' => 'id_tipe_soal form-control', 'required', 'placeholder'=>'Pilih Tipe Soal']) !!} --}}
    <select name="id_tipe_soal" id="id_tipe_soal" class="id_tipe_soal form-control">
        <option value="1" selected>Pilihan Ganda</option>
    </select>
    <input type="text" name="id_ujian" id="id_ujian" value="{{ $ujian['id'] }}">
</div>

<!-- Pertanyaan Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('pertanyaan', __('models/soals.fields.pertanyaan').':') !!}
    {!! Form::textarea('pertanyaan', null, ['class' => 'form-control pertanyaan', 'id'=>'pertanyaan']) !!}
</div>

@for($i = 0; $i <= 4; $i++)
<div class="form-group col-sm-6 col-lg-6">
    {!! Form::label('pilihan', __('models/soals.fields.pilihan'.$i.'').'') !!}
    <div class="row">
        <div class="col-sm-10 col-lg-10">
            {!! Form::textarea('pilihan['.$i.']', null, ['class' => 'form-control pilihan']) !!}
        </div>
        <div class="col-sm-2 col-lg-2 align-self-center">
            {!! Form::label('benars', 'Benar?') !!}
            {!! Form::checkbox('benar['.$i.']', false, false, ['class' => 'form-control']) !!}
            {{-- <input type="radio" name="benar[]" id="benar[{{ $i }}]" class="benar form-control" required> --}}
        </div>
    </div>
</div>
@endfor

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('ujians.index') }}" class="btn btn-light">@lang('crud.cancel')</a>
</div>