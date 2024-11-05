@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <h1>Sửa Danh Mục</h1>
    <form action="{{ route('category.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Tên danh mục</label>
            <input type="text" class="form-control" name="name" value="{{ $category->name }}" required>
            @error('name')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" class="form-control" name="slug" value="{{ $category->slug }}" required>
            @error('slug')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <div class="form-group">
            <label for="description">Mô tả</label>
            <textarea name="description" class="form-control">{{ $category->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="status">Trạng thái</label>
            <select name="status" class="form-control">
                <option value="1" {{ $category->status ? 'selected' : '' }}>Hiện</option>
                <option value="0" {{ !$category->status ? 'selected' : '' }}>Ẩn</option>
            </select>
        </div>
        <div class="btn-set">
            <button type="submit" class="btn btn-warning">Cập nhật</button>
            <a href="{{ route('
