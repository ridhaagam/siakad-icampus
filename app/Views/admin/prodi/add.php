<!-- =============================================== -->
<script src="<?= base_url() ?>/template/jquery/dist/jquery.min.js"></script>
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
            echo form_open('prodi/insert');
            ?>

            <div class="form-group">
              <label>Fakultas</label>
              <select name="id_fakultas" class="form-control">
                <option value="">--- Pilih Fakultas ---</option>
                <?php foreach ($fakultas as $key => $value) { ?>
                  <option value="<?= $value['id_fakultas'] ?>"><?= $value['fakultas'] ?></option>
                <?php } ?>
              </select>
            </div>

            <div class="form-group" id="only-number">
              <label>Kode Program Studi</label>
              <input name="kode_prodi" class="form-control" id="number" maxlength="8" placeholder="Kode Program Studi">
              <small style="color:red">*maximum kode prodi 8 digit angka!</small>
            </div>
            <script>
              $(function() {
                $('#only-number').on('keydown', '#number', function(e) {
                  -1 !== $
                    .inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) || /65|67|86|88/
                    .test(e.keyCode) && (!0 === e.ctrlKey || !0 === e.metaKey) ||
                    35 <= e.keyCode && 40 >= e.keyCode || (e.shiftKey || 48 > e.keyCode || 57 < e.keyCode) &&
                    (96 > e.keyCode || 105 < e.keyCode) && e.preventDefault()
                });
              })
            </script>
            <div class="form-group">
              <label>Program Studi</label>
              <input name="prodi" class="form-control" placeholder="Program Studi">
            </div>

            <div class="form-group">
              <label>Jenjang</label>
              <select name="jenjang" class="form-control">
                <option value="">--- Pilih Jenjang ---</option>
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
                <option value="">--- Pilih KA Prodi ---</option>
                <?php foreach ($dosen as $key => $value) { ?>
                  <option value="<?= $value['nama_dosen'] ?>"><?= $value['nama_dosen'] ?></option>
                <?php } ?>

              </select>
            </div>

          </div>
          <div class="modal-footer">
            <a href="<?= base_url('prodi') ?>" class="btn btn-danger pull-left">Kembali</a>
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