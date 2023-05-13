<?php

namespace App\Controllers;


class Keluar extends BaseController
{
	public function __construct()
	{
		$this->db = db_connect();
	}

	public function add()
	{
		$data = [
			'tgl_keluar' => $this->request->getPost('tanggal'),
			'ket_keluar' => $this->request->getPost('keterangan'),
			'jml_keluar' => $this->request->getPost('jumlah'),
			'cat_keluar' => $this->request->getPost('catatan'),
			'akun_id' => $this->request->getPost('akun_id'),
			'gmb_keluar' => $this->request->getPost('gambar'),
		];

		// insert data
		$success = $this->keluar->tambah($data);
		if (isset($success)) {
			return redirect()->to(base_url('saldo'));
		}
	}

	public function tambah()
	{
		$data = [
			'title' => 'Catat Keluar Uang',
			'modTtl' => 'Form. Pencatatan',

		];
		return view('keluar/formtambah', $data);
	}

	public function simpandata()
	{
		if ($this->request->isAJAX()) {
			$tanggal = $this->request->getVar('tanggal');
			$keterangan = $this->request->getVar('keterangan');
			$jumlah = str_replace(',', '', $this->request->getVar('jumlah'));
			$catatan = $this->request->getVar('catatan');
			$akun_id = $this->request->getVar('akun_id');

			$validation = \Config\Services::validation();

			$doValid = $this->validate([
				'tanggal' => [
					'label' => 'Tanggal',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} harus di isi!',
					]
				],
				'keterangan' => [
					'label' => 'Keterangan',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} harus di isi!',
					]
				],
				'jumlah' => [
					'label' => 'Nominal',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} harus di isi!',
					]
				],
				'akun_id' => [
					'label' => 'Jenis Akun',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} harus di pilih!',
					]
				],

				'gambar' => [
					'label' => 'Bukti Transaksi',
					'rules' => 'mime_in[gambar,image/png,image/jpg]|ext_in[gambar,png,jpg,jpeg]|is_image[gambar]',
				]
			]);

			if (!$doValid) {
				$msg = [
					'error' => [
						'errorTanggal' => $validation->getError('tanggal'),
						'errorKeterangan' => $validation->getError('keterangan'),
						'errorJumlah' => $validation->getError('jumlah'),
						'errorAkun_id' => $validation->getError('akun_id'),
						'errorGambar' => $validation->getError('gambar'),
					]
				];
			} else {
				$fileGambar = $_FILES['gambar']['name'];

				if ($fileGambar != null) {
					$namaGambar = "$keterangan" . "_" . "$akun_id";
					$fileUpload = $this->request->getFile('gambar');
					$fileUpload->move('dist/img/trx/out', $namaGambar . '.' . $fileUpload->getExtension());

					$pathGambar = 'dist/img/trx/out/' . $fileUpload->getName();
				} else {
					$pathGambar = '';
				}

				$this->keluar->insert([
					'tgl_keluar' => $tanggal,
					'ket_keluar' => $keterangan,
					'jml_keluar' => $jumlah,
					'cat_keluar' => $catatan,
					'akun_id' => $akun_id,
					'gmb_keluar' => $pathGambar,
				]);

				$msg = [
					'sukses' => 'Data Berhasil disimpan',
				];
			}

			echo json_encode($msg);
		}
	}
}
