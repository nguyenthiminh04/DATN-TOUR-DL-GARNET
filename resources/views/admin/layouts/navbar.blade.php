<div class="app-menu navbar-menu">

    <div class="navbar-brand-box">
        <a href="index.html" class="logo logo-dark">
            <span class="logo-sm">
                <img src="admin/assets/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="admin/assets/images/logo-dark.png" alt="" height="22">
            </span>
        </a>
        <a href="index.html" class="logo logo-light">
            <span class="logo-sm">
                <img src="admin/assets/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="admin/assets/images/logo-light.png" alt="" height="22">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-3xl header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">

                <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                {{-- user --}}
                <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                        <a href="{{route('user.index')}}" class="nav-link">Dashboard</a>
                    </li>
                </ul>
                <li class="nav-item">
                    <a class="nav-link menu-link collapsed" href="#user" data-bs-toggle="collapse"
                        role="button" aria-expanded="false" aria-controls="user">
                        <i class="ph-gauge"></i> <span data-key="t-dashboards">Người dùng</span>
                    </a>
                    <div class="collapse menu-dropdown" id="user">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{route('user.index')}}" class="nav-link">Danh sách người dùng</a>
                            </li>
                        </ul>
                    </div>
                </li>
                {{-- tour --}}
                <li class="nav-item">
                    <a class="nav-link menu-link collapsed" href="#tour" data-bs-toggle="collapse"
                        role="button" aria-expanded="false" aria-controls="tour">
                        <i class="ph-gauge"></i> <span data-key="t-dashboards">Tour</span>
                    </a>
                    <div class="collapse menu-dropdown" id="tour">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{route('tour.index')}}" class="nav-link">Danh mục tour</a>
                            </li>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{route('tour.index')}}" class="nav-link">Danh sách tour</a>
                            </li>
                        </ul>
                    </div>
                </li>
                {{-- coupons --}}
                <li class="nav-item">
                    <a class="nav-link menu-link collapsed" href="#coupons" data-bs-toggle="collapse"
                        role="button" aria-expanded="false" aria-controls="coupons">
                        <i class="ph-gauge"></i> <span data-key="t-dashboards">Mã giảm giá</span>
                    </a>
                    <div class="collapse menu-dropdown" id="coupons">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{route('coupons.index')}}" class="nav-link">Danh sách mã giảm giá</a>
                            </li>
                        </ul>
                    </div>
                </li>
                {{-- location --}}
                <li class="nav-item">
                    <a class="nav-link menu-link collapsed" href="#location" data-bs-toggle="collapse"
                        role="button" aria-expanded="false" aria-controls="location">
                        <i class="ph-gauge"></i> <span data-key="t-dashboards">Địa điểm</span>
                    </a>
                    <div class="collapse menu-dropdown" id="location">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{route('location.index')}}" class="nav-link">Danh sách địa điểm</a>
                            </li>
                        </ul>
                    </div>
                </li>
                {{-- category --}}
                <li class="nav-item">
                    <a class="nav-link menu-link collapsed" href="#category" data-bs-toggle="collapse"
                        role="button" aria-expanded="false" aria-controls="category">
                        <i class="ph-gauge"></i> <span data-key="t-dashboards">Danh mục</span>
                    </a>
                    <div class="collapse menu-dropdown" id="category">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{route('category.index')}}" class="nav-link">Danh sách danh mục</a>
                            </li>
                        </ul>
                    </div>
                </li>
                {{-- faq --}}
                <li class="nav-item">
                    <a class="nav-link menu-link collapsed" href="#cauHoi" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="cauHoi">
                        <i class="ph-gauge"></i> <span data-key="t-dashboards">Câu hỏi</span>
                    </a>
                    <div class="collapse menu-dropdown" id="cauHoi">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{route('faqs.index')}}" class="nav-link">
                                    Danh sách câu hỏi</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('faqs.create')}}" class="nav-link">
                                    Thêm mới câu hỏi </a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link collapsed" href="#notifications" data-bs-toggle="collapse"
                        role="button" aria-expanded="false" aria-controls="notifications">
                        <i class="ph-layout"></i> <span data-key="t-layouts">Thông báo</span>
                    </a>
                    <div class="collapse menu-dropdown" id="notifications">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{route('notifications.index')}}"  class="nav-link">
                                    Danh sách thông báo</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('notifications.create')}}"  class="nav-link">
                                    Thêm mới thông báo</a>
                            </li>
                            
                        </ul>
                    </div>
                </li>



            </ul>
        </div>

    </div>

    <div class="sidebar-background"></div>
</div>

<div class="vertical-overlay"></div>
