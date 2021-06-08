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
                    <li><a href=<?= base_url('absensi') ?>><i class="fa fa-pencil-square-o"></i> <span>Presensi Kuliah</span></a></li>
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
        <h1><?= $title ?> - Tahun Akademik : <?= $ta_aktif['ta'] ?> - <?= $ta_aktif['semester'] ?> </h1>
        <div class="box box-warning box-solid">

            <div class="col-sm-12">
                <div class="row">
                    <table class="table-striped table-responsive">
                        <tr>
                            <th rowspan="7"><img src="<?= base_url('img-mahasiswa/' . session()->get('foto')) ?>" height="150px"></th>
                            <th width="150px">Tahun Akademik</th>
                            <th width="20px">:</th>
                            <th><?= $ta_aktif['ta'] ?> - <?= $ta_aktif['semester'] ?></th>
                            <th rowspan="7"></th>
                        </tr>
                        <tr>
                            <td>NIM</td>
                            <td>:</td>
                            <td><?= $mahasiswa['nim'] ?></td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td><?= $mahasiswa['nama_mahasiswa'] ?></td>
                        </tr>
                        <tr>
                            <td>Fakultas</td>
                            <td>:</td>
                            <td><?= $mahasiswa['fakultas'] ?></td>
                        </tr>
                        <tr>
                            <td>Program Studi</td>
                            <td>:</td>
                            <td><?= $mahasiswa['prodi'] ?></td>
                        </tr>
                        <tr>
                            <td>Kelas</td>
                            <td>:</td>
                            <td><?= $mahasiswa['kelas'] ?><?= $mahasiswa['angkatan'] ?></td>
                        </tr>
                        <tr>
                            <td>Dosen PA</td>
                            <td>:</td>
                            <td><?= $mahasiswa['nama_dosen'] ?></td>
                        </tr>
                    </table>
                </div>
                <div class="box-body">
                    <div class="col-sm-12">
                        <button class="btn btn-xs btn-flat btn-primary" data-toggle="modal" data-target="#add"><i class="fa fa-plus"></i> Tambah Mata Kuliah</button>
                        <button class="btn btn-xs btn-flat btn-success"><i class="fa fa-print"></i> Cetak KRS</button>
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
                                <th></th>
                            </tr>

                            <?php $no = 1;
                            foreach ($data_matkul as $key => $value) { ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $value['kode_matkul'] ?></td>
                                    <td><?= $value['matkul'] ?></td>
                                    <td><?= $value['sks'] ?></td>
                                    <td><?= $value['smt'] ?></td>
                                    <td><?= $value['kelas'] ?>-<?= $value['angkatan'] ?></td>
                                    <td><?= $value['ruangan'] ?></td>
                                    <td><?= $value['nama_dosen'] ?></td>
                                    <td><?= $value['hari'] ?>, <?= $value['waktu'] ?></td>
                                    <td class="text-center">
                                        <button class="btn btn-danger btn-flat btn-xs" data-toggle="modal" data-target="#delete<?= $value['id_krs'] ?>"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                            <?php } ?>

                        </table>
                    </div>
                </div>
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
                    <h4 class="modal-title">Daftar Mata Kuliah Ditawarkan</h4>
                </div>
                <div class="modal-body">

                    <table class="table table-bordered table-striped text-sm" id="example1">
                        <thead>
                            <tr class="label-warning">
                                <th class="text-center">#</th>
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
                                    <td class="text-center"><?= $value['kelas'] ?>-<?= $value['angkatan'] ?></td>
                                    <td><?= $value['ruangan'] ?></td>
                                    <td><?= $value['nama_dosen'] ?></td>
                                    <td><?= $value['hari'] ?>, <?= $value['waktu'] ?></td>
                                    <td class="text-center"><span class="label label-success"><?= $total ?>/<?= $value['kuota'] ?></span></td>
                                    <td class="text-center">
                                        <?php if ($total == $value['kuota']) { ?>
                                            <span class="label label-danger">Penuh</span>
                                        <?php } else { ?>
                                            <a href="<?= base_url('krs/tambah_matkul/' . $value['id_jadwal_kuliah']) ?>" class=" btn btn-success btn-xs btx-flat"><i class="fa fa-plus"></i></a>
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

                        Apakah Anda Yakin Ingin Menghapus Data <b><?= $value['kode_matkul'] ?>|<?= $value['matkul'] ?> </b>?


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