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

      <li class="treeview">
        <a href="#">
          <i class="fa fa-gear"></i> <span>Setting</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href=<?= base_url('dsn/setting_password/' . $dosen['id_dosen']) ?>><i class="fa fa-lock"></i> <span>Setting Password</span></a></li>
        </ul>
      </li>


  </section>
  <!-- /.sidebar -->
</aside>

<!-- =============================================== -->

<div class="content-wrapper">
  <div class="content">
    <h1>Halaman <?= $title ?></h1>
    <h3>Tahun Akademik : <?= $ta['ta'] ?> - <?= $ta['semester'] ?></h3>
    <div class="box box-warning box-solid">
      <div class="box-header with-border">
        <h3 class="box-title">Data <?= $title ?><medium style="color:white"></medium>
        </h3>

        <div class="box-tools pull-right">
        </div>
        <!-- /.box-tools -->
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table class="table table-striped table-bordered table-responsive">
          <tr>
            <th class="text-center">No</th>
            <th class="text-center">Kode MK</th>
            <th class="text-center">Mata Kuliah</th>
            <th class="text-center">SKS</th>
            <th class="text-center">Nama Kelas</th>
            <th class="text-center">Ruangan</th>
            <th class="text-center">Nilai</th>
          </tr>
          <?php $no = 1;
          foreach ($absen as $key => $value) { ?>
            <tr>
              <td class="text-center"><?= $no++ ?></td>
              <td class="text-center"><?= $value['kode_matkul'] ?></td>
              <td class="text-center"><?= $value['matkul'] ?></td>
              <td class="text-center"><?= $value['sks'] ?></td>
              <td class="text-center"><?= $value['kelas'] ?> - <?= $value['angkatan'] ?></td>
              <td class="text-center"><?= $value['ruangan'] ?></td>
              <td class="text-center">
                <a href="<?= base_url('dsn/nilai/' . $value['id_jadwal_kuliah']) ?>" class="btn btn-warning btn-sm"><i class="fa fa-calendar"></i></a>
              </td>
            </tr>
          <?php } ?>
        </table>
      </div>
    </div>