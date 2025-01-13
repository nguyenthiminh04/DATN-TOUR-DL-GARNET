@extends('admin.layouts.app')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <h1>Danh sách hướng dẫn viên</h1>

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Email</th>
                        <th>Quyền hiện tại</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($users as $user)
                  <tr>
                      <td>{{ $user->id }}</td>
                      <td>{{ $user->name }}</td>
                      <td>{{ $user->email }}</td>
                      <td>{{ $user->guide_id ? 'Hướng dẫn viên' : 'Người dùng' }}</td>
                      <td>
                          @if(!$user->guide_id)
                              <form action="{{ route('hdv.assignGuide', $user->id) }}" method="POST">
                                  @csrf
                                  <button type="submit" class="btn btn-primary">Gán quyền hướng dẫn viên</button>
                              </form>
                          @else
                              <span class="badge bg-success">Đã là hướng dẫn viên</span>
                          @endif
                      </td>
                  </tr>
              @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
@endsection