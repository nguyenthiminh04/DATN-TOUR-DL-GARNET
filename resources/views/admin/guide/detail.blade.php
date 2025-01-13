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
<p><strong>Các tour đã thực hiện:</strong></p>
<ul>
    @foreach ($detailGuide->tours as $tour)
        <li>{{ $tour->name }}</li>
    @endforeach
</ul>

{{-- <p><strong>Các tour đã thực hiện:</strong></p>
@if ($detailGuide->tours->isEmpty())
    <p>Hướng dẫn viên chưa thực hiện tour nào với trạng thái thanh toán là 'Hoàn tất'.</p>
@else
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Tên tour</th>
                <th>Ngày bắt đầu</th>
                <th>Ngày kết thúc</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($detailGuide->tours as $index => $tour)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $tour->name }}</td>
                    <td>{{ $tour->start_date }}</td>
                    <td>{{ $tour->end_date }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif


 --}}
