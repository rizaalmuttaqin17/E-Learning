<div id="isiNilai{{ $model['id'] }}" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Isi Nilai Soal</h5>
                <button type="button" aria-label="Close" class="close outline-none" data-dismiss="modal">×</button>
            </div>
            {!! Form::open(['route' => ['ujians.nilai-soal', $model['id'], 'method'=>'post']]) !!}
            <div class="modal-body">
                {{csrf_field()}}
                <div class="row">
                    <div class="form-group col-sm-12" style="display: inline-grid;">
                        <label for="pertanyaan">Pertanyaan</label>
                        <input type="text" name="pertanyaan" id="pertanyaan" class="form-control" value="{!! $model['soals']['pertanyaan'] !!}" disabled>
                    </div>
                    <div class="form-group col-sm-12" style="display: inline-grid;">
                        <label for="jawaban">Jawaban</label>
                        <textarea name="jawaban" id="jawaban" class="form-control" cols="30" rows="10" disabled>{!! $model['jawaban'] !!}</textarea>
                    </div>
                    <div class="form-group col-sm-6" style="display: inline-grid;">
                        <label for="peserta">Peserta</label>
                        <input type="text" name="peserta" id="peserta" class="form-control" value="{{ $model['users']['name'] }} ({{ $model['users']['no_induk'] }})" disabled>
                    </div>
                    <div class="form-group col-sm-6" style="display: inline-grid;">
                        <label for="nilai">Masukkan Nilai Soal <span class="required">*</span></label>
                        {!! Form::number('nilai', null, ['class'=>'form-control', 'required', 'autofocus']) !!}
                    </div>
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-primary" id="btnPrSave" data-loading-text="<span class='spinner-border spinner-border-sm'></span> Processing..."tabindex="5">Submit
                    </button>
                    <button type="button" class="btn btn-light ml-1 edit-cancel-margin margin-left-5" data-dismiss="modal">Batal</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
<script>
    $('.modal').insertAfter($('.section'));
</script>