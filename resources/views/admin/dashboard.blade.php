@extends('admin.layouts.app')

@section('style')
@endsection
@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-4">
                    <div class="card card-height-100 border-0 overflow-hidden">
                        <div class="card-body p-0">
                            <div class="row g-0">
                                <div class="col-md-6">
                                    <!-- card -->
                                    <div class="card shadow-none border-end-md border-bottom rounded-0 mb-0">
                                        <div class="card-body">
                                            <div class="dropdown float-end">
                                                <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    <span class="text-muted fs-lg"><i
                                                            class="mdi mdi-dots-vertical align-middle"></i></span>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="hom-qua">Hôm nay</a>
                                                    <a class="dropdown-item" href="tuan-truoc">Tuần trước</a>
                                                    <a class="dropdown-item" href="thang-nay">Tháng này</a>
                                                    <a class="dropdown-item" href="nam-nay">Năm nay</a>
                                                </div>
                                            </div>
                                            <div class="avatar-sm">
                                                <span
                                                    class="avatar-title bg-primary-subtle text-primary rounded-circle fs-3">
                                                    <i class="ph-wallet"></i>
                                                </span>
                                            </div>
                                            <div class="mt-4">
                                                <p class="text-uppercase fw-medium text-muted text-truncate fs-sm">
                                                    Doanh thu</p>
                                                <h4 class="fw-semibold mb-3"><span class="counter-value"
                                                        data-target="{{ $totalMoney }}">0</span> đ </h4>
                                                <div class="d-flex flex-wrap align-items-center gap-2">
                                                    <h5 class="text-success fs-xs mb-0">
                                                        {{ $percentage }}%
                                                    </h5>
                                                    <p class="text-muted mb-0">so với ngày trước</p>
                                                </div>
                                            </div>
                                        </div><!-- end card body -->
                                    </div><!-- end card -->
                                </div><!-- end col -->
                                <div class="col-md-6">
                                    <!-- card -->
                                    <div class="card shadow-none border-bottom rounded-0 mb-0">
                                        <div class="card-body">
                                            <div class="dropdown float-end">
                                                <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    <span class="text-muted fs-lg"><i
                                                            class="mdi mdi-dots-vertical align-middle"></i></span>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="q2">Hôm nay</a>
                                                    <a class="dropdown-item" href="1#">Tuần trước</a>
                                                    <a class="dropdown-item" href="#1">Tháng này</a>
                                                    <a class="dropdown-item" href="1#">Năm nay</a>
                                                </div>
                                            </div>
                                            <div class="avatar-sm">
                                                <span class="avatar-title bg-dark-subtle text-dark rounded-circle fs-3">
                                                    <i class="ph-bag"></i>
                                                </span>
                                            </div>
                                            <div class="mt-4">
                                                <p class="text-uppercase fw-medium text-muted text-truncate fs-sm">
                                                    Orders</p>
                                                <h4 class="fw-semibold mb-3"><span class="counter-value"
                                                        data-target="{{ $OderCount }}">0</span></h4>
                                                <div class="d-flex flex-wrap align-items-center gap-2">
                                                    <h5 class="text-success fs-xs mb-0"></i>
                                                        {{ $percentageChange }} %
                                                    </h5>
                                                    <p class="text-muted mb-0">so với ngày trước</p>
                                                </div>
                                            </div>
                                        </div><!-- end card body -->
                                    </div><!-- end card -->
                                </div><!-- end col -->
                                <div class="col-md-6">
                                    <!-- card -->
                                    <div class="card shadow-none border-end-md rounded-0 mb-0">
                                        <div class="card-body">
                                            <div class="dropdown float-end">
                                                <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    <span class="text-muted fs-lg"><i
                                                            class="mdi mdi-dots-vertical align-middle"></i></span>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="#1">Today</a>
                                                    <a class="dropdown-item" href="2#">Last Week</a>
                                                    <a class="dropdown-item" href="#3">Last Month</a>
                                                    <a class="dropdown-item" href="4#">Current Year</a>
                                                </div>
                                            </div>
                                            <div class="avatar-sm">
                                                <span class="avatar-title bg-light text-body rounded-circle fs-3">
                                                    <i class="ph-eye"></i>
                                                </span>
                                            </div>
                                            <div class="mt-4">
                                                <p class="text-uppercase fw-medium text-muted text-truncate fs-sm">
                                                    Số lượng khách hàng truy cập web</p>
                                                <h4 class="fw-semibold mb-3"><span class="counter-value"
                                                        data-target="{{$todayVisitors}}">0</span></h4>
                                                <div class="d-flex flex-wrap align-items-center gap-2">
                                                    <h5 class="text-danger fs-xs mb-0">
                                                        <i class="ri-arrow-right-down-line fs-sm align-middle"></i>
                                                        {{$percentageChangeViewWev}}
                                                    </h5>
                                                    <p class="text-muted mb-0">so với ngày trước</p>
                                                </div>
                                            </div>
                                        </div><!-- end card body -->
                                    </div><!-- end card -->
                                </div><!-- end col -->

                                <div class="col-md-6">
                                    <!-- card -->
                                    <div class="card shadow-none border-top border-top-md-0 rounded-0 mb-0">
                                        <div class="card-body">
                                            <div class="dropdown float-end">
                                                <a class="text-reset dropdown-btn" href="#"
                                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <span class="text-muted fs-lg"><i
                                                            class="mdi mdi-dots-vertical align-middle"></i></span>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="#1">Today</a>
                                                    <a class="dropdown-item" href="#2">Last Week</a>
                                                    <a class="dropdown-item" href="3#">Last Month</a>
                                                    <a class="dropdown-item" href="#4">Current Year</a>
                                                </div>
                                            </div>
                                            <div class="avatar-sm">
                                                <span class="avatar-title bg-info-subtle text-info rounded-circle fs-3">
                                                    <i class="ph-users-three"></i>
                                                </span>
                                            </div>
                                            <div class="mt-4">
                                                <p class="text-uppercase fw-medium text-muted text-truncate fs-sm">
                                                    Khách hàng đặt tour hôm nay</p>
                                                <h4 class="fw-semibold mb-3"><span class="counter-value"
                                                        data-target="{{ $customerCount }}">0</span></h4>
                                                <div class="d-flex flex-wrap align-items-center gap-2">
                                                    <h5 class="text-success fs-xs mb-0">
                                                        <i class="ri-arrow-right-up-line fs-sm align-middle"></i>
                                                        +10.42 %
                                                    </h5>
                                                    <p class="text-muted mb-0">so với ngày trước</p>
                                                </div>
                                            </div>
                                        </div><!-- end card body -->
                                    </div><!-- end card -->
                                </div><!-- end col -->
                            </div> <!-- end row-->
                        </div>
                    </div>
                </div><!--end col-->
                <div class="col-xl-8">
                    <div class="card">
                        <div class="row g-0">
                            <div class="col-xl-9">
                                <div class="card-header border-0 align-items-center d-flex">


                                    <form autocomplete="off" action="{{ route('dashboard.filterByDate') }}"
                                        method="POST">
                                        @csrf
                                        <div class="d-flex">
                                            <h4 class="card-title mb-0 flex-grow-1">Tour hot</h4>
                                            <div class="col-md-2 d-flex">
                                                <input type="text" id="datepicker" class="form-control"
                                                    placeholder="Từ ngày">
                                            </div>
                                            <div class="col-md-2 d-flex">
                                                <input type="text" id="datepicker2" class="form-control"
                                                    placeholder="Đến ngày">
                                            </div>
                                            <div class="col-md-4 d-flex">
                                                <input type="button" name="" id="btn-dashboard-filter"
                                                    class="btn btn-primary" value="Lọc">
                                                <select id="dashboard-filter" class="form-control">
                                                    <option value="7day">7 ngày qua</option>
                                                    <option value="thangTrc">Tháng trước</option>
                                                    <option value="thangNay">Tháng này</option>
                                                    <option value="365day">365 ngày qua</option>
                                                </select>
                                            </div>

                                        </div>
                                    </form>

                                </div><!-- end card header -->
                                <div class="card-body ps-0">
                                    <div class="w-100">
                                        <canvas id="myfirstchart" style="width:100%;max-width:900px"></canvas>
                                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                                        <script>
                                            // Fake data
                                            var chart = Morris.Bar({
                                                element: 'myfirstchart',
                                                data: [],
                                                xkey: 'ngayDat',
                                                ykeys: ['money', 'soLuongDon'],
                                                labels: ['Doanh thu', 'Số lượng đơn'],
                                                parseTime: false,
                                                hoverCallback: function(index, options, content, row) {
                                                    return content + '<br>Số lượng đơn hàng: ' + row.soLuongDon;
                                                }
                                            });
                                            // chart.setData(data);
                                        </script>

                                    </div>
                                </div><!-- end card body -->
                            </div>
                        </div>
                    </div><!-- end card -->
                </div><!-- end col -->
            </div><!--end row-->

            <div class="row">
                <div class="col-xl-6">
                    <!-- card -->
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1"></h4>
                            <div class="flex-shrink-0">
                                <button type="button" class="btn btn-subtle-primary btn-sm">
                                    Export Report
                                </button>
                            </div>
                        </div><!-- end card header -->

                        <!-- card body -->
                        <div class="card-body">

                            <div class="row">
                                <div class="col-lg-12">
                                    {{-- chart --}}
                                    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                                    <script>
                                        window.onload = function() {
                                            var chart = new CanvasJS.Chart("chartContainer", {
                                                theme: "light2",
                                                animationEnabled: true,
                                                title: {
                                                    text: "Top 5 Tours được đặt nhiều nhất"
                                                },
                                                axisY: {
                                                    title: "Số lượt đặt",
                                                    includeZero: true
                                                },
                                                data: [{
                                                    type: "bar",
                                                    yValueFormatString: "#,### lượt",
                                                    // showInLegend: true, 
                                                    legendText: "{label}",
                                                    indexLabel: "",
                                                    dataPoints: @json($chartData)
                                                }]
                                            });
                                            chart.render();
                                        }
                                    </script>
                                    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
                                </div>
                            </div>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->

                <div class="col-xl-3 col-lg-6">
                    <div class="card card-height-100">
                        <div class="card-header d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Trạng thái các tour ngày hôm nay</h4>
                            <div class="dropdown card-header-dropdown float-end">
                                <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="ph-dots-three-outline-vertical"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#">Today</a>
                                    <a class="dropdown-item" href="#">Last Week</a>
                                    <a class="dropdown-item" href="#">Last Month</a>
                                    <a class="dropdown-item" href="#">Current Year</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
                            <div id="myPlot" style="width:100%;max-width:500px"></div>
                            <script>
                                const statusData = @json($tyLe);
                                const labels = statusData.map(item => item.name);
                                const values = statusData.map(item => item.percentage);
                                const chartData = [{
                                    labels: labels,
                                    values: values,
                                    type: "pie"
                                }];
                                Plotly.newPlot("myPlot", chartData);
                            </script>

                        </div>
                    </div>
                </div><!--end col-->
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-height-100">
                        <div class="card-header d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Top 5 Tours hot</h4>
                            <a href="#!" class="text-muted">View All <i class="ph-caret-right align-middle"></i></a>
                        </div>
                        <div class="card-body px-0">
                            <div data-simplebar class="px-3" style="max-height: 360px;">
                                <table class="table mb-0">
                                    <tbody>
                                        @foreach ($top5Tours as $k => $top5Tour)
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center gap-1">
                                                        <div class="flex-shrink-0">
                                                            <img src="{{ Storage::url($top5Tour->image) }}" alt=""
                                                                class="avatar-sm rounded-circle p-1">
                                                        </div>
                                                        <div class="flex-grow-1 overflow-hidden">
                                                            <h6 class="fs-md mb-1">{{ $top5Tour->name }}</h6>
                                                            <p class="text-muted text-truncate mb-0">
                                                                {{ \Carbon\Carbon::parse($top5Tour->start_date)->format('d/m/Y') }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-end">
                                                    <h6 class="fs-md"></h6>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->

            <div class="row">
                <div class="col-lg-8">
                    <div class="card" id="contactList">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Tour đánh giá cao</h4>
                            <div class="flex-shrink-0">
                                <div class="dropdown card-header-dropdown sortble-dropdown">
                                    <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <span class="fw-semibold text-uppercase fs-12">Lọc:
                                        </span><span class="text-muted dropdown-title">Order Date</span> <i
                                            class="mdi mdi-chevron-down ms-1"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <button class="dropdown-item sort" data-sort="order_date">Order
                                            Date</button>
                                        <button class="dropdown-item sort" data-sort="order_id">Order
                                            ID</button>
                                        <button class="dropdown-item sort" data-sort="amount">Amount</button>
                                        <button class="dropdown-item sort" data-sort="status">Status</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-borderless table-centered align-middle table-nowrap mb-0">
                                    <thead class="text-muted table-light">
                                        <tr>
                                            <th scope="col" class="sort cursor-pointer" data-sort="order_date">
                                                STT</th>
                                            <th scope="col" class="sort cursor-pointer" data-sort="order_id">
                                                Tên tour</th>
                                            <th scope="col" class="sort cursor-pointer" data-sort="shop">Lượt xem
                                            </th>
                                            <th scope="col" class="sort cursor-pointer" data-sort="customer">
                                                Đã đặt</th>
                                            <th scope="col" class="sort cursor-pointer" data-sort="amount">
                                                Tổng tiền</th>
                                            <th scope="col" class="sort cursor-pointer" data-sort="status">
                                                Status</th>
                                            <th scope="col" class="sort cursor-pointer" data-sort="rating">
                                                Rating</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list">
                                        @foreach ($tourReview as $reviewk => $review)
                                        <tr>
                                            <td class="order_date">
                                                {{++$reviewk}}
                                            </td>
                                            <td class="order_id">
                                                <a href="apps-ecommerce-order-overview.html"
                                                    class="fw-medium link-primary">{{$review->name}}</a>
                                            </td>
                                            <td class="shop">
                                                {{$review->view ? $review->view : 'Chưa có view'}}
                                            </td>
                                            <td class="customer">
                                                {{ $review->total_bookings ?? 0 }}
                                            </td>
                                            <td class="amount">
                                                <span class="fw-medium">
                                                    {{ number_format($review->total_revenue, 0, '', '.') }} VND
                                                </span>
                                            </td>
                                            <td class="status">
                                                <span class="badge bg-warning-subtle text-warning">{{$review->status == 1 ? 'Hiện' : 'Ẩn'}}</span>
                                            </td>
                                            <td class="rating">
                                                <h5 class="fs-md fw-medium mb-0"><i
                                                        class="ph-star align-baseline text-warning"></i> {{$review->rating}}
                                                </h5>
                                            </td>
                                        </tr><!-- end tr -->
                                        @endforeach
                                    </tbody><!-- end tbody -->
                                </table><!-- end table -->
                                <div class="noresult" style="display: none">
                                    <div class="text-center">
                                        <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                            colors="primary:#405189,secondary:#0ab39c"
                                            style="width:75px;height:75px"></lord-icon>
                                        <h5 class="mt-2">Sorry! No Result Found</h5>
                                        <p class="text-muted mb-0">We've searched more than 150+ transactions We
                                            did not find any transactions for you search.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h4 class="card-title mb-0 flex-grow-1">Popular Products</h4>
                            <div class="flex-shrink-0">
                                <div class="dropdown card-header-dropdown">
                                    <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <span class="fw-semibold text-uppercase">Sort by:
                                        </span><span class="text-muted">Today<i
                                                class="mdi mdi-chevron-down ms-1"></i></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">Today</a>
                                        <a class="dropdown-item" href="#">Yesterday</a>
                                        <a class="dropdown-item" href="#">Last 7 Days</a>
                                        <a class="dropdown-item" href="#">Last 30 Days</a>
                                        <a class="dropdown-item" href="#">This Month</a>
                                        <a class="dropdown-item" href="#">Last Month</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-0">
                            <div data-simplebar class="px-3" style="max-height: 333px;">
                                <div class="vstack gap-2">
                                    <div class="p-2 border border-dashed">
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="avatar-sm flex-shrink-0">
                                                <div class="avatar-title bg-light rounded">
                                                    <img src="admin/assets/images/products/32/img-1.png" alt=""
                                                        class="avatar-xs">
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <a href="#!">
                                                    <h6 class="fs-md mb-2">Craft Women Black Sling Bag</h6>
                                                </a>
                                                <ul class="hstack list-unstyled gap-2 mb-0 fs-sm fw-medium text-muted">
                                                    <li>
                                                        <i class="ph-star align-baseline"></i> 487
                                                    </li>
                                                    <li>
                                                        <i class="ph-shopping-cart align-baseline"></i> 936
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="text-end">
                                                <h5 class="fs-md text-primary mb-0">$15.99</h5>
                                            </div>
                                            <div class="flex-shrink-0">
                                                <button class="btn btn-secondary btn-icon btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#productModal"><i class="ph-arrow-right"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-2 border border-dashed">
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="avatar-sm flex-shrink-0">
                                                <div class="avatar-title bg-light rounded">
                                                    <img src="admin/assets/images/products/32/img-2.png" alt=""
                                                        class="avatar-xs">
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <a href="#!">
                                                    <h6 class="fs-md mb-2">Unique Men's Wrist Watch</h6>
                                                </a>
                                                <ul class="hstack list-unstyled gap-2 mb-0 fs-sm fw-medium text-muted">
                                                    <li>
                                                        <i class="ph-star align-baseline"></i> 452
                                                    </li>
                                                    <li>
                                                        <i class="ph-shopping-cart align-baseline"></i> 1420
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="text-end">
                                                <h5 class="fs-md text-primary mb-0">$84.99</h5>
                                            </div>
                                            <div class="flex-shrink-0">
                                                <button class="btn btn-secondary btn-icon btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#productModal"><i class="ph-arrow-right"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-2 border border-dashed">
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="avatar-sm flex-shrink-0">
                                                <div class="avatar-title bg-light rounded">
                                                    <img src="admin/assets/images/products/32/img-3.png" alt=""
                                                        class="avatar-xs">
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <a href="#!">
                                                    <h6 class="fs-md mb-2">Twiala Floral Dress</h6>
                                                </a>
                                                <ul class="hstack list-unstyled gap-2 mb-0 fs-sm fw-medium text-muted">
                                                    <li>
                                                        <i class="ph-star align-baseline"></i> 562
                                                    </li>
                                                    <li>
                                                        <i class="ph-shopping-cart align-baseline"></i> 1348
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="text-end">
                                                <h5 class="fs-md text-primary mb-0">$149.99</h5>
                                            </div>
                                            <div class="flex-shrink-0">
                                                <button class="btn btn-secondary btn-icon btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#productModal"><i class="ph-arrow-right"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-2 border border-dashed">
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="avatar-sm flex-shrink-0">
                                                <div class="avatar-title bg-light rounded">
                                                    <img src="admin/assets/images/products/32/img-4.png" alt=""
                                                        class="avatar-xs">
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <a href="#!">
                                                    <h6 class="fs-md mb-2">Tokyo Fancy Bomber Jacket</h6>
                                                </a>
                                                <ul class="hstack list-unstyled gap-2 mb-0 fs-sm fw-medium text-muted">
                                                    <li>
                                                        <i class="ph-star align-baseline"></i> 644
                                                    </li>
                                                    <li>
                                                        <i class="ph-shopping-cart align-baseline"></i> 1540
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="text-end">
                                                <h5 class="fs-md text-primary mb-0">$245.00</h5>
                                            </div>
                                            <div class="flex-shrink-0">
                                                <button class="btn btn-secondary btn-icon btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#productModal"><i class="ph-arrow-right"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-2 border border-dashed">
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="avatar-sm flex-shrink-0">
                                                <div class="avatar-title bg-light rounded">
                                                    <img src="admin/assets/images/products/32/img-5.png" alt=""
                                                        class="avatar-xs">
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <a href="#!">
                                                    <h6 class="fs-md mb-2">Aster Dress 2XL / Royal Blue</h6>
                                                </a>
                                                <ul class="hstack list-unstyled gap-2 mb-0 fs-sm fw-medium text-muted">
                                                    <li>
                                                        <i class="ph-star align-baseline"></i> 841
                                                    </li>
                                                    <li>
                                                        <i class="ph-shopping-cart align-baseline"></i> 985
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="text-end">
                                                <h5 class="fs-md text-primary mb-0">$74.63</h5>
                                            </div>
                                            <div class="flex-shrink-0">
                                                <button class="btn btn-secondary btn-icon btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#productModal"><i class="ph-arrow-right"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-2 border border-dashed">
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="avatar-sm flex-shrink-0">
                                                <div class="avatar-title bg-light rounded">
                                                    <img src="admin/assets/images/products/32/img-6.png" alt=""
                                                        class="avatar-xs">
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <a href="#!">
                                                    <h6 class="fs-md mb-2">Craft Women Black Sling Bag</h6>
                                                </a>
                                                <ul class="hstack list-unstyled gap-2 mb-0 fs-sm fw-medium text-muted">
                                                    <li>
                                                        <i class="ph-star align-baseline"></i> 763
                                                    </li>
                                                    <li>
                                                        <i class="ph-shopping-cart align-baseline"></i> 763
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="text-end">
                                                <h5 class="fs-md text-primary mb-0">$245.74</h5>
                                            </div>
                                            <div class="flex-shrink-0">
                                                <button class="btn btn-secondary btn-icon btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#productModal"><i class="ph-arrow-right"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->

            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h5 class="card-title mb-0 flex-grow-1">Khách hàng chi tiêu nhiều</h5>
                            <div class="dropdown card-header-dropdown">
                                <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="ph-dots-three-outline-vertical"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#">Current Years</a>
                                    <a class="dropdown-item" href="#">Last Years</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row align-items-center mb-3">
                                {{-- <div id="revenueChartContainer" style="height: 370px; width: 100%;"></div> --}}

                                {{-- <script>
                                   function () {
                                        var revenueChart = new CanvasJS.Chart("revenueChartContainer", {
                                            animationEnabled: true,
                                            title:{
                                                text: "Doanh Thu Theo Ngày"
                                            },
                                            axisX:{
                                                title: "Ngày"
                                            },
                                            axisY:{
                                                title: "Doanh Thu (đ)",
                                                titleFontColor: "#4F81BC",
                                                lineColor: "#4F81BC",
                                                labelFontColor: "#4F81BC",
                                                tickColor: "#4F81BC"
                                            },
                                            data: [{
                                                type: "line",
                                                name: "Doanh Thu",
                                                showInLegend: true,
                                                dataPoints: @json_encode($dataPoints)
                                            }]
                                        });
                                        revenueChart.render();
                                    }
                                    </script> --}}

                            </div><!--end row-->

                        </div>
                    </div>
                </div><!--end col-->
                <div class="col-xl-4 col-lg-6">
                    <div class="card card-height-100">
                        <div class="card-header d-flex align-items-center">
                            <h5 class="card-title flex-grow-1 mb-0">Thông báo mới</h5>
                            <div class="flex-shrink-0">
                                <div class="dropdown card-header-dropdown">
                                    <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <span class="text-muted">This Month<i
                                                class="mdi mdi-chevron-down ms-1"></i></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">This Month</a>
                                        <a class="dropdown-item" href="#">Last Month</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="vstack gap-2">

                                <div class="border py-2 px-3 w-100 rounded d-flex align-items-center gap-2">
                                    <i class="bi bi-check2-square text-primary"></i>
                                    <h6 class="mb-0">tin nhắn</h6>
                                </div>

                            </div>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->

        </div>
        <!-- container-fluid -->
    </div>
@endsection
@section('script')
@endsection
