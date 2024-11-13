@extends('admins.layouts.app')

@section('style')
@endsection
@section('content')
    <div class="page-content">
        <div class="container-fluid">

            {{-- <div class="row">
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
                                                    <a class="dropdown-item" href="#">Today</a>
                                                    <a class="dropdown-item" href="#">Last Week</a>
                                                    <a class="dropdown-item" href="#">Last Month</a>
                                                    <a class="dropdown-item" href="#">Current Year</a>
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
                                                    Total Revenue</p>
                                                <h4 class="fw-semibold mb-3">$<span class="counter-value"
                                                        data-target="750.36">0</span>M </h4>
                                                <div class="d-flex flex-wrap align-items-center gap-2">
                                                    <h5 class="text-success fs-xs mb-0">
                                                        <i class="ri-arrow-right-up-line fs-sm align-middle"></i>
                                                        +19.07 %
                                                    </h5>
                                                    <p class="text-muted mb-0">than last week</p>
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

                                                <div class="info-box-content">
                                                    <span class="info-box-text">Tổng số tour</span>
                                                   
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
                                                        data-target="684">0</span></h4>
                                                <div class="d-flex flex-wrap align-items-center gap-2">
                                                    <h5 class="text-success fs-xs mb-0">
                                                        <i class="ri-arrow-right-up-line fs-sm align-middle"></i>
                                                        +8.13 %
                                                    </h5>
                                                    <p class="text-muted mb-0">than last week</p>
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
                                                    <a class="dropdown-item" href="#">Today</a>
                                                    <a class="dropdown-item" href="#">Last Week</a>
                                                    <a class="dropdown-item" href="#">Last Month</a>
                                                    <a class="dropdown-item" href="#">Current Year</a>
                                                </div>
                                            </div>
                                            <div class="avatar-sm">
                                                <span class="avatar-title bg-light text-body rounded-circle fs-3">
                                                    <i class="ph-eye"></i>
                                                </span>
                                            </div>
                                            <div class="mt-4">
                                                <p class="text-uppercase fw-medium text-muted text-truncate fs-sm">
                                                    Product Views</p>
                                                <h4 class="fw-semibold mb-3"><span class="counter-value"
                                                        data-target="113870">0</span></h4>
                                                <div class="d-flex flex-wrap align-items-center gap-2">
                                                    <h5 class="text-danger fs-xs mb-0">
                                                        <i class="ri-arrow-right-down-line fs-sm align-middle"></i>
                                                        +2.01 %
                                                    </h5>
                                                    <p class="text-muted mb-0">than last week</p>
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
                                                    <a class="dropdown-item" href="#">Today</a>
                                                    <a class="dropdown-item" href="#">Last Week</a>
                                                    <a class="dropdown-item" href="#">Last Month</a>
                                                    <a class="dropdown-item" href="#">Current Year</a>
                                                </div>
                                            </div>
                                            <div class="avatar-sm">
                                                <span class="avatar-title bg-info-subtle text-info rounded-circle fs-3">
                                                    <i class="ph-users-three"></i>
                                                </span>
                                            </div>
                                            <div class="mt-4">
                                                <p class="text-uppercase fw-medium text-muted text-truncate fs-sm">
                                                    Customers</p>
                                                <h4 class="fw-semibold mb-3"><span class="counter-value"
                                                        data-target="2500">0</span>k </h4>
                                                <div class="d-flex flex-wrap align-items-center gap-2">
                                                    <h5 class="text-success fs-xs mb-0">
                                                        <i class="ri-arrow-right-up-line fs-sm align-middle"></i>
                                                        +10.42 %
                                                    </h5>
                                                    <p class="text-muted mb-0">than last week</p>
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
                                    <h4 class="card-title mb-0 flex-grow-1">Revenue</h4>
                                    <div>
                                        <button type="button" class="btn btn-subtle-secondary btn-sm">
                                            ALL
                                        </button>
                                        <button type="button" class="btn btn-subtle-secondary btn-sm">
                                            1M
                                        </button>
                                        <button type="button" class="btn btn-subtle-secondary btn-sm">
                                            6M
                                        </button>
                                        <button type="button" class="btn btn-subtle-primary btn-sm">
                                            1Y
                                        </button>
                                    </div>
                                </div><!-- end card header -->
                                <div class="card-body ps-0">
                                    <div class="w-100">
                                        <div id="market-overview" data-colors='["--tb-primary", "--tb-secondary"]'
                                            class="apex-charts" dir="ltr"></div>
                                    </div>
                                </div><!-- end card body -->
                            </div>
                            <div class="col-xl-3">
                                <div class="card-body border-start-xl border-top border-top-xl-0 border-2 h-100">
                                    <div>
                                        <p class="text-muted mb-2">Budget (USD)</p>
                                        <h4>$750.36M <small class="text-success fs-sm fw-normal"><i
                                                    class="ph-arrow-up align-baseline"></i> 2.17%</small></h4>
                                        <p class="text-muted text-truncate">Budget in than last years</p>
                                        <div class="mx-3">
                                            <div id="mini-chart-6" data-colors='["--tb-primary"]' class="apex-charts"
                                                dir="ltr"></div>
                                        </div>
                                    </div>

                                    <div class="mt-4">
                                        <p class="text-muted mb-2">Payouts (USD)</p>
                                        <h4>$7,45,123 <small class="text-danger fs-sm fw-normal"><i
                                                    class="ph-arrow-down align-baseline"></i> -1.36%</small>
                                        </h4>
                                        <p class="text-muted text-truncate">Payouts in than last years</p>
                                        <div class="mx-3">
                                            <div id="mini-chart-7" data-colors='["--tb-info"]' class="apex-charts"
                                                dir="ltr"></div>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal"
                                            data-bs-target="#addAmount">Add
                                            Amount</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end card -->
                </div><!-- end col -->
            </div><!--end row--> --}}

            <section class="content">
                <div class="container-fluid">
                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title"></h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 col-sm-6 col-12">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-info"><i class="fas fa-th-large"></i></span>
        
                                        <div class="info-box-content">
                                            <span class="info-box-text">Tổng số tour</span>
                                            {{-- <span class="info-box-number">{{ number_format($tour) }}</span> --}}
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                                <div class="col-md-3 col-sm-6 col-12">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-success"><i class="fas fa-th-large"></i></span>
        
                                        <div class="info-box-content">
                                            <span class="info-box-text">Tour đã đặt</span>
                                            {{-- <span class="info-box-number">{{ number_format($bookTour) }}</span> --}}
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                                <div class="col-md-3 col-sm-6 col-12">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-danger"><i class="fa fa-fw fa-user"></i></span>
        
                                        <div class="info-box-content">
                                            <span class="info-box-text">Tổng số thành viên</span>
                                            {{-- <span class="info-box-number">{{ number_format($user) }}</span> --}}
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                                <div class="col-md-3 col-sm-6 col-12">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-info color-palette"><i class="fas fa-file-word"></i></span>
        
                                        <div class="info-box-content">
                                            <span class="info-box-text">Tổng số bài viết</span>
                                            {{-- <span class="info-box-number">{{ number_format($article) }}</span> --}}
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                                <div class="col-md-3 col-sm-6 col-12">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-gradient-primary color-palette"><i class="fas fa-dollar-sign"></i></span>
        
                                        <div class="info-box-content">
                                            <span class="info-box-text">Doanh thu hôm nay</span>
                                            {{-- <span class="info-box-number">{{ number_format($totalMoneyDay) }} vnđ</span> --}}
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                                <div class="col-md-3 col-sm-6 col-12">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-gradient-primary color-palette"><i class="fas fa-dollar-sign"></i></span>
        
                                        <div class="info-box-content">
                                            <span class="info-box-text">Doanh thu tháng này</span>
                                            {{-- <span class="info-box-number">{{ number_format($totalMoneyMonth) }} vnđ</span> --}}
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                                <div class="col-md-3 col-sm-6 col-12">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-gradient-primary color-palette"><i class="fas fa-dollar-sign"></i></span>
        
                                        <div class="info-box-content">
                                            <span class="info-box-text">Doanh thu năm nay</span>
                                            {{-- <span class="info-box-number">{{ number_format($totalMoneyYear) }} vnđ</span> --}}
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8" style="margin-left: 15px">
                            <form action="">
                                <div class="row">
                                    <div class="col-sm-12 col-md-4">
                                      
                                        <div class="form-group">
                                            {{-- <select name="select_month" id="" class="form-control">
                                                <option value="">Chọn tháng</option>
                                                @for($i = 1; $i < 13; $i++)
                                                    @if(Request::get('select_month'))
                                                        <option {{ Request::get('select_month') == $i ? "selected='selected'" : '' }} value="{{$i}}">{{$i}}</option>
                                                    @else
                                                        <option {{ $month == $i ? "selected='selected'" : '' }} value="{{$i}}">{{$i}}</option>
                                                    @endif
                                                @endfor
                                            </select> --}}
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                       
                                        <div class="form-group">
                                            {{-- <select name="select_year" id="" class="form-control">
                                                <option value="">Chọn năm</option>
                                                @for($i = $year - 15; $i <= $year + 5; $i++)
                                                    @if(Request::get('select_year'))
                                                        <option {{ Request::get('select_year') == $i ? "selected='selected'" : '' }} value="{{$i}}">{{$i}}</option>
                                                    @else
                                                        <option {{ $year == $i ? "selected='selected'" : '' }} value="{{$i}}">{{$i}}</option>
                                                    @endif
                                                @endfor
                                            </select> --}}
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-success " style="margin-right: 10px"><i class="fas fa-search"></i> Lọc dữ liệu </button>
                                        </div>
                                    </div>
        
                                </div>
                            </form>
                        </div>
                        <div class="row" style="margin-bottom: 15px;">
        
                            <div class="col-sm-8">
                                <figure class="highcharts-figure">
                                    {{-- <div id="container2" data-list-day="{{ $listDay }}" data-money-default={{ $arrRevenueTransactionMonthDefault }} data-money={{ $arrRevenueTransactionMonth }}> --}}
                                    </div>
                                </figure>
                            </div>
                            <div class="col-sm-4">
                                <figure class="highcharts-figure">
                                    {{-- <div id="container" data-json="{{ $statusTransaction }}"></div> --}}
                                </figure>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>



      

        </div>
        <!-- container-fluid -->
    </div>


