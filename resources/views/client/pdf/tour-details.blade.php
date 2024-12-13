<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin chi tiết tour</title>
</head>
<body>
    <h1>Thông tin chi tiết tour</h1>
    <p><strong>Tên khách hàng:</strong> {{ $customer_name }}</p>
    <p><strong>Tour:</strong> {{ $name_tour }}</p>
    <p><strong>Số Tiền:</strong> {{ $money }}</p>
    <p><strong>Ngày khởi hành:</strong> {{ $start_date }}</p>
    <p><strong>Trạng thái thanh toán:</strong> {{ $payment_status }}</p>
    <p><strong>Hình thức thanh toán:</strong> {{ $payment_method }}</p>
    {{-- <p><strong>Địa điểm:</strong> {{ $location }}</p> --}}
    {{-- <p><strong>Giá:</strong> {{ number_format($price, 0, ',', '.') }} VNĐ</p> --}}
</body>
</html>
