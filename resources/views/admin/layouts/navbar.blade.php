<div class="app-menu navbar-menu">

    <div class="navbar-brand-box">
        <a href="index.html" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('admin/assets/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('admin/assets/images/logo-dark.png') }}" alt="" height="22">
            </span>
        </a>
        <a href="index.html" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset('admin/assets/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('admin/assets/images/logo-light.png') }}" alt="" height="22">
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

                <li class="nav-item">
                    <a href="{{ route('home-admin') }}" class="nav-link menu-link ">
                        <i class="ri-dashboard-line"></i>
                        <span data-key="t-calendar">Dashboard</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link collapsed" href="#user" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="user">
                        <i class=" ph-user-circle-thin"></i> <span data-key="t-dashboards">Người dùng</span>
                    </a>
                    <div class="collapse menu-dropdown" id="user">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('user.index') }}" class="nav-link">Danh sách người dùng</a>
                            </li>
                        </ul>
                    </div>
                </li>
                {{-- tour --}}
                <li class="nav-item">
                    <a class="nav-link menu-link collapsed" href="#tour" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="tour">
                        <i class="ph-globe-hemisphere-east-light"></i> <span data-key="t-dashboards">Tour</span>
                    </a>
                    <div class="collapse menu-dropdown" id="tour">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{route('categorytour.index')}}" class="nav-link">Danh mục tour</a>
                            </li>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('tour.index') }}" class="nav-link">Danh sách tour</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link collapsed" href="#article" data-bs-toggle="collapse"
                        role="button" aria-expanded="false" aria-controls="article">
                        <i class="ph-gauge"></i> <span data-key="t-dashboards">Bài viết</span>
                    </a>
                    <div class="collapse menu-dropdown" id="article">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{route('article.index')}}" class="nav-link">Danh sách bài viết</a>
                            </li>
                        </ul>
                    </div>
                </li>
                {{-- coupons --}}
                <li class="nav-item">
                    <a class="nav-link menu-link collapsed" href="#coupons" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="coupons">
                        <i class=" ph-rug-light"></i> <span data-key="t-dashboards">Mã giảm giá</span>
                    </a>
                    <div class="collapse menu-dropdown" id="coupons">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('coupons.index') }}" class="nav-link">Danh sách mã giảm giá</a>
                            </li>
                        </ul>
                    </div>
                </li>
                {{-- location --}}
                <li class="nav-item">
                    <a class="nav-link menu-link collapsed" href="#location" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="location">
                        <i class="ph ph-map-pin-line"></i> <span data-key="t-dashboards">Địa điểm</span>
                    </a>
                    <div class="collapse menu-dropdown" id="location">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('location.index') }}" class="nav-link">Danh sách địa điểm</a>
                            </li>
                        </ul>
                    </div>
                </li>
                {{-- category --}}
                <li class="nav-item">
                    <a class="nav-link menu-link collapsed" href="#category" data-bs-toggle="collapse"
                        role="button" aria-expanded="false" aria-controls="category">
                        <i class="ph ph-list-dashes"></i> <span data-key="t-dashboards">Danh mục</span>
                    </a>
                    <div class="collapse menu-dropdown" id="category">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('category.index') }}" class="nav-link">Danh sách danh mục</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item"><a href="{{ route('advisory.index') }}" class="nav-link menu-link ">
                        <i class="ri-contacts-book-line"></i>
                        <span data-key="t-calendar">Hỗ trợ tư vấn</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('comment.index') }}" class="nav-link menu-link ">
                        <i class=" ri-message-2-line"></i>
                        <span data-key="t-calendar">Bình luận</span>
                    </a>
                </li>
                {{-- faq --}}
                <li class="nav-item">
                    <a class="nav-link menu-link collapsed" href="#cauHoi" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="cauHoi">
                        <i class="ph ph-question"></i> <span data-key="t-dashboards">Câu hỏi</span>
                    </a>
                    <div class="collapse menu-dropdown" id="cauHoi">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('faqs.index') }}" class="nav-link">
                                    Danh sách câu hỏi</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('faqs.create') }}" class="nav-link">
                                    Thêm mới câu hỏi </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link collapsed" href="#notifications" data-bs-toggle="collapse"
                        role="button" aria-expanded="false" aria-controls="notifications">
                        <i class="ph ph-notification"></i> <span data-key="t-layouts">Thông báo</span>
                    </a>
                    <div class="collapse menu-dropdown" id="notifications">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('notifications.index') }}" class="nav-link">
                                    Danh sách thông báo</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('notifications.create') }}" class="nav-link">
                                    Thêm mới thông báo</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('notification-user.create') }}" class="nav-link">
                                    Gán thông báo</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('notification-user.index') }}" class="nav-link">
                                    Thông báo đã gán</a>
                            </li>

                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link collapsed" href="#permissions" data-bs-toggle="collapse"
                        role="button" aria-expanded="false" aria-controls="permissions">
                        <i class="ph ph-notification"></i> <span data-key="t-layouts">Quyền</span>
                    </a>
                    <div class="collapse menu-dropdown" id="permissions">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('permissions.index') }}" class="nav-link">
                                    Danh sách quyền</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('permissions.create') }}" class="nav-link">
                                    Thêm mới quyền</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('notification-user.create') }}" class="nav-link">
                                    Gán quyền</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('notification-user.index') }}" class="nav-link">
                                    Quyền đã gán</a>
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