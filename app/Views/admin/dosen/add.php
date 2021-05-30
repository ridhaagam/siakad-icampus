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
          <li class="active"><a href=<?= base_url('dosen') ?>><i class=" fa fa-users"></i> <span>Dosen</span></a></li>
          <li><a href=<?= base_url('mahasiswa') ?>><i class=" fa fa-user"></i> <span>Mahasiswa</span></a></li>
          <li><a href=<?= base_url('prodi') ?>><i class=" fa fa-rss-square"></i> <span>Program Studi</span></a></li>
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
          <li><a href=<?= base_url('jadwal_kuliah') ?>><i class="glyphicon glyphicon-calendar"></i> <span>Jadwal Kuliah</span></a></li>
          <li><a href=<?= base_url('kelas') ?>><i class="glyphicon glyphicon-book"></i> <span>Kelas</span></a></li>
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
                echo form_open_multipart('dosen/insert');
                ?>

                <div class="col-sm-6">
                    <div class="form-group" id="only-number">
                    <label>Kode Dosen</label>
                    <input name="kode_dosen" class="form-control" placeholder="Kode Dosen">
                    </div>
                </div>    

                <div class="col-sm-6">
                    <div class="form-group" id="only-number">
                    <label>NIDN</label>
                    <input name="nidn" class="form-control" placeholder="NIDN">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                    <label>Nama Dosen</label>
                    <input name="nama_dosen" class="form-control" placeholder="Nama Dosen">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select name="jenkel" class="form-control">
                        <option value="">--- Pilih Jenis Kelamin ---</option>
                        <option value="Perempuan">Perempuan</option>
                        <option value="Laki-laki">Laki-laki</option>
                    </select>
                    </div>
                </div>

                <div class="col-sm-6">
                  <div class="form-group"> 
                      <label>Email</label>
                      <input name="email" class="form-control" placeholder="Email">
                  </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                    <label>Pendidikan</label>
                    <select name="pendidikan" class="form-control">
                        <option value="">--- Pilih Pendidikann ---</option>
                        <option value="S2">S2</option>
                        <option value="S3">S3</option>
                        <option value="profesor">Profesor</option>
                    </select>
                    </div>
                </div>

                <div class="col-sm-6">
                  <div class="form-group"> 
                      <label>Password</label>
                      <input name="password" class="form-control" id="number" maxlength="8" placeholder="Password">
                    <small style="color:red">*maximal 8 digit angka!</small>
                  </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group" id="only-number">
                    <label>No. Hp</label>
                    <input name="no_hp" class="form-control" id="number" maxlength="13" placeholder="No. Hp">
                    <small style="color:red">*terdiri dari 10-13 digit angka!</small>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                    <label>Foto Dosen</label>
                    <input type="file" name="foto" id="preview_gambar" class="form-control">
                    </div>
                </div>

                <div class="col-sm-6 ">
                    <div class="form-group"> 
                      <img src="<?= base_url('img-dosen/default-profile.jpg') ?>" id="gambar_load" width="100px">
                    </div>
                </div>

                </div>
            <div class="modal-footer">
                <a href="<?= base_url('dosen') ?>" class="btn btn-danger pull-left">Kembali</a>
                <button type="submit" class="btn btn-success">Simpan</button>
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