<h5 class="card-title">{{ $categorytour->category_tour }}</h5>
{{-- <p><strong>Hình ảnh:</strong> <img src="{{ Storage::url($categorytour->image) }}" alt="Image" width="100"></p> --}}
<p><strong>Mô tả:</strong> {{ $categorytour->description }}</p>  
<p><strong>Mô tả:</strong> {{ $categorytour->slug }}</p>  
<p><strong>Mô tả:</strong> {{ $categorytour->responsibility }}</p>  
<p><strong>Trạng thái:</strong> {{ $categorytour->status }}</p>  
<p><strong>Ngày đăng:</strong> {{ $categorytour->created_at }}</p>
<p><strong>Ngày cập nhật:</strong> {{ $categorytour->updated_at }}</p>
