@php
    $currentRoute = Route::currentRouteName();
@endphp
<header>
    <div class="bl-menu menu-pc">
        <div class="container">
            <div class="outer-header">
                <div class="logo">
                    <a href="{{ route('v2.home') }}"><img src="{{ asset('style2/images/logo.png') }}" alt="Image"></a>
                </div>
                <ul class="outer-menu">
                    @foreach (get_menu() as $item)
                        <li>
                            <a class="{{ in_array($currentRoute, $item['active']) ? 'active' : '' }}"
                                href="{{ $item['code'] }}">
                                {{ $item['name'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
                <div class="register">
                    <a href="#"><button class="btn">Đăng ký tư vấn</button></a>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Mobile Header -->
<div class="wsmobileheader clearfix ">
    <a id="wsnavtoggle" class="wsanimated-arrow"><span></span></a>
    <span class="smllogo"><a href="{{ route('v2.home') }}"><img src="{{ asset('style2/images/logo.png') }}"
                width="80" alt="Image"></a></span>
</div>
<!-- Mobile Header -->
<div class="wsmainwp clearfix menu-sp">
    <nav class="wsmenu clearfix">
        <div class="overlapblackbg"></div>
        <ul class="wsmenu-list">
            <li>
                <a class="{{ $currentRoute == 'v2.home' ? 'active' : '' }}" href="{{ route('v2.home') }}">
                    Trang chủ
                </a>
            </li>
            @foreach (get_menu() as $item)
                <li>
                    <a class="{{ in_array($currentRoute, $item['active']) ? 'active' : '' }}"
                        href="{{ $item['code'] }}">
                        {{ $item['name'] }}
                    </a>
                </li>
            @endforeach
        </ul>
    </nav>
</div>
