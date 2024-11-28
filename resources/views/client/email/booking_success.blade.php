<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation</title>
</head>
<body>
    <h1>Cảm ơn bạn đã tin tưởng Garnet{{ $data['user_name'] }}!</h1>
    <p>Dưới đây là thông tin đặt tour của bạn:</p>

   
        <ul>
            {{-- <li><strong>Tour Name:</strong> {{ $booking['tour_name'] }}</li> --}}
            <li><strong>Ngày:</strong> {{ $data['time'] }}</li>
            {{-- <li><strong>Number of Guests:</strong> {{ $data['guests'] }}</li> --}}
            <li><strong>Tổng tiền:</strong> {{ $data['money'] }}</li>
        </ul>
    

    <p><strong>Chi tiết thanh toán:</strong></p>
    <ul>
        <li><strong>Amount Paid:</strong> {{ $data['money'] }}</li>
        <li><strong>Transaction ID:</strong> {{ $data['transaction'] }}</li>
        <li><strong>Payment Method:</strong> {{ $data['payment_method_id'] }}</li>
        <li><strong>Bank Code:</strong> {{ $data['code_bank'] }}</li>
        <li><strong>VNPAY Code:</strong> {{ $data['code_vnpay'] }}</li>
        <li><strong>Status:</strong> {{ $data['status_id'] }}</li>
        <li><strong>Payment Time:</strong> {{ $data['time'] }}</li>
    </ul>

    @if (!empty($data['note']))
        <p><strong>Note:</strong> {{ $data['note'] }}</p>
    @endif

    <p>Thank you for choosing our service!</p>
</body>
</html>
