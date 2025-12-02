@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" style="display: flex; justify-content: space-between; align-items: center;">
        <div style="flex: 1;">
            <p style="font-size: 14px; color: #6B7280;">
                Menampilkan
                <span style="font-weight: 600;">{{ $paginator->firstItem() }}</span>
                sampai
                <span style="font-weight: 600;">{{ $paginator->lastItem() }}</span>
                dari
                <span style="font-weight: 600;">{{ $paginator->total() }}</span>
                hasil
            </p>
        </div>

        <div style="flex: 1; display: flex; justify-content: flex-end;">
            <div style="display: inline-flex; border-radius: 6px; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <span style="display: inline-flex; align-items: center; padding: 8px 12px; font-size: 18px; font-weight: 500; color: #9CA3AF; background-color: #F9FAFB; border: 1px solid #E5E7EB; border-radius: 6px 0 0 6px; cursor: not-allowed;">
                        &lsaquo;
                    </span>
                @else
                    <a href="{{ $paginator->previousPageUrl() }}" style="display: inline-flex; align-items: center; padding: 8px 12px; font-size: 18px; font-weight: 500; color: #374151; background-color: white; border: 1px solid #E5E7EB; border-radius: 6px 0 0 6px; text-decoration: none; transition: all 0.15s;">
                        &lsaquo;
                    </a>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <span style="display: inline-flex; align-items: center; padding: 8px 12px; font-size: 14px; color: #9CA3AF; background-color: white; border-top: 1px solid #E5E7EB; border-bottom: 1px solid #E5E7EB;">{{ $element }}</span>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <span style="display: inline-flex; align-items: center; padding: 8px 12px; font-size: 14px; font-weight: 600; color: white; background-color: #4F46E5; border: 1px solid #4F46E5;">{{ $page }}</span>
                            @else
                                <a href="{{ $url }}" style="display: inline-flex; align-items: center; padding: 8px 12px; font-size: 14px; font-weight: 500; color: #374151; background-color: white; border-top: 1px solid #E5E7EB; border-bottom: 1px solid #E5E7EB; text-decoration: none; transition: all 0.15s;">{{ $page }}</a>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}" style="display: inline-flex; align-items: center; padding: 8px 12px; font-size: 18px; font-weight: 500; color: #374151; background-color: white; border: 1px solid #E5E7EB; border-radius: 0 6px 6px 0; text-decoration: none; transition: all 0.15s;">
                        &rsaquo;
                    </a>
                @else
                    <span style="display: inline-flex; align-items: center; padding: 8px 12px; font-size: 18px; font-weight: 500; color: #9CA3AF; background-color: #F9FAFB; border: 1px solid #E5E7EB; border-radius: 0 6px 6px 0; cursor: not-allowed;">
                        &rsaquo;
                    </span>
                @endif
            </div>
        </div>
    </nav>
@endif
