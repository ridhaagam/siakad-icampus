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
                        <i class="fa fa-file-o"></i> <b>Nilai Mahasiswa</b>
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
                <table class="table table-bordered table-responsive text-md">
                <tr class="label-warning">
                        <th rowspan="2" class="text-center">No</th>
                        <th rowspan="2" class="text-center">NIM</th>
                        <th rowspan="2" class="text-center">Nama</th>
                        <th colspan="6" class="text-center">Nilai</th>
                    </tr>
                    <tr class="label-warning">
                        <td class="text-center">Absensi</td>
                        <td class="text-center" width="80px">Tugas</td>
                        <td class="text-center" width="80px">UTS</td>
                        <td class="text-center" width="80px">UAS</td>
                        <td class="text-center">Akhir <br>(15% + 15% + 30% + 40%)</td>
                        <td class="text-center">Huruf</td>
                    </tr>
                    <?php $no = 1;
                    foreach ($mhs as $key => $value) {

                    ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td class="text-center"><?= $value['nim'] ?></td>
                            <td><?= $value['nama_mahasiswa'] ?></td>
                            <td class="text-center">
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
                                    echo number_format($absensi, 0);
                                    ?>
                            </td>
                            <td class="text-center"><?= $value['nilai_tugas'] ?></td>
                            <td class="text-center"><?= $value['nilai_uts'] ?></td>
                            <td class="text-center"><?= $value['nilai_uas'] ?></td>
                            <td class="text-center"><?= $value['nilai_akhir'] ?></td>
                            <td class="text-center"><?= $value['nilai_huruf'] ?></td>
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