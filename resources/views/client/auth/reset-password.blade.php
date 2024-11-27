<form method="POST" action="{{ route('reset-mat-khau.xac-nhan', $token) }}">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">
    <div>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
    </div>
    <div>
        <label for="password">Mật khẩu mới:</label>
        <input type="password" name="password" id="password" required>
    </div>
    <div>
        <label for="password_confirmation">Xác nhận mật khẩu:</label>
        <input type="password" name="password_confirmation" id="password_confirmation" required>
    </div>
    <button type="submit">Đặt lại mật khẩu</button>
</form>

@if(session('success'))
    <div>{{ session('success') }}</div>
@endif
