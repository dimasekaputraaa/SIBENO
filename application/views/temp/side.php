<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" style="background-color: #219ebc; "  id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center"  href="<?php echo base_url('') ?>">
                <div class="sidebar-brand-icon rotate-n-15">
                  <i class="fa fa-angle-double-down" aria-hidden="true"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SIBENO</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Beranda
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item active" aria-expanded="true">
                <a class="nav-link collapsed" href="<?php echo base_url('') ?>">
                    <i class="fas fa-fw fa-water"></i>
                    <span>Beranda</span></a>
            </li>


            <!-- Heading -->
            <!-- <div class="sidebar-heading">
                Fitur
            </div>
 -->
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="<?php echo base_url('/monitoring') ?>" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-laptop-code"></i>
                    <span>Monitoring</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">FITUR APLIKASI:</h6>
                        <a class="collapse-item" href="<?php echo base_url('/monitoring') ?>">Monitoring</a>
                        <a class="collapse-item" href="<?php echo base_url('/monitoring/tambah') ?>">Tambah Data</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Tables -->

            <!-- Divider -->
<!--             <hr class="sidebar-divider d-none d-md-block"> -->

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline pt-5">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
            <div class="sidebar-card d-none d-lg-flex">
                <img class="sidebar-card-illustration mb-2" src="<?php echo base_url('assets/img/undraw_rocket.svg') ?>" alt="...">
                <p class="text-center mb-2"><strong>SIBENO - </strong> Sistem Informasi Bendungan Otomatis
                    <!-- Merupakan Sistem Yang Terkonfigurasi Dengan Alat Yang Dapat Mendeteksi Kebakaran. -->
                </p>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">