<h5 class="card-title">{{ $tour->name }}</h5>
<p><strong>Hình ảnh:</strong> <img src="{{ Storage::url($tour->image) }}" alt="Image" width="100"></p>
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
<p><strong>Ngày đăng:</strong> {{ $tour->created_at }}</p>
<p><strong>Ngày cập nhật:</strong> {{ $tour->updated_at }}</p>

