@extends('admin.layouts.app')
@section('content')
    <h1>Sửa bài viết</h1>

    <form action="{{ route('article.update', $article->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Tiêu đề</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $article->title) }}" required>
        </div>

        <div class="form-group">
            <label for="slug">Đường dẫn thân thiện</label>
            <input type="text" name="slug" id="slug" class="form-control" value="{{ old('slug', $article->slug) }}" required>
        </div>

        <div class="form-group">
            <label for="description">Mô tả</label>
            <textarea name="description" id="description" class="form-control" required>{{ old('description', $article->description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="content">Nội dung</label>
            <textarea name="content" id="content" class="form-control" required>{{ old('content', $article->content) }}</textarea>
        </div>

        <div class="form-group">
            <label for="avatar">Hình đại diện</label>
            <input type="text" name="avatar" id="avatar" class="form-control" value="{{ old('avatar', $article->avatar) }}" required>
        </div>

        <div class="form-group">
            <label for="category_id">Danh mục</label>
            <select name="category_id" id="category_id" class="form-control">
                <option value="">Chọn danh mục</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ (old('category_id', $article->category_id) == $category->id) ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="user_id">Người tạo</label>
            <select name="user_id" id="user_id" class="form-control">
                <option value="">Chọn người dùng</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ (old('user_id', $article->user_id) == $user->id) ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Cập nhật</button>
        <a href="{{ route('article.index') }}" class="btn
@endsection