@if ($paginator->hasPages())
    <div class="card">
        <div class="card-inner">
            <div class="nk-block-between-md g-3">
                <div class="g">
                    <ul class="pagination justify-content-center justify-content-md-start">
                        @if(!$paginator->onFirstPage())
                            <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}">Назад</a></li>
                        @endif

                        @for($i = 1; $i <= ($paginator->total() / $paginator->perPage()); $i++)
                            <li class="page-item"><a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
                        @endfor

                        @if($paginator->hasMorePages())
                            <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}">Следующая</a></li>
                        @endif
                    </ul><!-- .pagination -->
                </div>
            </div><!-- .nk-block-between -->
        </div><!-- .card-inner -->
    </div><!-- .card -->
@endif
