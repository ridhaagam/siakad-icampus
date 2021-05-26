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
          <li><a href=<?= base_url('Tahun_Akademik') ?>><i class="fa  fa-folder-o"></i> <span>Tahun Akademik</span></a></li>
          </ul>
        </li>
       

        
    </section>
    <!-- /.sidebar -->
  </aside>
  
 <!-- =============================================== -->

<div class="content-wrapper">
    <div class="content">
        <h1>Halaman <?= $title ?></h1>
        <br>
        <div class="row">
        <div class="col-sm-3">
    </div>
    <div class="col-sm-6">
    <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title"><?= $title ?></h3>

                <div class="box-tools pull-right">

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
                echo form_open('prodi/update/' . $prodi['id_prodi']);
                ?>

                <div class="form-group">
                    <label>Fakultas</label>
                    <select name="id_fakultas" class="form-control">
                        <option value="<?= $prodi['id_fakultas'] ?>"><?= $prodi['fakultas'] ?></option>
                        <?php foreach ($fakultas as $key => $value) { ?>
                            <option value="<?= $value['id_fakultas'] ?>"><?= $value['fakultas'] ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Kode Program Studi</label>
                    <input name="kode_prodi" value="<?= $prodi['kode_prodi'] ?>" class="form-control" placeholder="Kode Program Studi" readonly>
                </div>

                <div class="form-group">
                    <label>Program Studi</label>
                    <input name="prodi" value="<?= $prodi['prodi'] ?>" class="form-control" placeholder="Program Studi">
                </div>

                <div class="form-group">
                    <label>Jenjang</label>
                    <select name="jenjang" class="form-control">
                        <option value="<?= $prodi['jenjang'] ?>"><?= $prodi['jenjang'] ?></option>
                        <option value="D1">D1</option>
                        <option value="D2">D2</option>
                        <option value="D3">D3</option>
                        <option value="D4">D4</option>
                        <option value="S1">S1</option>
                        <option value="S2">S2</option>
                        <option value="S3">S3</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>KA Prodi</label>
                    <select name="ka_prodi" class="form-control">
                        <option value="<?= $prodi['ka_prodi'] ?>"><?= $prodi['ka_prodi'] ?></option>
                        <?php foreach ($dosen as $key => $value) { ?>
                            <option value="<?= $value['nama_dosen'] ?>"><?= $value['nama_dosen'] ?></option>
                        <?php } ?>

                    </select>
                </div>


            </div>
            <div class="modal-footer">
                <a href="<?= base_url('prodi') ?>" class="btn btn-danger pull-left">Tutup</a>
                <button type="submit" class="btn btn-success">Perbarui</button>
            </div>
            <?php echo form_close() ?>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <div class="col-sm-3">
    </div>
        </div>
    </div>
</div>
