@extends('admin.layouts.app')

@section('style')
    <!-- Thêm CSS của Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <form action="{{ route('permission-user.store') }}" method="post" class="col-5">
                @csrf

                <div class="mb-3">
                    <label for="user_id" class="form-label">Chọn người dùng cần gán quyền</label>
                    <select name="user_id" class="form-select" id="user_id" required>
                        <option value="">Chọn người dùng</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="permission_id" class="form-label">Chọn quyền</label>
                    <select name="permission_id[]" class="form-select" id="permission_id" multiple="multiple" required>
                        <option value="">Tìm kiếm quyền</option>
                    </select>
                    @error('permission_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <a href="{{ route('permissions.index') }}" class="btn btn-info">trở về</a>
                    <button class="btn btn-primary" type="submit">Gán quyền</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>
        // Khởi tạo Select2 cho dropdown chọn nhiều người nhận
        $(document).ready(function() {
            $('#permission_id').select2({
                placeholder: 'Tìm kiếm quyền',
                allowClear: true,
                multiple: true, // Cho phép chọn nhiều người dùng
                ajax: {
                    url: '{{ route('permissions.search') }}',
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            q: params.term // Từ khóa tìm kiếm
                        };
                    },
                    processResults: function(data) {
                        return {
                            results: data.map(function(permission) {
                                return {
                                    id: permission.id,
                                    text: permission.name
                                };
                            })
                        };
                    }
                }
            });
        });
    </script>

    <!-- Thêm JS của Select2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
@endsection