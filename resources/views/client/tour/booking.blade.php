@extends('client.layouts.app')

@section('title', 'Đặt Tour Du Lịch')

@section('content')
    <link rel="stylesheet" href="{{ url('client/booking/booking.css') }}">
    <section class="booking-section">
        <div class="container">
            <div class="row">
                <!-- Left column: Personal Information -->
                <div class="col-md-6">
                    <div class="booking-form-wrapper">
                        <h2 class="form-title">Đặt chỗ của tôi</h2>
                        <h5 class="form-title1">Điền thông tin và xem lại đặt chỗ</h5>
                        <form action="/booking" method="POST" class="booking-form" id="booking-form">
                            @csrf
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="form-group">
                                <label for="name">Họ và Tên</label>
                                <input type="text" id="name" name="name" placeholder="Nhập tên của bạn"
                                    value="{{ auth()->check() ? auth()->user()->name : old('name') }}">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" placeholder="Nhập email của bạn"
                                    value="{{ auth()->check() ? auth()->user()->email : old('email') }}">
                            </div>
                            <div class="form-group">
                                <label for="phone">Số điện thoại</label>
                                <input type="tel" id="phone" name="phone" placeholder="Nhập số điện thoại"
                                    value="{{ auth()->check() ? auth()->user()->phone : old('phone') }}">
                            </div>
                            <div class="form-group">
                                <label for="address">Địa chỉ</label>
                                <input type="text" id="address" name="address" placeholder="Nhập địa chỉ của bạn"
                                    value="{{ auth()->check() ? auth()->user()->address : old('address') }}">
                            </div>
                            <div class="form-group">
                                <label for="address">Mã giảm giá (Nếu có):</label>
                                <input type="text" id="coupon" name="coupon" />
                                <p id="coupon-message" style="color: red; font-weight: bold;"></p>
                            </div>

                            <div class="form-group">
                                <label for="total">Tổng tiền:</label>
                                <p style="color: blue; font-weight: bolder" id="total-price-display">0₫</p>
                                <input type="hidden" id="total-price" name="total_money">
                                <input type="hidden" name="tour_id" value="<?= $tour['id'] ?>">
                                <input type="hidden" id="tour-name" name="tour_name">
                                <input type="hidden" id="departure-date" name="start_date">
                                <input type="hidden" id="quantity" name="quantity">
                                <input type="hidden" id="price" name="price">
                                <input type="hidden" id="adults" name="number_old">
                                <input type="hidden" id="children" name="number_children">

                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn-submit">Tiếp tục</button>
                            </div>
                        </form>

                    </div>
                </div>

                <!-- Right column: Selected Tour Information -->
                <div class="col-md-6">
                    <div class="selected-tour-info">
                        <h3>Thông tin vé bạn đã chọn</h3>
                        <div class="tour-horizontal-layout">
                            <div class="tour-image">
                                <img src="{{ Storage::url($tour->image) }}" alt="Ảnh tour" id="tour-image">
                            </div>
                            <div class="tour-details">
                                <p><strong>Tour:</strong> <span id="selected-tour"></span></p>
                                <div class="highlight-info">
                                    <p><strong>Ngày khởi hành:</strong> <span id="selected-date"></span></p>
                                    <p><strong>Số lượng:</strong> <span id="selected-quantity"></span></p>
                                </div>
                                <p><strong>Giá vé:</strong> <span id="selected-price">1,500,000 VND</span></p>
                            </div>
                        </div>
                        <p>Để biết thêm chi tiết vé, <a href="#" style="color: blue">Vui lòng xem tại đây</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    
    $coupons = isset($coupons) ? $coupons : null;
    //  var_dump($coupons);
    //  dd($coupons);
    ?>
    <?php
    // echo '<pre>';
    // print_r($coupons->toArray());
    // echo '</pre>';
    ?>

    <script>
        document.addEventListener('DOMContentLoaded', function() {


            // Lấy thông tin từ sessionStorage
            const bookingInfo = JSON.parse(sessionStorage.getItem('selectedTourInfo'));
            const bookingInfo1 = JSON.parse(sessionStorage.getItem('tourBooking'));

            if (bookingInfo && bookingInfo1) {
                const adults = bookingInfo1.adults || 0;
                const children = bookingInfo1.children || 0;

                document.getElementById('selected-quantity').textContent =
                    `${adults} Người lớn, ${children} Trẻ em`;
                console.log(bookingInfo.startDate);

                // Hiển thị thông tin trong giao diện
                document.getElementById('selected-tour').textContent = bookingInfo.tourName || 'Chưa xác định';
                document.getElementById('selected-date').textContent = bookingInfo.startDate || 'Chưa xác định';
                document.getElementById('selected-price').textContent = bookingInfo.totalPrice ?
                    bookingInfo.totalPrice.toLocaleString("vi-VN") + "₫" :
                    '0 VND';
                document.getElementById('total-price-display').textContent = bookingInfo.totalPrice ?
                    bookingInfo.totalPrice.toLocaleString("vi-VN") + "₫" :
                    '0 VND';

                // Gán giá trị vào các trường ẩn trong form
                document.getElementById('tour-name').value = bookingInfo.tourName || '';
                document.getElementById('departure-date').value = bookingInfo.startDate || '';
                document.getElementById('quantity').value = `${adults}-${children}` || '';
                document.getElementById('price').value = bookingInfo.totalPrice || '';
                document.getElementById('total-price').value = bookingInfo.totalPrice || '';

                // Gán số khách vào input ẩn
                document.getElementById('adults').value = adults;
                document.getElementById('children').value = children;

                // Cập nhật tổng tiền vào trường hiển thị tổng
                const totalPrice = bookingInfo.totalPrice || 0;

                //document.getElementById("totalPriceDisplay").textContent = totalPrice.toLocaleString("vi-VN") + "₫";

                //document.getElementById("totalPriceHidden").value = totalPrice;



            } else {
                alert('Không có thông tin đặt tour. Vui lòng quay lại trang trước.');
                window.location.href = '/';
            }


            const coupons = <?php echo json_encode($coupons); ?>;
            console.log("Danh sách:", coupons);

            const couponInput = document.getElementById('coupon');
            const totalPriceDisplay = document.getElementById('total-price-display');
            const totalPriceHidden = document.getElementById('total-price');
            const couponMessage = document.getElementById('coupon-message');

            const originalPrice = parseFloat(totalPriceHidden.value) || 0; // Giá cũ lấy từ input ẩn

            couponInput.addEventListener('input', function() {
                const enteredCode = couponInput.value.trim();

                if (coupons && coupons.length > 0) {
                    console.log("Entered code:", enteredCode);
                    console.log("Coupons:", coupons);

                    // Duyệt qua mảng coupons và kiểm tra mã
                    const matchedCoupon = coupons.find(coupon =>
                        coupon.code === enteredCode);

                    if (matchedCoupon) {
                        const discountedPrice = (originalPrice * (100 - matchedCoupon.percentage_price)) /
                            100;

                        // Cập nhật giao diện: Giá cũ bị gạch và mờ đi, giá mới rõ ràng
                        totalPriceDisplay.innerHTML = `
                <span style="text-decoration: line-through; opacity: 0.6;">
                    ${originalPrice.toLocaleString('vi-VN')}₫
                </span>
                <span style="color: #ff4d4d; font-weight: bold;">
                    ${discountedPrice.toLocaleString('vi-VN')}₫
                </span>
                <br>
                <span style="color: green;">
                    Giảm giá: ${matchedCoupon.percentage_price}%.
                </span>
            `;
                        totalPriceHidden.value = discountedPrice; // Cập nhật giá trị mới vào input ẩn
                        couponMessage.textContent = "Áp dụng mã giảm giá thành công!";
                        couponMessage.style.color = "green";
                    } else if (enteredCode === "") {
                        couponMessage.textContent = ""; // Xóa thông báo nếu xóa mã
                        totalPriceDisplay.innerHTML = `
                <span>${originalPrice.toLocaleString('vi-VN')}₫</span>
            `; // Hiện giá cũ
                    } else {
                        // Nếu mã không khớp
                        couponMessage.textContent = "Sai mã giảm giá hoặc mã hết hạn. Vui lòng thử lại!";
                        couponMessage.style.color = "red";
                        totalPriceDisplay.innerHTML = `
                <span>${originalPrice.toLocaleString('vi-VN')}₫</span>
            `; // Hiện giá cũ
                        totalPriceHidden.value = originalPrice; // Đặt lại giá trị gốc
                    }
                } else {
                    couponMessage.textContent = "Tour này không có mã giảm!!!";
                        couponMessage.style.color = "red";
                }
            });

        });
    </script>

@endsection
