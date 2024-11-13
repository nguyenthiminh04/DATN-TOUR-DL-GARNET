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
                                <li class="breadcrumb-item active">Thêm danh mục</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <form class="col-6" action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label for="avatar" class="form-label">Hình ảnh</label>

                  <input type="file" id="avatar" name="avatar" class="form-control"
                      onchange="showImage(event)">
                  <img id="img_danh_muc" src="" alt="Hình Ảnh Sản Phẩm"
                      style="width: 150px;display:none">
              </div>
              <div class="mb-3">
                <label for="banner" class="form-label">Banner</label>

                <input type="file" id="banner" name="banner" class="form-control"
                    onchange="showImage(event)">
                <img id="img_danh_muc" src="" alt="Hình Ảnh Sản Phẩm"
                    style="width: 150px;display:none">
            </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Tên danh mục<span class="text-danger">*</span></label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control" placeholder="Nhập câu trả lời">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="description" class="form-label">Mô tả<span class="text-danger">*</span></label>
                    <input type="text" id="description" name="description" value="{{ old('description') }}" class="form-control" placeholder="Nhập câu trả lời">
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                  <label for="slugg" class="form-label">Đường dẫn<span class="text-danger">*</span></label>
                  <input type="text" id="slugg" name="slugg" value="{{ old('slugg') }}" class="form-control" placeholder="Nhập câu hỏi">
                  @error('slugg')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
              </div>
                <label>
                  <input type="checkbox" name="hot" value="1"> Hot
              </label>
              <label for="type">Loại danh mục</label>
              <select name="type" id="type" required>
                  <option value="1">Bài viết</option>
                  <option value="2">Sản phẩm</option>
                  <option value="3">Video</option>
                  <!-- Thêm các loại khác nếu cần -->
              </select>
                            
 <div class="mb-3">
                <label for="status1" class="form-label">Menu Cha<span class="text-danger">*</span></label>
                <select name="parent_id">
                  <option value="">Không có cha (Root)</option>
                  @foreach($parents as $parent)
                      <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                  @endforeach
              </select>
            </div>
            <div class="mb-3 col-6">
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
          </div>
              <div class="mb-3">
                <label for="status1" class="form-label">Trạng Thái<span class="text-danger">*</span></label>
                <select class="form-select" id="status1" name="status">
                    <option value="">Trạng Thái</option>
                    <option value="1" >Hiển Thị</option>
                    <option value="0" >Ẩn</option>
                </select>
            </div>
              
               


                <div class="mb-3">
                    <a href="{{route('coupons.index')}}" class="btn btn-info">Trở về</a>
                    <button class="btn btn-primary" type="submit">Thêm mới</button>
                </div>

            </form>
        </div>
    </div>
@endsection
