<!-- Id Soal Field -->
<div class="form-group">
    {!! Form::label('id_soal', __('models/jawabans.fields.id_soal').':') !!}
    <p>{{ $jawaban->id_soal }}</p>
</div>

<!-- Id User Field -->
<div class="form-group">
    {!! Form::label('id_user', __('models/jawabans.fields.id_user').':') !!}
    <p>{{ $jawaban->id_user }}</p>
</div>

<!-- Jawaban Field -->
<div class="form-group">
    {!! Form::label('jawaban', __('models/jawabans.fields.jawaban').':') !!}
    <p>{{ $jawaban->jawaban }}</p>
</div>

<!-- Jawaban Benar Field -->
<div class="form-group">
    {!! Form::label('jawaban_benar', __('models/jawabans.fields.jawaban_benar').':') !!}
    <p>{{ $jawaban->jawaban_benar }}</p>
</div>

<!-- Nilai Jawaban Field -->
<div class="form-group">
    {!! Form::label('nilai_jawaban', __('models/jawabans.fields.nilai_jawaban').':') !!}
    <p>{{ $jawaban->nilai_jawaban }}</p>
</div>

