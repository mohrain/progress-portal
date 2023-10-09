<div>
    @if ($page->descriptions)
        <p>
            {!! Str::limit(strip_tags($page->descriptions), 900, $end = '...') !!}
        </p>
        @if (strlen($page->descriptions) >= 2500)
            <div class="text-end">
                <a href="{{ route('pages.show', 'parathasha-sabha-paracaya') }}" class="btn bg-theme-color-blue p-2">पुरा हेर्नुहोस्</a>
            </div>
        @endif
    @endif
</div>
