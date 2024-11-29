@extends('admin.layouts.app')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- Nút mở modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tourDetailModal">
                Xem Chi Tiết Tour
            </button>

            <!-- Modal -->
            <div class="modal fade" id="tourDetailModal" tabindex="-1" aria-labelledby="tourDetailModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h5 class="modal-title" id="tourDetailModalLabel">Chi Tiết Tour</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <!-- Modal Body -->
                        <div class="modal-body">
                            <h5 class="card-title">{{ $tour->name }}</h5>
                            <p><strong>Hình ảnh:</strong> {{ Storage::url($tour->image)}}</p>
                            <p><strong>Lịch trình:</strong> {{ $tour->journeys }}</p>
                            <p><strong>Hành trình trình:</strong> {{ $tour->schedule }}</p>
                            <p><strong>Phương tiện di chuyển:</strong> {{ $tour->move_method }}</p>
                            <p><strong>Số ngày:</strong> {{ $tour->starting_gate }}</p>
                            <p><strong>Ngày khởi hành:</strong> {{ $tour->start_date }}</p>
                            <p><strong>Ngày kết thúc:</strong> {{ $tour->end_date }}</p>
                            <p><strong>Số khách:</strong> {{ $tour->number_guests }}</p>
                            <p><strong>Giá người lớn:</strong> {{ $tour->price_old }}</p>
                            <p><strong>Giá trẻ em:</strong> {{ $tour->price_children }}</p>
                            <p><strong>Sale:</strong> {{ $tour->sale }}</p>
                            <p><strong>Lượt xem:</strong> {{ $tour->view }}</p>                          
                            <p><strong>Mô tả:</strong> {{ $tour->description }}</p>  
                            <p><strong>Nội dung:</strong> {{ $tour->content }}</p> 
                            <p><strong>Địa điểm:</strong> {{ $tour->location_id }}</p>
                            <p><strong>Người đăng:</strong> {{ $tour->user_id }}</p>
                            <p><strong>Số lượng ảnh :</strong> {{ $tour->album_img }}</p>
                        </div>

                        <!-- Modal Footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                            <a href="{{ route('tour.index') }}" class="btn btn-primary">Quay lại danh sách</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

