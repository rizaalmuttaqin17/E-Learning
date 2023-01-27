@if ($soal->hasPages())
<nav>
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($soal->onFirstPage())
        <li class="disabled page-item" aria-disabled="true" aria-label="@lang('pagination.previous')">
            <span class="page-link" aria-hidden="true">&lsaquo; Prev</span>
        </li>
        @else
        <li class="page-item">
            <button type="button" class="page-link" wire:click="previousPage('page')" rel="next" aria-label="@lang('pagination.previous')">&lsaquo; Prev</button>
        </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)

        @if (is_string($element))
        <li class="page-item disabled"><span class="page-link">{{ $element }}</span></li>
        @endif



        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <li class="page-item disabled"><span class="page-link">{{ $page }}</span></li>
        @else
        <li class="page-item">
            <button type="button" wire:click="gotoPage({{ $page }}, 'page')" class="page-link" aria-label="Go to page {{ $page }}">
                {{ $page }}
            </button>
            {{-- <a class="page-link" href="{{ $url }}">{{ $page }}</a> --}}
        </li>
        @endif
        @endforeach
        @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($soal->hasMorePages())
        <li class="page-item">
            <button type="button" class="page-link" wire:click="nextPage('page')" rel="next" aria-label="@lang('pagination.next')">Next &rsaquo;</button>
        </li>
        @else
        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
            <span class="page-link" aria-hidden="true">Next &rsaquo;</span>
        </li>
        @endif
    </ul>
</nav>
@endif