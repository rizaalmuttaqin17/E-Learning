@extends('layouts.app')
@section('title')
    Ujian {{ $ujian['matkul']['nama'] }}
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading m-0">Ujian {{ $ujian['matkul']['nama'] }} <b>Time <span id="timer" style="color: red">0.00</span></b></h3>
            <div class="filter-container section-header-breadcrumb row justify-content-md-end">
                <a href="{{ route('ujians.index') }}" class="btn btn-primary">@lang('crud.back')</a>
            </div>
        </div>
        <div class="section-body">
            <h3 class="section-title">Soal Ke {{ $ujian['soals']->count() }} dari {{ $ujian['jumlah_soal'] }}</h3>
            <p class="section-lead">Tambahkan Soal, Sistem akan otomatis berpindah halaman jika sudah terisi semua</p>
        </div>
        <div class="content">
            @include('stisla-templates::common.errors')
            <div class="section-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 style="color: unset">Pertanyaan Ke {{ $ujian['soals']->count() + 1 }}</h4>
                            </div>
                            <div class="card-body ">
                            {!! Form::model($ujian, ['route' => ['ujians.updateSoal', $ujian->id], 'method' => 'patch', 'autocomplete' => 'off']) !!}
                                <div class="row">
                                    @include('ujians.mhs_soal')
                                </div>
                            {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@push('scripts')
<!-- script for time limitation of exam -->
<script type="text/javascript">
    var timeoutHandle;
    function countdown(minutes) {
        var seconds = 60;
        var mins = minutes
        function tick() {
            var counter = document.getElementById("timer");
            var current_minutes = mins-1
            seconds--;
            counter.innerHTML =
            current_minutes.toString() + ":" + (seconds < 10 ? "0" : "") + String(seconds);
            if( seconds > 0 ) {
                timeoutHandle=setTimeout(tick, 1000);
            } else {    
                if(mins > 1){
                    // countdown(mins-1);   never reach “00″ issue solved:Contributed by Victor Streithorst
                    setTimeout(function () { countdown(mins - 1); }, 1000);
                }
            }
        }
        tick();
    }
    countdown('<?php echo $ujian->durasi; ?>');
    
</script>
<!-- script for disable url -->
<script type="text/javascript">
    var durasi= '<?php echo $ujian->durasi; ?>';
    var realtime = durasi*60000;
    setTimeout(function () {
        alert('Time Out');
        window.location.href= '/ujians';},
    realtime);
</script>
    
@endpush

@endsection