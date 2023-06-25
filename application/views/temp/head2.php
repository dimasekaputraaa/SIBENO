<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SIPENDEKAR</title>

    <script type="text/javascript" src="<?php echo base_url('jquery/jquery.min.js') ?>"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            setInterval(function() {
                console.log('1')
                $("#suhu").load("<?php echo site_url('monitoring/ceksuhu/' . $kode_titik) ?>");
                $("#co").load("<?php echo site_url('monitoring/cekco/' . $kode_titik) ?>");
                $("#status").load("<?php echo site_url('monitoring/cekstatus/' . $kode_titik) ?>");
            }, 1000);
        });
        $(document).ready(function() {
            setInterval(function() {
                console.log('tes')
                $.ajax({
                    url: '<?= site_url('monitoringsensor/checkSensor') ?>',
                    method: 'get',
                    dataType: 'json',
                    success: function(response) {
                        $('#status').text()
                    }
                });
                console.log('tes 1')
            }, 10000);
        });
    </script>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url('assets/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
    <link rel="icon" href="<?php echo base_url('assets/img/ico.png') ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url('assets/css/sb-admin-2.min.css') ?>" rel="stylesheet">

</head>