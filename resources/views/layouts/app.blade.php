<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PFMS</title>

    <!-- Main Styling -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
                <div class="sidebar-brand-icon">
                    <i class="fa-solid fa-coins"></i>
                </div>
                <div class="sidebar-brand-text mx-3">PFMS</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item @if (Request::segment(1) == 'dashboard') active @endif">
                <a class="nav-link" href="/dashboard">
                    <i class="fa-solid fa-house"></i>
                    <span>Dashboard</span></a>
            </li>

            @if (Auth::user()->bp_access)
                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Nav Item - Budget Plan -->
                <li class="nav-item @if (Request::segment(1) == 'budget-plan') active @endif">
                    <a class="nav-link" href="/budget-plan">
                        <i class="fa-solid fa-list-check"></i>
                        <span>Budget Plan</span></a>
                </li>
            @endif

            @if (Auth::user()->mf_access)
                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Nav Item - Manage Funds -->
                <li class="nav-item @if (Request::segment(1) == 'manage-funds') active @endif">
                    <a class="nav-link" href="/manage-funds">
                        <i class="fa-solid fa-hand-holding-dollar"></i>
                        <span>Manage Funds</span></a>
                </li>
            @endif

            @if (Auth::user()->cf_access)
                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Nav Item - Cash Flow -->
                <li class="nav-item @if (Request::segment(1) == 'cash-flow') active @endif">
                    <a class="nav-link" href="/cash-flow">
                        <i class="fa-solid fa-money-bill-transfer"></i>
                        <span>Cash Flow</span></a>
                </li>
            @endif

            @if (Auth::user()->m_access)
                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Nav Item - Management-->
                <li class="nav-item @if (Request::segment(1) == 'management') active @endif">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUser"
                        aria-expanded="true" aria-controls="collapseUser">
                        <i class="fa-solid fa-gear"></i>
                        <span>Management</span>
                    </a>
                    <div id="collapseUser" class="collapse" aria-labelledby="headingThree"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item @if (Request::segment(1) == 'management' && Request::segment(2) == 'users') active @endif"
                                href="/management/users">Users</a>
                            <a class="collapse-item @if (Request::segment(1) == 'management' && Request::segment(2) == 'categories') active @endif"
                                href="/management/categories">Categories</a>
                        </div>
                    </div>
                </li>
            @endif
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span
                                    class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}</span>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" id="logout-btn">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid" id="app">
                    @yield('content')
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright 2022 &copy; PFMS by Saionachi</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Global Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
