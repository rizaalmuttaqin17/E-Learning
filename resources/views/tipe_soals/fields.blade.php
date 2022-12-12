<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama', __('models/tipeSoals.fields.nama').':') !!}
    {!! Form::text('nama', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('tipeSoals.index') }}" class="btn btn-light">@lang('crud.cancel')</a>
</div>
