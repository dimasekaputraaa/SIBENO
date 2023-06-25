<!-- Begin Page Content -->
<div class="container-fluid">
    <script type="text/javascript">
        $(document).ready(function() {
            setInterval(function() {
                $("#debit").load("<?php echo site_url('monitoring/cekdebit/' . $kode_titik) ?>");
                $("#co").load("<?php echo site_url('monitoring/cekco/' . $kode_titik) ?>");
                // if( $('#suhu')[0].outerText >= 100 ) {
                //     $('#warning').css('display', 'block')
                // } else if( $('#suhu')[0].outerText < 100 ) {
                //     $('#warning').css('display', 'none')
                // }
            }, 1000);
        });
    </script>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="gambar col-xl-8">
                        <style type="text/css">
                            img {
                                height: 450px;
                            }

                            img.Suhu {
                                height: 80px;
                                width: 200px;

                            }

                            @media only screen and (max-width: 382px) {
                                img.Suhu {
                                    height: 40px;
                                    width: 100px;

                                }

                                img {
                                    height: 220px;
                                }
                            }
                        </style>

                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="<?= base_url('assets/foto/' . $detail->foto)  ?>" class="d-block w-100" alt="Foto Lokasi">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="monitoring col-xl-4 col-xs-12">
                        <table class="info mb-4 mt-2 ">
                            <tr>
                                <th>Nama</th>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td><?php echo $detail->nama_titik ?></td>
                            </tr>
                            <tr>
                                <th>Lokasi</th>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td><a href="<?php echo $detail->link ?>" style="text-decoration:none;">Lihat Lokasi>></a> </td>
                            </tr>
                            <tr>
                                <th>Debit Air</th>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td><span id="debit">0 </span> L/M</td>
                            </tr>
                            <tr>
                                <th>Tinggi Air</th>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td><span id="tinggi">0</span> Cm</td>
                            </tr>
                            <tr>
                                <th>Hujan</th>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td><span id="hujan">tidak hujan</td>
                            </tr>
                            <tr>
                                <th>Portal</th>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td><span id="portal">tertutup</td>
                            </tr>
                        </table>
                        <table class="table" id="dataTable" width="100%" cellspacing="0" >

                            <thead>
                                <tr>
                                    <th style="vertical-align: middle;">Kondisi</th>
                                    <th><img alt="suhu kondisi" class="Suhu" title="" src="<?php echo base_url('assets/img/hujan.png') ?>" /></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th style="vertical-align: middle;">Tinggi Air</th>
                                    <th><img alt="suhu kondisi" class="Suhu" title="" src="<?php echo base_url('assets/img/air.png') ?>" /></th>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>

<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->