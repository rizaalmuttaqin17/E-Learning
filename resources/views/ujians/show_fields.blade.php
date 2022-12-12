<!-- Id Mata Kuliah Field -->
<div class="form-group">
    {!! Form::label('id_mata_kuliah', __('models/ujians.fields.id_mata_kuliah').':') !!}
    <p>{{ $ujian->id_mata_kuliah }}</p>
</div>

<!-- Tipe Ujian Field -->
<div class="form-group">
    {!! Form::label('tipe_ujian', __('models/ujians.fields.tipe_ujian').':') !!}
    <p>{{ $ujian->tipe_ujian }}</p>
</div>

<!-- Sifat Ujian Field -->
<div class="form-group">
    {!! Form::label('sifat_ujian', __('models/ujians.fields.sifat_ujian').':') !!}
    <p>{{ $ujian->sifat_ujian }}</p>
</div>

<!-- Tanggal Ujian Field -->
<div class="form-group">
    {!! Form::label('tanggal_ujian', __('models/ujians.fields.tanggal_ujian').':') !!}
    <p>{{ $ujian->tanggal_ujian }}</p>
</div>

<!-- Selesai Field -->
<div class="form-group">
    {!! Form::label('selesai', __('models/ujians.fields.selesai').':') !!}
    <p>{{ $ujian->selesai }}</p>
</div>

