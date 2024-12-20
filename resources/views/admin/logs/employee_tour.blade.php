@extends('admin.layouts.app')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <h1>Thống kê nhân viên thay đổi tour</h1>

            <h2>Nhân viên thay đổi tour nhiều nhất</h2>
            @if ($topEmployee)
                <p><strong>{{ $topEmployee->employee_name }}</strong> với <strong>{{ $topEmployee->total_actions }}</strong>
                    hành động.</p>
            @else
                <p>Chưa có dữ liệu.</p>
            @endif

            <form method="GET" class="mb-4">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <label for="start_date" class="form-label">Ngày bắt đầu</label>
                        <input type="date" name="start_date" id="start_date" class="form-control"
                            value="{{ request('start_date') }}">
                    </div>
                    <div class="col-md-4">
                        <label for="end_date" class="form-label">Ngày kết thúc</label>
                        <input type="date" name="end_date" id="end_date" class="form-control"
                            value="{{ request('end_date') }}">
                    </div>
                    <div class="col-md-4 align-self-end">
                        <button type="submit" class="btn btn-primary w-100">Lọc</button>
                    </div>
                </div>
            </form>

            <h2>Chi tiết thay đổi</h2>
            <table id="statisticsTable" class="table table-striped">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Nhân viên</th>
                        <th>Tour</th>
                        <th>Số lần thay đổi</th>
                        <th>Ngày đầu tiên thay đổi</th>
                        <th>Ngày cuối cùng thay đổi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $stt = 1; ?>
                    @foreach ($employeeTourStats as $stat)
                        <tr>
                            <td>{{ $stt++ }}</td>
                            <td>{{ $stat->employee_name }}</td>
                            <td>{{ $stat->tour_name }}</td>
                            <td>{{ $stat->total_changes }}</td>
                            <td>{{ \Carbon\Carbon::parse($stat->first_change_date)->format('d/m/Y H:i') }}</td>
                            <td>{{ \Carbon\Carbon::parse($stat->last_change_date)->format('d/m/Y H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('script')
    <!--datatable js-->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>
    <script>
        $('#statisticsTable').DataTable({
            language: {
                "sEmptyTable": "Không có dữ liệu trong bảng",
                "sInfo": "Hiển thị _START_ đến _END_ trong tổng số _TOTAL_ mục",
                "sInfoEmpty": "Hiển thị 0 đến 0 trong tổng số 0 mục",
                "sInfoFiltered": "(đã lọc từ _MAX_ mục)",
                "sLengthMenu": "Hiển thị _MENU_ mục",
                "sLoadingRecords": "Đang tải...",
                "sProcessing": "Đang xử lý...",
                "sSearch": "Tìm kiếm:",
                "sZeroRecords": "Không tìm thấy kết quả nào",
                "oPaginate": {
                    "sFirst": "Đầu tiên",
                    "sLast": "Cuối cùng",
                    "sNext": "Tiếp theo",
                    "sPrevious": "Trước"
                },
                "oAria": {
                    "sSortAscending": ": kích hoạt để sắp xếp cột theo thứ tự tăng dần",
                    "sSortDescending": ": kích hoạt để sắp xếp cột theo thứ tự giảm dần"
                }
            }
        });
    </script>
@endsection
