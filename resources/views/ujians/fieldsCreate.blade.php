<!-- Id Mata Kuliah Field -->
<div class="form-group col-sm-4">
    {!! Form::label('id_mata_kuliah', __('models/ujians.fields.id_mata_kuliah')) !!}
    {!! Form::select('id_mata_kuliah', $matkul, null, ['class' => 'form-control id_mata_kuliah', 'id'=>'id_mata_kuliah']) !!}
</div>

<!-- Tanggal Ujian Field -->
<div class="form-group col-sm-2">
    {!! Form::label('start', __('models/ujians.fields.start')) !!}
    {!! Form::datetimeLocal('start', isset($ujian['start'])&&!is_null($ujian['start'])?$ujian['start']:null, ['class' => 'form-control','id'=>'start']) !!}
</div>

<!-- Tanggal Ujian Field -->
<div class="form-group col-sm-2">
    {!! Form::label('end', __('models/ujians.fields.end')) !!}
    {!! Form::datetimeLocal('end', isset($ujian['end'])&&!is_null($ujian['end'])?$ujian['end']:null, ['class' => 'form-control','id'=>'end']) !!}
</div>

<!-- Percobaan Ujian Field -->
<div class="form-group col-sm-1">
    {!! Form::label('percobaan', __('models/ujians.fields.percobaan')) !!}
    {!! Form::number('percobaan', null, ['class' => 'form-control']) !!}
</div>

<!-- Jumlah Pilihan Ganda Ujian Field -->
<div class="form-group col-sm-1">
    {!! Form::label('jml_pg', __('models/ujians.fields.jml_pg')) !!}
    {!! Form::number('jml_pg', null, ['class' => 'form-control', 'min' => '0', 'max' => '100']) !!}
</div>

<!-- Jumlah Pilihan Ganda Ujian Field -->
<div class="form-group col-sm-1">
    {!! Form::label('jml_essay', __('models/ujians.fields.jml_essay')) !!}
    {!! Form::number('jml_essay', null, ['class' => 'form-control', 'min' => '0', 'max' => '100']) !!}
</div>

<!-- Durasi Ujian Field -->
<div class="form-group col-sm-1">
    {!! Form::label('durasi', __('models/ujians.fields.durasi')) !!}
    {!! Form::number('durasi', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.update'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('ujians.index') }}" class="btn btn-light">@lang('crud.cancel')</a>
</div>

@push('scripts')
<script type="text/javascript">
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $(document).ready(function(){
            $(".id_mata_kuliah").select2({
                placeholder: "Pilih Mata Kuliah...",
                tags: true,
            });
        });
</script>
@endpush