<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->

      <!-- sidebar menu: : style can be found in sidebar.less -->

      <ul class="sidebar-menu" data-widget="tree">
        <li class="header"><b>Menu</b></li>

        <li class="active">
          <a href=<?= base_url('admin') ?>>
            <i class="fa fa-tachometer"></i></i> <span>Dashboard</span>
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
          <li><a href=<?= base_url('mata_kuliah') ?>><i class=" fa fa-book"></i> <span>Mata Kuliah</span></a></li>
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
          <li><a href=<?= base_url('jadwal_kuliah') ?>><i class=" fa fa-calendar"></i> <span>Jadwal Kuliah</span></a></li>
          <li><a href=<?= base_url('kelas') ?>><i class=" fa fa-columns"></i> <span>Kelas</span></a></li>
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
          <li><a href=<?= base_url('user') ?>><i class="fa fa-user-plus"></i> <span>User</span></a></li>
          <li><a href=<?= base_url('tahun_akademik') ?>><i class="fa  fa-folder-o"></i> <span>Tahun Akademik</span></a></li>
          </ul>
        </li>
       

        
    </section>
    <!-- /.sidebar -->
  </aside>

<div class="content-wrapper">
    <div class="content">
        <h1>Halaman <?= $title ?></h1>
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Data <?= $title ?></h3>

                <div class="box-tools pull-right">
                    <a href="<?= base_url('prodi/add') ?>" class="btn btn-box-tool"><i class="fa fa-plus"></i> Tambah</a>
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
                            <th class="text-center">Fakultas</th>
                            <th class="text-center">Kode Prodi</th>
                            <th class="text-center">Program Studi</th>
                            <th class="text-center">Jenjang</th>
                            <th class="text-center">KA Prodi</th>
                            <th width="150px" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($prodi as $key => $value) { ?>
                            <tr>
                                <td class="text-center"><?= $no++; ?></td>
                                <td class="text-center"><?= $value['fakultas']  ?></td>
                                <td class="text-center"><?= $value['kode_prodi']  ?></td>
                                <td class="text-center"><?= $value['prodi']  ?></td>
                                <td class="text-center"><?= $value['jenjang']  ?></td>
                                <td class="text-center"><?= $value['ka_prodi']  ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url('prodi/edit/' . $value['id_prodi']) ?>" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
                                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?= $value['id_prodi'] ?>"><i class="fa fa-trash"></i></button>
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


<!-- modal delete -->
<?php foreach ($prodi as $key => $value) { ?>
    <div class="modal fade" id="delete<?= $value['id_prodi'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Hapus <?= $title ?></h4>
                </div>
                <div class="modal-body">

                    Apakah Anda Yakin Ingin Menghapus Data <b><?= $value['prodi'] ?></b> ?


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left " data-dismiss="modal">Tutup</button>
                    <a href="<?= base_url('prodi/delete/' . $value['id_prodi']) ?>" class="btn btn-success ">Hapus</a>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>