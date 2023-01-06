@if ($soal->hasPages())
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($soal->onFirstPage())
            <li class="disabled"><span>{{ __('Prev') }}</span></li>
        @else
            <li><a href="{{ $soal->previousPageUrl() }}" rel="prev">{{ __('Prev') }}</a></li>
        @endif
        
        {{ "Page " . $soal->currentPage() . "  of  " . $soal->lastPage() }}
       
        
        {{-- Next Page Link --}}
        @if ($soal->hasMorePages())
            <li><a href="{{ $soal->nextPageUrl() }}" rel="next">{{ __('Next') }}</a></li>
        @else
            <li class="disabled"><span>{{ __('Next') }}</span></li>
        @endif
    </ul>
@endif