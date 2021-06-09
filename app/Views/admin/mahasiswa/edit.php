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
          <li class="active"><a href=<?= base_url('mahasiswa') ?>><i class=" fa fa-user"></i> <span>Mahasiswa</span></a></li>
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
          <li><a href=<?= base_url('tahun_akademik/setting') ?>><i class="fa  fa-folder-o"></i> <span>Tahun Akademik</span></a></li>
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
            echo form_open_multipart('mahasiswa/update/' . $mahasiswa['id_mhs']);
            ?>

            <div class="col-sm-6">
              <div class="form-group" id="only-number">
                <label>NIM</label>
                <input name="nim" value="<?= $mahasiswa['nim'] ?>" class="form-control" placeholder="NIM">
              </div>
            </div>

            <div class="col-sm-6">
              <div class="form-group" id="only-number">
                <label>Nama Mahasiswwa</label>
                <input name="nama_mahasiswa" value="<?= $mahasiswa['nama_mahasiswa'] ?>" class="form-control" placeholder="Nama Mahasiswa">
              </div>
            </div>

            <div class="col-sm-6">
              <div class="form-group">
                <label>Alamat</label>
                <input name="alamat" value="<?= $mahasiswa['alamat'] ?>" class="form-control" placeholder="Alamat">
              </div>
            </div>

            <div class="col-sm-6">
              <div class="form-group">
                <label>Jenis Kelamin</label>
                <select name="jenkel" class="form-control">
                  <option value="<?= $mahasiswa['jenkel'] ?>"><?= $mahasiswa['jenkel'] ?></option>
                  <option value="Perempuan">Perempuan</option>
                  <option value="Laki-laki">Laki-laki</option>
                </select>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="form-group">
                <label>Tempat, Tanggal Lahir</label>
                <input name="ttl" value="<?= $mahasiswa['ttl'] ?>"class="form-control" placeholder="Ex: Malang, 01 Januari 2002">
              </div>
            </div>

            <div class="col-sm-6">
              <div class="form-group">
                <label>Email</label>
                <input name="email" value="<?= $mahasiswa['email'] ?>" class="form-control" placeholder="Email">
              </div>
            </div>

            <div class="col-sm-6">
              <div class="form-group">
                <label>Password</label>
                <input name="password" value="<?= $mahasiswa['password'] ?>" class="form-control" id="number" maxlength="8" placeholder="Password">
                <small style="color:red">*maximal 8 digit angka!</small>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="form-group" id="only-number">
                <label>No. Hp</label>
                <input name="no_hp" value="<?= $mahasiswa['no_hp'] ?>" class="form-control" id="number" maxlength="13" placeholder="Nomor Telepon">
                <small style="color:red">*terdiri dari 10-13 digit angka!</small>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="form-group">
                <label>Program Studi</label>
                <select name="id_prodi" class="form-control">
                  <option value="<?= $mahasiswa['id_prodi'] ?>"><?= $mahasiswa['prodi'] ?></option>
                  <?php foreach ($prodi as $key => $value) { ?>
                    <option value="<?= $value['id_prodi'] ?>"><?= $value['prodi'] ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="form-group">
                <label>Status Mahasiswa</label>
                <select name="status_mahasiswa" class="form-control">
                  <option value="<?= $mahasiswa['status_mahasiswa'] ?>"><?= $mahasiswa['status_mahasiswa'] ?></option>
                  <option value="Belum Lulus">Belum Lulus</option>
                  <option value="Lulus">Lulus</option>
                </select>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="form-group">
                <label>Ganti Foto Mahasiswa</label>
                <input type="file" name="foto" id="preview_gambar3" class="form-control">
              </div>
            </div>

            <div class="col-sm-6 ">
              <div class="form-group">
                <img src="<?= base_url('img-mahasiswa/' . $mahasiswa['foto']) ?>" id="gambar_load3" width="100px">
              </div>
            </div>

          </div>
          <div class="modal-footer">
            <a href="<?= base_url('mahasiswa') ?>" class="btn btn-danger pull-left"><i class="fa fa-caret-left"></i> Kembali</a>
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