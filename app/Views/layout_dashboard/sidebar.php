  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  </head>
  <!-- ADD THE CLASS fixed TO GET A FIXED HEADER AND SIDEBAR LAYOUT -->
  <!-- the fixed layout is not compatible with sidebar-mini -->

  <body class="hold-transition skin-red fixed sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="#" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini">
            <img src="https://infokhs.umm.ac.id/images/logo.png" width="100%" /></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg">
            <img src="https://infokhs.umm.ac.id/images/logo.png" width="100%" /></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>

          <ul class="nav pull-right">
              <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                  <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                    <?php if (session()->get('log') == 1) { ?>
                      <img src="<?= base_url('img-user/' . session()->get('foto')) ?>" class="user-image" alt="User Image">
                      <span class="hidden-xs"><?= session()->get('nama_user') ?></span>
                    <?php } elseif (session()->get('log') == 2) { ?>
                      <img src="<?= base_url('img-dosen/' . session()->get('foto')) ?>" class="user-image" alt="User Image">
                      <span class="hidden-xs"><?= session()->get('nama_dosen') ?></span>
                    <?php } elseif (session()->get('log') == 3) { ?>
                      <img src="<?= base_url('img-mahasiswa/' . session()->get('foto')) ?>" class="user-image" alt="User Image">
                      <span class="hidden-xs"><?= session()->get('nama_mahasiswa') ?></span>
                    <?php  } ?>
                      <span class=" fa fa-angle-down"></span>
                    </a>

                    <ul class="dropdown-menu">
                     
                    <li class="user-footer">
                        <div class="pull-left">
                            <a href="#" class="btn btn-default"> Profil</a>
                        </div>
                        <div class="pull-right">
                            <a href="<?= base_url('auth/logout') ?>" class="btn btn-default pull-left"> Log out</a>
                        </div>
                    </li>

                    </ul>
                    
                  </li>
                </ul>
            </div>
          </ul>
        </nav>
      </header>