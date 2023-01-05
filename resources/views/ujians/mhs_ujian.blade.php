@extends('layouts.app')
@section('title')
Ujian {{ $ujian['matkul']['nama'] }}
@endsection
@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading m-0"><b>Waktu Ujian <span id="timer"style="color: red">0.00</span></b></h3>
        <div class="filter-container section-header-breadcrumb row justify-content-md-end">
            <a href="{{ route('ujians.index') }}" class="btn btn-primary">@lang('crud.back')</a>
        </div>
    </div>
    <div class="section-body">
        <h3 class="section-title">Ujian {{ $ujian['matkul']['nama'] }}</h3>
        <p class="section-lead">{{ $ujian['tipe_ujian']=='UTS' ? 'Ujian Tengah Semester' : 'Ujian Akhir Semester' }} {{ $ujian['semester'] }}</p>
    </div>
    <div class="content">
        @include('stisla-templates::common.errors')
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        @include('ujians.mhs_soal')
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
            var current_minutes = mins - 1
            seconds--;
            counter.innerHTML =
                current_minutes.toString() + ":" + (seconds < 10 ? "0" : "") + String(seconds);
            if (seconds > 0) {
                timeoutHandle = setTimeout(tick, 1000);
            } else {
                if (mins > 1) {
                    // countdown(mins-1);   never reach “00″ issue solved:Contributed by Victor Streithorst
                    setTimeout(function () {
                        countdown(mins - 1);
                    }, 1000);
                }
            }
        }
        tick();
    }
    countdown('<?php echo $durasi/$soal->count(); ?>');
</script>
<!-- script for disable url -->
<script type="text/javascript">
    var durasi = '<?php echo (int)$durasi; ?>';
    var soal = '<?php echo $soal->count(); ?>';
    var realtime = (durasi/soal) * 60000;
    setTimeout(function () {
            alert('Time Out');
            window.location.href = '/ujians';
        },
        realtime);
</script>

@endpush
<style>
    .section-body .card .card-header p{
        margin-bottom: 0;
    }
</style>
@endsection