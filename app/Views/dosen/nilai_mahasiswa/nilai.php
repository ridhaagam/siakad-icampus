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
            <a href=<?= base_url('dsn') ?>>
            <i class="fa fa-tachometer"></i> <span>Dashboard</span>
          </a>
        </li>
        <li>
            <a href=<?= base_url('home') ?>>
            <i class="fa fa-home"></i></i> <span>Homepage</span>
          </a>
        </li>

        <li class="active treeview">
          <a href="#">
          <i class="glyphicon glyphicon-th-list"></i> <span>Akademik</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li><a href=<?= base_url('dsn/jadwal') ?>><i class="glyphicon glyphicon-calendar"></i> <span>Jadwal Kuliah</span></a></li>
          <li><a href=<?= base_url('dsn/presensi_kuliah') ?>><i class="glyphicon glyphicon-book"></i> <span>Presensi Kuliah</span></a></li>
          <li class="active"><a href=<?= base_url('dsn/nilai_mahasiswa') ?>><i class="fa fa-user-circle-o"></i> <span>Nilai Mahasiswa</span></a></li>
          </ul>
        </li>
       
        
    </section>
    <!-- /.sidebar -->
  </aside>
  
 <!-- =============================================== -->

 <div class="content-wrapper">
    <div class="content">
        <h1>Halaman <?= $title ?></h1>

        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title"><?= $title ?></h3>

                <div class="box-tools pull-right">
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="row">
                <div class="box-body">
                    <div class="col-sm-6">

                        <table class="table table-bordered">
                            </tr>
                                <th width="200px">Dosen Pengampu</th>
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

                    <div class="col-sm-6">
                        <table class="table table-bordered">
                            <tr>
                                <th>SKS</th>
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
            </div>
        </div>

        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Data Nilai Mahasiswa</h3>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">

            <a href="<?= base_url('dsn/print_nilai/' . $jadwal['id_jadwal_kuliah']) ?>" target="_blank" class="btn btn-sm btn-primary"><i class="fa fa-print"></i> Print Nilai</a><br><br>

                <?php
                $errors = session()->getFlashdata('errors');
                if (!empty($errors)) { ?>
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            <?php foreach ($errors as $key => $value) { ?>
                                <li><?= esc($value) ?></li>
                            <?php } ?>
                        </ul>
                    </div>
                <?php } ?>

                <?php

                if (session()->getFlashdata('pesan')) {
                    echo '<div class="alert alert-success" role="alert">';
                    echo session()->getFlashdata('pesan');
                    echo '</div>';
                }
                ?>
                <?php echo form_open('dsn/simpan_nilai/' . $jadwal['id_jadwal_kuliah']) ?>
                <table class="table table-bordered table-responsive text-md">
                <tr class="label-warning">
                        <th rowspan="2" class="text-center">No</th>
                        <th rowspan="2" class="text-center">NIM</th>
                        <th rowspan="2" class="text-center">Nama</th>
                        <th colspan="7" class="text-center">Nilai</th>
                    </tr>
                    <tr class="label-warning">
                        <td class="text-center">Absensi</td>
                        <td class="text-center" width="80px">Tugas</td>
                        <td class="text-center" width="80px">UTS</td>
                        <td class="text-center" width="80px">UAS</td>
                        <td class="text-center">Akhir <br>(15% + 15% + 30% + 40%)</td>
                        <td class="text-center">Huruf</td>
                        <td class="text-center">Bobot</td>
                    </tr>
                    <?php $no = 1;
                    foreach ($mhs as $key => $value) {

                        echo form_hidden($value['id_krs'] . 'id_krs', $value['id_krs']);
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
                                    echo form_hidden($value['id_krs'] . 'absen', number_format($absensi, 0));

                                    ?>
                            </td>
                            <td class="text-center"><input name="<?= $value['id_krs'] ?>nilai_tugas" value="<?= $value['nilai_tugas'] ?>" type="text" class="form-control text-center"></td>
                            <td class="text-center"><input name="<?= $value['id_krs'] ?>nilai_uts" value="<?= $value['nilai_uts'] ?>" type="text" class="form-control text-center"></td>
                            <td class="text-center"><input name="<?= $value['id_krs'] ?>nilai_uas" value="<?= $value['nilai_uas'] ?>" type="text" class="form-control text-center"></td>
                            <td class="text-center"><?= $value['nilai_akhir'] ?></td>
                            <td class="text-center"><?= $value['nilai_huruf'] ?></td>
                            <td class="text-center"><?= $value['bobot'] ?></td>
                        </tr>
                    <?php } ?>
                </table>
                <button class="btn btn-success"><i class="fa fa-save"></i> Simpan dan Proses</button>
                <?php echo form_close() ?>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
</div>    
  