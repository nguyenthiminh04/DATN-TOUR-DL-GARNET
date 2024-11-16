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
                                <li class="breadcrumb-item"><a href="{{ route('home-admin') }}">Trang quản trị</a></li>
                                <li class="breadcrumb-item active">Thêm bài viết</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            {{-- <li class="breadcrumb-item"><a href="{{ route('article.index') }}">Bài viết</a></li>
            <li class="breadcrumb-item active">Tạo mới bài viết</li> --}}
            <!-- end page title -->
            <form action="{{ route('article.store') }}" method="POST" role="form" enctype="multipart/form-data">
                @csrf
                  @if(isset($article)) @method('POST') @endif
                <div class="mb-3">
                    <label for="title" class="form-label">Tiêu đề bài viết<span class="text-danger">*</span></label>
                    <input type="text" id="title" name="title" value="{{ old('title') }}" class="form-control" placeholder="Nhập tiêu đề bài viết">
                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Mô tả bài viết<span class="text-danger">*</span></label>
                    <input type="text" id="description" name="description" value="{{ old('description') }}" class="form-control" placeholder="Nhập mô tả">
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label">Nội dung bài viết<span class="text-danger">*</span></label>
                    <input type="text" id="content" name="content" value="{{ old('content') }}" class="form-control" placeholder="Nhập nội dung ">
                    @error('content')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div div class="mb-3 col-6">
                    <label for="" class="form-label">Trạng thái<span class="text-danger">*</span></label>
                    <select class="custom-select" name="status">
                        <option value="0" {{ old('status', isset($article->status) ? $article->status : '') == 0 ? 'selected' : '' }}>Hoạt động</option>
                        <option value="1" {{ old('status', isset($article->status) ? $article->status : '') == 1 ? 'selected' : '' }}>Ngừng hoạt động</option>
                    </select>
                </div>

                {{-- <div class="card-header">
                    <label for="" class="form-label">Hình ảnh<span class="text-danger">*</span></label>
                    <div class="form-group">
                        <input type="file" name="image" class="form-control">
                        @if(isset($article) && $article->image)
                            <img src="{{ asset('storage/' . $article->image) }}" style="height: 150px; width:100%;">
                        @endif
                        <span class="text-danger">{{ $errors->first('image') }}</span>
                    </div>
                    </div> --}}

                <div class="mb-3">
                    <a href="{{route('article.index')}}" class="btn btn-info">trở về</a>
                    <button class="btn btn-primary" type="submit">Thêm mới</button>
                </div>

            </form>
        </div>
    </div>
@endsection