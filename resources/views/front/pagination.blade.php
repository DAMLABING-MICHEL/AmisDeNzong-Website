@if ($paginator->hasPages())
<nav aria-label="...">
    <ul class="pagination">
        <li class="page-item disabled">
            @if ($paginator->onFirstPage())
        <li class="disabled"><span>← Previous</span></li>
        @else
        <li><a href="{{ $paginator->previousPageUrl() }}" class="page-link" rel="prev">← Previous</a></li>
        @endif
        </li>
        {{-- Pagination Elements --}}
        @foreach ($elements as $element)

        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
        <li class="disabled"><span>{{ $element }}</span></li>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
        @foreach ($element as $page => $url)
        <li class="page-item">
            @if ($page == $paginator->currentPage())
            <li class="active page-link my-active"><span class="active-link-text">{{ $page }}</span></li>
            @else
            <li class="page-link my-disabled"><a href="{{ $url }}">{{ $page }}</a></li>
            @endif
            </li>
        @endforeach
        @endif

        @endforeach

        {{-- Next Page Link --}}
        <li class="page-item">
            @if ($paginator->hasMorePages())
        <li><a href="{{ $paginator->nextPageUrl() }}" class="page-link" rel="next">Next →</a></li>
        @else
        <li class="disabled"><span>Next →</span></li>
        @endif
        </li>
    </ul>
</nav>
@endif