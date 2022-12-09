<!-- Id Fakultas Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_fakultas', __('models/programStudis.fields.id_fakultas').':') !!}
    {!! Form::number('id_fakultas', null, ['class' => 'form-control']) !!}
</div>

<!-- Kode Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kode', __('models/programStudis.fields.kode').':') !!}
    {!! Form::text('kode', null, ['class' => 'form-control']) !!}
</div>

<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama', __('models/programStudis.fields.nama').':') !!}
    {!! Form::text('nama', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('programStudis.index') }}" class="btn btn-light">@lang('crud.cancel')</a>
</div>
