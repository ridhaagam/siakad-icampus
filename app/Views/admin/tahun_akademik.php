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
          <i class="fa fa-user"></i> <span>Dashboard</span>
        </a>
      </li>
      <li>
        <a href=<?= base_url('home') ?>>
          <i class="fa fa-home"></i></i> <span>Homepage</span>
        </a>
      </li>
      <li class="active treeview">
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
          <li class="active"><a href=<?= base_url('prodi') ?>><i class=" fa fa-rss-square"></i> <span>Program Studi</span></a></li>
          <li><a href=<?= base_url('fakultas') ?>><i class=" fa fa-archive"></i> <span>Fakultas</span></a></li>
          <li><a href=<?= base_url('matkul') ?>><i class="fa  fa-file-pdf-o"></i> <span>Mata Kuliah</span></a></li>
          <li><a href=<?= base_url('gedung') ?>><i class=" fa fa-building-o"></i> <span>Gedung</span></a></li>
          <li><a href=<?= base_url('ruangan') ?>><i class=" fa fa-columns"></i> <span>Ruangan</span></a></li>
          <li><a href=<?= base_url('tahun_akademik') ?>><i class=" fa fa-folder-o"></i> <span>Tahun Akademik</span></a></li>
        </ul>
      </li>

      <li class="treeview">
        <a href="#">
          <i class="glyphicon glyphicon-th-list"></i> <span>Akademik</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href=<?= base_url('Jadwal_Kuliah') ?>><i class="glyphicon glyphicon-calendar"></i> <span>Jadwal Kuliah</span></a></li>
          <li><a href=<?= base_url('Kelas') ?>><i class="glyphicon glyphicon-book"></i> <span>Kelas</span></a></li>
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
          <li><a href=<?= base_url('User') ?>><i class="fa fa-user-plus"></i> <span>User</span></a></li>
          <li><a href=<?= base_url('tahun_akademik') ?>><i class="fa  fa-folder-o"></i> <span>Tahun Akademik</span></a></li>
        </ul>
      </li>



  </section>
  <!-- /.sidebar -->
</aside>

<!-- =============================================== -->

<div class="content-wrapper">
  <div class="content">
    <h1>Tahun Akademik</h1>
    <div class="box box-warning box-solid">
      <div class="box-header with-border">
        <h3 class="box-title">Data Tahun Akademik</h3>

        <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-toggle="modal" data-target="#add"><i class="fa fa-plus"></i> <b>Tambah</b></button>
        </div>
        <!-- /.box-tools -->
      </div>
      <!-- /.box-header -->
      <div class="box-body">
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
              <th class="text-center">Tahun Akademik</th>
              <th class="text-center">Semester</th>
              <th width="150px" class="text-center">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1;
            foreach ($ta as $key => $value) { ?>
              <tr>
                <td class="text-center"><?= $no++; ?></td>
                <td class="text-center"><?= $value['ta'] ?></td>
                <td class="text-center"><?= $value['semester'] ?></td>
                <td class="text-center">
                <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit<?= $value['id_tahun_akademik'] ?>"><i class="fa fa-pencil"></i></button>
                  <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?= $value['id_tahun_akademik'] ?>"><i class="fa fa-trash"></i></button>
                </td>
              </tr>
            <?php  } ?>

          </tbody>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
  </div>
</div>
<div class="modal fade" id="add">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Data Tahun Akademik</h4>
            </div>
            <div class="modal-body">
                <?php
                echo form_open('tahun_akademik/add');
                ?>

                <div class="form-group">
                    <label>Tahun Akademik</label>
                    <input name="ta" class="form-control" placeholder="Tahun Akademik" required>
                </div>
                <div class="form-group">
                <label>Semester</label>
                    <input name="semester" class="form-control" placeholder="Semester" required>
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
<?php foreach ($ta as $key => $value) { ?>
    <div class="modal fade" id="edit<?= $value['id_tahun_akademik'] ?>">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Perbarui Tahun Akademik</h4>
                </div>
                <div class="modal-body">
                    <?php
                    echo form_open('tahun_akademik/edit/' . $value['id_tahun_akademik']);
                    ?>

                    <div class="form-group">
                        <label>Tahun Akademik</label>
                        <input name="ta" value="<?= $value['ta'] ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Semester</label>
                        <input name="semester" value="<?= $value['semester'] ?>" class="form-control" required>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-success">Perbarui</button>
                </div>
                <?php echo form_close() ?>
            </div>
            <!-- /.modal-content -->
        </div>
        </div>
        <!-- /.modal-dialog -->
<?php } ?>

<!-- modal delete -->
<?php foreach ($ta as $key => $value) { ?>
  <div class="modal fade" id="delete<?= $value['id_tahun_akademik'] ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Hapus <?= $title ?></h4>
        </div>
        <div class="modal-body">

          Apakah Anda Yakin Ingin Menghapus Data <b><?= $value['ta'] ?>/<?= $value['semester'] ?></b> ?


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger pull-left " data-dismiss="modal">Tutup</button>
          <a href="<?= base_url('tahun_akademik/delete/' . $value['id_tahun_akademik']) ?>" class="btn btn-success ">Hapus</a>
        </div>

      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
<?php } ?>