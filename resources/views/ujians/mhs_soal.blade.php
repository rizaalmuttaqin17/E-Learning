@foreach ($soal as $item)
<div class="col-md-6 col-lg-8 col-sm-6 col-lg-offset-2">
    <form method="post" action="" class="ansform">
        {{ csrf_field() }}

        <h3>{!! $item['pertanyaan'] !!}</h3>
            @foreach ($item['pilihan'] as $pilihan)
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="answer{{ $pilihan['id'] }}" name="answer" value="{{ $pilihan['id'] }}">
                    <label class="form-check-label" for="answer{{ $pilihan['id'] }}">
                        {{ $pilihan['pilihan'] }}
                    </label>
                </div>
            </div>
            {{-- <input type="hidden" name="student_id" value="{{$student_id}}">
            <input type="hidden" name="true_answer" value="{{$question->answer}}">
            <input type="submit" name="submit" value="submit" class="btn btn-primary" id="submitbtn"> --}}
            @endforeach
    </form>
</div>
@endforeach