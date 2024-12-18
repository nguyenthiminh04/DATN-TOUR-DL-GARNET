@extends('admin.layouts.app')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Thêm Mới Tour</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="">Trang quản trị</a></li>
                                <li class="breadcrumb-item active">Thêm mới Tour</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xxl-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('tour.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="image" class="form-label">Hình Ảnh</label>

                                            <input type="file" id="image" name="image" class="form-control"
                                                onchange="showImage(event)">
                                            <img id="img_danh_muc" src="" alt="Hình Ảnh"
                                                style="width: 150px;display:none">
                                        </div>

                                        <div class="mb-3">
                                            <label for="name" class="form-label">Tên Tour<span
                                                    class="text-danger">*</span></label>
                                            <input type="text" id="name" name="name" value="{{ old('name') }}"
                                                class="form-control" placeholder="Nhập tên tour...">
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="journeys" class="form-label">Hành Trình<span
                                                    class="text-danger">*</span></label>
                                            <input type="text" id="journeys" name="journeys"
                                                value="{{ old('journeys') }}" class="form-control"
                                                placeholder="Nhập hành trình tour...">
                                            @error('journeys')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="schedule" class="form-label">Lịch Trình<span
                                                    class="text-danger">*</span></label>
                                            <input type="text" id="schedule" name="schedule"
                                                value="{{ old('schedule') }}" class="form-control"
                                                placeholder="Nhập lịch trình tour...">
                                            @error('schedule')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="number" class="form-label">Số Lượng Chuyến Tour<span
                                                    class="text-danger">*</span></label>
                                            <input type="number" id="number" name="number" value="{{ old('number') }}"
                                                class="form-control" placeholder="Nhập số lượng chuyến tour...">
                                            @error('number')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="move_method" class="form-label">Phương Tiện Di Chuyển<span
                                                    class="text-danger">*</span></label>
                                            <input type="text" id="move_method" name="move_method"
                                                value="{{ old('move_method') }}" class="form-control"
                                                placeholder="Nhập phương tiện di chuyển">
                                            @error('move_method')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="starting_gate" class="form-label">Điểm khởi hành<span
                                                    class="text-danger">*</span></label>
                                            <input type="text" id="starting_gate" name="starting_gate"
                                                value="{{ old('starting_gate') }}" class="form-control"
                                                placeholder="Nhập điểm khởi hành...">
                                            @error('starting_gate')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="description">Mô tả ngắn</label>
                                            <textarea class="form-control" id="description" name="description" value="{{ old('description') }}" rows="2"
                                                placeholder="Nhập mô tả tour..."></textarea>
                                            @error('description')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <div class="form-label">
                                                <label for="details">Nội dung chi tiết</label>
                                                <textarea id="editor" name="content"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="start_date" class="form-label">Ngày Bắt Đầu<span
                                                            class="text-danger">*</span></label>
                                                    <input type="datetime-local" id="start_date" name="start_date"
                                                        value="{{ old('start_date') }}" class="form-control"
                                                        placeholder="Enter instructor name">
                                                    @error('start_date')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="end_date" class="form-label">Ngày Kết Thúc<span
                                                            class="text-danger">*</span></label>
                                                    <input type="datetime-local" id="end_date" name="end_date"
                                                        value="{{ old('end_date') }}" class="form-control"
                                                        placeholder="Lessons">
                                                    @error('end_date')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div><!--end col-->
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="price_old" class="form-label">Giá cũ<span
                                                            class="text-danger">*</span></label>
                                                    <input type="number" id="price_old" name="price_old"
                                                        value="{{ old('price_old') }}" class="form-control"
                                                        placeholder="Mời nhập giá...">
                                                    @error('price_old')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="price_children" class="form-label">Giá trẻ em<span
                                                            class="text-danger">*</span></label>
                                                    <input type="number" id="price_children" name="price_children"
                                                        value="{{ old('price_children') }}" class="form-control"
                                                        placeholder="Nhập giá trẻ em...">
                                                    @error('price_children')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="sale" class="form-label">Giảm Giá<span
                                                            class="text-danger">*</span></label>
                                                    <input type="number" id="sale" name="sale"
                                                        value="{{ old('sale') }}" class="form-control"
                                                        placeholder="Nhập giá khuyến mãi...">
                                                    @error('sale')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="number_guests" class="form-label">Số lượng khách tối
                                                        đa<span class="text-danger">*</span></label>
                                                    <input type="number" id="number_guests" name="number_guests"
                                                        value="{{ old('number_guests') }}" class="form-control"
                                                        placeholder="Nhập số lượng khách...">
                                                    @error('number_guests')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div><!--end col-->

                                            <div class="mb-3 col-6">
                                                <label for="status1" class="form-label">Location<span
                                                        class="text-danger">*</span></label>
                                                <select name="location_id" class="form-select w-100" id="status1">
                                                    <option value="">Chọn địa điểm</option>
                                                    @foreach ($listlocation as $status)
                                                        <option value="{{ $status->id }}"
                                                            {{ old('location_id') == $status->id ? 'selected' : '' }}>
                                                            {{ $status->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('location_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3 col-6">
                                                <label for="status1" class="form-label">Mục Tour<span
                                                        class="text-danger">*</span></label>
                                                <select name="category_tour_id" class="form-select w-100" id="status1">
                                                    <option value="">Chọn Mục Tour</option>
                                                    @foreach ($listCategoryTour as $status)
                                                        <option value="{{ $status->id }}"
                                                            {{ old('category_tour_id') == $status->id ? 'selected' : '' }}>
                                                            {{ $status->category_tour }}</option>
                                                    @endforeach
                                                </select>
                                                @error('category_tour_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3 col-6">
                                                <label for="status1" class="form-label">User<span class="text-danger">*</span></label>
                                                <select name="user_id" class="form-select w-100" id="status1">
                                                    <option value="{{ Auth::user()->id }}" selected>{{ Auth::user()->name }}</option>
                                                </select>
                                                @error('user_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label for="status1" class="form-label">Trạng Thái<span
                                                        class="text-danger">*</span></label>
                                                <select class="form-select" id="status1" name="status">
                                                    <option value="">Trạng Thái</option>
                                                    <option value="1">Hiển Thị</option>
                                                    <option value="0">Ẩn</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="hinh_anh" class="form-label">Album hình ảnh</label>
                                                <i id="add-row"
                                                    class="mdi mdi-plus text-muted fs-18 rounded-2 border ms-3 p-1"
                                                    style="cursor: pointer"></i>
                                                <table class="table align-middle table-nowrap mb-0">
                                                    <tbody id="image-table-body">
                                                        <tr>
                                                            <td class="d-flex align-item-center">
                                                                <img id="preview_0"
                                                                    src="https://static.vecteezy.com/system/resources/previews/000/420/681/original/picture-icon-vector-illustration.jpg"
                                                                    alt="Hình Ảnh SẢn Phẩm" style="width: 50px"
                                                                    class="me-3">
                                                                <input type="file" id="image"
                                                                    name="list_hinh_anh[id_0]" class="form-control"
                                                                    onchange="previewImage(this,0)">
                                                            </td>
                                                            <td>
                                                                <i class="mdi mdi-delete text-muted fs-18 rounded-2 border p-1"
                                                                    style="cursor: pointer"></i>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12" style="margin-bottom: 10px">
                                    <div class="text-end">
                                        <button class="btn btn-primary" type="submit">Thêm mới</button>
                                        <a href="{{ route('tour.index') }}" class="btn btn-danger">Hủy</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
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