@section('script')
    <link rel="stylesheet" href="https://code.highcharts.com/css/highcharts.css">
    <script src="https://code.highcharts.com/highcharts.js"></script>
    {{-- <script src="https://code.highcharts.com/modules/exporting.js"></script> --}}
    {{-- <script src="https://code.highcharts.com/modules/export-data.js"></script> --}}
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script type="text/javascript">
        let dataTransaction = $("#container").attr('data-json');
        dataTransaction  =  JSON.parse(dataTransaction);

        let listday = $("#container2").attr("data-list-day");
        listday = JSON.parse(listday);

        let listMoneyMonth = $("#container2").attr('data-money');
        listMoneyMonth = JSON.parse(listMoneyMonth);

        let listMoneyMonthDefault = $("#container2").attr('data-money-default');
        listMoneyMonthDefault = JSON.parse(listMoneyMonthDefault);

        Highcharts.chart('container', {

            chart: {
                styledMode: true
            },

            title: {
                text: 'Trạng thái các tour du lịch'
            },

            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr']
            },

            series: [{
                type: 'pie',
                allowPointSelect: true,
                keys: ['name', 'y', 'selected', 'sliced'],
                data: dataTransaction,
                showInLegend: true
            }]
        });

        Highcharts.chart('container2', {
            chart: {
                type: 'spline'
            },
            title: {
                text: 'Thống kê lượng khách hàng đặt tour trong tháng'
            },
            subtitle: {
                text: 'Dữ liệu thống kê'
            },
            xAxis: {
                categories: listday
            },
            yAxis: {
                title: {
                    text: 'Temperature'
                },
                labels: {
                    formatter: function () {
                        return this.value + '°';
                    }
                }
            },
            tooltip: {
                crosshairs: true,
                shared: true
            },
            plotOptions: {
                spline: {
                    marker: {
                        radius: 4,
                        lineColor: '#666666',
                        lineWidth: 1
                    }
                }
            },
            series: [
                {
                    name: 'Tổng số người lớn',
                    marker: {
                        symbol: 'square'
                    },
                    data: listMoneyMonth
                },
                {
                    name: 'Tổng số trẻ em',
                    marker: {
                        symbol: 'square'
                    },
                    data: listMoneyMonthDefault
                }
            ]
        });
    </script>

@endsection
@section('script')
@endsection
