@extends('admin.layouts.app')
@section('style')
    {{-- <!--datatable css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"> --}}
    <!-- DataTables -->
    {{-- <link rel="stylesheet" href="{{ asset('admin/assets/css/dataTables.css') }}" /> --}}
@endsection
@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Danh sách hướng dẫn viên đã gán</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('home-admin') }}">Trang quản trị</a></li>
                                <li class="breadcrumb-item active">Danh sách hướng dẫn viên đã gán</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row g-4 mb-3">
                        <div class="col-sm-auto">
                            <a href="{{ route('tour-guides.create') }}" class="btn btn-secondary">
                                <i class="bi bi-plus-circle align-baseline me-1"></i> Gán hướng dẫn viên
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card" id="coursesList">
                        {{-- nút thêm faq --}}

                        {{-- end nút thêm faq --}}
                        <div class="card-body">
                            <div class="table-responsive table-card">
                                <table id="tourguide" class="table table-striped" style="width:100%">
                                    <thead class="text-muted">
                                        <tr>
                                            <th>ID</th>
                                            <th>Tên tour</th>
                                            <th>Tên hướng dẫn viên</th>
                                            <th>Ngày đi</th>
                                            <th>Ngày gán</th>
                                            <th>Ngày cập nhật</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tourguide">
                                        @foreach ($tour_guide as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->tour->name ?? 'N/A' }}</td>
                                                <td>{{ $item->user->name ?? 'N/A' }}</td>
                                                <td>{{ \Carbon\Carbon::parse($item->assigned_at)->format('d/m/Y H:i') ?? 'N/A' }}</td>
                                                <td>{{ $item->created_at->format('d/m/Y H:i') }}</td>
                                                <td>{{ $item->updated_at->format('d/m/Y H:i') }}</td>
                                                <td>
                                                    <a href="{{ route('tour-guides.edit', $item) }}" class="btn btn-sm btn-primary">Sửa</a>
                                                    <button id="deleteItem" class="btn btn-sm btn-danger deleteItem" data-id="{{ $item->id }}">Xóa</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <!--datatable js-->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>
    <script>
        $('#tourguide').DataTable({
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
        $('#tourguide').on('click', '#deleteItem', function() {
            let id = $(this).data('id');
            Swal.fire({
                title: 'Bạn có chắc muốn xóa?',
                text: "Bạn sẽ không thể hoàn tác sau khi xóa!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Xác nhận',
                cancelButtonText: 'Hủy'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `{{ route('tour-guides.destroy', ':id') }}`.replace(':id', id),
                        method: "DELETE",
                        dataType: "json",
                        data: {
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(res) {
                            if (res.status) {
                                // Reload table or remove the deleted row dynamically
                                $(`#tourguide tr:has(button[data-id="${id}"])`).remove();
                                Swal.fire('Xóa thành công!', '', 'success');
                            } else {
                                Swal.fire(res.message || 'Xóa thất bại!', '', 'error');
                            }
                        },
                        error: function(xhr) {
                            console.error('Lỗi AJAX:', xhr.responseText);
                            Swal.fire('Có lỗi xảy ra!', xhr.responseJSON?.message ||
                                'Vui lòng thử lại.', 'error');
                        }
                    });
                }
            });
        });
    </script>
@endsection
