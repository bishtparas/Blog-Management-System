@if($blogs->hasPages())
<nav aria-label="Blog pagination" class="mt-4">
    <ul class="pagination justify-content-center custom-pagination">
        {{-- Previous Page Link --}}
        @if($blogs->onFirstPage())
            <li class="page-item disabled">
                <span class="page-link"><i class="bi bi-chevron-left"></i></span>
            </li>
        @else
            <li class="page-item">
                <a class="page-link" href="#" data-page="{{ $blogs->currentPage() - 1 }}"><i class="bi bi-chevron-left"></i></a>
            </li>
        @endif

        {{-- Page Numbers --}}
        @for($i = 1; $i <= $blogs->lastPage(); $i++)
            <li class="page-item {{ $i == $blogs->currentPage() ? 'active' : '' }}">
                <a class="page-link" href="#" data-page="{{ $i }}">{{ $i }}</a>
            </li>
        @endfor

        {{-- Next Page Link --}}
        @if($blogs->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="#" data-page="{{ $blogs->currentPage() + 1 }}"><i class="bi bi-chevron-right"></i></a>
            </li>
        @else
            <li class="page-item disabled">
                <span class="page-link"><i class="bi bi-chevron-right"></i></span>
            </li>
        @endif
    </ul>
</nav>
@endif
