
                <!-- Begin Page Content -->
                 <div class="container-fluid">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Ubah Data</h6>
                        </div>
                        <div class="card-body">
                            <form class="forms-sample" method="post" action="<?php echo base_url('monitoring/fungsiUbah') ?>" enctype="multipart/form-data">
                                
                                <div class="row">
                                <div class="form-group col-sm-2">
                                  <label for="exampleInputUsername1">Kode Titik</label>
                                  <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Kode titik" name="kode_titik" value="<?php echo $queryAllTitikdetail->kode_titik ?>" readonly>
                                </div>
                                <div class="form-group col-sm-10">
                                  <label for="exampleInputUsername1">Nama Bendungan</label>
                                  <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Nama Bendungan" name="nama_titik" value="<?php echo $queryAllTitikdetail->nama_titik ?>">
                                </div>
                                <div class="form-group col-sm-12">
                                  <label for="exampleInputUsername1">Link</label>
                                  <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Masukan Lokasi" name="link" value="<?php echo $queryAllTitikdetail->link ?>">
                                </div>
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputUsername1">Deskripsi</label>
                                  <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Deskripsi" name="deskripsi" value="<?php echo $queryAllTitikdetail->deskripsi ?>">
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputUsername1">Gambar Lokasi</label>
                                  <input type="file" class="form-control" id="exampleInputUsername1" name="foto" value="<?php echo $queryAllTitikdetail->foto ?>">
                                </div>
                                <button type="submit" class="btn btn-primary mr-2"><a style="color:white; text-decoration: none;">Ubah</a> </button>
                                <button class="btn btn-light"><a href="<?php echo base_url('monitoring') ?>" style="color:black; text-decoration: none;">Batal</a></button>
                              </form>
                        </div>
                    </div>

                </div>

                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

