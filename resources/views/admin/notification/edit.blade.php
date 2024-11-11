@extends('admin.layouts.app')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Thêm Thông Báo</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('home-admin') }}">Trang quản trị</a></li>
                                <li class="breadcrumb-item active">Thêm thông báo</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <form class="col-6" action="{{ route('notifications.update', $notification) }}" method="post">
                @csrf
                @method('PATCH')
                <div class="mb-3">
                    <label for="content" class="form-label">Nội dung thông báo<span class="text-danger">*</span></label>
                    <input type="text" id="content" name="content" class="form-control" placeholder="Nhập thông báo"
                        value="{{ $notification->content }}">
                    @error('content')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="status1" class="form-label">Trạng thái<span class="text-danger">*</span></label>
                    <select name="status" class="form-select" id="status1">
                        <option value="1" {{$notification->status == 1 ? 'selected': ''}}>Hiển thị</option>
                        <option value="0" {{$notification->status == 0 ? 'selected': ''}}>Ẩn</option>
                    </select>
                    @error('status')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
               
                <div class="mb-3">
                    <a href="{{ route('notifications.index') }}" class="btn btn-info">Trở về</a>
                    <button class="btn btn-primary" type="submit">Thêm thông báo</button>
                </div>
            </form>

        </div>
    </div>
@endsection
