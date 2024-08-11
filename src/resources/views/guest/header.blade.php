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
    <div class="mainmenu">
        <div class="container">
            <nav class="navbar navbar-expand-lg">
                <a class="logo" href="/"><img src="/style/images/logo.png" alt="logo"></a>
                <button class="navbar-toggler ml-1" type="button" data-toggle="collapse" data-target="#NavbarContent">
                    <span class="icofont-navigation-menu"></span>
                </button>
                <div class="navbar-collapse collapse" id="NavbarContent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link {{Route::currentRouteName() == 'about' ? 'active' : ''}}" href="/gioi-thieu">Giới thiệu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{Route::currentRouteName() == 'service' ? 'active' : ''}}" href="/dich-vu">Dịch vụ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{(Route::currentRouteName() == 'blog' || Route::currentRouteName() == 'blog.detail') ? 'active' : ''}}" href="/tin-tuc">Tin tức</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{Route::currentRouteName() == 'faq' ? 'active' : ''}}" href="/faq">FAQs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{Route::currentRouteName() == 'contact' ? 'active' : ''}}" href="/lien-he">Liên hệ</a>
                        </li>
                    </ul>
                    
                    <ul class="nav navbar-nav login-btn">
                        <li class="nav-item log-btn"><a class="nav-link" href="#">LOG IN</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>
<!--end header area-->