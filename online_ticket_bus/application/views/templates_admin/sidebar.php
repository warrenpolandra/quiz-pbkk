<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-warning sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('admin/dashboard_admin') ?>">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-shield"></i>
                </div>
                <div class="sidebar-brand-text mx-3">OTB Admin</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url('admin/dashboard_admin') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                DATABASES
            </div>

            <!-- Nav Item - Buses -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('admin/buses') ?>">
                    <i class="fas fa-fw fa-bus"></i>
                    <span>Buses</span></a>
            </li>

            <!-- Nav Item - Companies -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('admin/company') ?>">
                    <i class="fas fa-fw fa-building"></i>
                    <span>Companies</span></a>
            </li>

            <!-- Nav Item - Routes -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('admin/routes') ?>">
                    <i class="fas fa-fw fa-map"></i>
                    <span>Routes</span></a>
            </li>

            <!-- Nav Item - Schedules -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('admin/schedules') ?>">
                    <i class="fas fa-fw fa-clock"></i>
                    <span>Schedules</span></a>
            </li>

            <!-- Nav Item - Transactions -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('admin/transactions') ?>">
                    <i class="fas fa-fw fa-dollar-sign"></i>
                    <span>Transactions</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                LOG OUT
            </div>

            <!-- Nav Item - Logout -->
            <li class="nav-item">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-fw fa-door-closed"></i>
                    <span>Logout</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

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

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-warning" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-warning" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <ul class="na navbar-nav navbar-right mr-4">
                            <?php if($this->session->userdata('username') !== null) { ?>
                            <li>
                                <div>Selamat Datang <?php echo $this->session->userdata('username') ?></div>
                            </li>
                            <li class="ml-2">
                                <?php echo anchor('auth/logout', 'Logout');?>
                            </li>
                            <?php } else {?>
                            <li>
                                <?php echo anchor('auth/login', 'Login');?>
                            </li>
                            <?php }?>
                        </ul>
                    </ul>

                </nav>
                <!-- End of Topbar -->