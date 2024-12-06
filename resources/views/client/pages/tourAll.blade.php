@extends('client.layouts.app')

@section('content')
    <section class="bread-crumb margin-bottom-10">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <ul class="breadcrumb" itemscope="" itemtype="https://schema.org/BreadcrumbList">
                        <li class="home" itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
                            <a itemprop="item" href="{{ route('home') }}" title="Trang chủ">
                                <span itemprop="name">Trang chủ</span>
                                <meta itemprop="position" content="1">
                            </a>
                            <span><i class="fa fa-angle-right"></i></span>
                        </li>

                        <li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
                            <strong itemprop="name">Tất cả các tour</strong>
                            <meta itemprop="position" content="2">
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="row">
            <section class="main_container collection col-md-12 tour-grid">
                <h1 class="title-head margin-top-0 text-center">Tất cả các tour</h1>
                <div class="sortPagiBar tour-sortby row-filter">
                    <div class="clearfix row">
                        <div class="col-md-3 col-sm-6">
                            <aside class="aside-item filter-price" data-group="Khoảng giá">
                                <div class="aside-title">
                                    <h2 class="title-head margin-top-0"><span data-count="0" data-title="Theo mức giá">Theo
                                            mức giá</span></h2>
                                </div>
                                <div class="aside-content filter-group">
                                    <ul>

                                        <li class="filter-item filter-item--check-box filter-item--green">
                                            <span>
                                                <label for="filter-duoi-2-000-000d">
                                                    <input type="checkbox" id="filter-duoi-2-000-000d"
                                                        onchange="toggleFilter(this);" data-group="Khoảng giá"
                                                        data-field="price_min" data-text="Dưới 2.000.000đ"
                                                        value="(<2000000)" data-operator="OR">
                                                    <i class="fa"></i>
                                                    Dưới 2.000.000đ
                                                </label>
                                            </span>
                                        </li>


                                        <li class="filter-item filter-item--check-box filter-item--green">
                                            <span>
                                                <label for="filter-2-000-000d-4-000-000d">
                                                    <input type="checkbox" id="filter-2-000-000d-4-000-000d"
                                                        onchange="toggleFilter(this)" data-count="0" data-group="Khoảng giá"
                                                        data-field="price_min" data-text="2.000.000đ - 4.000.000đ"
                                                        value="(>=2000000 AND <=4000000)" data-operator="OR">
                                                    <i class="fa"></i>
                                                    2.000.000đ - 4.000.000đ
                                                </label>
                                            </span>
                                        </li>


                                        <li class="filter-item filter-item--check-box filter-item--green">
                                            <span>
                                                <label for="filter-4-000-000d-6-000-000d">
                                                    <input type="checkbox" id="filter-4-000-000d-6-000-000d"
                                                        onchange="toggleFilter(this)" data-count="0" data-group="Khoảng giá"
                                                        data-field="price_min" data-text="4.000.000đ - 6.000.000đ"
                                                        value="(>=4000000 AND <=6000000)" data-operator="OR">
                                                    <i class="fa"></i>
                                                    4.000.000đ - 6.000.000đ
                                                </label>
                                            </span>
                                        </li>

                                        <li class="filter-item filter-item--check-box filter-item--green">
                                            <span>
                                                <label for="filter-6-000-000d-8-000-000d">
                                                    <input type="checkbox" id="filter-6-000-000d-8-000-000d"
                                                        onchange="toggleFilter(this)" data-count="0" data-group="Khoảng giá"
                                                        data-field="price_min" data-text="6.000.000đ - 8.000.000đ"
                                                        value="(>=6000000 AND <=8000000)" data-operator="OR">
                                                    <i class="fa"></i>
                                                    6.000.000đ - 8.000.000đ
                                                </label>
                                            </span>
                                        </li>

                                        <li class="filter-item filter-item--check-box filter-item--green">
                                            <span>
                                                <label for="filter-8-000-000d-10-000-000d">
                                                    <input type="checkbox" id="filter-8-000-000d-10-000-000d"
                                                        onchange="toggleFilter(this)" data-count="0" data-group="Khoảng giá"
                                                        data-field="price_min" data-text="8.000.000đ - 10.000.000đ"
                                                        value="(>=8000000 AND <=10000000)" data-operator="OR">
                                                    <i class="fa"></i>
                                                    8.000.000đ - 10.000.000đ
                                                </label>
                                            </span>
                                        </li>
                                        <li class="filter-item filter-item--check-box filter-item--green">
                                            <span>
                                                <label for="filter-tren10-000-000d">
                                                    <input type="checkbox" id="filter-tren10-000-000d"
                                                        onchange="toggleFilter(this)" data-count="0"
                                                        data-group="Khoảng giá" data-field="price_min"
                                                        data-text="Trên 10.000.000đ" value="(>10000000)"
                                                        data-operator="OR">
                                                    <i class="fa"></i>
                                                    Trên 10.000.000đ
                                                </label>
                                            </span>
                                        </li>



                                    </ul>
                                </div>
                            </aside>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <aside class="aside-item filter-type" data-group="Loại">
                                <div class="aside-title">
                                    <h2 class="title-head margin-top-0"><span data-count="0" data-title="Điểm đi">Điểm
                                            đi</span></h2>
                                </div>
                                <div class="aside-content filter-group">
                                    <ul>


                                        <li class="filter-item filter-item--check-box filter-item--green">
                                            <span>
                                                <label for="filter-ho-chi-minh">
                                                    <input type="checkbox" id="filter-ho-chi-minh"
                                                        onchange="toggleFilter(this)" data-group="Loại"
                                                        data-field="product_type" data-text="Hồ Chí Minh"
                                                        value="(Hồ Chí Minh)" data-operator="OR">
                                                    <i class="fa"></i>
                                                    Hồ Chí Minh
                                                </label>
                                            </span>
                                        </li>


                                    </ul>
                                </div>
                            </aside>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <aside class="aside-item filter-vendor" data-group="Hãng">
                                <div class="aside-title">
                                    <h2 class="title-head margin-top-0"><span data-count="0" data-title="Điểm đến">Điểm
                                            đến</span></h2>
                                </div>
                                <div class="aside-content filter-group" data-group="Hãng">
                                    <ul>


                                        <li class="filter-item filter-item--check-box filter-item--green ">
                                            <span>
                                                <label for="filter-cao-bang">
                                                    <input type="checkbox" id="filter-cao-bang"
                                                        onchange="toggleFilter(this)" data-group="Hãng"
                                                        data-field="vendor" data-text="Cao Bằng" value="(Cao Bằng)"
                                                        data-operator="OR">
                                                    <i class="fa"></i>
                                                    Cao Bằng
                                                </label>
                                            </span>
                                        </li>



                                        <li class="filter-item filter-item--check-box filter-item--green ">
                                            <span>
                                                <label for="filter-ha-noi">
                                                    <input type="checkbox" id="filter-ha-noi"
                                                        onchange="toggleFilter(this)" data-group="Hãng"
                                                        data-field="vendor" data-text="Hà Nội" value="(Hà Nội)"
                                                        data-operator="OR">
                                                    <i class="fa"></i>
                                                    Hà Nội
                                                </label>
                                            </span>
                                        </li>



                                        <li class="filter-item filter-item--check-box filter-item--green ">
                                            <span>
                                                <label for="filter-hai-duong">
                                                    <input type="checkbox" id="filter-hai-duong"
                                                        onchange="toggleFilter(this)" data-group="Hãng"
                                                        data-field="vendor" data-text="Hải Dương" value="(Hải Dương)"
                                                        data-operator="OR">
                                                    <i class="fa"></i>
                                                    Hải Dương
                                                </label>
                                            </span>
                                        </li>


                                    </ul>
                                </div>
                            </aside>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <aside class="aside-item filter-tag-style-1" data-group="tag2">
                                <div class="aside-title">
                                    <h2 class="title-head margin-top-0"><span data-count="0" data-title="Đánh giá">Đánh
                                            giá</span></h2>
                                </div>
                                <div class="aside-content filter-group">
                                    <ul>




                                        <li class="filter-item filter-item--check-box filter-item--green">
                                            <span>
                                                <label for="filter-1sao">
                                                    <input type="checkbox" id="filter-1sao" onchange="toggleFilter(this)"
                                                        data-group="tag2" data-field="tags" data-text="1sao"
                                                        value="(1sao)" data-operator="OR">
                                                    <i class="fa"></i>


                                                    <i class="fa fa-star" aria-hidden="true"></i>

                                                </label>
                                            </span>
                                        </li>



                                        <li class="filter-item filter-item--check-box filter-item--green">
                                            <span>
                                                <label for="filter-2sao">
                                                    <input type="checkbox" id="filter-2sao" onchange="toggleFilter(this)"
                                                        data-group="tag2" data-field="tags" data-text="2sao"
                                                        value="(2sao)" data-operator="OR">
                                                    <i class="fa"></i>


                                                    <i class="fa fa-star" aria-hidden="true"></i>

                                                    <i class="fa fa-star" aria-hidden="true"></i>

                                                </label>
                                            </span>
                                        </li>



                                        <li class="filter-item filter-item--check-box filter-item--green">
                                            <span>
                                                <label for="filter-3sao">
                                                    <input type="checkbox" id="filter-3sao" onchange="toggleFilter(this)"
                                                        data-group="tag2" data-field="tags" data-text="3sao"
                                                        value="(3sao)" data-operator="OR">
                                                    <i class="fa"></i>


                                                    <i class="fa fa-star" aria-hidden="true"></i>

                                                    <i class="fa fa-star" aria-hidden="true"></i>

                                                    <i class="fa fa-star" aria-hidden="true"></i>

                                                </label>
                                            </span>
                                        </li>



                                        <li class="filter-item filter-item--check-box filter-item--green">
                                            <span>
                                                <label for="filter-4sao">
                                                    <input type="checkbox" id="filter-4sao" onchange="toggleFilter(this)"
                                                        data-group="tag2" data-field="tags" data-text="4sao"
                                                        value="(4sao)" data-operator="OR">
                                                    <i class="fa"></i>


                                                    <i class="fa fa-star" aria-hidden="true"></i>

                                                    <i class="fa fa-star" aria-hidden="true"></i>

                                                    <i class="fa fa-star" aria-hidden="true"></i>

                                                    <i class="fa fa-star" aria-hidden="true"></i>

                                                </label>
                                            </span>
                                        </li>



                                        <li class="filter-item filter-item--check-box filter-item--green">
                                            <span>
                                                <label for="filter-5sao">
                                                    <input type="checkbox" id="filter-5sao" onchange="toggleFilter(this)"
                                                        data-group="tag2" data-field="tags" data-text="5sao"
                                                        value="(5sao)" data-operator="OR">
                                                    <i class="fa"></i>


                                                    <i class="fa fa-star" aria-hidden="true"></i>

                                                    <i class="fa fa-star" aria-hidden="true"></i>

                                                    <i class="fa fa-star" aria-hidden="true"></i>

                                                    <i class="fa fa-star" aria-hidden="true"></i>

                                                    <i class="fa fa-star" aria-hidden="true"></i>

                                                </label>
                                            </span>
                                        </li>

                                    </ul>
                                </div>
                            </aside>
                        </div>
                    </div>
                </div>
                <div class="category-products products">
                    <section class="products-view products-view-grid">
                        <div id="tours-container" class="row"></div>
                        @foreach ($getTour as $tour)
                            <div class="col-100 col-xs-6 col-sm-4 col-md-3 col-lg-3">
                                <div class="product-box">
                                    <div class="product-thumbnail">
                                        <a href="{{ route('detail', $tour->id) }}" title="{{ $tour->title }}">
                                            <img src="{{ Storage::url($tour->image) }}" alt="{{ $tour->title }}">
                                        </a>
                                    </div>
                                    <div class="product-info a-left">
                                        <h3 class="product-name">
                                            <a href="{{ route('detail', $tour->id) }}" title="{{ $tour->title }}">
                                                {{ $tour->name }}
                                                [{{ $tour->journeys }}]
                                            </a>
                                        </h3>
                                        <div class="clearfix">
                                            <div class="box-prices">
                                                <div class="price-box clearfix">
                                                    <div class="special-price f-left">
                                                        <span class="price product-price">
                                                            {{ number_format($tour->price_old * (1 - $tour->sale / 100), 0, '', '.') }}
                                                            VNĐ
                                                        </span>
                                                    </div>
                                                    <div class="old-price">
                                                        <span class="price product-price-old">
                                                            {{ number_format($tour->price_old, 0, '', '.') }} VNĐ
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="box-date-tour">
                                            <ul class="ct_course_list">
                                                <li class="clearfix">
                                                    <div class="ulimg"><img
                                                            src="http://bizweb.dktcdn.net/100/299/077/themes/642224/assets/tag_icon_4.svg"
                                                            alt="Khởi hành" /></div>
                                                    Khởi hành: {{ $tour->start_date }} - {{ $tour->end_date }}
                                                </li>
                                                <li class="clearfix">
                                                    <div class="ulimg"><img
                                                            src="http://bizweb.dktcdn.net/100/299/077/themes/642224/assets/tag_icon_5.svg"
                                                            alt="Thời gian" /></div>
                                                    Thời gian: {{ $tour->schedule }}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                </div>
            </section>
        </div>
        </section>
    </div>
    </div>
@endsection
