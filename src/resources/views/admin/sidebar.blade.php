<div class="sidebar sidebar-light sidebar-fixed border-end" id="sidebar">
    <div class="sidebar-header border-bottom">
        <div class="sidebar-brand d-flex justify-content-center w-100">
            <a href="{{ route('admin.index') }}" class="sidebar-brand-full">
                <img src="{{ get_option('seo-logo') }}" alt="Logo" class="h-60px">
            </a>
        </div>
        <button class="btn-close d-lg-none" type="button" data-coreui-dismiss="offcanvas" data-coreui-theme="dark"
            aria-label="Close"
            onclick="coreui.Sidebar.getInstance(document.querySelector(&quot;#sidebar&quot;)).toggle()"></button>
    </div>
    <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
        @php
            $routeName = \Route::currentRouteName();
        @endphp
        @foreach (get_menu_admin() as $item)
            @if ($item->menus()->count() > 0)
                <li class="nav-group {{ in_array($routeName, json_decode($item->active_route_name)) ? 'show' : '' }}">
                    <a class="nav-link nav-group-toggle" href="#">
                        <svg class="nav-icon">
                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-{{ $item->icon }}"></use>
                        </svg> {{ $item->name }}
                    </a>
                    <ul class="nav-group-items compact">
                        @foreach ($item->menus as $menu)
                            <li class="nav-item">
                                <a class="nav-link {{ in_array($routeName, json_decode($menu->active_route_name)) ? 'active' : '' }}"
                                    href="{{ route($menu->route_name) }}">
                                    <span class="nav-icon"><span class="nav-icon-bullet"></span></span>
                                    {{ $menu->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link {{ in_array($routeName, json_decode($item->active_route_name)) ? 'active' : '' }}"
                        href="{{ route($item->route_name) }}">
                        <svg class="nav-icon">
                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-{{ $item->icon }}"></use>
                        </svg> {{ $item->name }}
                    </a>
                </li>
            @endif
        @endforeach
    </ul>
    <div class="sidebar-footer border-top d-none d-md-flex">
        <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
    </div>
</div>
