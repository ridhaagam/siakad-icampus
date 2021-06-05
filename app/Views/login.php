<div class="container-fluid" style="background-color:#d2d6de">
<div class="login-box">
    <div class="login-logo">
        <img src="img/logoumm.png" width="40%"></img>
        <style>

            hr.hr {
            border-top: 1px solid #eee;
            }

        </style>
        <hr class="hr">
        <h3><b>Informasi Akademik</b></h3>
        <h4><b>Universitas Muhammadiyah Malang</b></h4>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body"> 
        <p class="login-box-msg"><b>Silakan Log in</b></p>
        <?php
        $errors = session()->getFlashdata('errors');
        if(!empty($errors)) { ?>

            <div class="alert alert-danger text-center" role="alert">
                    <?php foreach ($errors as $error) : ?>
                        <div class="text-center"><?= esc($error) ?></div>
                    <?php endforeach ?>
            </div>

        <?php } ?>

        <?php
        if (session()->getFlashdata('pesan')) {
            echo '<div class="alert alert-danger text-center" role="alert">';
            echo session()->getFlashdata('pesan');
            echo '</div>';
        }
        if (session()->getFlashdata('alert')) {
            echo '<div class="alert alert-warning text-center" role="alert">';
            echo session()->getFlashdata('alert');
            echo '</div>';
        }
        if (session()->getFlashdata('sukses')) {
            echo '<div class="alert alert-success text-center" role="alert">';
            echo session()->getFlashdata('sukses');
            echo '</div>';
        }
        ?>
        
        <?php
        echo form_open('auth/cek_login');
        ?>
        <div class="form-group has-feedback">
            <input name="username" class="form-control" placeholder="Username">
            <span class="fa fa-user form-control-feedback"></span>
            
        </div>

        <div class="form-group has-feedback">
            <input name="password" type="password" class="form-control" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            
        </div>

        <div class="row">
            <!-- /.col -->
            <div class="col-xs-12">
                <button type="submit" class="btn btn-primary btn-block">Log In</button>
            </div>
            <!-- /.col -->
        </div>
        <?php echo form_close() ?>



    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
</div>