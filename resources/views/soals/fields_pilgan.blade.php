<!-- Id Tipe Soal Field -->
<div class="form-group col-sm-3" hidden>
    {!! Form::label('id_tipe_soal', __('models/soals.fields.id_tipe_soal').':') !!}
    {{-- {!! Form::select('id_tipe_soal', $tipeSoal, null, ['class' => 'id_tipe_soal form-control', 'required', 'placeholder'=>'Pilih Tipe Soal']) !!} --}}
    <select name="id_tipe_soal" id="id_tipe_soal" class="id_tipe_soal form-control">
        <option value="1" selected>Pilihan Ganda</option>
    </select>
    <input type="text" name="id_ujian" id="id_ujian" value="{{ $soal['id_ujian'] }}">
</div>

<!-- Pertanyaan Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('pertanyaan', __('models/soals.fields.pertanyaan').':') !!}
    {!! Form::textarea('pertanyaan', isset($soal['pertanyaan'])&&!is_null($soal['pertanyaan'])?$soal['pertanyaan']:null, ['class' => 'form-control pertanyaan', 'id'=>'pertanyaan']) !!}
</div>

<div class="form-group col-sm-12 col-lg-12">
    {{-- @foreach($soal['pilihan']->chunk(2) as $row) --}}
    <div class="row">
        @foreach($soal['pilihan'] as $pilihan)
        <div class="col-sm- col-lg-5">
            {!! Form::label('pilihan[]', __('models/soals.fields.pilihan'.$loop->index.'')) !!}
            {!! Form::text('pilihanId['.$loop->index.']', $pilihan['id'], ['class' => 'form-control', 'hidden']) !!}
            {!! Form::textarea('pilihan['.$loop->index.']', isset($pilihan['pilihan'])&&!is_null($pilihan['pilihan'])?$pilihan['pilihan']:null, ['class' => 'form-control pilihan']) !!}
        </div>
        <div class="col-sm-1 col-lg-1 text-center align-self-center">
            {!! Form::label('benar', 'Benar?') !!}
            @if ($pilihan['benar'] == 'true')
            {!! Form::checkbox('benar['.$loop->index.']', false, true, ['class' => 'form-control']) !!}
            @else
            {!! Form::checkbox('benar['.$loop->index.']', false, false, ['class' => 'form-control']) !!}
            @endif
        </div>
        @endforeach
    </div>
    {{-- @endforeach --}}
</div>

<style>
    .note-editor {
        z-index: 2000;
    }
    
</style>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ url()->previous() }}" class="btn btn-light">@lang('crud.cancel')</a>
</div>