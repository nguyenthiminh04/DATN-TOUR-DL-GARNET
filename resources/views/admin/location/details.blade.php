<h5 class="card-title">{{ $location->name }}</h5>
<p><strong>Hình ảnh:</strong> <img src="{{ Storage::url($location->image) }}" alt="Image" width="100"></p>
<p><strong>Mô tả:</strong> {{ $location->description }}</p>  
<p><strong>Nội dung:</strong> {{ $location->content }}</p> 
<p><strong>Trạng thái:</strong> {{ $location->status }}</p>  
<p><strong>Người đăng:</strong> {{ $location->user_id }}</p>
<p><strong>Ngày đăng:</strong> {{ $location->created_at }}</p>
<p><strong>Ngày cập nhật:</strong> {{ $location->updated_at }}</p>