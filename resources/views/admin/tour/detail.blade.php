@extends('admin.layouts.app')

@section('style')
    <style>

    </style>
@endsection
@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Chi Tiết Tour: <span style="color: brown">{{ $tour->name }}</span></h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Trang Chủ</a>
                                </li>
                                <li class="breadcrumb-item active">Chi Tiết Tour</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="card">
                <div class="row g-0">
                    <div class="col-xl-9 col-lg-8">
                        <div class="card-body border-end h-100">
                            <div class="row mb-4 pb-2 g-3">
                                <div class="col-auto">
                                    <div class="avatar-sm">
                                        <div class="avatar-title bg-success-subtle rounded">
                                            <img src="{{ Storage::url($tour->image) }}" alt="" class="avatar-xs">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md order-3 order-md-2">
                                    <div>
                                        <h5>{{ $tour->name }}</h5>
                                        <div class="hstack gap-2 gap-md-3 flex-wrap">

                                            <div class="text-muted">Ngày bắt đầu : <span class="fw-medium "
                                                    id="create-date">{{ \Carbon\Carbon::parse($tour->start_date)->format('d/m/Y') }}
                                                </span></div>
                                            <div class="vr"></div>
                                            <div class="text-muted">Ngày kết thúc : <span class="fw-medium"
                                                    id="due-date">{{ \Carbon\Carbon::parse($tour->end_date)->format('d/m/Y') }}
                                                </span></div>
                                            <div class="vr"></div>
                                            {{-- <div class="badge rounded-pill bg-info fs-12" id="ticket-status">New
                                            </div>
                                            <div class="badge rounded-pill bg-danger fs-12" id="ticket-priority">High</div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h6 class="fw-semibold text-uppercase mb-2">Mô tả:</h6>
                            <p class="text-muted mb-4">{{ $tour->description }}</p>

                        </div>
                    </div><!--end col-->
                    <div class="col-xl-3 col-lg-4">
                        <div class="card-header">
                            <h6 class="card-title mb-0">Ticket Details</h6>
                        </div>
                        <div class="card-body mt-2">
                            <div class="table-responsive table-card">
                                <table class="table table-borderless align-middle mb-0">
                                    <tbody>
                                        <tr>
                                            <th>Ticket No</th>
                                            <td>#TBS<span id="t-no">24301901</span> </td>
                                        </tr>
                                        <tr>
                                            <th>Client</th>
                                            <td id="t-client">Themesbrand</td>
                                        </tr>
                                        <tr>
                                            <th>Project</th>
                                            <td>Steex - Admin & Dashboard</td>
                                        </tr>
                                        <tr>
                                            <th>Assigned To:</th>
                                            <td>
                                                <div class="avatar-group">
                                                    <a href="javascript:void(0);" class="avatar-group-item"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        data-bs-trigger="hover" data-bs-original-title="Erica Kernan">
                                                        <img src="assets/images/users/avatar-4.jpg" alt=""
                                                            class="rounded-circle avatar-xs">
                                                    </a>
                                                    <a href="javascript:void(0);" class="avatar-group-item"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        data-bs-trigger="hover" data-bs-original-title="Alexis Clarke">
                                                        <img src="assets/images/users/avatar-10.jpg" alt=""
                                                            class="rounded-circle avatar-xs">
                                                    </a>
                                                    <a href="javascript:void(0);" class="avatar-group-item"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        data-bs-trigger="hover" data-bs-original-title="James Price">
                                                        <img src="assets/images/users/avatar-3.jpg" alt=""
                                                            class="rounded-circle avatar-xs">
                                                    </a>
                                                    <a href="javascript: void(0);" class="avatar-group-item"
                                                        data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                        data-bs-placement="top" data-bs-original-title="Add Members">
                                                        <div class="avatar-xs">
                                                            <div
                                                                class="avatar-title fs-16 rounded-circle bg-light border-dashed border text-primary">
                                                                +
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Status:</th>
                                            <td>
                                                <select class="form-select" id="t-status" data-choices
                                                    data-choices-search-false aria-label="Default select example">
                                                    <option value>Status</option>
                                                    <option value="New" selected>New</option>
                                                    <option value="Open">Open</option>
                                                    <option value="Inprogress">Inprogress</option>
                                                    <option value="Closed">Closed</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Priority</th>
                                            <td>
                                                <span class="badge bg-danger" id="t-priority">High</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Create Date</th>
                                            <td id="c-date">20 Dec, 2023</td>
                                        </tr>
                                        <tr>
                                            <th>Due Date</th>
                                            <td id="d-date">29 Dec, 2023</td>
                                        </tr>
                                        <tr>
                                            <th>Last Activity</th>
                                            <td>14 min ago</td>
                                        </tr>
                                        <tr>
                                            <th>Labels</th>
                                            <td class="hstack text-wrap gap-1">
                                                <span class="badge bg-primary-subtle text-primary">Admin</span>
                                                <span class="badge bg-primary-subtle text-primary">UI</span>
                                                <span class="badge bg-primary-subtle text-primary">Dashboard</span>
                                                <span class="badge bg-primary-subtle text-primary">Design</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div><!--end card-body-->
                        <div class="card-body border-top mt-2">
                            <a href="#!" class="float-end link-effect">View More <i
                                    class="bi bi-arrow-right align-baseline ms-1"></i></a>
                            <h6 class="card-title mb-0">Support Team</h6>
                        </div>
                        <div class="card-body">
                            <div class="d-flex gap-2 align-items-center mb-3">
                                <div class="flex-shrink-0">
                                    <img src="assets/images/users/avatar-1.jpg" alt="" class="avatar-sm rounded">
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="fs-md">Morton Satterfield</h6>
                                    <p class="text-muted mb-0">Admin & Founder</p>
                                </div>
                            </div>
                            <button class="btn btn-secondary w-100" id="agent-chat"><i
                                    class="bi bi-chat-text align-baseline me-1"></i> Get In Touch</button>
                        </div>
                    </div>
                </div><!--end row-->
            </div>

        </div>
        <!-- container-fluid -->
    </div>
@endsection

@section('script')
    <!-- Bạn có thể thêm các script cần thiết ở đây -->
@endsection
