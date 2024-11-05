@extends('admin.layouts.app')
@section('content')
<div class="container-fluid">
    <form action="{{ route('location.update', $location->id) }}" method="POST" enctype="multipart/form-data">      
        @csrf
        @method('PUT') <!-- Chắc chắn sử dụng PUT ở đây -->

        <div class="row">
            <div class="col-md-9" style="margin-top: 100px">
                <div class="card card-primary" style="background-color: rgba(0, 0, 0, 0.507)">
                    <div class="card-body">
                        <div class="form-group {{ $errors->first('name') ? 'has-error' : '' }}">
                            <label for="name">Tên địa danh <sup class="text-danger">(*)</sup></label>
                            <input type="text" class="form-control" name="name" value="{{ old('name', isset($location) ? $location->name : '') }}">
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        </div>

                        <div class="form-group {{ $errors->first('description') ? 'has-error' : '' }}">
                            <label for="description">Mô tả</label>
                            <textarea name="description" class="form-control">{{ old('description', isset($location) ? $location->description : '') }}</textarea>
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                        </div>

                        <div class="form-group {{ $errors->first('content') ? 'has-error' : '' }}">
                            <label for="content">Giới thiệu</label>
                            <textarea name="content" class="form-control">{{ old('content', isset($location) ? $location->content : '') }}</textarea>
                            <span class="text-danger">{{ $errors->first('content') }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3" style="margin-top: 100px">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Trạng thái</h3>
                    </div>
                    <div class="card-body">
                        <select class="custom-select" name="status">
                            <option value="0" {{ old('status', isset($location->status) ? $location->status : 0) == 0 ? 'selected' : '' }}>Hoạt động</option>
                            <option value="1" {{ old('status', isset($location->status) ? $location->status : 1) == 1 ? 'selected' : '' }}>Ngừng hoạt động</option>
                        </select>
                    </div>
                    <div class="card-header">
                        <h3 class="card-title">Hình ảnh</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <input type="file" name="image" class="form-control">
                            @if(isset($location) && $location->image)
                                <img src="{{ asset('storage/' . $location->image) }}" style="height: 150px; width:100%;">
                            @endif
                            <span class="text-danger">{{ $errors->first('image') }}</span>
                        </div>
                        <div class="btn-set">
                            <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Cập nhật</button>
                            {{-- <button type="reset" class="btn btn-danger"><i class="fa fa-undo"></i> Reset</button> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
