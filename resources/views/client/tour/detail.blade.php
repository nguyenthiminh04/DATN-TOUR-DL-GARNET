@extends('client.layouts.app')
@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <style>
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
    {{-- <style>
        .tour-no-contentt {
    display: block; /* Hiển thị thẻ */
    position: fixed; /* Để thẻ cố định ở một vị trí */
    bottom: 0; /* Gắn thẻ vào phía dưới màn hình */
    left: 0; /* Canh sát mép trái */
    width: 100%; /* Chiếm toàn bộ chiều rộng màn hình */
    height: 40%; /* Chiếm 40% chiều cao màn hình (tùy chỉnh theo ý muốn) */
    background-color: white; /* Màu nền */
    z-index: 1000; /* Đảm bảo thẻ ở trên các phần tử khác */
    overflow: auto; /* Đảm bảo nội dung có thể cuộn nếu cần */
    padding: 20px; /* Tùy chỉnh khoảng cách bên trong */
    box-sizing: border-box; /* Tính padding trong kích thước */
    border-top: 2px solid #ccc; /* Tùy chọn thêm viền phía trên */
}


    </style> --}}
    
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
        <meta itemprop="category" content="Du lịch Cuba">
        <meta itemprop="url" content="//ant-du-lich.mysapo.net/du-lich-canada-cuba-vancouver-victoria-la-habana-varadero">
        <meta itemprop="name" content="Du lịch Canada - Cuba [vancouver - victoria - la habana - varadero]">
        <meta itemprop="image"
            content="http://bizweb.dktcdn.net/thumb/grande/100/299/077/products/vancouver-1.jpg?v=1529553306293">
        <meta itemprop="description"
            content="- Hành trình trải nghiệm một Canada năng động, hiện đại bậc nhất thế giới với những thành phố đa văn hóa, sắc tộc, nghệ thuật và thanh bình.

- Kết nối “viên ngọc bích trên biển Caribe” với đặc sản truyền thống nổi tiếng khắp thế giới: rượu Rum, xì gà cùng vũ điệu Salsa cuồng nhiệt của các vũ công bốc lửa …

- Đặc biệt khám phá thiên đường nghỉ dưỡng Varadero của Cuba sở hữu một bãi biển cát trắng mịn tuyệt đẹp dài đến 20km.">
        <div class="d-none hidden" itemprop="brand" itemtype="https://schema.org/Brand" itemscope>
            <meta itemprop="name" content="Canada" />
        </div>
        <meta itemprop="model" content="">
        <div class="d-none hidden" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
            <div class="inventory_quantity hidden" itemscope itemtype="http://schema.org/ItemAvailability">
                <span class="a-stock" itemprop="supersededBy">
                    Còn hàng
                </span>
            </div>
            <link itemprop="availability" href="http://schema.org/InStock">
            <meta itemprop="priceCurrency" content="VND">
            <meta itemprop="price" content="99000000">
            <meta itemprop="url"
                content="https://ant-du-lich.mysapo.net/du-lich-canada-cuba-vancouver-victoria-la-habana-varadero">
            <span itemprop="UnitPriceSpecification" itemscope itemtype="https://schema.org/Downpayment">
                <meta itemprop="priceType" content="99000000">
            </span>
            <span itemprop="UnitPriceSpecification" itemscope itemtype="https://schema.org/Downpayment">
                <meta itemprop="priceSpecification" content="120000000">
            </span>
            <meta itemprop="priceValidUntil" content="2099-01-01">
        </div>
        <div class="d-none hidden" id="https://ant-du-lich.mysapo.net" itemprop="seller"
            itemtype="http://schema.org/Organization" itemscope>
            <meta itemprop="name" content="Ant Du lịch" />
            <meta itemprop="url" content="https://ant-du-lich.mysapo.net" />
            <meta itemprop="logo"
                content="http://bizweb.dktcdn.net/100/299/077/themes/642224/assets/logo.png?1705894518705" />
        </div>
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
                                <h1 class="title-head"></h1>

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



                                </ul>

                                <div class="product-summary product_description margin-bottom-10 margin-top-5">
                                    <div class="rte description">

                                        -<?= $tour['description'] ?>



                                    </div>
                                </div>

                                <div class="call-me-back">
                                    <ul class="row">
                                        <li class="col-md-6 col-sm-6 col-xs-6 col-100">
                                            <a href="{{ route('tour.pre-booking',['id'=>$tour->id]) }}" id="btnIconMouseScroll" title="Đặt tour"
                                                class="icon-mouse-scroll">
                                                <i class="fa fa-paper-plane" aria-hidden="true"></i> Đặt tour
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
                                                    <?= number_format($tour['price_old'], 0, '', '.') ?>đ
                                                    <input type="hidden" name="variant_price"
                                                        value="<?= $tour['price_old'] ?>">
                                                </li>
                                                <li class="col-xs-3 hidden-xss subtotal text-right" id="subtotal">
                                                    0₫</li>
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
                                                var startDate=<?= json_encode( $tour['start_date'] ) ?>; 
                                                
                                                

                                                
                                                // Lấy tất cả các phần tử nhóm sản phẩm
                                                const variantLists = document.querySelectorAll(".variant_list");

                                                // Phần tử hiển thị tổng tiền
                                                const totalPriceElement = document.querySelector(".totalPrice strong");


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
                                                    <input required class="required tourmaster-datepicker" id="datesss"
                                                        name="properties[Ngày đi]" type="text"
                                                        placeholder="Chọn Ngày đi" data-date-format="dd MM yyyy"
                                                        value="<?= $tour['start_date'] ?>" readonly="readonly" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-5 add-to-cart col-xs-6 col-100">
                                            <a href="{{ route('tour.pre-booking',['id'=>$tour->id]) }}">
                                                <button type="button" id="submit-table"
                                                    class="pull-right btn btn-default buynow add-to-cart button nomargin">
                                                    <i class="fa fa-paper-plane" aria-hidden="true"></i> Đặt tour
                                                </button>
                                            </a>

                                        </div>
                                        <script>
                                            function handleBookingClick(event, url) {
                                                event.preventDefault();

                                                // Lấy giá trị số lượng người lớn và trẻ em
                                                const adults = parseInt(document.getElementById('quantity-0').value, 10) || 0;
                                                const children = parseInt(document.getElementById('quantity-1').value, 10) || 0;

                                                // Kiểm tra số lượng
                                                if (adults === 0 && children === 0) {
                                                    alert('Vui lòng chọn số lượng người trước khi đặt tour!');
                                                    return;
                                                }

                                                // Lưu thông tin vào sessionStorage
                                                sessionStorage.setItem('tourBooking', JSON.stringify({
                                                    adults: adults,
                                                    children: children
                                                }));


                                                window.location.href = url;
                                            }

                                            // Gắn sự kiện click cho nút 1
                                            document.getElementById('submit-table').addEventListener('click', function(e) {
                                                handleBookingClick(e, this.closest('a').href);
                                            });

                                            // Gắn sự kiện click cho nút 2
                                            document.getElementById('btnIconMouseScroll').addEventListener('click', function(e) {
                                                handleBookingClick(e, this.href);
                                            });
                                        </script>

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
            <h2 class="product-promotions-list-title">Bình Luận</h2>
            <div class="product-promotions-list-content">
                @foreach($comments as $comment)
                    <div style="margin-left: {{ $comment->parent_id ? '20px' : '0' }}">
                        <strong>
                            @if($comment->user)
                                {{ $comment->user->name }}
                            @elseif($comment->anonymous_name)
                                {{ $comment->anonymous_name }}
                            @else
                                Ẩn danh
                            @endif
                        </strong>
                        <p>{{ $comment->content }}</p>

                        <!-- Form trả lời -->
                        <form method="POST" action="{{ route('posts.comment', $tour->id) }}">
                            @csrf
                            <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                            @if(!auth()->check())
                                <div>
                                    <label for="anonymous_name">Tên của bạn:</label>
                                    <input type="text" name="anonymous_name" placeholder="Tên của bạn">
                                </div>
                            @endif
                            <textarea name="content" rows="2" placeholder="Trả lời bình luận này" required></textarea>
                            <button type="submit">Trả lời</button>
                        </form>

                        <!-- Hiển thị bình luận con -->
                        @if($comment->children->count())
                            @include('client.tour.comment', ['comments' => $comment->children])
                        @endif
                    </div>
                @endforeach
            </div>

            <!-- Form bình luận mới -->
            <form method="POST" action="{{ route('posts.comment', $tour->id) }}">
                @csrf
                @if(!auth()->check())
                    <div>
                        <label for="anonymous_name">Tên của bạn:</label>
                        <input type="text" name="anonymous_name" placeholder="Tên của bạn">
                    </div>
                @endif
                <textarea name="content" rows="3" placeholder="Viết bình luận..." required></textarea>
                <button type="submit">Gửi</button>
            </form>
        </div>
    </div>
