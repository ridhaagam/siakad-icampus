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
          <li><a href=<?= base_url('user') ?>><i class="fa fa-user-plus"></i> <span>User</span></a></li>
          <li><a href=<?= base_url('tahun_akademik') ?>><i class="fa  fa-folder-o"></i> <span>Tahun Akademik</span></a></li>
          </ul>
        </li>
       
    </section>
    <!-- /.sidebar -->
  </aside>
  
 <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
 
  <div class="content-wrapper">
    <div class="content">
        <h1>Halaman <?= $title ?> : <label><?=$kelas['kelas'] ?> - <?= $kelas['angkatan']?></h1>
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Data <?= $title ?>: <label><?=$kelas['kelas'] ?></label></h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-toggle="modal" data-target="#add"><i class="fa fa-plus"></i> <b>Tambah</b></button>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <table class="table">
                        <tr>
                         <th width ="150px">Kelas</th>
                        <th width="30px">:</th>
                         <td><?= $kelas['kelas'] ?></td>
                        </tr>
                        <tr>
                         <th width ="150px">Angkatan</th>
                        <th width="30px">:</th>
                         <td><?= $kelas['angkatan'] ?></td>
                        </tr>
                        <tr>
                         <th>Program Studi</th>
                         <th>:</th>
                         <td><?= $kelas['prodi'] ?></td>
                        </tr>
                        <tr>
                         <th>Jumlah Mahasiswa</th>
                         <th>:</th>
                         <td><?= $jml ?></td>
                        </tr>
                       
                </table>
      
                <?php

                if (session()->getFlashdata('pesan')) {
                    echo '<div class="alert alert-success" role="alert">';
                    echo session()->getFlashdata('pesan');
                    echo '</div>';
                }
                ?>

                <table class="table table-bordered">
                    <tr>
                    <th width="50px" class="text-center label-warning">NO</th>
                    <th width="100px" class="text-center label-warning">NIM</th>
                    <th class="text-center label-warning">Nama Mahasiswa</th>
                    <th width="100px" class="text-center label-warning">Action</th>
                    </tr>
                    <?php $no = 1;
                    foreach ($mhs as $key => $value) { ?>
                    <tr>
                        <td class="text-center"><?= $no++ ?></td>
                        <td class="text-center"><?=$value['nim']?></td>
                        <td class="text-center"><?=$value['nama_mahasiswa']?></td>
                        <td class="text-center">
                            <a href="<?=base_url('kelas/remove_anggota_kelas/'. $value['id_mhs']. '/' . $kelas['id_kelas'])?>" button class="btn btn-sm btn-danger">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                   
                    </table>

            </div>
            <!-- /.box-body -->
        </div>
        <a href="<?= base_url('kelas') ?>" class="btn btn-danger pull-left">Kembali</a>
    </div>
</div>



    <!-- modal Add -->
    <div class="modal fade" id="add">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center">Data Mahasiswa</h4>
            </div>
            <div class="modal-body">
            <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>NIM</th>
                    <th>Nama Mahasiswa</th>
                    <th>Program Studi</th>
                    <th width="50px">Action</th>
                </tr>
            </thead>
                <tbody>
                        <?php $no=1; foreach ($non as $key => $value) { ?>
                            <?php if ($kelas['id_prodi'] == $value['id_prodi']) { ?>
                            <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $value['nim'] ?></td>
                            <td><?= $value['nama_mahasiswa'] ?></td>
                            <td><?= $value['prodi']?></td>
                          
                            <td class="text-center">
                      
                                <a href="<?=base_url('kelas/add_anggota_kelas/'. $value['id_mhs']. '/' . $kelas['id_kelas'])?>" class="btn btn-success btn-sm"><i class="fa fa-plus"></i></a>
                                
                                  <?php } ?>
                            </td>
                            </tr>
                      <?php  } ?>
                </tbody>
            </table>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>