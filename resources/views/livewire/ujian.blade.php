<div class="card-header">
    <h4 style="color: unset">{!! $soal['pertanyaan'] !!}</h4>
</div>
{!! Form::model($soal, ['route' => ['ujians.next-soal', $soal->id], 'method' => 'patch', 'autocomplete' => 'off']) !!}
<div class="card-body">
    <div class="row">
        @foreach ($soal['pilihan']->split($soal['pilihan']->count()/2) as $row)
        <div class="col-md-6">
            @foreach ($row as $pilihan)
                {!! Form::text('id_user', Auth::id(), ['hidden']) !!}
                <div class="form-check">
                    @if($jawaban == null)
                        <input class="form-check-input" type="radio" id="answer{{ $pilihan['id'] }}" name="answer" value="{{ $pilihan['id'] }}">
                    @else
                        <input class="form-check-input" type="radio" id="answer{{ $pilihan['id'] }}" name="answer" value="{{ $pilihan['id'] }}" {{ $jawaban['id_soal'] == $pilihan['id'] ? "checked=checked" : ''}}>
                    @endif
                    <label class="form-check-label" for="answer{{ $pilihan['id'] }}">{{ $pilihan['pilihan'] }}</label>
                </div>
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