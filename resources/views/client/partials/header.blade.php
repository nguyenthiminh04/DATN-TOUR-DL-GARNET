<header class="header ">
    <div class="topbar hidden-sm hidden-xs">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <ul class="top-info">
                        <li><i class="fa fa-phone color-x" aria-hidden="true"></i> <a href="tel:19006750">1900
                                6750</a></li>
                        <li><i class="fa fa-envelope-o" aria-hidden="true"></i> <a
                                href="mailto:support@sapo.vn">support@sapo.vn</a></li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <ul class="list-inline f-right ul-account">
                        @if (Auth::check())
                            <li><a href="#"><i class="fa fa-user" aria-hidden="true"></i>
                                    {{ Auth::user()->name }}</a></li>
                            <li>
                                <form action="{{ route('logouts') }}" method="POST" style="display: inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-link"
                                        style="color: inherit; text-decoration: none;">
                                        <i class="fa fa-sign-out" aria-hidden="true"></i> Đăng xuất
                                    </button>
                                </form>
                            </li>
                        @else
                            <li><a href="{{ route('dang-nhap') }}"><i class="fa fa-sign-in" aria-hidden="true"></i> Đăng
                                    nhập</a></li>
                            <li><a href="{{ route('dang-ky') }}"><i class="fa fa-user-plus" aria-hidden="true"></i> Đăng
                                    ký</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="header-main">
            <div class="row">
                <div class="col-md-3">
                    <button type="button" class="nav-line-group hidden-lg hidden-md">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="logo">

                        <a href="{{ url('/') }}" class="logo-wrapper ">
                            <img src="{{ url('client/bizweb.dktcdn.net/100/299/077/themes/642224/assets/logo6d1d.png?1705894518705') }}"
                                alt="logo Ant Du lịch">
                        </a>
                    </div>
                    <a href="cart.html" class="icon-option-cart hidden-lg hidden-md hidden">
                        <span class="ng-binding ng-hide cart-products-count">0</span>
                    </a>
                </div>
                <div class="col-md-5">
                    <div class="search">
                        <div class="header_search search_form">
                            <form class="input-group search-bar search_form" action="{{ route('tour.search') }}"
                                method="get">
                                <input type="search" name="query" id="query"
                                    value="{{ !empty(Request::get('query')) ? Request::get('query') : '' }}"
                                    placeholder="Tìm kiếm tour..."
                                    class="input-group-field st-default-search-input search-text">
                                <span class="input-group-btn">
                                    <button class="btn icon-fallback-text">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 hidden-sm hidden-xs">
                    <div class="top-fun">
                        <div class="hotline">
                            <img src="http://bizweb.dktcdn.net/100/299/077/themes/642224/assets/hotline.svg?1705894518705"
                                alt="Tổng đài miễn phí" />
                            <div class="hotline-text">

                                <a href="tel:19006750">1900 6750</a>

                                <span>Tổng đài miễn phí</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul id="nav" class="nav container">

                        <li class="nav-item "><a class="nav-link" href="">Trang chủ</a></li>

                        <li class="nav-item "><a class="nav-link" href="gioi-thieu.html">Giới thiệu</a></li>

                        <li class="nav-item  has-mega">
                            <a href="tour-trong-nuoc.html" class="nav-link">Tour trong nước <i class="fa fa-angle-right"
                                    data-toggle="dropdown"></i></a>

                            <div class="mega-content">
                                <div class="level0-wrapper2">
                                    <div class="nav-block nav-block-center">
                                        <ul class="level0">


                                            <li class="level1 parent item">
                                                <h2 class="h4"><a href="mien-trung.html"><span>Miền Trung</span></a>
                                                </h2>
                                                <ul class="level1">

                                                    <li class="level2"> <a href="du-lich-quang-binh.html"><span>Du
                                                                lịch Quảng Bình</span></a> </li>

                                                    <li class="level2"> <a href="du-lich-hue.html"><span>Du lịch
                                                                Huế</span></a> </li>

                                                    <li class="level2"> <a href="du-lich-da-nang.html"><span>Du lịch
                                                                Đà Nẵng</span></a> </li>

                                                    <li class="level2"> <a href="du-lich-hoi-an.html"><span>Du lịch
                                                                Hội An</span></a> </li>

                                                    <li class="level2"> <a href="du-lich-nha-trang.html"><span>Du
                                                                lịch Nha Trang</span></a> </li>

                                                    <li class="level2"> <a href="du-lich-phan-thiet.html"><span>Du
                                                                lịch Phan Thiết</span></a> </li>

                                                    <li class="level2"> <a href="du-lich-da-lat.html"><span>Du lịch
                                                                Đà Lạt</span></a> </li>

                                                </ul>
                                            </li>

                                            <li class="level1 parent item">
                                                <h2 class="h4"><a href="mien-bac.html"><span>Miền Bắc</span></a>
                                                </h2>
                                                <ul class="level1">

                                                    <li class="level2"> <a href="du-lich-ha-noi.html"><span>Du lịch
                                                                Hà Nội</span></a> </li>

                                                    <li class="level2"> <a href="du-lich-ha-long.html"><span>Du lịch
                                                                Hạ Long</span></a> </li>

                                                    <li class="level2"> <a href="du-lich-sapa.html"><span>Du lịch
                                                                Sapa</span></a> </li>

                                                    <li class="level2"> <a href="du-lich-ninh-binh.html"><span>Du
                                                                lịch Ninh Bình</span></a> </li>

                                                    <li class="level2"> <a href="du-lich-hai-phong.html"><span>Du
                                                                lịch Hải Phòng</span></a> </li>

                                                </ul>
                                            </li>


                                            <li class="level1 parent item">
                                                <h2 class="h4"><a href="mien-nam.html"><span>Miền Nam</span></a>
                                                </h2>
                                                <ul class="level1">

                                                    <li class="level2"> <a href="du-lich-phu-quoc.html"><span>Du
                                                                lịch Phú Quốc</span></a> </li>

                                                    <li class="level2"> <a href="du-lich-con-dao.html"><span>Du lịch
                                                                Côn Đảo</span></a> </li>

                                                    <li class="level2"> <a href="du-lich-can-tho.html"><span>Du lịch
                                                                Cần Thơ</span></a> </li>

                                                    <li class="level2"> <a href="du-lich-vung-tau.html"><span>Du
                                                                lịch Vũng Tàu</span></a> </li>

                                                    <li class="level2"> <a href="du-lich-ben-tre.html"><span>Du lịch
                                                                Bến Tre</span></a> </li>

                                                    <li class="level2"> <a href="du-lich-dao-nam-du.html"><span>Du
                                                                lịch Đảo Nam Du</span></a> </li>

                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </li>

                        <li class="nav-item ">
                            <a href="tour-nuoc-ngoai.html" class="nav-link">Tour nước ngoài <i
                                    class="fa fa-angle-right" data-toggle="dropdown"></i></a>

                            <ul class="dropdown-menu">

                                <li class="nav-item-lv2">
                                    <a class="nav-link" href="du-lich-chau-a.html">Du lịch Châu Á</a>
                                </li>

                                <li class="nav-item-lv2">
                                    <a class="nav-link" href="du-lich-chau-au.html">Du lịch Châu Âu</a>
                                </li>

                                <li class="nav-item-lv2">
                                    <a class="nav-link" href="du-lich-chau-uc.html">Du lịch Châu Úc</a>
                                </li>

                                <li class="nav-item-lv2">
                                    <a class="nav-link" href="du-lich-chau-my.html">Du lịch Châu Mỹ</a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item "><a class="nav-link" href="dich-vu-tour.html">Dịch vụ tour</a></li>

                        <li class="nav-item "><a class="nav-link" href="cam-nang-du-lich.html">Cẩm nang du lịch</a>
                        </li>

                        <li class="nav-item active"><a class="nav-link" href="lien-he.html">Liên hệ</a></li>

                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>
