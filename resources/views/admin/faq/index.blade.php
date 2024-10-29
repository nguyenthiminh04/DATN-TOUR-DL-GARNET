@extends('admin.layouts.app')


@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Danh Sách Câu Hỏi</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('home-admin') }}">Trang quản trị</a></li>
                                <li class="breadcrumb-item active">Danh sách câu hỏi</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card" id="coursesList">
                        {{-- nút thêm faq --}}
                        <a href="#addFaq" data-bs-toggle="modal" class="btn btn-secondary col-2"><i
                                class="bi bi-plus-circle align-baseline me-1"></i> Thêm câu hỏi</a>
                        {{-- end nút thêm faq --}}
                        <div class="card-body">
                            <div class="table-responsive table-card">
                                <table id="example" class="table table-striped" style="width:100%">
                                    <thead class="text-muted">
                                        <tr>

                                            <th>ID</th>

                                            <th>Câu hỏi</th>

                                            <th>Câu trả lời</th>

                                            <th>Ngày tạo</th>

                                            <th>Ngày cập nhật</th>

                                            <th>Trạng thái</th>

                                            <th scope="col">Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list form-check-all">
                                        @foreach ($data as $item)
                                            <tr>


                                                <td><a href="" class="text-reset">{{ $item->id }}</a></td>

                                                <td>{{ $item->question }}</td>
                                                <td>{{ $item->answer }}</td>
                                                <td>{{ $item->created_at }}</td>
                                                <td>{{ $item->updated_at }}</td>

                                                <td class="{{ $item->status_id == 1 ? 'text-success' : 'text-danger' }}">
                                                    {{ $item->status->status_name }}</td>
                                                <td>
                                                    <ul class="d-flex gap-2 list-unstyled mb-0">
                                                        <li>
                                                            <a href="apps-learning-overview.html"
                                                                class="btn btn-subtle-primary btn-icon btn-sm "><i
                                                                    class="ph-eye"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="#addCourse{{ $item->id }}" data-bs-toggle="modal"
                                                                class="btn btn-subtle-secondary btn-icon btn-sm edit-item-btn"><i
                                                                    class="ph-pencil"></i></a>
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
                                            {{-- <div id="deleteRecordModal{{ $item->id }}" class="modal fade zoomIn"
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
                                                                    <h4 class="mb-2">Are you sure ?</h4>
                                                                    <p class="text-muted mx-3 mb-0">Are you sure you want
                                                                        to remove this record ?</p>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex gap-2 justify-content-center mt-4 pt-2 mb-2">
                                                                <form action="{{ route('user.destroy', $item->id) }}"
                                                                    method="POST" class="d-inline">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="button"
                                                                        class="btn w-sm btn-light btn-hover"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit"
                                                                        class="btn w-sm btn-danger btn-hover"
                                                                        id="delete-record">Yes, Delete It!</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div> --}}
                                            <!-- Sửa User -->
                                            {{-- <div class="modal fade" id="addCourse{{ $item->id }}" tabindex="-1"
                                                aria-labelledby="addCourseModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content border-0">
                                                        <div class="modal-header bg-danger p-3">
                                                            <h5 class="modal-title text-white" id="addCourseModalLabel">
                                                                Sửa User</h5>
                                                            <button type="button" class="btn-close btn-close-white"
                                                                data-bs-dismiss="modal" aria-label="Close"
                                                                id="close-addCourseModal"></button>
                                                        </div>

                                                        <form action="{{ route('user.update', $item->id) }}" method="post"
                                                            enctype="multipart/form-data" class="tablelist-form" novalidate
                                                            autocomplete="off">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal-body">
                                                                <div id="alert-error-msg"
                                                                    class="d-none alert alert-danger py-2"></div>
                                                                <input type="hidden" id="id-field">

                                                                <input type="hidden" id="rating-field">
                                                                <div class="mb-3">
                                                                    <label for="avatar" class="form-label">Hình
                                                                        Ảnh</label>

                                                                    <input type="file" id="avatar" name="avatar"
                                                                        class="form-control" onchange="showImage(event)">
                                                                    <img id="img_danh_muc"
                                                                        src="{{ Storage::url($item->avatar) }}"
                                                                        alt="Hình Ảnh Sản Phẩm"
                                                                        style="width: 150px;display:none">
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="name" class="form-label">Họ và
                                                                        Tên<span class="text-danger">*</span></label>
                                                                    <input type="text" id="name" name="name"
                                                                        class="form-control" value="{{ $item->name }}"
                                                                        placeholder="Enter course title" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="email" class="form-label">Email<span
                                                                            class="text-danger">*</span></label>
                                                                    <input type="text" id="email" name="email"
                                                                        class="form-control" value="{{ $item->email }}"
                                                                        placeholder="Enter course title" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="address" class="form-label">Address<span
                                                                            class="text-danger">*</span></label>
                                                                    <input type="text" id="address" name="address"
                                                                        class="form-control" value="{{ $item->address }}"
                                                                        placeholder="Enter course title" required>
                                                                </div>




                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <div class="mb-3">
                                                                            <label for="phone"
                                                                                class="form-label">Phone<span
                                                                                    class="text-danger">*</span></label>
                                                                            <input type="number" id="phone"
                                                                                name="phone" class="form-control"
                                                                                value="{{ $item->phone }}"
                                                                                placeholder="Enter instructor name"
                                                                                required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="mb-3">
                                                                            <label for="birth"
                                                                                class="form-label">Birth<span
                                                                                    class="text-danger">*</span></label>
                                                                            <input type="date" id="birth"
                                                                                name="birth" class="form-control"
                                                                                value="{{ $item->birth }}"
                                                                                placeholder="Lessons" required>
                                                                        </div>
                                                                    </div><!--end col-->
                                                                    <div class="col-lg-6">
                                                                        <div class="mb-3">
                                                                            <label for="gender" class="form-label">Giới
                                                                                Tính<span
                                                                                    class="text-danger">*</span></label>
                                                                            <select class="form-select" id="gender"
                                                                                name="gender">
                                                                                <option value="">Giới Tính</option>
                                                                                <option value="nam"
                                                                                    {{ $item->gender == 'nam' ? 'selected' : '' }}>
                                                                                    Nam</option>
                                                                                <option value="nu"
                                                                                    {{ $item->gender == 'nu' ? 'selected' : '' }}>
                                                                                    Nữ</option>
                                                                            </select>
                                                                        </div>

                                                                    </div><!--end col-->
                                                                    <div class="col-lg-6">
                                                                        <div class="mb-3">
                                                                            <label for="password"
                                                                                class="form-label">Password<span
                                                                                    class="text-danger">*</span></label>
                                                                            <input type="password" class="form-control"
                                                                                id="password" name="password"
                                                                                value="{{ $item->password }}"
                                                                                placeholder="Select duration" required>
                                                                        </div>
                                                                    </div><!--end col-->
                                                                    <div class="col-lg-6">
                                                                        <div class="mb-3">
                                                                            <label for="status"
                                                                                class="form-label">Status<span
                                                                                    class="text-danger">*</span></label>
                                                                            <select class="form-select" id="status"
                                                                                name="status">
                                                                                <option value="">Select Status
                                                                                </option>
                                                                                <option value="1"
                                                                                    {{ $item->status_id == 1 ? 'selected' : '' }}>
                                                                                    Hiển Thị</option>
                                                                                <option value="0"
                                                                                    {{ $item->status_id == 0 ? 'selected' : '' }}>
                                                                                    Ẩn</option>
                                                                            </select>
                                                                        </div>

                                                                    </div><!--end col-->
                                                                </div><!--end row-->
                                                            </div>
                                                            <div class="modal-footer">
                                                                <div class="hstack gap-2 justify-content-end">
                                                                    <button type="button" class="btn btn-ghost-danger"
                                                                        data-bs-dismiss="modal"><i
                                                                            class="bi bi-x-lg align-baseline me-1"></i>
                                                                        Close</button>
                                                                    <button type="submit" class="btn btn-primary"
                                                                        id="add-btn">Add Course</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <!-- modal-content -->
                                                </div>
                                            </div> --}}
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
                            <!--end row-->
                        </div>
                    </div><!--end card-->
                </div><!--end col-->
            </div><!--end row-->

            @include('admin.faq.add')


        </div>
        <!-- container-fluid -->


    </div>
@endsection

@section('style-libs')
    <!--datatable css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css">
@endsection
@section('script-libs')
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
    </script>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#addFaqForm').on('submit', function(e) {
                e.preventDefault(); // Ngăn chặn submit mặc định của form

                // Xóa thông báo lỗi cũ
                $('#question-error').text('');
                $('#answer-error').text('');
                $('#status-error').text('');

                $.ajax({
                    url: "{{ route('faqs.store') }}", // URL action của form
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
        });
    </script>
@endsection
