<nav>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul id="nav" class="nav navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Trang chủ</a></li>
                    @foreach ($categoryes as $category)
                        <li class="nav-item {{ $category->children->isNotEmpty() ? 'has-mega' : '' }}">
                            <a class="nav-link" href="{{ url('tour/' . $category->slug) }}">
                                {{ $category->name }}
                                @if ($category->children->isNotEmpty())
                                    <i class="fa fa-angle-right"></i>
                                @endif
                            </a>

                            @if ($category->children->isNotEmpty())
                                <div class="mega-content">
                                    <div class="level0-wrapper2">
                                        <div class="nav-block nav-block-center">
                                            <ul class="level0">
                                                @foreach ($category->children as $child)
                                                    <li class="level1 parent item">
                                                        <h2 class="h4">
                                                            <a href="{{ url('tour/' . $child->slug) }}">
                                                                <span>{{ $child->name }}</span>
                                                            </a>
                                                        </h2>
                                                        @if ($child->children->isNotEmpty())
                                                            <ul class="level1">
                                                                @foreach ($child->children as $subChild)
                                                                    <li class="level2">
                                                                        <a href="{{ url('tour/' . $subChild->slug) }}">
                                                                            <span>{{ $subChild->name }}</span>
                                                                        </a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        @endif
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </li>
                    @endforeach

                    <!-- Các menu tĩnh -->
                    <li class="nav-item"><a class="nav-link" href="{{ route('introduce.index') }}">Giới thiệu</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('service.index') }}">Dịch vụ tour</a></li>
                    {{-- <li class="nav-item"><a class="nav-link" href="{{ route('handbook.index') }}">Cẩm nang du lịch</a></li> --}}

                    <li class="nav-item"><a class="nav-link" href="{{ route('contact.index') }}">Liên hệ</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('favorite.index') }}">Yêu
                            Thích</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="#" class="notification-icon" id="showNotifications">
                            <i class="fa fa-bell"></i> Thông báo
                            @if (Auth()->user())
                                <span class="badge badge-danger">{{ $unreadNotifications->count() }}</span>
                            @else
                                <span class="badge badge-danger">0</span>
                            @endif

                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- Modal hiển thị thông báo -->
@if (Auth()->user())
    <div class="notification-popup" id="notificationPopup">
        <div class="notification-header">
            <h4>Thông Báo Mới Nhận</h4>
            {{-- <button class="btn btn-sm btn-success mark-all-read" id="markAllRead">Đọc Tất Cả</button> --}}
        </div>
        <div class="notification-body">
            <!-- Hiển thị các thông báo -->
            @foreach ($notifications as $notification)
                <div class="notification-item">
                    <div class="notification-content">
                        <p class="title">{{ $notification->title }}</p>
                        <p class="description">--{{ $notification->content }}</p>
                    </div>
                </div>
            @endforeach

        </div>
        <div class="notification-footer text-center">
            <button class="btn btn-sm btn-success mark-all-read" id="markAllRead">Đọc Tất Cả</button>
        </div>
    </div>
@endif
