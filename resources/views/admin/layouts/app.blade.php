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


    <!-- Modal -->
    <div class="modal fade" id="addAmount" tabindex="-1" aria-labelledby="addAmountLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="addAmountLabel">Add Amount</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="#!">
                        <div class="row g-3">
                            <div class="col-lg-12">
                                <div>
                                    <label for="AmountInput" class="form-label">Amount</label>
                                    <input type="number" class="form-control" id="AmountInput" placeholder="$000.00">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label class="form-label">Select Method</label>
                                <div class="row g-3">
                                    <div class="col-lg-4">
                                        <label class="border rounded w-100 form-label p-2">
                                            <input class="form-check-input me-1" name="exampleRadios" type="radio"
                                                value="" checked>
                                            Visa
                                        </label>
                                    </div>
                                    <div class="col-lg-4">
                                        <label class="border rounded w-100 form-label p-2">
                                            <input class="form-check-input me-1" name="exampleRadios" type="radio"
                                                value="">
                                            Mastercard
                                        </label>
                                    </div>
                                    <div class="col-lg-4">
                                        <label class="border rounded w-100 form-label p-2">
                                            <input class="form-check-input me-1" name="exampleRadios" type="radio"
                                                value="">
                                            Credit Card
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div>
                                    <label for="cardNumber" class="form-label">Card Number</label>
                                    <input type="number" class="form-control" id="cardNumber"
                                        placeholder="xxxx xxxx xxxx xxxx">
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div>
                                    <label for="month" class="form-label">Expiry Date</label>
                                    <div class="row g-3">
                                        <div class="col-lg-6">
                                            <input type="number" class="form-control" id="month"
                                                placeholder="MM">
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="number" class="form-control" id="years"
                                                placeholder="YYYY">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div>
                                    <label for="cvv/cvc" class="form-label">CVV/CVC</label>
                                    <input type="number" class="form-control" id="cvv/cvc" placeholder="***">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div>
                                    <label for="cardHoldersName" class="form-label">Cardholders Name</label>
                                    <input type="text" class="form-control" id="cardHoldersName"
                                        placeholder="Enter name">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-ghost-danger" data-bs-dismiss="modal"><i
                            class="ph-x align-middle"></i> Close</button>
                    <button type="button" class="btn btn-primary">Add Amount</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end Modal -->

    <!-- Product Modal -->
    <div class="modal fade" id="productModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content border-0 overflow-hidden">
                <div class="modal-body p-0 ribbon-box">
                    <div class="ribbon ribbon-danger ribbon-shape trending-ribbon">
                        <span class="trending-ribbon-text">Trending</span> <i
                            class="ri-flashlight-fill text-white align-bottom float-end ms-1"></i>
                    </div>
                    <div class="row g-0">
                        <div class="col-lg-5">
                            <div class="bg-primary-subtle p-5 h-100">
                                <div class="p-lg-4">
                                    <img src="assets/images/products/img-3.png" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col-lg-7">
                            <div class="p-4 h-100">
                                <button type="button" class="btn-close float-end" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                                <a href="#!">
                                    <h5 class="mb-1">Craft Women Black Sling Bag</h5>
                                </a>
                                <p class="text-muted">Fashion & Clothing</p>

                                <h5 class="mb-3">$199.99 <del class="text-muted fs-sm fw-normal">$299.99</del></h5>

                                <ul class="list-unstyled hstack gap-2 mb-4">
                                    <li>
                                        Available Colors
                                    </li>
                                    <li>
                                        <div class="avatar-xxs">
                                            <div class="avatar-title rounded bg-primary-subtle"></div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="avatar-xxs">
                                            <div class="avatar-title rounded bg-success-subtle"></div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="avatar-xxs">
                                            <div class="avatar-title rounded bg-danger-subtle"></div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="avatar-xxs">
                                            <div class="avatar-title rounded bg-dark-subtle"></div>
                                        </div>
                                    </li>
                                </ul>

                                <ul class="list-unstyled vstack gap-2 mb-4">
                                    <li class=""><i
                                            class="bi bi-check2-circle me-2 align-middle text-success"></i>In
                                        stock</li>
                                    <li class=""><i
                                            class="bi bi-check2-circle me-2 align-middle text-success"></i>Free
                                        delivery available</li>
                                    <li class=""><i
                                            class="bi bi-check2-circle me-2 align-middle text-success"></i>Sales
                                        10% Off Use Code: <b>STEEX10</b></li>
                                </ul>

                                <div class="hstack gap-2 justify-content-end">
                                    <button class="btn btn-primary"><i class="bi bi-cart align-baseline me-1"></i> Add
                                        To Cart</button>
                                    <button class="btn btn-subtle-secondary">View Details <i
                                            class="bi bi-arrow-right align-baseline ms-1"></i></button>
                                </div>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
                </div>
            </div>
        </div>
    </div>
    <!-- End Product Modal -->

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
    <script src="{{ asset('admin/assets/js/plugins.js') }}"></script>

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
