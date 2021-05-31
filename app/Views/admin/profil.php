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

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <div class="row">
    <div class="col-sm-12">
      <div class="right_col" role="main" style="min-height: 583px;">
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h2>Profil</h2>
              <br>
            </div>
          </div>

          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="profile_img">
              <div id="crop-avatar text-center">
                <img class="img-responsive avatar-view" src="img-user/avatar5.png" style="border-radius:50%; width:50%;">
              </div>
            </div>

            <h3>MUH. RIDHA AGAM</h3>
            <ul class="list-unstyled">
              <li><i class="fa fa-address-card user-profile-icon"></i> 202010370311035</li>
              <li><i class="fa fa-map-marker user-profile-icon"></i> Fakultas Teknik</li>
              <li><i class="fa fa-building user-profile-icon"></i> Program Studi Informatika</li>
              <li><i class="fa fa-phone user-profile-icon"></i> 082291991645</li>
              <li><i class="fa fa-envelope user-profile-icon"></i> muhridhaagam@gmail.com</li>

            </ul>
            <br>
            <a href="#" class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a>
          </div>

          <!-- /.box-body -->
          <div class="box-footer">

          </div>
          <!-- /.box-footer-->
        </div>
        <!-- /.box -->

        <!-- /.content -->
      </div>

    </div>
    =