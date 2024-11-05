<div class="container-fluid">
    <form role="form" action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @if (isset($article))
            @method('POST')
        @endif
        <div class="row">
            <div class="col-md-9" style="margin-top:50px">
                <div class="card card-primary" style="background-color: rgba(0, 0, 0, 0.507)">
                    <!-- form start -->
                    <div class="card-body">
                        <div class="form-group {{ $errors->first('name') ? 'has-error' : '' }} ">
                            <label for="inputEmail3" class="control-label default">Tên danh mục <sup
                                    class="text-danger">(*)</sup></label>
                            <div>
                                <input type="text" maxlength="100" class="form-control" placeholder="Tên danh mục..."
                                    name="name" value="{{ old('name', isset($category) ? $category->name : '') }}">
                                <span class="text-danger ">
                                    <p class="mg-t-5">{{ $errors->first('name') }}</p>
                                </span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Loại danh mục</label>
                                    <select class="custom-select" name="types">
                                        @foreach ($types as $key => $item)
                                            <option
                                                {{ old('types', isset($category->types) ? $category->types : '') == $key ? 'selected="selected"' : '' }}
                                                value="{{ $key }}">
                                                {{ $item }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group {{ $errors->first('description') ? 'has-error' : '' }} ">
                            <label for="inputEmail3" class="control-label default">Mô tả ngắn </label>
                            <div>
                                <textarea name="description" id="description" cols="30" rows="10" class="form-control" style="height: 225px;">{{ old('description', isset($article) ? $article->description : '') }}</textarea>
                                <script>
                                    ckeditor(description);
                                </script>
                                @if ($errors->first('description'))
                                    <span class="text-danger">{{ $errors->first('description') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Trạng thái</label>
                                    <select class="custom-select" name="status">
                                        @foreach ($status as $key => $item)
                                            <option
                                                {{ old('status', isset($category->status) ? $category->status : '') == $key ? 'selected="selected"' : '' }}
                                                value="{{ $key }}">
                                                {{ $item }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <div class="col-md-3" style="margin-top:50px">
                <div class="card">
                    <!-- /.card-body -->
                    <div class="card-header">
                        <h3 class="card-title">Hình ảnh </h3>
                    </div>
                    <div class="card-body" style="min-height: 288px">
                        <div class="form-group">
                            <div class="input-group input-file" name="images">
                                <span class="input-group-btn">
                                    <button class="btn btn-default btn-choose" type="button">Chọn tệp</button>
                                </span>
                                <input type="text" class="form-control" placeholder='Không có tệp nào ...' />
                                <span class="input-group-btn"></span>
                            </div>
                            <span class="text-danger ">
                                <p class="mg-t-5">{{ $errors->first('images') }}</p>
                            </span>
                            @if (isset($category) && !empty($category->banner))
                                <img src="{{ asset(pare_url_file($category->banner)) }}" alt=""
                                    class="margin-auto-div img-rounded" id="image_render"
                                    style="height: 150px; width:100%;">
                            @else
                                <img src="{{ asset('admin/dist/img/no-image.png') }}" alt=""
                                    class="margin-auto-div img-rounded" id="image_render"
                                    style="height: 150px; width:100%;">
                            @endif
                        </div>
                        <div class="card-body">
                            <div class="btn-set">
                                <button type="submit" name="submit" class="btn btn-info">
                                    <i class="fa fa-save"></i> Lưu
                                </button>
                                {{-- <button type="reset" name="reset" value="reset" class="btn btn-danger">
                                    <i class="fa fa-undo"></i> Reset
                                </button> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
