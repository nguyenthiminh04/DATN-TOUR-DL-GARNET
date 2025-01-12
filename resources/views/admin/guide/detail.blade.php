<h5 class="card-title">{{ $detailGuide->name }}</h5>
<p><strong>Email:</strong> {{ $detailGuide->email }}</p>
<p><strong>Địa chỉ:</strong> {{ $detailGuide->address }}</p>
<p><strong>Số điện thoại:</strong> {{ $detailGuide->phone_number }}</p>
<p><strong>Kinh nghiệm:</strong> {{ $detailGuide->experience }}</p>
<p><strong>Kỹ năng:</strong> {{ $detailGuide->skills}}</p>
<p><strong>Trạng thái:</strong> 
    @if ($detailGuide->status == 'active')
        <span >Hoạt động</span>
    @else
        <span >Dừng</span>
    @endif
</p>
<hr>
<p><strong>Số tour đã thực hiện:</strong> {{ $detailGuide->tours_count }}</p>
<p><strong>Các tour đã thực hiện:</strong> </p>


