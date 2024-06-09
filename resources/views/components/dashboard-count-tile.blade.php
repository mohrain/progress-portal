
@props(['link'])
<a class="dashboard-count-tile d-flex align-items-center p-4 rounded my-3 card z-depth-0" @hasanyrole('super-admin|admin') href="{{ $link ?? '#' }}" @endhasanyrole>
    <h1>{{ $count ?? null }}</h1>
   <span>{{ $title ?? null }}</span>
</a>
