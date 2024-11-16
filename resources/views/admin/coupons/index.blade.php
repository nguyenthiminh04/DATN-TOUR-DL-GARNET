@extends('admin.layouts.app')

@section('style')
@endsection
@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Danh Sách Phiếu Giảm Giá</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Courses</a></li>
                                <li class="breadcrumb-item active">List View</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card" id="coursesList">
                        <div class="card-body">
                            <div class="row align-items-center g-2">
                                <div class="col-lg-3 me-auto">
                                    {{-- <h6 class="card-title mb-0">Instructors List <span
                                            class="badge bg-primary ms-1 align-baseline">9999</span></h6> --}}
                                </div><!--end col-->
                                <div class="col-lg-2">
                                    <div class="search-box">
                                        <input type="text" class="form-control search"
                                            placeholder="Search for courses, price or something...">
                                        <i class="ri-search-line search-icon"></i>
                                    </div>
                                </div><!--end col-->
                                <div class="col-lg-auto">
                                    <div class="hstack flex-wrap gap-2">
                                        <button class="btn btn-subtle-danger d-none" id="remove-actions"
                                            onClick="deleteMultiple()"><i class="ri-delete-bin-2-line"></i></button>
                                            <a href="{{route('coupons.create')}}" class="btn btn-success"><i data-feather="plus-square"></i>
                                                Thêm chức vụ
                                            </a>
                                        <div>
                                            <button type="button" class="btn btn-info" data-bs-toggle="offcanvas"
                                                data-bs-target="#courseFilters" aria-controls="courseFilters"><i
                                                    class="bi bi-funnel align-baseline me-1"></i> Filter</button>
                                            <a href="apps-learning-grid.html" class="btn btn-subtle-primary btn-icon"><i
                                                    class="bi bi-grid"></i></a>
                                            <a href="apps-learning-list.html"
                                                class="btn btn-subtle-primary active btn-icon"><i
                                                    class="bi bi-list-task"></i></a>
                                        </div>
                                    </div>
                                </div><!--end col-->
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive table-card">
                                <table id="example" class="table table-striped" style="width:100%">
                                    <thead class="text-muted">
                                        <tr>

                                            <th>ID</th>

                                            <th>Tên phiếu</th>

                                            <th>Mã</th>

                                            <th>Ngày bắt đầu</th>

                                            <th>Ngày kết thúc</th>

                                            <th>Tỉ lệ</th>

                                            <th>Tour áp dụng</th>

                                            <th scope="col">Trạng thái</th>
                                            <th scope="col">Hành Động</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list form-check-all">
                                        @foreach ($listcoupons as $index => $item)
                                        <tr>


                                            <td><a href="" class="text-reset">{{ $item->id }}</a></td>

                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->code }}</td>
                                            <td>{{ $item->start_date }}</td>
                                            <td>{{ $item->end_date }}</td>
                                            <td>{{ $item->percentage_price }}</td>
                                            <td>{{ $item->tour->name }}</td>

                                            <td class="{{ $item->status == 1 ? 'text-success' : 'text-danger' }}">
                                                {{ $item->status == 1 ? 'Hiển thị' : 'Ẩn' }}</td>
                                            <td>
                                                <ul class="d-flex gap-2 list-unstyled mb-0">
                                                    <li>
                                                        <a href="apps-learning-overview.html"
                                                            class="btn btn-subtle-primary btn-icon btn-sm "><i
                                                                class="ph-eye"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="{{route('coupons.edit',$item->id)}}"><i class="mdi mdi-pencil text-muted fs-18 rounded-2 border p-1 me-1"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="#deleteRecordModal{{ $item->id }}" data-bs-toggle="modal" class="btn btn-subtle-danger btn-icon btn-sm remove-item-btn"><i class="ph-trash"></i></a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                             <!-- Xóa User -->
        <div id="deleteRecordModal{{ $item->id }}" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="btn-close" id="deleteRecord-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body p-md-5">
                      <div class="text-center">
                          <div class="text-danger">
                              <i class="bi bi-trash display-5"></i>
                          </div>
                          <div class="mt-4">
                              <h4 class="mb-2">Xóa mục này ?</h4>
                              <p class="text-muted mx-3 mb-0">Bạn có chắc chắn muốn xóa không?</p>
                          </div>
                      </div>
                      <div class="d-flex gap-2 justify-content-center mt-4 pt-2 mb-2">
                        <form action="{{ route('coupons.destroy', $item->id) }}"
                          method="POST" class="d-inline">
                          @csrf
                          @method('DELETE')
                          <button type="button" class="btn w-sm btn-light btn-hover" data-bs-dismiss="modal">Đóng</button>
                          <button type="submit" class="btn w-sm btn-danger btn-hover" id="delete-record">Vâng, Tôi chắc chắn!</button>
                        </form>
                      </div>
                  </div>
              </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
      </div>
 
                                        @endforeach
                                    </tbody><!-- end tbody -->
                                </table><!-- end table -->
                                <div class="noresult" style="display: none">
                                    <div class="text-center py-4">
                                        <i class="ph-magnifying-glass fs-1 text-primary"></i>
                                        <h5 class="mt-2">Sorry! No Result Found</h5>
                                        <p class="text-muted mb-0">We've searched more than 150+ Courses We did not find
                                            any Courses for you search.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row align-items-center mt-4 pt-2" id="pagination-element">
                                <div class="col-sm">
                                    <div class="text-muted text-center text-sm-start">
                                        Showing <span class="fw-semibold">10</span> of <span class="fw-semibold">15</span>
                                        Results
                                    </div>
                                </div><!--end col-->
                                <div class="col-sm-auto mt-3 mt-sm-0">
                                    <div class="pagination-wrap hstack gap-2 justify-content-center">
                                        <a class="page-item pagination-prev disabled" href="javascript:void(0)">
                                            Previous
                                        </a>
                                        <ul class="pagination listjs-pagination mb-0"></ul>
                                        <a class="page-item pagination-next" href="javascript:void(0)">
                                            Next
                                        </a>
                                    </div>
                                </div><!--end col-->
                            </div><!--end row-->
                        </div>
                    </div><!--end card-->
                </div><!--end col-->
            </div><!--end row-->
            
            
           
            
        </div>
        <!-- container-fluid -->


    </div>
