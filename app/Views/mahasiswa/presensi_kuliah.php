<!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->

      <!-- sidebar menu: : style can be found in sidebar.less -->
      
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Menu</li>

            <li>
            <a href=<?= base_url('admin') ?>>
                <i class="fa fa-tachometer"></i> <span>Dashboard</span>
            </a>
            </li>

            <li>
            <a href=<?= base_url('home') ?>>
                <i class="fa fa-home"></i></i> <span>Homepage</span>
            </a>
            </li>

            <li class="treeview">
                <a href="#">
                <i class="glyphicon glyphicon-th-list"></i> <span>Hasil Studi</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                <li class="active"><a href=<?= base_url('mhs/khs') ?>><i class="fa fa-id-card"></i> <span>Kartu Hasil Studi (KHS)</span></a></li>
                <li><a href=<?= base_url('mhs/transkrip') ?>><i class="fa fa-file-pdf-o"></i> <span>Transkrip</span></a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                <i class="fa fa-gear"></i> <span>KRS</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                <li><a href=<?= base_url('krs') ?>><i class="fa fa-folder-o"></i> <span>Pemrograman KRS</span></a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                <i class="fa fa-book"></i> <span>Akademik</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                <li><a href=<?= base_url('mhs/presensi') ?>><i class="fa fa-pencil-square-o"></i> <span>Presensi Kuliah</span></a></li>
                </ul>
            </li>

        </li>

    </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
<!-- =============================================== -->

<div class="content-wrapper">
  <div class="content">
    <h1>Halaman <?= $title ?></h1>

    <div class="box box-warning box-solid">
      <div class="box-header with-border">
        <h3 class="box-title">Data Mahasiswa</h3>
        <!-- /.box-tools -->
      </div>
      <!-- /.box-header -->
      <div class="box-body">

        <div class="col-sm-6">

            <table class="table table-bordered">
                </tr>
                    <th width="180px">Nama</th>
                    <td width="20px">:</td>
                    <td><?= $mhs['nama_mahasiswa'] ?></td>
                </tr>
                </tr>
                    <th>NIM</th>
                    <td>:</td>
                    <td><?= $mhs['nim'] ?></td>
                </tr>
            </table>

        </div>

        <div class="col-sm-6">
                        <table class="table table-bordered">
                            <tr>
                                <th width="220px">Tahun Akademik</th></th>
                                <td width="20px">:</td>
                                <td><?= $ta_aktif['ta'] ?></td>
                            </tr>
                                <th>Program Studi</th>
                                <td>:</td>
                                <td><?= $ta_aktif['semester'] ?></td>
                            </tr>
                        </table>
        </div>

      </div>
      <!-- /.box-body -->
    </div>


    <div class="box box-warning box-solid">
      <div class="box-header with-border">
        <h3 class="box-title"><?= $title ?></h3>
        <!-- /.box-tools -->
      </div>
      <!-- /.box-header -->
      <div class="box-body">

      <table class="table table-striped table-bordered table-responsive">
        <tr class="label-warning">
            <th rowspan="2" class="text-center">No</th>
            <th rowspan="2" class="text-center">Mata Kuliah</th>
            <th rowspan="2" class="text-center">SKS</th>
            <th rowspan="2" class="text-center">Kelas</th>
            <th rowspan="2" class="text-center">Dosen Pengampu</th>
            <th colspan="16" class="text-center">Pertemuan</th>
            <th rowspan="2" class="text-center">%</th>
        </tr>
        <tr class="label-warning">
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
        $sks = 0;
        foreach ($data_matkul as $key => $value) {
            $sks = $sks + $value['sks'];
        ?>
            <tr>
                <td><?= $no++ ?></td>
                <td class="text-center"><?= $value['matkul'] ?></td>
                <td class="text-center"><?= $value['sks'] ?></td>
                <td class="text-center"><?= $value['kelas'] ?></td>
                <td class="text-center"><?= $value['nama_dosen'] ?></td>
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
      <!-- /.box-body -->
    </div>


  </div>
</div>