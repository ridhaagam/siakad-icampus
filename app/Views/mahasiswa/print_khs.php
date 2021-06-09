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
        <h1 class="text-center"><b>Universitas Muhammadiyah Malang</b></h1>
        <h2 class="text-center"><b>KARTU HASIL STUDI (KHS)</b></h2><BR
        <!-- Main content -->
        <section class="invoice">
                    
            <!-- info row -->
            <div class="row invoice-info">
            <div class="col-xs-6 table-responsive">

                    <table class="table-striped table-responsive">
                        </tr>
                            <th width="160px">Nama</th>
                            <td width="20px">:</td>
                            <td><?= $mhs['nama_mahasiswa'] ?></td>
                        </tr>
                        </tr>
                            <th>NIM</th>
                            <td>:</td>
                            <td><?= $mhs['nim'] ?></td>
                        </tr>
                        </tr>
                            <th>Ketua Program Studi</th>
                            <td>:</td>
                            <td><?= $mhs['ka_prodi'] ?></td>
                        </tr>
                    </table>

                    </div>

                    <div class="col-xs-6 table-responsive">
                                <table class="table-striped table-responsive">
                                    <tr>
                                        <th width="200px">Fakultas</th></th>
                                        <td width="20px">:</td>
                                        <td><?= $mhs['fakultas'] ?></td>
                                    </tr>
                                        <th>Program Studi</th>
                                        <td>:</td>
                                        <td><?= $mhs['prodi'] ?></td>
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
                        <tr class="label-success">
                            <th class="text-center">NO</th>
                            <th class="text-center">KODE</th>
                            <th class="text-center">NAMA MATA KULIAH</th></th>
                            <th class="text-center">NILAI HURUF</th>
                            <th class="text-center">SKS</th>
                            <th class="text-center">NILAI X SKS</th>
                        </tr>
                        <?php $no = 1;
                        $sks = 0;
                        $grand_total_bobot = 0;
                        foreach ($data_matkul as $key => $value) {
                            $sks = $sks + $value['sks'];
                            $tot_bobot = $value['sks'] * $value['bobot'];
                            $grand_total_bobot = $grand_total_bobot + $tot_bobot;
                        ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td class="text-center"><?= $value['kode_matkul'] ?></td>
                                <td class="text-center"><?= $value['matkul'] ?></td>
                                <td class="text-center"><?= $value['nilai_huruf'] ?></td>
                                <td class="text-center"><?= $value['sks'] ?></td>
                                <td class="text-center"><?= $tot_bobot ?></td>

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
                    <h4><b>Total SKS : <?= $sks ?></b></h4>
                    <h4><b>IP : <?php if (empty($data_matkul)) {
                                    echo '0';
                                } else {
                                    echo number_format($grand_total_bobot / $sks, 2);
                                } ?></b></h4>

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
                    <?= $mhs['nama_dosen'] ?>
                
                </div>

                <div class="col-md-12 float-left">
                <h6><b>Catatan:</b></h6>
                <h6>1. KHS dinyatakan sah bila ditandatangani Pembimbing Akademik dan stempel basah Program Studi</h6>
                <h6>2. Data KHS yang sah adalah yang sesuai dengan database UMM, jika ada perbedaan versi cetak dengan yang ada di database maka</h6>
                <h6>&nbsp;&nbsp;&nbsp;&nbsp;KHS Cetak dinyatakan tidak sah.</h6>
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