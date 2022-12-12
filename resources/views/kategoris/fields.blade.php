<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama', __('models/kategoris.fields.nama').':') !!}
    {!! Form::text('nama', null, ['class' => 'form-control']) !!}
</div>

<!-- Slug Field -->
<div class="form-group col-sm-6">
    {!! Form::label('slug', __('models/kategoris.fields.slug').':') !!}
    {!! Form::text('slug', null, ['class' => 'form-control']) !!}
</div>

<!-- Deskripsi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('deskripsi', __('models/kategoris.fields.deskripsi').':') !!}
    {!! Form::text('deskripsi', null, ['class' => 'form-control']) !!}
</div>

<!-- Photos Field -->
<div class="form-group col-sm-6">
    {!! Form::label('photos', __('models/kategoris.fields.photos').':') !!}
    {!! Form::text('photos', null, ['class' => 'form-control']) !!}
</div>

<!-- Is Active Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_active', __('models/kategoris.fields.is_active').':') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('is_active', 0) !!}
        {!! Form::checkbox('is_active', '1', null) !!} 1
    </label>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('kategoris.index') }}" class="btn btn-light">@lang('crud.cancel')</a>
</div>
