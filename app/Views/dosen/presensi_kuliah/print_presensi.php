<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Print Presensi | iCampus</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/Ionicons/css/ionicons.min.css">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body onload="window.print();">
    <div class="wrapper">
        <!-- Main content -->
        <section class="invoice">
            <!-- title row -->
            <div class="row">
                <div class="col-xs-12">
                    <h3 class="page-header">
                        <i class="fa fa-file-o"></i> <b>Presensi Kelas</b>
                        <small class="pull-right">Tanggal : <?= date('d M Y') ?></small>
                    </h3>
                </div>
                <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
                <div class="col-xs-6 table-responsive">
                    <table class="table-striped table-responsive">
                        </tr>
                            <th width="150px">Dosen Pengampu</th>
                            <td width="20px">:</td>
                            <td><?= $jadwal['nama_dosen'] ?></td>
                        </tr>
                        </tr>
                            <th>Mata Kuliah</th>
                            <td>:</td>
                            <td><?= $jadwal['matkul'] ?></td>
                        </tr>
                        <tr>
                            <th>Kelas</th>
                            <td>:</td>
                            <td><?= $jadwal['kelas'] ?></td>
                        </tr>
                    </table>
                    </div>

                    <div class="col-xs-6 table-responsive">
                    <table class="table-striped table-responsive">
                        <tr>
                            <th width="210px">SKS</th>
                            <td width="20px">:</td>
                            <td><?= $jadwal['sks'] ?></td>
                        </tr>
                            <th>Tahun Akademik - Semester</th>
                            <td>:</td>
                            <td><?= $ta['ta'] ?> - <?= $ta['semester'] ?></td>
                        </tr>
                        </tr>
                            <th>Waktu Mengajar</th>
                            <td>:</td>
                            <td><?= $jadwal['hari'] ?>, <?= $jadwal['waktu'] ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <br>
                <div class="col-sm-12">
                    <table class="table table-striped table-bordered table-responsive text-sm">
                        <tr class="label-success">
                            <th rowspan="2" class="text-center">No</th>
                            <th rowspan="2" class="text-center" width="40px">NIM</th>
                            <th rowspan="2" class="text-center" width="180px">Nama</th>
                            <th colspan="16" class="text-center">Pertemuan</th>
                            <th rowspan="2" class="text-center">%</th>
                        </tr>
                        <tr class="label-success">
                            <td class="text-center">1</td>
                            <td class="text-center">2</td>
                            <td class="text-center">3</td>
                            <td class="text-center">4</td>
                            <td class="text-center">5</td>
                            <td class="text-center">6</td>
                            <td class="text-center">7</td>
                            <td class="text-center">8</td>
                            <td class="text-center">9</td>
                            <td class="text-center">10</td>
                            <td class="text-center">11</td>
                            <td class="text-center">12</td>
                            <td class="text-center">13</td>
                            <td class="text-center">14</td>
                            <td class="text-center">15</td>
                            <td class="text-center">16</td>

                        </tr>
                        <?php $no = 1;
                        foreach ($mhs as $key => $value) {

                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td class="text-center"><?= $value['nim'] ?></td>
                                <td><?= $value['nama_mahasiswa'] ?></td>
                                <td><?php if ($value['p1'] == 0) {
                                        echo '<i class="fa fa-times text-danger"></i>';
                                    } elseif ($value['p1'] == 1) {
                                        echo '<i class="fa fa-info text-warning"></i>';
                                    } elseif ($value['p1'] == 2) {
                                        echo '<i class="fa fa-check text-success"></i>';
                                    } ?></td>
                                <td><?php if ($value['p2'] == 0) {
                                        echo '<i class="fa fa-times text-danger"></i>';
                                    } elseif ($value['p2'] == 1) {
                                        echo '<i class="fa fa-info text-warning"></i>';
                                    } elseif ($value['p2'] == 2) {
                                        echo '<i class="fa fa-check text-success"></i>';
                                    } ?></td>
                                <td><?php if ($value['p3'] == 0) {
                                        echo '<i class="fa fa-times text-danger"></i>';
                                    } elseif ($value['p3'] == 1) {
                                        echo '<i class="fa fa-info text-warning"></i>';
                                    } elseif ($value['p3'] == 2) {
                                        echo '<i class="fa fa-check text-success"></i>';
                                    } ?></td>
                                <td><?php if ($value['p4'] == 0) {
                                        echo '<i class="fa fa-times text-danger"></i>';
                                    } elseif ($value['p4'] == 1) {
                                        echo '<i class="fa fa-info text-warning"></i>';
                                    } elseif ($value['p4'] == 2) {
                                        echo '<i class="fa fa-check text-success"></i>';
                                    } ?></td>
                                <td><?php if ($value['p5'] == 0) {
                                        echo '<i class="fa fa-times text-danger"></i>';
                                    } elseif ($value['p5'] == 1) {
                                        echo '<i class="fa fa-info text-warning"></i>';
                                    } elseif ($value['p5'] == 2) {
                                        echo '<i class="fa fa-check text-success"></i>';
                                    } ?></td>
                                <td><?php if ($value['p6'] == 0) {
                                        echo '<i class="fa fa-times text-danger"></i>';
                                    } elseif ($value['p6'] == 1) {
                                        echo '<i class="fa fa-info text-warning"></i>';
                                    } elseif ($value['p6'] == 2) {
                                        echo '<i class="fa fa-check text-success"></i>';
                                    } ?></td>
                                <td><?php if ($value['p7'] == 0) {
                                        echo '<i class="fa fa-times text-danger"></i>';
                                    } elseif ($value['p7'] == 1) {
                                        echo '<i class="fa fa-info text-warning"></i>';
                                    } elseif ($value['p7'] == 2) {
                                        echo '<i class="fa fa-check text-success"></i>';
                                    } ?></td>
                                <td><?php if ($value['p8'] == 0) {
                                        echo '<i class="fa fa-times text-danger"></i>';
                                    } elseif ($value['p8'] == 1) {
                                        echo '<i class="fa fa-info text-warning"></i>';
                                    } elseif ($value['p8'] == 2) {
                                        echo '<i class="fa fa-check text-success"></i>';
                                    } ?></td>
                                <td><?php if ($value['p9'] == 0) {
                                        echo '<i class="fa fa-times text-danger"></i>';
                                    } elseif ($value['p9'] == 1) {
                                        echo '<i class="fa fa-info text-warning"></i>';
                                    } elseif ($value['p9'] == 2) {
                                        echo '<i class="fa fa-check text-success"></i>';
                                    } ?></td>
                                <td><?php if ($value['p10'] == 0) {
                                        echo '<i class="fa fa-times text-danger"></i>';
                                    } elseif ($value['p10'] == 1) {
                                        echo '<i class="fa fa-info text-warning"></i>';
                                    } elseif ($value['p10'] == 2) {
                                        echo '<i class="fa fa-check text-success"></i>';
                                    } ?></td>
                                <td><?php if ($value['p11'] == 0) {
                                        echo '<i class="fa fa-times text-danger"></i>';
                                    } elseif ($value['p11'] == 1) {
                                        echo '<i class="fa fa-info text-warning"></i>';
                                    } elseif ($value['p11'] == 2) {
                                        echo '<i class="fa fa-check text-success"></i>';
                                    } ?></td>

                                <td><?php if ($value['p12'] == 0) {
                                        echo '<i class="fa fa-times text-danger"></i>';
                                    } elseif ($value['p12'] == 1) {
                                        echo '<i class="fa fa-info text-warning"></i>';
                                    } elseif ($value['p12'] == 2) {
                                        echo '<i class="fa fa-check text-success"></i>';
                                    } ?></td>
                                <td><?php if ($value['p13'] == 0) {
                                        echo '<i class="fa fa-times text-danger"></i>';
                                    } elseif ($value['p13'] == 1) {
                                        echo '<i class="fa fa-info text-warning"></i>';
                                    } elseif ($value['p13'] == 2) {
                                        echo '<i class="fa fa-check text-success"></i>';
                                    } ?></td>
                                <td><?php if ($value['p14'] == 0) {
                                        echo '<i class="fa fa-times text-danger"></i>';
                                    } elseif ($value['p14'] == 1) {
                                        echo '<i class="fa fa-info text-warning"></i>';
                                    } elseif ($value['p14'] == 2) {
                                        echo '<i class="fa fa-check text-success"></i>';
                                    } ?></td>
                                <td><?php if ($value['p15'] == 0) {
                                        echo '<i class="fa fa-times text-danger"></i>';
                                    } elseif ($value['p15'] == 1) {
                                        echo '<i class="fa fa-info text-warning"></i>';
                                    } elseif ($value['p15'] == 2) {
                                        echo '<i class="fa fa-check text-success"></i>';
                                    } ?></td>
                                <td><?php if ($value['p16'] == 0) {
                                        echo '<i class="fa fa-times text-danger"></i>';
                                    } elseif ($value['p16'] == 1) {
                                        echo '<i class="fa fa-info text-warning"></i>';
                                    } elseif ($value['p16'] == 2) {
                                        echo '<i class="fa fa-check text-success"></i>';
                                    } ?></td>
                                <td>
                                    <?php
                                    $absensi = ($value['p1'] +
                                        $value['p2'] +
                                        $value['p3'] +
                                        $value['p4'] +
                                        $value['p5'] +
                                        $value['p6'] +
                                        $value['p7'] +
                                        $value['p8'] +
                                        $value['p9'] +
                                        $value['p10'] +
                                        $value['p11'] +
                                        $value['p12'] +
                                        $value['p13'] +
                                        $value['p14'] +
                                        $value['p15'] +
                                        $value['p16']) / 32 * 100;
                                    echo number_format($absensi, 0) . ' %';
                                    ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>

                </div>
            </div>
            <div class="row">
                <!-- accepted payments column -->
                <div class="col-xs-4">


                </div>
                <!-- /.col -->
                <div class="col-xs-4">

                </div>
                <div class="col-xs-4">
                    Malang, <?= date('d M Y') ?> <br>
                    Dosen Pengampu<br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <?= $jadwal['nama_dosen'] ?>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- ./wrapper -->
</body>

</html>