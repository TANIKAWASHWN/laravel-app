<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

@if ($paginator->hasPages())
<div class="flex justify-center items-center space-x-2 mt-4">
    <ul class="flex space-x-2">
        <li @if($paginator->onFirstPage()) class="disabled" @endif>
            <a href="{{ $paginator->url(1) }}" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300 transition duration-300">
                最初
            </a>
        </li>

        @if($paginator->currentPage() > 3)
            <li>
                <span class="px-4 py-2">…</span>
            </li>
        @endif

        @php 
            $min = $paginator->currentPage() - 2;
            $max = $paginator->currentPage() + 2; 
            if($min < 1)
            {
                $max -= $min - 1;
            }
            if($max > $paginator->lastPage())
            {
                $min -= $max - $paginator->lastPage();
                $max = $paginator->lastPage();
            }
            if($min < 1)
            {
                $min = 1;
            }
        @endphp

        @for($i = $min; $i <= $max; $i++)
            @if($i == $paginator->currentPage())
                <li>
                    <a href="{{ $paginator->url($i) }}" class="px-4 py-2 bg-blue-500 text-white rounded-lg cursor-pointer">{{ $i }}</a>
                </li>
                @continue
            @endif
            <li>
                <a href="{{ $paginator->url($i) }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-blue-500 hover:text-white transition duration-200">
                    {{ $i }}
                </a>
            </li>
        @endfor

        @if($paginator->currentPage() < $paginator->lastPage() - 2)
            <li>
                <span class="px-4 py-2">…</span>
            </li>
        @endif

        <li @if(!$paginator->hasMorePages()) class="disabled" @endif>
            <a href="{{ $paginator->url($paginator->lastPage()) }}" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300 transition duration-300">
                最後
            </a>
        </li>
    </ul>
</div>
@endif