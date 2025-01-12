@extends('admin.layouts.app')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Danh Sách Hướng Dẫn Viên</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('home-admin') }}">Trang quản trị</a></li>
                                <li class="breadcrumb-item active">Danh sách hướng dẫn viên </li>
                            </ol>
                        </div>
                    </div>
                    <div class="row g-4 mb-3">
                        <div class="col-sm-auto">
                            <div>
                                <a href="{{ route('guide.create') }}" class="btn btn-secondary"><i
                                        class="bi bi-plus-circle align-baseline me-1"></i> Thêm hướng dẫn viên</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card" id="coursesList">
                        <div class="card-body">
                            <div class="table-responsive table-card">
                                <table id="example" class="table table-striped" style="width:100%;">
                                    <thead class="text-muted">
                                        <tr>
                                            <th>#</th>
                                            <th>Họ tên</th>
                                            <th>Email</th>
                                            <th>Số điện thoại</th>
                                            <th>Địa chỉ</th>
                                            <th>Kinh nghiệm</th>
                                            <th>Kỹ năng</th>
                                            <th scope="col">Trạng thái</th>
                                            <th scope="col" hidden>Hành động </th>
                                        </tr>
                                    </thead>
                                    <tbody class="list form-check-all" id="category-tours-body">
                                        @foreach ($activeGuides as $k => $activeGuide)
                                                <tr>
                                                    <td><a href="" class="text-reset">{{ $activeGuide->id }}</a></td>
                                                    <td>{{ $activeGuide->name }}</td>
                                                    <td>{{ $activeGuide->email }}</td>
                                                    <td>
                                                        @if (!empty($activeGuide->phone_number))
                                                            {{ $activeGuide->phone_number }}
                                                        @else
                                                            Không có
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if (!empty($activeGuide->address))
                                                            {{ $activeGuide->address }}
                                                        @else
                                                            Không có
                                                        @endif
                                                    </td>
                                                    <td>{{ $activeGuide->experience }}</td>
                                                    <td>
                                                        @if (!empty($activeGuide->skills))
                                                            {{ $activeGuide->skills }}
                                                        @else
                                                            Không có
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <button type="button" style="width: 100px;"
                                                            class="btn btn-toggle-status {{ $activeGuide->status == 'active' ? 'btn-success' : 'btn-danger' }}"
                                                            data-id="{{ $activeGuide->id }}"
                                                            onclick="toggleStatus({{ $activeGuide->id }})">
                                                            {{ $activeGuide->status == 'active' ? 'Hoạt động' : 'Dừng' }}
                                                        </button>
                                                    </td>
                                                    <td>
                                                        <ul class="d-flex gap-2 list-unstyled mb-0">

                                                            <li>
                                                        <a href="{{ route('guide.edit', $activeGuide->id) }}"
                                                            class="btn btn-subtle-success btn-icon btn-sm">
                                                            <i class="ri-edit-2-line"></i></a>
                                                    </li>
                                                            <li>
                                                                <a class="btn btn-subtle-primary btn-icon btn-sm view-guide"
                                                            data-id="{{ $activeGuide->id }}">
                                                            <i class="ph-eye"></i>
                                                        </a>
                                                    </li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                        @endforeach
                                    </tbody><!-- end tbody -->
                                </table><!-- end table -->
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
                    </div><!--end card-->
                </div><!--end col-->
            </div><!--end row-->
        </div>
        <!-- container-fluid -->
    </div>
    <div class="modal fade" id="guideDetailModal" tabindex="-1" aria-labelledby="guideDetailModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="guideDetailModalLabel">Chi Tiết Hướng dẫn Viên</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="guideDetailContent">
                    <!-- Nội dung chi tiết địa điểm sẽ được tải ở đây -->
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

            function toggleStatus(userId) {
                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                Swal.fire({
                    title: 'Bạn có chắc chắn muốn thay đổi trạng thái của người dùng này?',
                    // text: 'Trạng thái sẽ được cập nhật!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Có, thay đổi',
                    cancelButtonText: 'Hủy',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {

                        $.ajax({
                            url: `/admin/guide/tatus/${userId}`,
                            method: 'POST',
                            data: {
                                _token: csrfToken
                            },
                            headers: {
                                'X-CSRF-TOKEN': csrfToken
                            },
                            success: function(response) {
                                if (response.success) {
                                    const button = $(`button[data-id="${userId}"]`);
                                    if (response.status == 'active') {
                                        button.removeClass('btn-danger').addClass('btn-success');
                                        button.text('Hoạt động');
                                    } else {
                                        button.removeClass('btn-success').addClass('btn-danger');
                                        button.text('Dừng');
                                    }

                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Thành công!',
                                        text: 'Trạng thái cập nhật thành công!',
                                        showConfirmButton: false,
                                        timer: 1500,
                                        timerProgressBar: true,
                                    });
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Lỗi!',
                                        text: response.message || 'Đã xảy ra lỗi không xác định.',
                                        showConfirmButton: true,
                                    });
                                }
                            },
                            error: function(xhr) {
                                let errorMessage = 'Đã xảy ra lỗi khi cập nhật trạng thái.';
                                if (xhr.status === 403 && xhr.responseJSON && xhr.responseJSON.message) {
                                    errorMessage = xhr.responseJSON.message;
                                }

                                Swal.fire({
                                    icon: 'error',
                                    title: 'Lỗi!',
                                    text: errorMessage,
                                    showConfirmButton: true,
                                });

                                console.error(xhr.responseJSON || xhr.responseText);
                            }
                        });
                    }
                });
            }

            $(document).ready(function() {
            // Sự kiện nhấn vào biểu tượng con mắt
            $('.view-guide').on('click', function(e) {
                e.preventDefault();

                const guideId = $(this).data('id');

                $.ajax({
                    url: '/admin/guide/'+guideId,
                    type: 'GET',
                    success: function(response) {
                        // Hiển thị chi tiết categorytour trong modal
                        $('#guideDetailContent').html(response);
                        $('#guideDetailModal').modal('show'); // Mở modal
                    },
                    error: function(xhr, status, error) {
                        alert('Có lỗi xảy ra khi tải chi tiết địa điểm!');
                    }
                });
            });
        });
        </script>
    @endsection
