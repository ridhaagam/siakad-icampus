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

        <li class="treeview">
          <a href="#">
          <i class="glyphicon glyphicon-th-list"></i> <span>Akademik</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li><a href=<?= base_url('dsn/jadwal') ?>><i class="glyphicon glyphicon-calendar"></i> <span>Jadwal Kuliah</span></a></li>
          <li><a href=<?= base_url('dsn/presensi_kuliah') ?>><i class="glyphicon glyphicon-book"></i> <span>Presensi Kuliah</span></a></li>
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
            echo form_open_multipart('dsn/update/' . $dosen['id_dosen']);
            ?>
                    <h4>Data Dosen</h4>

                    <table class="table table-responsive">
              

                    <div class="col-sm-6">
                        <div class="form-group">
                          <label>Jenis Kelamin</label>
                          <select name="jenkel" class="form-control">
                            <option value="<?= $dosen['jenkel'] ?>"><?= $dosen['jenkel'] ?></option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                          </select>
                        </div>
                      </div>

                    <tr>
                    
                    <div class="col-sm-6">
              <div class="form-group" id="only-number">
                <label>No. Hp</label>
                <input name="no_hp" value="<?= $dosen['no_hp'] ?>" class="form-control" id="number" maxlength="13" placeholder="No. Hp">
                <small style="color:red">*terdiri dari 10-13 digit angka!</small>
              </div>
            </div>
                    </tr>
                    
                    <tr>
                    <div class="col-sm-6">
              <div class="form-group">
                <label>Tempat, Tanggal Lahir</label>
                <input name="ttl" value="<?= $dosen['ttl'] ?>" class="form-control" placeholder="ttl">
              </div>
            </div>
                    </tr>
                    <tr>
                    <div class="col-sm-6">
              <div class="form-group">
                <label>Alamat</label>
                <input name="alamat" value="<?= $dosen['alamat'] ?>" class="form-control" placeholder="alamat">
              </div>
            </div>
                    </tr>
                    <div class="modal-footer">
              <a href="<?= base_url('dsn') ?>" class="btn btn-danger pull-left"><i class="fa fa-caret-left"></i> Kembali</a>
              <button type="submit" class="btn btn-success">Perbarui</button>
            </div>
            <?php echo form_close() ?>
                </table>
                </div>
            <!-- /.box-body -->
            </div>
          <!-- /.box -->
        <div class="col-sm-3">
        </div>
      </div>
    </div>
  </div>