@extends('admin.layouts.app')
@section('style')
    <style>
        .status-select {
            width: 100%;
            padding: 10px;

            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #f9f9f9;
            color: #333;
            outline: none;
            transition: all 0.3s ease-in-out;
        }

        .status-select:hover {
            border-color: #00ff40;
            background-color: #e9f7ff;
        }

        .status-select:focus {
            border-color: #007bff;
            background-color: #fff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        .status-select option {
            padding: 10px;
            font-size: 16px;
            background-color: #fff;
            color: #333;
        }

        .status-select option:checked {
            background-color: #007bff;
            color: white;
        }
    </style>
@endsection
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Tư vấn liên hệ (Tổng: {{ $advisory->total() }})</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="">Trang chủ</a></li>
                                <li class="breadcrumb-item active">Tư vấn</li>
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
                                        <input type="text" class="form-control search" placeholder="Tìm kiếm..."
                                            id="searchInput" value="{{ request()->get('search') }}" name="search">
                                        <i class="ri-search-line search-icon"></i>
                                    </div>
                                    <button class="btn btn-dark" style="margin-left:10px ">Tìm kiếm</button>

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
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="table-responsive mt-4 mt-xl-0">

                                        <table class="table table-hover table-striped align-middle table-nowrap mb-0">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Tour</th>
                                                    <th scope="col">Họ và Tên</th>
                                                    <th scope="col">Số điện thoại</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Nội dung</th>
                                                    <th scope="col">Trạng thái</th>
                                                    <th scope="col">Hành động</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ($advisory->isEmpty())
                                                    <tr>
                                                        <td colspan="11" class="text-center text-muted">
                                                            No records found.
                                                        </td>
                                                    </tr>
                                                @else
                                                    @foreach ($advisory as $loop => $item)
                                                        <tr>
                                                            <td class="fw-medium">{{ $loop->index + 1 }}</td>
                                                            <td>{{ $item->tour_name }}</td>
                                                            <td>{{ $item->name }}</td>
                                                            <td>{{ $item->email }}</td>
                                                            <td>{{ $item->phone_number }}</td>
                                                            <td>{{ $item->content }}</td>
                                                            <td>
                                                                <select class="form-control status-select"
                                                                    data-advisory-id="{{ $item->id }}">
                                                                    <option value="Đang chờ xử lý"
                                                                        {{ $item->status == 'Đang chờ xử lý' ? 'selected' : '' }}>
                                                                        Đang chờ xử lý</option>
                                                                    <option value="Đang tư vấn"
                                                                        {{ $item->status == 'Đang tư vấn' ? 'selected' : '' }}>
                                                                        Đang tư vấn</option>
                                                                    <option value="Đã xác nhận"
                                                                        {{ $item->status == 'Đã xác nhận' ? 'selected' : '' }}>
                                                                        Đã xác nhận</option>
                                                                    <option value="Đã hoàn tất"
                                                                        {{ $item->status == 'Đã hoàn tất' ? 'selected' : '' }}>
                                                                        Đã hoàn tất</option>
                                                                    <option value="Chờ bổ sung thông tin"
                                                                        {{ $item->status == 'Chờ bổ sung thông tin' ? 'selected' : '' }}>
                                                                        Chờ bổ sung thông tin</option>
                                                                    <option value="Hủy bỏ"
                                                                        {{ $item->status == 'Hủy bỏ' ? 'selected' : '' }}>
                                                                        Hủy bỏ</option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <div class="d-flex gap-2">
                                                                    <div class="detail">
                                                                        <a href="javascript:void(0);"
                                                                            class="btn btn-sm btn-outline-info remove-item-btn"
                                                                            onclick="showDetail({{ $item->id }})">Chi
                                                                            tiết</a>
                                                                    </div>
                                                                    <div class="remove">
                                                                        <a href="javascript:void(0);"
                                                                            onclick="confirmDelete({{ $item->id }})"
                                                                            class="btn btn-sm btn-outline-danger remove-item-btn">Xóa</a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>


                                        <div class="row align-items-center mt-4 pt-3" id="pagination-element"
                                            style="width: 100%; overflow: hidden;">
                                            <div class="col-sm">
                                                <div class="text-muted text-center text-sm-start">
                                                    Hiển thị <span class="fw-semibold">{{ $advisory->count() }}</span>
                                                    trên <span class="fw-semibold">{{ $advisory->total() }}</span>
                                                    mục
                                                </div>
                                            </div>

                                            <div class="col-sm-auto mt-3 mt-sm-0">
                                                <div class="pagination-wrap hstack justify-content-center gap-2">

                                                    @if ($advisory->onFirstPage())
                                                        <a class="page-item pagination-prev disabled" href="#">
                                                            Trước
                                                        </a>
                                                    @else
                                                        <a class="page-item pagination-prev"
                                                            href="{{ $advisory->previousPageUrl() }}">
                                                            Trước
                                                        </a>
                                                    @endif

                                                    <ul class="pagination listjs-pagination mb-0">
                                                        @foreach ($advisory->getUrlRange(1, $advisory->lastPage()) as $page => $url)
                                                            <li
                                                                class="{{ $advisory->currentPage() == $page ? 'active' : '' }}">
                                                                <a class="page" href="{{ $url }}"
                                                                    data-i="{{ $page }}"
                                                                    data-page="{{ $page }}">{{ $page }}</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>

                                                    @if ($advisory->hasMorePages())
                                                        <a class="page-item pagination-next"
                                                            href="{{ $advisory->nextPageUrl() }}">
                                                            Tiếp
                                                        </a>
                                                    @else
                                                        <a class="page-item pagination-next disabled" href="#">
                                                            Tiếp
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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

    <!-- Varying Modal Content -->

@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function confirmDelete(id) {

            if (confirm('Bạn có muốn xóa không?')) {

                window.location.href = "{{ url('admin/advisory/delete/') }}/" + id;
            } else {

                return false;
            }
        }
        $(document).ready(function() {

            $('.status-select').change(function() {
                var advisoryId = $(this).data('advisory-id');
                var newStatus = $(this).val();


                $.ajax({
                    url: '/admin/advisory/status/' +
                        advisoryId,
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        status: newStatus
                    },
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Cập nhật trạng thái thành công!',
                                showConfirmButton: false,
                                timer: 1500
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Đã có lỗi xảy ra. Vui lòng thử lại!',
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                    },
                    error: function(xhr, status, error) {

                        Swal.fire({
                            icon: 'error',
                            title: 'Đã có lỗi xảy ra. Vui lòng thử lại!',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                });
            });
        });
    </script>
@endsection
