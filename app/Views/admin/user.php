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
            <li class="active treeview">
                <a href="#">
                    <i class="fa fa-id-card-o"></i> <span>Master</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href=<?= base_url('user') ?>><i class=" fa fa-user-circle-o"></i> <span>User</span></a></li>
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
                    <li><a href=<?= base_url('jadwal_kuliah') ?>><i class="glyphicon glyphicon-calendar"></i> <span>Jadwal Kuliah</span></a></li>
                    <li><a href=<?= base_url('kelas') ?>><i class="glyphicon glyphicon-book"></i> <span>Kelas</span></a></li>
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
                    <li><a href=<?= base_url('tahun_akademik/setting') ?>><i class="fa  fa-folder-o"></i> <span>Tahun Akademik</span></a></li>
                </ul>
            </li>
    </section>
    <!-- /.sidebar -->
</aside>
<!-- =============================================== -->
<div class="content-wrapper">
    <div class="content">
        <h1>Halaman <?= $title ?></h1>
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Data <?= $title ?></h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-toggle="modal" data-target="#add"><i class="fa fa-plus"></i> <b>Tambah</b></button>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
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
                if (session()->getFlashdata('pesan')) {
                    echo '<div class="alert alert-success" role="alert">';
                    echo session()->getFlashdata('pesan');
                    echo '</div>';
                }
                ?>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="50px" class="text-center">No</th>
                            <th class="text-center">Nama User</th>
                            <th class="text-center">Username</th>
                            <th class="text-center">Password</th>
                            <th class="text-center">Foto</th>
                            <th width="150px" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($user as $key => $value) { ?>
                            <tr>
                                <td class="text-center"><?= $no++; ?></td>
                                <td class="text-center"><?= $value['nama_user'] ?></td>
                                <td class="text-center"><?= $value['username'] ?></td>
                                <td class="text-center"><?= $value['password'] ?></td>
                                <td class="text-center"><img src="<?= base_url('img-user/' . $value['foto']) ?>" class="img-circle" width="70px" height="70px"></td>
                                <td class="text-center">
                                    <buttn class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit<?= $value['id_user'] ?>"><i class="fa fa-pencil"></i></buttn>
                                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?= $value['id_user'] ?>"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                        <?php  } ?>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>

<!-- modal Add -->
<div class="modal fade" id="add">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Data User</h4>
            </div>
            <div class="modal-body">
                <?php
                echo form_open_multipart('user/add');
                ?>
                <div class="form-group">
                    <label>Nama User</label>
                    <input name="nama_user" class="form-control" placeholder="Nama User">
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input name="username" class="form-control" placeholder="Username">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control password" id="number" placeholder="Masukkan Password">
                    <small style="color: red;">Password harus angka, tidak mengandung simbol, dan minimal 6 digit</small>
                </div>
                <div class="form-group">
                    <label>Confirm Password</label>
                    <div class="form-group">
                        <input type="password" name="confirm_password" class="form-control confirm_password" id="number" placeholder="Masukkan Ulang Password">
                    </div>
                </div>
                <div class="form-group">
                    <label>Foto</label>
                    <input type="file" name="foto" id="preview_gambar" class="form-control">
                </div>
                <div class="form-group">
                    <img src="<?= base_url('img-user/default-profile.jpg') ?>" id="gambar_load" class="img-circle" width="70px" height="70px">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
            <?php echo form_close() ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- modal edit -->
<?php foreach ($user as $key => $value) { ?>
    <div class="modal fade" id="edit<?= $value['id_user'] ?>">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Perbarui User</h4>
                </div>
                <div class="modal-body">
                    <?php
                    echo form_open_multipart('user/edit/' . $value['id_user']);
                    ?>

                    <div class="form-group">
                        <label>Nama User</label>
                        <input name="nama_user" value="<?= $value['nama_user'] ?>" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Username</label>
                        <input name="username" value="<?= $value['username'] ?>" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control password" id="number" placeholder="Masukkan Password">
                        <small style="color: red;">Password harus angka, tidak mengandung simbol, dan minimal 6 digit</small>
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <div class="form-group">
                            <input type="password" name="confirm_password" class="form-control confirm_password" id="number" placeholder="Masukkan Ulang Password">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Ganti Foto</label>
                        <input type="file" name="foto" id="preview_gambar2" class="form-control">
                    </div>

                    <div class="form-group">
                        <img src="<?= base_url('img-user/' . $value['foto']) ?>" id="gambar_load2" class="img-circle" width="70px" height="70px">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-success">Perbarui</button>
                </div>
                <?php echo form_close() ?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>


<!-- modal delete -->
<?php foreach ($user as $key => $value) { ?>
    <div class="modal fade" id="delete<?= $value['id_user'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Hapus Data User</h4>
                </div>
                <div class="modal-body">

                    Apakah Anda Yakin Ingin Menghapus Data <b><?= $value['nama_user'] ?> </b>?

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Tutup</button>
                    <a href="<?= base_url('user/delete/' . $value['id_user']) ?>" class="btn btn-success">Hapus</a>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>