<?php

namespace App\Controllers;

use App\Models\IndividuModel;
use App\Models\DesKelModel;
use App\Models\TargetModel;
use App\Models\IndLogModel;


class Dashboard extends BaseController
{
	public function __construct()
	{
		$this->db = db_connect();
		$this->Individu = new IndividuModel();
		$this->desKel = new DesKelModel();
	}

	public function index()
	{
		$desKels = $this->desKel->getDesKels();
		$targets = new TargetModel();
		$IndLogModel = new IndLogModel();

		$data = [
			'title' => 'Dashboard',
			'desKels' => $desKels->getResultArray(),
			'targets' => $targets->orderBy('IDTarget', 'asc')->findAll(),
			'individu_log' => $IndLogModel->getCapaian('created_by', 'asc')->getResultArray(),

		];
		return view("dashboard/index", $data);
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
			'title' => 'Form. Tambah Saldo',
			'modTtlIn' => 'Catat Masuk Uang',

		];
		return view('kas/formtambah', $data);
	}

	function hapus()
	{
		if ($this->request->isAJAX()) {
			$id_masuk = $this->request->getVar('id_masuk');

			$this->masuk->delete($id_masuk);

			$msg = [
				'sukses' => 'Data berhasil dihapus'
			];
			echo json_encode($msg);
		}
	}
}
