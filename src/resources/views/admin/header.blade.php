<header class="header header-sticky p-0 mb-2">
    <div class="container-fluid border-bottom px-4">
        <button class="header-toggler" type="button"
            onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()"
            style="margin-inline-start: -14px;">
            <svg class="icon icon-lg">
                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-menu"></use>
            </svg>
        </button>
        <ul class="header-nav d-none d-lg-flex">
            <li class="nav-item">
                <div>
                    Xin chào, <b>{{ auth('admin')->user()->name }}</b>
                </div>
            </li>
        </ul>
        <ul class="header-nav">
            <li class="nav-item dropdown">
                <div class="dropdown-menu dropdown-menu-end pt-0">
                    <button class="dropdown-item" onclick="confirmLogout()">
                        <svg class="icon me-2">
                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-account-logout"></use>
                        </svg> Đăng xuất
                    </button>
                </div>
            </li>
        </ul>
    </div>
</header>
