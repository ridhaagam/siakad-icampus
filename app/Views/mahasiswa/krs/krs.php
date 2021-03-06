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

            <li class="active treeview">
                <a href="#">
                    <i class="fa fa-gear"></i> <span>KRS</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href=<?= base_url('krs') ?>><i class="fa fa-folder-o"></i> <span>Pemrograman KRS</span></a></li>
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
                    <li><a href=<?= base_url('mhs/presensi') ?>><i class="fa fa-pencil-square-o"></i> <span>Jadwal & Presensi Kuliah</span></a></li>
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
                    <li><a href=<?= base_url('mhs/setting_password/' . $mahasiswa['id_mhs']) ?>><i class="fa fa-lock"></i> <span>Setting Password</span></a>
                    </li>
                </ul>
            </li>

            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
<!-- =============================================== -->

<!-- =============================================== -->
<div class="content-wrapper">
    <div class="content">
        <h1>Halaman <?= $title ?></h1>
        <div class="box box-warning box-solid">

            <div class="box-header with-border">
                <h3 class="box-title">Kartu Hasil Studi</h3>
            </div>

            <div class="box-body">

                <div class="col-sm-6">

                    <table class="table table-bordered">
                        </tr>
                        <th width="180px">Nama</th>
                        <td width="20px">:</td>
                        <td><?= $mahasiswa['nama_mahasiswa'] ?></td>
                        </tr>
                        </tr>
                        <th>NIM</th>
                        <td>:</td>
                        <td><?= $mahasiswa['nim'] ?></td>
                        </tr>
                        </tr>
                        <th>Program Studi</th>
                        <td>:</td>
                        <td><?= $mahasiswa['prodi'] ?></td>
                        </tr>
                    </table>

                </div>

                <div class="col-sm-6">
                    <table class="table table-bordered">
                        <tr>
                            <th width="220px">Fakultas</th>
                            </th>
                            <td width="20px">:</td>
                            <td><?= $mahasiswa['fakultas'] ?></td>
                        </tr>
                        <th>Program Studi</th>
                        <td>:</td>
                        <td><?= $mahasiswa['prodi'] ?></td>
                        </tr>
                        </tr>
                        <th>IPK</th>
                        <td>:</td>
                        <td>4</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Sajian Mata Kuliah</h3>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                <div class="col-sm-12">

                    <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#add"><i class="fa fa-plus"></i> Tambah KRS</button>
                    <a href="<?= base_url('krs/print') ?>" target="_blank" class="btn btn-sm btn-primary"><i class="fa fa-print"></i> Print KRS</a><br><br>
                </div>
                <div class="col-sm-12">
                    <?php
                    if (session()->getFlashdata('pesan')) {
                        echo '<div class="alert alert-success" role="alert">';
                        echo session()->getFlashdata('pesan');
                        echo '</div>';
                    }
                    ?>
                    <table class="table table-striped table-bordered table-responsive">
                        <tr class="label-warning">
                            <th class="text-center">#</th>
                            <th class="text-center">Kode</th>
                            <th class="text-center">Mata Kuliah</th>
                            <th class="text-center">SKS</th>
                            <th class="text-center">Semester</th>
                            <th class="text-center">Kelas</th>
                            <th class="text-center">Ruang</th>
                            <th class="text-center">Dosen</th>
                            <th class="text-center">Waktu</th>
                            <th class="text-center">Action</th>
                        </tr>

                        <?php $no = 1;
                        $sks = 0;
                        foreach ($data_matkul as $key => $value) {
                            $sks = $sks + $value['sks'];
                        ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td><?= $value['kode_matkul'] ?></td>
                                <td><?= $value['matkul'] ?></td>
                                <td class="text-center"><?= $value['sks'] ?></td>
                                <td class="text-center"><?= $value['smt'] ?></td>
                                <td class="text-center"><?= $value['kelas'] ?> - <?= $value['angkatan'] ?></td>
                                <td class="text-center"><?= $value['ruangan'] ?></td>
                                <td><?= $value['nama_dosen'] ?></td>
                                <td><?= $value['hari'] ?>, <?= $value['waktu'] ?></td>
                                <td class="text-center">
                                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?= $value['id_krs'] ?>"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                        <?php } ?>

                    </table>
                    <h4><b>Jumlah SKS : <?= $sks ?></b></h4>
                </div>

            </div>
            <!-- /.box-body -->
        </div>
    </div>
</div>


<!-- modal Add  Matkul-->
<div class="modal fade" id="add">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Daftar Mata Kuliah Disajikan</h4>
            </div>
            <div class="modal-body">

                <table class="table table-bordered table-striped text-sm" id="example1">
                    <thead>
                        <tr class="label-warning">
                            <th class="text-center">No</th>
                            <th class="text-center">Kode</th>
                            <th class="text-center">Mata Kuliah</th>
                            <th class="text-center">SKS</th>
                            <th class="text-center">SMT</th>
                            <th class="text-center">Kelas</th>
                            <th class="text-center">Ruang</th>
                            <th class="text-center">Dosen</th>
                            <th class="text-center">Waktu</th>
                            <th class="text-center">Kuota</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        $db = \Config\Database::connect();
                        foreach ($matkul_ditawarkan as $key => $value) {
                            $total = $db->table('krs')
                                ->where('id_jadwal_kuliah', $value['id_jadwal_kuliah'])
                                ->countAllResults();
                        ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td class="text-center"><?= $value['kode_matkul'] ?></td>
                                <td><?= $value['matkul'] ?></td>
                                <td class="text-center"><?= $value['sks'] ?></td>
                                <td class="text-center"><?= $value['smt'] ?></td>
                                <td class="text-center"><?= $value['kelas'] ?> - <?= $value['angkatan'] ?></td>
                                <td><?= $value['ruangan'] ?></td>
                                <td><?= $value['nama_dosen'] ?></td>
                                <td><?= $value['hari'] ?>, <?= $value['waktu'] ?></td>
                                <td class="text-center"><span class="label label-success"><?= $total ?>/<?= $value['kuota'] ?></span></td>
                                <td class="text-center">
                                    <?php if ($total == $value['kuota']) { ?>
                                        <span class="label label-danger">Penuh</span>
                                    <?php } else { ?>
                                        <a href="<?= base_url('krs/tambah_matkul/' . $value['id_jadwal_kuliah']) ?>" class=" btn btn-success btn-xs"><i class="fa fa-plus"></i></a>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<!-- modal delete -->
<?php foreach ($data_matkul as $key => $value) { ?>
    <div class="modal fade" id="delete<?= $value['id_krs'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Hapus Data KRS</h4>
                </div>
                <div class="modal-body">

                    Apakah Anda Yakin Ingin Menghapus Data <b><?= $value['kode_matkul'] ?> - <?= $value['matkul'] ?> </b> ?

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Tutup</button>
                    <a href="<?= base_url('krs/delete/' . $value['id_krs']) ?>" class="btn btn-success">Hapus</a>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>