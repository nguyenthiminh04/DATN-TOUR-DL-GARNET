
@extends('admin.layouts.app')

@extends('admin.layouts.app')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- Nút mở modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#articleDetailModal">
                Xem Chi Tiết Bài Viết
            </button>

            <!-- Modal -->
            <div class="modal fade" id="articleDetailModal" tabindex="-1" aria-labelledby="articleDetailModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h5 class="modal-title" id="articleDetailModalLabel">Chi Tiết bài viết</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <!-- Modal Body -->
                        <div class="modal-body">
                            <h5 class="card-title">{{ $article->name }}</h5>
                            <p><strong>Hình ảnh:</strong> {{ Storage::url($article->image)}}</p>
                            <p><strong>Đường dẫn:</strong> {{ $article->slug}}</p>
                            <p><strong>Hiển thị trên trang chủ:</strong> {{ $article->show_home }}</p>                         
                            <p><strong>Mô tả:</strong> {{ $article->description }}</p>  
                            <p><strong>Nội dung:</strong> {{ $article->content }}</p> 
                            <p><strong>Danh mục:</strong> {{ $article->category_id }}</p>
                            <p><strong>Người đăng:</strong> {{ $article->user_id }}</p>
                            

                                            
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                <a href="{{ route('article.index') }}" class="btn btn-primary">Quay lại danh sách</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection