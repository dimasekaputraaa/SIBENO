<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SIBENO</title>

    <script type="text/javascript" src="<?php echo base_url('jquery/jquery.min.js') ?>"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            setInterval(function() {
                console.log('1')
                $("#debit").load("<?php echo site_url('monitoring/cekdebit/' . $kode_titik) ?>");
                $("#tinggi").load("<?php echo site_url('monitoring/cektinggi/' . $kode_titik) ?>");
                $("#hujan").load("<?php echo site_url('monitoring/cekhujan/' . $kode_titik) ?>");
                $("#portal").load("<?php echo site_url('monitoring/cekportal/' . $kode_titik) ?>");
            }, 1000);
        });
    </script>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url('assets/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
    <link rel="icon" href="<?php echo base_url('assets/img/ico.PNG') ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url('assets/css/sb-admin-2.min.css') ?>" rel="stylesheet">

</head>