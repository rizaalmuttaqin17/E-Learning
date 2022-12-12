<!-- Id Ujian Field -->
<div class="form-group">
    {!! Form::label('id_ujian', __('models/soals.fields.id_ujian').':') !!}
    <p>{{ $soal->id_ujian }}</p>
</div>

<!-- Id Tipe Soal Field -->
<div class="form-group">
    {!! Form::label('id_tipe_soal', __('models/soals.fields.id_tipe_soal').':') !!}
    <p>{{ $soal->id_tipe_soal }}</p>
</div>

<!-- Pertanyaan Field -->
<div class="form-group">
    {!! Form::label('pertanyaan', __('models/soals.fields.pertanyaan').':') !!}
    <p>{{ $soal->pertanyaan }}</p>
</div>

<!-- Nilai Field -->
<div class="form-group">
    {!! Form::label('nilai', __('models/soals.fields.nilai').':') !!}
    <p>{{ $soal->nilai }}</p>
</div>

