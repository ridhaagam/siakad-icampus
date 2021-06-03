<!-- =============================================== -->
<script src="<?= base_url() ?>/template/jquery/dist/jquery.min.js"></script>
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

                    <li><a href=<?= base_url('user') ?>><i class=" fa fa-user-circle-o"></i> <span>User</span></a></li>
                    <li><a href=<?= base_url('dosen') ?>><i class=" fa fa-users"></i> <span>Dosen</span></a></li>
                    <li><a href=<?= base_url('mahasiswa') ?>><i class=" fa fa-user"></i> <span>Mahasiswa</span></a></li>
                    <li><a href=<?= base_url('prodi') ?>><i class=" fa fa-rss-square"></i> <span>Program Studi</span></a></li>
                    <li><a href=<?= base_url('fakultas') ?>><i class=" fa fa-archive"></i> <span>Fakultas</span></a></li>
                    <li class="active"><a href=<?= base_url('matkul') ?>><i class="fa  fa-file-pdf-o"></i> <span>Mata Kuliah</span></a></li>
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
                            <th width="50px" class="text-center">Kode</th>
                            <th class="text-center">Mata Kuliah</th>
                            <th width="50px" class="text-center">SKS</th>
                            <th width="50px" class="text-center">Kategori</th>
                            <th width="50px" class="text-center">Semester</th>
                            <th width="50px" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($matkul as $key => $value) { ?>
                            <tr></tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td width="50px" class="text-center"><?= $value['kode_matkul'] ?></td>
                            <td class="text-center"><?= $value['matkul'] ?></td>
                            <td class="text-center"><?= $value['sks'] ?></td>
                            <td class="text-center"><?= $value['kategori'] ?></td>
                            <td class="text-center"><?= $value['smt'] ?> (<?= $value['semester'] ?>)</td>
                            <td class="text-center"><button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?= $value['id_matkul'] ?>"><i class="fa fa-trash"></i></button></td>

                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <a href="<?= base_url('matkul') ?>" class="btn btn-danger pull-left">Kembali</a>
        <!-- modal Add -->
        <div class="modal fade" id="add">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Tambah Data <?= $title ?> </h4>
                    </div>
                    <div class="modal-body">
                        <?php
                        echo form_open('matkul/add/' . $prodi['id_prodi']);
                        ?>
                        <div class="form-group" id="only-number">
                            <label>Kode</label>
                            <input name="kode_matkul" class="form-control" maxlength="8" placeholder="Kode Mata Kuliah">
                            <small style="color:red">*maximum kode matkul 8 digit angka!</small>
                        </div>
                        <script>
                            $(function() {
                                $('#only-number').on('keydown', '#number', function(e) {
                                    -1 !== $
                                        .inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) || /65|67|86|88/
                                        .test(e.keyCode) && (!0 === e.ctrlKey || !0 === e.metaKey) ||
                                        35 <= e.keyCode && 40 >= e.keyCode || (e.shiftKey || 48 > e.keyCode || 57 < e.keyCode) &&
                                        (96 > e.keyCode || 105 < e.keyCode) && e.preventDefault()
                                });
                            })
                        </script>
                        <div class="form-group">
                            <label>Mata Kuliah</label>
                            <input name="matkul" class="form-control" placeholder="Mata Kuliah">
                        </div>
                        <div class="form-group">
                            <label>SKS</label>
                            <select name="sks" class="form-control">
                                <option value="">Pilih SKS</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Semester</label>
                            <select name="smt" class="form-control">
                                <option value="">Pilih Semester</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Kategori</label>
                            <select name="kategori" class="form-control">
                                <option value="">Pilih Kategori</option>
                                <option value="Wajib">Wajib</option>
                                <option value="Pilihan">Pilihan</option>
                            </select>
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
        <?php foreach ($matkul as $key => $value) { ?>
            <div class="modal fade" id="delete<?= $value['id_matkul'] ?>">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Hapus <?= $title ?></h4>
                        </div>
                        <div class="modal-body">

                            Apakah Anda Yakin Ingin Menghapus Data <b><?= $value['matkul'] ?> </b>?


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Tutup</button>
                            <a href="<?= base_url('matkul/delete/' . $prodi['id_prodi'] . '/' . $value['id_matkul']) ?>" class="btn btn-success">Hapus</a>
                        </div>

                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
        <?php } ?>