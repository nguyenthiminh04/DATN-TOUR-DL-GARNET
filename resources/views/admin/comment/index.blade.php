@extends('admin.layouts.app')

@section('style')
@endsection
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Card Tables</h4>
                        </div><!-- end card header -->

                        <div class="card-body">

                            <div class="table-responsive table-card">
                                <table class="table align-middle table-nowrap mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th scope="col" style="width: 46px;">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="tableCheck">
                                                    <label class="form-check-label" for="tableCheck"></label>
                                                </div>
                                            </th>
                                            <th scope="col">STT</th>
                                            {{-- <th scope="col">reply_id</th> --}}
                                            <th scope="col">Tên người dùng</th>
                                            <th scope="col">Bài viết</th>
                                            <th scope="col">Tên tour</th>
                                            <th scope="col">Nội dung</th>
                                            <th scope="col">Hình ảnh</th>

                                            <th scope="col">Trạng thái</th>
                                            <th scope="col">Ngày bình luận</th>

                                            <th scope="col" style="width: 150px;">Hoạt động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $data)
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="tableCheck01">
                                                        <label class="form-check-label" for="tableCheck01"></label>
                                                    </div>
                                                </td>
                                                {{-- <td><a href="#" class="fw-medium">#VL2110</a></td> --}}
                                                <td>{{ $loop->iteration }}</td>
                                                {{-- <td>{{ $data->reply_id }}</td> --}}
                                                <td>{{ $data->user_name }}</td>
                                                <td>{{ $data->article_title }}</td>
                                                <td>{{ $data->tour_name }}</td>
                                                <td>{{ $data->content }}</td>

                                                <td><img src="{{ $data->image }}" alt="" width="100px"></td>
                                                <td>
                                                    <button 
                                                        class="btn btn-toggle-status {{ $data->status == 0 ? 'btn-warning' : 'btn-success' }}" 
                                                        data-id="{{ $data->id }}">
                                                        {{ $data->status == 0 ? 'Không hoạt động' : 'Hoạt động' }}
                                                    </button>
                                                </td>
                                                
                                                <td>{{ \Carbon\Carbon::parse($data->created_at)->format('d/m/Y') }}</td>





                                                {{-- <td>
                                                <button type="button" ro class="btn btn-sm btn-light">Delete</button>
                                            </td> --}}
                                                <td>
                                                    <form action="{{ route('comment.force-delete', $data->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger"
                                                            onclick="return confirm('Bạn có chắc muốn xóa không?')">Xóa
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div><!-- end card-body -->
                        {{-- <div class="card-body bg-light border-bottom border-top bg-opacity-25 mt-3">
                            <h5 class="fs-xs text-muted mb-0">HTML Preview</h5>
                        </div> --}}
                    </div>
                </div>

            </div><!-- end card -->
        </div><!-- end col -->
    </div><!-- end row -->
@endsection
@section('style-libs')
    <!--datatable css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css">
@endsection
@section('script-libs')

<script>
    $(document).on('click', '.btn-toggle-status', function () {
        let button = $(this);
        let id = button.data('id');

        $.ajax({
            url: `/admin/comment/toggle-status/${id}`,
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function (response) {
                if (response.success) {
                   
                    if (response.status === 0) {
                        button.removeClass('btn-success').addClass('btn-warning').text('Không hoạt động');
                    } else {
                        button.removeClass('btn-warning').addClass('btn-success').text('Hoạt động');
                    }
                    alert('Đổi trạng thái thành công :333 ')
                } else {
                    alert('Đã có lỗi xảy ra!');
                }
            },
            error: function () {
                alert('Không thể thay đổi trạng thái!');
            }
        });
    });
</script>

@endsection
