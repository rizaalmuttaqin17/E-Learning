<!-- Kode Mk Field -->
<div class="form-group">
    {!! Form::label('kode_mk', __('models/mataKuliahs.fields.kode_mk').':') !!}
    <p>{{ $mataKuliah->kode_mk }}</p>
</div>

<!-- Nama Field -->
<div class="form-group">
    {!! Form::label('nama', __('models/mataKuliahs.fields.nama').':') !!}
    <p>{{ $mataKuliah->nama }}</p>
</div>

<!-- Dosen Pengampu Field -->
<div class="form-group">
    {!! Form::label('dosen_pengampu', __('models/mataKuliahs.fields.dosen_pengampu').':') !!}
    <p>{{ $mataKuliah->dosen_pengampu }}</p>
</div>

