@extends('admin.layouts.app')

@section('style')
    <style>

    </style>
@endsection
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Danh Sách địa điểm</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('home-admin') }}">Trang quản trị</a></li>
                                <li class="breadcrumb-item active">Danh sách địa điểm</li>
                            </ol>
                        </div>
                    </div>

                    <div class="row g-3 mb-3 justify-content-sm-end justify-center">
                        <div class="col-auto">
                            <div class="d-flex justify-content-end">
                                <select id="status_id" name="status_id" class="form-select" aria-label="Lọc theo trạng thái"
                                    style="margin-top: 20px">
                                    <option value="">Lọc trạng thái</option>
                                    <option value="1">Chờ xác nhận</option>
                                    <option value="2">Đã xác nhận</option>
                                    <option value="3">Chưa hoàn thành</option>
                                    <option value="4">Đã Hoàn Thành</option>
                                    <option value="5">Đã Hủy</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-auto">
                            <div class="d-flex justify-content-end">
                                <select id="payment_method_id" name="payment_method_id" class="form-select"
                                    aria-label="Lọc theo trạng thái" style="margin-top: 20px">
                                    <option value="">Lọc thanh toán</option>
                                    <option value="1">Chưa thanh toán</option>
                                    <option value="2">Đã thanh toán</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-auto">
                            <form action="{{ route('trangthaitour.index') }}" method="GET">
                                <div class="d-flex gap-3 justify-content-sm-end">
                                    <div class="form-group">
                                        <label for="start_date">Từ ngày:</label>
                                        <input type="date" name="start_date" id="start_date"
                                            value="{{ request('start_date') }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="end_date">Đến ngày:</label>
                                        <input type="date" name="end_date" id="end_date"
                                            value="{{ request('end_date') }}" class="form-control">
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-4">Tìm kiếm</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-12">
                    <div class="card" id="coursesList">

                        <div class="card-body">
                            <div class="table-responsive table-card">
                                <table id="example" class="table table-striped" style="width:100%">
                                    <thead class="text-muted">
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Tài Khoản Đặt Tour</th>
                                            <th scope="col">Thông Tin Tour</th>
                                            <th scope="col">Người Đặt Tour</th>
                                            <th scope="col">Trạng Thái Thanh Toán</th>
                                            <th scope="col">Trạng Thái Tour</th>
                                            <th scope="col">Hành Động</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list form-check-all" id="payment-body">
                                        @foreach ($listTour as $index => $item)
                                            <tr>

                                                <td><a href="" class="text-reset">{{ $item->id }}</a></td>

                                                <td>{{ $item->booking->user->name ?? 'Ẩn Danh' }}</td>


                                                <td>{{ $item->booking->tour->name }}</td>
                                                <td>{{ $item->booking->name }}</td>
                                                {{-- <td class="{{ $item->payment_status_id == 1 ? 'text-danger' : 'text-success' }}">
                                                {{ $item->payment_status_id == 1 ? 'Chưa Thanh Toán' : 'Đã Thanh Toán' }}</td> --}}
                                                {{-- <td>{{ $item->name }}</td> --}}

                                                {{-- <td>{{ $item->name }}</td> --}}
                                                <td>
                                                    <form action="{{ route('trangthaitour.updateThanhToan', $item->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        <select name="payment_status_id" class="form-select w-75"
                                                            onchange="confirmSubmitThanhToan(this)"
                                                            data-default-value="{{ $item->payment_status_id }}">
                                                            @foreach ($trangThaiThanhToan as $key => $value)
                                                                <option value="{{ $key }}"
                                                                    {{ $key == $item->payment_status_id ? 'selected' : '' }}>
                                                                    {{ $value }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </form>

                                                </td>
                                                <td>
                                                    <form action="{{ route('trangthaitour.update', $item->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <select name="status_id" class="form-select w-75"
                                                            onchange="confirmSubmit(this)"
                                                            data-default-value="{{ $item->status_id }}">
                                                            @foreach ($trangThaiTour as $key => $value)
                                                                <option value="{{ $key }}"
                                                                    {{ $key == $item->status_id ? 'selected' : '' }}>
                                                                    {{ $value }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </form>
                                                </td>

                                                <td>

                                                    <ul class="d-flex gap-2 list-unstyled mb-0">
                                                        <li>
                                                            <a class="btn btn-subtle-primary btn-icon btn-sm view-categorytour"
                                                                data-id="{{ $item->id }}">
                                                                <i class="ph-eye"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('coupons.edit', $item->id) }}""
                                                                class="btn btn-subtle-success btn-icon btn-sm">
                                                                <i class="ri-edit-2-line"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="#deleteRecordModal{{ $item->id }}"
                                                                data-bs-toggle="modal"
                                                                class="btn btn-subtle-danger btn-icon btn-sm remove-item-btn"><i
                                                                    class="ph-trash"></i></a>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            <!-- Xóa User -->
                                            <div id="deleteRecordModal{{ $item->id }}" class="modal fade zoomIn"
                                                tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="btn-close"
                                                                id="deleteRecord-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body p-md-5">
                                                            <div class="text-center">
                                                                <div class="text-danger">
                                                                    <i class="bi bi-trash display-5"></i>
                                                                </div>
                                                                <div class="mt-4">
                                                                    <h4 class="mb-2">Xóa mục này ?</h4>
                                                                    <p class="text-muted mx-3 mb-0">Bạn có chắc chắn
                                                                        muốn
                                                                        xóa không?</p>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="d-flex gap-2 justify-content-center mt-4 pt-2 mb-2">
                                                                <form action="{{ route('coupons.destroy', $item->id) }}"
                                                                    method="POST" class="d-inline">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="button"
                                                                        class="btn w-sm btn-light btn-hover"
                                                                        data-bs-dismiss="modal">Đóng</button>
                                                                    <button type="submit"
                                                                        class="btn w-sm btn-danger btn-hover"
                                                                        id="delete-record">Vâng, Tôi chắc chắn!</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="noresult" style="display: none">
                                    <div class="text-center py-4">
                                        <i class="ph-magnifying-glass fs-1 text-primary"></i>
                                        <h5 class="mt-2">Sorry! No Result Found</h5>
                                        <p class="text-muted mb-0">We've searched more than 150+ Courses We did not find
                                            any Courses for you search.</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('style')
    <!--datatable css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css">
