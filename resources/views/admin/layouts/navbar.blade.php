<div class="app-menu navbar-menu">

    <div class="navbar-brand-box">
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
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">

                <li class="menu-title"><span data-key="t-menu">Menu</span></li>

                <li class="nav-item">
                    <a class="nav-link menu-link collapsed" href="#sidebarDashboards" data-bs-toggle="collapse"
                        role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="ph-gauge"></i> <span data-key="t-dashboards">Dashboards</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarDashboards">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="dashboard-analytics.html" class="nav-link" data-key="t-analytics">
                                    Analytics </a>
                            </li>
                            <li class="nav-item">
                                <a href="dashboard-crm.html" class="nav-link" data-key="t-crm"> CRM </a>
                            </li>
                            <li class="nav-item">
                                <a href="index.html" class="nav-link" data-key="t-ecommerce"> Ecommerce </a>
                            </li>
                            <li class="nav-item">
                                <a href="dashboard-learning.html" class="nav-link" data-key="t-learning">
                                    Learning </a>
                            </li>
                            <li class="nav-item">
                                <a href="dashboard-real-estate.html" class="nav-link" data-key="t-real-estate">
                                    Real Estate </a>
                            </li>
                        </ul>
                    </div>
                </li>
                {{-- faq --}}
                <li class="nav-item">
                    <a class="nav-link menu-link collapsed" href="#cauHoi" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="cauHoi">
                        <i class="ph-gauge"></i> <span data-key="t-dashboards">Câu hỏi</span>
                    </a>
                    <div class="collapse menu-dropdown" id="cauHoi">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{route('faqs.index')}}" class="nav-link">
                                    Danh sách câu hỏi</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('faqs.create')}}" class="nav-link">
                                    Thêm mới câu hỏi </a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link collapsed" href="#notifications" data-bs-toggle="collapse"
                        role="button" aria-expanded="false" aria-controls="notifications">
                        <i class="ph-layout"></i> <span data-key="t-layouts">Thông báo</span>
                    </a>
                    <div class="collapse menu-dropdown" id="notifications">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{route('notifications.index')}}"  class="nav-link">
                                    Danh sách thông báo</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('notifications.create')}}"  class="nav-link">
                                    Thêm mới thông báo</a>
                            </li>
                            
                        </ul>
                    </div>
                </li>



            </ul>
        </div>

    </div>

    <div class="sidebar-background"></div>
</div>

<div class="vertical-overlay"></div>
