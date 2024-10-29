<!-- Sửa User -->
<div class="modal fade" id="addCourse{{ $item->id }}" tabindex="-1" aria-labelledby="addCourseModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content border-0">
            <div class="modal-header bg-danger p-3">
                <h5 class="modal-title text-white" id="addCourseModalLabel">
                    Sửa User</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"
                    id="close-addCourseModal"></button>
            </div>

            <form action="{{ route('user.update', $item->id) }}" method="post" enctype="multipart/form-data"
                class="tablelist-form" novalidate autocomplete="off">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div id="alert-error-msg" class="d-none alert alert-danger py-2"></div>
                    <input type="hidden" id="id-field">

                    <input type="hidden" id="rating-field">
                    <div class="mb-3">
                        <label for="avatar" class="form-label">Hình
                            Ảnh</label>

                        <input type="file" id="avatar" name="avatar" class="form-control"
                            onchange="showImage(event)">
                        <img id="img_danh_muc" src="{{ Storage::url($item->avatar) }}" alt="Hình Ảnh Sản Phẩm"
                            style="width: 150px;display:none">
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Họ và
                            Tên<span class="text-danger">*</span></label>
                        <input type="text" id="name" name="name" class="form-control"
                            value="{{ $item->name }}" placeholder="Enter course title" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email<span class="text-danger">*</span></label>
                        <input type="text" id="email" name="email" class="form-control"
                            value="{{ $item->email }}" placeholder="Enter course title" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address<span class="text-danger">*</span></label>
                        <input type="text" id="address" name="address" class="form-control"
                            value="{{ $item->address }}" placeholder="Enter course title" required>
                    </div>




                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone<span class="text-danger">*</span></label>
                                <input type="number" id="phone" name="phone" class="form-control"
                                    value="{{ $item->phone }}" placeholder="Enter instructor name" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="birth" class="form-label">Birth<span class="text-danger">*</span></label>
                                <input type="date" id="birth" name="birth" class="form-control"
                                    value="{{ $item->birth }}" placeholder="Lessons" required>
                            </div>
                        </div><!--end col-->
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="gender" class="form-label">Giới
                                    Tính<span class="text-danger">*</span></label>
                                <select class="form-select" id="gender" name="gender">
                                    <option value="">Giới Tính</option>
                                    <option value="nam" {{ $item->gender == 'nam' ? 'selected' : '' }}>
                                        Nam</option>
                                    <option value="nu" {{ $item->gender == 'nu' ? 'selected' : '' }}>
                                        Nữ</option>
                                </select>
                            </div>

                        </div><!--end col-->
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="password" class="form-label">Password<span
                                        class="text-danger">*</span></label>
                                <input type="password" class="form-control" id="password" name="password"
                                    value="{{ $item->password }}" placeholder="Select duration" required>
                            </div>
                        </div><!--end col-->
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="status" class="form-label">Status<span
                                        class="text-danger">*</span></label>
                                <select class="form-select" id="status" name="status">
                                    <option value="">Select Status
                                    </option>
                                    <option value="1" {{ $item->status_id == 1 ? 'selected' : '' }}>
                                        Hiển Thị</option>
                                    <option value="0" {{ $item->status_id == 0 ? 'selected' : '' }}>
                                        Ẩn</option>
                                </select>
                            </div>

                        </div><!--end col-->
                    </div><!--end row-->
                </div>
                <div class="modal-footer">
                    <div class="hstack gap-2 justify-content-end">
                        <button type="button" class="btn btn-ghost-danger" data-bs-dismiss="modal"><i
                                class="bi bi-x-lg align-baseline me-1"></i>
                            Close</button>
                        <button type="submit" class="btn btn-primary" id="add-btn">Add Course</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- modal-content -->
    </div>
</div>
