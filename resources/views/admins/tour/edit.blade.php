@extends('admin.layouts.app')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Danh Sách Câu Hỏi</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="">Trang quản trị</a></li>
                                <li class="breadcrumb-item active">Thêm câu hỏi</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <form class="col-6" action="{{ route('tour.update',$tour->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                  <label for="image" class="form-label">Hình Ảnh</label>

                  <input type="file" id="image" name="image" class="form-control"
                      onchange="showImage(event)">
                  <img id="img_danh_muc" src="" alt="Hình Ảnh Sản Phẩm"
                      style="width: 150px;display:none">
              </div>

              <div class="mb-3">
                <label for="name" class="form-label">Name<span class="text-danger">*</span></label>
                <input type="text" id="name" name="name" value="{{ $tour->name }}" value="{{ old('name') }}"  class="form-control" placeholder="Nhập câu hỏi">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
              <label for="title" class="form-label">title<span class="text-danger">*</span></label>
              <input type="text" id="title" name="title" value="{{ $tour->title }}" value="{{ old('title') }}" class="form-control" placeholder="Nhập câu hỏi">
              @error('title')
                  <span class="text-danger">{{ $message }}</span>
              @enderror
          </div>
          <div class="mb-3">
            <label for="journeys" class="form-label">Hành Trình<span class="text-danger">*</span></label>
            <input type="text" id="journeys" name="journeys" value="{{ $tour->journeys }}" value="{{ old('journeys') }}" class="form-control" placeholder="Nhập câu hỏi">
            @error('journeys')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
          <label for="schedule" class="form-label">Lịch Trình<span class="text-danger">*</span></label>
          <input type="text" id="schedule" name="schedule" value="{{ $tour->schedule }}" value="{{ old('schedule') }}" class="form-control" placeholder="Nhập câu hỏi">
          @error('schedule')
              <span class="text-danger">{{ $message }}</span>
          @enderror
      </div>
              <div class="mb-3">
                  <label for="move_method" class="form-label">Phương Tiện Di Chuyển<span
                          class="text-danger">*</span></label>
                  <input type="text" id="move_method" name="move_method" value="{{ $tour->move_method }}" value="{{ old('move_method') }}" class="form-control"
                      placeholder="Enter course title">
                      @error('move_method')
              <span class="text-danger">{{ $message }}</span>
          @enderror
              </div>
              <div class="mb-3">
                  <label for="starting_gate" class="form-label">Cổng khởi hành<span
                          class="text-danger">*</span></label>
                  <input type="text" id="starting_gate" name="starting_gate" value="{{ $tour->starting_gate }}" value="{{ old('starting_gate') }}" class="form-control"
                      placeholder="Enter course title">
                      @error('starting_gate')
              <span class="text-danger">{{ $message }}</span>
          @enderror
              </div>
              
              <div class="mb-3">
                  <label class="form-label" for="description">Mô tả ngắn</label>
                  <textarea class="form-control" placeholder="Enter Description" id="description" name="description"  value="{{ old('description') }}" rows="2">{{ $tour->description }}</textarea>
                  @error('description')
              <span class="text-danger">{{ $message }}</span>
          @enderror
              </div>
              <div class="mb-3">
                  <label class="form-label" for="content">Nội dung chi tiết</label>
                  <textarea class="form-control" placeholder="Enter Description" id="content"name="content"  value="{{ old('content') }}" rows="6">{{ $tour->content }}</textarea>
                  @error('content')
              <span class="text-danger">{{ $message }}</span>
          @enderror
              </div>




              <div class="row">
                  <div class="col-lg-6">
                      <div class="mb-3">
                          <label for="start_date" class="form-label">Ngày Bắt Đầu<span
                                  class="text-danger">*</span></label>
                          <input type="datetime-local" id="start_date" name="start_date" value="{{ $tour->start_date }}" value="{{ old('start_date') }}" class="form-control"
                              placeholder="Enter instructor name" >
                              @error('start_date')
              <span class="text-danger">{{ $message }}</span>
          @enderror
                      </div>
                      
                  </div>
                  <div class="col-lg-6">
                      <div class="mb-3">
                          <label for="end_date" class="form-label">Ngày Kết Thúc<span
                                  class="text-danger">*</span></label>
                          <input type="datetime-local" id="end_date" name="end_date" value="{{ $tour->end_date }}" value="{{ old('end_date') }}" class="form-control"
                              placeholder="Lessons" >
                              @error('end_date')
              <span class="text-danger">{{ $message }}</span>
          @enderror
                      </div>
                  </div><!--end col-->
                  <div class="col-lg-6">
                      <div class="mb-3">
                          <label for="price_old" class="form-label">Giá cũ<span
                                  class="text-danger">*</span></label>
                          <input type="number" id="price_old" name="price_old" value="{{ $tour->price_old }}"  value="{{ old('price_old') }}" class="form-control"
                              placeholder="Enter instructor name" >
                              @error('price_old')
              <span class="text-danger">{{ $message }}</span>
          @enderror
                      </div>
                      
                  </div>
                  <div class="col-lg-6">
                      <div class="mb-3">
                          <label for="price_children" class="form-label">Giá trẻ em<span
                                  class="text-danger">*</span></label>
                          <input type="number" id="price_children" name="price_children" value="{{ $tour->price_children }}" value="{{ old('price_children') }}" class="form-control"
                              placeholder="Enter instructor name"  >
                              @error('price_children')
              <span class="text-danger">{{ $message }}</span>
          @enderror
                      </div>
                      
                  </div>
                  <div class="col-lg-6">
                      <div class="mb-3">
                          <label for="sale" class="form-label">Giảm Giá<span
                                  class="text-danger">*</span></label>
                          <input type="number" id="sale" name="sale" value="{{ $tour->sale }}" value="{{ old('sale') }}" class="form-control"
                              placeholder="Enter instructor name"  >
                              @error('sale')
              <span class="text-danger">{{ $message }}</span>
          @enderror
                      </div>
                      
                  </div>
                  <div class="col-lg-6">
                      <div class="mb-3">
                          <label for="number_guests" class="form-label">Số lượng khách tối đa<span
                                  class="text-danger">*</span></label>
                          <input type="number" id="number_guests" name="number_guests" value="{{ $tour->number_guests }}"  value="{{ old('number_guests') }}" class="form-control"
                              placeholder="Lessons" >
                              @error('number_guests')
              <span class="text-danger">{{ $message }}</span>
          @enderror
                      </div>
                  </div><!--end col-->
                  <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="album_img" class="form-label">Img abum ảnh<span
                                class="text-danger">*</span></label>
                        <input type="number" id="album_img" name="album_img" value="{{ $tour->album_img }}" value="{{ old('album_img') }}" class="form-control"
                            placeholder="Lessons" >
                            @error('album_img')
            <span class="text-danger">{{ $message }}</span>
        @enderror
                    </div>
                </div><!--end col-->
                <div class="mb-3 col-6">
                  <label for="status1" class="form-label">Location<span class="text-danger">*</span></label>
                  <select name="location_id" class="form-select w-100" id="status1">
                      <option value="">Chọn user</option>
                      @foreach ($listlocation as $status)
                          <option value="{{ $status->id }}" {{ $tour->location_id == $status->id ? 'selected' : '' }}>{{ $status->name }}</option>
                      @endforeach
                  </select>
                  @error('location_id')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
              </div>
                  <div class="mb-3 col-6">
                    <label for="status1" class="form-label">User<span class="text-danger">*</span></label>
                    <select name="user_id" class="form-select w-100" id="status1">
                        <option value="">Chọn user</option>
                        @foreach ($listuser as $status)
                            <option value="{{ $status->id }}" {{ $tour->user_id == $status->id ? 'selected' : '' }}>{{ $status->name }}</option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                 
                  <div class="mb-3 col-6">
                    <label for="status1" class="form-label">Status<span class="text-danger">*</span></label>
                    <select name="status" class="form-select w-100" id="status1">
                        <option value="">Người status</option>
                        @foreach ($listStatus as $statuss)
                            <option value="{{ $statuss->id }}" {{ $tour->status == $statuss->id ? 'selected' : '' }}>{{ $statuss->status_name }}</option>
                        @endforeach
                    </select>
                    @error('status')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
              </div><!--end row-->
                

                <div class="mb-3">
                    <a href="{{route('coupons.index')}}" class="btn btn-info">trở về</a>
                    <button class="btn btn-primary" type="submit">Thêm mới</button>
                </div>

            </form>
        </div>
    </div>
@endsection
@section('js')
<script>
     function showImage(event){
        const img_danh_muc = document.getElementById('img_danh_muc');

        const file = event.target.files[0];

        const reader = new FileReader();

        reader.onload = function (){
            img_danh_muc.src = reader.result;
            img_danh_muc.style.display = 'block';


        }
        if (file){
            reader.readAsDataURL(file);
        }
    }
</script>
@endsection