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
                    <i class="glyphicon glyphicon-th-list"></i> <span>Hasil Studi</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href=<?= base_url('mhs/khs') ?>><i class="fa fa-id-card"></i> <span>Kartu Hasil Studi (KHS)</span></a></li>
                    <li><a href=<?= base_url('mhs/transkrip') ?>><i class="fa fa-file-pdf-o"></i> <span>Transkrip</span></a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-gear"></i> <span>KRS</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href=<?= base_url('krs') ?>><i class="fa fa-folder-o"></i> <span>Pemrograman KRS</span></a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-book"></i> <span>Akademik</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href=<?= base_url('mhs/presensi') ?>><i class="fa fa-pencil-square-o"></i> <span>Presensi Kuliah</span></a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-gear"></i> <span>Setting</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href=<?= base_url('mhs/setting_password/' . $mahasiswa['id_mhs']) ?>><i class="fa fa-lock"></i> <span>Setting Password</span></a></li>
                </ul>
            </li>

            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

<!-- =============================================== -->
<div class="content-wrapper">
    <div class="content">
        <h1>Halaman <?= $title ?></h1>
        <br>
        <div class="row">
            <div class="col-sm-12">
            </div>
            <div class="col-sm-12">
                <div class="box box-warning box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Biodata</h3>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <?php

                        if (session()->getFlashdata('pesan')) {
                            echo '<div class="alert alert-success" role="alert">';
                            echo session()->getFlashdata('pesan');
                            echo '</div>';
                        }
                        ?>
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
                        echo form_open_multipart('mhs/update/' . $mahasiswa['id_mhs']);
                        ?>

                        <div class="alert alert-info"><b>Isikan data berikut dengan data yang sebenarnya</b></div>
                        <div class="col-sm-6">
                            <div class="form-group" id="only-number">
                                <label>NIM</label>
                                <input name="nim" value="<?= $mahasiswa['nim'] ?>" readonly class="form-control" placeholder="NIM">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group" id="only-number">
                                <label>Nama Mahasiswwa</label>
                                <input name="nama_mahasiswa" value="<?= $mahasiswa['nama_mahasiswa'] ?>" readonly class="form-control" placeholder="Nama Mahasiswa">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Alamat di Malang</label>
                                <input name="alamat" value="<?= $mahasiswa['alamat'] ?>" class="form-control">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <input name="jenkel" value="<?= $mahasiswa['jenkel'] ?>" readonly class="form-control" placeholder="Nama Mahasiswa">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Tempat, Tanggal Lahir</label>
                                <input name="ttl" value="<?= $mahasiswa['ttl'] ?>" readonly class="form-control" placeholder="Ex: Malang, 01 Januari 2002">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input name="email" value="<?= $mahasiswa['email'] ?>" class="form-control" placeholder="Email">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group" id="only-number">
                                <label>No Handphone</label>
                                <input name="no_hp" value="<?= $mahasiswa['no_hp'] ?>" class="form-control" id="number">
                                <small style="color:red">No HP terdiri dari 10-13 digit angka</small>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Status Mahasiswa</label>
                                <input name="status_mahasiswa" value="<?= $mahasiswa['status_mahasiswa'] ?>" readonly class="form-control">
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <a href="<?= base_url('mhs') ?>" class="btn btn-danger pull-left"><i class="fa fa-caret-left"></i> Kembali</a>
                            <button type="submit" class="btn btn-success pull-right">Perbarui</button>
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