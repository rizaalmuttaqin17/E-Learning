<div>
    @foreach ($soal as $item)
    <div class="form-group col-sm-12">
        {!! Form::label('pertanyaan', __('models/soals.fields.pertanyaan').' Ke '.$loop->iteration.'') !!}
        {!! Form::textarea('pertanyaan[]',
        isset($item['pertanyaan'])&&!is_null($item['pertanyaan'])?$item['pertanyaan']:null, ['class' => 'form-control
        pertanyaan', 'id'=>'pertanyaan']) !!}
        @if ($item['id_tipe_soal'] == 1)
        @foreach($item['pilihan'] as $pilihan)
        {!! Form::label('pilihan[]', __('models/soals.fields.pilihan'.$loop->index.'')) !!}
        <div class="row">
            <div class="col-sm-5 col-lg-5">
                {!! Form::textarea('pilihan['.$loop->index.']',
                isset($pilihan['pilihan'])&&!is_null($pilihan['pilihan'])?$pilihan['pilihan']:null, ['class' =>
                'form-control pilihan']) !!}
            </div>
            <div class="col-sm-1 col-lg-1 align-self-center">
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