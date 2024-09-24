@php
    $currentRoute = Route::currentRouteName();
@endphp
<!--start preloader-->
<div class="preloader">
    <div class="d-table">
        <div class="d-table-cell align-middle">
            <div class="spinner">
                <div class="double-bounce1"></div>
                <div class="double-bounce2"></div>
            </div>
        </div>
    </div>
</div>
<!--end preloader-->
<!--start header area-->
<header id="header">
    <div class="mainmenu ver-2">
        <div class="container">
            <nav class="navbar navbar-expand-lg">
                <a class="logo logo-light" href="/">
                    <img src="{{ asset(get_option('seo-logo')) }}" alt="logo" height="42">
                </a>
                <a href="/" class="logo-default">
                    <img src="{{ asset(get_option('seo-logo')) }}" alt="logo" height="42">
                </a>
                <button class="navbar-toggler ml-1" type="button" data-toggle="collapse" data-target="#NavbarContent">
                    <span class="icofont-navigation-menu"></span>
                </button>
                <div class="navbar-collapse collapse" id="NavbarContent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link {{ $currentRoute == 'home' ? 'active' : '' }}" href="/">Trang
                                chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ $currentRoute == 'about' ? 'active' : '' }}" href="/gioi-thieu">Giới
                                thiệu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ $currentRoute == 'service' || $currentRoute == 'service.detail' ? 'active' : '' }}"
                                href="/dich-vu">Dịch vụ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ $currentRoute == 'blog' || $currentRoute == 'blog.detail' ? 'active' : '' }}"
                                href="/tin-tuc">Tin tức</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ $currentRoute == 'faq' ? 'active' : '' }}" href="/faq">FAQs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ $currentRoute == 'contact' ? 'active' : '' }}" href="/lien-he">Liên
                                hệ</a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav login-btn">
                        <li class="nav-item log-btn">
                            <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#open-contact"
                                onclick='return false'>Đăng ký tư vấn</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>
<!--end header area-->
