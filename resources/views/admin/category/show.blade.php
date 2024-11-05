@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <h1>Chi Tiết Danh Mục</h1>
    
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $category->name }}</h3>
        </div>
        <div class="card-body">
            <p><strong>Slug:</strong> {{ $category->slug }}</p>
            <p><strong>Mô tả:</strong> {{ $category->description }}</p>
            <p><strong>Trạng thái:</strong> {{ $category->status ? 'Hiện' : 'Ẩn' }}</p>
            <p><strong>Nổi bật:</strong> {{ $category->hot ? 'Có' : 'Không' }}</p>
            <p><strong>Người tạo:</strong> {{ $category->user_id }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('category.index') }}" class="btn btn-secondary">Quay lại</a>
            <a href="{{ route('category.edit', $category->id) }}" class="btn btn-warning">Sửa</a>
            <form action="{{ route('category.destroy', $category->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Xóa</button>
            </form>
        </div>
    </div>
</div>
@endsection
