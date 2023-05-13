<?php

namespace App\Controllers;



class Masuk extends BaseController
{
	public function __construct()
	{
		$this->db = db_connect();
	}

	public function add()
	{
		$data = [
			'tgl_masuk' => $this->request->getPost('tanggal'),
			'ket_masuk' => $this->request->getPost('keterangan'),
			'jml_masuk' => $this->request->getPost('jumlah'),
			'cat_masuk' => $this->request->getPost('catatan'),
			'akun_id' => $this->request->getPost('akun_id'),
			'gmb_masuk' => $this->request->getPost('gambar'),
		];

		// insert data
		$success = $this->masuk->tambah($data);
		if (isset($success)) {
			return redirect()->to(base_url('saldo'));
		}
	}

	public function tambah()
	{
		$data = [
			'title' => 'Catat Masuk Uang',
			'modTtl' => 'Form. Pencatatan',
		];
		return view('masuk/formtambah', $data);
	}

	public function ambilDataAkun()
	{
		if ($this->request->isAJAX()) {
			$akun = new akunModel();

			$dataakun = $akun->getAkun();

			$isidata = "<option value=''>-pilih-</option>";

			foreach ($dataakun as $row) :
				$isidata .= '<option value="' . $row['id_akun'] . '">' . $row['jenis_akun'] . '</option>';
			endforeach;

			$msg = [
				'data' => $isidata,
			];
			echo json_encode($msg);
		}
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
					$fileUpload->move('dist/img/trx/in', $namaGambar . '.' . $fileUpload->getExtension());

					$pathGambar = 'dist/img/trx/in/' . $fileUpload->getName();
				} else {
					$pathGambar = '';
				}

				$this->masuk->insert([
					'tgl_masuk' => $tanggal,
					'ket_masuk' => $keterangan,
					'jml_masuk' => $jumlah,
					'cat_masuk' => $catatan,
					'akun_id' => $akun_id,
					'gmb_masuk' => $pathGambar,
				]);

				$msg = [
					'sukses' => 'Data Berhasil disimpan',
				];
			}

			echo json_encode($msg);
		}
	}
}
