<!-- Nama Field -->
<div class="form-group">
    {!! Form::label('nama', __('models/kategoris.fields.nama').':') !!}
    <p>{{ $kategori->nama }}</p>
</div>

<!-- Slug Field -->
<div class="form-group">
    {!! Form::label('slug', __('models/kategoris.fields.slug').':') !!}
    <p>{{ $kategori->slug }}</p>
</div>

<!-- Deskripsi Field -->
<div class="form-group">
    {!! Form::label('deskripsi', __('models/kategoris.fields.deskripsi').':') !!}
    <p>{{ $kategori->deskripsi }}</p>
</div>

<!-- Photos Field -->
<div class="form-group">
    {!! Form::label('photos', __('models/kategoris.fields.photos').':') !!}
    <p>{{ $kategori->photos }}</p>
</div>

<!-- Is Active Field -->
<div class="form-group">
    {!! Form::label('is_active', __('models/kategoris.fields.is_active').':') !!}
    <p>{{ $kategori->is_active }}</p>
</div>

