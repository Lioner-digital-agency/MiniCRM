@if ($paginator->lastPage() > 1)
    <div class="">
        <div class="pagination">
            <ul>
                <li class="prev-btn{{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
                    <a href="{{ $paginator->url(1) }}"><</a>
                </li>
                @for ($i = 1; $i <= $paginator->lastPage(); $i++)
                    @if(($paginator->currentPage() == $i))
                        <li class="current">
                            {{ $i }}
                        </li>
                    @else
                        <li class="{{ ($paginator->currentPage() == $i) ? ' current' : '' }}">
                            <a href="{{ $paginator->url($i) }}">{{ $i }}</a>
                        </li>
                    @endif
                @endfor
                <li class="next-btn next {{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
                    <a href="{{ ($paginator->currentPage() == $paginator->lastPage()) ? 'javascript:void(0)' : $paginator->url($paginator->currentPage()+1) }}">></a>
                </li>
            </ul>
        </div>
    </div>
@endif
