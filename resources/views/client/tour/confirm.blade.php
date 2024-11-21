@extends('client.layouts.app')

@section('title', 'Chọn phương thức thanh toán')

@section('content')
<link rel="stylesheet" href="{{url('client/booking/confirm.css')}}">
<section class="payment-section">
    <div class="container">
        <div class="row">
            <!-- Left column: Payment Method -->
            <div class="col-md-6">
                <div class="payment-method-wrapper">
                    <h2 class="form-title">Chọn Phương Thức Thanh Toán</h2>
                    <form action="#" method="POST" class="payment-form">
                        <div class="payment-options">
                            <div class="payment-option">
                                <input type="radio" id="credit-card" name="payment_method" value="credit-card">
                                <label for="credit-card">
                                    <span>Thẻ tín dụng</span>
                                    <img src="https://timo.vn/wp-content/uploads/dang-ky-the-tin-dung-online-1.jpg" alt="Thẻ tín dụng" class="payment-img">
                                </label>
                                <div class="divider"></div>
                            </div>

                            <div class="payment-option">
                                <input type="radio" id="paypal" name="payment_method" value="paypal">
                                <label for="paypal">
                                    <span>PayPal</span>
                                    <img src="https://static.vecteezy.com/system/resources/previews/009/469/637/original/paypal-payment-icon-editorial-logo-free-vector.jpg" alt="PayPal" class="payment-img">
                                </label>
                                <div class="divider"></div>
                            </div>

                            <div class="payment-option">
                                <input type="radio" id="bank-transfer" name="payment_method" value="bank-transfer">
                                <label for="bank-transfer">
                                    <span>Chuyển khoản ngân hàng</span>
                                    <img src="https://admin.tamlyvietphap.vn/uploaded/Images/Original/2020/10/16/logo_vietcombank_1610091313.jpg" alt="Chuyển khoản ngân hàng" class="payment-img">
                                    <img src="https://scontent.iocvnpt.com/resources/portal/Images/CTO/superadminportal.cto/TienIch/NganHang/VietinBank/vietinbank_637018943312743351.jpg" alt="Chuyển khoản ngân hàng" class="payment-img">
                                </label>
                                <div class="divider"></div>
                            </div>

                            <div class="payment-option">
                                <input type="radio" id="cash-on-delivery" name="payment_method" value="cash-on-delivery">
                                <label for="cash-on-delivery">
                                    <span>Thanh toán khi nhận hàng</span>
                                    <img src="{{url('client/bizweb.dktcdn.net/100/299/077/themes/642224/assets/logo6d1d.png?1705894518705')}}" alt="Thanh toán khi nhận hàng" class="payment-img">
                                </label>
                                <div class="divider"></div>
                            </div>
                        </div>

                        <!-- Thêm nút thanh toán -->
                        <div class="form-group text-center">
                            <button type="submit" class="btn-submit-payment">Thanh Toán</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Right column: Personal and Tour Information -->
            <div class="col-md-6">
                <div class="info-wrapper">
                    <h3 class="form-title">Thông Tin Cá Nhân và Vé Đã Chọn</h3>
                    <div class="personal-info">
                        <p><strong>Họ và Tên:</strong> <span id="user-name">Nguyễn Văn A</span></p>
                        <p><strong>Email:</strong> <span id="user-email">nguyen@gmail.com</span></p>
                        <p><strong>Số điện thoại:</strong> <span id="user-phone">0123456789</span></p>
                    </div>
                    <div class="tour-info">
                        <p><strong>Tour:</strong> <span id="selected-tour">Tour 1</span></p>
                        <p><strong>Ngày khởi hành:</strong> <span id="selected-date">2024-12-01</span></p>
                        <p><strong>Số lượng:</strong> <span id="selected-quantity">2</span></p>
                        <p><strong>Giá vé:</strong> <span id="selected-price">1,500,000 VND</span></p>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>






@endsection

