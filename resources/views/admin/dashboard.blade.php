@extends('admin.layouts.app')

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endsection
@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-2">
                    <div class="card shadow-none border-end-md border-bottom rounded-0 mb-0">
                        <div class="card-body">
                            <div class="avatar-sm">
                                <span class="avatar-title bg-primary-subtle text-primary rounded-circle fs-3">
                                    <i class="ph-wallet"></i>
                                </span>
                            </div>
                            <div class="mt-2">
                                <p class="text-uppercase  text-muted text-truncate fs-sm">Doanh thu tháng này</p>
                                <h4 class=" mb-2"><span class="counter-value" data-target="{{ $totalMoneyMonth }}">0</span>
                                    đ</h4>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div>
                <div class="col-md-2">
                    <div class="card shadow-none border-end-md border-bottom rounded-0 mb-0">
                        <div class="card-body">
                            <div class="avatar-sm">
                                <span class="avatar-title bg-primary-subtle text-primary rounded-circle fs-3">
                                    <i class="ph-wallet"></i>
                                </span>
                            </div>
                            <div class="mt-2">
                                <p class="text-uppercase  text-muted text-truncate fs-sm">Doanh thu hôm nay</p>
                                <h4 class=" mb-2"><span class="counter-value" data-target="{{ $totalMoney }}">0</span> đ
                                </h4>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div>
                <div class="col-md-2">
                    <div class="card shadow-none border-bottom rounded-0 mb-0">
                        <div class="card-body">
                            <div class="avatar-sm">
                                <span class="avatar-title bg-dark-subtle text-dark rounded-circle fs-3">
                                    <i class="ph-bag"></i>
                                </span>
                            </div>
                            <div class="mt-2">
                                <p class="text-uppercase  text-muted text-truncate ">Đơn hàng tháng này</p>
                                <h4 class=" mb-3"><span class="counter-value" data-target="{{ $orderCountMonth }}">0</span>
                                </h4>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->
                <div class="col-md-2">
                    <div class="card shadow-none border-bottom rounded-0 mb-0">
                        <div class="card-body">
                            <div class="avatar-sm">
                                <span class="avatar-title bg-dark-subtle text-dark rounded-circle fs-3">
                                    <i class="ph-bag"></i>
                                </span>
                            </div>
                            <div class="mt-2">
                                <p class="text-uppercase  text-muted text-truncate ">Đơn hàng hôm nay</p>
                                <h4 class=" mb-3"><span class="counter-value" data-target="{{ $orderCountToday }}">0</span>
                                </h4>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->

                <div class="col-md-2">
                    <div class="card shadow-none border-end-md rounded-0 mb-0">
                        <div class="card-body">
                            <div class="avatar-sm">
                                <span class="avatar-title bg-light text-body rounded-circle fs-2">
                                    <i class="ph-eye"></i>
                                </span>
                            </div>
                            <div class="mt-2">
                                <p class="text-uppercase fw-medium text-muted text-truncate fs-sm">Số lượng khách hàng truy
                                    cập web</p>
                                <h4 class="fw-semibold mb-3"><span class="counter-value"
                                        data-target="{{ $todayVisitors }}">0</span></h4>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->

                <div class="col-md-2">
                    <div class="card shadow-none border-top border-top-md-0 rounded-0 mb-0">
                        <div class="card-body">
                            <div class="avatar-sm">
                                <span class="avatar-title bg-info-subtle text-info rounded-circle fs-2">
                                    <i class="ph-users-three"></i>
                                </span>
                            </div>
                            <div class="mt-2">
                                <p class="text-uppercase fw-medium text-muted text-truncate fs-sm">Khách hàng đặt tour hôm
                                    nay</p>
                                <h4 class="fw-semibold mb-3"><span class="counter-value"
                                        data-target="{{ $customerCount }}">0</span></h4>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->
            </div><!-- end row -->

            <div class="row mt-3">
                <div class="col-lg-12">
                    <div class="card" id="contactList">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Danh thu tháng</h4>
                            <div class="flex-shrink-0">
                                <div class="dropdown card-header-dropdown sortble-dropdown">

                                    <span class="fw-semibold text-uppercase fs-12">
                                        <form>
                                            @csrf
                                            <select id="ChangeYear" class="form-control">
                                                <option value="2023">2023</option>
                                                <option value="2024" selected>2024</option>
                                                <option value="2025">2025</option>
                                                <option value="2026">2026</option>
                                            </select>
                                        </form>

                                    </span>
                                    </span>

                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
                                    <div class="position-relative mb-4">
                                        <canvas id="myChart" style="height:250px;"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-6">
                    <!-- card -->
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <form class="d-flex">
                                @csrf
                                <div class="card-title mb-0 flex-grow-1">
                                    <p>Từ ngày: <input type="text" id="datepicker" class="form-control"></p>
                                </div>
                                <div class="card-title mb-0 flex-grow-1">
                                    <p>Đến ngày: <input type="text" id="datepicker2" class="form-control"></p>
                                </div>
                                <div class="card-title mb-0 flex-grow-1">
                                    <input type="button" id="btn-dashboard-filter" class="btn btn-primary"
                                        value="Lọc">
                                </div>
                                <div class="flex-shrink-0">
                                    <select name="" id="">
                                        <option value="7ngayTruoc">7 ngày trước</option>
                                        <option value="2023">2023</option>
                                    </select>
                                </div>
                            </form>

                        </div><!-- end card header -->

                        <!-- card body -->
                        <div class="card-body">

                            <div class="row">
                                <div class="col-lg-12">
                                    {{-- chart --}}
                                    {{-- <div id="chartContainer" style="height: 370px; width: 100%;"></div>
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
                                                    legendText: "1,2,3",
                                                    indexLabel: "",
                                                    dataPoints: [
                                                        { label: "Tour 1", y: 10 },
                                                        { label: "Tour 2", y: 15 },
                                                        { label: "Tour 3", y: 20 },
                                                        { label: "Tour 4", y: 25 },
                                                        { label: "Tour 5", y: 30 },
                                                    ],
                                                }]
                                            });
                                            chart.render();
                                        }
                                    </script> --}}
                                    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
                                    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
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
                            {{-- <a href="#!" class="text-muted">View All <i class="ph-caret-right align-middle"></i></a> --}}
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

            <div class="row mt-3">
                <div class="col-lg-12">
                    <div class="card" id="contactList">
                        <div class="card-header align-items-center ">
                            <h4 class="card-title mb-0 flex-grow-1">Đơn hàng mới hôm nay</h4>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-borderless table-centered align-middle table-nowrap mb-0">
                                        <thead class="text-muted table-light">
                                            <tr>
                                                <th scope="col" class="sort cursor-pointer" data-sort="order_date">
                                                    STT</th>
                                                <th scope="col" class="sort cursor-pointer" data-sort="order_id">
                                                    Tên tour</th>
                                                <th scope="col" class="sort cursor-pointer" data-sort="shop">Người đặt
                                                </th>
                                                <th scope="col" class="sort cursor-pointer" data-sort="customer">
                                                    PTTT</th>
                                                <th scope="col" class="sort cursor-pointer" data-sort="amount">
                                                    Tổng tiền</th>
                                                <th scope="col" class="sort cursor-pointer" data-sort="status">
                                                    Trạng thái</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list">
                                            @foreach ($paymentsOrderToday as $paymentsOrderTodayk => $paymentsOrderTodays)
                                                <tr>
                                                    <td class="order_date">
                                                        {{ ++$paymentsOrderTodayk }}
                                                    </td>
                                                    <td class="order_id">
                                                        <a href="" class="fw-medium link-primary">
                                                            {{ $paymentsOrderTodays->booking->tour->name ?? 'Ẩn Danh' }}
                                                        </a>
                                                    </td>
                                                    <td class="shop">
                                                        {{ $paymentsOrderTodays->user->name ?? 'Ẩn Danh' }}
                                                    </td>
                                                    <td class="amount">
                                                        {{ $paymentsOrderTodays->paymentMethod->name }}
                                                    </td>
                                                    <td class="amount">
                                                        <span class="fw-medium">
                                                            {{ number_format($paymentsOrderTodays->money, 0, '', '.') }}
                                                            VND
                                                        </span>
                                                    </td>
                                                    <td class="status">
                                                        @if ($paymentsOrderTodays->payment_status_id == 2)
                                                            <span
                                                                class="badge bg-success-subtle text-success">{{ $paymentsOrderTodays->paymentStatus->name }}</span>
                                                        @else
                                                            <span class="badge bg-danger-subtle text-danger">{{ $paymentsOrderTodays->paymentStatus->name ?? 'Ẩn Danh' }}</span>
                                                        @endif

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
                    </div>
                </div>
            </div>


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
                                                    {{ ++$reviewk }}
                                                </td>
                                                <td class="order_id">
                                                    <span class="fw-medium link-primary">{{ $review->name }}</span>
                                                </td>
                                                <td class="shop">
                                                    {{ $review->view ? $review->view : 'Chưa có view' }}
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
                                                    <span
                                                        class="badge bg-warning-subtle text-warning">{{ $review->status == 1 ? 'Hiện' : 'Ẩn' }}</span>
                                                </td>
                                                <td class="rating">
                                                    <h5 class="fs-md fw-medium mb-0"><i
                                                            class="ph-star align-baseline text-warning"></i>
                                                        {{ $review->rating }}
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
                            <h4 class="card-title mb-0 flex-grow-1">Thông báo</h4>
                        </div>
                        <div class="card-body px-0">
                            <div data-simplebar class="px-3" style="max-height: 333px;">
                                <div class="vstack gap-2">
                                    <div class="p-2 border border-dashed">
                                        <div class="border py-2 px-3 w-100 rounded d-flex align-items-center gap-2">
                                            <i class="bi bi-check2-square text-primary"></i>
                                            <h6 class="mb-0">tin nhắn</h6>
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
                                <div id="myPlot2" style="width:100%;max-width:700px"></div>

                                <script>
                                    // Dữ liệu người dùng chi tiêu nhiều nhất
                                    const userNames = @json($userNames); // Lấy mảng tên người dùng từ Laravel
                                    const totalSpent = @json($totalSpent); // Lấy mảng tổng tiền chi tiêu từ Laravel

                                    // Tạo biểu đồ cột
                                    const data = [{
                                        x: userNames, // Tên người dùng
                                        y: totalSpent, // Tổng tiền chi tiêu
                                        type: "bar"
                                    }];

                                    const layout = {
                                        yaxis: {
                                            title: "Tiền chi tiêu"
                                        }
                                    };
                                    // Vẽ biểu đồ
                                    Plotly.newPlot("myPlot2", data, layout);
                                </script>

                            </div><!--end row-->

                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->

        </div>
        <!-- container-fluid -->
    </div>
