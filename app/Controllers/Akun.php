<?php

namespace App\Controllers;

use App\Models\AkunModel;
use App\Models\RincianModel;
use App\Models\KeluarModel;
use App\Models\MasukModel;
use App\Models\KatModel;



class Akun extends BaseController
{
	public function __construct()
	{
		$this->db = db_connect();
		$this->akun = new AkunModel();
		$this->masuk = new MasukModel();
		$this->rincian = new RincianModel();
		$this->keluar = new KeluarModel();
		$this->Kategori = new KatModel();
	}

	public function index()
	{
		if (session()->get('role') != 1) {
			echo view('denied');
			exit;
		}

		$akun = new AkunModel();
		// $kategori = $akun->getKategori()->getResultArray();
		// foreach ($kategori as $key) {
		# code...
		// $key['nm_kat']
		// }
		$data = [
			'title' => 'Daftar Akun',
			'akun' => $akun->getKategori()->getResultArray(),
			// 'kat_akun' => $key['nm_kat'],
			// 'debCash' => $akun->getDebCash(),
		];
		// dd($data['debCash']);
		// die;
		return view('akun/index', $data);
	}

	function formTambah()
	{
		if ($this->request->isAJAX()) {
			$data = [
				'aksi' => $this->request->getPost('aksi'),

			];
			$msg = [
				'data' => view('akun/modalformtambah', $data)
			];

			echo json_encode($msg);
		} else {
			echo view('denied');
			exit;
		}
	}

	public function simpandata()
	{
		$data = [
			'jenis_akun' => $this->request->getVar('jenis_akun'),
			'status_akun' => $this->request->getVar('status_akun'),
		];
		// var_dump($data);
		// die;
		$this->akun->insert($data);

		$msg = [
			'sukses' => 'Akun berhasil disimpan!',
		];

		echo json_encode($msg);
	}

	function hapus()
	{
		if ($this->request->isAJAX()) {
			$id_akun = $this->request->getVar('id_akun');

			$this->akun->delete($id_akun);

			$msg = [
				'sukses' => 'Akun berhasil dihapus'
			];
			echo json_encode($msg);
		} else {
			view('denied');
			exit;
		}
	}

	public function ambilDataAkun()
	{
		if ($this->request->isAJAX()) {
			$akun = new AkunModel();

			$dataakun = $akun->getAkun();

			$isidata = "<option value=''>-pilih-</option>";

			foreach ($dataakun as $row) :
				$isidata .= '<option value="' . $row['id_akun'] . '">' . $row['jenis_akun'] . '</option>';
			endforeach;

			$msg = [
				'data' => $isidata,
			];
			echo json_encode($msg);
		} else {
			view('denied');
			exit;
		}
	}

	public function formview()
	{
		if ($this->request->isAJAX()) {
			$id_akun = $this->request->getVar('id_akun');
			$row = $this->akun->find($id_akun);

			$debet = $this->masuk->getDebet($id_akun);
			foreach ($debet->getResultArray() as $d) {
				# code...
				// $d['debet'];
			}
			// var_dump($d['debet']);
			// die;

			$kredit = $this->keluar->getKredit($id_akun);
			foreach ($kredit->getResultArray() as $k) {
				# code...
				// $k['kredit'];
			}

			if (isset($d) && isset($k)) {
				# code...
				$data = [
					'title' => 'View Akun',
					'modTtl' => 'Form. View Akun',
					'id_akun' => $row['id_akun'],
					'jenis_akun' => $row['jenis_akun'],
					'kat_akun' => $row['kat_akun'],
					'kategori' => $this->Kategori->getFindAll()->getResultArray(),
					'status_akun' => $row['status_akun'],
					'debet' => $d['debet'],
					'kredit' => $k['kredit'],
					'saldo' => $d['debet'] - $k['kredit'],
				];
			} elseif (isset($d)) {
				$data = [
					'title' => 'View Akun',
					'modTtl' => 'Form. View Akun',
					'id_akun' => $row['id_akun'],
					'jenis_akun' => $row['jenis_akun'],
					'kat_akun' => $row['kat_akun'],
					'kategori' => $this->Kategori->getFindAll()->getResultArray(),
					'status_akun' => $row['status_akun'],
					'debet' => $d['debet'],
					'kredit' => 0,
					'saldo' => $d['debet'] - 0,
				];
			} elseif (isset($k)) {
				$data = [
					'title' => 'View Akun',
					'modTtl' => 'Form. View Akun',
					'id_akun' => $row['id_akun'],
					'jenis_akun' => $row['jenis_akun'],
					'kat_akun' => $row['kat_akun'],
					'kategori' => $this->Kategori->getFindAll()->getResultArray(),
					'status_akun' => $row['status_akun'],
					'debet' => 0,
					'kredit' => $k['kredit'],
					'saldo' => 0 - $k['kredit'],
				];
			}
			// var_dump($data['kat_akun']);
			$msg = [
				'sukses' => view('akun/formview', $data),
			];

			echo json_encode($msg);
		} else {
			view('denied');
			exit;
		}
	}

	public function updatedata()
	{
		if ($this->request->isAJAX()) {
			$simpandata = [
				'jenis_akun' => $this->request->getVar('jenis_akun'),
				'status_akun' => $this->request->getVar('status_akun'),
				'kat_akun' => $this->request->getVar('kat_akun'),
			];

			$id_akun = $this->request->getVar('id_akun');
			$this->akun->update($id_akun, $simpandata);

			$msg = [
				'sukses' => 'Data Berhasil di update!'
			];
			echo json_encode($msg);
		} else {
			view('denied');
			exit;
		}
	}
}
