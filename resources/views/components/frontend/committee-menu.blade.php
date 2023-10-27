<div class="committee-menu">
    @foreach ($menus as $menu)
    <a href="{{ route($menu['route_name'], $menu['route_param']) }}" @class(['active'=> $menu['active']])>
        <div class="work-description ">{!! $menu['icon'] ?? null !!} {{ $menu['title'] }}</div>
    </a>
    @endforeach
</div>

@push('styles')
<style>
    .committee-menu {
        display: flex;
        gap: .5rem;
        font-size: .9rem;
    }

    .committee-menu a {
        background-color: #0054a6;
        padding: 10px 15px;
        color: #fff;
        border-radius: 3px;
    }

    .committee-menu a i,
    .committee-menu a svg {
        margin-right: .5rem;
        opacity: .9;
        height: .9rem;
    }

    /* .committee-menu a:first-of-type {
        border-top-left-radius: 4px;
        border-bottom-left-radius: 4px;
    }

    .committee-menu a:last-of-type {
        border-right: none;
        border-top-right-radius: 4px;
        border-bottom-right-radius: 4px;
    } */

    .committee-menu a.active {
        background-color: red;
        color: #fff;
    }

</style>
@endpush
