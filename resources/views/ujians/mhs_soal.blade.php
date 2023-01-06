<div class="card-header">
    <h4 style="color: unset">{!! $soal[0]['pertanyaan'] !!}</h4>
</div>

{!! Form::model($soal, ['route' => ['ujians.next-soal', $soal[0]['id']], 'method' => 'patch', 'autocomplete' => 'off']) !!}
<div class="card-body">
    <div class="row">
        @foreach ($soal[0]['pilihan']->split($soal[0]['pilihan']->count()/2) as $row)
        <div class="col-md-6">
            @foreach ($row as $pilihan)
            {!! Form::text('id_user', Auth::id(), ['hidden']) !!}
            <div class="form-check">
                @if($jawaban == null)
                <input class="form-check-input" type="radio" id="answer{{ $pilihan['id'] }}" name="answer"
                    value="{{ $pilihan['id'] }}">
                @else
                <input class="form-check-input" type="radio" id="answer{{ $pilihan['id'] }}" name="answer"
                    value="{{ $pilihan['id'] }}" {{ $jawaban['id_soal'] == $pilihan['id'] ? "checked=checked" : ''}}>
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
        @if ($soal->hasPages())
        <ul class="pagination" role="navigation">
        {{-- Previous Page Link --}}
        @if ($soal->onFirstPage())
            <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <span aria-hidden="true">‹</span>
            </li>
        @else
            <li class="page-item">
                <a class="page-link" href="{{ $soal->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">
                    <span>‹</span>
                </a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @php
        $linksOnEachSlide     = $soal->total(); // Must be an odd number
        $halfLinksOnEachSlide = ($linksOnEachSlide - 1) / 2;
        $startPage            = $soal->currentPage() - $halfLinksOnEachSlide < 1 ? 1 : ($soal->currentPage() - $halfLinksOnEachSlide);
        $endPage              = ($soal->currentPage() + $halfLinksOnEachSlide) > $soal->lastPage() ? $soal->lastPage() : ($soal->currentPage() + $halfLinksOnEachSlide);
        $endPage              = $endPage < $linksOnEachSlide ? $linksOnEachSlide : $endPage;
        $startPage            = $endPage - $linksOnEachSlide < $startPage ? $endPage - ($halfLinksOnEachSlide * 2) : $startPage;
        @endphp

        @foreach(range($startPage, $endPage) as $page)
            @if ($page == $soal->currentPage())
                <li class="page-item active" aria-current="page">
                    <span class="page-link">{{ $page }}</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $soal->url($page) }}">
                        <span>{{ $page }}</span>
                    </a>
                </li>
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($soal->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $soal->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">
                    <span>›</span>
                </a>
            </li>
        @else
            <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                <span aria-hidden="true">›</span>
            </li>
        @endif
        </ul>
        @endif
    </div>
</div>
{!! Form::close() !!}