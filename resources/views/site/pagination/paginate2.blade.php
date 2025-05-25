<style>
    .pronation_widget {
        margin-top: 30px;
    }
    .pronation_widget ul {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 16px;
        margin-right: 0;
        padding-right: 0;
        margin-bottom: 0;
    }
    .pronation_widget ul a {
        display: inline-block;
        padding: 0.5px 20px;
        border: 1px solid var(--firdip-border-color, #F4F2EE);
        color: var(--firdip-secondary, #232728);
        transition: all 500ms ease-in-out;
        font-size: 20px;
        line-height: 235%;
        font-size: 20px;
        font-weight: 600;
    }
    .pronation_widget ul a.active, .pronation_widget ul a:hover {
        background-color: var(--firdip-base, #a47c68);
        color: var(--firdip-white, #fff);
        border: 1px solid var(--firdip-base, #a47c68);
    }
</style>
@if ($paginator->hasPages())
    <div class="pronation_widget text-start">
        <ul class="list-unstyled">
            @if (!$paginator->onFirstPage())
                <li><a href="{{ $paginator->previousPageUrl() }}"><i class="fas fa-angle-left"></i></a></li>
            @endif

            @foreach ($elements as $element)
                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())

                            <li><a href="#" class="active">{{ $page }}</a></li>

                        @else

                            <li><a href="{{ $url }}">{{ $page }}</a></li>

                        @endif
                    @endforeach
                @endif
            @endforeach
            @if ($paginator->hasMorePages())

                <li><a href="{{ $paginator->nextPageUrl() }}"><i class="fas fa-angle-right"></i></a></li>
            @endif

        </ul>
    </div>
@endif

