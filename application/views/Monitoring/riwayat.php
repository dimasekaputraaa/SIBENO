
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tabel Riwayat</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Waktu</th>
                                            <th>Nama Titik</th>
                                            <th>Lokasi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                                foreach ($queryAllTitik as $row){
                                            ?>
                                        <tr>
                                            <td><?php echo $row->waktu ?></td>
                                            <td><?php echo $row->nama_titik ?></td>
                                            <td ><a href="<?php echo $row->link?>" style="text-decoration:none;">Lihat Lokasi>></a></td>
                                        </tr>
                                        <?php } ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->