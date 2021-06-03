<?php

namespace App\Controllers;
use App\Models\ModelTahunAkademik;
use App\Models\ModelProdi;
use App\Models\ModelJadwalKuliah;
use App\Models\ModelDosen;
use App\Models\ModelRuangan;

class Jadwal_Kuliah extends BaseController
{

	public function __construct()
    {
        helper('form');
        $this->ModelTahunAkademik = new ModelTahunAkademik();
		$this->ModelProdi = new ModelProdi();
		$this->ModelJadwalKuliah = new ModelJadwalKuliah();
		$this->ModelDosen = new ModelDosen();
		$this->ModelRuangan = new ModelRuangan();
	
    }

	public function index()
	{
		$data= [
			'title' => 'Jadwal Kuliah', 
			'ta_aktif' => $this->ModelTahunAkademik->ta_aktif(),
			'prodi' => $this->ModelProdi->allData(),
			'isi' 	=> 'admin/jadwal_kuliah/index'
		];

		return view('layout_dashboard/wrapper', $data);
	}

	public function detail($id_prodi)
	{
		$data= [
			'title' => 'Jadwal Kuliah', 
			'ta_aktif' => $this->ModelTahunAkademik->ta_aktif(),
			'prodi' => $this->ModelProdi->detail_Data($id_prodi),
			'jadwal'=> $this->ModelJadwalKuliah->allData($id_prodi),
			'matkul'=> $this->ModelJadwalKuliah->matkul($id_prodi),
			'dosen'=> $this->ModelDosen->allData(),
			'kelas'=> $this->ModelJadwalKuliah->kelas($id_prodi),
			'ruangan'=> $this->ModelRuangan->allData(),
			'isi' 	=> 'admin/jadwal_kuliah/detail'
		];

		return view('layout_dashboard/wrapper', $data);
	}

	public function add($id_prodi)
		{
			if ($this->validate([
				'id_matkul' => [
					'label' => 'Mata Kuliah',
					'rules' => 'required',
					'errors' => [
						'required' => '{field}  Wajib di Pilih!'
					]
				],
				'id_dosen' => [
					'label' => 'Dosen',
					'rules' => 'required',
					'errors' => [
						'required' => '{field}  Wajib di Pilih!'
					]
				],
				'id_kelas' => [
					'label' => 'Kelas',
					'rules' => 'required',
					'errors' => [
						'required' => '{field}  Wajib di Pilih!'
					]
				],
				'hari' => [
					'label' => 'Hari',
					'rules' => 'required',
					'errors' => [
						'required' => '{field}  Wajib di Pilih!!'
					]
				],
				'waktu' => [
					'label' => 'waktu',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} Wajib diisi!'
					]
				],
				'id_ruangan' => [
					'label' => 'Ruangan',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} Wajib di Pilih!'
					]
				],
				'kuota' => [
					'label' => 'Kuota',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} Wajib Diisi!'
					]
				],
			])) {
				//jika valid
				$ta = $this->ModelTahunAkademik->ta_aktif();
				$data = [
					'id_prodi' => $id_prodi,
					'id_tahun_akademik'=> $ta['id_tahun_akademik'],
					'id_kelas' => $this->request->getPost('id_kelas'),
					'id_matkul' => $this->request->getPost('id_matkul'),
					'id_dosen' => $this->request->getPost('id_dosen'),
					'hari' => $this->request->getPost('hari'),
					'waktu' => $this->request->getPost('waktu'),
					'id_ruangan' => $this->request->getPost('id_ruangan'),
					'kuota' => $this->request->getPost('kuota'),
				];
				$this->ModelJadwalKuliah->add($data);
				session()->setFlashdata('pesan', 'Data Berhasil di Tambahkan!');
				return redirect()->to(base_url('jadwal_kuliah/detail/' . $id_prodi));
			} else {
				//jika tidak valid
				session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
				return redirect()->to(base_url('jadwal_kuliah/detail/' . $id_prodi));
			}
		}

		public function delete($id_jadwal_kuliah , $id_prodi)
		{
			$data = [
				'id_jadwal_kuliah' => $id_jadwal_kuliah,
			];
			$this->ModelJadwalKuliah->delete_data($data);
			session()->setFlashdata('pesan', 'Data Berhasil di Hapus!');
			return redirect()->to(base_url('jadwal_kuliah/detail/' . $id_prodi));
		}



} 
