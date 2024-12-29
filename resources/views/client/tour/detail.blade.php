@extends('client.layouts.app')
@section('title')
    {{ $tour->name }}
@endsection
@section('style')

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"
        rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>


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

    <style>
        /* @import url("https://fonts.googleapis.com/css2?family=Sora:wght@100;200;300;400;500;600;700&display=swap"); */

        .accordion {
            display: flex;
            flex-direction: column;
            /* font-family: "Sora", sans-serif; */
            max-width: 991px;
            min-width: 320px;
            margin: 50px auto;
            /* padding: 0 50px; */
        }

        .accordion h1 {
            font-size: 32px;
            text-align: center;
            font-weight: bold;
        }

        .accordion-item {
            margin-top: 16px;
            border: 1px solid #fcfcfc;
            border-radius: 6px;
            background: #f1f1f1;
            box-shadow: rgba(0, 0, 0, 0.05) 0px 1px 2px 0px;
        }

        .accordion-item .accordion-item-title {
            position: relative;
            margin: 0;
            display: flex;
            width: 100%;
            font-size: 15px;
            cursor: pointer;
            justify-content: space-between;
            flex-direction: row-reverse;
            padding: 14px 20px;
            box-sizing: border-box;
            align-items: center;
        }

        .accordion-item .accordion-item-desc {
            display: none;
            font-size: 12px;
            line-height: 22px;
            font-weight: 300;
            color: #444;
            border-top: 1px dashed #ddd;
            padding: 10px 20px 20px;
            box-sizing: border-box;
        }

        .accordion-item input[type="checkbox"] {
            position: absolute;
            height: 0;
            width: 0;
            opacity: 0;
        }

        .accordion-item input[type="checkbox"]:checked~.accordion-item-desc {
            display: block;
        }

        .accordion-item input[type="checkbox"]:checked~.accordion-item-title .icon:after {
            content: "-";
            font-size: 20px;
        }

        .accordion-item input[type="checkbox"]~.accordion-item-title .icon:after {
            content: "+";
            font-size: 20px;
        }

        .accordion-item:first-child {
            margin-top: 0;
        }

        .accordion-item .icon {
            margin-left: 14px;

        }

        @media screen and (max-width: 767px) {
            .accordion {
                padding: 0 16px;
            }

            .accordion h1 {
                font-size: 22px;
            }
        }

        .item-icon {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-left: 20px;
            margin-top: -15px;
            margin-bottom: 5px;
            font-size: 10px;
        }

        .item-icon span {
            display: flex;
            flex-direction: column;

        }

        .item-icon p {
            font-weight: bold;

            margin: 0;

        }

        .accordion-item-desc {
            margin-top: 10px;
            font-weight: bold;

        }


        .section-detail {
            margin: 0;
        }

        .tour--detail__content--left--overview {
            margin-top: 1rem;
            width: 100%;
        }

        .highlight-part {
            background: #daefff;
            padding: 2rem 2.5rem;
            margin-top: 1rem;
            border-radius: 1rem;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: flex-start;
            gap: .5rem;
        }

        .tour--detail__content h3 {
            font-size: 2.4rem;
            font-weight: 700;
            text-transform: uppercase;
            text-align: center;
        }

        .tour--detail__content--left--overview__content {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-gap: 1.25rem;
            gap: 1.25rem;
        }

        .tour--detail__content--left--overview__content .item-sm {
            display: flex;
            flex-direction: column;
            gap: .8rem;
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

                                    {{-- <li>
                                        <div class="ulimg"><img
                                                src="http://bizweb.dktcdn.net/100/299/077/themes/642224/assets/tag_icon_1.svg?1705894518705"
                                                alt="Di chuyển bằng Ô tô" /></div>
                                        Di chuyển bằng Ô tô
                                    </li> --}}
                                    {{-- <li>
                                        <div class="ulimg"><img
                                                src="http://bizweb.dktcdn.net/100/299/077/themes/642224/assets/tag_icon_2.svg?1705894518705"
                                                alt="Di chuyển bằng tàu thủy" /></div>
                                        Di chuyển bằng tàu thủy
                                    </li> --}}
                                    <li>
                                        <div class="ulimg"><img
                                                src="http://bizweb.dktcdn.net/100/299/077/themes/642224/assets/tag_icon_3.svg?1705894518705"
                                                alt="Di chuyển bằng máy bay" /></div>

                                        <?= $tour['move_method'] ?>
                                    </li>

                                    <li>
                                        <div class="ulimg"><img
                                                src="http://bizweb.dktcdn.net/100/299/077/themes/642224/assets/tag_icon_4.svg?1705894518705"
                                                alt="Thứ 2 - 5 hằng tuần" /></div>

                                        <span id="date-khoi-hanh">Diễn ra: Thứ 2 - 5 hằng tuần</span>
                                    </li>

                                    <li>
                                        <div class="ulimg"><img
                                                src="http://bizweb.dktcdn.net/100/299/077/themes/642224/assets/tag_icon_5.svg?1705894518705"
                                                alt="10 ngày 9 đêm" /></div>

                                        <span id="date-khoi-hanh">Thời gian:</span>

                                        <?= $tour['schedule'] ?>
                                    </li>
                                    <li>
                                        <div class="ulimg"><img
                                                src="https://png.pngtree.com/png-vector/20240529/ourlarge/pngtree-the-icon-of-a-person-relaxing-in-a-chair-and-watching-vector-png-image_6974301.png"
                                                alt="10 ngày 9 đêm" /></div>
                                        <span id="date-khoi-hanh">Số lượng: </span>

                                        <?= $tour['number'] ?>
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

                                                            name="quantity" value="0" title="Số lượng"
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

                                                    0đ
                                                    {{-- {{ number_format($tour->price_old * (1 - $tour->sale / 100), 0, '', '.') }}đ --}}
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

                                                    <?= number_format($tour['price_children'], 0, '', '.') ?>₫
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


                                        <div id="estimated-end-date"
                                            style="margin-top: 10px; font-weight: bold; color: #2c3e50;">
                                            <!-- Hiển thị ngày kết thúc dự kiến -->
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

                                                    style=" margin-top: 18px; 
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
                                <div class="main-project__tab--content">
                                    <div class="product-promotions-list">
                                        <h2 class="product-promotions-list-title">Chính sách Tour</h2>
                                        <div class="product-promotions-list-content">

                                            <strong>* Giá tour bao gồm:</strong><br />


                                            <p><i>Giá tour không bao gồm:</i> <br>
                                                - Chi phí làm hộ chiếu, các chương trình tự chọn, nước uống, giặt ủi, điện
                                                thoại... và các chi phí cá nhân khác của khách ngoài chương trình.<br>
                                                - Hành lý quá cước, chi phí dời ngày và đổi chặng bay theo qui định của hàng
                                                không.<br>
                                                - Phí phòng đơn (dành cho khách yêu cầu ở phòng đơn).<br>
                                                - Tiền bồi dưỡng cho HDV và lái xe địa phương (8 CAD/ khách/ ngày).<br>

                                                <strong> * Điều khoản hủy tour (Thời gian hủy tour được tính theo tất cả các
                                                    ngày trong
                                                    tuần).</strong><br>
                                                <i> Sau khi đặt tour thành công:</i><br>

                                                1. Thanh toán online: <br>

                                                -Nếu quý khách báo hủy tour, vui lòng liên hệ với chúng
                                                tôi qua số điện thoại: <b>096171690</b> hoặc <b>email: garnet@gmail.com</b>
                                                để được xác
                                                nhận hủy tour và hoàn tiền theo chính sách của chúng tôi.<br>

                                                2. Thanh toán trực tiếp: <br>
                                                - Quý khách hủy tour trước khi chúng tôi xác nhận đơn
                                                đặt tour.<br>

                                                <i style="color: red"><b>*Lưu ý:</b> Nếu quý khách đã thanh toán trực tiếp
                                                    tại
                                                    trung tâm của chúng tôi,
                                                    sau khi đơn đặt tour đã được xác nhận, vui lòng liên hệ với chúng tôi
                                                    qua số
                                                    điện thoại: <b>096171690</b> hoặc email: <b>email:
                                                        garnet@gmail.com</b>.</i><br>

                                                <b>* Chính sách hoàn tiền:</b><br>

                                                - Hủy tour trong vòng <b>24h sau khi đặt tour</b> (trong trường hợp đơn hàng
                                                chưa
                                                được xác nhận)<b> hoàn tiền 100% giá tour.</b><br>

                                                - Hủy tour trong vòng <b>24h sau khi đặt tour</b> (trong trường hợp đơn hàng
                                                đã được xác nhận) <b>hoàn tiền 95% giá tour.</b><br>

                                                - Hủy tour trước ngày tour <b>bắt đầu 24h hoàn tiền 80% giá tour.</b><br>

                                                - Hủy tour khi tour <b>đang diễn ra hoàn tiền 0% giá tour.</b><br>
                                            </p>

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


                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9 ">
                            <div id="overview">


                                <div class="tour--detail__content--left--overview__content-main">

                                    <h1 class="title-info text-center" style="font-weight: bold">THÔNG TIN VÀ DỊCH VỤ ĐI
                                        KÈM</h1>
                                    <div class="tour--detail__content--left--overview__content">
                                        <div class="tour--detail__content--left--overview__content-item item-sm">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="none">
                                                <path fill="#000"
                                                    d="M23 4.102a1.1 1.1 0 0 0-.77-1.05l-6.453-2.038-.037-.006-.02-.004a.4.4 0 0 0-.146.008h-.011L8.336 3.181 2.43 1.316A1.1 1.1 0 0 0 1 2.365v17.53c-.002.48.31.907.77 1.05l6.453 2.039c.07.021.146.021.216 0l7.226-2.168 5.903 1.865q.163.051.334.052a1.1 1.1 0 0 0 1.097-1.1zM1.733 19.895V2.364a.367.367 0 0 1 .479-.35l5.755 1.818v14.392a.364.364 0 0 0-.022.729h.022v3.178L1.99 20.244a.37.37 0 0 1-.257-.35M8.7 22.139v-3.19q.218-.016.433-.054A.367.367 0 1 0 9 18.174a3 3 0 0 1-.3.037V3.837l6.6-1.98V5.41c-.41.017-.817.086-1.21.206a.367.367 0 1 0 .223.697q.484-.147.99-.172v14.018zm13.417-.212a.36.36 0 0 1-.328.054l-5.756-1.818V6.15c.328.03.648.113.949.246a.367.367 0 0 0 .303-.668 3.8 3.8 0 0 0-1.252-.313v-3.55l5.977 1.887c.153.048.257.19.257.35v17.53a.36.36 0 0 1-.15.295">
                                                </path>
                                                <path fill="#000"
                                                    d="M21.06 14.306a.366.366 0 0 0-.52 0l-1.207 1.207-1.207-1.207a.367.367 0 0 0-.519.518l1.208 1.208-1.208 1.207a.367.367 0 1 0 .519.519l1.207-1.208 1.208 1.208a.367.367 0 0 0 .518-.519l-1.207-1.207 1.207-1.208a.367.367 0 0 0 0-.518M4.66 12.732h.003a.367.367 0 0 0 .366-.364v-.107q.005-.315.004-.63a.367.367 0 1 0-.733 0q0 .311-.003.624v.106a.366.366 0 0 0 .363.37M4.718 14.932a.366.366 0 0 0 .342-.39 17 17 0 0 1-.029-.717.367.367 0 1 0-.733.015q.008.381.03.75a.367.367 0 0 0 .367.342zM5.256 15.946a.367.367 0 1 0-.713.172q.095.406.257.791a.367.367 0 1 0 .674-.288 4.4 4.4 0 0 1-.218-.675M6.66 17.91a2.3 2.3 0 0 1-.5-.324.367.367 0 1 0-.477.558q.301.256.656.426a.367.367 0 0 0 .32-.66M10.607 17.195q-.162.215-.365.395a.367.367 0 1 0 .484.55q.258-.228.466-.504a.367.367 0 0 0-.587-.441zM11.832 14.94a.367.367 0 0 0-.431.287 7 7 0 0 1-.175.696.367.367 0 0 0 .701.216q.116-.38.193-.77a.367.367 0 0 0-.288-.43M12.003 12.732h-.013a.367.367 0 0 0-.367.353q-.011.36-.038.72a.367.367 0 0 0 .34.393h.027a.367.367 0 0 0 .366-.34q.028-.373.04-.747a.367.367 0 0 0-.355-.38M12.007 11.998h.002a.367.367 0 0 0 .365-.369l-.006-.733a.367.367 0 1 0-.735.004l.006.734a.367.367 0 0 0 .368.364M12.011 9.798h.03a.367.367 0 0 0 .367-.337c.021-.248.05-.484.088-.7a.367.367 0 1 0-.723-.125 9 9 0 0 0-.096.765.367.367 0 0 0 .334.397M12.44 7.55a.367.367 0 0 0 .5-.138q.17-.301.417-.542a.367.367 0 1 0-.51-.528 3.1 3.1 0 0 0-.544.708c-.1.176-.039.4.137.5M18.38 7.771a.367.367 0 0 0 .647-.346 4.3 4.3 0 0 0-.55-.802.367.367 0 0 0-.552.483q.265.307.455.665M18.917 9.482q.047.34.05.683a.367.367 0 1 0 .733 0 6 6 0 0 0-.056-.784.367.367 0 1 0-.727.1M19.333 12.732a.367.367 0 0 0 .367-.367v-.733a.367.367 0 0 0-.733 0v.733c0 .202.164.367.366.367">
                                                </path>
                                                <path fill="#000"
                                                    d="M19.333 13.465a.367.367 0 0 0-.366.367v.366a.367.367 0 1 0 .733 0v-.366a.367.367 0 0 0-.367-.367M4.438 10.451a.37.37 0 0 0 .458 0c.08-.064 1.97-1.6 1.97-3.586a2.2 2.2 0 1 0-4.4 0c0 1.986 1.891 3.522 1.972 3.586m.229-5.053c.81 0 1.466.657 1.466 1.467 0 1.26-1.003 2.365-1.466 2.808C4.203 9.23 3.2 8.126 3.2 6.865c0-.81.657-1.467 1.467-1.467">
                                                </path>
                                                <path fill="#000"
                                                    d="M4.667 7.231a.367.367 0 1 0 0-.733.367.367 0 0 0 0 .733">
                                                </path>
                                            </svg>
                                            <div class="tour--detail__content--left--overview__content-title">Điểm tham
                                                quan</div>
                                            <p title="Hà Nội,  Việt Phủ Thành Chương,  Sapa,  Fansipan,  Yên Tử,  Hạ Long,  Ninh Bình,  Tràng An,  Bái Đính"
                                                class="line-clamp-title line-clamp-2">Hà Nội, Việt Phủ Thành Chương, Sapa,
                                                Fansipan, Yên Tử, Hạ Long, Ninh Bình, Tràng An, Bái Đính</p>
                                        </div>
                                        <div class="tour--detail__content--left--overview__content-item item-sm"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="none">
                                                <path fill="#000"
                                                    d="M11.832 20.06C.213 19.18.578 2.587 12.203 2.166a8.9 8.9 0 0 1 6.114 2.415.376.376 0 0 0 .514-.547 9.64 9.64 0 0 0-6.628-2.618C-.4 1.873-.788 19.858 11.802 20.81a.375.375 0 0 0 .03-.75">
                                                </path>
                                                <path fill="#000"
                                                    d="M12.203 3.789c-9.507.346-9.815 13.894-.326 14.647a.375.375 0 0 0 .017-.75 6.567 6.567 0 0 1-6.269-6.57c-.012-5.83 7.165-8.786 11.25-4.63a.375.375 0 0 0 .533-.527 7.28 7.28 0 0 0-5.205-2.17M21.326 11.854a.375.375 0 0 0-.75.014l.173 8.818a.764.764 0 1 1-1.527-.011l.33-5.252c.099-1.007-.586-1.965-.608-2.948a12.7 12.7 0 0 1 1.2-6.572.172.172 0 0 1 .32.078l.086 4.387a.375.375 0 0 0 .75-.014l-.087-4.39A.928.928 0 0 0 19.81 5.2a.9.9 0 0 0-.337.368 13.27 13.27 0 0 0-1.277 6.972c-.002.948.647 1.868.607 2.835l-.33 5.257a1.51 1.51 0 0 0 .908 1.468 1.54 1.54 0 0 0 2.118-1.429z">
                                                </path>
                                                <path fill="#000"
                                                    d="M16.456 8.413a.375.375 0 0 0-.375.375v3.601a.23.23 0 0 1-.036.123l-.959 1.507c-.197.311-.287.68-.253 1.047l.538 5.87a.823.823 0 1 1-1.64 0l.54-5.87a1.68 1.68 0 0 0-.254-1.047l-.959-1.506a.23.23 0 0 1-.036-.123V8.788a.375.375 0 1 0-.75 0v3.601a1 1 0 0 0 .153.526l.959 1.506a.92.92 0 0 1 .14.577l-.539 5.87a1.573 1.573 0 1 0 3.133 0l-.539-5.87a.92.92 0 0 1 .14-.577l.958-1.506a1 1 0 0 0 .154-.525V8.788a.375.375 0 0 0-.375-.375">
                                                </path>
                                                <path fill="#000"
                                                    d="M14.271 11.828v-3.04a.375.375 0 0 0-.75 0v3.04a.375.375 0 0 0 .75 0M15.582 11.828v-3.04a.375.375 0 0 0-.75 0v3.04a.375.375 0 0 0 .75 0">
                                                </path>
                                            </svg>
                                            <div class="tour--detail__content--left--overview__content-title">Ẩm thực</div>
                                            <p title="Buffet sáng, Theo thực đơn" class="line-clamp-title line-clamp-2">
                                                Buffet
                                                sáng, Theo thực đơn</p>
                                        </div>
                                        <div class="tour--detail__content--left--overview__content-item item-sm"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="none">
                                                <path fill="#000"
                                                    d="M8.242 18.838a.35.35 0 0 0-.351.344v1.473c0 .19.157.345.351.345a.35.35 0 0 0 .352-.345v-1.473a.35.35 0 0 0-.352-.344M15.758 18.838a.35.35 0 0 0-.352.344v1.473c0 .19.157.345.351.345a.35.35 0 0 0 .352-.345v-1.473a.35.35 0 0 0-.352-.344M5.394 11.508c-.817-.4-2.347-.405-2.412-.405a.35.35 0 0 0-.352.344c0 .19.158.345.352.345.395 0 1.543.06 2.097.332a.356.356 0 0 0 .472-.154.34.34 0 0 0-.157-.462M1.855 18.1a.35.35 0 0 0-.352.345v2.21c0 .19.157.345.352.345a.35.35 0 0 0 .351-.345v-2.21a.35.35 0 0 0-.351-.344">
                                                </path>
                                                <path fill="#000"
                                                    d="m23.183 16.814-1.424-.698a.02.02 0 0 1-.014-.021v-.701a2.54 2.54 0 0 0 1.102-1.75 2.87 2.87 0 0 0 .401-1.46c0-.953-.468-1.802-1.191-2.335q.063-.209.064-.427c0-.901-.832-1.634-1.854-1.634s-1.855.733-1.855 1.634q0 .219.064.427a2.95 2.95 0 0 0-.976 1.246c-.087-.84-.177-1.832-.265-2.988-.114-1.525-.674-2.813-1.618-3.724C14.681 3.478 13.43 3 12 3s-2.68.478-3.617 1.383c-.944.911-1.504 2.2-1.618 3.724q-.046.607-.093 1.154H3.358c-1.23 0-2.23.981-2.23 2.187v.02c0 .28.067.562.195.813l.18.353v.563c0 .891.448 1.691 1.127 2.173v.497c0 .064-.043.121-.106.139l-1.451.406A1.46 1.46 0 0 0 0 17.806v2.85c0 .19.157.344.352.344a.35.35 0 0 0 .351-.345v-2.85c0-.337.231-.638.563-.73l1.451-.407a1 1 0 0 0 .15-.058l.89.873v3.172c0 .19.158.345.352.345a.35.35 0 0 0 .352-.345v-3.172l.897-.88c.12.058.24.092.327.117l.356.1c-.483.336-.78.885-.78 1.48v2.355c0 .19.157.345.351.345a.35.35 0 0 0 .352-.345V18.3c0-.446.27-.852.686-1.032l2.01-.87A3.74 3.74 0 0 0 12 18.422a3.73 3.73 0 0 0 3.34-2.024l2.01.87c.417.18.686.586.686 1.032v2.355c0 .19.158.345.352.345a.35.35 0 0 0 .351-.345V18.3c0-.44-.163-.856-.444-1.178l.544-.267.409.38c.286.266.652.4 1.019.4s.733-.134 1.018-.4l.409-.38 1.174.575c.265.13.429.39.429.68v2.545c0 .19.157.345.351.345a.35.35 0 0 0 .352-.345V18.11a1.44 1.44 0 0 0-.817-1.296m-2.916-8.337c.634 0 1.151.424 1.151.945l-.003.065a3.02 3.02 0 0 0-2.296 0q-.003-.032-.004-.065c0-.521.517-.945 1.152-.945M4.109 16.853l-.8-.785a.8.8 0 0 0 .024-.2v-.146a2.5 2.5 0 0 0 .777.122q.402-.001.775-.115v.138q0 .112.021.205zm-.059-1.7c-1.017-.03-1.844-.907-1.844-1.957v-.643a.34.34 0 0 0-.037-.155l-.217-.425a1.1 1.1 0 0 1-.122-.505v-.02c0-.826.685-1.497 1.528-1.497h3.03v1.43c0 .231-.056.463-.161.67l-.178.347a.34.34 0 0 0-.037.155v.736c0 .509-.205.984-.578 1.339a1.9 1.9 0 0 1-1.384.525m2.939 1.215-1.111-.311c-.29-.081-.29-.113-.29-.19v-.475a2.6 2.6 0 0 0 .535-.481c.056.112.143.21.255.28a7.8 7.8 0 0 0 1.595.75zM12 17.733a3.04 3.04 0 0 1-2.696-1.614l.511-.221c.4-.173.658-.562.658-.99v-.826A4.2 4.2 0 0 0 12 14.37a4.2 4.2 0 0 0 1.527-.288v.827c0 .427.258.816.658.989l.511.221A3.03 3.03 0 0 1 12 17.733m3.048-2.215-.58-.25a.39.39 0 0 1-.238-.36v-1.184c1.13-.719 1.88-1.966 1.88-3.381v-.647c0-.42-.183-.816-.5-1.086-.707-.603-2.306-1.653-5.078-1.925a.35.35 0 0 0-.385.308c-.02.19.122.359.315.378 2.578.252 4.043 1.21 4.686 1.759.164.14.258.346.258.566v.647c0 1.84-1.528 3.338-3.406 3.338s-3.406-1.498-3.406-3.338v-.289c0-.132.075-.253.2-.324.44-.248 1.02-.708 1.285-1.488a.343.343 0 0 0-.222-.436.353.353 0 0 0-.445.218c-.196.575-.635.92-.968 1.109-.341.192-.553.545-.553.921v.289c0 1.415.749 2.662 1.879 3.38v1.186a.39.39 0 0 1-.239.358l-.58.251c-1.132-.297-1.857-.693-2.191-.905q-.01-.005-.009-.02c.123-.71.438-2.76.715-6.435.102-1.356.59-2.492 1.41-3.284C9.68 4.099 10.76 3.689 12 3.689s2.321.41 3.124 1.185c.82.792 1.308 1.928 1.41 3.284.277 3.675.592 5.725.715 6.436q.002.014-.009.02c-.334.212-1.06.607-2.192.904m3.74.577q0 .015-.014.021l-1.101.54-.039-.018-1.607-.696a7.8 7.8 0 0 0 1.595-.75.7.7 0 0 0 .32-.713l-.008-.05c.197.39.493.721.854.965zm2.013.64c-.3.28-.77.28-1.069 0l-.326-.304a.7.7 0 0 0 .085-.336v-.367a2.66 2.66 0 0 0 1.551 0v.367c0 .12.03.235.086.336zm-.534-1.58c-.974 0-1.787-.715-1.892-1.663a.34.34 0 0 0-.05-.143 2.2 2.2 0 0 1-.337-1.165c0-1.231 1.022-2.233 2.279-2.233s2.278 1.002 2.278 2.233c0 .238-.04.473-.115.697-.998-.994-2.755-1.383-2.84-1.402a.36.36 0 0 0-.295.068.34.34 0 0 0-.132.269c0 .002-.015.241-.272.493a.34.34 0 0 0 0 .487c.137.135.36.135.497 0 .198-.194.314-.39.382-.556.591.172 1.82.607 2.37 1.37a1.89 1.89 0 0 1-1.873 1.544">
                                                </path>
                                                <path fill="#000"
                                                    d="M22.146 18.51a.35.35 0 0 0-.352.352v1.79a.352.352 0 0 0 .703 0v-1.79a.35.35 0 0 0-.352-.352">
                                                </path>
                                            </svg>
                                            <div class="tour--detail__content--left--overview__content-title">Đối tượng
                                                thích hợp</div>
                                            <p title="Cặp đôi, Gia đình nhiều thế hệ, Thanh niên"
                                                class="line-clamp-title line-clamp-2">
                                                Cặp đôi, Gia đình nhiều thế hệ, Thanh niên
                                            </p>
                                        </div>
                                        <div class="tour--detail__content--left--overview__content-item item-sm"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="none">
                                                <path fill="#000"
                                                    d="M6.572 7.057a.36.36 0 0 0-.505.05 7.66 7.66 0 0 0-1.742 4.85c.42 10.142 14.93 10.142 15.35 0a7.6 7.6 0 0 0-1.188-4.093 7.66 7.66 0 0 0-3.203-2.823A7.7 7.7 0 0 0 7.13 6.046a.357.357 0 0 0 .193.631.36.36 0 0 0 .263-.079c4.46-3.712 11.414-.435 11.37 5.359a6.93 6.93 0 0 1-2.04 4.899A6.98 6.98 0 0 1 12 18.888c-5.815.04-9.097-6.882-5.378-11.328a.356.356 0 0 0-.05-.503">
                                                </path>
                                                <path fill="#000"
                                                    d="M12 6.642a.36.36 0 0 0 .359-.357V5.88A.356.356 0 0 0 12 5.522a.36.36 0 0 0-.359.358v.405a.355.355 0 0 0 .222.33.4.4 0 0 0 .137.027M7.722 8.198a.36.36 0 0 0 .607-.254.36.36 0 0 0-.1-.251l-.288-.287a.36.36 0 0 0-.607.254c0 .094.035.184.1.252zM6.308 11.598h-.406a.36.36 0 0 0-.352.357.356.356 0 0 0 .352.357h.406a.36.36 0 0 0 .352-.357.357.357 0 0 0-.352-.357M7.434 16.503a.36.36 0 0 0 .507 0l.288-.286a.357.357 0 1 0-.507-.505l-.288.286a.357.357 0 0 0 0 .505M11.641 17.625v.405a.357.357 0 0 0 .359.35.36.36 0 0 0 .359-.35v-.405a.358.358 0 0 0-.61-.248.36.36 0 0 0-.108.248M15.771 16.217c.133.113.34.415.541.39a.362.362 0 0 0 .35-.426.36.36 0 0 0-.096-.183l-.288-.287a.36.36 0 0 0-.607.255c-.001.093.035.184.1.251M18.099 12.312a.36.36 0 0 0 .351-.357.357.357 0 0 0-.352-.357h-.406a.36.36 0 0 0-.352.357.357.357 0 0 0 .352.357zM16.025 8.303c.2.024.41-.279.54-.391a.357.357 0 0 0-.253-.61.36.36 0 0 0-.253.104l-.288.287a.36.36 0 0 0 .254.61">
                                                </path>
                                                <path fill="#000"
                                                    d="M20.502 6.349a.36.36 0 0 0 .507 0l.292-.29a2.38 2.38 0 0 0 0-3.37 2.46 2.46 0 0 0-1.903-.681 2.46 2.46 0 0 0-1.77.972.355.355 0 0 0-.001.505l1.184 1.18-.503.5c-3.42-3.278-9.215-3.274-12.623-.006l-.496-.494 1.184-1.18a.357.357 0 0 0 0-.505 2.45 2.45 0 0 0-1.771-.972 2.46 2.46 0 0 0-1.903.681 2.38 2.38 0 0 0 0 3.37c.153.127.33.409.546.395a.36.36 0 0 0 .254-.105l1.183-1.18.496.495C1.68 9.28 1.953 15.488 5.725 18.79l-.974 2.733a.356.356 0 0 0 .338.477h1.624a.36.36 0 0 0 .29-.147l1.09-1.492a9.27 9.27 0 0 0 7.81-.006l1.094 1.498a.36.36 0 0 0 .29.147h1.624a.362.362 0 0 0 .338-.477l-.978-2.744a9.2 9.2 0 0 0 2.999-6.08.356.356 0 0 0-.33-.384.36.36 0 0 0-.385.328c-1.28 10.829-16.743 10.234-17.141-.687 0-2.208.857-4.332 2.393-5.925a8.604 8.604 0 0 1 11.885-.476 8.54 8.54 0 0 1 2.863 5.715.357.357 0 0 0 .385.328.36.36 0 0 0 .33-.384 9.18 9.18 0 0 0-2.455-5.543l.503-.501zM3.244 5.591c-1.611-1.605.756-3.962 2.367-2.358zm15.158 15.694h-.934l-.92-1.26a9.4 9.4 0 0 0 1.136-.754zm-11.872 0h-.934l.715-2.005q.54.417 1.135.751zm11.895-18.09c1.632-1.534 3.92.821 2.329 2.396l-2.367-2.358z">
                                                </path>
                                                <path fill="#000"
                                                    d="M11.641 10.85a1.17 1.17 0 0 0-.75.748H8.77a.36.36 0 0 0-.35.357.357.357 0 0 0 .35.357h2.12a1.16 1.16 0 0 0 .837.777 1.173 1.173 0 0 0 1.4-.816 1.16 1.16 0 0 0-.77-1.424V7.905a.357.357 0 0 0-.358-.35.36.36 0 0 0-.359.35zM12 12.407a.455.455 0 0 1-.448-.453.45.45 0 0 1 .448-.453.455.455 0 0 1 .448.453.45.45 0 0 1-.448.453">
                                                </path>
                                            </svg>
                                            <div class="tour--detail__content--left--overview__content-title">Thời gian lý
                                                tưởng</div>
                                            <p title="Quanh năm" class="line-clamp line-clamp-2">Quanh năm</p>
                                        </div>
                                        <div class="tour--detail__content--left--overview__content-item item-sm"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="none">
                                                <path fill="#000" fill-rule="evenodd"
                                                    d="M16.91 16.362c1.343 0 2.43 1.114 2.43 2.489s-1.087 2.489-2.43 2.489c-1.341 0-2.43-1.115-2.43-2.49 0-1.374 1.089-2.488 2.43-2.488m3.075 2.489c0-1.74-1.376-3.15-3.074-3.15s-3.075 1.41-3.075 3.15S15.213 22 16.911 22s3.074-1.41 3.074-3.15m-3.074-.795c.428 0 .776.356.776.795s-.348.795-.776.795a.786.786 0 0 1-.776-.795c0-.44.347-.795.776-.795m1.42.795c0-.804-.636-1.455-1.42-1.455-.785 0-1.42.651-1.42 1.455 0 .803.635 1.455 1.42 1.455s1.42-.652 1.42-1.455"
                                                    clip-rule="evenodd"></path>
                                                <path fill="#000" fill-rule="evenodd"
                                                    d="M17.848 3.03A1.334 1.334 0 0 0 16.56 2c-.622 0-1.144.438-1.288 1.03h-2.817A1.334 1.334 0 0 0 11.167 2c-.622 0-1.144.438-1.288 1.03H7.975c-.653 0-1.2.463-1.346 1.086H5.451c-.602 0-1.09.5-1.09 1.116s.488 1.115 1.09 1.115h1.178c.104.445.411.808.816.98-.417.336-.73.808-.872 1.363l-.894 3.474a.66.66 0 0 1-.636.502H2.83c-1.01 0-1.829.84-1.829 1.874v2.804c0 1.035.819 1.874 1.83 1.874h2.165a.32.32 0 0 0 .23-.098.33.33 0 0 0 .092-.235v-.034c0-1.375 1.087-2.49 2.43-2.49 1.341 0 2.43 1.115 2.43 2.49v.004l-.001.003v.026a.33.33 0 0 0 .092.236c.06.063.143.098.23.098h3.661a.32.32 0 0 0 .23-.098.34.34 0 0 0 .092-.26v-.009c0-1.375 1.088-2.49 2.43-2.49s2.43 1.115 2.43 2.49v.007l-.001.027c-.001.088.032.173.093.235.06.063.143.098.229.098h1.508c1.2 0 2.074-1.163 1.769-2.351l-.048-.185-.996-3.872a.32.32 0 0 0-.394-.235.33.33 0 0 0-.23.404l.317 1.23h-.228c-.605 0-1.095.503-1.095 1.123v.643c0 .62.49 1.121 1.095 1.121h.97c.153.748-.404 1.462-1.16 1.462h-1.198c-.144-1.602-1.46-2.857-3.061-2.857-1.602 0-2.918 1.255-3.062 2.857h-3.041c-.144-1.602-1.46-2.857-3.062-2.857s-2.917 1.255-3.061 2.857H2.829c-.654 0-1.184-.543-1.184-1.214v-.248h.585c.604 0 1.095-.502 1.095-1.121v-.643c0-.62-.49-1.122-1.095-1.122h-.541a1.19 1.19 0 0 1 1.14-.884h2.214c.591 0 1.109-.408 1.26-.994l.893-3.474a1.874 1.874 0 0 1 1.797-1.424h9.42a1.87 1.87 0 0 1 1.799 1.424l.72 2.8a.32.32 0 0 0 .394.235.33.33 0 0 0 .23-.403l-.721-2.8a2.58 2.58 0 0 0-.784-1.289 1.41 1.41 0 0 0 1.084-1.384v-1.57c0-.783-.619-1.418-1.383-1.418zm.04.66h1.864c.408 0 .739.338.739.756v1.571c0 .418-.33.757-.739.757h-1.864zM8.991 6.774H7.975a.75.75 0 0 1-.74-.757v-1.57c0-.419.332-.757.74-.757H9.84v3.084h-.848m1.492 0V3.36c0-.387.306-.7.683-.7s.683.313.683.7v3.414zm2.01 0V3.69h2.739v3.084zm3.383 0V3.36c0-.387.306-.7.683-.7s.683.313.683.7v3.414zM1.645 16.436V14.87h.585c.249 0 .45.207.45.462v.643a.456.456 0 0 1-.45.461zm20.516 0h-.8a.456.456 0 0 1-.451-.461v-.643c0-.255.201-.462.45-.462h.398zM6.591 5.687h-1.14a.45.45 0 0 1-.445-.455.45.45 0 0 1 .445-.456h1.14zM19.057 9.17a.674.674 0 0 0-.649-.513h-3.24a.91.91 0 0 0-.901.923v3.317c0 .51.403.922.901.922h3.916c.59 0 1.022-.572.871-1.158zm-.649.148q.019.001.026.02l.898 3.492a.26.26 0 0 1-.248.33h-3.916a.26.26 0 0 1-.256-.263V9.58a.26.26 0 0 1 .256-.262zm-5.387.262a.91.91 0 0 0-.901-.923H9c-.305 0-.572.211-.65.513l-.242.943a.33.33 0 0 0 .23.404.32.32 0 0 0 .393-.236l.243-.943A.03.03 0 0 1 9 9.318h3.121a.26.26 0 0 1 .257.262v3.317a.26.26 0 0 1-.257.262H8.324c-.166 0-.292-.161-.246-.337l.001-.005.001-.005.315-1.223a.33.33 0 0 0-.23-.403.32.32 0 0 0-.393.235l-.314 1.221v.001l-.002.004v.004c-.152.583.266 1.168.868 1.168h3.796a.91.91 0 0 0 .901-.922z"
                                                    clip-rule="evenodd"></path>
                                                <path fill="#000" fill-rule="evenodd"
                                                    d="M7.746 16.362c1.342 0 2.43 1.114 2.43 2.489s-1.088 2.489-2.43 2.489-2.43-1.115-2.43-2.49c0-1.374 1.088-2.488 2.43-2.488m3.075 2.489c0-1.74-1.377-3.15-3.075-3.15s-3.074 1.41-3.074 3.15S6.048 22 7.746 22s3.075-1.41 3.075-3.15m-3.075-.795c.429 0 .776.356.776.795s-.347.795-.776.795a.786.786 0 0 1-.776-.795c0-.44.348-.795.776-.795m1.42.795c0-.804-.635-1.455-1.42-1.455s-1.42.651-1.42 1.455c0 .803.636 1.455 1.42 1.455.785 0 1.42-.652 1.42-1.455"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            <div class="tour--detail__content--left--overview__content-title">Phương tiện
                                            </div>
                                            <p title="Máy bay, Xe du lịch" class="line-clamp-titleline-clamp-2">Máy bay,
                                                Xe du
                                                lịch</p>
                                        </div>
                                        <div class="tour--detail__content--left--overview__content-item item-sm"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="none">
                                                <path fill="#0166B1"
                                                    d="M15.383 13.758c.262 0 .518-.074.735-.213a1.3 1.3 0 0 0 .488-.568c.1-.232.126-.486.075-.732a1.25 1.25 0 0 0-.362-.648 1.34 1.34 0 0 0-.678-.347 1.4 1.4 0 0 0-.764.072 1.3 1.3 0 0 0-.594.467 1.23 1.23 0 0 0-.223.703c0 .336.139.658.387.895.248.238.585.371.936.371m0-1.844c.12 0 .236.034.336.097.099.064.176.154.222.26a.555.555 0 0 1-.13.63.63.63 0 0 1-.659.125.6.6 0 0 1-.271-.213.56.56 0 0 1 .075-.73.62.62 0 0 1 .427-.169M16.516 15.902c0 .25.077.496.223.704.145.208.352.37.594.466s.508.121.764.072c.257-.049.493-.17.678-.346.185-.177.311-.403.362-.649.051-.245.025-.5-.075-.731a1.3 1.3 0 0 0-.488-.569 1.366 1.366 0 0 0-1.67.158 1.24 1.24 0 0 0-.388.895m1.927 0a.56.56 0 0 1-.102.321.6.6 0 0 1-.27.213.63.63 0 0 1-.659-.125.555.555 0 0 1-.131-.63.6.6 0 0 1 .223-.26.62.62 0 0 1 .762.072.57.57 0 0 1 .177.41M18.182 11.438l-3.833 5.127.585.4 3.833-5.127z">
                                                </path>
                                                <path fill="#0166B1"
                                                    d="M19.123 2a4.57 4.57 0 0 1-1.057 2.199 1.8 1.8 0 0 0-.99-.498 1.84 1.84 0 0 0-1.103.171l-3.14.055a3.27 3.27 0 0 0-2.23.905l-8.077 7.732c-.337.323-.526.76-.526 1.217 0 .456.19.894.526 1.216l2.212 2.12c.126.436.425.806.834 1.032l5.916 3.27c.244.138.519.22.802.237.31.225.69.346 1.08.344h6.832a1.84 1.84 0 0 0 1.271-.504c.338-.323.527-.76.527-1.217V9.347a3.03 3.03 0 0 0-.906-2.144l-2.518-2.498a5.15 5.15 0 0 0 1.266-2.622zM3.033 13.053l8.081-7.736a2.58 2.58 0 0 1 1.734-.688l.834-.017-1.14.313a3.22 3.22 0 0 0-1.906 1.428l-5.714 9.453a1.7 1.7 0 0 0-.159.344l-1.73-1.641a1 1 0 0 1-.313-.728c0-.273.113-.535.314-.728m2.906 4.508a1.1 1.1 0 0 1-.317-.266 1.01 1.01 0 0 1-.214-.763q.029-.204.136-.382l5.714-9.467c.325-.54.856-.938 1.482-1.111l1.899-.52-2.158 2.144a3.03 3.03 0 0 0-.91 2.15V20.28q.002.22.065.43zm15.342-8.214v10.932c0 .274-.114.537-.316.73a1.1 1.1 0 0 1-.763.303h-6.833c-.286 0-.56-.109-.763-.303a1 1 0 0 1-.316-.73V9.347a2.36 2.36 0 0 1 .72-1.673l3.013-2.99c.205-.19.48-.295.764-.295s.56.106.765.295a3 3 0 0 1-.285.179.743.743 0 0 0-.872-.046.7.7 0 0 0-.277.352.66.66 0 0 0 .002.44c.051.144.15.266.281.35a.74.74 0 0 0 .872-.054c.119-.1.2-.233.232-.381q.293-.15.557-.344l2.517 2.508c.448.446.7 1.04.702 1.659">
                                                </path>
                                            </svg>
                                            <div class="tour--detail__content--left--overview__content-title">Khuyến mãi
                                            </div>
                                            <p title="Ưu đãi trực tiếp vào giá tour"
                                                class="line-clamp-title line-clamp-2">Ưu
                                                đãi trực tiếp vào giá tour</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9">
                        <div class="accordion">
                            <h1>LỊCH TRÌNH</h1>
                            @foreach ($itineraries as $index => $itinerary)
                                <div class="accordion-item">
                                    <input type="checkbox" id="accordion{{ $index + 1 }}">
                                    <label for="accordion{{ $index + 1 }}" class="accordion-item-title">
                                        <span class="icon"></span>
                                        <b>Ngày {{ $index + 1 }}: <span>
                                                <span>
                                                    @if ($itinerary['is_start'] == 1)
                                                        {{ $itinerary['location_name'] }}
                                                    @endif
                                                    @if ($itinerary['is_end'] == 0 && $itinerary['is_start'] != 1)
                                                        - {{ $itinerary['location_name'] }}
                                                    @endif
                                                </span>
                                            </span>
                                        </b>
                                    </label>
                                    {{-- <div class="item-icon">
                                        <i class="fa-solid fa-utensils"></i>
                                        <span>
                                            <p>00 bữa ăn (tự túc ăn ngày đầu tiên)</p>
                                        </span>
                                    </div> --}}
                                    <div class="accordion-item-desc">
                                        {{ $itinerary['is_start'] ? 'Điểm khởi hành: ' . $itinerary['location_name'] : '' }}
                                        {{ $itinerary['is_end'] ? 'Điểm kết thúc: ' . $itinerary['location_name'] : '' }}
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>




                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9 margin-top-15 margin-bottom-10">
                        <h1 class="text-center" style="font-weight: bold">NHỮNG THÔNG TIN CẦN LƯU Ý</h1>

                        <!-- Cột 1 -->
                        <div class="col-xs-6 col-sm-6">
                            <div class="accordion">
                                <!-- Accordion Item 1 -->
                                <div class="accordion-item">
                                    <input type="checkbox" id="accordion1-1">
                                    <label for="accordion1-1" class="accordion-item-title">
                                        <span class="icon"></span>
                                        <b>Giá tour bao gồm</b>
                                    </label>
                                    <div class="accordion-item-desc">Nội dung chi tiết cho mục "Giá tour bao gồm".
                                    </div>
                                </div>
                                <!-- Accordion Item 2 -->
                                <div class="accordion-item">
                                    <input type="checkbox" id="accordion1-2">
                                    <label for="accordion1-2" class="accordion-item-title">
                                        <span class="icon"></span>
                                        <b>Điều khoản thanh toán</b>
                                    </label>
                                    <div class="accordion-item-desc">Nội dung chi tiết cho mục "Điều khoản thanh toán".
                                    </div>
                                </div>
                                <!-- Accordion Item 3 -->
                                <div class="accordion-item">
                                    <input type="checkbox" id="accordion1-3">
                                    <label for="accordion1-3" class="accordion-item-title">
                                        <span class="icon"></span>
                                        <b>Hủy tour</b>
                                    </label>
                                    <div class="accordion-item-desc">Nội dung chi tiết cho mục "Hủy tour".</div>
                                </div>
                                <!-- Accordion Item 4 -->
                                <div class="accordion-item">
                                    <input type="checkbox" id="accordion1-4">
                                    <label for="accordion1-4" class="accordion-item-title">
                                        <span class="icon"></span>
                                        <b>Quy định hành lý</b>
                                    </label>
                                    <div class="accordion-item-desc">Nội dung chi tiết cho mục "Quy định hành lý".
                                    </div>
                                </div>
                                <!-- Accordion Item 5 -->
                                <div class="accordion-item">
                                    <input type="checkbox" id="accordion1-5">
                                    <label for="accordion1-5" class="accordion-item-title">
                                        <span class="icon"></span>
                                        <b>Thông tin liên hệ</b>
                                    </label>
                                    <div class="accordion-item-desc">Nội dung chi tiết cho mục "Thông tin liên hệ".
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Cột 2 -->
                        <div class="col-xs-6 col-sm-6">
                            <div class="accordion">
                                <!-- Accordion Item 1 -->
                                <div class="accordion-item">
                                    <input type="checkbox" id="accordion2-1">
                                    <label for="accordion2-1" class="accordion-item-title">
                                        <span class="icon"></span>
                                        <b>Chính sách hoàn tiền</b>
                                    </label>
                                    <div class="accordion-item-desc">Nội dung chi tiết cho mục "Chính sách hoàn tiền".
                                    </div>
                                </div>
                                <!-- Accordion Item 2 -->
                                <div class="accordion-item">
                                    <input type="checkbox" id="accordion2-2">
                                    <label for="accordion2-2" class="accordion-item-title">
                                        <span class="icon"></span>
                                        <b>Giấy tờ cần thiết</b>
                                    </label>
                                    <div class="accordion-item-desc">Nội dung chi tiết cho mục "Giấy tờ cần thiết".
                                    </div>
                                </div>
                                <!-- Accordion Item 3 -->
                                <div class="accordion-item">
                                    <input type="checkbox" id="accordion2-3">
                                    <label for="accordion2-3" class="accordion-item-title">
                                        <span class="icon"></span>
                                        <b>Chính sách bảo hiểm</b>
                                    </label>
                                    <div class="accordion-item-desc">Nội dung chi tiết cho mục "Chính sách bảo hiểm".
                                    </div>
                                </div>
                                <!-- Accordion Item 4 -->
                                <div class="accordion-item">
                                    <input type="checkbox" id="accordion2-4">
                                    <label for="accordion2-4" class="accordion-item-title">
                                        <span class="icon"></span>
                                        <b>Lưu ý khi đi tour</b>
                                    </label>
                                    <div class="accordion-item-desc">Nội dung chi tiết cho mục "Lưu ý khi đi tour".
                                    </div>
                                </div>
                                <!-- Accordion Item 5 -->
                                <div class="accordion-item">
                                    <input type="checkbox" id="accordion2-5">
                                    <label for="accordion2-5" class="accordion-item-title">
                                        <span class="icon"></span>
                                        <b>Liên hệ khẩn cấp</b>
                                    </label>
                                    <div class="accordion-item-desc">Nội dung chi tiết cho mục "Liên hệ khẩn cấp".
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
                                                        <strong class="btn-link text-semibold media-heading box-inline">
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

            if (adults === 0) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Chưa chọn số lượng!',
                    text: 'Vui Lòng Chọn Người Lớn Đi Kèm',
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

            var tourDuration = <?= json_encode($tour['time']) ?>; // Thời lượng tour (số ngày)

            // Lấy ngày hôm nay dưới dạng YYYY-MM-DD
            var today = new Date().toISOString().split("T")[0];

            // Xác định minDate
            var minDate = new Date(startDateTour) > new Date(today) ? startDateTour : today;

            // Khởi tạo flatpickr
            flatpickr("#datepicker", {
                dateFormat: "Y-m-d", // Định dạng ngày
                minDate: minDate, // Ngày nhỏ nhất
                maxDate: endDateTour, // Ngày lớn nhất

                defaultDate: minDate, // Ngày mặc định
                locale: "vn", // Ngôn ngữ tiếng Việt (nếu có)
                enable: [
                    function(date) {
                        // Tính toán ngày kết thúc dự kiến
                        var selectedEndDate = new Date(date);
                        selectedEndDate.setDate(selectedEndDate.getDate() + tourDuration - 1);

                        // Chỉ cho phép chọn những ngày mà ngày kết thúc nằm trong phạm vi hợp lệ
                        return selectedEndDate <= new Date(endDateTour);
                    },
                ],
                onChange: function(selectedDates, dateStr, instance) {
                    if (selectedDates.length > 0) {
                        var selectedDate = new Date(dateStr);
                        var estimatedEndDate = new Date(selectedDate);
                        estimatedEndDate.setDate(selectedDate.getDate() + tourDuration - 1);

                        // Hiển thị ngày kết thúc dự kiến
                        document.getElementById("estimated-end-date").innerText =
                            "Ngày kết thúc dự kiến: " + estimatedEndDate.toISOString().split("T")[0];
                    }
                },
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
