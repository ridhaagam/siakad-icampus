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
            <a href=<?= base_url('mahasiswa') ?>>
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
          <li><a href=<?= base_url('mahasiswa/krs') ?>><i class="glyphicon glyphicon-calendar"></i> <span>Kartu Rencana Studi(KRS)</span></a></li>
          <li><a href=<?= base_url('mahasiswa/khs') ?>><i class="glyphicon glyphicon-book"></i> <span>Kartu Hasil Studi(KHS)</span></a></li>
          <li><a href=<?= base_url('mahasiswa/absensi') ?>><i class="fa fa-user-circle-o"></i> <span>Absensi</span></a></li>
          </ul>
        </li>
       
        
    </section>
    <!-- /.sidebar -->
  </aside>