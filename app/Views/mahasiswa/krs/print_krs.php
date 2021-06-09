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
            <h1 class="text-center"><b>Universitas Muhammadiyah Malang</b></h1>
            <h2 class="text-center"><b>KARTU RENCANA STUDI (KRS)</b></h2><br>
            
            <!-- info row -->
            <div class="row invoice-info">
            <div class="col-xs-6 table-responsive">

                    <table class="table-striped table-responsive">
                        </tr>
                            <th width="160px">Nama</th>
                            <td width="20px">:</td>
                            <td><?= $mahasiswa['nama_mahasiswa'] ?></td>
                        </tr>
                        </tr>
                            <th>NIM</th>
                            <td>:</td>
                            <td><?= $mahasiswa['nim'] ?></td>
                        </tr>
                        </tr>
                            <th>Ketua Program Studi</th>
                            <td>:</td>
                            <td><?= $mahasiswa['ka_prodi'] ?></td>
                        </tr>
                    </table>

                    </div>

                    <div class="col-xs-6 table-responsive">
                                <table class="table-striped table-responsive">
                                    <tr>
                                        <th width="200px">Fakultas</th></th>
                                        <td width="20px">:</td>
                                        <td><?= $mahasiswa['fakultas'] ?></td>
                                    </tr>
                                        <th>Program Studi</th>
                                        <td>:</td>
                                        <td><?= $mahasiswa['prodi'] ?></td>
                                    </tr>
                                    </tr>
                                        <th>Tahun Akademik - Semester</th>
                                        <td>:</td>
                                        <td><?= $ta_aktif['ta'] ?> - <?= $ta_aktif['semester'] ?></td>
                                    </tr>
                                </table>
                    </div>
                <!-- /.col -->
            </div>
            <br>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
                <div class="col-xs-12 table-responsive">
                <table class="table table-striped table-bordered table-responsive">
                            <tr class="label-warning">
                                <th class="text-center">#</th>
                                <th class="text-center">Kode</th>
                                <th class="text-center">Mata Kuliah</th>
                                <th class="text-center">SKS</th>
                                <th class="text-center">Semester</th>
                                <th class="text-center">Kelas</th>
                                <th class="text-center">Ruang</th>
                                <th class="text-center">Dosen</th>
                                <th class="text-center">Waktu</th>
                            </tr>

                            <?php $no = 1;
                            $sks = 0;
                            foreach ($data_matkul as $key => $value) { 
                                $sks = $sks + $value['sks'];
                                ?>
                                <tr>
                                    <td class="text-center"><?= $no++ ?></td>
                                    <td><?= $value['kode_matkul'] ?></td>
                                    <td><?= $value['matkul'] ?></td>
                                    <td class="text-center"><?= $value['sks'] ?></td>
                                    <td class="text-center"><?= $value['smt'] ?></td>
                                    <td class="text-center"><?= $value['kelas'] ?>-<?= $value['angkatan'] ?></td>
                                    <td class="text-center"><?= $value['ruangan'] ?></td>
                                    <td><?= $value['nama_dosen'] ?></td>
                                    <td><?= $value['hari'] ?>, <?= $value['waktu'] ?></td>
                                </tr>
                            <?php } ?>

                        </table>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
                <!-- accepted payments column -->
                <div class="col-xs-4">
                    <p class="lead">Jumlah SKS : <?= $sks ?></p>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                </div>
                <div class="col-xs-4">
                        Malang, <?= date('d M Y') ?> <br>
                        Pembimbing Akademik <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <?= $mahasiswa['nama_dosen'] ?>
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