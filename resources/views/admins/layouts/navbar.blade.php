<div class="app-menu navbar-menu">

    {{-- <div class="navbar-brand-box">
        <a href="index.html" class="logo logo-dark">
            <span class="logo-sm">
                <img src="admin/assets/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="admin/assets/images/logo-dark.png" alt="" height="22">
            </span>
        </a>
        <a href="index.html" class="logo logo-light">
            <span class="logo-sm">
                <img src="admin/assets/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="admin/assets/images/logo-light.png" alt="" height="22">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-3xl header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div> --}}

    <!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar Navigation</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
        }
        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: #333;
            color: #fff;
            position: fixed;
            padding-top: 20px;
        }
        .sidebar .navbar-brand-box {
            text-align: center;
            padding-bottom: 20px;
            border-bottom: 1px solid #444;
        }
        .sidebar ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }
        .sidebar ul li {
            padding: 15px 20px;
            display: flex;
            align-items: center;
            border-bottom: 1px solid #444;
            cursor: pointer;
        }
        .sidebar ul li a {
            color: #fff;
            text-decoration: none;
            width: 100%;
            display: flex;
            align-items: center;
        }
        .sidebar ul li a i {
            margin-right: 15px;
        }
        .sidebar ul li:hover {
            background-color: #444;
        }
    </style>
    </head>
    <body>
    
    <div class="sidebar">
        <div class="navbar-brand-box">
            <a href="index.html" class="logo">
                <img src="admin/assets/images/logo-dark.png" alt="Logo" height="22">
            </a>
        </div>
        <ul>
            <li><a href="#"><i class="fas fa-home"></i> Bảng điều khiển</a></li>
            <li><a href="{{ route('category.index') }}"><i class="fas fa-th-list"></i> Danh mục</a></li>
            <li><a href=""><i class="fas fa-newspaper"></i> Bài viết</a></li>
            <li><a href="{{ route('location.index') }}"><i class="fas fa-map-marker-alt"></i> Địa điểm</a></li>
            <li><a href="{{ route('tour.index') }}"><i class="fas fa-box"></i> Tours</a></li>
            <li><a href="#"><i class="fas fa-shopping-cart"></i> Danh sách đặt tour</a></li>
            <li><a href="#"><i class="fas fa-user-tag"></i> Vai trò</a></li>
            <li><a href="#"><i class="fas fa-user"></i> Người dùng</a></li>
            <li class="nav-item" id="cauHoi">
                <a href="{{route('faqs.index')}}" class="nav-link">
                    Danh sách </a>
            </li>
            <div class="collapse menu-dropdown" >
                <ul class="nav nav-sm flex-column">
                    
        
                </ul>
            </div>
        </ul>
     
    </div>

   


    {{-- <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">

                <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link collapsed" href="#sidebarDashboards" data-bs-toggle="collapse"
                        role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="ph-gauge"></i>
                         <span data-key="t-dashboards">Bảng điều khiển</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarDashboards">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('category.index') }}" <i class="fas fa-th-list"></i> class="nav-link" data-key="">Danh mục</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('article.index') }}" <i class="fas fa-newspaper"></i> class="nav-link" data-key="t-analytics">
                                   Quản lý bài viết</a>
                            </li>
                            <li class="nav-item">
                                <a href="dashboard-crm.html" <i class="fas fa-box"></i>  class="nav-link" data-key="t-crm"> Quản lý Tour </a>
                            </li>
                                        <li><a href="#"><i class="fas fa-shopping-cart"></i> Danh sách đặt tour</a></li>

                            <li class="nav-item">
                                <a href="{{ route('location.index') }}" <i class="fas fa-map-marker-alt"></i> class="nav-link" data-key="t-ecommerce">Quản lý địa danh</a>

                            </li>
                            <li class="nav-item">
                                <a href="dashboard-learning.html" class="nav-link" data-key="t-learning">
                                    Quản lý bình luận </a>
                            </li>
                            <li class="nav-item">
                                <a href="dashboard-real-estate.html" class="nav-link" data-key="t-real-estate">
                                    Quản lý vai trò </a>
                            </li>
                        </ul> --}}
                    {{-- </div> --}}
                {{-- </li> --}}
                                {{-- faq --}}
                                {{-- <li class="nav-item">
                                    <a class="nav-link menu-link collapsed" href="#cauHoi" data-bs-toggle="collapse" role="button"
                                        aria-expanded="false" aria-controls="cauHoi">
                                        <i class="ph-gauge"></i> <span data-key="t-dashboards">Câu hỏi</span>
                                    </a>
                                    <div class="collapse menu-dropdown" id="cauHoi">
                                        <ul class="nav nav-sm flex-column">
                                            <li class="nav-item">
                                                <a href="" class="nav-link">
                                                    Danh sách </a>
                                            </li>
                
                                        </ul>
                                    </div>
                                </li> --}}

                                

                {{-- <li class="nav-item">
                    <a class="nav-link menu-link collapsed" href="#sidebarLayouts" data-bs-toggle="collapse"
                        role="button" aria-expanded="false" aria-controls="sidebarLayouts">
                        <i class="ph-layout"></i> <span data-key="t-layouts">Layouts</span> <span
                            class="badge badge-pill bg-danger" data-key="t-hot">Hot</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarLayouts">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="layouts-horizontal.html" target="_blank" class="nav-link"
                                    data-key="t-horizontal">Horizontal</a>
                            </li>
                            <li class="nav-item">
                                <a href="layouts-detached.html" target="_blank" class="nav-link"
                                    data-key="t-detached">Detached</a>
                            </li>
                            <li class="nav-item">
                                <a href="layouts-two-column.html" target="_blank" class="nav-link"
                                    data-key="t-two-column">Two Column</a>
                            </li>
                            <li class="nav-item">
                                <a href="layouts-vertical-hovered.html" target="_blank" class="nav-link"
                                    data-key="t-hovered">Hovered</a>
                            </li>
                        </ul>
                    </div>
                </li> --}}


            </ul>
        </div>

    </div>

    <div class="sidebar-background"></div>
</div>

<div class="vertical-overlay"></div>
