@extends('client.layouts.app')

@section('content')
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <h1 class="text-center">Chi tiết đơn hàng</h1>
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong>Thông tin khách hàng</strong>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-6">
                        <p><strong>Tên khách hàng:</strong> {{ $payment->booking->name ?? 'N/A' }}</p>
                        <p><strong>Email:</strong> {{ $payment->booking->email ?? 'N/A' }}</p>
                        <p><strong>Số điện thoại:</strong> {{ $payment->booking->phone ?? 'N/A' }}</p>
                        <p><strong>Địa chỉ:</strong> {{ $payment->booking->address ?? 'N/A' }}</p>
                    </div>
                    <div class="col-sm-6">
                        <p><strong>Ngày đặt tour:</strong> {{ $payment->booking->date_booking ?? 'N/A' }}</p>
                        <p><strong>Số lượng người lớn:</strong> {{ $payment->booking->number_old ?? 'N/A' }}</p>
                        <p><strong>Số lượng trẻ em:</strong> {{ $payment->booking->number_children ?? 'N/A' }}</p>
                    </div>
                </div>
            </div>

        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <strong>Tour</strong>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên tour</th>
                        <th>Hình thức thanh toán</th>
                        <th>Trạng thái</th>
                        <th>Đơn hàng</th>
                        <th>Giá</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>1</td>
                        <td>{{ $payment->booking->tour->name ?? 'N/A' }}</td>
                        <td>
                            {{-- @if ($bookTour->pay)
                                <p></strong> {{ $bookTour->pay->paymentMethod->name ?? 'Không có' }}</p>
                            @else
                                <p>Check-in tại quầy</p>
                            @endif --}}
                            {{ $payment->paymentMethod->name ?? 'N/A' }}
                        </td>
                        <td>
                            {{-- @if ($bookTour->pay)
                                <p></strong>
                                    {{ $bookTour->pay->paymentStatus->name ?? 'Không có' }}</p>
                            @else
<p>Chưa thanh toán.</p>
                            @endif --}}
                            {{ $payment->paymentStatus->name ?? 'N/A' }}
                        </td>
                        <td>
                            {{  $payment->status->name ?? 'N/A'}}
                        </td>
                        <td>{{ number_format($payment->money, 0, ',', '.') }}VND</td>
                    </tr>

                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4" class="text-right">Tổng cộng:</th>
                        <th> {{ number_format($payment->money, 0, ',', '.') }}VND</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        @if ($payment->status_id == 1)
            <a href="javascript:void(0);" class="btn btn-warning mb-3" data-toggle="modal" data-target="#cancelOrderModal">Hủy đơn hàng</a>
        @elseif ($payment->status_id == 13)
            <div class="alert alert-danger text-center">
                <span>Đơn hàng đã bị hủy</span>
            </div>
        @endif
        <a href="{{ url('/') }}" class="btn btn-primary">Quay lại trang chủ</a>
        <div class="modal fade" id="cancelOrderModal" tabindex="-1" role="dialog" aria-labelledby="cancelOrderLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="cancelOrderLabel">Hủy đơn hàng</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('usser.cancelOrder', $payment->id) }}" method="POST">
                        @csrf
                        @method('PUT')  <!-- Sử dụng PUT để cập nhật thông tin -->
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="ly_do_huy">Lý do hủy đơn hàng</label>
                                <select name="ly_do_huy" id="ly_do_huy" class="form-control" required>
                                    <option value="" disabled selected>Chọn lý do</option>
                                    <option value="Thay đổi kế hoạch cá nhân">Thay đổi kế hoạch cá nhân</option>
                                    <option value="Không đủ tài chính để thanh toán">Không đủ tài chính để thanh toán</option>
                                    <option value="Tìm được giá tốt hơn ở nơi khác">Tìm được giá tốt hơn ở nơi khác</option>
<option value="Không hài lòng với thông tin về tour">Không hài lòng với thông tin về tour</option>
                                    <option value="Lịch trình không phù hợp với kế hoạch cá nhân">Lịch trình không phù hợp với kế hoạch cá nhân</option>
                                    <option value="Đã đặt nhầm tour hoặc sai thông tin">Đã đặt nhầm tour hoặc sai thông tin</option>
                                    <option value="Không nhận được sự hỗ trợ từ nhà cung cấp">Không nhận được sự hỗ trợ từ nhà cung cấp</option>
                                    <option value="Thay đổi quyết định sau khi tham khảo ý kiến gia đình/bạn bè">Thay đổi quyết định sau khi tham khảo ý kiến gia đình/bạn bè</option>
                                    <option value="Đã phát sinh các vấn đề sức khỏe hoặc cá nhân">Đã phát sinh các vấn đề sức khỏe hoặc cá nhân</option>
                                    <option value="Không còn nhu cầu sử dụng dịch vụ">Không còn nhu cầu sử dụng dịch vụ</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                            <button type="submit" class="btn btn-danger">Xác nhận hủy</button>
                        </div>
                    </form>                    
                </div>
            </div>
        </div>
    </div>
@endsection
