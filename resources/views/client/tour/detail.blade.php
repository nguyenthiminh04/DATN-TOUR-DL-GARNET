@extends('client.layouts.app')
@section('title')
    {{ $tour->name }}
@endsection
@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <style>
        /* Hiển thị sao cho điểm trung bình */
        .average-rating .stars {
            font-size: 1.5rem;
            color: #d3d3d3;
            /* Màu sao chưa được đánh giá */
        }

        .average-rating .stars .star.filled {
            color: gold;
            /* Màu sao đã được đánh giá */
        }

        .average-rating .rating-number {
            font-size: 1rem;
            color: #555;
        }

        /* Định dạng riêng cho khối đánh giá */
        .tour-review {
            max-width: 400px;
            margin: 20px auto;
            text-align: center;
            font-family: Arial, sans-serif;
        }

        .tour-review .star-rating {
            display: flex;
            justify-content: center;
            direction: rtl;
            /* Hiển thị ngôi sao từ phải sang trái */
            margin: 10px 0;
        }

        .tour-review .star-rating input[type="radio"] {
            display: none;
            /* Ẩn các input radio */
        }

        .tour-review .star-rating label {
            font-size: 2rem;
            /* Kích thước ngôi sao */
            color: #ccc;
            /* Màu mặc định cho ngôi sao */
            cursor: pointer;
            transition: color 0.2s ease-in-out;
        }

        .tour-review .star-rating input[type="radio"]:checked~label {
            color: #ffc107;
            /* Màu vàng cho ngôi sao được chọn */
        }

        .tour-review .star-rating label:hover,
        .tour-review .star-rating label:hover~label {
            color: #ffc107;
            /* Màu vàng khi hover qua các ngôi sao */
        }

        .tour-review button {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 1rem;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.2s ease-in-out;
            margin-top: 10px;
        }

        .tour-review button:hover {
            background-color: #218838;
        }

        /* Css Form Ngày */
        #datesss {
            background-color: white;
            /* White background for the input field */
            border: 1px solid #ccc;
            /* Light grey border */
            padding: 8px;
            color: #333;
            /* Text color */
        }

        /* Target the calendar popup */
        .ui-datepicker {
            background-color: white !important;
            /* Set the background of the calendar to white */
            border: 1px solid #ccc;
            /* Border for the calendar */
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            /* Optional: add a shadow to make it pop */
        }

        /* Make the whole day cell change color for valid dates */
        .ui-datepicker td:not(.ui-state-disabled):not(.ui-datepicker-other-month):hover {
            background-color: #007bff;
            /* Change the background of the entire cell */
            color: white;
            /* Change the text color to white */
            cursor: pointer;
            /* Change cursor to pointer */
        }

        /* Optional: Adjust text color for day cells */
        .ui-datepicker td:not(.ui-state-disabled) a {
            color: #333;
            /* Default text color for valid dates */
        }

        /* Hover effect for links (valid dates) */
        .ui-datepicker td:not(.ui-state-disabled) a:hover {
            color: white;
            /* Change the text color to white on hover */
        }

        /* Style the previous and next buttons */
        .ui-datepicker-prev,
        .ui-datepicker-next {
            color: #007bff;
            /* Set the text color to blue */
            font-weight: bold;
            /* Make the text bold */
            font-size: 14px;
            /* Adjust the font size for better visibility */
            padding: 5px;
            /* Add padding for better spacing */
            cursor: pointer;
            /* Change cursor to pointer */
        }

        .ui-datepicker-prev:hover,
        .ui-datepicker-next:hover {
            color: #0056b3;
            /* Darker blue for hover effect */
            background-color: #e6f0ff;
            /* Light blue background */
            border-radius: 4px;
            /* Rounded corners */
        }

        /* Style the month and year dropdowns */
        .ui-datepicker-title select {
            background-color: #f9f9f9;
            /* Light background for dropdowns */
            color: #333;
            /* Text color */
            font-size: 14px;
            /* Font size for better readability */
            border: 1px solid #ccc;
            /* Border for the dropdown */
            padding: 4px;
            /* Padding for spacing */
            border-radius: 4px;
            /* Rounded corners for dropdowns */
        }

        /* On hover or focus */
        .ui-datepicker-title select:hover,
        .ui-datepicker-title select:focus {
            border-color: #007bff;
            /* Change border color on hover/focus */
            outline: none;
            /* Remove default outline */
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
            /* Add shadow effect */
        }

        /* Optional: Align the month and year dropdowns */
        .ui-datepicker-title {
            display: flex;
            justify-content: center;
            /* Center align the dropdowns */
            align-items: center;
            /* Center align vertically */
            gap: 5px;
            /* Add spacing between the dropdowns */
        }

        /* Style for days not in the current month */
        .ui-datepicker .ui-datepicker-other-month {
            color: #aaa;
            /* Dimmed text color for other months */
            background-color: #f9f9f9;
            /* Optional: light background */
            pointer-events: none;
            /* Disable click for other months */
        }

        /* Prevent hover effect for days not in the current month */
        .ui-datepicker .ui-datepicker-other-month:hover {
            background-color: #f9f9f9;
            /* Prevent hover effect */
            color: #aaa;
            /* Keep the text color dimmed */
        }

        /* Style for disabled days */
        .ui-datepicker td.ui-state-disabled {
            color: #ccc !important;
            /* Dimmed text for disabled days */
            background-color: #f9f9f9 !important;
            /* Light gray background for disabled days */
            pointer-events: none;
            /* Disable hover and click */
            cursor: not-allowed;
            /* Show 'not-allowed' cursor */
        }

        /* Hết Css Form NGày  */
        .owl-prev:hover,
        .owl-next:hover {
            opacity: 1;
            /* Khi hover sẽ hiện rõ */
        }

        .owl-prev.disabled,
        .owl-next.disabled {
            opacity: 0.3;
            /* Giảm độ mờ khi nút bị vô hiệu hóa */
            cursor: not-allowed;
            /* Thêm con trỏ chuột không cho phép khi vô hiệu hóa */
        }

        #sync1 .item,
        #sync2 .item {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #sync1 .item img,
        #sync2 .item img {
            max-width: 100%;
            height: auto;
        }

        /* Nếu bạn muốn điều chỉnh độ cao của ảnh */
        #sync1,
        #sync2 {
            margin: 0;
            padding: 0;
        }

        #sync2 .owl-item {
            width: 80px;
            /* Thu nhỏ ảnh thu nhỏ */
            margin-right: 10px;
        }

        #sync1 {
            margin-bottom: 20px;
        }

        /* styles.css hoặc file CSS chung */
        .tour-policy-content {
            max-height: 500px;
            overflow-y: auto;
        }

        .product-promotions-list-content {
            max-height: 300px;
            overflow-y: auto;
        }

        form textarea {
            width: 100%;
            height: 50px;
            resize: vertical;
        }
    </style>
    <style>
        .popup-sapo {
            position: fixed;
            bottom: 80px;
            left: 17px;
            margin: 0;
            z-index: 30;
            top: auto !important
        }

        .popup-sapo .icon {
            position: relative;
            z-index: 4;
            height: 48px;
            width: 48px;
            text-align: center;
            border-radius: 50%;
            border: 1px solid #ffffff;
            cursor: pointer;
            background: #1ba0e2;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            animation: pulse 2s infinite;
            animation: pulse 2s infinite;
            cursor: pointer
        }

        .popup-sapo .icon svg {
            fill: #ffffff;
            width: 20px;
            height: 20px;
            transition: opacity 0.35s ease-in-out, -webkit-transform 0.35s ease-in-out;
            transition: opacity 0.35s ease-in-out, transform 0.35s ease-in-out;
            transition: opacity 0.35s ease-in-out, transform 0.35s ease-in-out, -webkit-transform 0.35s ease-in-out;
            animation: iconSkew 1s infinite ease-out;
            min-height: -webkit-fill-available
        }

        .popup-sapo .content {
            background: #1ba0e2;
            color: #fff;
            padding: 20px 10px 40px;
            border-radius: 10px;
            width: 300px;
            position: absolute;
            bottom: 27px;
            left: 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            -webkit-transform-origin: 100% bottom;
            transform-origin: 0 bottom;
            transform: scale(0);
            -webkit-transform: scale(0);
            -moz-transform: scale(0);
            -ms-transform: scale(0);
            -o-transform: scale(0);
            transition: -webkit-transform 0.35s cubic-bezier(0.165, 0.84, 0.44, 1);
            transition: transform 0.35s cubic-bezier(0.165, 0.84, 0.44, 1);
            transition: transform 0.35s cubic-bezier(0.165, 0.84, 0.44, 1), -webkit-transform 0.35s cubic-bezier(0.165, 0.84, 0.44, 1);
            -webkit-transition: transform 0.35s cubic-bezier(0.165, 0.84, 0.44, 1)
        }

        @media (max-width: 500px) {
            .popup-sapo .content {
                width: 250px
            }
        }

        .popup-sapo .content .title {
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 12px;
            margin-top: 8px;
            color: #fff;
        }

        .popup-sapo .content .close-popup-sapo {
            position: absolute;
            right: 10px;
            top: 5px;
            cursor: pointer
        }

        .popup-sapo .content .close-popup-sapo svg {
            width: 15px;
            height: 15px
        }

        .popup-sapo .content .close-popup-sapo svg path {
            fill: #fff
        }

        .popup-sapo .content ul {
            margin-bottom: 20px
        }

        .popup-sapo .content ul li {
            margin-bottom: 10px
        }

        .popup-sapo .content ul li svg {
            margin-right: 10px
        }

        .popup-sapo .content ul li svg path {
            fill: #fff
        }

        .popup-sapo .content ul li a {
            color: #fff
        }

        .popup-sapo .content ul li a:hover {
            color: #fff;
            text-decoration: underline;
        }

        .popup-sapo .content .ghichu {
            font-style: italic;
            font-size: 14px
        }

        .popup-sapo.active .content {
            -ms-transition-delay: 0.1s;
            -webkit-transition-delay: 0.15s;
            transition-delay: 0.1s;
            transform: scale(1);
            -webkit-transform: scale(1);
            -moz-transform: scale(1);
            -ms-transform: scale(1);
            -o-transform: scale(1)
        }

        .wolf-chat-plugin {
            bottom: 30px;
            z-index: 99;
            background-color: rgb(10, 124, 255);
            align-items: center;
            border-radius: 60px;
            display: flex;
            height: 44px;
            padding: 0px 16px;
            position: fixed;
            width: fit-content;
            right: 0px;
            top: auto !important;
        }
    </style>
    <style>
        .img-sm {
            width: 46px;
            height: 46px;
        }

        .panel {
            box-shadow: 0 2px 0 rgba(0, 0, 0, 0.075);
            border-radius: 0;
            border: 0;
            margin-bottom: 15px;
        }

        .panel .panel-footer,
        .panel>:last-child {
            border-bottom-left-radius: 0;
            border-bottom-right-radius: 0;
        }

        .panel .panel-heading,
        .panel>:first-child {
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }

        .panel-body {
            padding: 25px 20px;
        }


        .media-block .media-left {
            display: block;
            float: left
        }

        .media-block .media-right {
            float: right
        }

        .media-block .media-body {
            display: block;
            overflow: hidden;
            width: auto
        }

        .middle .media-left,
        .middle .media-right,
        .middle .media-body {
            vertical-align: middle
        }

        .thumbnail {
            border-radius: 0;
            border-color: #e9e9e9
        }

        .tag.tag-sm,
        .btn-group-sm>.tag {
            padding: 5px 10px;
        }

        .tag:not(.label) {
            background-color: #fff;
            padding: 6px 12px;
            border-radius: 2px;
            border: 1px solid #cdd6e1;
            font-size: 12px;
            line-height: 1.42857;
            vertical-align: middle;
            -webkit-transition: all .15s;
            transition: all .15s;
        }

        .text-muted,
        a.text-muted:hover,
        a.text-muted:focus {
            color: #acacac;
        }

        .text-sm {
            font-size: 0.9em;
        }

        .text-5x,
        .text-4x,
        .text-5x,
        .text-2x,
        .text-lg,
        .text-sm,
        .text-xs {
            line-height: 1.25;
        }

        .btn-trans {
            background-color: transparent;
            border-color: transparent;
            color: #929292;
        }

        .btn-icon {
            padding-left: 9px;
            padding-right: 9px;
        }


        .btn-group-sm>.btn,
        .btn-icon.btn-sm {
            padding: 5px 10px !important;
        }

        .mar-top {
            margin-top: 15px;
        }
    </style>
