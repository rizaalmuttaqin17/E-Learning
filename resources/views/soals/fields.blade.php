<!-- Id Ujian Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_ujian', __('models/soals.fields.id_ujian').':') !!}
    {!! Form::number('id_ujian', null, ['class' => 'form-control']) !!}
</div>

<!-- Id Tipe Soal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_tipe_soal', __('models/soals.fields.id_tipe_soal').':') !!}
    {!! Form::number('id_tipe_soal', null, ['class' => 'form-control']) !!}
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
