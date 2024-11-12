@extends('admin.layouts.app')

@section('style')
@endsection
@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Danh Sách User</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Courses</a></li>
                                <li class="breadcrumb-item active">List View</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card" id="coursesList">
                        <div class="card-body">
                            <div class="row align-items-center g-2">
                                <div class="col-lg-3 me-auto">
                                    <h6 class="card-title mb-0">Instructors List <span
                                            class="badge bg-primary ms-1 align-baseline">9999</span></h6>
                                </div><!--end col-->
                                <div class="col-lg-2">
                                    <div class="search-box">
                                        <input type="text" class="form-control search"
                                            placeholder="Search for courses, price or something...">
                                        <i class="ri-search-line search-icon"></i>
                                    </div>
                                </div><!--end col-->
                                <div class="col-lg-auto">
                                    <div class="hstack flex-wrap gap-2">
                                        <button class="btn btn-subtle-danger d-none" id="remove-actions"
                                            onClick="deleteMultiple()"><i class="ri-delete-bin-2-line"></i></button>
                                        <a href="#addCourse2" data-bs-toggle="modal" class="btn btn-secondary"><i
                                                class="bi bi-plus-circle align-baseline me-1"></i> Add Course</a>
                                        <div>
                                            <button type="button" class="btn btn-info" data-bs-toggle="offcanvas"
                                                data-bs-target="#courseFilters" aria-controls="courseFilters"><i
                                                    class="bi bi-funnel align-baseline me-1"></i> Filter</button>
                                            <a href="apps-learning-grid.html" class="btn btn-subtle-primary btn-icon"><i
                                                    class="bi bi-grid"></i></a>
                                            <a href="apps-learning-list.html"
                                                class="btn btn-subtle-primary active btn-icon"><i
                                                    class="bi bi-list-task"></i></a>
                                        </div>
                                    </div>
                                </div><!--end col-->
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive table-card">
                                <table class="table table-centered align-middle table-custom-effect table-nowrap mb-0">
                                    <thead class="text-muted">
                                        <tr>
                                            <th>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="option"
                                                        id="checkAll">
                                                    <label class="form-check-label" for="checkAll"></label>
                                                </div>
                                            </th>
                                            <th scope="col" class="sort cursor-pointer" data-sort="category">Name</th>
                                            <th scope="col" class="sort cursor-pointer" data-sort="course_Name">Avatar
                                            </th>
                                            <th scope="col" class="sort cursor-pointer" data-sort="instructor">Email</th>
                                            <th scope="col" class="sort cursor-pointer" data-sort="lessons">Phone</th>
                                            <th scope="col" class="sort cursor-pointer" data-sort="duration">Address</th>
                                            <th scope="col" class="sort cursor-pointer" data-sort="students">Birth</th>
                                            <th scope="col" class="sort cursor-pointer" data-sort="fees">Gender</th>
                                            <th scope="col" class="sort cursor-pointer" data-sort="status">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list form-check-all">
                                        @foreach ($listuser as $index => $item)
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="chk_child">
                                                        <label class="form-check-label"></label>
                                                    </div>
                                                </td>
                                                <td class="id d-none"><a href="javascript:void(0)"
                                                        class="fw-medium link-primary">#TBS001</a></td>
                                                <td class="category"><a href="apps-learning-grid.html"
                                                        class="text-reset">{{ $item->name }}</a></td>
                                                <td class="course_Name">
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <div class="flex-shrink-0">
                                                            <img src="{{ Storage::url($item->avatar) }}" alt=""
                                                                class="avatar-xxs">
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <a href="apps-learning-overview.html" class="text-reset"></a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="instructor">{{ $item->email }}</td>
                                                <td class="lessons">{{ $item->phone }}</td>
                                                <td class="duration">{{ $item->address }}</td>
                                                <td class="students">{{ $item->birth }}</td>
                                                <td class="fees"><span class="fw-medium">{{ $item->gender }}</span></td>
                                                <td class="{{ $item->status == true ? 'text-success' : 'text-danger' }}">
                                                    {{ $item->status == true ? 'Hiển thị' : 'Ẩn' }}</td>
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
                                                                    <h4 class="mb-2">Are you sure ?</h4>
                                                                    <p class="text-muted mx-3 mb-0">Are you sure you want
                                                                        to remove this record ?</p>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="d-flex gap-2 justify-content-center mt-4 pt-2 mb-2">
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
                                            </div>
                                            <!-- Sửa User -->
                                            <div class="modal fade" id="addCourse{{ $item->id }}" tabindex="-1"
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

                                                        <form action="{{ route('user.update', $item->id) }}"
                                                            method="post" enctype="multipart/form-data"
                                                            class="tablelist-form" novalidate autocomplete="off">
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
                                                                                    {{ $item->status == 1 ? 'selected' : '' }}>
                                                                                    Hiển Thị</option>
                                                                                <option value="0"
                                                                                    {{ $item->status == 0 ? 'selected' : '' }}>
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
                                            </div>
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
                            <div class="row align-items-center mt-4 pt-2" id="pagination-element">
                                <div class="col-sm">
                                    <div class="text-muted text-center text-sm-start">
                                        Showing <span class="fw-semibold">10</span> of <span class="fw-semibold">15</span>
                                        Results
                                    </div>
                                </div><!--end col-->
                                <div class="col-sm-auto mt-3 mt-sm-0">
                                    <div class="pagination-wrap hstack gap-2 justify-content-center">
                                        <a class="page-item pagination-prev disabled" href="javascript:void(0)">
                                            Previous
                                        </a>
                                        <ul class="pagination listjs-pagination mb-0"></ul>
                                        <a class="page-item pagination-next" href="javascript:void(0)">
                                            Next
                                        </a>
                                    </div>
                                </div><!--end col-->
                            </div><!--end row-->
                        </div>
                    </div><!--end card-->
                </div><!--end col-->
            </div><!--end row-->
            <!-- Thêm User -->
            <div class="modal fade" id="addCourse2" tabindex="-1" aria-labelledby="addCourseModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content border-0">
                        <div class="modal-header bg-danger p-3">
                            <h5 class="modal-title text-white" id="addCourseModalLabel">Thêm User</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                aria-label="Close" id="close-addCourseModal"></button>
                        </div>

                        <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data"
                            class="tablelist-form" novalidate autocomplete="off">
                            @csrf
                            <div class="modal-body">
                                <div id="alert-error-msg" class="d-none alert alert-danger py-2"></div>
                                <input type="hidden" id="id-field">

                                <input type="hidden" id="rating-field">
                                <div class="mb-3">
                                    <label for="avatar" class="form-label">Hình Ảnh</label>

                                    <input type="file" id="avatar" name="avatar" class="form-control"
                                        onchange="showImage(event)">
                                    <img id="img_danh_muc" src="" alt="Hình Ảnh Sản Phẩm"
                                        style="width: 150px;display:none">
                                </div>

                                <div class="mb-3">
                                    <label for="name" class="form-label">Họ và Tên<span
                                            class="text-danger">*</span></label>
                                    <input type="text" id="name" name="name" class="form-control"
                                        placeholder="Enter course title" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email<span
                                            class="text-danger">*</span></label>
                                    <input type="text" id="email" name="email" class="form-control"
                                        placeholder="Enter course title" required>
                                </div>
                                <div class="mb-3">
                                    <label for="address" class="form-label">Address<span
                                            class="text-danger">*</span></label>
                                    <input type="text" id="address" name="address" class="form-control"
                                        placeholder="Enter course title" required>
                                </div>




                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="phone" class="form-label">Phone<span
                                                    class="text-danger">*</span></label>
                                            <input type="number" id="phone" name="phone" class="form-control"
                                                placeholder="Enter instructor name" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="birth" class="form-label">Birth<span
                                                    class="text-danger">*</span></label>
                                            <input type="date" id="birth" name="birth" class="form-control"
                                                placeholder="Lessons" required>
                                        </div>
                                    </div><!--end col-->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="gender" class="form-label">Gender<span
                                                    class="text-danger">*</span></label>
                                            <select class="form-select" id="gender">
                                                <option value="">Select Status</option>
                                                <option value="nam" name="gender">Nam</option>
                                                <option value="nu" name="gender">Nữ</option>
                                            </select>
                                        </div>
                                    </div><!--end col-->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="password" class="form-label">Password<span
                                                    class="text-danger">*</span></label>
                                            <input type="password" class="form-control" id="password" name="password"
                                                placeholder="Select duration" required>
                                        </div>
                                    </div><!--end col-->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="status" class="form-label">Status<span
                                                    class="text-danger">*</span></label>
                                            <select class="form-select" id="status">
                                                <option value="">Select Status</option>
                                                <option value="1" name="status">Hiển Thị</option>
                                                <option value="0" name="status">Ẩn</option>
                                            </select>
                                        </div>
                                    </div><!--end col-->
                                </div><!--end row-->
                            </div>
                            <div class="modal-footer">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-ghost-danger" data-bs-dismiss="modal"><i
                                            class="bi bi-x-lg align-baseline me-1"></i> Close</button>
                                    <button type="submit" class="btn btn-primary" id="add-btn">Add Course</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- modal-content -->
                </div>
            </div>


        </div>
        <!-- container-fluid -->


    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#deleteRecordModal').on('submit', function(e) {
                e.preventDefault(); // Ngăn form gửi dữ liệu theo cách truyền thống

                $.ajax({
                    url: '/add-product', // Đường dẫn đến route thêm sản phẩm
                    method: 'POST',
                    data: $(this).serialize(), // Lấy tất cả dữ liệu từ form
                    success: function(response) {
                        // Xử lý khi thành công
                        $('#message').html('<p>Sản phẩm đã được thêm thành công!</p>');
                        // Cập nhật danh sách sản phẩm mà không cần reload trang
                    },
                    error: function(xhr) {
                        // Xử lý lỗi
                        $('#message').html('<p>Có lỗi xảy ra!</p>');
                    }
                });
            });
        });
    </script>
    <script>
        $('#addCourse2').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: '/edit-product', // Route sửa sản phẩm
                method: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    $('#editMessage').html('<p>Sản phẩm đã được sửa thành công!</p>');
                    // Cập nhật danh sách sản phẩm mới
                },
                error: function(xhr) {
                    $('#editMessage').html('<p>Có lỗi xảy ra khi sửa sản phẩm!</p>');
                }
            });
        });
    </script>
@endsection
