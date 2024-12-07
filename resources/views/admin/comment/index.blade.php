@extends('admin.layouts.app')

@section('style')
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"> --}}
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css"> --}}
@endsection
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Bình luận</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                                <li class="breadcrumb-item active">Bình luận</li>
                            </ol>
                        </div>
                    </div>

                    <div class="row g-4 mb-3">
                        <div class="col-sm-auto">
                            <div>

                            </div>
                        </div>

                        <div class="col-sm">
                            <form action="" method="GET">
                                <div class="d-flex justify-content-sm-end">

                                    <div class="search-box ms-2">
                                        <input type="text" class="form-control search" placeholder="Search..."
                                            id="searchInput" value="{{ request()->get('search') }}" name="search">
                                        <i class="ri-search-line search-icon"></i>
                                    </div>
                                    <button class="btn btn-dark" style="margin-left:10px ">Search</button>

                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="table-responsive table-card">
                                <div class="table-responsive mt-4 mt-xl-0">
                                    <table id="example" class="table table-striped" style="width:100%">
                                        <thead class="text-muted">
                                            <tr>
                                                <th>STT</th>
                                                <th>Người Bình Luận</th>
                                                <th>Tour Bình Luận</th>
                                                <th>Nội Dung Bình Luận</th>
                                                <th>Trả Lời Bình Luận Của</th>
                                                <th>Trạng thái</th>
                                                <th scope="col">Hành động </th>
                                            </tr>
                                        </thead>
                                        <tbody class="list form-check-all">
                                            @if ($listComments->isEmpty())
                                                <tr>
                                                    <td colspan="11" class="text-center text-muted">
                                                        Trống.
                                                    </td>
                                                </tr>
                                            @else
                                                @foreach ($listComments as $index => $item)
                                                    <tr>
                                                        <td><a href="" class="text-reset">{{ $loop->index + 1 }}</a>
                                                        </td>
                                                        <td>
                                                            {{ $item->user->name }}
                                                        </td>
                                                        <td>{{ $item->tour->name }}</td>
                                                        <td>{{ $item->content }}</td>
                                                        <td>{{ $item->parent ? $item->parent->user->name : 'Bình Luận Chính' }}
                                                        </td>
                                                        <td>
                                                            <button type="button" style="width: 100px;"
                                                                class="btn btn-toggle-status {{ $item->status == 0 ? 'btn-success' : 'btn-danger' }}"
                                                                data-id="{{ $item->id }}"
                                                                onclick="toggleStatus({{ $item->id }})">
                                                                {{ $item->status == 0 ? 'Hiện' : 'Ẩn' }}
                                                            </button>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex gap-2">

                                                                <div class="remove">
                                                                    <div class="remove">
                                                                        <div class="remove">
                                                                            <a href="javascript:void(0);"
                                                                                onclick="confirmDelete({{ $item->id }})"
                                                                                class="btn btn-sm btn-outline-danger remove-item-btn">Xóa</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>

                                </div>
                            </div>

                        </div>
                        <div class="card-body bg-light border-bottom border-top bg-opacity-25">
                            <h5 class="fs-xs text-muted mb-0"></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection


@section('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function confirmDelete(id) {

            if (confirm('Are you sure you want to delete this parent?')) {

                window.location.href = "{{ url('admin/comment/delete/') }}/" + id;
            } else {

                return false;
            }
        }

        function toggleStatus(commentId) {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            $.ajax({
                url: `/admin/comment/status/${commentId}`,
                method: 'POST',
                data: {
                    _token: csrfToken // Chỉ cần truyền CSRF token trong data
                },
                headers: {
                    'X-CSRF-TOKEN': csrfToken // CSRF token cho header
                },
                success: function(response) {
                    if (response.success) {
                        const button = $(`button[data-id="${commentId}"]`);
                        if (response.status == 0) {
                            button.removeClass('btn-danger').addClass('btn-success');
                            button.text('Hiện');
                        } else {
                            button.removeClass('btn-success').addClass('btn-danger');
                            button.text('Ẩn');
                        }

                        Swal.fire({
                            icon: 'success',
                            title: 'Cập nhật trạng thái!',
                            text: 'Trạng thái đã được cập nhật thành công!',
                            showConfirmButton: true,
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Lỗi!',
                            text: 'Không tìm thấy bình luận!',
                            showConfirmButton: true,
                        });
                    }
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Lỗi!',
                        text: 'Đã xảy ra lỗi khi cập nhật trạng thái: ' + error, // Hiển thị lỗi nếu có
                        showConfirmButton: true,
                    });
                    console.error(xhr.responseText || error); // In ra lỗi để debug
                }
            });
        }
    </script>
@endsection