@endsection

@section('content')
    <section class="bread-crumb margin-bottom-10">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <ul class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
                        <li class="home" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                            <a itemprop="item" href="/" title="Trang chủ">
                                <span itemprop="name">Trang chủ</span>
                                <meta itemprop="position" content="1" />
                            </a>
                            <span><i class="fa fa-angle-right"></i></span>
                        </li>


                        <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                            <a itemprop="item" href="du-lich-cuba.html" title="Du lịch Cuba">
                                <span itemprop="name"><?= $tour['name'] ?></span>
                                <meta itemprop="position" content="2" />
                            </a>
                            <span><i class="fa fa-angle-right"></i></span>
                        </li>

                        <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                            <span itemprop="name"><?= $tour['title'] ?> [<?= $tour['journeys'] ?>]</span>
                            <meta itemprop="position" content="3" />
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="product p-multiple" itemscope itemtype="http://schema.org/Product">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 details-product">
                    <div class="row margin-bottom-10 margin-bottom-20">
                        <div class="col-md-6">
                            <div id="sync1" class="owl-carousel owl-theme">
                                @foreach ($images as $img)
                                    <div class="item">
                                        <img src="{{ asset('storage/' . $img->image) }}" alt="{{ $img->name }}"
                                            style="width: 555px; height: 370px;" class="img-responsive center-block" />
                                    </div>
                                @endforeach
                            </div>

                            <div id="sync2" class="owl-carousel owl-theme">
                                @foreach ($images as $img)
                                    <div class="item">
                                        <img src="{{ asset('storage/' . $img->image) }}" alt="{{ $img->name }}"
                                            style=": 70px;" class="img-responsive center-block" />
                                    </div>
                                @endforeach
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="details-pro">
                                <h1 class="title-head">{{ $tour->name }}</h1>

                                <div class="sku-product hidden">
                                    SKU: <span class="variant-sku">(Đang cập nhật...)</span>
                                    <span class="hidden">Ant Du lịch</span>
                                </div>

                                <div class="journey">
                                    <span>Hành trình:</span> <?= $tour['journeys'] ?>
                                </div>

                                <ul class="ct_course_list">

                                    <li>
                                        <div class="ulimg"><img
                                                src="http://bizweb.dktcdn.net/100/299/077/themes/642224/assets/tag_icon_1.svg?1705894518705"
                                                alt="Di chuyển bằng Ô tô" /></div>
                                        Di chuyển bằng Ô tô
                                    </li>
                                    <li>
                                        <div class="ulimg"><img
                                                src="http://bizweb.dktcdn.net/100/299/077/themes/642224/assets/tag_icon_2.svg?1705894518705"
                                                alt="Di chuyển bằng tàu thủy" /></div>
                                        Di chuyển bằng tàu thủy
                                    </li>
                                    <li>
                                        <div class="ulimg"><img
                                                src="http://bizweb.dktcdn.net/100/299/077/themes/642224/assets/tag_icon_3.svg?1705894518705"
                                                alt="Di chuyển bằng máy bay" /></div>
                                        Di chuyển bằng máy bay
                                    </li>

                                    <li>
                                        <div class="ulimg"><img
                                                src="http://bizweb.dktcdn.net/100/299/077/themes/642224/assets/tag_icon_4.svg?1705894518705"
                                                alt="Thứ 2 - 5 hằng tuần" /></div>
                                        <span id="date-khoi-hanh">Thứ 2 - 5 hằng tuần</span>
                                    </li>

                                    <li>
                                        <div class="ulimg"><img
                                                src="http://bizweb.dktcdn.net/100/299/077/themes/642224/assets/tag_icon_5.svg?1705894518705"
                                                alt="10 ngày 9 đêm" /></div>
                                        <?= $tour['schedule'] ?>
                                    </li>
                                    <div class="tour-rating">
                                        <h4>Đánh giá tour</h4>
                                        <div class="average-rating">
                                            @if ($averageRating)
                                                <div class="stars">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        <span
                                                            class="star {{ $i <= $averageRating ? 'filled' : '' }}">&#9733;</span>
                                                    @endfor
                                                </div>
                                                <span class="rating-number">({{ $averageRating }} sao)</span>
                                            @else
                                                <p>Chưa có đánh giá nào.</p>
                                            @endif
                                        </div>
                                    </div>
                                </ul>

                                <div class="product-summary product_description margin-bottom-10 margin-top-5">
                                    <div class="rte description">

                                        -<?= $tour['description'] ?>

                                    </div>
                                </div>

                                <div class="call-me-back">
                                    <ul class="row">
                                        <li class="col-md-6 col-sm-6 col-xs-6 col-100">
                                            <a class="add-to-favorite" data-id="{{ $tour->id }}">
                                                <i class="fa fa-heart "></i> Thêm vào yêu thích
                                            </a>
                                        </li>
                                        <li class="col-md-6 col-sm-6 col-xs-6 col-100">
                                            <button class="btn-callmeback" type="button" data-toggle="modal"
                                                data-target="#myModal"><i class="fa fa-phone" aria-hidden="true"></i> Gọi
                                                lại cho tôi sau</button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row" id="book-tour-now">
                        <div class="col-xs-12 col-sm-12 col-md-7 details-pro">
                            <div class="form-product">
                                <form>
                                    <div class="pd_tour_variants clearfix">
                                        <ul class="pd_variants_title nostyled ohidden clearfix">
                                            <li class="col-xs-4">
                                                Loại khách
                                            </li>
                                            <li class="col-xs-2 col-xss-4 noleftpadding norightpadding">
                                                Số lượng
                                            </li>
                                            <li class="col-xs-3 col-xss-4 text-right">
                                                Đơn giá
                                            </li>
                                            <li class="col-xs-3 hidden-xss text-right">
                                                Tổng giá
                                            </li>
                                        </ul>
                                        <div class="pd_variants_content clearfix">

                                            <ul class="nostyled variant_list clearfix" id="16258400">
                                                <li class="col-xs-4 variant_title">
                                                    <div class="variant_mutiple" title="Người lớn">Người lớn</div>
                                                </li>
                                                <li class="col-xs-2 col-xss-4 norightpadding noleftpadding">
                                                    <div class="quantity product-quantity clearfix">
                                                        <input type="hidden" value="16258400" name="variantId"
                                                            id="variant-0">
                                                        <button type="button" class="minus">
                                                            <i class="fa fa-angle-down"></i>
                                                        </button>
                                                        <input type="number" step="1" min="1"
                                                            name="quantity" value="1" title="Số lượng"
                                                            class="qty" size="4" id="quantity-0" disabled>
                                                        <button type="button" class="plus">
                                                            <i class="fa fa-angle-up"></i>
                                                        </button>
                                                    </div>
                                                </li>
                                                <li class="col-xs-3 col-xss-4 text-right variant_price">
                                                    <?= number_format($tour->price_old * (1 - $tour->sale / 100), 0, '', '.') ?>đ
                                                    <input type="hidden" name="variant_price"
                                                        value="<?= $tour->price_old * (1 - $tour->sale / 100) ?>">
                                                </li>
                                                <li class="col-xs-3 hidden-xss subtotal text-right" id="subtotal">
                                                    {{ number_format($tour->price_old * (1 - $tour->sale / 100), 0, '', '.') }}VNĐ
                                                </li>
                                            </ul>

                                            <ul class="nostyled variant_list clearfix" id="16258401">
                                                <li class="col-xs-4 variant_title">
                                                    <div class="variant_mutiple" title="Trẻ em">Trẻ em</div>

                                                </li>
                                                <li class="col-xs-2 col-xss-4 norightpadding noleftpadding">
                                                    <div class="quantity product-quantity clearfix">
                                                        <input type="hidden" value="16258401" name="variantId"
                                                            id="variant-1">
                                                        <button type="button" class="minus">
                                                            <i class="fa fa-angle-down"></i>
                                                        </button>
                                                        <input type="number" step="1" min="1"
                                                            name="quantity" value="0" title="Số lượng"
                                                            class="qty" size="4" id="quantity-1" disabled>
                                                        <button type="button" value="+" class="plus">
                                                            <i class="fa fa-angle-up"></i>
                                                        </button>
                                                    </div>
                                                </li>
                                                <li class="col-xs-3 col-xss-4 text-right variant_price">
                                                    <?= number_format($tour['price_children'], 0, '', '.') ?>đ
                                                    <input type="hidden" name="variant_price"
                                                        value="<?= $tour['price_children'] ?>">
                                                </li>
                                                <li class="col-xs-3 hidden-xss subtotal text-right">0₫</li>
                                            </ul>

                                            <div class="totalPrice ohidden text-right clearfix">
                                                <span class="col-md-8 col-sm-9">
                                                    Tổng tiền
                                                </span>
                                                <strong class="col-md-4 col-sm-3"></strong>
                                            </div>
                                            <script>
                                                var tourName = <?= json_encode($tour['name']) ?>;
                                                // var startDate = <?= json_encode($tour['start_date']) ?>;




                                                // Lấy tất cả các phần tử nhóm sản phẩm
                                                const variantLists = document.querySelectorAll(".variant_list");

                                                // Phần tử hiển thị tổng tiền
                                                const totalPriceElement = document.querySelector(".totalPrice strong");

                                                function getStartDate() {
                                                    return document.getElementById('datepicker').value;
                                                }

                                                // Hàm cập nhật tổng tiền
                                                function updateTotalPrice() {
                                                    let totalPrice = 0;

                                                    variantLists.forEach((variantList) => {
                                                        const quantityInput = variantList.querySelector(".qty");
                                                        const variantPriceInput = variantList.querySelector("[name='variant_price']");
                                                        const variantPrice = parseInt(variantPriceInput.value, 10);
                                                        const quantity = parseInt(quantityInput.value, 10);
                                                        totalPrice += variantPrice * quantity; // Cộng tổng tiền từ từng nhóm
                                                    });

                                                    // Hiển thị tổng tiền đã định dạng
                                                    totalPriceElement.textContent = totalPrice.toLocaleString("vi-VN") + "₫";

                                                    // Lấy giá trị ngày từ input
                                                    var startDate = getStartDate();
                                                    console.log(startDate);

                                                    // Lưu thông tin vào sessionStorage
                                                    const selectedTourInfo = {
                                                        totalPrice: totalPrice,
                                                        startDate: startDate,
                                                        tourName: tourName,
                                                        quantities: Array.from(variantLists).map((variantList) => {
                                                            const quantityInput = variantList.querySelector(".qty");
                                                            const variantPriceInput = variantList.querySelector("[name='variant_price']");
                                                            return {
                                                                quantity: parseInt(quantityInput.value, 10),
                                                                price: parseInt(variantPriceInput.value, 10)
                                                            };
                                                        })
                                                    };

                                                    sessionStorage.setItem("selectedTourInfo", JSON.stringify(selectedTourInfo));
                                                }

                                                // Gắn sự kiện cho từng nhóm
                                                variantLists.forEach((variantList) => {
                                                    const minusButton = variantList.querySelector(".minus");
                                                    const plusButton = variantList.querySelector(".plus");
                                                    const quantityInput = variantList.querySelector(".qty");
                                                    const variantPriceInput = variantList.querySelector("[name='variant_price']");
                                                    const subtotalElement = variantList.querySelector(".subtotal");
                                                    const variantPrice = parseInt(variantPriceInput.value, 10);

                                                    // Hàm cập nhật tổng giá từng nhóm
                                                    function updateSubtotal(quantity) {
                                                        const total = quantity > 0 ? variantPrice * quantity : 0; // Nếu số lượng là 0 thì tổng là 0
                                                        subtotalElement.textContent = total.toLocaleString("vi-VN") + "₫"; // Cập nhật subtotal
                                                        updateTotalPrice(); // Cập nhật tổng tiền
                                                    }

                                                    // Sự kiện khi bấm nút giảm
                                                    minusButton.addEventListener("click", () => {
                                                        let currentQuantity = parseInt(quantityInput.value, 10);
                                                        if (currentQuantity > 0) {
                                                            currentQuantity -= 1;
                                                            quantityInput.value = currentQuantity;
                                                            updateSubtotal(currentQuantity); // Cập nhật subtotal khi giảm
                                                        }
                                                    });

                                                    // Sự kiện khi bấm nút tăng
                                                    plusButton.addEventListener("click", () => {
                                                        let currentQuantity = parseInt(quantityInput.value, 10);
                                                        currentQuantity += 1;
                                                        quantityInput.value = currentQuantity;
                                                        updateSubtotal(currentQuantity); // Cập nhật subtotal khi tăng
                                                    });
                                                });

                                                updateTotalPrice();
                                            </script>

                                        </div>
                                    </div>
                                    <div class="row contact_btn_group">
                                        <div class="col-md-6 col-sm-7 col-xs-6 col-100">
                                            <div class="line-item-property__field">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"
                                                            aria-hidden="true"></i></span>
                                                    <input type="text" id="datepicker" placeholder="Chọn ngày"
                                                        class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-5 add-to-cart col-xs-6 col-100">
                                            @if ($tour['number'] > 0)
                                                <a href="{{ route('tour.pre-booking', ['id' => $tour->id]) }}"
                                                    id="tour-link">
                                                    <button type="button" id="submit-table"
                                                        class="pull-right btn btn-default buynow add-to-cart button nomargin">
                                                        <i class="fa fa-paper-plane" aria-hidden="true"></i> Đặt tour
                                                    </button>
                                                </a>
                                            @else
                                                <span
                                                    style=" margin-top: 30px; 
                                                            width: 100%;    
                                                            height: 40px;                                          
                                                            display: inline-block;
                                                            padding: 5px 20px;
                                                            background-color: #f8d7da; /* Màu nền nhạt */
                                                            color: #721c24; /* Màu chữ nổi bật */
                                                            border: 1px solid #f5c6cb; /* Viền cùng tông */
                                                            border-radius: 5px; /* Bo góc mềm mại */
                                                            font-size: 14px; /* Cỡ chữ vừa phải */
                                                            font-weight: bold; /* Chữ đậm */
                                                            text-align: center;
                                                            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Đổ bóng */">
                                                    Đã tạm dừng tour. Hãy quay lại sau!
                                                </span>
                                            @endif
                                        </div>


                                    </div>
                                    <div class="alert alert-warning alert-dismissible margin-top-20" role="alert">
                                        <button type="button" class="close" data-dismiss="alert"
                                            aria-label="Close"><span aria-hidden="true">×</span></button>
                                        Vui lòng liên hệ <strong><a href="tel:19006750">1900 6750</a></strong> để đặt Tour.
                                    </div>
                                    <script>
                                        if ($('.pd_tour_variants .pd_variants_content ul').length == '0') {
                                            $('.pd_tour_variants').addClass('hidden');
                                            $('.contact_btn_group').addClass('hidden');
                                            $('.alert-warning').removeClass('hidden');
                                        } else {
                                            $('.alert-warning').addClass('hidden');
                                            $.each($('.quantity'), function() {
                                                var $qty = $(this).find('input.qty')
                                                var quantity = parseInt($qty.val());
                                                var $minus = $(this).find('.minus');
                                                var $plus = $(this).find('.plus');
                                                $minus.on('click', function() {
                                                    if (quantity > 0) {
                                                        if (quantity == 1) {}
                                                        quantity -= 1;
                                                    } else {
                                                        quantity = 0;
                                                    }
                                                    $qty.val(quantity);
                                                    updatePrice()
                                                })
                                                $plus.on('click', function() {
                                                    if (quantity < 100) {
                                                        quantity += 1;
                                                    } else {
                                                        quantity = 100;
                                                    }
                                                    $qty.val(quantity);
                                                    var max = parseInt(jQuery($qty).attr('max'), 10) || 10000;
                                                    var value = parseInt(jQuery($qty).val(), 10) || 0;
                                                    if (value > max) {
                                                        alert('Chúng tôi chỉ còn ' + max + ' mặt hàng này trong kho');
                                                        jQuery($qty).val(max);
                                                    };
                                                    updatePrice();
                                                });
                                            })

                                            var updatePrice = function() {
                                                var totalPrice = 0;
                                                $.each($('.pd_variants_content ul'), function() {
                                                    var unitPrice = parseInt($(this).find('.variant_price [name="variant_price"]').val());
                                                    var qty = parseInt($(this).find('.product-quantity .qty').val());
                                                    var subTotalPrice = unitPrice * qty;
                                                    $(this).find('.subtotal').html(Bizweb.formatMoney(subTotalPrice,
                                                        "{{ 'amount_no_decimals_with_comma_separator' }}₫"));
                                                    totalPrice += subTotalPrice;
                                                })
                                                $('.totalPrice strong').html(Bizweb.formatMoney(totalPrice,
                                                    "{{ 'amount_no_decimals_with_comma_separator' }}₫"));
                                                $('.totalPrice strong').attr("data-price", totalPrice);
                                                if ($(".totalPrice strong").attr("data-price") > 0) {
                                                    $("#submit-table").removeAttr('disabled');
                                                } else {
                                                    $("#submit-table").attr('disabled', 'disabled');
                                                }
                                            }

                                            $(document).ready(function() {
                                                updatePrice();
                                            })
                                        }
                                    </script>
                                </form>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-5 tour-policy">


                            <div class="tour-policy-content">

                                <div class="main-project__tab--content tour-no-contentt">
                                    <div class="product-promotions-list">
                                        <h2 class="product-promotions-list-title">Chính sách Tour</h2>
                                        <div class="product-promotions-list-content">
                                            Chính sách đang được cập nhật.
                                        </div>
                                    </div>
                                </div>

                                <div class="main-project__tab--content">
                                    <div class="product-promotions-list">
                                        <h2 class="product-promotions-list-title">Chính sách Tour</h2>
                                        <div class="product-promotions-list-content">

                                            <strong>* Giá tour bao gồm:</strong><br />
                                            <?= $tour['content'] ?>
                                            <p><strong>* Giá tour không bao
                                                    gồm:&nbsp;&nbsp;&nbsp;</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />
                                                -&nbsp;Chi phí làm hộ chiếu, các chương trình tự chọn, nước uống, giặt ủi,
                                                điện thoại... và các chi phí cá nhân khác của khách ngoài chương
                                                trình.<br />
                                                -&nbsp;Hành lý quá cước, chi phí dời ngày và đổi chặng bay theo qui định của
                                                hàng không.<br />
                                                -&nbsp;Phí phòng đơn (dành cho khách yêu cầu ở phòng đơn).<br />
                                                -&nbsp;Tiền bồi dưỡng cho HDV&nbsp;và lái xe địa phương (8 CAD/ khách/
                                                ngày).</p>
                                            <p><strong>Điều khoản hủy tour (Thời gian hủy tour được tính cho ngày làm việc,
                                                    không tính ngày Thứ Bảy, Chủ Nhật và các ngày nghỉ Lễ).</strong><br />
                                                -&nbsp;Sau khi đặt cọc tour, nếu Qúy khách báo hủy tour Công ty chúng tôi sẽ
                                                không hoàn lại tiền cọc. Đồng thời Chúng tôi&nbsp;sẽ báo hủy hồ sơ &nbsp;của
                                                khách.<br />
                                                -&nbsp;Nếu Qúy khách báo hủy/chuyển tour, vui lòng thanh toán lệ phí
                                                hủy/chuyển tour cụ thể như sau:<br />
                                                1/ Trước ngày đi 30 - 35 ngày làm việc (không tính thứ Bảy &amp; Chủ Nhật
                                                &amp; ngày nghỉ Tết) thanh toán: 50% giá tour&nbsp;<br />
                                                2/ Trước ngày đi từ 10 - 29 ngày làm việc (không tính thứ Bảy &amp; Chủ Nhật
                                                &amp; ngày nghỉ Tết) thanh toán: 70% giá tour<br />
                                                3/ Trước ngày đi từ 02 - 09 ngày làm việc (không tính thứ Bảy &amp; Chủ Nhật
                                                &amp; ngày nghỉ Tết) thanh toán: 90% giá tour<br />
                                                4/ Hủy trước ngày đi trong vòng 24h trước ngày khởi hành (không tính thứ Bảy
                                                &amp; Chủ Nhật &amp; ngày nghỉ Tết): 100% giá tour<br />
                                                -&nbsp;Vì bất cứ lí do gì, nếu quý khách bị từ chối visa Canada, quý khách
                                                vui lòng nộp lệ phí là: 5.000.000 vnđ<br />
                                                -&nbsp;Quý khách có nhu cầu lưu trú tại Canada thêm ngoài chương trình tour
                                                vui lòng thông báo tại thời điểm đăng kí tour, đóng thêm chênh lệch tiền vé
                                                máy bay phụ trội ở lại về sau và các chặng bay nội địa theo quy định của
                                                hàng không.</p>
                                        </div>
                                    </div>
                                </div>
                                <style>
                                    .tour-no-content {
                                        display: none;
                                    }
                                </style>



                            </div>

                        </div>
                    </div>

                    <div class="row">

                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9 margin-top-15 margin-bottom-10">
                            <div class="tour-tab-title">
                                Lịch trình Tour
                            </div>
                            <div class="product-tab">
                                {!! $tour->content !!}
                            </div>

                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
                            <div class="right_module">

                                <div class="similar-product">
                                    <div class="right-bestsell clearfix">
                                        <h2>Tour gợi ý</h2>
                                        <div class="list-bestsell clearfix">
                                            @foreach ($suggestedTours as $suggestedTour)
                                                <div class="list-bestsell-item">
                                                    <div class="thumbnail-container clearfix">
                                                        <div class="product-image">
                                                            <a href="{{ route('detail', $suggestedTour->id) }}">
                                                                <img class="img-responsive"
                                                                    src="{{ Storage::url($suggestedTour->image) }}"
                                                                    alt="{{ $suggestedTour->name }}" />
                                                            </a>
                                                        </div>
                                                        <div class="product-meta">
                                                            <h3>
                                                                <a href="{{ route('detail', $suggestedTour->id) }}"
                                                                    title="{{ $suggestedTour->name }}">
                                                                    {{ $suggestedTour->name }}
                                                                </a>
                                                            </h3>
                                                            <div class="product-price-and-shipping">
                                                                <span class="price">
                                                                    {{ number_format($tour->price_old * (1 - $tour->sale / 100), 0, '', '.') }}₫
                                                                </span>
                                                                @if ($suggestedTour->price_old)
                                                                    <span class="regular-price">
                                                                        {{ number_format($tour->price_old, 0, '', '.') }}₫
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    @if ($canReview)
                        <div class="tour-review">
                            <form method="POST" id="reviewForm" data-tour-id="{{ $tour->id }}"
                                action="{{ route('reviews.store', $tour->id) }}">
                                @csrf
                                <div class="star-rating">
                                    <input type="radio" id="star5" name="rating" value="5" required />
                                    <label for="star5" title="5 sao">☆</label>
                                    <input type="radio" id="star4" name="rating" value="4" />
                                    <label for="star4" title="4 sao">☆</label>
                                    <input type="radio" id="star3" name="rating" value="3" />
                                    <label for="star3" title="3 sao">☆</label>
                                    <input type="radio" id="star2" name="rating" value="2" />
                                    <label for="star2" title="2 sao">☆</label>
                                    <input type="radio" id="star1" name="rating" value="1" />
                                    <label for="star1" title="1 sao">☆</label>
                                </div>

                                <button type="submit">Gửi đánh giá</button>
                            </form>
                        </div>
                    @else
                        <p>Bạn cần hoàn tất tour để có thể đánh giá.</p>
                    @endif


                    <div class="row">
                        <div class="container bootdey">
                            <div class="col-md-12 bootstrap snippets">
                                <!-- Hiển thị form bình luận nếu người dùng đã đặt tour -->
                                @if ($userHasBooked)
                                    <div class="panel">
                                        <div class="panel-body">
                                            <form id="commentForm" method="POST"
                                                action="{{ route('posts.comment', $tour->id) }}">
                                                @csrf
                                                <textarea class="form-control" name="content" rows="2" placeholder="Bạn đang nghĩ gì?" required></textarea>
                                                <div class="mar-top clearfix">
                                                    <button class="btn btn-primary pull-right" type="submit">
                                                        <i class="fa fa-pencil fa-fw"></i> Gửi
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                @else
                                    <div class="alert alert-warning">
                                        <strong>Bạn chưa đặt tour này!</strong> Vui lòng Đặt để gửi bình luận.
                                    </div>
                                @endif

                                <!-- Hiển thị danh sách bình luận -->
                                <div id="commentSection">
                                    @foreach ($comments as $comment)
                                        <div class="panel" id="comment_{{ $comment->id }}">
                                            <div class="panel-body">
                                                <div class="media-block">
                                                    <a class="media-left" href="#">
                                                        <img class="img-circle img-sm" alt="Profile Picture"
                                                            src="{{ Storage::url($comment->user->avatar) }}">
                                                    </a>
                                                    <div class="media-body">
                                                        <div class="mar-btm">
                                                            <strong
                                                                class="btn-link text-semibold media-heading box-inline">
                                                                {{ $comment->user ? $comment->user->name : 'Ẩn danh' }}
                                                            </strong>
                                                            <p class="text-muted text-sm">
                                                                <i class="fa fa-clock-o"></i> {{ $comment->created_at }}
                                                            </p>
                                                        </div>
                                                        <p>{{ $comment->content }}</p>
                                                        <hr>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <div class="callmeback-form modal fade" id="myModal" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Hỗ trợ tư vấn miễn phí</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-5 col-sm-5">
                            <img src="{{ asset('storage/' . $img->image) }}" width="220px" height="150px"
                                alt="Du lịch Cao Bằng - Bản Giốc - Bắc Kạn - Ba Bể - Hà Nội"
                                class="img-responsive center-block" />
                            <h3 class="cta-name-pro">{{ $tour->name }}</h3>
                        </div>
                        <div class="col-md-7 col-sm-7">
                            <form method="post" id="advisoryForm" action="{{ route('advisory') }}">
                                @csrf
                                <input type="hidden" name="tour_id" value="{{ $tour->id }}">
                                <div class="form-signup clearfix">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <fieldset class="form-group">
                                                <input placeholder="Họ tên" type="text" name="name" id="name"
                                                    class="form-control" />

                                            </fieldset>
                                        </div>
                                        <div class="col-xs-12">
                                            <fieldset class="form-group">
                                                <input placeholder="Điện thoại" type="text" name="phone_number"
                                                    id="phone" class="form-control number-sidebar" />
                                            </fieldset>
                                        </div>
                                        <div class="col-xs-12">
                                            <fieldset class="form-group">
                                                <input placeholder="Email" type="email" name="email" id="email"
                                                    class="form-control" />
                                            </fieldset>
                                        </div>
                                        <div class="col-xs-12">
                                            <fieldset class="form-group">
                                                <textarea placeholder="Nội dung" name="content" id="comment" class="form-control" rows="3"></textarea>
                                            </fieldset>
                                            <div class="pull-xs-right text-center" style="margin-top:10px;">
                                                <button type="submit"
                                                    class="btn btn-blues btn-style btn-style-active">Gửi thông
                                                    tin</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/vn.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

   
    <script>
        $(document).ready(function() {
            // Lắng nghe sự kiện submit của form bình luận
            $('#commentForm').on('submit', function(e) {
                e.preventDefault(); // Ngừng hành động mặc định của form

                var form = $(this);
                var content = form.find('textarea[name="content"]').val();

                // Kiểm tra nếu nội dung không rỗng
                if (content.trim() !== '') {
                    $.ajax({
                        url: form.attr('action'),
                        type: 'POST',
                        data: form.serialize(), // Gửi tất cả dữ liệu của form
                        success: function(response) {
                            if (response.success) {
                                // Thêm bình luận mới vào danh sách
                                var newComment = response.comment;

                                var newCommentHtml = `
                            <div class="panel" id="comment_${newComment.id}">
                                <div class="panel-body">
                                    <div class="media-block">
                                        <a class="media-left" href="#">
                                            <img class="img-circle img-sm" alt="Profile Picture" src="${newComment.user_avatar}">
                                        </a>
                                        <div class="media-body">
                                            <div class="mar-btm">
                                                <strong class="btn-link text-semibold media-heading box-inline">
                                                    ${newComment.user_name}
                                                </strong>
                                                <p class="text-muted text-sm">
                                                    <i class="fa fa-clock-o"></i> ${newComment.created_at}
                                                </p>
                                            </div>
                                            <p>${newComment.content}</p>
                                            <hr>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `;

                                // Chèn bình luận mới vào vị trí đầu tiên trong danh sách
                                $('#commentSection').prepend(newCommentHtml);

                                // Xóa nội dung textarea sau khi gửi
                                form.find('textarea[name="content"]').val('');
                            } else {
                                alert('Có lỗi xảy ra khi gửi bình luận!');
                            }
                        },
                        error: function() {
                            alert('Có lỗi xảy ra khi gửi bình luận!');
                        }
                    });
                }
            });
        });
    </script>




    <script>
        document.getElementById('reviewForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(this);
            const tourId = this.getAttribute('data-tour-id');

            fetch(`/tour/${tourId}/reviews`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                            'content'),
                    },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Thành công',
                            text: data.success,
                            confirmButtonText: 'OK'
                        }).then(() => {
                            window.location.reload();
                        });
                    } else if (data.error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Lỗi',
                            text: data.error,
                            confirmButtonText: 'OK'
                        });
                    }
                })
                .catch(error => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Lỗi',
                        text: 'Vui lòng thao tác chậm lại, bạn đang thao tác quá nhanh!',
                        confirmButtonText: 'OK'
                    });
                    console.error('Error:', error);
                });
        });
    </script>


    <script>
        function handleBookingClick(event, url) {
            event.preventDefault();

            const adults = parseInt(document.getElementById('quantity-0').value, 10) || 0;
            const children = parseInt(document.getElementById('quantity-1').value, 10) || 0;
            const maxGuests = {{ $tour['number_guests'] }};
            const totalGuests = adults + children;


            if (adults === 0 && children === 0) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Chưa chọn số lượng!',
                    text: 'Vui lòng chọn số lượng người trước khi đặt tour!',
                    confirmButtonText: 'OK'
                });
                return;
            }
            if (totalGuests > maxGuests) {
                Swal.fire({
                    icon: 'error',
                    title: 'Quá số lượng!',
                    text: `Số lượng khách không được vượt quá ${maxGuests} người!`,
                    confirmButtonText: 'OK'
                });
                return;
            }

            sessionStorage.setItem('tourBooking', JSON.stringify({
                adults: adults,
                children: children
            }));

            window.location.href = url;
        }
    </script>


    <script>
        // Gắn sự kiện click cho nút 1
        document.getElementById('submit-table').addEventListener('click', function(e) {
            handleBookingClick(e, this.closest('a').href);
        });

        // Gắn sự kiện click cho nút 2
        document.getElementById('btnIconMouseScroll').addEventListener('click', function(e) {
            handleBookingClick(e, this.href);
        });

        document.addEventListener('DOMContentLoaded', () => {

            window.toggleReplyForm = function(commentId) {
                const replyForm = document.getElementById(`reply-form-${commentId}`);
                if (replyForm) {
                    const isHidden = replyForm.style.display === 'none' || replyForm.style.display === '';
                    replyForm.style.display = isHidden ? 'block' : 'none';
                }
            };
        });
    </script>

    <script>
        $(document).ready(function() {
            var sync1 = $("#sync1");
            var sync2 = $("#sync2");


            sync1.owlCarousel({
                items: 1,
                margin: 10,
                nav: true,
                dots: false,
                loop: false,
                autoplay: false,
                responsiveRefreshRate: 200,
            });


            sync2.owlCarousel({
                items: 5,
                margin: 10,
                nav: true,
                dots: false,
                loop: false,
                autoplay: false,
                responsiveRefreshRate: 100,
            });


            sync2.on("click", ".item", function(e) {
                e.preventDefault();
                var index = $(this).index();
                sync1.trigger("to.owl.carousel", [index,
                    300
                ]);
            });


            sync1.on("changed.owl.carousel", function(event) {
                var index = event.item.index;
                sync2.find(".owl-item").removeClass("active").eq(index).addClass(
                    "active");
            });


            sync2.find(".item").eq(0).addClass("active");
        });

        document.addEventListener('DOMContentLoaded', function() {
            // Kiểm tra nếu phần tử .product-promotions-list-content tồn tại
            var commentContainer = document.querySelector('.product-promotions-list-content');
            if (commentContainer) {
                // Lắng nghe sự kiện submit của form
                var form = document.querySelector('form');
                if (form) {
                    form.addEventListener('submit', function(event) {
                        // Cuộn đến cuối container khi form được gửi
                        commentContainer.scrollTop = commentContainer.scrollHeight;
                    });
                }
            }
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var startDateTour = <?= json_encode($tour['start_date']) ?>; // Ngày bắt đầu tour
            var endDateTour = <?= json_encode($tour['end_date']) ?>; // Ngày kết thúc tour

            // Lấy ngày hôm nay dưới dạng YYYY-MM-DD
            var today = new Date().toISOString().split('T')[0];

            // Xác định minDate
            var minDate = (new Date(startDateTour) > new Date(today)) ? startDateTour : today;

            flatpickr("#datepicker", {
                dateFormat: "Y-m-d", // Định dạng ngày
                minDate: minDate, // Ngày nhỏ nhất
                maxDate: endDateTour, // Ngày lớn nhất
                defaultDate: minDate, // Ngày mặc định là ngày hợp lệ đầu tiên
                locale: "vn", // Cài đặt ngôn ngữ tiếng Việt (nếu có)
                onChange: function(selectedDates, dateStr, instance) {
                    console.log("Ngày đã chọn:", dateStr); // Hiển thị ngày đã chọn
                }
            });
        });

        $('#advisoryForm').on('submit', function(e) {
            e.preventDefault();

            let formData = $(this).serialize();

            $.ajax({
                url: '/advisory/',
                method: 'POST',
                data: formData,
                success: function(response) {
                    if (response.success) {
                        Swal.fire('Thành công', response.message, 'success');
                    }
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;


                        let errorMessages = '';
                        for (let field in errors) {
                            errorMessages += `<p style="color: red;">${errors[field].join('<br>')}</p>`;
                        }

                        Swal.fire({
                            title: 'Lỗi!',
                            html: errorMessages,
                            icon: 'error',
                        });
                    } else {
                        Swal.fire('Lỗi', 'Đã có lỗi xảy ra, vui lòng thử lại.', 'error');
                    }
                }
            });
        });
    </script>
@endsection
