<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
        <!-- Sidebar scroll-->
        <div>
            <div class="brand-logo d-flex align-items-center justify-content-between">
                <a href="{{ route('teacher-dashboard') }}" class="text-nowrap logo-img">
                    <img src="{{ asset('images/loginlogo.png') }}" width="180" alt="loading" />
                </a>
                <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                    <i class="ti ti-x fs-8"></i>
                </div>
            </div>
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                <ul id="sidebarnav">
                    <!-- Main Menu Label -->
                    <li class="nav-small-cap">
                        <i class="fas fa-ellipsis-v nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">Main Menu</span>
                    </li>

                    <!-- Dashboard -->
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('teacher-dashboard') }}" aria-expanded="false">
                            <span>
                                <i class="fas fa-columns"></i>
                            </span>
                            <span class="hide-menu">Dashboard</span>
                        </a>
                    </li>

                    <!-- Schedule -->
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="./ui-alerts.html" aria-expanded="false">
                            <span>
                                <i class="fas fa-calendar-alt"></i>
                            </span>
                            <span class="hide-menu">Schedule</span>
                        </a>
                    </li>

                    <!-- Student -->
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="./ui-card.html" aria-expanded="false">
                            <span>
                                <i class="fas fa-user-graduate"></i>
                            </span>
                            <span class="hide-menu">Student</span>
                        </a>
                    </li>

                    <!-- Review -->
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="./ui-forms.html" aria-expanded="false">
                            <span>
                                <i class="fas fa-star"></i>
                            </span>
                            <span class="hide-menu">Review</span>
                        </a>
                    </li>

                    <!-- Settings Label -->
                    <li class="nav-small-cap">
                        <i class="fas fa-cog nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">Setting</span>
                    </li>

                    <!-- Profile -->
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('teacher-profile') }}" aria-expanded="false">
                            <span>
                                <i class="fas fa-user"></i>
                            </span>
                            <span class="hide-menu">Profile</span>
                        </a>
                    </li>

                    <!-- Settings -->
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="./authentication-register.html" aria-expanded="false">
                            <span>
                                <i class="fas fa-cogs"></i>
                            </span>
                            <span class="hide-menu">Settings</span>
                        </a>
                    </li>

                    <!-- Logout -->
                    <li class="sidebar-item">

                        <a class="sidebar-link" href="/logout" aria-expanded="false">
                            <span>
                                <i class="fas fa-sign-out-alt"></i>
                            </span>
                            <span class="hide-menu">Logout</span>
                        </a>
                    </li>
                </ul>
            </nav>

            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <style>
        /* Hide default dropdown by Google */
        .goog-te-banner-frame {
            display: none !important;
        }

        .goog-te-menu-value {
            display: flex !important;
            align-items: center;
            justify-content: center;
            font-family: 'Arial', sans-serif;
            font-size: 16px;
            color: #333;
            background-color: #f4f4f4;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 5px 10px;
            cursor: pointer;
            width: 200px;
            margin: 0 auto;
            text-align: center;
        }

        .goog-te-menu-value:hover {
            background-color: #ddd;
            border-color: #aaa;
        }

        /* Dropdown options */
        .goog-te-menu-frame {
            border: 1px solid #ccc !important;
            border-radius: 5px !important;
            overflow: hidden !important;
        }

        .goog-te-menu2 {
            font-family: 'Arial', sans-serif !important;
            font-size: 14px !important;
            background-color: #fff !important;
            color: #333 !important;
            border-radius: 5px !important;
            padding: 10px;
            margin: 0 !important;
        }

        .goog-te-menu2 a {
            text-decoration: none !important;
            color: #333 !important;
            display: block !important;
            padding: 5px 10px !important;
            border-radius: 3px !important;
        }

        .goog-te-menu2 a:hover {
            background-color: #f4f4f4 !important;
            color: #000 !important;
        }
    </style>
    <div class="body-wrapper">
        <!--  Header Start -->
        <header class="app-header bg-light mt-4 w-100">
            <nav class="navbar navbar-expand-lg bg-light">
                <ul class="navbar-nav">
                    <li class="nav-item d-block d-xl-none">
                        <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                            <i class="ti ti-menu-2"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <h3><b>@yield('title')</b></h3>
                    </li>
                </ul>
                <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                    <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                        <div id="google_translate_element" class="custom-translate"></div>
                        <li class="nav-item">
                            <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                                <i class="ti ti-bell-ringing"></i>
                                <div class="notification bg-danger rounded-circle"></div>

                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!--  Header End -->
