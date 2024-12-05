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
                                <li class="breadcrumb-item"><a href="">Trang quản trị</a></li>
                                <li class="breadcrumb-item active">Sửa</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xxl-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('user.update', $user->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="avatar" class="form-label">Avatar</label>

                                    <input type="file" id="avatar" name="avatar" class="form-control"
                                        onchange="showImage(event)">
                                    <img id="img_danh_muc" src="" alt="Hình Ảnh Sản Phẩm"
                                        style="width: 150px;display:none">
                                </div>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Họ tên<span
                                            class="text-danger">*</span></label>
                                    <input type="text" id="name" name="name" value="{{ $user->name }}"
                                        value="{{ old('name') }}" class="form-control" placeholder="Nhập câu hỏi">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email<span class="text-danger">*</span></label>
                                    <input type="text" id="email" name="email" value="{{ $user->email }}"
                                        value="{{ old('email') }}" class="form-control" placeholder="Nhập câu trả lời">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="address" class="form-label">Địa Chỉ<span
                                            class="text-danger">*</span></label>
                                    <input type="text" id="address" name="address" value="{{ $user->address }}"
                                        value="{{ old('address') }}" class="form-control" placeholder="Nhập câu trả lời">
                                    @error('address')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Số điện thoại<span
                                            class="text-danger">*</span></label>
                                    <input type="number" id="phone" name="phone" value="{{ $user->phone }}"
                                        value="{{ old('phone') }}" class="form-control" placeholder="Nhập câu trả lời">
                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="birth" class="form-label">Ngày Sinh<span
                                            class="text-danger">*</span></label>
                                    <input type="date" id="birth" name="birth" value="{{ $user->birth }}"
                                        value="{{ old('birth') }}" class="form-control" placeholder="Nhập câu trả lời">
                                    @error('birth')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="status1" class="form-label">Trạng Thái<span
                                            class="text-danger">*</span></label>
                                    <select class="form-select" id="status1" name="status">
                                        <option value="">Trạng Thái</option>
                                        <option value="1" {{ $user->status == '1' ? 'selected' : '' }}>Hiển Thị
                                        </option>
                                        <option value="0" {{ $user->status == '0' ? 'selected' : '' }}>Ẩn</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="gender" class="form-label">Giới Tính<span
                                            class="text-danger">*</span></label>
                                    <select class="form-select" id="gender" name="gender">
                                        <option value="">Giới Tính</option>
                                        <option value="nam" {{ $user->gender == 'nam' ? 'selected' : '' }}>Nam</option>
                                        <option value="nu" {{ $user->gender == 'nu' ? 'selected' : '' }}>Nữ</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Mật Khẩu<span
                                            class="text-danger">*</span></label>
                                    <input type="password" id="password" name="password" value="{{ $user->password }}"
                                        value="{{ old('password') }}" class="form-control"
                                        placeholder="Nhập câu trả lời">
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-lg-12" style="margin-bottom: 10px">
                                    <div class="text-end">
                                        <button class="btn btn-primary" type="submit">Cập nhật</button>
                                        <a href="{{ route('user.index') }}" class="btn btn-danger">Hủy</a>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
