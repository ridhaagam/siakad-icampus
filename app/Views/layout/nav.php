     <!-- Collect the nav links, forms, and other content for toggling -->
     <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
       <ul class="nav navbar-nav">
         <li><a href="<?= base_url() ?>"><b>Home</b></a></li>
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
           <a href="#" class="dropdown-toggle" data-toggle="dropdown-sm">

             <div class="box-tools">
         <li><a href="" data-toggle="modal" data-target="#modal-default"><b>Log in</b></a></li>
     </div>

     </a>
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

           <!-- MODAL LOGGED IN -->
           <div class="modal fade" id="modal-default">
             <div class="modal-dialog modal-sm">
               <div class="modal-content">
                 <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span></button>
                   <h4 class="modal-title text-center"><b>iCampus Log in</b></h4>
                 </div>
                 <div class="modal-body">
                   <p>Silahkan Masukkan Username dan Password</p>

                   <div class="form-group has-feedback">
                     <input type="text" class="form-control" placeholder="Username">
                     <span class="glyphicon glyphicon-user form-control-feedback"></span>
                   </div>
                   <div class="form-group has-feedback">
                     <input type="password" class="form-control" placeholder="Password">
                     <span class="fa fa-lock form-control-feedback"></span>
                   </div>

                 </div>
                 <div class="modal-footer">
                   <button type="button" class="btn btn-danger pull-left btn-flat" data-dismiss="modal">Tutup</button>
                   <button type="submit" class="btn btn-success btn-flat">Log in</button>
                 </div>
               </div>
               <!-- /.modal-content -->
             </div>
             <!-- /.modal-dialog -->
           </div>
           <!-- /.modal -->