@endsection
@section('script')
    <!--datatable js-->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>
    <script>
        function confirmSubmit(selectElement) {
            console.log("Hàm confirmSubmit đã được gọi!"); // Dòng này kiểm tra sự kiện onchange
            var form = selectElement.form;
            var selectedOption = selectElement.options[selectElement.selectedIndex].text;
            var defaultValue = selectElement.getAttribute('data-default-value');

            // Sử dụng SweetAlert2 để hiển thị hộp thoại xác nhận
            Swal.fire({
                title: 'Xác nhận thay đổi trạng thái?',
                text: "Bạn có chắc chắn thay đổi trạng thái thành: " + selectedOption + " không?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Đồng ý',
                cancelButtonText: 'Hủy',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit(); // Nếu người dùng xác nhận, gửi form
                } else {
                    selectElement.value = defaultValue; // Nếu hủy, giữ lại giá trị mặc định
                }
            });
        }
    </script>
    <script>
        document.getElementById('filter-button').addEventListener('click', function() {
            const filterFormContainer = document.getElementById('filter-form-container');
            // Toggle hiển thị/ẩn
            if (filterFormContainer.style.display === 'none' || !filterFormContainer.style.display) {
                filterFormContainer.style.display = 'block';
            } else {
                filterFormContainer.style.display = 'none';
            }
        });
    </script>

    <script>
        function confirmSubmitThanhToan(selectElement) {
            console.log("Hàm confirmSubmit đã được gọi!"); // Dòng này kiểm tra sự kiện onchange
            var form = selectElement.form;
            var selectedOption = selectElement.options[selectElement.selectedIndex].text;
            var defaultValue = selectElement.getAttribute('data-default-value');
            if (confirm('Bạn có chắc chắn thay đổi trạng thái "' + selectedOption + '"không?')) {
                form.submit();
            } else {
                selectElement.value = defaultValue;
            }
        }
    </script>
    <script>
        $('#example').DataTable({
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
@section('script')
    <script>
        $(document).ready(function() {
            // thêm faq
            $('#addCouponsForm').on('submit', function(e) {
                e.preventDefault(); // Ngăn chặn submit mặc định của form

                // Xóa thông báo lỗi cũ
                $('#question-error').text('');
                $('#answer-error').text('');
                $('#status-error').text('');

                $.ajax({
                    url: "{{ route('trangthaitour.store') }}", // URL action của form
                    type: 'POST',
                    data: $(this).serialize(), // Lấy dữ liệu từ form và bao gồm CSRF token
                    success: function(response) {
                        // Xử lý khi request thành công (có thể đóng modal, load lại danh sách FAQ)
                        // $('#addFaq').modal('hide');
                        // alert('Câu hỏi đã được thêm thành công!');
                        window.location.reload();
                    },
                    error: function(xhr) {
                        // Xử lý khi request bị lỗi
                        if (xhr.status === 422) { // Lỗi xác thực
                            let errors = xhr.responseJSON.errors;
                            if (errors.question) {
                                $('#question-error').text(errors.question[0]);
                            }
                            if (errors.answer) {
                                $('#answer-error').text(errors.answer[0]);
                            }
                            if (errors.status_id) {
                                $('#status-error').text(errors.status_id[0]);
                            }
                        } else {
                            console.log("Có lỗi xảy ra:", xhr.responseText);
                        }
                    }
                });
            });

            // xóa faq

            $('.remove-item-btn').on('click', function() {
                // Lấy ID của item cần xóa từ thuộc tính data-id
                const itemId = $(this).data('id');
                const url = "{{ route('coupons.destroy', ':id') }}"; // Tạo URL với placeholder :id
                const deleteUrl = url.replace(':id', itemId); // Thay thế :id bằng itemId
                $('#deleteForm').attr('action', deleteUrl); // Cập nhật action của form xóa 
            });
        });
    </script>
    <script>
        function confirmSubmit(selectElement) {

            console.log("Hàm confirmSubmit đã được gọi!"); // Dòng này kiểm tra sự kiện onchange

            var form = selectElement.form;
            var selectedOption = selectElement.options[selectElement.selectedIndex].text;
            var defaultValue = selectElement.getAttribute('data-default-value');
            if (confirm('Bạn có chắc chắn thay đổi trạng thái đơn hàng"' + selectedOption + '"không?')) {
                form.submit();
            } else {
                selectElement.value = defaultValue;
            }
        }
    </script>
@endsection
