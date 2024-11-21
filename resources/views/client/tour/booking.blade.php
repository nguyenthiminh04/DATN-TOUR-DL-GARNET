@extends('client.layouts.app')

@section('title', 'Đặt Tour Du Lịch')

@section('content')
<link rel="stylesheet" href="{{url('client/booking/booking.css')}}">
<section class="booking-section">
    <div class="container">
        <div class="row">
            <!-- Left column: Personal Information -->
            <div class="col-md-6">
                <div class="booking-form-wrapper">
                    <h2 class="form-title">Đặt chỗ của tôi</h2>
                    <h5 class="form-title1"> Điền thông tin và xem lại đặt chỗ</h5>
                    <form action="#" method="POST" class="booking-form">
                        <div class="form-group">
                            <label for="name">Họ và Tên</label>
                            <input type="text" id="name" name="name" placeholder="Nhập tên của bạn" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" placeholder="Nhập email của bạn" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Số điện thoại</label>
                            <input type="tel" id="phone" name="phone" placeholder="Nhập số điện thoại" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Tổng tiền:</label>
                            <p style="color: blue;font-weight: bolder"><?=number_format(9000000, 0, '', '.')?>đ</p>
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
                    <!-- Bố trí ngang: ảnh và thông tin tour -->
                    <div class="tour-horizontal-layout">
                        <!-- Ảnh -->
                        <div class="tour-image">
                            <img src="https://via.placeholder.com/120" alt="Ảnh tour" id="tour-image">
                        </div>
                        <!-- Thông tin -->
                        <div class="tour-details">
                            <p><strong>Tour:</strong> <span id="selected-tour">Tour 1</span></p>
                            <!-- Vùng ngày khởi hành và số lượng -->
                            <div class="highlight-info">
                                <p><strong>Ngày khởi hành:</strong> <span id="selected-date">2024-12-01</span></p>
                                <p><strong>Số lượng:</strong> <span id="selected-quantity">2</span></p>
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

@endsection

