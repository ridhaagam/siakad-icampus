<!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
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
          <li><a href=<?= base_url('tahun_akademik') ?>><i class="fa fa-folder-o"></i> <span>Tahun Akademik</span></a></li>
          </ul>
        </li>
       

        
    </section>
    <!-- /.sidebar -->
  </aside>
  
 <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content">

		<h2>Dashboard <small>Control Panel</small></h2>

        <div class="row">

        <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3>3</h3>

                <p>User</p>
            </div>
            <div class="icon">
                <i class="fa fa-user-circle-o"></i>
            </div>
            <a href="<?= base_url('user') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-navy">
            <div class="inner">
                <h3>400</h3>

                <p>Dosen</p>
            </div>
            <div class="icon">
                <i class="fa fa-users"></i>
            </div>
            <a href="<?= base_url('dosen') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3>7500</h3>

                <p>Mahasiswa</p>
            </div>
            <div class="icon">
                <i class="fa fa-user"></i>
            </div>
            <a href="<?= base_url('mahasiswa') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3>59</h3>

                <p>Program Studi</p>

            </div>
            <div class="icon">
                <i class="fa fa-rss-square"></i>
            </div>
            <a href="<?= base_url('prodi') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div> 

    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-blue">
            <div class="inner">
                <h3>10</h3>

                <p>Fakultas</p>
            </div>
            <div class="icon">
                <i class="fa fa-archive"></i>
            </div>
            <a href="<?= base_url('fakultas') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3>400</h3>

                <p>Mata Kuliah</p>
            </div>
            <div class="icon">
                <i class="fa fa-book"></i>
            </div>
            <a href="<?= base_url('matkul') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3>1</h3>

                <p>Gedung</p>
            </div>
            <div class="icon">
                <i class="fa fa-building-o"></i>
            </div>
            <a href="<?= base_url('gedung') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-maroon">
            <div class="inner">
                <h3>25</h3>

                <p>Ruangan</p>
            </div>
            <div class="icon">
                <i class="fa fa-columns"></i>
            </div>
            <a href="<?= base_url('ruangan') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>

</div>

      </section>
  </div>

</div>
 
 