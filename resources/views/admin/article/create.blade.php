@extends('admin.layouts.app')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Danh Sách Bài Viết</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="">Trang quản trị</a></li>
                                <li class="breadcrumb-item active">Sửa bài viết</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            <!-- end page title -->
            <form class="col-6" action="{{ route('article.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="img_thumb" class="form-label">Hình ảnh</label>

                    <input type="file" id="img_thumb" name="img_thumb" class="form-control" onchange="showImage(event)">
                    <img id="img_thumb" src="" alt="article" style="width: 150px;display:none">
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Tiêu đề bài viết<span class="text-danger">*</span></label>
                    <input type="text" id="title" name="title" value="{{ old('title') }}" class="form-control"
                        placeholder="Nhập câu trả lời">
                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="slug" class="form-label">Đường dẫn<span class="text-danger">*</span></label>
                    <input type="text" id="slug"name="slug" value="{{ old('slug') }}" class="form-control"
                        placeholder="Nhập câu trả lời">
                    @error('slug')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="show_home">Hiển thị trên trang chủ</label>
                    <select name="show_home" id="show_home" class="form-control">
                        <option value=""></option>
                        <option value="1" {{ old('show_home') == '1' ? 'selected' : '' }}>Có</option>
                        <option value="0" {{ old('show_home') == '0' ? 'selected' : '' }}>Không</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="description">Mô tả ngắn</label>
                    <textarea class="form-control" id="description" name="description" value="{{ old('description') }}" rows="2"
                        placeholder="Nhập mô tả article..."></textarea>
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                {{-- <div class="mb-3">
                  <label class="form-label" for="content">Nội dung chi tiết</label>
                  <textarea class="form-control" id="content"name="content" value="{{ old('content') }}" rows="6" placeholder="Nhập mô tả article..."></textarea>
                  @error('content')
              <span class="text-danger">{{ $message }}</span>
          @enderror
              </div> --}}
                <div class="mb-3">


                    <div class="form-label">
                        <label for="details">Nội dung chi tiết</label>
                        <textarea id="editor" name="content"></textarea>
                    </div>
                </div>


                <div class="mb-3 col-6">
                    <label for="status1" class="form-label">Chọn danh mục<span class="text-danger">*</span></label>
                    <select name="category_id" class="form-select w-100" id="status1">
                        <option value="">Chọn danh mục</option>
                        @foreach ($listCategory as $status)
                            <option value="{{ $status->id }}" {{ old('category_id') == $status->id ? 'selected' : '' }}>
                                {{ $status->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3 col-6">
                    <label for="status1" class="form-label">User<span class="text-danger">*</span></label>
                    <select name="user_id" class="form-select w-100" id="status1">
                        <option value="">Chọn User</option>
                        @foreach ($listUser as $status)
                            <option value="{{ $status->id }}" {{ old('user_id') == $status->id ? 'selected' : '' }}>
                                {{ $status->name }}</option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="status1" class="form-label">Trạng Thái<span class="text-danger">*</span></label>
                    <select class="form-select" id="status1" name="status">
                        <option value="">Trạng Thái</option>
                        <option value="1">Hiển Thị</option>
                        <option value="0">Ẩn</option>
                    </select>
                </div>




                <div class="mb-3">
                    <a href="{{ route('article.index') }}" class="btn btn-info">Trở về</a>
                    <button class="btn btn-primary" type="submit">Thêm mới</button>
                </div>

            </form>
        </div>
    </div>
@endsection
@section('script')
    <script>
        function showImage(event) {
            const img_danh_muc = document.getElementById('img_danh_muc');

            const file = event.target.files[0];

            const reader = new FileReader();

            reader.onload = function() {
                img_danh_muc.src = reader.result;
                img_danh_muc.style.display = 'block';


            }
            if (file) {
                reader.readAsDataURL(file);
            }
        }
    </script>
    {{-- Thêm album ảnh --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            var rowCount = 1;

            document.getElementById('add-row').addEventListener('click', function() {
                var tableBody = document.getElementById('image-table-body');
                var newRow = document.createElement('tr');
                newRow.innerHTML = `
         <td class="d-flex align-item-center">
        <img id="preview_${rowCount}" src="https://static.vecteezy.com/system/resources/previews/000/420/681/original/picture-icon-vector-illustration.jpg" alt="Hình Ảnh SẢn Phẩm"
        style="width: 50px" class="me-3">
        <input type="file" id="hinh_anh" name="list_hinh_anh[id_${rowCount}]" class="form-control"
        onchange="previewImage(this,${rowCount})">
    
    
    
    </td>
    <td>
        <i 
            class="mdi mdi-delete text-muted fs-18 rounded-2 border p-1" style="cursor: pointer" onclick="removeRow(this)"></i>
    </td>`;
                tableBody.appendChild(newRow);
                rowCount++;

            })



        });

        function previewImage(input, rowIndex) {

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    document.getElementById(`preview_${rowIndex}`).setAttribute('src', e.target.result)


                }

                reader.readAsDataURL(input.files[0]);

            }

        }

        function removeRow(item) {
            var row = item.closest('tr');
            row.remove();
        }
        CKEDITOR.replace('content');
    </script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'), {
                ckfinder: {
                    uploadUrl: '/upload-image?_token={{ csrf_token() }}', // URL để xử lý upload ảnh
                },
                toolbar: [
                    'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList',
                    'blockQuote', '|', 'insertTable', 'uploadImage', '|', 'undo', 'redo'
                ],
                image: {
                    toolbar: ['imageTextAlternative', 'imageStyle:full', 'imageStyle:side'],
                },
            })
            .catch(error => {
                console.error(error);
            });
    </script>
    <script src="https:////cdn.ckeditor.com/4.8.0/basic/ckeditor.js"></script>
@endsection