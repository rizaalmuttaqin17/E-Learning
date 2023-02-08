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
        <span class="badge badge-danger">Untuk sementara, gunakan (\n) dilarang menggunakan enter saat menjawab Essay!</span><br>
        <label for="answer{{ $question['id'] }}"><i>Isi Jawabanmu di Bawah sini : </i></label>
        <textarea id="answer{{ $question['id'] }}" name="answer{{ $question['id'] }}" class="form-control jawaban" wire:change="answer({{ $question['id'] }}, $event.target.value)" style="height: 250px"></textarea>
        {{-- <trix-editor input="answer{{ $question['id'] }}" ></trix-editor> --}}
        {{-- @if(COUNT($jawabanTerpilih) > 0) --}}
        @foreach($jawabanTerpilih as $item)
        @php $jawaban = explode('-', $item); @endphp
        @if(in_array($question['id'].'-'.$jawaban[1], $jawabanTerpilih) ? $jawaban[1]:'' != "")
        <script>
            $("#answer{{ $question['id'] }}").val("{{ in_array($question['id'].'-'.$jawaban[1], $jawabanTerpilih) ? $jawaban[1] : "" }}");
            console.log($("#answer{{ $question['id'] }}").val());
            // var element = document.querySelector("trix-editor");
            // addEventListener("trix-change", function(event) {
            //     console.log(document.querySelector("trix-editor").value);
            //     @this.set('jawab', element.getAttribute('value'))
            // })
            /* document.addEventListener('trix-blur', function (e) {
                var doc = element.editor.getDocument();
                console.log(document.querySelector("trix-editor").value);
                element.editor.setSelectedRange([0, 0]);
                element.editor.insertString($("#answer{{ $question['id'] }}").val());
            }); */
        </script>
        @endif
        @endforeach
        {{-- @endif --}}
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
    </div>
    <div class="card-footer">
        @if ($soal->currentPage() == $soal->lastPage())
        <button wire:click="saveJawaban" class="btn btn-primary btn-lg btn-block">Submit</button>
        @endif
    </div>
    <script>
        var add_minutes = function (dt, minutes) {
            return new Date(dt.getTime() + minutes * 60000);
        }
        var now = new Date();
        var countDownDate = add_minutes(now, {{ $ujian -> durasi }});

        // Update the count down every 1 second
        var x = setInterval(function () {
            var now2 = new Date().getTime();
            var distance = countDownDate - now2;
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            document.getElementById("timer").innerHTML = "Sisa Waktu : " + hours + " jam " + minutes + " menit " + seconds + " detik ";

            // If the count down is finished, write some text
            if (distance < 0) {
                clearInterval(x);
                Livewire.emit('endTimer');
            }
        }, 1000);
    </script>
</div>