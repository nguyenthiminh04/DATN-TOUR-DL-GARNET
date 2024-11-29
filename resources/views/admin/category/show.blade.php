
@extends('admin.layouts.app')

@extends('admin.layouts.app')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- Nút mở modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#articleDetailModal">
                Xem Chi Tiết Danh Mục
            </button>

            <!-- Modal -->
            <div class="modal fade" id="categoryDetailModal" tabindex="-1" aria-labelledby="articleDetailModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h5 class="modal-title" id="articleDetailModalLabel">Chi Tiết Danh Mục</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <!-- Modal Body -->
                        <div class="modal-body">
                            <h5 class="card-title">{{ $category->name }}</h5>
                            <p><strong>Hình ảnh:</strong> {{ Storage::url($category->image)}}</p>
                            <p><strong>Đường dẫn:</strong> {{ $category->slug}}</p>                
                            <p><strong>Mô tả:</strong> {{ $category->description }}</p>  
                            <p><strong>Trạng thái:</strong> {{ $category->status }}</p>
                            <p><strong>Người đăng:</strong> {{ $category->user_id }}</p>
                            <p><strong>Ngày đăng:</strong> {{ $category->created_at }}</p>
                            <p><strong>Ngày cập nhật:</strong> {{ $category->updated_at }}</p>
                            <p><strong>Ngày xóa</strong> {{ $category->deleted_at }}</p>

                                            
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                <a href="{{ route('category.index') }}" class="btn btn-primary">Quay lại danh sách</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection