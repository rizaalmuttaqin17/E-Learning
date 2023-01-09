<div id="ambilUjian" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Kode Ujian</h5>
                <button type="button" aria-label="Close" class="close outline-none" data-dismiss="modal">×</button>
            </div>
            {!! Form::open(['route' => ['ujians.kode-ujian', $ujian['id'], 'method'=>'post']]) !!}
            <div class="modal-body">
                {{csrf_field()}}
                <div class="row">
                    <div class="form-group col-sm-12" style="display: inline-grid;">
                        <label>Masukkan Kode Ujian <span class="required">*</span></label>
                        {!! Form::text('kode_ujian', null, ['class'=>'form-control', 'required', 'autocomplete'=>'off']) !!}
                    </div>
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-primary" id="btnPrSave" data-loading-text="<span class='spinner-border spinner-border-sm'></span> Processing..."tabindex="5">Simpan
                    </button>
                    <button type="button" class="btn btn-light ml-1 edit-cancel-margin margin-left-5" data-dismiss="modal">Batal</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>