<!-- Id Tipe Soal Field -->
<div class="form-group col-sm-3" hidden>
    {!! Form::label('id_tipe_soal', __('models/soals.fields.id_tipe_soal').':') !!}
    {{-- {!! Form::select('id_tipe_soal', $tipeSoal, null, ['class' => 'id_tipe_soal form-control', 'required', 'placeholder'=>'Pilih Tipe Soal']) !!} --}}
    <select name="id_tipe_soal" id="id_tipe_soal" class="id_tipe_soal form-control">
        <option value="1" selected>Pilihan Ganda</option>
    </select>
</div>

<!-- Id Ujian Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_ujian', __('models/soals.fields.id_ujian').':') !!}
    <select name="id_ujian" id="id_ujian" class="id_ujian form-control">
        @foreach ($ujian as $item)
            <option value="{{ $item['id'] }}">{{ $item['matkul']['nama'] }} - {{ $item['tipe_ujian'] }} {{ $item['semester'] }}</option>
        @endforeach
    </select>
</div>

<!-- Nilai Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nilai', __('models/soals.fields.nilai').':') !!}
    {!! Form::number('nilai', null, ['class' => 'form-control']) !!}
</div>

<!-- Pertanyaan Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('pertanyaan', __('models/soals.fields.pertanyaan').':') !!}
    {!! Form::textarea('pertanyaan', null, ['class' => 'form-control']) !!}
</div>

@for($i = 4; $i >= 1; $i--)
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('pilihan[]', __('models/soals.fields.pilihan1').':') !!}
    <div class="row">
        <div class="col-sm-11 col-lg-11">
            {!! Form::text('pilihan[]', null, ['class' => 'form-control']) !!}
        </div>
        <div class="col-sm-1 col-lg-1 align-self-center">
            <input type="radio" name="benar[]" id="benar[{{ $i }}]" class="benar form-control">
        </div>
    </div>
</div>
@endfor

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('soals.index') }}" class="btn btn-light">@lang('crud.cancel')</a>
</div>

@push('scripts')
<script type="text/javascript">
    $("input[type='radio']").click(function(e) {
        var checked = $(this).attr("checked");
        if(!checked){
            $("input[type='radio']").not(this).removeAttr("value");
            $("input[type='radio']").not(this).removeAttr("checked");
            $(this).attr("checked", true);
            $(this).val('true');
        } else {
            $("input[type='radio']").not(this).removeAttr("value");
            $("input[type='radio']").not(this).removeAttr("checked");
        }
    });
</script>
@endpush