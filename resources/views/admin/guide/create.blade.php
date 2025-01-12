@extends('admin.layouts.app')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Thêm mới hướng dẫn viên</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="">Trang quản trị</a></li>
                                <li class="breadcrumb-item active">Thêm mới hướng dẫn viên</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xxl-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('guide.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">Họ tên<span
                                            class="text-danger">*</span></label>
                                    <input type="text" id="name" name="name" value="{{ old('name') }}"
                                        class="form-control" placeholder="Nhập tên">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email<span class="text-danger">*</span></label>
                                    <input type="text" id="email" name="email" value="{{ old('email') }}"
                                        class="form-control" placeholder="Nhập email">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="address" class="form-label">Địa Chỉ<span
                                            class="text-danger">*</span></label>
                                    <input type="text" id="address" name="address" value="{{ old('address') }}"
                                        class="form-control" placeholder="Nhập địa chỉ">
                                    @error('address')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="phone_number" class="form-label">Số điện thoại<span
                                            class="text-danger">*</span></label>
                                    <input type="number" id="phone_number" name="phone_number" value="{{ old('phone_number') }}"
                                        class="form-control" placeholder="Nhập số điện thoại">
                                    @error('phone_number')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="experience" class="form-label">kinh nghiệm<span
                                            class="text-danger">*</span></label>
                                    <input type="text" id="experience" name="experience" value="{{ old('experience') }}"
                                        class="form-control" placeholder="Nhập kinh nghiệm">
                                    @error('experience')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="skills" class="form-label">Kỹ năng<span
                                            class="text-danger">*</span></label>
                                    <input type="skills" id="skills" name="skills" value="{{ old('skills') }}"
                                        class="form-control" placeholder="Nhập câu kỹ năng">
                                    @error('skills')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="status1" class="form-label">Trạng Thái<span
                                            class="text-danger">*</span></label>
                                    <select class="form-select" id="status1" name="status">
                                        <option value="">Trạng Thái</option>
                                        <option value="active">Hoạt động</option>
                                        <option value="inactive">Dừng</option>
                                    </select>
                                </div>
                                <div class="col-lg-12" style="margin-bottom: 10px">
                                    <div class="text-end">
                                        <button class="btn btn-primary" type="submit">Thêm mới</button>
                                        <a href="{{ route('guide.index') }}" class="btn btn-danger">Hủy</a>
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
