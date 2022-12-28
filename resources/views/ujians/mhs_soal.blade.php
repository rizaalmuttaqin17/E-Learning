<div class="card-header">
    <h4 style="color: unset">{!! $soal['pertanyaan'] !!}</h4>
</div>
{!! Form::model($ujian, ['route' => ['ujians.next-soal', $ujian->id], 'method' => 'patch', 'autocomplete' => 'off']) !!}
<div class="card-body">
    <div class="row">
        @foreach ($soal['pilihan']->split($soal['pilihan']->count()/2) as $row)
        <div class="col-md-6">
            @foreach ($row as $pilihan)
                {!! Form::text('id_user', Auth::id(), ['hidden']) !!}
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="answer{{ $pilihan['id'] }}" name="answer" value="{{ $pilihan['id'] }}">
                    <label class="form-check-label" for="answer{{ $pilihan['id'] }}">{{ $pilihan['pilihan'] }}</label>
                </div>
            {{-- <input type="hidden" name="student_id" value="{{$student_id}}">
            <input type="hidden" name="true_answer" value="{{$question->answer}}">
            <input type="submit" name="submit" value="submit" class="btn btn-primary" id="submitbtn"> --}}
            
            @endforeach
            <!-- Submit Field -->
        </div>
        @endforeach
    </div>
</div>
<div class="card-footer bg-whitesmoke">
    <div class="form-group col-sm-12 mb-0 pl-0">
        {!! Form::submit(__('Submit'), ['class' => 'btn btn-primary']) !!}
        <a href="{{ route('ujians.index') }}" class="btn btn-light">@lang('crud.cancel')</a>
    </div>
</div>
{!! Form::close() !!}