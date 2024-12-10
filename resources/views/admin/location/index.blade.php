@extends('admin.layouts.app')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
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
                    <div class="row g-4 mb-3">
                        <div class="col-sm-auto">
                            <a href="{{ route('location.create') }}" class="btn btn-secondary"><i
                                    class="bi bi-plus-circle align-baseline me-1"></i> Thêm địa điểm</a>
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
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Ảnh</th>
                                            <th>Mô tả</th>
                                            <th scope="col">Trạng thái</th>
                                            <th scope="col">Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list form-check-all">
                                        @foreach ($listLocation as $index => $item)
                                            <tr>
                                                <td><a href="" class="text-reset">{{ $item->id }}</a></td>
                                                <td>{{ $item->name }}</td>
                                                <td>
                                                    <img src="{{ Storage::url($item->image) }}" alt=""
                                                        width="30px">
                                                </td>
                                                <td>{{ $item->description }}</td>
                                                <td>
                                                    <button type="button" style="width: 100px;"
                                                        class="btn btn-toggle-status {{ $item->status == 1 ? 'btn-success' : 'btn-danger' }}"
                                                        data-id="{{ $item->id }}"
                                                        onclick="toggleStatus({{ $item->id }})">
                                                        {{ $item->status == 1 ? 'Hiện' : 'Ẩn' }}
                                                    </button>
                                                </td>
                                                <td>
                                                    <ul class="d-flex gap-2 list-unstyled mb-0">
                                                        <li>
                                                            <a class="btn btn-subtle-primary btn-icon btn-sm view-location"
                                                                data-id="{{ $item->id }}">
                                                                <i class="ph-eye"></i>
                                                            </a>
                                                        </li>
                                                        <li>

                                                            <a href="{{ route('location.edit', $item->id) }}"
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

                                            <div id="deleteRecordModal{{ $item->id }}" class="modal fade zoomIn"
                                                tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="btn-close" id="deleteRecord-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body p-md-5">
                                                            <div class="text-center">
                                                                <div class="text-danger">
                                                                    <i class="bi bi-trash display-5"></i>
                                                                </div>
                                                                <div class="mt-4">
                                                                    <h4 class="mb-2">Xóa địa điểm này?</h4>
                                                                    <p class="text-muted mx-3 mb-0">Bạn có chắc chắn muốn
                                                                        xóa không?</p>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex gap-2 justify-content-center mt-4 pt-2 mb-2">
                                                                <form action="{{ route('location.destroy', $item->id) }}"
                                                                    method="POST" class="d-inline">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="button"
                                                                        class="btn w-sm btn-light btn-hover"
                                                                        data-bs-dismiss="modal">Đóng</button>
                                                                    <button type="submit"
                                                                        class="btn w-sm btn-danger btn-hover"
                                                                        id="delete-record">Vâng, Tôi chắc chắn muốn
                                                                        xóa!</button>
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
    <!-- Modal để hiển thị chi tiết Location -->
    <div class="modal fade" id="locationDetailModal" tabindex="-1" aria-labelledby="locationDetailModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="locationDetailModalLabel">Chi Tiết Địa Điểm</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="locationDetailContent">
                    <!-- Nội dung chi tiết địa điểm sẽ được tải ở đây -->
                </div>
            </div>
        </div>
    </div>
@endsection
@section('style')
    <!--datatable css-->
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css">
@endsection
@section('style-libs')
    <!--datatable css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/dataTables.css') }}" />
@endsection
@section('script')
    <!--datatable js-->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>
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


        function toggleStatus(locationId) {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            $.ajax({
                url: `/admin/location/status/${locationId}`,
                method: 'POST',
                data: {
                    _token: csrfToken // Chỉ cần truyền CSRF token trong data
                },
                headers: {
                    'X-CSRF-TOKEN': csrfToken // CSRF token cho header
                },
                success: function(response) {
                    if (response.success) {
                        const button = $(`button[data-id="${locationId}"]`);
                        if (response.status == 1) {
                            button.removeClass('btn-danger').addClass('btn-success');
                            button.text('Hiện');
                        } else {
                            button.removeClass('btn-success').addClass('btn-danger');
                            button.text('Ẩn');
                        }

                        Swal.fire({
                            icon: 'success',
                            title: 'Thành công!',
                            text: 'Đã được cập nhật thành công!',
                            showConfirmButton: true,
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Lỗi!',
                            text: 'Không tìm thấy bình luận!',
                            showConfirmButton: true,
                        });
                    }
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Lỗi!',
                        text: 'Đã xảy ra lỗi khi cập nhật trạng thái: ' + error, // Hiển thị lỗi nếu có
                        showConfirmButton: true,
                    });
                    console.error(xhr.responseText || error); // In ra lỗi để debug
                }
            });
        }

        $(document).ready(function() {
            // Sự kiện nhấn vào biểu tượng con mắt
            $('.view-location').on('click', function(e) {
                e.preventDefault();

                const locationId = $(this).data('id'); // Lấy ID của location

                $.ajax({
                    url: '/admin/location/' +
                        locationId, // Đảm bảo URL này đúng với route trong web.php
                    type: 'GET',
                    success: function(response) {
                        // Hiển thị chi tiết location trong modal
                        $('#locationDetailContent').html(response);
                        $('#locationDetailModal').modal('show'); // Mở modal
                    },
                    error: function(xhr, status, error) {
                        alert('Có lỗi xảy ra khi tải chi tiết địa điểm!');
                    }
                });
            });
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
                    url: "{{ route('coupons.store') }}", // URL action của form
                    type: 'POST',
                    data: $(this).serialize(), // Lấy dữ liệu từ form và bao gồm CSRF token
                    success: function(response) {
                        // Xử lý khi request thành công (có thể đóng modal, load lại danh sách FAQ)
                        // $('#addFaq').modal('hide');
                        // alert('địa điểm đã được thêm thành công!');
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
@endsection
