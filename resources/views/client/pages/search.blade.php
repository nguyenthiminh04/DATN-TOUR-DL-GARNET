@extends('client.layouts.app')

@section('style')
    <style>
        .no-results {
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 300px;
            text-align: center;
        }

        .no-results img {
            margin-bottom: 20px;
        }
    </style>
@endsection

@section('content')
    <section class="bread-crumb margin-bottom-10">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <ul class="breadcrumb" itemscope="" itemtype="https://schema.org/BreadcrumbList">
                        <li class="home" itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
                            <a itemprop="item" href="{{ url('/') }}" title="Trang chủ">
                                <span itemprop="name">Trang chủ</span>
                                <meta itemprop="position" content="1">
                            </a>
                            <span><i class="fa fa-angle-right"></i></span>
                        </li>

                        <li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
                            <strong itemprop="name">Kết quả tìm kiếm</strong>
                            <meta itemprop="position" content="2">
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="signup search-main">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    @if ($tours->total() > 0)
                        <h1 class="title-head">Có {{ $tours->total() }} kết quả tìm kiếm phù hợp với từ khóa
                            "{{ Request::get('query') }}"</h1>
                    @endif
                </div>

                @if ($tours->total() > 0)
                    <div class="products-view-grid products">
                        <div class="clearfix">
                            @foreach ($tours as $tour)
                                <div class="col-100 col-xs-6 col-sm-4 col-md-3 col-lg-3">
                                    <div class="product-box">
                                        <div class="product-thumbnail">
                                            <a href="{{ route('tour.show', $tour->id) }}" title="{{ $tour->title }}">
                                                <img src="{{ $tour->image }}" alt="{{ $tour->title }}">
                                            </a>
                                        </div>
                                        <div class="product-info a-left">
                                            <h3 class="product-name">
                                                <a href="{{ route('tour.show', $tour->id) }}" title="{{ $tour->title }}">
                                                    {{ $tour->name }}
                                                </a>
                                            </h3>
                                            <div class="clearfix">
                                                <div class="box-prices">
                                                    <div class="price-box clearfix">
                                                        <div class="special-price f-left">
                                                            <span
                                                                class="price product-price">{{ number_format($tour->price_old) }}₫</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-xs-12 text-xs-center">
                        <nav class="text-center">
                            {{ $tours->links() }}
                        </nav>
                    </div>
                @else
                    <div class="no-results">
                        <img src="https://deo.shopeemobile.com/shopee/shopee-pcmall-live-sg/search/a60759ad1dabe909c46a.png"
                            alt="No results found" width="200px">
                        <h2 class="title-head">
                            Không tìm thấy kết quả nào phù hợp với từ khóa "{{ Request::get('query') }}"
                        </h2>
                    </div>
                @endif
            </div>
        </div>
    </section>

@endsection

@section('script')
@endsection
