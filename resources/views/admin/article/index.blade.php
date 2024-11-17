@extends('admin.layouts.app')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Danh sách địa điểm</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('home-admin') }}">Trang quản trị</a></li>
                                <li class="breadcrumb-item active">Danh sách địa điểm</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-tools">
                                <div class="btn-group">
                                    <a href="{{ route('article.create') }}" class="btn btn-primary">Thêm bài viết</a>
                                    {{-- class="btn btn-block btn-info"><i class="fa fa-plus"></i> Tạo mới</button></a> --}}
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table id="locationTable" class="table table-hover text-nowrap table-bordered">
                                <thead>
                                    <tr>
                                        <th width="4%" class=" text-center">STT</th>
                                        <th>Tiêu đề bài viết</th>
                                        <th>Hình ảnh</th>
                                        <th>Mô tả</th>
                                        <th>Nội dung</th>
                                        <th>Ngày tạo</th>
                                        <th>Ngày cập nhật</th>
                                        <th class="text-center">Trạng thái</th>
                                        <th class="text-center">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($articles as $index => $article)
                                        <tr>
                                            <td class="text-center" style="vertical-align: middle;">{{ $index + 1 }}</td>
                                            <td class="title-content" style="vertical-align: middle;width: 30%">
                                                {{ $article->title }}
                                            </td>
                                            <td style="vertical-align: middle; width:20%;">
                                                <img src="{{ asset($article->image ?: 'admins/icon/img/no-image.png') }}"
                                                    alt="Hình ảnh" class="img-rounded" style="height: 100px; width:100%;">
                                            </td>
                                            <td class="title-content" style="vertical-align: middle;width: 30%">
                                                {{ $article->description }}
                                            </td>
                                            <td class="title-content" style="vertical-align: middle;width: 30%">
                                                {{ $article->content }}
                                            </td>

                                            <td class=" text-center" style="vertical-align: middle;">
                                                {{ $article->created_at }}</td>

                                                <td class=" text-center" style="vertical-align: middle;">
                                                    {{ $article->updated_at }}</td>
                                            <td class="text-center" style="vertical-align: middle;">
                                                {{ $status[$article->status] }}
                                            </td>


                                            <td class="text-center" style="vertical-align: middle;">
                                                <a class="btn btn-primary btn-sm"
                                                    href="{{ route('article.edit', $article->id) }}">
                                                    Sửa <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <form action="{{ route('article.destroy', $article->id) }}"
                                                    method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">Xóa</button>
                                                </form>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @if ($articles->hasPages())
                                <div class="pagination float-right margin-20">
                                    {{ $articles->appends(request()->query())->links() }}
                                </div>
                            @endif
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
@stop

@section('style-libs')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/dataTables.css') }}" />
@endsection

@section('script-libs')
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/moment.min.js"></script>
@endsection

@section('script')
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#articleTable').DataTable({
                processing: true,
                serverSide: false, // We are using pagination handled by Laravel
                language: {
                    "sEmptyTable": "Không có dữ liệu trong bảng",
                    "sInfo": "Hiển thị _START_ đến _END_ trong tổng số _TOTAL_ mục",
                    "sInfoEmpty": "Hiển thị 0 đến 0 trong tổng số 0 mục",
                    "sInfoFiltered": "(đã lọc từ _MAX_ mục)",
                    "sLengthMenu": "Hiển thị _MENU_ mục",
                    "sLoadingRecords": "Đang tải...",
                    "sProcessing": "Đang xử lý...",
                    "sSearch": "Tìm kiếm:",
                    "sZeroRecords": "Không tìm thấy kết quả nào",
                    "oPaginate": {
                        "sFirst": "Đầu tiên",
                        "sLast": "Cuối cùng",
                        "sNext": "Tiếp theo",
                        "sPrevious": "Trước"
                    },
                    "oAria": {
                        "sSortAscending": ": kích hoạt để sắp xếp cột theo thứ tự tăng dần",
                        "sSortDescending": ": kích hoạt để sắp xếp cột theo thứ tự giảm dần"
                    }
                }
            });

            // $('#example').on('click', '#deleteItem', function() {
            //     let id = $(this).data('id');
            //     Swal.fire({
            //         title: 'Bạn có chắc muốn xóa?',
            //         text: "Bạn sẽ không thể hoàn tác sau khi xóa!",
            //         icon: 'warning',
            //         showCancelButton: true,
            //         confirmButtonColor: '#3085d6',
            //         cancelButtonColor: '#d33',
            //         confirmButtonText: 'Xác nhận',
            //         cancelButtonText: 'Hủy'
            //     }).then((result) => {
            //         if (result.isConfirmed) {
            //             $.ajax({
            //                 url: "".replace(
            //                     ':id', id),
            //                 method: "DELETE",
            //                 dataType: "json",
            //                 data: {
            //                     _token: "{{ csrf_token() }}",
            //                     id: id
            //                 },
            //                 success: function(res) {
            //                     if (res.status) {
            //                         table.ajax.reload();
            //                         Swal.fire('Xóa thành công!', '', 'success');
            //                     } else {
            //                         Swal.fire(res.message, '', 'error');
            //                     }
            //                 },
            //                 error: function(xhr, status, error) {
            //                     console.error('Lỗi AJAX:', error);
            //                     Swal.fire('Có lỗi xảy ra!', '', 'error');
            //                 }
            //             });
            //         }
            //     })
            // });

        });
    </script>
@endsection
