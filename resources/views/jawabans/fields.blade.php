<!-- Id Soal Field -->
<div class="form-group col-sm-12">
    {!! Form::label('id_soal', __('models/jawabans.fields.id_soal').':') !!}
    <input type="text" class="form-control" value="{!! $soal['pertanyaan'] !!}" disabled>
</div>

<!-- Jawaban Field -->
<div class="form-group col-sm-12">
    {!! Form::label('jawaban', __('models/jawabans.fields.jawaban').':') !!}
    {!! Form::text('jawaban', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Nilai Jawaban Field -->
<div class="form-group col-sm-3">
    {!! Form::label('nilai', __('models/jawabans.fields.nilai').':') !!}
    {!! Form::number('nilai', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Id User Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_user', __('models/jawabans.fields.id_user').':') !!}
    <input type="text" class="form-control" value="{!! $user['name'] !!} ({!! $user['no_induk'] !!})" disabled>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.update'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ url()->previous() }}" class="btn btn-light">@lang('crud.cancel')</a>
</div>
