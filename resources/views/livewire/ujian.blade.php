<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-12">
                <h4><i class="fas fa-exam"></i> {{ $ujian['matkul']['nama'] }} </h4>
            </div>
            <div class="col-12">
                <!-- Display the countdown timer in an element -->
                <span class="badge badge-danger" id="timer"></span>
            </div>
        </div>
    </div>
    @foreach ($soal as $question)
    <div class="card-body">
        <b>Soal No. {{ $soal->currentPage() }}</b>
        <p>{!! $question['pertanyaan'] !!}</p><br>
        @if ($question['id_tipe_soal'] == 2)
        <i>Isi Jawabanmu di Bawah sini : </i> <br>
        {{-- <trix-editor></trix-editor> --}}
        <textarea id="answer{{ $question['id'] }}" name="answer" class="form-control jawaban" wire:change="answer({{ $question['id'] }}, $event.target.value)" cols="100" rows="7" style="height: 250px"></textarea>
        <div wire:ignore>
            <script>
                $(document).ready(function () {
                    $('.jawaban').summernote({
                        tabsize: 5,
                        dialogsInBody: true,
                        height: 200,
                        focus: true
                    });
                });
            </script>
        </div>
        @if(COUNT($jawabanTerpilih)>0)
            @foreach($jawabanTerpilih as $item)
                @php $jawaban = explode('-', $item); @endphp
            @if(in_array($question['id'].'-'.$jawaban[1], $jawabanTerpilih) ?$jawaban[1]:'' != "")
                <script>
                    document.getElementById("answer{{ $question['id'] }}").value = "{{ in_array($question['id'].'-'.$jawaban[1], $jawabanTerpilih) ? $jawaban[1] : '' }}";
                </script>
            @endif
            @endforeach
        @endif
        @else
            <i>Pilih Salah Satu Jawaban dibawah Ini : </i> <br><br>
            @foreach ($question['pilihan']->split($question['pilihan']->count()/2) as $row)
            <div class="col-md-6">
                @foreach ($row->shuffle() as $pilihan)
                {!! Form::text('id_user', Auth::id(), ['hidden']) !!}
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="answer{{ $pilihan['id'] }}" wire:click="answer({{ $question['id'] }}, '{{ $pilihan['id'] }}')" name="answer" value="{{ $pilihan['id'] }}" {{ in_array($question['id'].'-'.$pilihan['id'], $jawabanTerpilih) ? 'checked=checked' : '' }}>
                    <label class="form-check-label" for="answer{{ $pilihan['id'] }}">{!! $pilihan['pilihan'] !!}</label>
                </div>
                @endforeach
            </div>
            @endforeach
        @endif
    </div>
    @endforeach
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

<script>
    var add_minutes =  function (dt, minutes) {
    return new Date(dt.getTime() + minutes*60000);
    }
    
    // Get today's date and time
    var now = new Date();

    // Set the date we're counting down to
    var countDownDate = add_minutes(now, {{ $ujian->durasi }});

    // Update the count down every 1 second
    var x = setInterval(function() {

    // Get today's date and time
    var now2 = new Date().getTime();

    // Find the distance between now and the count down date
    var distance = countDownDate - now2;

    // Time calculations for days, hours, minutes and seconds
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Display the result in the element with id="demo"
    document.getElementById("timer").innerHTML = "Sisa Waktu : " + hours + " jam "
    + minutes + " menit "+ seconds + " detik ";

    // If the count down is finished, write some text
    if (distance < 0) {
        clearInterval(x);
        Livewire.emit('endTimer');
    }
    }, 1000);
</script>
