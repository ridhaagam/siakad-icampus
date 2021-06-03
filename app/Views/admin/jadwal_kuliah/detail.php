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

            <li class="active treeview">
                <a href="#">
                    <i class="glyphicon glyphicon-th-list"></i> <span>Akademik</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href=<?= base_url('jadwal_kuliah') ?>><i class="glyphicon glyphicon-calendar"></i> <span>Jadwal Kuliah</span></a></li>
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
                <h3 class="box-title">Data <?= $title ?> - <medium style="color:white"><?= $prodi['prodi'] ?></medium>
                </h3>

                <div class="box-tools pull-right">
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered">
                    <tr>
                        <th width="150px">Program Studi</th>
                        <td width="20px">:</td>
                        <td><?= $prodi['prodi'] ?></td>
                    </tr>
                    <tr>
                        <th>Jenjang</th>
                        <td>:</td>
                        <td><?= $prodi['jenjang'] ?></td>
                    </tr>
                    <th>Fakultas</th>
                    <td>:</td>
                    <td><?= $prodi['fakultas'] ?></td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title"><?= $title ?></h3>

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
                            <th class="text-center">Semester</th>
                            <th class="text-center">Kode MK</th>
                            <th class="text-center">Mata Kuliah</th>
                            <th class="text-center">SKS</th>
                            <th class="text-center">Kelas</th>
                            <th class="text-center">Dosen Pengampu</th>
                            <th class="text-center">Hari</th>
                            <th class="text-center">Waktu</th>
                            <th class="text-center">Ruangan</th>
                            <th class="text-center">Kuota</th>
                            <th width="50px" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($jadwal as $key => $value) { ?>
                            <tr></tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td class="text-center"><?= $value['smt'] ?></td>
                            <td class="text-center"><?= $value['kode_matkul'] ?></td>
                            <td class="text-center"><?= $value['matkul'] ?></td>
                            <td class="text-center"><?= $value['sks'] ?></td>
                            <td class="text-center"><?= $value['kelas'] ?> - <?= $value['angkatan'] ?></td>
                            <td class="text-center"><?= $value['nama_dosen'] ?></td>
                            <td class="text-center"><?= $value['hari'] ?></td>
                            <td class="text-center"><?= $value['waktu'] ?></td>
                            <td class="text-center"><?= $value['ruangan'] ?></td>
                            <td class="text-center"><?= $value['kuota'] ?></td>
                            <td class="text-center"> <button class="btn btn-danger btn-sm " data-toggle="modal" data-target="#delete<?= $value['id_jadwal_kuliah'] ?>"><i class="fa fa-trash"></i></button></td>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>

        <!-- /.box-body -->
        <!-- modal Add -->
        <div class="modal fade" id="add">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Tambah <?= $title ?></h4>
                    </div>
                    <div class="modal-body">
                        <?php
                        echo form_open('jadwal_kuliah/add/' . $prodi['id_prodi']);
                        ?>

                        <div class="form-group">
                            <label>Mata Kuliah</label>
                            <select name="id_matkul" class="form-control">
                                <option value="">Pilih Mata Kuliah</option>
                                <?php foreach ($matkul as $key => $value) { ?>
                                    <option value="<?= $value['id_matkul'] ?>">Semester <?= $value['smt'] ?> | <?= $value['kode_matkul'] ?> | <?= $value['matkul'] ?> | <?= $value['sks'] ?> SKS</option>

                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Dosen Pengampu</label>
                            <select name="id_dosen" class="form-control">
                                <option value="">--Pilih Dosen--</option>
                                <?php foreach ($dosen as $key => $value) { ?>
                                    <option value="<?= $value['id_dosen'] ?>"><?= $value['nama_dosen'] ?></option>
                                <?php } ?>

                            </select>
                        </div>

                        <div class="form-group">
                            <label>Kelas</label>
                            <select name="id_kelas" class="form-control">
                                <option value="">Pilih kelas</option>
                                <?php foreach ($kelas as $key => $value) { ?>
                                    <option value="<?= $value['id_kelas'] ?>"><?= $value['kelas'] ?>-<?= $value['angkatan'] ?></option>

                                <?php } ?>
                            </select>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Hari</label>
                                    <select name="hari" class="form-control">
                                        <option value="">Pilih Hari</option>
                                        <option value="Senin">Senin</option>
                                        <option value="Selasa">Selasa</option>
                                        <option value="Rabu">Rabu</option>
                                        <option value="Kamis">Kamis</option>
                                        <option value="Jumat">Jumat</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Waktu</label>
                                    <input name="waktu" class="form-control" placeholder="Ex = 07:00-08:40">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Ruangan</label>
                                    <select name="id_ruangan" class="form-control">
                                        <option value="">--Pilih Ruangan--</option>
                                        <?php foreach ($ruangan as $key => $value) { ?>
                                            <option value="<?= $value['id_ruangan'] ?>"><?= $value['ruangan'] ?></option>
                                        <?php } ?>

                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Kuota</label>
                                    <input name="kuota" class="form-control" placeholder="Kuota">
                                </div>
                            </div>
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


        <!-- modal delete -->
        <?php foreach ($jadwal as $key => $value) { ?>
            <div class="modal fade" id="delete<?= $value['id_jadwal_kuliah'] ?>">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Hapus <?= $title ?></h4>
                        </div>
                        <div class="modal-body">

                            Apakah Anda Yakin Ingin Menghapus Data <b><?= $value['kode_matkul'] ?> | <?= $value['nama_dosen'] ?></b> ?


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Tutup</button>
                            <a href="<?= base_url('jadwal_kuliah/delete/' . $value['id_ruangan'] . '/' . $prodi['id_prodi']) ?>" class="btn btn-success ">Hapus</a>
                        </div>

                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
        <?php } ?>