@extends('admin.layouts.app')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Danh Sách Bài Viết</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="">Trang quản trị</a></li>
                                <li class="breadcrumb-item active">Sửa bài viết</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    <form action="{{ route('article.update', $article->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="img_thumb" class="form-label">Hình ảnh</label>
            <input type="file" id="img_thumb" name="img_thumb" class="form-control" onchange="showImage(event)" value="{{ old('img_thumb', $article->img_thumb) }}">
            <img id="img_danh_muc" src="{{ $article->img_thumb ? asset('storage/' . $article->img_thumb) : '' }}" alt="Hình Ảnh " style="width: 150px; {{ $article->img_thumb ? '' : 'display:none' }}">
        </div>
        <div class="mb-3">

        <div class="form-group">
            <label for="title">Tiêu đề</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $article->title) }}" required>
        </div>

        <div class="form-group">
            <label for="slug">Đường dẫn</label>
            <input type="text" name="slug" id="slug" class="form-control" value="{{ old('slug', $article->slug) }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="show_home">Hiển thị trên trang chủ</label>
            <select name="show_home" id="show_home" class="form-control">
                <option value=""></option>
                <option value="1" {{ old('show_home', $article->show_home) == '1' ? 'selected' : '' }}>Có</option>
                <option value="0" {{ old('show_home', $article->show_home) == '0' ? 'selected' : '' }}>Không</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Mô tả<span class="text-danger">*</span></label>
            <input type="text" id="description" name="description" value="{{ old('description', $article->description) }}"
                class="form-control" placeholder="Nhập câu trả lời" required>
            @error('description')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Nội dung<span class="text-danger">*</span></label>
            <input type="text" id="content" name="content" value="{{ old('content', $article->content)}}" class="form-control"
                placeholder="Nhập câu trả lời" required>
            @error('content')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>


        <div class="mb-3 col-6">
            <label for="status1" class="form-label">Chọn danh mục<span class="text-danger">*</span></label>
            <select name="category_id" class="form-select w-100" id="status1">
                <option value="">Chọn danh mục</option>
                @foreach ($listCategory as $status)
                    <option value="{{ $status->id }}" {{ old('category_id', $article->category_id) == $status->id ? 'selected' : '' }}>
                        {{ $status->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3 col-6">
            <label for="status1" class="form-label">User<span class="text-danger">*</span></label>
            <select name="user_id" class="form-select w-100" id="status1">
                <option value="">Chọn User</option>
                @foreach ($listUser as $status)
                    <option value="{{ $status->id }}" {{ old('user_id', $article->user_id) == $status->id ? 'selected' : '' }}>
                        {{ $status->name }}</option>
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
                <option value="1" {{ old('status', $article->status) == 1 ? 'selected' : '' }}>Hiển thị</option>
                <option value="0" {{ old('status', $article->status) == 0 ? 'selected' : '' }}>Ẩn</option>
            </select>
        </div>

        <div class="mb-3">
            <a href="{{ route('article.index') }}" class="btn btn-info">Trở về</a>
            <button class="btn btn-primary" type="submit">Cập nhật</button>
        </div>
@endsection