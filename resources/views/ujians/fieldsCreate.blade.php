<!-- Id Mata Kuliah Field -->
<div class="form-group col-sm-4">
    {!! Form::label('id_mata_kuliah', __('models/ujians.fields.id_mata_kuliah')) !!}
    {!! Form::select('id_mata_kuliah', $matkul, null, ['class' => 'form-control id_mata_kuliah', 'placeholder'=>'Pilih Mata Kuliah', 'id'=>'id_mata_kuliah']) !!}
</div>

<!-- Tipe Ujian Field -->
<div class="form-group col-sm-4">
    {!! Form::label('tipe_ujian', __('models/ujians.fields.tipe_ujian')) !!}
    {!! Form::select('tipe_ujian', array('UTS' => 'Ujian Tengah Semester', 'UAS'=>'Ujian Akhir Semester'), null, ['class' => 'form-control', 'placeholder'=>'Pilih Tipe Ujian']) !!}
</div>

<!-- Tipe Ujian Field -->
<div class="form-group col-sm-2">
    {!! Form::label('semester', __('models/ujians.fields.semester')) !!}
    {!! Form::select('semester', array('Ganjil' => 'Ganjil', 'Genap'=>'Genap'), null, ['class' => 'form-control', 'placeholder'=>'Pilih Semester']) !!}
</div>

<!-- Sifat Ujian Field -->
<div class="form-group col-sm-2">
    {!! Form::label('sifat_ujian', __('models/ujians.fields.sifat_ujian')) !!}
    {!! Form::text('sifat_ujian', null, ['class' => 'form-control']) !!}
</div>

<!-- Tanggal Ujian Field -->
<div class="form-group col-sm-2">
    {!! Form::label('tanggal_ujian', __('models/ujians.fields.tanggal_ujian')) !!}
    {!! Form::date('tanggal_ujian', null, ['class' => 'form-control','id'=>'tanggal_ujian']) !!}
</div>

<!-- Percobaan Ujian Field -->
<div class="form-group col-sm-2">
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
    {!! Form::label('jml_essay', __('models/ujians.fields.jml_pg')) !!}
    {!! Form::number('jml_essay', null, ['class' => 'form-control', 'min' => '0', 'max' => '100']) !!}
</div>

<!-- Durasi Ujian Field -->
<div class="form-group col-sm-2">
    {!! Form::label('durasi', __('models/ujians.fields.durasi')) !!}
    {!! Form::number('durasi', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-2">
    {!! Form::label('nilai', __('models/ujians.fields.nilai')) !!}
    {!! Form::number('nilai', null, ['class' => 'form-control', 'min' => '10', 'max' => '100']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.update'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('ujians.index') }}" class="btn btn-light">@lang('crud.cancel')</a>
</div>

@push('scripts')
<script>
    $(document).ready(function () {
        $('.pertanyaan').summernote({
            tabsize: 5,
            dialogsInBody: true,
            height: 200,
            focus: true
        });
        $('.pilihan').summernote({
            tabsize: 5,
            dialogsInBody: true,
            height: 50,
            focus: true
        });
    });
</script>
<script type="text/javascript">
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $(document).ready(function(){
            $(".id_mata_kuliah").select2({
                placeholder: "Pilih Mata Kuliah...",
                tags: true,
                focus: true
            });
        });
</script>
@endpush