@endsection
@section('script')
    <script>
        $(function() {
            $("#datepicker").datepicker({
                dateFormat: "yy-mm-dd"
            });
            $("#datepicker2").datepicker({
                dateFormat: "yy-mm-dd"
            });
        });

        function renderChart(dataPoints) {
            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                title: {
                    text: "Top 5 Tour  đặt nhiều nhất"
                },
                axisY: {
                    title: "Tổng tiền",
                    includeZero: true
                },
                data: [{
                    type: "bar",
                    yValueFormatString: "###,##0 VND",
                    indexLabel: "{y}",
                    indexLabelPlacement: "inside",
                    indexLabelFontWeight: "bolder",
                    indexLabelFontColor: "white",
                    dataPoints: dataPoints
                }]
            });
            chart.render();
        }

        $('#btn-dashboard-filter').click(function() {
            var _token = $('input[name="_token"]').val();
            var from_date = $('#datepicker').val();
            var to_date = $('#datepicker2').val();
            // alert(from_date);
            // alert(to_date);
            $.ajax({
                url: "{{ url('/admin/home/dashboard-date') }}",
                method: "POST",
                dataType: "JSON",
                data: {
                    from_date: $('#datepicker').val(),
                    to_date: $('#datepicker2').val(),
                    _token: $('input[name="_token"]').val()
                },
                success: function(data) {
                    // var dataPoints = data.map(function(item) {
                    //     return {
                    //         y: item.money / 1000,
                    //         label: item.date
                    //     };
                    
                    var dataPoints = data.map(function(item) {
                        return {
                            y: parseFloat(item.money) ,
                            label: `${item.tour_name} (${item.soLuongDon} đơn)`
                        };
                    });
                    console.log(dataPoints)
                    renderChart(dataPoints);
                    console.log("Data loaded successfully.");
                },
                error: function(xhr, status, error) {
                    console.error("Error:", error);
                }


            });
            console.log(data)

        });

        $('#dashboard-filter').change(function() {
            var dashboard_value = $(this).val();
            var _token = $('input[name="_token"]').val();

            $.ajax({
                url: "{{ route('dashboard.filterByBtn') }}",
                method: "POST",
                dataType: "JSON",
                data: {
                    dashboard_value: dashboard_value,
                    _token: _token
                },
                success: function(data) {
                    chart.setData(data);
                    console.log("Data loaded successfully.");
                },
                error: function(xhr, status, error) {
                    console.error("Error:", error);
                    console.log("Response:", xhr.responseText);
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            const defaultYear = 2024;
            $('#ChangeYear').val(defaultYear);
            $.ajax({
                url: '{{ route('admin.dashboard.data') }}',
                method: 'GET',
                data: {
                    year: defaultYear
                },
                success: function(response) {
                    console.log(response);
                    salesChart.data.datasets[0].data = response.dataChart;
                    salesChart.update();
                },
                error: function() {
                    alert('Không thể tải dữ liệu. Vui lòng thử lại.');
                }
            });
            $('#ChangeYear').change(function() {
                const year = $(this).val();
                $.ajax({
                    url: '{{ route('admin.dashboard.data') }}',
                    method: 'GET',
                    data: {
                        year: year
                    },
                    success: function(response) {
                        console.log(response);
                        salesChart.data.datasets[0].data = response.dataChart;
                        salesChart.update();
                    },
                    error: function() {
                        alert('Không thể tải dữ liệu. Vui lòng thử lại.');
                    }
                });
            });
            var ticksStyle = {
                fontColor: '#495057',
                fontStyle: 'bold'
            };

            var mode = 'index';
            var intersect = true;

            var $salesChart = $('#myChart');
            var salesChart = new Chart($salesChart, {
                type: 'bar',
                data: {
                    labels: ['THÁNG 1', 'THÁNG 2', 'THÁNG 3', 'THÁNG 4', 'THÁNG 5', 'THÁNG 6', 'THÁNG 7',
                        'THÁNG 8', 'THÁNG 9', 'THÁNG 10', 'THÁNG 11', 'THÁNG 12'
                    ],
                    datasets: [{
                        backgroundColor: '#007bff',
                        borderColor: '#007bff',
                        data: []
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    tooltips: {
                        mode: mode,
                        intersect: intersect
                    },
                    hover: {
                        mode: mode,
                        intersect: intersect
                    },
                    legend: {
                        display: false
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            suggestedMax: 200,
                            grid: {
                                display: true,
                                drawBorder: false,
                                color: 'rgba(0, 0, 0, .2)',
                                zeroLineColor: 'transparent',
                                borderWidth: 1
                            },
                            ticks: $.extend({
                                callback: function(value) {
                                    return new Intl.NumberFormat('vi-VN', {
                                        style: 'currency',
                                        currency: 'VND'
                                    }).format(value);
                                }
                            }, ticksStyle)
                        },
                        x: {
                            grid: {
                                display: false
                            },
                            ticks: ticksStyle
                        }
                    },
                    plugins: {
                        datalabels: {
                            anchor: 'end',
                            align: 'top',
                            font: {
                                weight: 'bold',
                                size: 12
                            },
                            formatter: function(value) {
                                return new Intl.NumberFormat('vi-VN', {
                                    style: 'currency',
                                    currency: 'VND'
                                }).format(value);
                            }
                        }
                    }
                }
            });
        });
    </script>
@endsection
