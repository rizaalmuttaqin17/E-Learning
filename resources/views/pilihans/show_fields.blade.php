<!-- Id Soal Field -->
<div class="form-group">
    {!! Form::label('id_soal', __('models/pilihans.fields.id_soal').':') !!}
    <p>{{ $pilihan->id_soal }}</p>
</div>

<!-- Pilihan Field -->
<div class="form-group">
    {!! Form::label('pilihan', __('models/pilihans.fields.pilihan').':') !!}
    <p>{{ $pilihan->pilihan }}</p>
</div>

<!-- Benar Field -->
<div class="form-group">
    {!! Form::label('benar', __('models/pilihans.fields.benar').':') !!}
    <p>{{ $pilihan->benar }}</p>
</div>

<!-- Nilai Field -->
<div class="form-group">
    {!! Form::label('nilai', __('models/pilihans.fields.nilai').':') !!}
    <p>{{ $pilihan->nilai }}</p>
</div>

