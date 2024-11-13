<div class="container-fluid">
    <form action="{{ route('article.store') }}" method="POST" role="form" enctype="multipart/form-data">
        @csrf
          @if(isset($article)) @method('POST') @endif
        <div class="row">
            <div class="col-md-9" style="margin-top: 50px">
                <div class="card card-primary" style="background-color: rgba(0, 0, 0, 0.507)">
                    <!-- form start -->
                    <div class="card-body">
                        <div class="form-group {{ $errors->first('title') ? 'has-error' : '' }} ">
                            <label for="inputEmail3" class="control-label default">Tiêu đề bài viết <sup class="text-danger">(*)</sup></label>
                            <div>
                                <input type="text" maxlength="180" class="form-control"  placeholder="Tiêu đề bài viết" name="title" value="{{ old('title',isset($article) ? $article->title : '') }}">
                                <span class="text-danger "><p class="mg-t-5">{{ $errors->first('title') }}</p></span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label>Danh mục <sup class="text-danger">(*)</sup></label>
                                    {{-- <select class="custom-select" name="category_id">
                                        <option value="">Chọn danh mục</option>
                                        @foreach($categories as $category)
                                            <option
                                                {{ old('category_id', isset($article->category_id) ? $article->category_id : '') == $category->id ? 'selected="selected"' : '' }}
                                                value="{{ $category->id }}">
                                                {{ $category->c_name }}
                                            </option>
                                        @endforeach
                                    </select> --}}
                                    
                                    {{-- <span class="text-danger"><p class="mg-t-5">{{ $errors->first('category_id') }}</p></span> --}}
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label>Trạng thái</label>
                                    <select class="custom-select" name="active">
                                        @foreach($actives as $key => $active)
                                            <option {{ old('active', isset($article->active) ? $article->active : '') == $key ? 'selected' : '' }} value="{{ $key }}">
                                                {{ $active }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger"><p class="mg-t-5">{{ $errors->first('active') }}</p></span>
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
                        <div class="form-group {{ $errors->first('content') ? 'has-error' : '' }} ">
                            <label for="inputEmail3" class="control-label default">Nội dung bài viết </label>
                            <div>
                                <textarea name="content" id="content" cols="30" rows="10" class="form-control" style="height: 225px;">{{ old('content', isset($article) ? $article->content : '') }}</textarea>
                                <script>
                                    ckeditor(content);
                                </script>
                                @if ($errors->first('content'))
                                    <span class="text-danger">{{ $errors->first('content') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <div class="col-md-3" style="margin-top: 50px">
                <div class="card">
               
                    <div class="card-header">
                        <h3 class="card-title">Hình ảnh </h3>
                    </div>
                    <div class="card-body" style="min-height: 288px">
                        <div class="form-group">
                            <div class="input-group input-file" name="images">
                                <span class="input-group-btn">
                                    <button class="btn btn-default btn-choose" type="button">Chọn tệp</button>
                                </span>
                                <input type="text" class="form-control" placeholder='Không có tệp nào ...'/>
                                <span class="input-group-btn"></span>
                            </div>
                            <span class="text-danger "><p class="mg-t-5">{{ $errors->first('images') }}</p></span>
                            @if(isset($article) && !empty($article->avatar))
                                <img src="{{ asset(pare_url_file($article->avatar)) }}" alt="" class="margin-auto-div img-rounded"  id="image_render" style="height: 150px; width:100%;">
                            @else
                                <img src="{{ asset('admin/dist/img/no-image.png') }}" alt="" class="margin-auto-div img-rounded"  id="image_render" style="height: 150px; width:100%;">
                            @endif
                        </div>
                        <div class="card-body">
                            <div class="btn-set">
                                <button type="submit" name="submit" class="btn btn-info">
                                    <i class="fa fa-save"></i> Lưu bài viết
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </form>
</div>
