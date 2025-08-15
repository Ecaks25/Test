<!-- Menu -->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo">
    <a href="{{ url('/') }}" class="app-brand-link"><x-app-logo /></a>
  </div>

  <div class="menu-inner-shadow"></div>

  @php $menu = config('menu'); @endphp
  <ul class="menu-inner py-1">
    @foreach ($menu as $group)
      @php
        $hasChildren = isset($group['children']);
        $groupActive = $hasChildren ? collect($group['children'])->contains(fn ($item) => request()->routeIs($item['active'])) : request()->routeIs($group['active'] ?? '');
      @endphp
      @if (!isset($group['roles']) || (auth()->check() && auth()->user()->hasAnyRole($group['roles'])))
        <li class="menu-item {{ $groupActive ? 'active open' : '' }}">
          @if ($hasChildren)
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              @isset($group['icon'])<i class="menu-icon tf-icons {{ $group['icon'] }}"></i>@endisset
              <div class="text-truncate">{{ __($group['label']) }}</div>
            </a>
            <ul class="menu-sub">
              @foreach ($group['children'] as $item)
                @if (!isset($item['roles']) || (auth()->check() && auth()->user()->hasAnyRole($item['roles'])))
                  <li class="menu-item {{ request()->routeIs($item['active']) ? 'active' : '' }}">
                    @php $url = Route::has($item['route']) ? route($item['route'], $item['params'] ?? []) : '#'; @endphp
                    <a class="menu-link" href="{{ $url }}" wire:navigate>{{ __($item['label']) }}</a>
                  </li>
                @endif
              @endforeach
            </ul>
          @else
            @php $url = Route::has($group['route']) ? route($group['route']) : '#'; @endphp
            <a class="menu-link" href="{{ $url }}" wire:navigate>
              @isset($group['icon'])<i class="menu-icon tf-icons {{ $group['icon'] }}"></i>@endisset
              <div class="text-truncate">{{ __($group['label']) }}</div>
            </a>
          @endif
        </li>
      @endif
    @endforeach
  </ul>
</aside>
<!-- / Menu -->

<script>
  // Toggle the 'open' class when the menu-toggle is clicked
  document.querySelectorAll('.menu-toggle').forEach(function(menuToggle) {
    menuToggle.addEventListener('click', function() {
      const menuItem = menuToggle.closest('.menu-item');
      // Toggle the 'open' class on the clicked menu-item
      menuItem.classList.toggle('open');
    });
  });
</script>
