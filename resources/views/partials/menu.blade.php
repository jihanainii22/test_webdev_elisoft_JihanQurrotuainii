<li>{{ $menu['nama'] }}</li>
@if (!empty($menu['children']))
    <ul class="menu-list">
        @foreach ($menu['children'] as $child)
            @include('partials.menu', ['menu' => $child])
        @endforeach
    </ul>
@endif
