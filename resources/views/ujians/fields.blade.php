<!-- Id Mata Kuliah Field -->
<div class="form-group col-sm-4">
    {!! Form::label('id_mata_kuliah', __('models/ujians.fields.id_mata_kuliah').':') !!}
    {!! Form::select('id_mata_kuliah', $matkul, null, ['class' => 'form-control', 'placeholder'=>'Pilih Mata Kuliah']) !!}
</div>

<!-- Tipe Ujian Field -->
<div class="form-group col-sm-4">
    {!! Form::label('tipe_ujian', __('models/ujians.fields.tipe_ujian').':') !!}
    {!! Form::select('tipe_ujian', array('UTS' => 'Ujian Tengah Semester', 'UAS'=>'Ujian Akhir Semester'), null, ['class' => 'form-control', 'placeholder'=>'Pilih Tipe Ujian']) !!}
</div>

<!-- Tipe Ujian Field -->
<div class="form-group col-sm-2">
    {!! Form::label('semester', __('models/ujians.fields.semester').':') !!}
    {!! Form::select('semester', array('Ganjil' => 'Ganjil', 'Genap'=>'Genap'), null, ['class' => 'form-control', 'placeholder'=>'Pilih Semester']) !!}
</div>

<!-- Sifat Ujian Field -->
<div class="form-group col-sm-2">
    {!! Form::label('sifat_ujian', __('models/ujians.fields.sifat_ujian').':') !!}
    {!! Form::text('sifat_ujian', null, ['class' => 'form-control']) !!}
</div>

<!-- Tanggal Ujian Field -->
<div class="form-group col-sm-2">
    {!! Form::label('tanggal_ujian', __('models/ujians.fields.tanggal_ujian').':') !!}
    {!! Form::date('tanggal_ujian', null, ['class' => 'form-control','id'=>'tanggal_ujian']) !!}
</div>

<!-- Percobaan Ujian Field -->
<div class="form-group col-sm-2">
    {!! Form::label('percobaan', __('models/ujians.fields.percobaan').':') !!}
    {!! Form::number('percobaan', null, ['class' => 'form-control']) !!}
</div>

<!-- Jumlah Soal Ujian Field -->
<div class="form-group col-sm-2">
    {!! Form::label('jumlah_soal', __('models/ujians.fields.jumlah_soal').':') !!}
    {!! Form::number('jumlah_soal', null, ['class' => 'form-control']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#tanggal_ujian').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endpush

<!-- Selesai Field -->
{{-- <div class="form-group col-sm-6">
    {!! Form::label('selesai', __('models/ujians.fields.selesai').':') !!}
    {!! Form::text('selesai', null, ['class' => 'form-control']) !!}
</div> --}}

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('ujians.index') }}" class="btn btn-light">@lang('crud.cancel')</a>
</div>
