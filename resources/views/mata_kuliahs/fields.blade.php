<!-- Kode Mk Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kode_mk', __('models/mataKuliahs.fields.kode_mk').':') !!}
    {!! Form::text('kode_mk', null, ['class' => 'form-control']) !!}
</div>

<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama', __('models/mataKuliahs.fields.nama').':') !!}
    {!! Form::text('nama', null, ['class' => 'form-control']) !!}
</div>

<!-- Dosen Pengampu Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dosen_pengampu', __('models/mataKuliahs.fields.dosen_pengampu').':') !!}
    {!! Form::text('dosen_pengampu', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('mataKuliahs.index') }}" class="btn btn-light">@lang('crud.cancel')</a>
</div>
