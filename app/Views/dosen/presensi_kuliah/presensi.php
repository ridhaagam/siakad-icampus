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
          <li class="active"><a href=<?= base_url('dsn/presensi_kuliah') ?>><i class="glyphicon glyphicon-book"></i> <span>Presensi Kuliah</span></a></li>
          <li><a href=<?= base_url('dsn/nilai_mahasiswa') ?>><i class="fa fa-user-circle-o"></i> <span>Nilai Mahasiswa</span></a></li>
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
                <h3 class="box-title">Data Presensi</h3>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">

            <a href="<?= base_url('dsn/print_presensi/' . $jadwal['id_jadwal_kuliah']) ?>" target="_blank" class="btn btn-sm btn-primary"><i class="fa fa-print"></i> Print Presensi</a><br><br>

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
                <?php echo form_open('dsn/simpan_presensi/' . $jadwal['id_jadwal_kuliah']) ?>
                <table class="table table-bordered table-responsive text-md">
                    <tr class="label-warning">
                        <th rowspan="2" class="text-center">No</th>
                        <th rowspan="2" class="text-center">NIM</th>
                        <th rowspan="2" class="text-center">Nama</th>
                        <th colspan="18" class="text-center">Pertemuan</th>
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
                    foreach ($mhs as $key => $value) {

                        echo form_hidden($value['id_krs'] . 'id_krs', $value['id_krs']);
                    ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td class="text-center"><?= $value['nim'] ?></td>
                            <td><?= $value['nama_mahasiswa'] ?></td>
                            <td>

                                <select name="<?= $value['id_krs'] ?>p1">
                                    <option value="0" <?php if ($value['p1'] == 0) {
                                                            echo 'selected';
                                                        } ?>>A</option>
                                    <option value="1" <?php if ($value['p1'] == 1) {
                                                            echo 'selected';
                                                        } ?>>I</option>>I</option>
                                    <option value="2" <?php if ($value['p1'] == 2) {
                                                            echo 'selected';
                                                        } ?>>H</option>>H</option>
                                </select>
                            </td>
                            <td>
                                <select name="<?= $value['id_krs'] ?>p2">
                                    <option value="0" <?php if ($value['p2'] == 0) {
                                                            echo 'selected';
                                                        } ?>>A</option>
                                    <option value="1" <?php if ($value['p2'] == 1) {
                                                            echo 'selected';
                                                        } ?>>I</option>>I</option>
                                    <option value="2" <?php if ($value['p2'] == 2) {
                                                            echo 'selected';
                                                        } ?>>H</option>>H</option>
                                </select>
                            </td>
                            <td>
                                <select name="<?= $value['id_krs'] ?>p3">
                                    <option value="0" <?php if ($value['p3'] == 0) {
                                                            echo 'selected';
                                                        } ?>>A</option>
                                    <option value="1" <?php if ($value['p3'] == 1) {
                                                            echo 'selected';
                                                        } ?>>I</option>>I</option>
                                    <option value="2" <?php if ($value['p3'] == 2) {
                                                            echo 'selected';
                                                        } ?>>H</option>>H</option>
                                </select>
                            </td>
                            <td>
                                <select name="<?= $value['id_krs'] ?>p4">
                                    <option value="0" <?php if ($value['p4'] == 0) {
                                                            echo 'selected';
                                                        } ?>>A</option>
                                    <option value="1" <?php if ($value['p4'] == 1) {
                                                            echo 'selected';
                                                        } ?>>I</option>>I</option>
                                    <option value="2" <?php if ($value['p4'] == 2) {
                                                            echo 'selected';
                                                        } ?>>H</option>>H</option>
                                </select>
                            </td>
                            <td>
                                <select name="<?= $value['id_krs'] ?>p5">
                                    <option value="0" <?php if ($value['p5'] == 0) {
                                                            echo 'selected';
                                                        } ?>>A</option>
                                    <option value="1" <?php if ($value['p5'] == 1) {
                                                            echo 'selected';
                                                        } ?>>I</option>>I</option>
                                    <option value="2" <?php if ($value['p5'] == 2) {
                                                            echo 'selected';
                                                        } ?>>H</option>>H</option>
                                </select>
                            </td>
                            <td>
                                <select name="<?= $value['id_krs'] ?>p6">
                                    <option value="0" <?php if ($value['p6'] == 0) {
                                                            echo 'selected';
                                                        } ?>>A</option>
                                    <option value="1" <?php if ($value['p6'] == 1) {
                                                            echo 'selected';
                                                        } ?>>I</option>>I</option>
                                    <option value="2" <?php if ($value['p6'] == 2) {
                                                            echo 'selected';
                                                        } ?>>H</option>>H</option>
                                </select>
                            </td>
                            <td>
                                <select name="<?= $value['id_krs'] ?>p7">
                                    <option value="0" <?php if ($value['p7'] == 0) {
                                                            echo 'selected';
                                                        } ?>>A</option>
                                    <option value="1" <?php if ($value['p7'] == 1) {
                                                            echo 'selected';
                                                        } ?>>I</option>>I</option>
                                    <option value="2" <?php if ($value['p7'] == 2) {
                                                            echo 'selected';
                                                        } ?>>H</option>>H</option>
                                </select>
                            </td>
                            <td>
                                <select name="<?= $value['id_krs'] ?>p8">
                                    <option value="0" <?php if ($value['p8'] == 0) {
                                                            echo 'selected';
                                                        } ?>>A</option>
                                    <option value="1" <?php if ($value['p8'] == 1) {
                                                            echo 'selected';
                                                        } ?>>I</option>>I</option>
                                    <option value="2" <?php if ($value['p8'] == 2) {
                                                            echo 'selected';
                                                        } ?>>H</option>>H</option>
                                </select>
                            </td>
                            <td>
                                <select name="<?= $value['id_krs'] ?>p9">
                                    <option value="0" <?php if ($value['p9'] == 0) {
                                                            echo 'selected';
                                                        } ?>>A</option>
                                    <option value="1" <?php if ($value['p9'] == 1) {
                                                            echo 'selected';
                                                        } ?>>I</option>>I</option>
                                    <option value="2" <?php if ($value['p9'] == 2) {
                                                            echo 'selected';
                                                        } ?>>H</option>>H</option>
                                </select>
                            </td>
                            <td>
                                <select name="<?= $value['id_krs'] ?>p10">
                                    <option value="0" <?php if ($value['p10'] == 0) {
                                                            echo 'selected';
                                                        } ?>>A</option>
                                    <option value="1" <?php if ($value['p10'] == 1) {
                                                            echo 'selected';
                                                        } ?>>I</option>>I</option>
                                    <option value="2" <?php if ($value['p10'] == 2) {
                                                            echo 'selected';
                                                        } ?>>H</option>>H</option>
                                </select>
                            </td>
                            <td>
                                <select name="<?= $value['id_krs'] ?>p11">
                                    <option value="0" <?php if ($value['p11'] == 0) {
                                                            echo 'selected';
                                                        } ?>>A</option>
                                    <option value="1" <?php if ($value['p11'] == 1) {
                                                            echo 'selected';
                                                        } ?>>I</option>>I</option>
                                    <option value="2" <?php if ($value['p11'] == 2) {
                                                            echo 'selected';
                                                        } ?>>H</option>>H</option>
                                </select>
                            </td>
                            <td>
                                <select name="<?= $value['id_krs'] ?>p12">
                                    <option value="0" <?php if ($value['p12'] == 0) {
                                                            echo 'selected';
                                                        } ?>>A</option>
                                    <option value="1" <?php if ($value['p12'] == 1) {
                                                            echo 'selected';
                                                        } ?>>I</option>>I</option>
                                    <option value="2" <?php if ($value['p12'] == 2) {
                                                            echo 'selected';
                                                        } ?>>H</option>>H</option>
                                </select>
                            </td>
                            <td>
                                <select name="<?= $value['id_krs'] ?>p13">
                                    <option value="0" <?php if ($value['p13'] == 0) {
                                                            echo 'selected';
                                                        } ?>>A</option>
                                    <option value="1" <?php if ($value['p13'] == 1) {
                                                            echo 'selected';
                                                        } ?>>I</option>>I</option>
                                    <option value="2" <?php if ($value['p13'] == 2) {
                                                            echo 'selected';
                                                        } ?>>H</option>>H</option>
                                </select>
                            </td>
                            <td>
                                <select name="<?= $value['id_krs'] ?>p14">
                                    <option value="0" <?php if ($value['p14'] == 0) {
                                                            echo 'selected';
                                                        } ?>>A</option>
                                    <option value="1" <?php if ($value['p14'] == 1) {
                                                            echo 'selected';
                                                        } ?>>I</option>>I</option>
                                    <option value="2" <?php if ($value['p14'] == 2) {
                                                            echo 'selected';
                                                        } ?>>H</option>>H</option>
                                </select>
                            </td>
                            <td>
                                <select name="<?= $value['id_krs'] ?>p15">
                                    <option value="0" <?php if ($value['p15'] == 0) {
                                                            echo 'selected';
                                                        } ?>>A</option>
                                    <option value="1" <?php if ($value['p15'] == 1) {
                                                            echo 'selected';
                                                        } ?>>I</option>>I</option>
                                    <option value="2" <?php if ($value['p15'] == 2) {
                                                            echo 'selected';
                                                        } ?>>H</option>>H</option>
                                </select>
                            </td>
                            <td>
                                <select name="<?= $value['id_krs'] ?>p16">
                                    <option value="0" <?php if ($value['p16'] == 0) {
                                                            echo 'selected';
                                                        } ?>>A</option>
                                    <option value="1" <?php if ($value['p16'] == 1) {
                                                            echo 'selected';
                                                        } ?>>I</option>>I</option>
                                    <option value="2" <?php if ($value['p16'] == 2) {
                                                            echo 'selected';
                                                        } ?>>H</option>>H</option>
                                </select>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
                <button class="btn btn-success"><i class="fa fa-save"></i> Simpan Presensi</button>
                <?php echo form_close() ?>
            </div>
            
            <!-- /.box-body -->
        </div>
    </div>
</div>    
  