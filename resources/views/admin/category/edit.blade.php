@extends('admin.layouts.app')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Danh Sách Danh Mục</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="">Trang quản trị</a></li>
                                <li class="breadcrumb-item active">Sửa danh mục</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <form class="col-6" action="{{ route('category.update', $category->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="avatar" class="form-label">Hình ảnh</label>
                    <input type="file" id="avatar" name="avatar" class="form-control" onchange="showImage(event)">
                    <img id="img_danh_muc" src="{{ $category->avatar ? asset('storage/' . $category->avatar) : '' }}" alt="Hình Ảnh Danh Mục" style="width: 150px; {{ $category->avatar ? '' : 'display:none' }}">
                </div>
                <div class="mb-3">
                    <label for="banner" class="form-label">Banner</label>
                    <input type="file" id="banner" name="banner" class="form-control" onchange="showImage(event)">
                    <img id="img_banner" src="{{ $category->banner ? asset('storage/' . $category->banner) : '' }}" alt="Hình Ảnh Banner" style="width: 150px; {{ $category->banner ? '' : 'display:none' }}">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Tên danh mục<span class="text-danger">*</span></label>
                    <input type="text" id="name" name="name" value="{{ old('name', $category->name) }}" class="form-control" placeholder="Nhập tên danh mục">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Mô tả<span class="text-danger">*</span></label>
                    <input type="text" id="description" name="description" value="{{ old('description', $category->description) }}" class="form-control" placeholder="Nhập mô tả">
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="slug" class="form-label">Đường dẫn<span class="text-danger">*</span></label>
                    <input type="text" id="slug" name="slug" value="{{ old('slug', $category->slug) }}" class="form-control" placeholder="Nhập đường dẫn">
                    @error('slug')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label>
                        <input type="checkbox" name="hot" value="1" {{ old('hot', $category->hot) ? 'checked' : '' }}> Hot
                    </label>
                </div>
                <div class="mb-3">
                    <label for="type">Loại danh mục</label>
                    <select name="type" id="type" class="form-control" required>
                        <option value="1" {{ old('type', $category->type) == 1 ? 'selected' : '' }}>Bài viết</option>
                        <option value="2" {{ old('type', $category->type) == 2 ? 'selected' : '' }}>Tin tức hot</option>
                        <option value="3" {{ old('type', $category->type) == 3 ? 'selected' : '' }}>Video</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="parent_id">Menu<span class="text-danger">*</span></label>
                    <select name="parent_id" id="parent_id" class="form-control">
                        <option value="">Không có cha (Root)</option>
                        @foreach($parents as $parent)
                            <option value="{{ $parent->id }}" {{ old('parent_id', $category->parent_id) == $parent->id ? 'selected' : '' }}>
                                {{ $parent->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="user_id" class="form-label">User<span class="text-danger">*</span></label>
                    <select name="user_id" id="user_id" class="form-select">
                        <option value="">Chọn User</option>
                        @foreach ($listUser as $user)
                            <option value="{{ $user->id }}" {{ old('user_id', $category->user_id) == $user->id ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            
          <div class="mb-3">
            <label for="status1" class="form-label">Trạng thái<span class="text-danger">*</span></label>
            <select class="form-select" id="status1" name="status">
                <option value="">Trạng Thái</option>
                <option value="1" {{ old('status', $category->status) == 1 ? 'selected' : '' }}>Hiển thị</option>
                <option value="0" {{ old('status', $category->status) == 0 ? 'selected' : '' }}>Ẩn</option>
            </select>
        </div>
    
                <div class="mb-3">
                    <a href="{{ route('category.index') }}" class="btn btn-info">Trở về</a>
                    <button class="btn btn-primary" type="submit">Cập nhật</button>
                </div>
            </form>
            
        </div>
    </div>
@endsection
