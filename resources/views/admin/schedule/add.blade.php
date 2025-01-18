@extends('admin.layouts.app')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Thêm Mới Lịch Trình</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="">Trang quản trị</a></li>
                                <li class="breadcrumb-item active">Thêm mới lịch trình</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xxl-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('schedule.store') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <!-- Tour ID hidden field -->
                                        <input type="hidden" name="tour_id" value="{{ $tourId }}">
                            
                                        <div class="mb-3">
                                            <label for="day" class="form-label">Ngày<span class="text-danger">*</span></label>
                                            <input type="int" id="day" name="day" value="{{ old('day') }}" class="form-control" placeholder="Chọn ngày  cho lịch trình">
                                            @error('day')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                            
                                        <div class="mb-3">
                                            <label for="from_location" class="form-label">Điểm Khởi Hành<span class="text-danger">*</span></label>
                                            <select name="from_location" id="from_location" class="form-select">
                                                <option value="">Chọn điểm khởi hành</option>
                                                @foreach ($locations as $location)
                                                    <option value="{{ $location['name'] }}" >
                                                        {{ $location['name'] }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('from_location')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                            
                                        <div class="mb-3">
                                            <label for="to_location" class="form-label">Điểm Đến<span class="text-danger">*</span></label>
                                            <select name="to_location" id="to_location" class="form-select">
                                                <option value="">Chọn điểm đến</option>
                                                @foreach ($locations as $location)
                                                    <option value="{{ $location['name'] }}">
                                                        {{ $location['name'] }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('to_location')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                            
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Mô Tả<span class="text-danger">*</span></label>
                                            <textarea id="description" name="description" class="form-control" rows="3" placeholder="Nhập mô tả lịch trình...">{{ old('description') }}</textarea>
                                            @error('description')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                            
                                    <div class="col-md-6">
                                        <div class="text-end">
                                            <button class="btn btn-primary" type="submit">Thêm Mới</button>
                                            <a href="{{ route('schedule.index', ['tourId' => $tourId]) }}" class="btn btn-danger">Hủy</a>
                                        </div>
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