@endsection
@section('style-libs')
    <!--datatable css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css">
@endsection
@section('script-libs')
    <!--datatable js-->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>
    <script>
        $('#example').DataTable({
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
    </script>
@endsection
@section('script')

@section('script')
    <script>
        $(document).ready(function() {
            // thêm faq
            $('#addCouponsForm').on('submit', function(e) {
                e.preventDefault(); // Ngăn chặn submit mặc định của form

                // Xóa thông báo lỗi cũ
                $('#question-error').text('');
                $('#answer-error').text('');
                $('#status-error').text('');

                $.ajax({
                    url: "{{ route('coupons.store') }}", // URL action của form
                    type: 'POST',
                    data: $(this).serialize(), // Lấy dữ liệu từ form và bao gồm CSRF token
                    success: function(response) {
                        // Xử lý khi request thành công (có thể đóng modal, load lại danh sách FAQ)
                        // $('#addFaq').modal('hide');
                        // alert('Câu hỏi đã được thêm thành công!');
                        window.location.reload();
                    },
                    error: function(xhr) {
                        // Xử lý khi request bị lỗi
                        if (xhr.status === 422) { // Lỗi xác thực
                            let errors = xhr.responseJSON.errors;
                            if (errors.question) {
                                $('#question-error').text(errors.question[0]);
                            }
                            if (errors.answer) {
                                $('#answer-error').text(errors.answer[0]);
                            }
                            if (errors.status_id) {
                                $('#status-error').text(errors.status_id[0]);
                            }
                        } else {
                            console.log("Có lỗi xảy ra:", xhr.responseText);
                        }
                    }
                });
            });

            // xóa faq

            $('.remove-item-btn').on('click', function() {
                // Lấy ID của item cần xóa từ thuộc tính data-id
                const itemId = $(this).data('id');
                const url = "{{ route('coupons.destroy', ':id') }}"; // Tạo URL với placeholder :id
                const deleteUrl = url.replace(':id', itemId); // Thay thế :id bằng itemId
                $('#deleteForm').attr('action', deleteUrl); // Cập nhật action của form xóa 
            });
        });
    </script>
@endsection
