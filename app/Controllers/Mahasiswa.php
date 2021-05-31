<?php

namespace App\Controllers;

use App\Models\ModelMahasiswa;
use App\Models\ModelProdi;

class Mahasiswa extends BaseController
{
	public function __construct()
	{
		helper('form');
		$this->ModelMahasiswa = new ModelMahasiswa();
		$this->ModelProdi = new ModelProdi();
	}
	public function index()
	{
		$data = [
			'title' => 'Mahasiswa',
			'mhs' => $this->ModelMahasiswa->allData(),
			'isi' 	=> 'admin/mahasiswa/index'
		];

		return view('layout_dashboard/wrapper', $data);
	}
	public function add()
	{
		$data = [
			'title'    => 'Mahasiswa',
			'prodi' => $this->ModelProdi->allData(),
			'isi'      => 'admin/mahasiswa/add'
		];
		return view('layout_dashboard/wrapper', $data);
	}
	public function insert()
	{
		if ($this->validate([
			'nim' => [
				'label' => 'NIM',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib diisi!'
				]
			],
			'nama_mahasiswa' => [
				'label' => 'Nama Mahasiswa',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib diisi!',
				]
			],
			'id_prodi' => [
				'label' => 'Program Studi',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib diisi!',
				]
			],
			'jenkel' => [
				'label' => 'Jenis Kelamin',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib diisi!'
				]
			],
			'password' => [
				'label' => 'Passoword',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib diisi!'
				]
			],
			'no_hp' => [
				'label' => 'No. Hp',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib diisi!'
				]
			],
			'email' => [
				'label' => 'Email',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib diisi!'
				]
			],
			'alamat' => [
				'label' => 'Alamat',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib diisi!'
				]
			],
			'foto' => [
				'label' => 'Foto',
				'rules' => 'uploaded[foto]|max_size[foto,1024]|mime_in[foto,image/png,image/jpeg,image/jpg,image/gif,image/ico]',
				'errors' => [
					'uploaded' => '{field} Wajib diisi!',
					'max_size' => '{field} Max 1024 KB',
					'mime_in' => 'Format {field} Wajib PNG, JPG, JPEG, GIF, ICO'
				]
			],
		])) {
			//mengambil file foto dari form input
			$foto = $this->request->getFile('foto');
			//merename nama file foto
			$nama_file = $foto->getRandomName();
			//jika valid
			$data = array(
				'nim' => $this->request->getPost('nim'),
				'nama_mahasiswa' => $this->request->getPost('nama_mahasiswa'),
				'id_prodi' => $this->request->getPost('id_prodi'),
				'jenkel' => $this->request->getPost('jenkel'),
				'password' => $this->request->getPost('password'),
				'no_hp' => $this->request->getPost('no_hp'),
				'email' => $this->request->getPost('email'),
				'alamat' => $this->request->getPost('alamat'),
				'foto' => $nama_file,
			);
			//memindahkan file foto dari form input ke folder foto di directory
			$foto->move('img-mahasiswa', $nama_file);
			$this->ModelMahasiswa->add($data);
			session()->setFlashdata('pesan', 'Data Berhasil di Tambahkan!');
			return redirect()->to(base_url('mahasiswa'));
		} else {
			//jika tidak valid
			session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('mahasiswa/add'));
		}
	}
}
