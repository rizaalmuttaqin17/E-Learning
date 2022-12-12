<!-- Id Soal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_soal', __('models/jawabans.fields.id_soal').':') !!}
    {!! Form::number('id_soal', null, ['class' => 'form-control']) !!}
</div>

<!-- Id User Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_user', __('models/jawabans.fields.id_user').':') !!}
    {!! Form::number('id_user', null, ['class' => 'form-control']) !!}
</div>

<!-- Jawaban Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jawaban', __('models/jawabans.fields.jawaban').':') !!}
    {!! Form::text('jawaban', null, ['class' => 'form-control']) !!}
</div>

<!-- Jawaban Benar Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jawaban_benar', __('models/jawabans.fields.jawaban_benar').':') !!}
    {!! Form::text('jawaban_benar', null, ['class' => 'form-control']) !!}
</div>

<!-- Nilai Jawaban Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nilai_jawaban', __('models/jawabans.fields.nilai_jawaban').':') !!}
    {!! Form::number('nilai_jawaban', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('jawabans.index') }}" class="btn btn-light">@lang('crud.cancel')</a>
</div>
