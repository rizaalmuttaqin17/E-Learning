@foreach ($soal as $item)
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-12">
                <h4><i class="fas fa-exam"></i>{!! Form::label('pertanyaan', __('models/soals.fields.pertanyaan').' Ke '.$soal->currentPage().'') !!}</h4>
            </div>
            <div class="col-12">
                <!-- Display the countdown timer in an element -->
                <span class="badge badge-danger" id="timer"></span>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="form-group col-sm-12">
                {!! Form::textarea('pertanyaan[]',
                isset($item['pertanyaan'])&&!is_null($item['pertanyaan'])?$item['pertanyaan']:null, ['class' =>
                'form-control
                pertanyaan', 'id'=>'pertanyaan']) !!}
                @if ($item['id_tipe_soal'] == 1)
                @foreach($item['pilihan'] as $pilihan)
                {!! Form::label('pilihan[]', __('models/soals.fields.pilihan'.$loop->index.'')) !!}
                <div class="row">
                    <div class="col-sm-11 col-lg-11">
                        {!! Form::textarea('pilihan['.$loop->index.']',
                        isset($pilihan['pilihan'])&&!is_null($pilihan['pilihan'])?$pilihan['pilihan']:null, ['class' =>
                        'form-control pilihan']) !!}
                    </div>
                    <div class="col-sm-1 col-lg-1 text-center align-self-center">
                        {!! Form::label('benar', 'Benar?') !!}
                        @if ($pilihan['benar'] == 'true')
                        {!! Form::checkbox('benar['.$loop->index.']', false, true, ['class' => 'form-control']) !!}
                        @else
                        {!! Form::checkbox('benar['.$loop->index.']', false, false, ['class' => 'form-control']) !!}
                        @endif
                    </div>
                </div>
                @endforeach
                @endif
            </div>
            @endforeach
        </div>
    </div>
    <div class="d-flex justify-content-center">
        {{$soal->links('layouts.pagination', ['soal'=>$soal])}}
        {{-- {{$soal->links()}} --}}
    </div>
    <div class="card-footer">
        @if ($soal->currentPage() == $soal->lastPage())
            <button wire:click="saveJawaban" class="btn btn-primary btn-lg btn-block">Submit</button>
        @endif
    </div>
</div>
@push('scripts')
<script>
    window.addEventListener('soal', event => {
        // $('.selectpicker').selectpicker();
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
    });
</script>
@endpush