<div class="container-fluid">
    <form action="{{ isset($location) ? route('location.update', $location->id) : route('location.store') }}" role="form" method="post" enctype="multipart/form-data">
        @csrf
        {{-- {{ route('location.update', $location->id) }} --}}
        @if(isset($location)) @method('POST') @endif
        <div class="row">
            <div class="col-md-9" style="margin-top: 50px">
                <div class="card card-primary" style="background-color: rgba(0, 0, 0, 0.507)">
                    <div class="card-body">
                        <div class="form-group {{ $errors->first('name') ? 'has-error' : '' }}">
                            <label for="name">Tên địa danh <sup class="text-danger">(*)</sup></label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', isset($location) ? $location->name : '') }}" placeholder="Nhập tên địa danh...">
                            <span class="text-danger" id="name-error">{{ $errors->first('name') }}</span>
                        </div>

                        <div class="form-group {{ $errors->first('description') ? 'has-error' : '' }}">
                            <label for="description">Mô tả </label>
                            <input id="description" name="description"  placeholder="Nhập mô tả địa danh..." class="form-control" value="{{ old('description', isset($location) ? $location->description : '') }}">
                            <span class="text-danger" id="description-error">{{ $errors->first('description') }}</span>
                        </div>

                        <div class="form-group {{ $errors->first('content') ? 'has-error' : '' }}">
                            <label for="content">Giới thiệu</label>
                            <input name="content" class="form-control" value="{{ old('content', isset($location) ? $location->content : '') }}" placeholder="Nhập giới thiệu địa danh...">
                            <span class="text-danger">{{ $errors->first('content') }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3" style="margin-top: 50px">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Trạng thái</h3>
                    </div>
                    <div class="card-body">
                        <select class="custom-select" name="status">
                            <option value="0" {{ old('status', isset($location->status) ? $location->status : '') == 0 ? 'selected' : '' }}>Hoạt động</option>
                            <option value="1" {{ old('status', isset($location->status) ? $location->status : '') == 1 ? 'selected' : '' }}>Ngừng hoạt động</option>
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
                        </div> <br>
                        <div class="btn-set">
                            <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Lưu địa danh</button>
                            {{-- <button type="reset" class="btn btn-danger"><i class="fa fa-undo"></i> Reset</button> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
