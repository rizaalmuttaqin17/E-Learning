<!-- Id Ujian Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_ujian', __('models/soals.fields.id_ujian').':') !!}
    {{-- {!! Form::select('id_ujian', $ujian, null, ['class' => 'id_ujian form-control', 'required', 'placeholder'=>'Pilih Ujian']) !!} --}}
    <select name="id_ujian" id="id_ujian" class="id_ujian form-control">
        @foreach ($ujian as $item)
            <option value="{{ $item['id'] }}">{{ $item['matkul']['nama'] }} - {{ $item['tipe_ujian'] }} Semester</option>
        @endforeach
    </select>
</div>

<!-- Id Tipe Soal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_tipe_soal', __('models/soals.fields.id_tipe_soal').':') !!}
    {!! Form::select('id_tipe_soal', $tipeSoal, null, ['class' => 'id_tipe_soal form-control', 'required', 'placeholder'=>'Pilih Tipe Soal']) !!}
</div>

<!-- Pertanyaan Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('pertanyaan', __('models/soals.fields.pertanyaan').':') !!}
    {!! Form::textarea('pertanyaan', null, ['class' => 'form-control']) !!}
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
