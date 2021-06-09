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
                <li><a href=<?= base_url('mhs/presensi') ?>><i class="fa fa-pencil-square-o"></i> <span>Jadwal & Presensi Kuliah</span></a></li>
                </ul>
            </li>

        </li>
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

      </li>

    </ul>
  </section>
  <!-- /.sidebar -->
</aside>

<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content">

    <h2>Dashboard <small>Profil</small></h2>

    <div class="row">

      <div class="col-md-3">
        <!-- Profile Image -->
            <div class="box box-warning">
                <div class="box-body">
                    
                    <div class="text-center">
                        <img class="img-responsive" src="<?= base_url('img-mahasiswa/' . session()->get('foto')) ?>" width="100%"><br>
                        <h4><b><?= $mahasiswa['nama_mahasiswa'] ?></b></h4>
                        <h5><b><?= $mahasiswa['nim'] ?></b></h5>

                    </div>
                    
                </div>
        <div class="box box-warning">
          <div class="box-body">

            <div class="text-center">
              <img class="img-responsive" src="<?= base_url('img-mahasiswa/' . session()->get('foto')) ?>" width="100%"><br>
              <h4><b><?= $mhs['nama_mahasiswa'] ?></b></h4>
              <h5><b><?= $mhs['nim'] ?></b></h5>

            </div>

          </div>

        </div>

        <div class="col-md-9">  
        
            <div class="box box-warning">
                <div class="box-body">
                    <h4>Data Mahasiswa</h4>

                    <table class="table table-responsive">
                    <tr>
                        <th width="250px">Tahun Akademik</th>
                        <th>:</th>
                        <td><?= $ta['ta'] ?></td>
                    </tr>
                    <tr>
                        <th>Semester</th>
                        <th>:</th>
                        <td><?= $ta['semester'] ?></td>
                    </tr>
                    <tr>
                        <th>Fakultas</th>
                        <th>:</th>
                        <td><?= $mhs['fakultas'] ?></td>
                    </tr>
                    <tr>
                        <th>Program Studi</th>
                        <th>:</th>
                        <td><?= $mhs['prodi'] ?></td>
                    </tr>
                    <tr>
                        <th>Angkatan</th>
                        <th>:</th>
                        <td><?= $mhs['angkatan'] ?></td>
                    </tr>
                    <tr>
                        <th>Kelas</th>
                        <th>:</th>
                        <td><?= $mhs['kelas'] ?></td>
                    </tr>
                    <tr>
                        <th>Dosen Pembimbing Akademik</th>
                        <th>:</th>
                        <td><?= $mhs['nama_dosen'] ?></td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <th>:</th>
                        <td><?= $mahasiswa['jenkel'] ?></td>
                    </tr>
                    <tr>
                        <th>Tempat, Tanggal Lahir</th>
                        <th>:</th>
                        <td><?= $mahasiswa['ttl'] ?></td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <th>:</th>
                        <td><?= $mahasiswa['alamat'] ?></td>
                    </tr>
                    <tr>
                        <th>No Handphone</th>
                        <th>:</th>
                        <td><?= $mahasiswa['no_hp'] ?></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <th>:</th>
                        <td><?= $mahasiswa['email'] ?></td>
                    </tr>
                </table>
                <style>

                    hr.hr {
                    border-top: 2px solid #eee;
                    }

                </style>
                <hr class="hr">
                <script type="text/javascript" src="Chart.js"></script>
        <div style="width: 700px">
		<canvas id="myChart"></canvas>
	</div>
  <script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ["IP"],
				datasets: [{
					label: 'Indeks Prestasi (IP) ',
					data: [4],
					backgroundColor: [
					'rgb(38, 185, 154)',
					'rgb(38, 185, 154)',
					'rgb(38, 185, 154)',
					'rgb(38, 185, 154)',
					'rgb(38, 185, 154)',
					'rgb(38, 185, 154)'
					],
					borderColor: [
                    'rgb(38, 185, 154, 1)',
					'rgb(38, 185, 154, 1)',
					'rgb(38, 185, 154, 1)',
					'rgb(38, 185, 154, 1)',
					'rgb(38, 185, 154, 1)',
					'rgb(38, 185, 154, 1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>
 
                </div>
            
            </div>
      </div>
      <div class="col-md-9">

      <div class="box box-warning">
        <div class="box-body">
          <h4>Data Mahasiswa</h4>

          <table class="table table-responsive">
            <tr>
              <th width="200px">Tahun Akademik</th>
              <th>:</th>
              <td><?= $ta['ta'] ?>/<?= $ta['semester'] ?></td>
            </tr>
            <tr>
              <th>Program Studi</th>
              <th>:</th>
              <td><?= $mhs['prodi'] ?></td>
            </tr>
            <tr>
              <th>Fakultas</th>
              <th>:</th>
              <td><?= $mhs['fakultas'] ?></td>
            </tr>
            <tr>
              <th>Kelas</th>
              <th>:</th>
              <td><?= $mhs['kelas'] ?> -<?= $mhs['angkatan'] ?></td>
            </tr>
            <tr>
              <th>Dosen Pembimbing Akademik</th>
              <th>:</th>
              <td><?= $mhs['nama_dosen'] ?></td>
            </tr>
            <tr>
              <th>Jenis Kelamin</th>
              <th>:</th>
              <td><?= $mhs['jenkel'] ?></td>
            </tr>
            <tr>
              <th>Tempat, Tanggal Lahir</th>
              <th>:</th>
              <td><?= $mhs['ttl'] ?></td>
            </tr>
            <tr>
              <th>Alamat</th>
              <th>:</th>
              <td><?= $mhs['alamat'] ?></td>
            </tr>
            <tr>
              <th>No Handphone</th>
              <th>:</th>
              <td><?= $mhs['no_hp'] ?></td>
            </tr>
            <tr>
              <th>Email</th>
              <th>:</th>
              <td><?= $mhs['email'] ?></td>
            </tr>
          </table>
          <script type="text/javascript" src="Chart.js"></script>
          <div style="width: 700px">
            <canvas id="myChart"></canvas>
          </div>
          <script>
            var ctx = document.getElementById("myChart").getContext('2d');
            var myChart = new Chart(ctx, {
              type: 'bar',
              data: {
                labels: ["IP"],
                datasets: [{
                  label: 'IP MAHASISWA',
                  data: [4],
                  backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                  ],
                  borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                  ],
                  borderWidth: 1
                }]
              },
              options: {
                scales: {
                  yAxes: [{
                    ticks: {
                      beginAtZero: true
                    }
                  }]
                }
              }
            });
          </script>

    </div>

    

        </div>

      </div>
    </div>
</div>

</div>