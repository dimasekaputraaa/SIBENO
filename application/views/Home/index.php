                <!-- Begin Page Content -->
                <div class="container-fluid">


                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-md-12 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Bendungan</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $this->db->query("Select kode_titik from data_titik")->num_rows(); ?>&nbsp;&nbsp;Bendungan</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-toolbox fa-2x text-gray-300"></i> <!-- <i class="fas fa-calendar fa-2x text-gray-300"></i> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <!-- <div class="col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Total Kebakaran</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-tired fa-2x text-gray-300"></i><i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-md-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <!-- <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Visualisasi Data Kebakaran</h6>
                                </div> -->

                                <div class="card-body py-3 d-flex flex-row align-items-center justify-content-between">
                                    <div class="chart-area">
                                        <h3 style="text-align:center; margin-top:10%;">Hai, Selamat Datang Kembali Admin!</h3>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <!-- <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="myAreaChart"></canvas>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
