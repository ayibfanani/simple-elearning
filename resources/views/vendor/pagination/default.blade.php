@if ($paginator->hasPages())
    <nav class="pagination is-centered is-rounded" role="navigation" aria-label="pagination">
        @if ($paginator->onFirstPage())
            <a class="pagination-previous" disabled>Previous</a>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="pagination-previous" style="background-color: white;">Previous</a>
        @endif

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="pagination-next" style="background-color: white;">Next</a>
        @else
            <a class="pagination-next" disabled>Next</a>
        @endif

        <ul class="pagination-list">
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li><span class="pagination-ellipsis">&hellip;</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li><a class="pagination-link is-current" aria-current="page">{{ $page }}</a></li>
                        @else
                            <li><a href="{{ $url }}" class="pagination-link" aria-label="Goto page {{ $page }}" style="background-color: white;">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </ul>
    </nav>
@endif
