{{-- <h5 class="card-title"><strong>Tài khoản đặt Tour:</strong> {{ $quanlytour->booking->user->name }}</h5> --}}
<p><strong>Khách Hàng :</strong> {{ $quanlytour->booking->name }}</p>
<p><strong>Thông tin Tour:</strong>{{ $quanlytour->booking->tour->name }}</p>
<p><strong>Số tiền :</strong> {{ $quanlytour->money }}</p>
<p><strong>Giao dịch :</strong> {{ $quanlytour->transcation }}</p>
<p><strong>Mã VNPAY :</strong> {{ $quanlytour->code_vnpay }}</p>
<p><strong>Mã ngân hàng :</strong> {{ $quanlytour->code_bank }}</p>
<p><strong>Thời gian :</strong> {{ $quanlytour->time }}</p>
<p><strong>Ghi chú :</strong> {{ $quanlytour->note }}</p>
<p><strong>Hình thức thanh toán:</strong> {{ $quanlytour->paymentMethod->name }}</p>
<p><strong>Trạng thái thanh toán :</strong> {{ $quanlytour->paymentStatus->name }}</p>
<p><strong>Trạng thái Tour :</strong> {{ $quanlytour->status->name }}</p>
<p><strong>Ngày tạo :</strong> {{ $quanlytour->created_at->format('d/m/Y H:i') }}</p>
<p><strong>Ngày cập nhật :</strong> {{ $quanlytour->updated_at->format('d/m/Y H:i') }}</p>
