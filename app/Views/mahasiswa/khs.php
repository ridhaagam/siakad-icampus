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
                    <i class="glyphicon glyphicon-th-list"></i> <span>Hasil Studi</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href=<?= base_url('mhs/khs') ?>><i class="fa fa-id-card"></i> <span>Kartu Hasil Studi (KHS)</span></a></li>
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
                    <li><a href=<?= base_url('mhs/setting_password/' . $mhs['id_mhs']) ?>><i class="fa fa-lock"></i> <span>Setting Password</span></a>
                    </li>
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
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Kartu Hasil Studi</h3>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                <div class="col-sm-6">

                    <table class="table table-bordered">
                        </tr>
                        <th width="180px">Nama</th>
                        <td width="20px">:</td>
                        <td><?= $mhs['nama_mahasiswa'] ?></td>
                        </tr>
                        </tr>
                        <th>NIM</th>
                        <td>:</td>
                        <td><?= $mhs['nim'] ?></td>
                        </tr>
                        </tr>
                        <th>Ketua Program Studi</th>
                        <td>:</td>
                        <td><?= $mhs['ka_prodi'] ?></td>
                        </tr>
                    </table>

                </div>

                <div class="col-sm-6">
                    <table class="table table-bordered">
                        <tr>
                            <th width="220px">Fakultas</th>
                            </th>
                            <td width="20px">:</td>
                            <td><?= $mhs['fakultas'] ?></td>
                        </tr>
                        <th>Program Studi</th>
                        <td>:</td>
                        <td><?= $mhs['prodi'] ?></td>
                        </tr>
                        </tr>
                        <th>Tahun Akademik - Semester</th>
                        <td>:</td>
                        <td><?= $ta_aktif['ta'] ?> - <?= $ta_aktif['semester'] ?></td>
                        </tr>
                    </table>
                </div>

            </div>
            <!-- /.box-body -->
        </div>


        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Data Mahasiswa</h3>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                <div class="col-sm-12">
                    <a href="<?= base_url('mhs/print_khs') ?>" target="_blank" class="btn btn-sm btn-primary"><i class="fa fa-print"></i> Print KHS</a><br><br>
                    <table class="table table-bordered table-responsive text-md">
                        <tr class="label-warning">
                            <th class="text-center">No</th>
                            <th class="text-center">Program Studi</th>
                            <th class="text-center">Kode MK</th>
                            <th class="text-center">Mata Kuliah</th>
                            <th class="text-center">SKS</th>
                            <th class="text-center">Kelas</th>
                            <th class="text-center">Nilai</th>
                        </tr>
                        <?php $no = 1;
                        $sks = 0;
                        $grand_total_bobot = 0;
                        foreach ($data_matkul as $key => $value) {
                            $sks = $sks + $value['sks'];
                            $tot_bobot = $value['sks'] * $value['bobot'];
                            $grand_total_bobot = $grand_total_bobot + $tot_bobot;
                        ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td class="text-center"><?= $value['prodi'] ?></td>
                                <td class="text-center"><?= $value['kode_matkul'] ?></td>
                                <td class="text-center"><?= $value['matkul'] ?></td>
                                <td class="text-center"><?= $value['sks'] ?></td>
                                <td class="text-center"><?= $value['kelas'] ?></td>
                                <td class="text-center"><?= $value['nilai_huruf'] ?></td>
                            </tr>
                        <?php } ?>

                    </table>
                    <h4><b>Total SKS : <?= $sks ?></b></h4>
                    <h4><b>IP : <?php if (empty($data_matkul)) {
                                    echo '0';
                                } else {
                                    echo number_format($grand_total_bobot / $sks, 2);
                                } ?></b></h4>

                </div>

            </div>
            <!-- /.box-body -->
        </div>
    </div>
</div>