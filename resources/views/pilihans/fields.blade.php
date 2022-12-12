<!-- Id Soal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_soal', __('models/pilihans.fields.id_soal').':') !!}
    {!! Form::number('id_soal', null, ['class' => 'form-control']) !!}
</div>

<!-- Pilihan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pilihan', __('models/pilihans.fields.pilihan').':') !!}
    {!! Form::text('pilihan', null, ['class' => 'form-control']) !!}
</div>

<!-- Benar Field -->
<div class="form-group col-sm-6">
    {!! Form::label('benar', __('models/pilihans.fields.benar').':') !!}
    {!! Form::text('benar', null, ['class' => 'form-control']) !!}
</div>

<!-- Nilai Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nilai', __('models/pilihans.fields.nilai').':') !!}
    {!! Form::number('nilai', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('pilihans.index') }}" class="btn btn-light">@lang('crud.cancel')</a>
</div>
