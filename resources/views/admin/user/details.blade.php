<h5 class="card-title">{{ $user->name }}</h5>
<p><strong>Hình ảnh:</strong> <img src="{{ Storage::url($user->avatar) }}" alt="Image" width="100"></p>
<p><strong>Email:</strong> {{ $user->email }}</p>
<p><strong>Địa chỉ:</strong> {{ $user->address }}</p>
<p><strong>Giới tính:</strong> {{ $user->gender }}</p>
<p><strong>Số điện thoại:</strong> {{ $user->phone }}</p>
<p><strong>Ngày sinh:</strong> {{ $user->birth }}</p>
<p><strong>Trạng thái:</strong> {{ $user->status }}</p>
<p><strong>Ngày đăng:</strong> {{ $user->created_at }}</p>
<p><strong>Ngày cập nhật:</strong> {{ $user->updated_at }}</p>

