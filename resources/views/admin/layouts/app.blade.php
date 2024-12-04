<!doctype html>
<html lang="en" data-layout="vertical" data-sidebar="dark" data-sidebar-size="lg" data-preloader="disable"
    data-theme="default" data-topbar="light" data-bs-theme="light">

<head>

    <meta charset="utf-8">
    <title>Dashboard | Steex - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{ asset('admin/assets/images/favicon.ico') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link id="fontsLink"
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&amp;display=swap"
        rel="stylesheet">

    <link href="{{ asset('admin/assets/libs/jsvectormap/css/jsvectormap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/assets/libs/swiper/swiper-bundle.min.css') }}" rel="stylesheet" type="text/css">

    <script src="{{ asset('admin/assets/js/layout.js') }}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.0/classic/ckeditor.js"></script>


    <link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/assets/css/app.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/assets/css/custom.min.css') }}" rel="stylesheet" type="text/css">


    @yield('style')

</head>

<body>


    <div id="layout-wrapper">

        @include('admin.layouts.header')
        @include('admin.layouts.navbar')

        <div class="main-content">

            @yield('content')

            @include('admin.layouts.footer')
        </div>


    </div>



    <!--start back-to-top-->
    <button class="btn btn-dark btn-icon" id="back-to-top">
        <i class="bi bi-caret-up fs-3xl"></i>
    </button>
    <!--end back-to-top-->

    <!--preloader-->
    <div id="preloader">
        <div id="status">
            <div class="spinner-border text-primary avatar-sm" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>



    <!-- JAVASCRIPT -->
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
    </script>
    <script src="{{ asset('admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/simplebar/simplebar.min.js') }}"></script>
    {{-- <script src="{{ asset('admin/assets/js/plugins.js') }}"></script> --}}

    <!-- apexcharts -->
    <script src="{{ asset('admin/assets/libs/apexcharts/apexcharts.min.js') }}"></script>

    <!-- Vector map-->
    <script src="{{ asset('admin/assets/libs/jsvectormap/js/jsvectormap.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/jsvectormap/maps/world-merc.js') }}"></script>

    <!--Swiper slider js-->
    <script src="{{ asset('admin/assets/libs/swiper/swiper-bundle.min.js') }}"></script>

    <script src="{{ asset('admin/assets/libs/list.js/list.min.js') }}"></script>

    <!-- Dashboard init -->
    <script src="{{ asset('admin/assets/js/pages/dashboard-ecommerce.init.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('admin/assets/js/app.js') }}"></script>

    {{-- Sweet alert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

    {{-- thống kê ajax --}}
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script>
        $(function() {
        $("#datepicker").datepicker({ dateFormat: "yy-mm-dd" });
        $("#datepicker2").datepicker({ dateFormat: "yy-mm-dd" });
    });
    
    var chart = new Morris.Bar({
        element: 'myfirstchart',
        data: [],
        xkey: 'ngayDat', 
        ykeys: ['total', 'soLuongDon'], // Tổng doanh thu và số lượng đơn
        labels: ['Doanh thu', 'Số lượng đơn'], // Nhãn cột
        parseTime: false,
        hoverCallback: function (index, options, content, row) {
            return content + '<br>Số lượng đơn hàng: ' + row.soLuongDon;
        }
    });
    
    $('#btn-dashboard-filter').click(function(){
        var _token = $('input[name="_token"]').val();
        var from_date = $('#datepicker').val();
        var to_date = $('#datepicker2').val();
    
        // $.ajax({
        //     method: "POST",
        //     dataType: "JSON",
        //     data: {from_date: from_date, to_date: to_date, _token: _token},
        //     success: function(data) {   
        //         chart.setData(data);
        //         console.log("Data loaded successfully.");
        //     },
        //     error: function(xhr, status, error) {
        //         console.error("Lỗi:", error);
        //     }
        // });
    });
    
    
    $('#dashboard-filter').change(function() {
        var dashboard_value = $(this).val();
        var _token = $('input[name="_token"]').val();
    
        // $.ajax({
        //     method: "POST",
        //     dataType: "JSON",
        //     data: {
        //         dashboard_value: dashboard_value,
        //         _token: _token
        //     },
        //     success: function(data) {
        //         chart.setData(data);
        //         console.log("Data loaded successfully.");
        //     },
        //     error: function(xhr, status, error) {
        //         console.error("Error:", error);
        //         console.log("Response:", xhr.responseText);
        //     }
        // });
    });
    </script>


    @if (Session::has('success'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: "success",
                title: "{{ Session::get('success') }}",
            });
        </script>
    @endif
    @if (Session::has('error'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: "error",
                title: "{{ Session::get('error') }}",
            });
        </script>
    @endif


    @yield('script')

</body>

</html>
