@extends('admin.layouts.app')

@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css">
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
                                {{-- <a href="" class="btn btn-success add-btn" id="create-btn"><i
                                        class="bi bi-plus-circle align-baseline me-1"></i>Create</a> --}}
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

            <div id="notification">
                @include('admin.layouts.message')
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
                                                    <th>STT</th>
                                                    <th>Người Bình Luận</th>
                                                    <th>Tour Bình Luận</th>
                                                    <th>Nội Dung Bình Luận</th>
                                                    <th>Trả Lời Bình Luận Của</th>
                                                    <th>Trạng thái</th>
                                                    <th scope="col">Hành động </th>
                                                </tr>
                                            </thead>
                                            <tbody>
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
                                                                {{ $item->status == 0 ? 'Hoạt động' : 'Không hoạt động' }}
                                                            </button>


                                                        </td>
                                                        <td>
                                                            <div class="d-flex gap-2">

                                                                <div class="remove">
                                                                    <div class="remove">
                                                                        <a href="javascript:void(0);"
                                                                            onclick="confirmDelete({{ $item->id }})"
                                                                            class="btn btn-sm btn-outline-danger remove-item-btn">Remove</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                        {{-- <div class="row align-items-center mt-4 pt-3" id="pagination-element"
                                            style="width: 100%; overflow: hidden;">
                                            <div class="col-sm">
                                                <div class="text-muted text-center text-sm-start">
                                                    Showing <span class="fw-semibold">{{ $listComments->count() }}</span>
                                                    of <span class="fw-semibold">{{ $listComments->total() }}</span>
                                                    Results
                                                </div>
                                            </div>

                                            <div class="col-sm-auto mt-3 mt-sm-0">
                                                <div class="pagination-wrap hstack justify-content-center gap-2">

                                                    @if ($listComments->onFirstPage())
                                                        <a class="page-item pagination-prev disabled" href="#">
                                                            Previous
                                                        </a>
                                                    @else
                                                        <a class="page-item pagination-prev"
                                                            href="{{ $listComments->previousPageUrl() }}">
                                                            Previous
                                                        </a>
                                                    @endif

                                                    <ul class="pagination listjs-pagination mb-0">
                                                        @foreach ($listComments->getUrlRange(1, $listComments->lastPage()) as $page => $url)
                                                            <li
                                                                class="{{ $getRecord->currentPage() == $page ? 'active' : '' }}">
                                                                <a class="page" href="{{ $url }}"
                                                                    data-i="{{ $page }}"
                                                                    data-page="{{ $page }}">{{ $page }}</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>

                                                    @if ($getRecord->hasMorePages())
                                                        <a class="page-item pagination-next"
                                                            href="{{ $getRecord->nextPageUrl() }}">
                                                            Next
                                                        </a>
                                                    @else
                                                        <a class="page-item pagination-next disabled" href="#">
                                                            Next
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div> --}}
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
@endsection


@section('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function confirmDelete(id) {

            if (confirm('Are you sure you want to delete this classroom?')) {

                window.location.href = "{{ url('admin/comment/delete/') }}/" + id;
            } else {

                return false;
            }
        }

        // JavaScript
        function toggleStatus(commentId) {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            $.ajax({
                url: `/admin/comment/status/${commentId}`,
                method: 'POST',
                data: {
                    _token: csrfToken
                },
                success: function(response) {
                    if (response.success) {
                        const button = $(`button[data-id="${commentId}"]`);
                        if (response.status == 0) {
                            button.removeClass('btn-danger').addClass('btn-success');
                            button.text('Hoạt động');
                        } else {
                            button.removeClass('btn-success').addClass('btn-danger');
                            button.text('Không hoạt động');
                        }

                        Swal.fire({
                            icon: 'success',
                            title: 'Status Updated!',
                            text: 'The status has been successfully updated!',
                            showConfirmButton: true,
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'Class not found!',
                            showConfirmButton: true,
                        });
                    }
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops!',
                        text: 'Something went wrong!',
                        showConfirmButton: true,
                    });
                    console.error(xhr.responseText || error);
                }
            });
        }
    </script>
@endsection
