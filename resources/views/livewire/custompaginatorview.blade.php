{{-- resources/views/livewire/custompaginatorview.blade.php --}}
@if ($paginator->hasPages())
<div style="display:flex; justify-content:center; margin-top:40px; font-family:'Segoe UI',sans-serif;">
    <ul style="display:flex; list-style:none; padding:0; gap:8px;">

        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li style="pointer-events:none; opacity:0.5;">
                <span style="padding:8px 12px; border-radius:6px; border:1px solid #ddd; color:#555;">&laquo;</span>
            </li>
        @else
            <li>
                <a href="{{ $paginator->previousPageUrl() }}" style="padding:8px 12px; border-radius:6px; border:1px solid #ddd; color:#555; text-decoration:none; transition:all 0.2s;" onmouseover="this.style.background='#ffce00'; this.style.color='#fff';" onmouseout="this.style.background=''; this.style.color='#555';">&laquo;</a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li style="padding:8px 12px; color:#999;">{{ $element }}</li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li>
                            <span style="padding:8px 12px; border-radius:6px; background:#ffce00; color:#2b2b2b; font-weight:600; border:1px solid #ffce00;">{{ $page }}</span>
                        </li>
                    @else
                        <li>
                            <a href="{{ $url }}" style="padding:8px 12px; border-radius:6px; border:1px solid #ddd; color:#555; text-decoration:none; transition:all 0.2s;" onmouseover="this.style.background='#ffce00'; this.style.color='#fff';" onmouseout="this.style.background=''; this.style.color='#555';">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li>
                <a href="{{ $paginator->nextPageUrl() }}" style="padding:8px 12px; border-radius:6px; border:1px solid #ddd; color:#555; text-decoration:none; transition:all 0.2s;" onmouseover="this.style.background='#ffce00'; this.style.color='#fff';" onmouseout="this.style.background=''; this.style.color='#555';">&raquo;</a>
            </li>
        @else
            <li style="pointer-events:none; opacity:0.5;">
                <span style="padding:8px 12px; border-radius:6px; border:1px solid #ddd; color:#555;">&raquo;</span>
            </li>
        @endif

    </ul>
</div>
@endif