</div>

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




















                                            <div class="list-bestsell-item">
                                                <div class="thumbnail-container clearfix">
                                                    <div class="product-image">
                                                        <a
                                                            href="du-lich-my-los-angeles-las-vegas-universal-studios-hollywood-2-dem-ks.html">

                                                            <img class="img-responsive"
                                                                src="{{ url('client/bizweb.dktcdn.net/thumb/small/100/299/077/products/83864b64404979-5ad0e1bdba9b284f3.jpg?v=1529553163227') }}"
                                                                alt="Du lịch Mỹ [Los Angeles - Las Vegas - Universal Studios Hollywood] [2 đêm KS 5* Bellagio, Las Vegas]" />

                                                        </a>
                                                    </div>
                                                    <div class="product-meta">
                                                        <h3><a href="du-lich-my-los-angeles-las-vegas-universal-studios-hollywood-2-dem-ks.html"
                                                                title="Du lịch Mỹ [Los Angeles - Las Vegas - Universal Studios Hollywood] [2 đêm KS 5* Bellagio, Las Vegas]">Du
                                                                lịch Mỹ [Los Angeles - Las Vegas - Universal Studios
                                                                Hollywood] [2 đêm KS 5* Bellagio, Las Vegas]</a></h3>
                                                        <div class="product-price-and-shipping">


                                                            <span class="price">49.000.000₫</span>

                                                            <span class="regular-price">54.000.000₫</span>



                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


















                                            <div class="list-bestsell-item">
                                                <div class="thumbnail-container clearfix">
                                                    <div class="product-image">
                                                        <a href="du-lich-ha-noi-lao-cai-sapa-ha-long.html">

                                                            <img class="img-responsive"
                                                                src="{{ url('client/bizweb.dktcdn.net/thumb/small/100/299/077/products/1-large1b48c.jpg?v=1529553697103') }}"
                                                                alt="Du lịch Hà Nội - Lào Cai - Sapa - Hạ Long" />

                                                        </a>
                                                    </div>
                                                    <div class="product-meta">
                                                        <h3><a href="du-lich-ha-noi-lao-cai-sapa-ha-long.html"
                                                                title="Du lịch Hà Nội - Lào Cai - Sapa - Hạ Long">Du lịch
                                                                Hà Nội - Lào Cai - Sapa - Hạ Long</a></h3>
                                                        <div class="product-price-and-shipping">


                                                            <span class="price">7.990.000₫</span>


                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


















                                            <div class="list-bestsell-item">
                                                <div class="thumbnail-container clearfix">
                                                    <div class="product-image">
                                                        <a href="du-lich-chau-au-phap-thuy-sy-nui-jungfrau-y.html">

                                                            <img class="img-responsive"
                                                                src="{{ url('client/bizweb.dktcdn.net/thumb/small/100/299/077/products/grand-britain-europe-tour-5-minffe2.jpg?v=1529553857067') }}"
                                                                alt="Du lịch Châu Âu Pháp - Thụy Sỹ - Núi Jungfrau - Ý" />

                                                        </a>
                                                    </div>
                                                    <div class="product-meta">
                                                        <h3><a href="du-lich-chau-au-phap-thuy-sy-nui-jungfrau-y.html"
                                                                title="Du lịch Châu Âu Pháp - Thụy Sỹ - Núi Jungfrau - Ý">Du
                                                                lịch Châu Âu Pháp - Thụy Sỹ - Núi Jungfrau - Ý</a></h3>
                                                        <div class="product-price-and-shipping">


                                                            <span class="price">85.990.000₫</span>


                                                        </div>
                                                    </div>
                                                </div>
                                            </div>




















                                            <div class="list-bestsell-item">
                                                <div class="thumbnail-container clearfix">
                                                    <div class="product-image">
                                                        <a href="du-lich-phap-bi-ha-lan-hoi-hoa-tulip-keukenhof.html">

                                                            <img class="img-responsive"
                                                                src="{{ url('client/bizweb.dktcdn.net/thumb/small/100/299/077/products/0r2a5723d111.jpg?v=1529553943837') }}"
                                                                alt="Du lịch Pháp - Bỉ - Hà Lan [Hội Hoa Tulip Keukenhof]" />

                                                        </a>
                                                    </div>
                                                    <div class="product-meta">
                                                        <h3><a href="du-lich-phap-bi-ha-lan-hoi-hoa-tulip-keukenhof.html"
                                                                title="Du lịch Pháp - Bỉ - Hà Lan [Hội Hoa Tulip Keukenhof]">Du
                                                                lịch Pháp - Bỉ - Hà Lan [Hội Hoa Tulip Keukenhof]</a></h3>
                                                        <div class="product-price-and-shipping">


                                                            <span class="price">49.990.000₫</span>

                                                            <span class="regular-price">55.000.000₫</span>



                                                        </div>
                                                    </div>
                                                </div>
                                            </div>




















                                            <div class="list-bestsell-item">
                                                <div class="thumbnail-container clearfix">
                                                    <div class="product-image">
                                                        <a href="du-lich-da-nang-kdl-ba-na-hoi-an-co-do-hue.html">

                                                            <img class="img-responsive"
                                                                src="{{ url('client/bizweb.dktcdn.net/thumb/small/100/299/077/products/53916-131503727972c4.jpg?v=1529554090113') }}"
                                                                alt="Du lịch Đà Nẵng - KDL Bà Nà - Hội An - Cố Đô Huế" />

                                                        </a>
                                                    </div>
                                                    <div class="product-meta">
                                                        <h3><a href="du-lich-da-nang-kdl-ba-na-hoi-an-co-do-hue.html"
                                                                title="Du lịch Đà Nẵng - KDL Bà Nà - Hội An - Cố Đô Huế">Du
                                                                lịch Đà Nẵng - KDL Bà Nà - Hội An - Cố Đô Huế</a></h3>
                                                        <div class="product-price-and-shipping">


                                                            <span class="price">6.300.000₫</span>

                                                            <span class="regular-price">6.500.000₫</span>



                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


















                                            <div class="list-bestsell-item">
                                                <div class="thumbnail-container clearfix">
                                                    <div class="product-image">
                                                        <a href="du-lich-nha-trang-hon-lao.html">

                                                            <img class="img-responsive"
                                                                src="{{ url('client/bizweb.dktcdn.net/thumb/small/100/299/077/products/anam-resort-nha-trang-vietnam-23c70f.jpg?v=1529554176777') }}"
                                                                alt="Du lịch Nha Trang - Hòn Lao" />

                                                        </a>
                                                    </div>
                                                    <div class="product-meta">
                                                        <h3><a href="du-lich-nha-trang-hon-lao.html"
                                                                title="Du lịch Nha Trang - Hòn Lao">Du lịch Nha Trang - Hòn
                                                                Lao</a></h3>
                                                        <div class="product-price-and-shipping">


                                                            <span class="price">3.300.000₫</span>


                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>











                </div>
            </div>
        </div>
    </section>
    <script>
        var selectCallback = function(variant, selector) {
            if (variant) {
                var form = jQuery('#' + selector.domIdPrefix).closest('form');
                for (var i = 0, length = variant.options.length; i < length; i++) {
                    var radioButton = form.find('.swatch[data-option-index="' + i + '"] :radio[value="' + variant
                        .options[i] + '"]');
                    if (radioButton.size()) {
                        radioButton.get(0).checked = true;
                    }
                }
            }
            var addToCart = jQuery('.form-product .btn-cart'),
                form = jQuery('.form-product .form-group'),
                productPrice = jQuery('.details-pro .special-price .product-price'),
                qty = jQuery('.inventory_quantity'),
                comparePrice = jQuery('.details-pro .old-price .product-price-old');

            if (variant && variant.available) {
                if (variant.inventory_management == "bizweb") {
                    qty.html('<span>Chỉ còn ' + variant.inventory_quantity + ' sản phẩm</span>');
                } else {
                    qty.html('<span>Còn hàng</span>');
                }
                addToCart.text('Thêm vào giỏ hàng').removeAttr('disabled');
                if (variant.price == 0) {
                    productPrice.html('Liên hệ');
                    comparePrice.hide();
                    form.addClass('hidden');
                } else {
                    form.removeClass('hidden');
                    productPrice.html(Bizweb.formatMoney(variant.price,
                        "{{ 'amount_no_decimals_with_comma_separator' }}₫"));
                    // Also update and show the product's compare price if necessary
                    if (variant.compare_at_price > variant.price) {
                        comparePrice.html(Bizweb.formatMoney(variant.compare_at_price,
                            "{{ 'amount_no_decimals_with_comma_separator' }}₫")).show();
                    } else {
                        comparePrice.hide();
                    }
                }

            } else {
                qty.html('<span>Hết hàng</span>');
                addToCart.text('Hết hàng').attr('disabled', 'disabled');
                if (variant) {
                    if (variant.price != 0) {
                        form.removeClass('hidden');
                        productPrice.html(Bizweb.formatMoney(variant.price,
                            "{{ 'amount_no_decimals_with_comma_separator' }}₫"));
                        // Also update and show the product's compare price if necessary
                        if (variant.compare_at_price > variant.price) {
                            comparePrice.html(Bizweb.formatMoney(variant.compare_at_price,
                                "{{ 'amount_no_decimals_with_comma_separator' }}₫")).show();
                        } else {
                            comparePrice.hide();
                        }
                    } else {
                        productPrice.html('Liên hệ');
                        comparePrice.hide();
                        form.addClass('hidden');
                    }
                } else {
                    productPrice.html('Liên hệ');
                    comparePrice.hide();
                    form.addClass('hidden');
                }

            }
            /*begin variant image*/
            if (variant && variant.image) {
                var originalImage = jQuery(".large-image img");
                var newImage = variant.image;
                var element = originalImage[0];
                Bizweb.Image.switchImage(newImage, element, function(newImageSizedSrc, newImage, element) {
                    jQuery(element).parents('a').attr('href', newImageSizedSrc);
                    jQuery(element).attr('src', newImageSizedSrc);
                });
            }

            /*end of variant image*/
        };
        jQuery(function($) {
            jQuery('.swatch :radio').change(function() {
                var optionIndex = jQuery(this).closest('.swatch').attr('data-option-index');
                var optionValue = jQuery(this).val();
                jQuery(this)
                    .closest('form')
                    .find('.single-option-selector')
                    .eq(optionIndex)
                    .val(optionValue)
                    .trigger('change');
            });

            $(document).ready(function() {
                $('#zoom_01').elevateZoom({
                    gallery: 'gallery_01',
                    zoomWindowWidth: 420,
                    zoomWindowHeight: 500,
                    zoomWindowOffetx: 10,
                    easing: true,
                    scrollZoom: true,
                    cursor: 'pointer',
                    galleryActiveClass: 'active',
                    imageCrossfade: true

                });
            });
            $('#gallery_01 img, .swatch-element label').click(function(e) {
                $('.checkurl').attr('href', $(this).attr('src'));
                setTimeout(function() {
                    $('.zoomContainer').remove();
                    $('#zoom_01').elevateZoom({
                        gallery: 'gallery_01',
                        zoomWindowWidth: 420,
                        zoomWindowHeight: 500,
                        zoomWindowOffetx: 10,
                        easing: true,
                        scrollZoom: true,
                        cursor: 'pointer',
                        galleryActiveClass: 'active',
                        imageCrossfade: true

                    });

                }, 300);

            })
        });
    </script>
    <script>
        var length = 3;

        $(document).ready(function() {
            $("#quantity-0").focus();
            $("#submit-table").click(function(e) {
                e.preventDefault();
                var toAdd = new Array();
                var qty;
                for (i = 0; i < length; i++) {
                    var q = $("#quantity-" + i).val();
                    if (q > 0) {
                        toAdd.push({
                            variant_id: $("#variant-" + i).val(),
                            variant_date: $("#datesss").val(),
                            variant_dates: $("#datesss").val(),
                            quantity_id: $("#quantity-" + i).val() || 0
                        });
                    };
                }

                function moveAlong() {
                    if (toAdd.length) {
                        var request = toAdd.shift();
                        var tempId = request.variant_id;
                        var tempQty = request.quantity_id;
                        var tempDate = request.variant_date;
                        data = {
                            "quantity": tempQty,
                            "variantId": tempId,
                            "properties[Ngày đi]": tempDate
                        }
                        console.log(data.variantId);
                        debugger;
                        var params = {
                            type: 'POST',
                            url: '/cart/add.js',
                            data: data,
                            dataType: 'json',
                            success: function(line_item) {
                                moveAlong();
                                jQuery.getJSON('cart.json', function(cart) {
                                    var item_count = cart.item_count;
                                });
                            },
                            error: function() {
                                moveAlong();

                            }
                        };
                        $.ajax(params);
                    } else {
                        document.location.href = 'cart.html';
                    }
                };
                moveAlong();
            });
            var dates = $("#date-khoi-hanh").text();
            var n = dates.search("Chủ nhật");
            var cn = dates.substring(n, 8);
            var numb = dates.match(/\d/g);
            if (n > -1) {
                if (numb && numb.length) {
                    numb.push('1');
                } else {
                    numb = ['1'];
                }
            }
            var dateToday = new Date();

            function DisableMonday(date) {
                var day = date.getDay();
                var i;
                if (numb && numb.length) {
                    for (i = 0; i < numb.length; i++) {
                        var m = numb[i] - 1;
                        var m1 = numb[i + 1] - 1;
                        var m2 = numb[i + 2] - 1;
                        var m3 = numb[i + 3] - 1;
                        var m4 = numb[i + 4] - 1;
                        var m5 = numb[i + 5] - 1;
                        var m6 = numb[i + 6] - 1;
                        if (day == m || day == m1 || day == m2 || day == m3 || day == m4 || day == m5 || day ==
                            m6) {
                            return [true];
                        } else {
                            return [false];
                        }
                    }
                } else {
                    return [true];
                }
            }
            $(".tourmaster-datepicker").datepicker({
                defaultDate: "",
                changeMonth: true,
                changeYear: true,
                numberOfMonths: 1,
                minDate: dateToday,
                beforeShowDay: DisableMonday
            });
        });
    </script>
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
                            <img src="{{ url('client/bizweb.dktcdn.net/thumb/medium/100/299/077/products/vancouver-145e5.jpg?v=1529553306293') }}"
                                alt="Du lịch Canada - Cuba [vancouver - victoria - la habana - varadero]"
                                class="img-responsive center-block" />
                            <h3 class="cta-name-pro">Du lịch Canada - Cuba [vancouver - victoria - la habana - varadero]
                            </h3>
                        </div>
                        <div class="col-md-7 col-sm-7">
                            <form method="post" action="https://ant-du-lich.mysapo.net/postcontact" id="contact"
                                accept-charset="UTF-8"><input name="FormType" type="hidden" value="contact" /><input
                                    name="utf8" type="hidden" value="true" /><input type="hidden"
                                    id="Token-e83d81984aee46a2804edbbd2ef70212" name="Token" />
                                <script src="../www.google.com/recaptcha/apif78f.js?render=6Ldtu4IUAAAAAMQzG1gCw3wFlx_GytlZyLrXcsuK"></script>
                                <script>
                                    grecaptcha.ready(function() {
                                        grecaptcha.execute("6Ldtu4IUAAAAAMQzG1gCw3wFlx_GytlZyLrXcsuK", {
                                            action: "contact"
                                        }).then(function(token) {
                                            document.getElementById("Token-e83d81984aee46a2804edbbd2ef70212").value = token
                                        });
                                    });
                                </script>

                                <div class="form-signup clearfix">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <fieldset class="form-group">
                                                <input placeholder="Họ tên" type="text" name="contact[name]"
                                                    id="name" class="form-control"
                                                    data-validation-error-msg= "Không được để trống"
                                                    data-validation="required" required />
                                                <input type="hidden" name="contact[Tour]" id="nametour"
                                                    class="form-control" required
                                                    value="Du lịch Canada - Cuba [vancouver - victoria - la habana - varadero]" />
                                            </fieldset>
                                        </div>
                                        <div class="col-xs-12">
                                            <fieldset class="form-group">
                                                <input placeholder="Điện thoại" type="text" name="contact[phone]"
                                                    id="phone" class="form-control number-sidebar"
                                                    data-validation-error-msg= "Không được để trống"
                                                    data-validation="required" required />
                                            </fieldset>
                                        </div>
                                        <div class="col-xs-12">
                                            <fieldset class="form-group">
                                                <input placeholder="Email" type="email" name="contact[email]"
                                                    data-validation="email"
                                                    pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$"
                                                    data-validation-error-msg= "Email sai định dạng" id="email"
                                                    class="form-control" required />
                                            </fieldset>
                                        </div>
                                        <div class="col-xs-12">
                                            <fieldset class="form-group">
                                                <textarea placeholder="Nội dung" name="contact[body]" id="comment" class="form-control" rows="3"
                                                    data-validation-error-msg= "Không được để trống" data-validation="required" required></textarea>
                                            </fieldset>
                                            <div class="pull-xs-right text-center" style="margin-top:10px;">
                                                <button type="submit"
                                                    class="btn btn-blues btn-style btn-style-active">Gửi thông tin</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <footer class="notification-box margin-top-10"></footer>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.callmeback-form form#contact').submit(function(e) {
                if ($(".g-recaptcha").size()) {
                    if (grecaptcha.getResponse() == "") {
                        e.preventDefault();
                        alert("Câu trả lời của bạn chưa đúng. Hãy thử lại.");
                    } else {
                        alert(
                            "Cảm ơn bạn đã liên hệ với chúng tôi. Chúng tôi sẽ trả lời bạn sớm nhất có thể."
                        );
                    }
                } else {
                    alert("Cảm ơn bạn đã liên hệ với chúng tôi. Chúng tôi sẽ trả lời bạn sớm nhất có thể.");
                }
            });
        });
    </script>
    <script>
        jQuery(document).ready(function() {
            jQuery(".product-tab img").each(function(index) {
                var alt = jQuery(this).attr('alt');
                if (alt == "") {
                    jQuery(this).attr('alt',
                        'Du lịch Canada - Cuba [vancouver - victoria - la habana - varadero]');
                }
            });
        });
    </script>
    <link rel="preload" as="script"
        href="{{ url('client/cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js') }}" />
    <script
        src="{{ url('client/cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js') }}"
        type="text/javascript"></script>
    <script>
        $.validate({});
    </script>
    <link rel="preload" as="script"
        href="{{ url('client/bizweb.dktcdn.net/100/299/077/themes/642224/assets/api-jquery6d1d.js?1705894518705') }}" />
    <script src="{{ url('client/bizweb.dktcdn.net/100/299/077/themes/642224/assets/api-jquery6d1d.js?1705894518705') }}"
        type="text/javascript"></script>
    <div class="ajax-load">
        <span class="loading-icon">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                y="0px" width="24px" height="30px" viewBox="0 0 24 30" style="enable-background:new 0 0 50 50;"
                xml:space="preserve">
                <rect x="0" y="10" width="4" height="10" fill="#333" opacity="0.2">
                    <animate attributeName="opacity" attributeType="XML" values="0.2; 1; .2" begin="0s"
                        dur="0.6s" repeatCount="indefinite" />
                    <animate attributeName="height" attributeType="XML" values="10; 20; 10" begin="0s"
                        dur="0.6s" repeatCount="indefinite" />
                    <animate attributeName="y" attributeType="XML" values="10; 5; 10" begin="0s" dur="0.6s"
                        repeatCount="indefinite" />
                </rect>
                <rect x="8" y="10" width="4" height="10" fill="#333" opacity="0.2">
                    <animate attributeName="opacity" attributeType="XML" values="0.2; 1; .2" begin="0.15s"
                        dur="0.6s" repeatCount="indefinite" />
                    <animate attributeName="height" attributeType="XML" values="10; 20; 10" begin="0.15s"
                        dur="0.6s" repeatCount="indefinite" />
                    <animate attributeName="y" attributeType="XML" values="10; 5; 10" begin="0.15s" dur="0.6s"
                        repeatCount="indefinite" />
                </rect>
                <rect x="16" y="10" width="4" height="10" fill="#333" opacity="0.2">
                    <animate attributeName="opacity" attributeType="XML" values="0.2; 1; .2" begin="0.3s"
                        dur="0.6s" repeatCount="indefinite" />
                    <animate attributeName="height" attributeType="XML" values="10; 20; 10" begin="0.3s"
                        dur="0.6s" repeatCount="indefinite" />
                    <animate attributeName="y" attributeType="XML" values="10; 5; 10" begin="0.3s" dur="0.6s"
                        repeatCount="indefinite" />
                </rect>
            </svg>
        </span>
    </div>

    <div class="loading awe-popup">
        <div class="overlay"></div>
        <div class="loader" title="2">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                y="0px" width="24px" height="30px" viewBox="0 0 24 30" style="enable-background:new 0 0 50 50;"
                xml:space="preserve">
                <rect x="0" y="10" width="4" height="10" fill="#333" opacity="0.2">
                    <animate attributeName="opacity" attributeType="XML" values="0.2; 1; .2" begin="0s"
                        dur="0.6s" repeatCount="indefinite" />
                    <animate attributeName="height" attributeType="XML" values="10; 20; 10" begin="0s"
                        dur="0.6s" repeatCount="indefinite" />
                    <animate attributeName="y" attributeType="XML" values="10; 5; 10" begin="0s" dur="0.6s"
                        repeatCount="indefinite" />
                </rect>
                <rect x="8" y="10" width="4" height="10" fill="#333" opacity="0.2">
                    <animate attributeName="opacity" attributeType="XML" values="0.2; 1; .2" begin="0.15s"
                        dur="0.6s" repeatCount="indefinite" />
                    <animate attributeName="height" attributeType="XML" values="10; 20; 10" begin="0.15s"
                        dur="0.6s" repeatCount="indefinite" />
                    <animate attributeName="y" attributeType="XML" values="10; 5; 10" begin="0.15s" dur="0.6s"
                        repeatCount="indefinite" />
                </rect>
                <rect x="16" y="10" width="4" height="10" fill="#333" opacity="0.2">
                    <animate attributeName="opacity" attributeType="XML" values="0.2; 1; .2" begin="0.3s"
                        dur="0.6s" repeatCount="indefinite" />
                    <animate attributeName="height" attributeType="XML" values="10; 20; 10" begin="0.3s"
                        dur="0.6s" repeatCount="indefinite" />
                    <animate attributeName="y" attributeType="XML" values="10; 5; 10" begin="0.3s" dur="0.6s"
                        repeatCount="indefinite" />
                </rect>
            </svg>
        </div>

    </div>

    <div class="addcart-popup product-popup awe-popup">
        <div class="overlay no-background"></div>
        <div class="content">
            <div class="row row-noGutter">
                <div class="col-xl-6 col-xs-12">
                    <div class="btn btn-full btn-primary a-left popup-title"><i class="fa fa-check"></i>Thêm vào giỏ hàng
                        thành công
                    </div>
                    <a href="javascript:void(0)" class="close-window close-popup"><i class="fa fa-close"></i></a>
                    <div class="info clearfix">
                        <div class="product-image margin-top-5">
                            <img alt="popup"
                                src="{{ url('client/bizweb.dktcdn.net/100/299/077/themes/642224/assets/logo6d1d.png?1705894518705') }}"
                                style="max-width:150px; height:auto" />
                        </div>
                        <div class="product-info">
                            <p class="product-name"></p>
                            <p class="quantity color-main"><span>Số lượng: </span></p>
                            <p class="total-money color-main"><span>Tổng tiền: </span></p>

                        </div>
                        <div class="actions">
                            <button class="btn  btn-primary  margin-top-5 btn-continue">Tiếp tục mua hàng</button>
                            <button class="btn btn-gray margin-top-5" onclick="window.location='cart.html'">Kiểm tra giỏ
                                hàng</button>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
    <div class="error-popup awe-popup">
        <div class="overlay no-background"></div>
        <div class="popup-inner content">
            <div class="error-message"></div>
        </div>
    </div>
    <script>
        window.Bizweb || (window.Bizweb = {}), Bizweb.mediaDomainName = "http://bizweb.dktcdn.net/", Bizweb.each = function(
            a, b) {
            for (var c = 0; c < a.length; c++) b(a[c], c)
        }, Bizweb.getClass = function(a) {
            return Object.prototype.toString.call(a).slice(8, -1)
        }, Bizweb.map = function(a, b) {
            for (var c = [], d = 0; d < a.length; d++) c.push(b(a[d], d));
            return c
        }, Bizweb.arrayContains = function(a, b) {
            for (var c = 0; c < a.length; c++)
                if (a[c] == b) return !0;
            return !1
        }, Bizweb.distinct = function(a) {
            for (var b = [], c = 0; c < a.length; c++) Bizweb.arrayContains(b, a[c]) || b.push(a[c]);
            return b
        }, Bizweb.getUrlParameter = function(a) {
            var b = RegExp("[?&]" + a + "=([^&]*)").exec(window.location.search);
            return b && decodeURIComponent(b[1].replace(/\+/g, " "))
        }, Bizweb.uniq = function(a) {
            for (var b = [], c = 0; c < a.length; c++) Bizweb.arrayIncludes(b, a[c]) || b.push(a[c]);
            return b
        }, Bizweb.arrayIncludes = function(a, b) {
            for (var c = 0; c < a.length; c++)
                if (a[c] == b) return !0;
            return !1
        }, Bizweb.Product = function() {
            function a(a) {
                if ("undefined" != typeof a)
                    for (property in a) this[property] = a[property]
            }
            return a.prototype.optionNames = function() {
                return "Array" == Bizweb.getClass(this.options) ? this.options : []
            }, a.prototype.optionValues = function(a) {
                if ("undefined" == typeof this.variants) return null;
                var b = Bizweb.map(this.variants, function(b) {
                    var c = "option" + (a + 1);
                    return "undefined" == typeof b[c] ? null : b[c]
                });
                return null == b[0] ? null : Bizweb.distinct(b)
            }, a.prototype.getVariant = function(a) {
                var b = null;
                return a.length != this.options.length ? null : (Bizweb.each(this.variants, function(c) {
                    for (var d = !0, e = 0; e < a.length; e++) {
                        var f = "option" + (e + 1);
                        c[f] != a[e] && (d = !1)
                    }
                    if (d) return void(b = c)
                }), b)
            }, a.prototype.getVariantById = function(a) {
                for (var b = 0; b < this.variants.length; b++) {
                    var c = this.variants[b];
                    if (c.id == a) return c
                }
                return null
            }, a.name = "Product", a
        }(), Bizweb.money_format = " VND", Bizweb.formatMoney = function(a, b) {
            function f(a, b, c, d) {
                if ("undefined" == typeof b && (b = 2), "undefined" == typeof c && (c = "."), "undefined" == typeof d &&
                    (d = ","), "undefined" == typeof a || null == a) return 0;
                a = a.toFixed(b);
                var e = a.split("."),
                    f = e[0].replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1" + c),
                    g = e[1] ? d + e[1] : "";
                return f + g
            }
            "string" == typeof a && (a = a.replace(/\./g, ""), a = a.replace(/\,/g, ""));
            var c = "",
                d = /\{\{\s*(\w+)\s*\}\}/,
                e = b || this.money_format;
            switch (e.match(d)[1]) {
                case "amount":
                    c = f(a, 2);
                    break;
                case "amount_no_decimals":
                    c = f(a, 0);
                    break;
                case "amount_with_comma_separator":
                    c = f(a, 2, ".", ",");
                    break;
                case "'amount_no_decimals_with_comma_separator'":
                    c = f(a, 0, ".", ",")
            }
            return e.replace(d, c)
        }, Bizweb.OptionSelectors = function() {
            function a(a, b) {
                return this.selectorDivClass = "selector-wrapper", this.selectorClass = "single-option-selector", this
                    .variantIdFieldIdSuffix = "-variant-id", this.variantIdField = null, this.selectors = [], this
                    .domIdPrefix = a, this.product = new Bizweb.Product(b.product), "undefined" != typeof b
                    .onVariantSelected ? this.onVariantSelected = b.onVariantSelected : this.onVariantSelected =
                    function() {}, this.replaceSelector(a), this.initDropdown(), !0
            }
            return a.prototype.replaceSelector = function(a) {
                var b = document.getElementById(a),
                    c = b.parentNode;
                Bizweb.each(this.buildSelectors(), function(a) {
                    c.insertBefore(a, b)
                }), b.style.display = "none", this.variantIdField = b
            }, a.prototype.buildSelectors = function() {
                for (var a = 0; a < this.product.optionNames().length; a++) {
                    var b = new Bizweb.SingleOptionSelector(this, a, this.product.optionNames()[a], this.product
                        .optionValues(a));
                    b.element.disabled = !1, this.selectors.push(b)
                }
                var c = this.selectorDivClass,
                    d = this.product.optionNames(),
                    e = Bizweb.map(this.selectors, function(a) {
                        var b = document.createElement("div");
                        if (b.setAttribute("class", c), d.length > 1) {
                            var e = document.createElement("label");
                            e.htmlFor = a.element.id, e.innerHTML = a.name, b.appendChild(e)
                        }
                        return b.appendChild(a.element), b
                    });
                return e
            }, a.prototype.initDropdown = function() {
                var a = {
                        initialLoad: !0
                    },
                    b = this.selectVariantFromDropdown(a);
                if (!b) {
                    var c = this;
                    setTimeout(function() {
                        c.selectVariantFromParams(a) || c.selectors[0].element.onchange(a)
                    })
                }
            }, a.prototype.selectVariantFromDropdown = function(a) {
                var b = document.getElementById(this.domIdPrefix).querySelector("[selected]");
                return !!b && this.selectVariant(b.value, a)
            }, a.prototype.selectVariantFromParams = function(a) {
                var b = Bizweb.getUrlParameter("variantid");
                return null == b && (b = Bizweb.getUrlParameter("variantId")), this.selectVariant(b, a)
            }, a.prototype.selectVariant = function(a, b) {
                var c = this.product.getVariantById(a);
                if (null == c) return !1;
                for (var d = 0; d < this.selectors.length; d++) {
                    var e = this.selectors[d].element,
                        f = e.getAttribute("data-option"),
                        g = c[f];
                    null != g && this.optionExistInSelect(e, g) && (e.value = g)
                }
                return "undefined" != typeof jQuery ? jQuery(this.selectors[0].element).trigger("change", b) : this
                    .selectors[0].element.onchange(b), !0
            }, a.prototype.optionExistInSelect = function(a, b) {
                for (var c = 0; c < a.options.length; c++)
                    if (a.options[c].value == b) return !0
            }, a.prototype.updateSelectors = function(a, b) {
                var c = this.selectedValues(),
                    d = this.product.getVariant(c);
                d ? (this.variantIdField.disabled = !1, this.variantIdField.value = d.id) : this.variantIdField
                    .disabled = !0, this.onVariantSelected(d, this, b), null != this.historyState && this
                    .historyState.onVariantChange(d, this, b)
            }, a.prototype.selectedValues = function() {
                for (var a = [], b = 0; b < this.selectors.length; b++) {
                    var c = this.selectors[b].element.value;
                    a.push(c)
                }
                return a
            }, a.name = "OptionSelectors", a
        }(), Bizweb.SingleOptionSelector = function(a, b, c, d) {
            this.multiSelector = a, this.values = d, this.index = b, this.name = c, this.element = document
                .createElement("select");
            for (var e = 0; e < d.length; e++) {
                var f = document.createElement("option");
                f.value = d[e], f.innerHTML = d[e], this.element.appendChild(f)
            }
            return this.element.setAttribute("class", this.multiSelector.selectorClass), this.element.setAttribute(
                    "data-option", "option" + (b + 1)), this.element.id = a.domIdPrefix + "-option-" + b, this.element
                .onchange = function(c, d) {
                    d = d || {}, a.updateSelectors(b, d)
                }, !0
        }, Bizweb.Image = {
            preload: function(a, b) {
                for (var c = 0; c < a.length; c++) {
                    var d = a[c];
                    this.loadImage(this.getSizedImageUrl(d, b))
                }
            },
            loadImage: function(a) {
                (new Image).src = a
            },
            switchImage: function(a, b, c) {
                if (a && b) {
                    var d = this.imageSize(b.src),
                        e = this.getSizedImageUrl(a.src, d);
                    c ? c(e, a, b) : b.src = e
                }
            },
            imageSize: function(a) {
                var b = a.match(/thumb\/(1024x1024|2048x2048|pico|icon|thumb|small|compact|medium|large|grande)\//);
                return null != b ? b[1] : null
            },
            getSizedImageUrl: function(a, b) {
                if (null == b) return a;
                if ("master" == b) return this.removeProtocol(a);
                var c = a.match(/\.(jpg|jpeg|gif|png|bmp|bitmap|tiff|tif)(\?v=\d+)?$/i);
                if (null != c) {
                    var d = Bizweb.mediaDomainName + "thumb/" + b + "/";
                    return this.removeProtocol(a).replace(Bizweb.mediaDomainName, d).split("?")[0]
                }
                return null
            },
            removeProtocol: function(a) {
                return a.replace(/http(s)?:/, "")
            }
        };
        (function(b) {
            function c() {}
            for (var d =
                    "assert,count,debug,dir,dirxml,error,exception,group,groupCollapsed,groupEnd,info,log,timeStamp,profile,profileEnd,time,timeEnd,trace,warn"
                    .split(","), a; a = d.pop();) {
                b[a] = b[a] || c
            }
        })((function() {
            try {
                console.log();
                return window.console;
            } catch (err) {
                return window.console = {};
            }
        })());
        var GLOBAL = {
            common: {
                init: function() {
                    $('.add_to_cart').bind('click', addToCart);
                }
            },
            templateIndex: {
                init: function() {}
            },
            templateProduct: {
                init: function() {}
            },
            templateCart: {
                init: function() {}
            }
        }
        var UTIL = {
            fire: function(func, funcname, args) {
                var namespace = GLOBAL;
                funcname = (funcname === undefined) ? 'init' : funcname;
                if (func !== '' && namespace[func] && typeof namespace[func][funcname] == 'function') {
                    namespace[func][funcname](args);
                }
            },
            loadEvents: function() {
                var bodyId = document.body.id;
                UTIL.fire('common');
                $.each(document.body.className.split(/\s+/), function(i, classnm) {
                    UTIL.fire(classnm);
                    UTIL.fire(classnm, bodyId);
                });
            }
        };
        $(document).ready(UTIL.loadEvents);
        Number.prototype.formatMoney = function(c, d, t) {
            var n = this,
                c = isNaN(c = Math.abs(c)) ? 2 : c,
                d = d == undefined ? "." : d,
                t = t == undefined ? "." : t,
                s = n < 0 ? "-" : "",
                i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "",
                j = (j = i.length) > 3 ? j % 3 : 0;
            return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math
                .abs(n - i).toFixed(c).slice(2) : "");
        };

        function addToCart(e) {
            if (typeof e !== 'undefined') e.preventDefault();
            var $this = $(this);
            var form = $this.parents('form');
            $.ajax({
                type: 'POST',
                url: '/cart/add.js',
                async: false,
                data: form.serialize(),
                dataType: 'json',
                error: addToCartFail,
                beforeSend: function() {},
                success: addToCartSuccess,
                cache: false
            });
        }

        function addToCartSuccess(jqXHR, textStatus, errorThrown) {
            $.ajax({
                type: 'GET',
                url: '/cart.js',
                async: false,
                cache: false,
                dataType: 'json',
                success: function(cart) {
                    awe_hidePopup('.loading');
                    Bizweb.updateCartFromForm(cart, '.top-cart-content .mini-products-list');
                    Bizweb.updateCartPopupForm(cart, '#popup-cart-desktop .tbody-popup');
                    Bizweb.updateCartPageForm(cart, '.cart_desktop_page .page_cart');
                }
            });
            var url_product = jqXHR['url'];
            var class_id = jqXHR['product_id'];
            var name = jqXHR['name'];
            var textDisplay = (
                '<i style="margin-right:5px; color:red; font-size:13px;" class="fa fa-check" aria-hidden="true"></i>Sản phẩm vừa thêm vào giỏ hàng'
            );
            var id = jqXHR['variant_id'];
            var dataList = $(".item-name a").map(function() {
                var plus = $(this).text();
                return plus;
            }).get();
            $('.title-popup-cart .cart-popup-name').html('<a href="' + url_product + '"style="color:red;" title="' + name +
                '">' + name + '</a> ');
            var nameid = dataList,
                found = $.inArray(name, nameid);
            var textfind = found;
            $(".item-info > p:contains(" + id + ")").html(
                '<span class="add_sus" style="color:#898989;"><i style="margin-right:5px; color:red; font-size:13px;" class="fa fa-check" aria-hidden="true"></i>Sản phẩm vừa thêm!</span>'
            );
            var windowW = $(window).width();
            if (windowW > 768) {
                $('#popup-cart').modal();
            } else {
                $('#myModal').html('');
                var $popupMobile = '<div class="modal-dialog"><div class="modal-content"><div class="modal-header">' +
                    '<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position: relative; z-index: 9;"><span aria-hidden="true">×</span></button>' +
                    '<h4 class="modal-title"><span><i class="fa fa-check" aria-hidden="true"></i></span>Thêm vào giỏ hàng thành công</h4></div>' +
                    '<div class="modal-body"><div class="media"><div class="media-left"><div class="thumb-1x1">' +
                    '<img width="70px" src="' + Bizweb.resizeImage(jqXHR['image'], 'small') + '" alt="' + jqXHR['title'] +
                    '"></div></div>' +
                    '<div class="media-body"><div class="product-title">' + jqXHR['name'] + '</div>' +
                    '<div class="product-new-price"><span>' + (jqXHR['price']).formatMoney(0) +
                    ' đ</span></div></div></div>' +
                    '<button class="btn btn-block btn-outline-red" data-dismiss="modal">Tiếp tục mua hàng</button>' +
                    '<a href="/checkout" class="btn btn-block btn-red">Tiến hành thanh toán »</a></div></div></div>';
                $('#myModal').html($popupMobile);
                $('#myModal').modal();
                clearTimeout($('#myModal').data('hideInterval'));
            }
        }

        function addToCartFail(jqXHR, textStatus, errorThrown) {
            var response = $.parseJSON(jqXHR.responseText);
            var $info = '<div class="error">' + response.description + '</div>';
        }
        $(document).on('click', ".remove-item-cart", function() {
            var variantId = $(this).attr('data-id');
            var line = $(this).attr('data-line');
            removeItemCart(variantId, line);
        });
        $(document).on('click', ".items-count", function() {
            $(this).parent().children('.items-count').prop('disabled', true);
            var thisBtn = $(this);
            var variantId = $(this).parent().find('.variantID').val();
            var qty = $(this).parent().children('.number-sidebar').val();
            var att = $(this).attr('data-lineup');
            updateQuantity(qty, variantId, att);
        });
        $(document).on('change', ".number-sidebar", function() {
            var variantId = $(this).parent().children('.variantID').val();
            var qty = $(this).val();
            updateQuantity(qty, variantId);
        });

        function updateQuantity(qty, variantId, att) {
            var variantIdUpdate = variantId;
            var attline = parseInt(att) + 1;
            console.log(attline);
            $.ajax({
                type: "POST",
                url: "/cart/change.js",
                data: {
                    "line": attline,
                    "quantity": qty
                },
                dataType: "json",
                success: function(cart, variantId) {
                    Bizweb.onCartUpdateClick(cart, variantIdUpdate);
                },
                error: function(qty, variantId) {
                    Bizweb.onError(qty, variantId)
                }
            });
        }

        function removeItemCart(variantId, line) {
            var variantIdRemove = variantId;
            var antline = parseInt(line) + 1;
            $.ajax({
                type: "POST",
                url: "/cart/change.js",
                data: {
                    "line": antline,
                    "quantity": 0
                },
                dataType: "json",
                success: function(cart, antline) {
                    Bizweb.onCartRemoveClick(cart, variantIdRemove);
                    location.reload();
                },
                error: function(antline, r) {
                    Bizweb.onError(antline, r)
                }
            })
        }
        Bizweb.updateCartFromForm = function(cart, cart_summary_id, cart_count_id) {
            if ((typeof cart_summary_id) === 'string') {
                var cart_summary = jQuery(cart_summary_id);
                if (cart_summary.length) {
                    // Start from scratch.
                    cart_summary.empty();
                    // Pull it all out.        
                    jQuery.each(cart, function(key, value) {
                        if (key === 'items') {

                            var table = jQuery(cart_summary_id);
                            if (value.length) {
                                jQuery('<ul class="list-item-cart"></ul>').appendTo(table);
                                jQuery.each(value, function(i, item) {

                                    var link_img1 = Bizweb.resizeImage(item.image, 'small');
                                    if (link_img1 == "null" || link_img1 == '' || link_img1 == null) {
                                        link_img1 =
                                            "{{ url('client/bizweb.dktcdn.net/thumb/large/assets/themes_support/noimage.gif') }}";
                                    }
                                    var buttonQty = "";
                                    if (item.quantity == '1') {
                                        buttonQty = 'disabled';
                                    } else {
                                        buttonQty = '';
                                    }
                                    jQuery('<li class="item productid-' + item.variant_id +
                                        '"><a class="product-image" href="' + item.url +
                                        '" title="' + item.name + '">' +
                                        '<img alt="' + item.name + '" src="' + link_img1 +
                                        '"\></a>' +
                                        '<div class="detail-item"><div class="product-details"> <a href="javascript:;" data-id="' +
                                        item.variant_id +
                                        '" title="Xóa" class="remove-item-cart fa fa-remove">&nbsp;</a>' +
                                        '<p class="product-name"> <a href="' + item.url +
                                        '" title="' + item.name + '">' + item.name +
                                        '</a></p></div>' +
                                        '<div class="product-details-bottom"><span class="price">' +
                                        Bizweb.formatMoney(item.price,
                                            "{{ 'amount_no_decimals_with_comma_separator' }}₫") +
                                        '</span>' +
                                        '<div class="quantity-select"><input class="variantID" type="hidden" name="variantId" value="' +
                                        item.variant_id +
                                        '"><button onClick="var result = document.getElementById(\'qty' +
                                        item.variant_id + '\'); var qty' + item.variant_id +
                                        ' = result.value; if( !isNaN( qty' + item.variant_id +
                                        ' ) &amp;&amp; qty' + item.variant_id +
                                        ' &gt; 1 ) result.value--;return false;" class="reduced items-count btn-minus" ' +
                                        buttonQty +
                                        ' type="button">–</button><input type="text" maxlength="12" min="1" class="input-text number-sidebar qty' +
                                        item.variant_id + '" id="qty' + item.variant_id +
                                        '" name="Lines" id="updates_' + item.variant_id +
                                        '" size="4" value="' + item.quantity +
                                        '"><button onClick="var result = document.getElementById(\'qty' +
                                        item.variant_id + '\'); var qty' + item.variant_id +
                                        ' = result.value; if( !isNaN( qty' + item.variant_id +
                                        ' )) result.value++;return false;" class="increase items-count btn-plus" type="button">+</button></div></div></li>'
                                    ).appendTo(table.children('.list-item-cart'));
                                });
                                jQuery('<div><div class="top-subtotal">Tổng cộng: <span class="price">' + Bizweb
                                    .formatMoney(cart.total_price,
                                        "{{ 'amount_no_decimals_with_comma_separator' }}₫") +
                                    '</span></div></div>').appendTo(table);
                                jQuery(
                                        '<div><div class="actions"><a href="/checkout" class="btn btn-gray btn-checkout"><span>Thanh toán</span></a><a href="/cart" class="view-cart btn btn-white margin-left-5"><span>Giỏ hàng</span></a></div></div>'
                                    )
                                    .appendTo(table);
                            } else {
                                jQuery(
                                        '<div class="no-item"><p>Không có sản phẩm nào trong giỏ hàng.</p></div>'
                                    )
                                    .appendTo(table);

                            }
                        }
                    });
                }
            }
            updateCartDesc(cart);
            var numInput = document.querySelector('#cart-sidebar input.input-text');
            if (numInput != null) {
                // Listen for input event on numInput.
                numInput.addEventListener('input', function() {
                    // Let's match only digits.
                    var num = this.value.match(/^\d+$/);
                    if (num == 0) {
                        // If we have no match, value will be empty.
                        this.value = 1;
                    }
                    if (num === null) {
                        // If we have no match, value will be empty.
                        this.value = "";
                    }
                }, false)
            }
        }

        Bizweb.updateCartPageForm = function(cart, cart_summary_id, cart_count_id) {
            if ((typeof cart_summary_id) === 'string') {
                var cart_summary = jQuery(cart_summary_id);
                if (cart_summary.length) {
                    // Start from scratch.
                    cart_summary.empty();
                    // Pull it all out.        
                    jQuery.each(cart, function(key, value) {
                        if (key === 'items') {
                            var table = jQuery(cart_summary_id);
                            if (value.length) {

                                var pageCart = '<div class="cart page_cart cart_des_page hidden-xs-down">' +
                                    '<div class="col-xs-9 cart-col-1">' +
                                    '<form id="shopping-cart" action="/cart" method="post" novalidate>' +
                                    '<div class="cart-tbody">' +
                                    '</div>' +
                                    '</form>' +
                                    '</div></div>';
                                var pageCartCheckout =
                                    '<div class="col-xs-3 cart-col-2 cart-collaterals cart_submit">' +
                                    '<div id="right-affix">' +
                                    '<div class="each-row">' +
                                    '<div class="box-style fee">' +
                                    '<p class="list-info-price">' +
                                    '<span>Tạm tính: </span>' +
                                    '<strong class="totals_price price _text-right text_color_right1">65756756756</strong></p></div>' +
                                    '<div class="box-style fee">' +
                                    '<div class="total2 clearfix">' +
                                    '<span class="text-label">Thành tiền: </span>' +
                                    '<div class="amount">' +
                                    '<p><strong class="totals_price">6</strong></p>' +
                                    '</div></div></div>' +
                                    '<button class="button btn-proceed-checkout btn btn-large btn-block btn-danger btn-checkout" title="Thanh toán ngay" type="button" onclick="window.location.href=\'/checkout\'">Thanh toán ngay</button>' +
                                    '<button class="button btn-proceed-checkout btn btn-large btn-block btn-danger btn-checkouts" title="Tiếp tục mua hàng" type="button" onclick="window.location.href=\'/collections/all\'">Tiếp tục mua hàng</button>' +
                                    '</div></div></div>';
                                jQuery(pageCart).appendTo(table);
                                jQuery.each(value, function(i, item) {
                                    var buttonQty = "";
                                    if (item.quantity == '1') {
                                        buttonQty = 'disabled';
                                    } else {
                                        buttonQty = '';
                                    }
                                    var link_img1 = Bizweb.resizeImage(item.image, 'medium');
                                    if (link_img1 == "null" || link_img1 == '' || link_img1 == null) {
                                        link_img1 =
                                            "{{ url('client/bizweb.dktcdn.net/thumb/large/assets/themes_support/noimage.gif') }}";
                                    }
                                    var date = "";
                                    if (item.properties['Ngày đi'] == null) {
                                        date = "Đang cập nhật";
                                    } else {
                                        date = item.properties['Ngày đi'];
                                    }
                                    var pageCartItem = '<div class="row shopping-cart-item productid-' +
                                        item.variant_id + '"><div class="clearfix proupdate' + item.id +
                                        '">' +
                                        '<div class="col-xs-3 img-thumnail-custom">' +
                                        '<p class="image">' +
                                        '<img class="img-responsive" src="' + link_img1 + '" alt="' +
                                        item.name + '" />' +
                                        '</p>' +
                                        '</div>' +
                                        '<div class="col-right col-xs-9">' +
                                        '<div class="box-info-product">' +
                                        '<p class="name">' +
                                        '<a href="' + item.url + '" target="_blank">' + item.name +
                                        '</a>' +
                                        '</p>' +
                                        '<p class="date-tour" data-date=' + date + '>' +
                                        'Ngày đi: ' + date + '' +
                                        '</p>' +
                                        '<p class="seller-by hidden">' + item.variant_title + '</p>' +
                                        '<p class="action">' +
                                        '<a href="javascript:;" class="btn btn-link btn-item-delete remove-item-cart" data-id="' +
                                        item.variant_id + '" data-line="' + i + '">Xóa</a>' +
                                        '</p>' +
                                        '</div>' +
                                        '<div class="box-price">' +
                                        '<p class="price">' + Bizweb.formatMoney(item.price,
                                            "{{ 'amount_no_decimals_with_comma_separator' }}₫") +
                                        '</p>' +
                                        '</div>' +
                                        '<div class="quantity-block">' +
                                        '<div class="input-group bootstrap-touchspin">' +
                                        '<div class="input-group-btn hidden">' +
                                        '<input class="variantID" type="hidden" name="variantId" value="' +
                                        item.variant_id + '">' +
                                        '<button data-lineup="' + i +
                                        '" onClick="var result = document.getElementById(\'qtyItem' +
                                        item.variant_id + '' + item.id + '\'); var qtyItem' + item
                                        .variant_id + '' + item.id +
                                        ' = result.value; if( !isNaN( qtyItem' + item.variant_id + '' +
                                        item.id +
                                        ' )) result.value++;return false;" class="increase_pop items-count btn-plus btn btn-default bootstrap-touchspin-up" type="button">+</button>' +
                                        '<input type="text" maxlength="12" min="1" onchange="if(this.value == 0)this.value=1;" class="form-control quantity-r2 quantity js-quantity-product input-text number-sidebar input_pop input_pop qtyItem' +
                                        item.variant_id + '' + item.id + '" id="qtyItem' + item
                                        .variant_id + '' + item.id + '" name="Lines" id="updates_' +
                                        item.variant_id + '' + item.id + '" size="4" value="' + item
                                        .quantity + '">' +
                                        '<button data-lineup="' + i +
                                        '" onClick="var result = document.getElementById(\'qtyItem' +
                                        item.variant_id + '' + item.id + '\'); var qtyItem' + item
                                        .variant_id + '' + item.id +
                                        ' = result.value; if( !isNaN( qtyItem' + item.variant_id + '' +
                                        item.id + ' ) &amp;&amp; qtyItem' + item.variant_id + '' + item
                                        .id + ' &gt; 1 ) result.value--;return false;" ' + buttonQty +
                                        ' class="reduced_pop items-count btn-minus btn btn-default bootstrap-touchspin-down" type="button">–</button>' +
                                        '</div>' +
                                        '</div>' +
                                        '</div>' +
                                        '</div>' +
                                        '</div></div>';
                                    jQuery(pageCartItem).appendTo(table.find('.cart-tbody'));
                                    if (item.variant_title == 'Default Title') {
                                        $('.seller-by').hide();
                                    }
                                });
                                jQuery(pageCartCheckout).appendTo(table.children('.cart'));
                            } else {
                                jQuery(
                                        '<p class="hidden-xs-down">Không có tour nào trong giỏ hàng. Quay lại <a href="/" style="color:;">cửa hàng</a> để tiếp tục mua sắm.</p>'
                                    )
                                    .appendTo(table);
                                jQuery('.cart_desktop_page').css('min-height', 'auto');
                            }
                        }
                    });
                }
            }
            updateCartDesc(cart);
            jQuery('#wait').hide();
        }
        Bizweb.updateCartPopupForm = function(cart, cart_summary_id, cart_count_id) {

            if ((typeof cart_summary_id) === 'string') {
                var cart_summary = jQuery(cart_summary_id);
                if (cart_summary.length) {
                    // Start from scratch.
                    cart_summary.empty();
                    // Pull it all out.        
                    jQuery.each(cart, function(key, value) {
                        if (key === 'items') {
                            var table = jQuery(cart_summary_id);
                            if (value.length) {
                                jQuery.each(value, function(i, item) {
                                    var link_img1 = Bizweb.resizeImage(item.image, 'small');
                                    if (link_img1 == "null" || link_img1 == '' || link_img1 == null) {
                                        link_img1 =
                                            "{{ url('client/bizweb.dktcdn.net/thumb/large/assets/themes_support/noimage.gif') }}";
                                    }
                                    var buttonQty = "";
                                    if (item.quantity == '1') {
                                        buttonQty = 'disabled';
                                    } else {
                                        buttonQty = '';
                                    }
                                    var date = "";
                                    if (item.properties['Ngày đi'] == null) {
                                        date = "Đang cập nhật";
                                    } else {
                                        date = item.properties['Ngày đi'];
                                    }
                                    var pageCartItem = '<div class="item-popup productid-' + item
                                        .variant_id +
                                        '"><div style="width: 50%;" class="text-left"><div class="item-image">' +
                                        '<a class="product-image" href="' + item.url + '" title="' +
                                        item.name + '"><img alt="' + item.name + '" src="' + link_img1 +
                                        '"width="' + '80' + '"\></a>' +
                                        '</div><div class="item-info"><p class="item-name"><a href="' +
                                        item.url + '" title="' + item.name + '">' + item.title +
                                        '</a></p>' +
                                        '<p class="variant-title-popup">' + item.variant_title +
                                        '</span>' +
                                        '<p class="item-remove"><a href="javascript:;" class="remove-item-cart" title="Xóa" data-id="' +
                                        item.variant_id + '" data-line="' + i +
                                        '"><i class="fa fa-close"></i> Bỏ tour</a></p><p class="addpass" style="color:#fff;">' +
                                        item.variant_id + '</p></div></div>' +
                                        '<div style="width: 15%;" class="text-right"><div class="item-price"><span class="price">' +
                                        Bizweb.formatMoney(item.price,
                                            "{{ 'amount_no_decimals_with_comma_separator' }}₫") +
                                        '</span>' +
                                        '</div></div><div style="width: 15%;" class="text-center hidden"><input class="variantID" type="hidden" name="variantId" value="' +
                                        item.variant_id + '">' +
                                        '<button data-lineup="' + i +
                                        '" onClick="var result = document.getElementById(\'qtyItem' +
                                        item.variant_id + '\'); var qtyItem' + item.variant_id +
                                        ' = result.value; if( !isNaN( qtyItem' + item.variant_id +
                                        ' ) &amp;&amp; qtyItem' + item.variant_id +
                                        ' &gt; 1 ) result.value--;return false;" ' + buttonQty +
                                        ' class="reduced items-count btn-minus" type="button">–</button>' +
                                        '<input type="text" maxlength="12" min="0" class="input-text number-sidebar qtyItem' +
                                        item.variant_id + '" id="qtyItem' + item.variant_id +
                                        '" name="Lines" id="updates_' + item.variant_id +
                                        '" size="4" value="' + item.quantity + '">' +
                                        '<button data-lineup="' + i +
                                        '" onClick="var result = document.getElementById(\'qtyItem' +
                                        item.variant_id + '\'); var qtyItem' + item.variant_id +
                                        ' = result.value; if( !isNaN( qtyItem' + item.variant_id +
                                        ' )) result.value++;return false;" class="increase items-count btn-plus" type="button">+</button></div>' +
                                        '<div style="width: 20%;" class="text-right"><span class="cart-price"> <span class="price">' +
                                        Bizweb.formatMoney(item.price * item.quantity,
                                            "{{ 'amount_no_decimals_with_comma_separator' }}₫") +
                                        '</span> </span></div></div>';
                                    jQuery(pageCartItem).prependTo(table);
                                    if (item.variant_title == 'Default Title') {
                                        $('.variant-title-popup').hide();
                                    }
                                    $('.link_product').text();
                                });
                            }
                        }
                    });
                }
            }
            jQuery('.total-price').html(Bizweb.formatMoney(cart.total_price,
                "{{ 'amount_no_decimals_with_comma_separator' }}₫"));
            updateCartDesc(cart);
        }
        Bizweb.updateCartPageFormMobile = function(cart, cart_summary_id, cart_count_id) {
            if ((typeof cart_summary_id) === 'string') {
                var cart_summary = jQuery(cart_summary_id);
                if (cart_summary.length) {
                    // Start from scratch.
                    cart_summary.empty();
                    // Pull it all out.        
                    jQuery.each(cart, function(key, value) {
                        if (key === 'items') {

                            var table = jQuery(cart_summary_id);
                            if (value.length) {
                                jQuery('<div class="cart_page_mobile content-product-list"></div>').appendTo(
                                    table);
                                jQuery.each(value, function(i, item) {
                                    if (item.image != null) {
                                        var src = Bizweb.resizeImage(item.image, 'small');
                                    } else {
                                        var src =
                                            "{{ url('client/bizweb.dktcdn.net/thumb/large/assets/themes_support/noimage.gif') }}";
                                    }
                                    var date = "";
                                    if (item.properties['Ngày đi'] == null) {
                                        date = "Đang cập nhật";
                                    } else {
                                        date = item.properties['Ngày đi'];
                                    }
                                    jQuery('<div class="item-product item productid-' + item
                                            .variant_id +
                                            ' "><div class="item-product-cart-mobile"><a href="' + item
                                            .url + '">	<a class="product-images1" href=""  title="' +
                                            item.name + '"><img width="80" height="150" alt="" src="' +
                                            src + '" alt="' + item.name + '"></a></a></div>' +
                                            '<div class="title-product-cart-mobile"><h3><a href="' +
                                            item.url + '" title="' + item.name + '">' + item.name +
                                            '</a></h3><p class="date-tour">Ngày đi: ' + date + '' +
                                            '</p><p>Giá: <span>' + Bizweb.formatMoney(item.price,
                                                "{{ 'amount_no_decimals_with_comma_separator' }}₫") +
                                            '</span></p></div>' +
                                            '<div class="select-item-qty-mobile"><div class="txt_center hidden">' +
                                            '<input class="variantID" type="hidden" name="variantId" value="' +
                                            item.variant_id + '"><button data-lineup="' + i +
                                            '" onClick="var result = document.getElementById(\'qtyMobile' +
                                            item.variant_id + '\'); var qtyMobile' + item.variant_id +
                                            ' = result.value; if( !isNaN( qtyMobile' + item.variant_id +
                                            ' ) &amp;&amp; qtyMobile' + item.variant_id +
                                            ' &gt; 1 ) result.value--;return false;" class="reduced items-count btn-minus" type="button">–</button><input type="text" maxlength="12" min="0" class="input-text number-sidebar qtyMobile' +
                                            item.variant_id + '" id="qtyMobile' + item.variant_id +
                                            '" name="Lines" id="updates_' + item.variant_id +
                                            '" size="4" value="' + item.quantity +
                                            '"><button data-lineup="' + i +
                                            '" onClick="var result = document.getElementById(\'qtyMobile' +
                                            item.variant_id + '\'); var qtyMobile' + item.variant_id +
                                            ' = result.value; if( !isNaN( qtyMobile' + item.variant_id +
                                            ' )) result.value++;return false;" class="increase items-count btn-plus" type="button">+</button></div>' +
                                            '<a class="button remove-item remove-item-cart" href="javascript:;" data-id="' +
                                            item.variant_id + '" data-line="' + i + '">Xoá</a></div>')
                                        .appendTo(table.children('.content-product-list'));

                                });

                                jQuery('<div class="header-cart-price" style=""><div class="title-cart "><h3 class="text-xs-left">Tổng tiền</h3><a class="text-xs-right totals_price_mobile">' +
                                    Bizweb.formatMoney(cart.total_price,
                                        "{{ 'amount_no_decimals_with_comma_separator' }}₫") +
                                    '</a></div>' +
                                    '<div class="checkout"><button class="btn-proceed-checkout-mobile" title="Tiến hành thanh toán" type="button" onclick="window.location.href=\'/checkout\'">' +
                                    '<span>Tiến hành thanh toán</span></button></div>' +
                                    '<button class="btn btn-proceed-continues-mobile" title="Tiếp tục mua hàng" type="button" onclick="window.location.href=\'/collections/all\'">Tiếp tục mua hàng</button>' +
                                    '</div>').appendTo(table);
                            }

                        }
                    });
                }
            }
            updateCartDesc(cart);
        }


        function updateCartDesc(data) {
            var $cartPrice = Bizweb.formatMoney(data.total_price, "{{ 'amount_no_decimals_with_comma_separator' }}₫"),
                $cartMobile = $('#header .cart-mobile .quantity-product'),
                $cartDesktop = $('.count_item_pr'),
                $cartDesktopList = $('.cart-counter-list'),
                $cartPopup = $('.cart-popup-count');

            switch (data.item_count) {
                case 0:
                    $cartMobile.text('0');
                    $cartDesktop.text('0');
                    $cartDesktopList.text('0');
                    $cartPopup.text('0');

                    break;
                case 1:
                    $cartMobile.text('1');
                    $cartDesktop.text('1');
                    $cartDesktopList.text('1');
                    $cartPopup.text('1');

                    break;
                default:
                    $cartMobile.text(data.item_count);
                    $cartDesktop.text(data.item_count);
                    $cartDesktopList.text(data.item_count);
                    $cartPopup.text(data.item_count);

                    break;
            }
            $('.top-cart-content .top-subtotal .price, aside.sidebar .block-cart .subtotal .price, .popup-total .total-price')
                .html($cartPrice);
            $('.popup-total .total-price').html($cartPrice);
            $('.cart-collaterals .totals_price').html($cartPrice);
            $('.header-cart-price .totals_price_mobile').html($cartPrice);
            $('.cartCount, .cart-products-count').html(data.item_count);
        }

        Bizweb.onCartUpdate = function(cart) {
            Bizweb.updateCartFromForm(cart, '.mini-products-list');
            Bizweb.updateCartPopupForm(cart, '#popup-cart-desktop .tbody-popup');

        };
        Bizweb.onCartUpdateClick = function(cart, variantId) {
            jQuery.each(cart, function(key, value) {
                if (key === 'items') {
                    jQuery.each(value, function(i, item) {
                        if (item.variant_id == variantId) {
                            $('.proupdate' + item.id).find('.cart-price span.price').html(Bizweb
                                .formatMoney(item.price * item.quantity,
                                    "{{ 'amount_no_decimals_with_comma_separator' }}₫"));
                            $('.proupdate' + item.id).find('.items-count').prop("disabled", false);
                            $('.proupdate' + item.id).find('.number-sidebar').prop("disabled", false);
                            $('.proupdate' + item.id + ' .number-sidebar').val(item.quantity);
                            if (item.quantity == '1') {
                                $('.proupdate' + item.id).find('.items-count.btn-minus').prop(
                                    "disabled", true);
                            }
                        }
                    });
                }
            });
            updateCartDesc(cart);
        }
        Bizweb.onCartRemoveClick = function(cart, variantId) {
            jQuery.each(cart, function(key, value) {
                if (key === 'items') {
                    jQuery.each(value, function(i, item) {
                        if (item.variant_id == variantId) {
                            $('.productid-' + variantId).remove();
                            location.reload();
                        }
                    });
                }
            });
            updateCartDesc(cart);
        }
        $(window).ready(function() {
            $.ajax({
                type: 'GET',
                url: '/cart.js',
                async: false,
                cache: false,
                dataType: 'json',
                success: function(cart) {
                    Bizweb.updateCartFromForm(cart, '.mini-products-list');
                    Bizweb.updateCartPopupForm(cart, '#popup-cart-desktop .tbody-popup');

                }
            });
        });
    </script>
    <div id="popup-cart" class="modal fade" role="dialog">
        <div id="popup-cart-desktop" class="clearfix">
            <div class="title-popup-cart">
                <i class="fa fa-check" aria-hidden="true"></i> Bạn đã thêm <span class="cart-popup-name"></span> vào giỏ
                hàng
            </div>
            <div class="title-quantity-popup">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i> Giỏ hàng của bạn (<span
                    class="cart-popup-count"></span> sản phẩm) <i class="fa fa-caret-right" aria-hidden="true"></i>
            </div>
            <div class="content-popup-cart">
                <div class="thead-popup">
                    <div style="width: 55%;" class="text-left">Sản phẩm</div>
                    <div style="width: 15%;" class="text-right">Đơn giá</div>
                    <div style="width: 15%;" class="text-center">Số lượng</div>
                    <div style="width: 15%;" class="text-right">Thành tiền</div>
                </div>
                <div class="tbody-popup">
                </div>
                <div class="tfoot-popup">
                    <div class="tfoot-popup-1 clearfix">
                        <div class="pull-left popup-ship">

                            <p>Giao hàng trên toàn quốc</p>
                        </div>
                        <div class="pull-right popup-total">
                            <p>Thành tiền: <span class="total-price"></span></p>
                        </div>
                    </div>
                    <div class="tfoot-popup-2 clearfix">
                        <a class="button btn-proceed-checkout" title="Tiến hành đặt hàng" href="cart.html"><span>Tiến
                                hành đặt hàng <i class="fa fa-long-arrow-right" aria-hidden="true"></i></span></a>
                        <a class="button btn-continue" title="Tiếp tục mua hàng"
                            onclick="$('#popup-cart').modal('hide');"><span><span><i class="fa fa-caret-left"
                                        aria-hidden="true"></i> Tiếp tục mua hàng</span></span></a>
                    </div>
                </div>
            </div>
            <a title="Close" class="quickview-close close-window" href="javascript:;"
                onclick="$('#popup-cart').modal('hide');"><i class="fa  fa-close"></i></a>
        </div>

    </div>
    <div id="myModal" class="modal fade" role="dialog">
    </div>
    <link rel="preload" as="script"
        href="{{ url('client/bizweb.dktcdn.net/100/299/077/themes/642224/assets/main6d1d.js?1705894518705') }}" />
    <script src="{{ url('client/bizweb.dktcdn.net/100/299/077/themes/642224/assets/main6d1d.js?1705894518705') }}"
        type="text/javascript"></script>

    <link href="{{ url('client/bizweb.dktcdn.net/100/299/077/themes/642224/assets/lightbox6d1d.css?1705894518705') }}"
        rel="stylesheet" type="text/css" media="all" />

    <script
        src="{{ url('client/bizweb.dktcdn.net/100/299/077/themes/642224/assets/jquery.elevatezoom308.min6d1d.js?1705894518705') }}"
        type="text/javascript"></script>

    <script
        src="{{ url('client/bizweb.dktcdn.net/100/299/077/themes/642224/assets/jquery.prettyphoto.min005e6d1d.js?1705894518705') }}"
        type="text/javascript"></script>
    <script
        src="{{ url('client/bizweb.dktcdn.net/100/299/077/themes/642224/assets/jquery.prettyphoto.init.min367a6d1d.js?1705894518705') }}"
        type="text/javascript"></script>



    <div class="backdrop__body-backdrop___1rvky"></div>
    <div class="c-menu--slide-left">
        <div class="la-nav-top-login">
            <div class="la-avatar-nav p-relative text-center">
                <a href="account/logina3b1.html">
                    <img class="img-responsive"
                        src="{{ url('client/bizweb.dktcdn.net/100/299/077/themes/642224/assets/av-none-user6d1d.png?1705894518705') }}"
                        alt="avatar">
                </a>
                <div class="la-hello-user-nav ng-scope">Xin chào</div>
                <img id="close-nav" class="c-menu__close"
                    src="{{ url('client/bizweb.dktcdn.net/100/299/077/themes/642224/assets/ic-close-menu6d1d.png?1705894518705') }}"
                    alt="close nav">
            </div>
            <div class="la-action-link-nav text-center">

                <a href="account/login.html" class="uppercase">ĐĂNG NHẬP</a>
                <a href="account/register.html" class="uppercase">ĐĂNG KÝ</a>

            </div>
        </div>
        <div class="la-scroll-fix-infor-user">
            <!--CATEGORY-->
            <div class="la-nav-menu-items">
                <div class="la-title-nav-items">Tất cả danh mục</div>
                <ul class="la-nav-list-items">


                    <li class="ng-scope">
                        <a href="index.html">Trang chủ</a>
                    </li>



                    <li class="ng-scope">
                        <a href="gioi-thieu.html">Giới thiệu</a>
                    </li>



                    <li class="ng-scope ng-has-child1">
                        <a href="tour-trong-nuoc.html">Tour trong nước <i class="fa fa-plus fa1"
                                aria-hidden="true"></i></a>
                        <ul class="ul-has-child1">


                            <li class="ng-scope ng-has-child2">
                                <a href="mien-trung.html">Miền Trung <i class="fa fa-plus fa2"
                                        aria-hidden="true"></i></a>
                                <ul class="ul-has-child2">

                                    <li class="ng-scope">
                                        <a href="du-lich-quang-binh.html">Du lịch Quảng Bình</a>
                                    </li>

                                    <li class="ng-scope">
                                        <a href="du-lich-hue.html">Du lịch Huế</a>
                                    </li>

                                    <li class="ng-scope">
                                        <a href="du-lich-da-nang.html">Du lịch Đà Nẵng</a>
                                    </li>

                                    <li class="ng-scope">
                                        <a href="du-lich-hoi-an.html">Du lịch Hội An</a>
                                    </li>

                                    <li class="ng-scope">
                                        <a href="du-lich-nha-trang.html">Du lịch Nha Trang</a>
                                    </li>

                                    <li class="ng-scope">
                                        <a href="du-lich-phan-thiet.html">Du lịch Phan Thiết</a>
                                    </li>

                                    <li class="ng-scope">
                                        <a href="du-lich-da-lat.html">Du lịch Đà Lạt</a>
                                    </li>

                                </ul>
                            </li>



                            <li class="ng-scope ng-has-child2">
                                <a href="mien-bac.html">Miền Bắc <i class="fa fa-plus fa2" aria-hidden="true"></i></a>
                                <ul class="ul-has-child2">

                                    <li class="ng-scope">
                                        <a href="du-lich-ha-noi.html">Du lịch Hà Nội</a>
                                    </li>

                                    <li class="ng-scope">
                                        <a href="du-lich-ha-long.html">Du lịch Hạ Long</a>
                                    </li>

                                    <li class="ng-scope">
                                        <a href="du-lich-sapa.html">Du lịch Sapa</a>
                                    </li>

                                    <li class="ng-scope">
                                        <a href="du-lich-ninh-binh.html">Du lịch Ninh Bình</a>
                                    </li>

                                    <li class="ng-scope">
                                        <a href="du-lich-hai-phong.html">Du lịch Hải Phòng</a>
                                    </li>

                                </ul>
                            </li>



                            <li class="ng-scope ng-has-child2">
                                <a href="mien-nam.html">Miền Nam <i class="fa fa-plus fa2" aria-hidden="true"></i></a>
                                <ul class="ul-has-child2">

                                    <li class="ng-scope">
                                        <a href="du-lich-phu-quoc.html">Du lịch Phú Quốc</a>
                                    </li>

                                    <li class="ng-scope">
                                        <a href="du-lich-con-dao.html">Du lịch Côn Đảo</a>
                                    </li>

                                    <li class="ng-scope">
                                        <a href="du-lich-can-tho.html">Du lịch Cần Thơ</a>
                                    </li>

                                    <li class="ng-scope">
                                        <a href="du-lich-vung-tau.html">Du lịch Vũng Tàu</a>
                                    </li>

                                    <li class="ng-scope">
                                        <a href="du-lich-ben-tre.html">Du lịch Bến Tre</a>
                                    </li>

                                    <li class="ng-scope">
                                        <a href="du-lich-dao-nam-du.html">Du lịch Đảo Nam Du</a>
                                    </li>

                                </ul>
                            </li>


                        </ul>
                    </li>



                    <li class="ng-scope ng-has-child1">
                        <a href="tour-nuoc-ngoai.html">Tour nước ngoài <i class="fa fa-plus fa1"
                                aria-hidden="true"></i></a>
                        <ul class="ul-has-child1">


                            <li class="ng-scope">
                                <a href="du-lich-chau-a.html">Du lịch Châu Á</a>
                            </li>



                            <li class="ng-scope">
                                <a href="du-lich-chau-au.html">Du lịch Châu Âu</a>
                            </li>



                            <li class="ng-scope">
                                <a href="du-lich-chau-uc.html">Du lịch Châu Úc</a>
                            </li>



                            <li class="ng-scope">
                                <a href="du-lich-chau-my.html">Du lịch Châu Mỹ</a>
                            </li>


                        </ul>
                    </li>



                    <li class="ng-scope">
                        <a href="dich-vu-tour.html">Dịch vụ tour</a>
                    </li>



                    <li class="ng-scope">
                        <a href="cam-nang-du-lich.html">Cẩm nang du lịch</a>
                    </li>



                    <li class="ng-scope">
                        <a href="lien-he.html">Liên hệ</a>
                    </li>


                </ul>
            </div>
            <div class="la-nav-slide-banner">

                <a href="#">
                    <img alt="Ant Du lịch"
                        src="{{ url('client/bizweb.dktcdn.net/100/299/077/themes/642224/assets/left-menu-banner-16d1d.png?1705894518705') }}" />
                </a>


            </div>
        </div>
    </div>

    <ul class="the-article-tools">

        <li class="btnZalo zalo-share-button">
            <a target="_blank" href="http://zalo.me/0982 362 509" title="Chat qua Zalo">
                <span class="ti-zalo"></span>
            </a>
            <span class="label">Chat qua Zalo</span>
        </li>


        <li class="btnFacebook">
            <a target="_blank" href="https://www.messenger.com/t/vemiendisan" title="Chat qua Messenger">
                <span class="ti-facebook"></span>
            </a>
            <span class="label">Chat qua Messenger</span>
        </li>


        <li class="btnphone">
            <button type="button" data-toggle="modal" data-target="#hotlineModal">
                <span class="fa fa-phone"></span>
            </button>
            <span class="label">Hotline đặt Tour</span>
        </li>

    </ul>
    <div class="modal fade" id="hotlineModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Hotline đặt Tour</h4>
                </div>
                <div class="modal-body">
                    <div class="on-content">Chúng tôi cam kết luôn nỗ lực đem đến những giá trị dịch vụ tốt nhất cho khách
                        hàng và đối tác để tiếp tục khẳng định vị trí hàng đầu của thương hiệu Ant Du lịch.</div>
                    <div class="on-sup-info">







                        <ul>
                            <li><strong>Ant Du lịch Hồ Chí Minh</strong></li>
                            <li>
                                <i class="fa fa-map-marker" aria-hidden="true"></i> 175 Lý Thường Kiệt, Phường 6, Quận Tân
                                Bình, TP. Hồ Chí Minh.
                            </li>
                            <li>
                                <i class="fa fa-phone" aria-hidden="true"></i> <a href="tel:0123456789">0123 456 789</a>
                            </li>
                            <li>
                                <i class="fa fa-envelope" aria-hidden="true"></i> <a
                                    href="mailto:antdulich@ant.com.vn">antdulich@ant.com.vn</a>
                            </li>
                        </ul>








                        <ul>
                            <li><strong>Ant Du lịch Huế</strong></li>
                            <li>
                                <i class="fa fa-map-marker" aria-hidden="true"></i> 175 Lý Thường Kiệt, Quận Phú Nhận, TP.
                                Huế.
                            </li>
                            <li>
                                <i class="fa fa-phone" aria-hidden="true"></i> <a href="tel:0123456789">0123 456 789</a>
                            </li>
                            <li>
                                <i class="fa fa-envelope" aria-hidden="true"></i> <a
                                    href="mailto:antdulich@ant.com.vn">antdulich@ant.com.vn</a>
                            </li>
                        </ul>








                        <ul>
                            <li><strong>Ant Du lịch Đà Nẵng</strong></li>
                            <li>
                                <i class="fa fa-map-marker" aria-hidden="true"></i> 20 Lý Thường Kiệt, Quận Hải Châu, TP.
                                Đà Nẵng.
                            </li>
                            <li>
                                <i class="fa fa-phone" aria-hidden="true"></i> <a href="tel:0123456789">0123 456 789</a>
                            </li>
                            <li>
                                <i class="fa fa-envelope" aria-hidden="true"></i> <a
                                    href="mailto:antdulich@ant.com.vn">antdulich@ant.com.vn</a>
                            </li>
                        </ul>


                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="popup-sapo">
        <div class="icon">
            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">
                <path
                    d="M224 0c-17.7 0-32 14.3-32 32V51.2C119 66 64 130.6 64 208v18.8c0 47-17.3 92.4-48.5 127.6l-7.4 8.3c-8.4 9.4-10.4 22.9-5.3 34.4S19.4 416 32 416H416c12.6 0 24-7.4 29.2-18.9s3.1-25-5.3-34.4l-7.4-8.3C401.3 319.2 384 273.9 384 226.8V208c0-77.4-55-142-128-156.8V32c0-17.7-14.3-32-32-32zm45.3 493.3c12-12 18.7-28.3 18.7-45.3H224 160c0 17 6.7 33.3 18.7 45.3s28.3 18.7 45.3 18.7s33.3-6.7 45.3-18.7z" />
            </svg>
        </div>
        <div class="content">
            <div class="title">Tích hợp sẵn các ứng dụng</div>
            <ul>
                <li>
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                        <path
                            d="M470.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 256 265.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160zm-352 160l160-160c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L210.7 256 73.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0z" />
                    </svg>
                    <a href="https://apps.sapo.vn/danh-gia-san-pham-v2" target="_blank" title="Đánh giá sản phẩm">Đánh
                        giá sản phẩm</a>
                </li>
                <li><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                        <path
                            d="M470.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 256 265.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160zm-352 160l160-160c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L210.7 256 73.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0z" />
                    </svg>
                    <a href="https://apps.sapo.vn/mua-x-tang-y-v2" target="_blank" title="Mua X tặng Y">Mua X tặng Y</a>
                </li>
                <li><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                        <path
                            d="M470.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 256 265.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160zm-352 160l160-160c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L210.7 256 73.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0z" />
                    </svg>
                    <a href="https://apps.sapo.vn/quan-ly-affiliate-v2" target="_blank" title="Ứng dụng Affiliate">Ứng
                        dụng Affiliate</a>
                </li>
                <li><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                        <path
                            d="M470.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 256 265.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160zm-352 160l160-160c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L210.7 256 73.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0z" />
                    </svg>
                    <a href="https://apps.sapo.vn/ae-da-ngon-ngu" target="_blank" title="Đa ngôn ngữ">Đa ngôn ngữ</a>
                </li>
                <li><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                        <path
                            d="M470.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 256 265.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160zm-352 160l160-160c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L210.7 256 73.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0z" />
                    </svg>
                    <a href="https://m.me/sapo.vn" target="_blank" title="Chatlive Facebook">Chatlive Facebook</a>
                </li>
            </ul>
            <div class="ghichu">Lưu ý với các ứng dụng trả phí bạn cần cài đặt và mua ứng dụng này trên App store Sapo để
                sử dụng ngay</div>
            <a href="javascript:;" title="Đóng" class="close-popup-sapo">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px"
                    y="0px" viewBox="0 0 512.001 512.001" style="enable-background:new 0 0 512.001 512.001;"
                    xml:space="preserve">
                    <g>
                        <g>
                            <path
                                d="M284.286,256.002L506.143,34.144c7.811-7.811,7.811-20.475,0-28.285c-7.811-7.81-20.475-7.811-28.285,0L256,227.717    L34.143,5.859c-7.811-7.811-20.475-7.811-28.285,0c-7.81,7.811-7.811,20.475,0,28.285l221.857,221.857L5.858,477.859    c-7.811,7.811-7.811,20.475,0,28.285c3.905,3.905,9.024,5.857,14.143,5.857c5.119,0,10.237-1.952,14.143-5.857L256,284.287    l221.857,221.857c3.905,3.905,9.024,5.857,14.143,5.857s10.237-1.952,14.143-5.857c7.811-7.811,7.811-20.475,0-28.285    L284.286,256.002z">
                            </path>
                        </g>
                    </g>
                </svg>
            </a>
        </div>
    </div>
    <script>
        $('.popup-sapo .icon').click(function() {
            $(".popup-sapo").toggleClass("active");
        });
        $('.close-popup-sapo').click(function() {
            $(".popup-sapo").toggleClass("active");
        });
    </script>
    <a class="wolf-chat-plugin" href="https://m.me/sapo.vn" target="_blank">
        <div style="margin-left: -2px; margin-right: 6px;">
            <div style="display: flex; align-items: center;"><svg width="24" height="24" viewBox="0 0 24 24"
                    fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M0.75 11.9125C0.75 5.6422 5.66254 1 12 1C18.3375 1 23.25 5.6422 23.25 11.9125C23.25 18.1828 18.3375 22.825 12 22.825C10.8617 22.825 9.76958 22.6746 8.74346 22.3925C8.544 22.3376 8.33188 22.3532 8.1426 22.4368L5.90964 23.4224C5.32554 23.6803 4.66618 23.2648 4.64661 22.6267L4.58535 20.6253C4.57781 20.3789 4.46689 20.1483 4.28312 19.9839C2.09415 18.0264 0.75 15.1923 0.75 11.9125ZM8.54913 9.86084L5.24444 15.1038C4.92731 15.6069 5.54578 16.1739 6.01957 15.8144L9.56934 13.1204C9.80947 12.9381 10.1413 12.9371 10.3824 13.118L13.0109 15.0893C13.7996 15.6809 14.9252 15.4732 15.451 14.6392L18.7556 9.39616C19.0727 8.893 18.4543 8.326 17.9805 8.68555L14.4307 11.3796C14.1906 11.5618 13.8587 11.5628 13.6176 11.3819L10.9892 9.41061C10.2005 8.81909 9.07479 9.02676 8.54913 9.86084Z"
                        fill="white"></path>
                </svg></div>
        </div>
        <div
            style="color: white; display: flex; font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Oxygen, Ubuntu, Cantarell, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, sans-serif; font-size: 17px; font-style: normal; font-weight: 600; line-height: 22px; user-select: none; white-space: nowrap;">
            Chat</div>
    </a>
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
@endsection
@section('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <script>
        $(document).ready(function() {
            var sync1 = $("#sync1");
            var sync2 = $("#sync2");

            // Khởi tạo carousel cho sync1 (carousel chính)
            sync1.owlCarousel({
                items: 1, // 1 ảnh mỗi lần hiển thị
                margin: 10,
                nav: true,
                dots: false,
                loop: false, // Tắt loop ở đây để tránh quay lại ảnh đầu tiên
                autoplay: false,
                responsiveRefreshRate: 200,
            });

            // Khởi tạo carousel cho sync2 (carousel thu nhỏ)
            sync2.owlCarousel({
                items: 5, // 5 ảnh thu nhỏ
                margin: 10,
                nav: true,
                dots: false,
                loop: false, // Tắt loop cho ảnh thu nhỏ để tránh ảnh đầu tiên
                autoplay: false,
                responsiveRefreshRate: 100,
            });

            // Đồng bộ hóa khi người dùng nhấn vào ảnh thu nhỏ (sync2)
            sync2.on("click", ".item", function(e) {
                e.preventDefault(); // Ngừng hành động mặc định
                var index = $(this).index(); // Lấy chỉ số của ảnh được nhấn
                sync1.trigger("to.owl.carousel", [index,
                    300
                ]); // Di chuyển carousel chính đến ảnh tương ứng
            });

            // Đồng bộ hóa lại khi carousel sync1 thay đổi
            sync1.on("changed.owl.carousel", function(event) {
                var index = event.item.index; // Lấy chỉ số của ảnh đang hiển thị trong sync1
                sync2.find(".owl-item").removeClass("active").eq(index).addClass(
                    "active"); // Đánh dấu ảnh thu nhỏ tương ứng
            });

            // Đảm bảo rằng ảnh thu nhỏ đầu tiên sẽ được làm nổi bật khi tải trang
            sync2.find(".item").eq(0).addClass("active");
        });
    </script>
    <script>
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

@endsection
