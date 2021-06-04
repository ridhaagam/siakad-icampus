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
          <li><a href=<?= base_url('jadwal') ?>><i class="glyphicon glyphicon-calendar"></i> <span>Jadwal Mengajar</span></a></li>
          <li><a href=<?= base_url('absen_kelas') ?>><i class="glyphicon glyphicon-book"></i> <span>Absen Kelas</span></a></li>
          <li><a href=<?= base_url('nilai_mahasiswa') ?>><i class="glyphicon glyphicon-book"></i> <span>Nilai Mahasiswa</span></a></li>
          </ul>
        </li>
       
        
    </section>
    <!-- /.sidebar -->
  </aside>
  
 <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content">

		<h2>Dashboard <small>Profil</small></h2>

        <div class="row">

        <div class="col-md-3">
        <!-- Profile Image -->
            <div class="box box-warning">
                <div class="box-body">
                    
                    <div class="text-center">
                        <img class="img-responsive" src="<?= base_url('img-dosen/' . $dosen['foto']) ?>" width="100%"><br>
                        <h4><b><?= $dosen['nama_dosen'] ?></b></h4>
                        <h5><b><?= $dosen['nidn'] ?></b></h5>
                        <h5><b><?= $dosen['email'] ?></b></h5>
                    </div>
                    
                </div>

            </div>

        </div>

        <div class="col-md-9">  
        
            <div class="box box-warning">
                <div class="box-body">
                    <h4>Data Dosen</h4>

                    <table class="table table-responsive">
                    <tr>
                        <th>Jenis Kelamin</th>
                        <th>:</th>
                        <td><?= $dosen['jenkel'] ?></td>
                    </tr>

                    <tr>
                        <th>No Handphone</th>
                        <th>:</th>
                        <td><?= $dosen['no_hp'] ?></td>
                    </tr>

                    <tr>
                        <th>Kode Dosen</th>
                        <th>:</th>
                        <td><?= $dosen['kode_dosen'] ?></td>
                    </tr>

                    <tr>
                        <th>Tahun Akademik</th>
                        <th>:</th>
                        <td><?= $ta['ta'] ?> - <?= $ta['semester'] ?></td>
                    </tr>

                    <tr>
                        <th>Tempat Lahir</th>
                        <th>:</th>
                        <td>Malang</td>
                    </tr>

                    <tr>
                        <th>Tanggal Lahir</th>
                        <th>:</th>
                        <td>4 Juni 1902</td>
                    </tr>

                    <tr>
                        <th>Jabatan Fungsional</th>
                        <th>:</th>
                        <td>Lektor</td>
                    </tr>

                    <tr>
                        <th>Pendidikan Tertinggi</th>
                        <th>:</th>
                        <td><?= $dosen['pendidikan'] ?></td>
                    </tr>

                    <tr>
                        <th>Status Ikatan Kerja</th>
                        <th>:</th>
                        <td>Dosen Tetap</td>
                    </tr>

                    <tr>
                        <th>Status Aktivitas</th>
                        <th>:</th>
                        <td>Aktif</td>
                    </tr>

                    <tr>
                        <th>Alamat</th>
                        <th>:</th>
                        <td>Malang</td>
                    </tr>

                </table>

                </div>

            </div>
        </div>

</div>


 
 