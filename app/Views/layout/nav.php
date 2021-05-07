     <!-- Collect the nav links, forms, and other content for toggling -->
     <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
       <ul class="nav navbar-nav">
         <li><a href="<?= base_url() ?>"><b>Home</b></a></li>
         <li><a href="<?= base_url('Kelas') ?>"><b>Kelas</b></a></li>
       </ul>
     </div>
     <!-- /.navbar-collapse -->
     <!-- Navbar Right Menu -->

     <div class="navbar-custom-menu">
       <ul class="nav navbar-nav">
        
         <!-- Messages: style can be found in dropdown.less-->
         <li class="dropdown messages-menu">

           <!-- Tasks Menu -->
         <li class="dropdown tasks-menu">
           <!-- Menu Toggle Button -->

           <!-- User Account Menu -->
         <li class="dropdown user user-menu">
           <!-- Menu Toggle Button -->
           <a href="#" class="dropdown-toggle" data-toggle="dropdown">
             <?php if(session()->get('username') == "") { ?>
             <li><a href="<?= base_url('login') ?>"><span class="hidden-xs"><b>Log in</b></span></a></li>
           </a>
                <!-- LOGGED IN -->
           <?php } else { ?> 
             <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../../dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">Alexander Pierce</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  Alexander Pierce - Web Developer
                  <small>Member since Nov. 2012</small>
                </p>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul> 
         </li>
         <?php } ?>
       </ul>
     </div>
     <!-- LOGGED IN -->
     <!-- /.navbar-custom-menu -->
     </div>
     <!-- /.container-fluid -->
     </nav>
     </header>

     <!-- Full Width Column -->
     <div class="content-wrapper">
       <div class="container">

         <!-- Main content -->
         <section class="content">