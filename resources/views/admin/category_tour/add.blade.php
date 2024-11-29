@extends('admin.layouts.app')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Danh Sách Danh Mục Tour</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="">Trang quản trị</a></li>
                                <li class="breadcrumb-item active">Thêm danh mục</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <form class="col-6" action="{{ route('category_tour.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="category_tour" class="form-label">Tên danh mục<span class="text-danger">*</span></label>
                    <input type="text" id="category_tour" name="category_tour" value="{{ old('category_tour') }}" class="form-control" placeholder="Nhập câu trả lời...">
                    @error('category_tour')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                {{-- <div class="mb-3">
                    <label for="tour_id" class="form-label">Tên Tour<span class="text-danger">*</span></label>
                    <input type="text" id="tours" name="tour_id" value="{{ old('tour_id') }}" class="form-control" placeholder="Nhập câu trả lời...">
                    @error('tour_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div> --}}
                <div class="mb-3">
                    <label for="description" class="form-label">Mô tả<span class="text-danger">*</span></label>
                    <input type="text" id="description" name="description" value="{{ old('description') }}" class="form-control" placeholder="Nhập câu trả lời...">
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3 col-6">
                    <label for="status1" class="form-label">Tour<span class="text-danger">*</span></label>
                    <select name="tour_id" class="form-select w-100" id="status1">
                        <option value="">Chọn Tour</option>
                        @foreach ($listTour as $status)
                            <option value="{{ $status->id }}" {{ old('tour_id') == $status->id ? 'selected' : '' }}>{{ $status->name }}</option>
                        @endforeach
                    </select>
                    @error('tour_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="price" class="form-label">Giá</label>
                    <input type="number" name="price" id="price" class="form-control" value="{{ old('price') }}">
                    @error('price')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
              {{-- <label for="type">Loại danh mục</label>
              <select name="type" id="type" required>
                  <option value="1">Bài viết</option>
                  <option value="2">Sản phẩm</option>
                  <option value="3">Video</option>
                  <!-- Thêm các loại khác nếu cần -->
              </select> --}}                         
            {{-- <div class="mb-3 col-6">
              <label for="status1" class="form-label">User<span class="text-danger">*</span></label>
              <select name="user_id" class="form-select w-100" id="status1">
                  <option value="">Chọn User</option>
                  @foreach ($listUser as $status)
                      <option value="{{ $status->id }}" {{ old('user_id') == $status->id ? 'selected' : '' }}>{{ $status->name }}</option>
                  @endforeach
              </select>
              @error('user_id')
                  <span class="text-danger">{{ $message }}</span>
              @enderror
          </div> --}}
              <div class="mb-3">
                <label for="status1" class="form-label">Trạng Thái<span class="text-danger">*</span></label>
                <select class="form-select" id="status1" name="status">
                    <option value="">Trạng Thái</option>
                    <option value="1" >Hiển Thị</option>
                    <option value="0" >Ẩn</option>
                </select>
            </div>
              
               


                <div class="mb-3">
                    <a href="{{route('category_tour.index')}}" class="btn btn-info">Trở về</a>
                    <button class="btn btn-primary" type="submit">Thêm mới</button>
                </div>

            </form>
        </div>
    </div>
@endsection
