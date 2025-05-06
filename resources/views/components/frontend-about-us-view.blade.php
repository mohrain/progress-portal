<div class="fs-5">
    @if ($page->descriptions)
    <p>
        {!! Str::limit(strip_tags($page->descriptions), 900, $end = '...') !!}
    </p>
    @if (strlen($page->descriptions) >= 2500)
    <div class="text-end">
        <a href="{{ route('pages.show', 1) }}" class="btn bg-theme-color-blue p-2">पुरा हेर्नुहोस्</a>
    </div>
    @endif
    @endif
</div>