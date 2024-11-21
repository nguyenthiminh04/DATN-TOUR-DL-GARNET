@extends('client.layouts.app')

@section('title', 'Thanh Toán Thành Công')

@section('content')
<link rel="stylesheet" href="{{ url('client/booking/confirm.css') }}">
<section class="payment-section">
    <div class="container">
        <div class="row">
            <!-- Left column: Payment Success Message -->
            <div class="col-md-6">
                <div class="payment-success-wrapper">
                    <h2 class="form-title">Thanh Toán Thành Công</h2>
                    <div class="payment-status">
                        <p><strong>Phương thức thanh toán:</strong> <span>{{ $payment->payment_method }}</span></p>
                        <p><strong>Mã giao dịch:</strong> <span>{{ $payment->transaction }}</span></p>
                        <p><strong>Trạng thái thanh toán:</strong> <span>{{ $payment->trang_thai }}</span></p>
                        <p><strong>Ngày thanh toán:</strong> <span>{{ $payment->time }}</span></p>
                        <p><strong>Số tiền thanh toán:</strong> <span>{{ number_format($payment->money, 0, ',', '.') }} VND</span></p>
                    </div>
                </div>
            </div>

            <!-- Right column: Personal and Tour Information -->
            <div class="col-md-6">
                <div class="info-wrapper">
                    <h3 class="form-title">Thông Tin Cá Nhân và Vé Đã Chọn</h3>
                    <div class="personal-info">
                        <p><strong>Họ và Tên:</strong> <span id="user-name">{{ $booking->name }}</span></p>
                        <p><strong>Email:</strong> <span id="user-email">{{ $booking->email }}</span></p>
                        <p><strong>Số điện thoại:</strong> <span id="user-phone">{{ $booking->phone }}</span></p>
                    </div>
                    <div class="tour-info">
                        <p><strong>Tour:</strong> <span id="selected-tour">{{ $booking->tour_name }}</span></p>
                        <p><strong>Ngày khởi hành:</strong> <span id="selected-date">{{ $booking->start_date }}</span></p>
                        <p><strong>Số lượng:</strong> <span id="selected-quantity">{{ $booking->number_old + $booking->number_children }}</span></p>
                        <p><strong>Giá vé:</strong> <span id="selected-price">{{ number_format($booking->total_money, 0, ',', '.') }} VND</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
