@if ($paginator->hasPages())
    <nav>
        <span class="normalTextSmallBold">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <span class="disabled" aria-disabled="true"><span>@lang('pagination.previous')</span></span>
            @else
                <span><a href="{{ $paginator->previousPageUrl() }}" rel="prev">@lang('pagination.previous')</a></span>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <span><a href="{{ $paginator->nextPageUrl() }}" rel="next">@lang('pagination.next')</a></span>
            @else
                <span class="disabled" aria-disabled="true"><span>@lang('pagination.next')</span></span>
            @endif
        </span>
    </nav>
@endif
