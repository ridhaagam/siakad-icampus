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
          <i class="fa fa-id-card-o"></i> <span>Master</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">

          <li><a href=<?= base_url('user') ?>><i class=" fa fa-user-circle-o"></i> <span>User</span></a></li>
          <li><a href=<?= base_url('dosen') ?>><i class=" fa fa-users"></i> <span>Dosen</span></a></li>
          <li><a href=<?= base_url('mahasiswa') ?>><i class=" fa fa-user"></i> <span>Mahasiswa</span></a></li>
          <li><a href=<?= base_url('prodi') ?>><i class=" fa fa-rss-square"></i> <span>Program Studi</span></a></li>
          <li><a href=<?= base_url('fakultas') ?>><i class=" fa fa-archive"></i> <span>Fakultas</span></a></li>
          <li><a href=<?= base_url('matkul') ?>><i class="fa  fa-file-pdf-o"></i> <span>Mata Kuliah</span></a></li>
          <li><a href=<?= base_url('gedung') ?>><i class=" fa fa-building-o"></i> <span>Gedung</span></a></li>
          <li><a href=<?= base_url('ruangan') ?>><i class=" fa fa-columns"></i> <span>Ruangan</span></a></li>
          <li><a href=<?= base_url('tahun_akademik') ?>><i class=" fa fa-folder-o"></i> <span>Tahun Akademik</span></a></li>
        </ul>
      </li>

      <li class="active treeview">
        <a href="#">
          <i class="glyphicon glyphicon-th-list"></i> <span>Akademik</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href=<?= base_url('jadwal_kuliah') ?>><i class="glyphicon glyphicon-calendar"></i> <span>Jadwal Kuliah</span></a></li>
          <li class="active"><a href=<?= base_url('kelas') ?>><i class="glyphicon glyphicon-book"></i> <span>Kelas</span></a></li>
        </ul>
      </li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-gear"></i> <span>Settings</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href=<?= base_url('tahun_akademik/setting') ?>><i class="fa  fa-folder-o"></i> <span>Tahun Akademik</span></a></li>
        </ul>
      </li>

  </section>
  <!-- /.sidebar -->
</aside>

<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <div class="content">
    <h1>Halaman <?= $title ?></h1>
    <div class="box box-warning box-solid">
      <div class="box-header with-border">
        <h3 class="box-title">Data <?= $title ?></h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-toggle="modal" data-target="#add"><i class="fa fa-plus"></i> <b> Tambah</b></button>
        </div>
        <!-- /.box-tools -->
      </div>
      <!-- /.box-header -->
      <div class="box-body">
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

        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th width="50px" class="text-center">No</th>
              <th class="text-center">Nama Kelas</th>
              <th class="text-center">Program Studi</th>
              <th class="text-center">Dosen Pembimbing Akademik</th>
              <th class="text-center">Tahun</th>
              <th class="text-center">Jumlah</th>
              <th width="50px" class="text-center">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $db = \Config\Database::connect();
            $no = 1;
            foreach ($kelas as $key => $value) {
              $jml = $db->table('mahasiswa')
                ->where('id_kelas', $value['id_kelas'])
                ->countAllResults();
            ?>
              <tr>
                <td class="text-center"><?= $no++; ?></td>
                <td class="text-center"><?= $value['kelas'] ?> - <?= $value['angkatan'] ?></td>
                </td>
                <td class="text-center"><?= $value['prodi']  ?></td>
                <td class="text-center"><?= $value['nama_dosen']  ?></td>
                <td class="text-center"><?= $value['angkatan']  ?></td>
                <td class="text-center">
                  <p class="label label-warning"><?= $jml ?></p>
                  <br>
                  <a href="<?= base_url('kelas/rincian_kelas/' . $value['id_kelas']) ?>">Mahasiswa</a>
                </td>
                <td class="text-center">
                  <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?= $value['id_kelas'] ?>"><i class="fa fa-trash"></i></button>
                </td>
              </tr>
            <?php  } ?>

          </tbody>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
</div>



<!-- modal Add -->
<div class="modal fade" id="add">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Tambah Data <?= $title ?></h4>
      </div>
      <div class="modal-body">
        <?php
        echo form_open('kelas/add');
        ?>
        <div class="form-group">
          <label>Kelas</label>
          <select name="kelas" class="form-control">
            <option value="">Pilih Kelas</option>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="D">D</option>
            <option value="E">E</option>
            <option value="F">F</option>
            <option value="G">G</option>
            <option value="H">H</option>
            <option value="I">I</option>
            <option value="J">J</option>
            <option value="K">K</option>
            <option value="L">L</option>
          </select>
        </div>
        <div class="form-group">
          <label>Program Studi</label>
          <select name="id_prodi" class="form-control">
            <option value="">Pilih Program Studi</option>
            <?php foreach ($prodi as $key => $value) { ?>
              <option value="<?= $value['id_prodi'] ?>"><?= $value['prodi'] ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="form-group">
          <label>Dosen Pembimbing Akademik</label>
          <select name="id_dosen" class="form-control">
            <option value="">Pilih Dosen</option>
            <?php foreach ($dosen as $key => $value) { ?>
              <option value="<?= $value['id_dosen'] ?>"><?= $value['nama_dosen'] ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="form-group">
          <label>Tahun</label>
          <select name="angkatan" class="form-control">
            <option value="">Pilih Tahun</option>
            <?php for ($i = date('Y'); $i >= date('Y') - 5; $i--) { ?>
              <option value="<?= $i ?>"><?= $i ?></option>
            <?php } ?>
          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-success">Simpan</button>
      </div>
      <?php echo form_close() ?>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>



<!-- modal delete -->
<?php foreach ($kelas as $key => $value) { ?>
  <div class="modal fade" id="delete<?= $value['id_kelas'] ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Hapus <?= $title ?></h4>
        </div>
        <div class="modal-body">

          Apakah Anda Yakin Ingin Menghapus Data Kelas <b><?= $value['kelas'] ?> - <?= $value['angkatan'] ?> - <?= $value['prodi'] ?></b> ?

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Tutup</button>
          <a href="<?= base_url('kelas/delete/' . $value['id_kelas']) ?>" class="btn btn-success">Hapus</a>
        </div>

      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
<?php } ?>