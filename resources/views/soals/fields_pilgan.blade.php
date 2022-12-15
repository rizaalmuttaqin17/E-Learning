<!-- Id Tipe Soal Field -->
<div class="form-group col-sm-3" hidden>
    {!! Form::label('id_tipe_soal', __('models/soals.fields.id_tipe_soal').':') !!}
    {{-- {!! Form::select('id_tipe_soal', $tipeSoal, null, ['class' => 'id_tipe_soal form-control', 'required', 'placeholder'=>'Pilih Tipe Soal']) !!} --}}
    <select name="id_tipe_soal" id="id_tipe_soal" class="id_tipe_soal form-control">
        <option value="1" selected>Pilihan Ganda</option>
    </select>
</div>

<!-- Id Ujian Field -->
<div class="form-group col-sm-4">
    {!! Form::label('id_ujian', __('models/soals.fields.id_ujian').':') !!}
    <select name="id_ujian" id="id_ujian" class="id_ujian form-control">
        @foreach ($ujian as $item)
            <option value="{{ $item['id'] }}">{{ $item['matkul']['nama'] }} - {{ $item['tipe_ujian'] }} {{ $item['semester'] }}</option>
        @endforeach
    </select>
</div>

<!-- Pertanyaan Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('pertanyaan', __('models/soals.fields.pertanyaan').':') !!}
    {!! Form::textarea('pertanyaan', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6 col-lg-6">
    {!! Form::label('pilihan[]', __('models/soals.fields.pilihan1').':') !!}
    {!! Form::text('pilihan[]', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6 col-lg-6">
    {!! Form::label('pilihan[]', __('models/soals.fields.pilihan2').':') !!}
    {!! Form::text('pilihan[]', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6 col-lg-6">
    {!! Form::label('pilihan[]', __('models/soals.fields.pilihan3').':') !!}
    {!! Form::text('pilihan[]', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6 col-lg-6">
    {!! Form::label('pilihan[]', __('models/soals.fields.pilihan4').':') !!}
    {!! Form::text('pilihan[]', null, ['class' => 'form-control']) !!}
</div>

<!-- Nilai Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nilai', __('models/soals.fields.nilai').':') !!}
    {!! Form::number('nilai', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('soals.index') }}" class="btn btn-light">@lang('crud.cancel')</a>
</div>
