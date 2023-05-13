<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\RoleModel;
use App\Models\DesKelModel;
use App\Models\TargetModel;
use App\Models\IndividuModel;
use App\Models\IndLogModel;


class User extends BaseController
{
	public function __construct()
	{
		$this->db = db_connect();
		$this->User = new UserModel();
		$this->Role = new RoleModel();
		$this->desKel = new DesKelModel();

		if (session()->get('role') != 1) {
			echo view('denied');
			exit;
		}
	}

	public function index()
	{
		$desKels = $this->desKel->getDesKels();
		$targets = new TargetModel();
		$IndLogModel = new IndLogModel();

		$data = [
			'title' => 'Daftar User',
			'user' => $this->User->getFindAll()->getResultArray(),
			'desKels' => $desKels->getResultArray(),
			'targets' => $targets->findAll(),
			'individu_log' => $IndLogModel->getCapaian('created_by', 'asc')->getResultArray(),

		];
		// dd($data['individu']);
		// die;
		return view('user/index', $data);
	}

	function formTambah()
	{
		$desKels = $this->desKel->getDesKels();
		$roles = $this->Role->getRole();

		if ($this->request->isAJAX()) {
			$data = [
				'aksi' => $this->request->getPost('aksi'),
				'desKels' => $desKels->getResultArray(),
				'roles' => $roles->getResultArray(),

			];
			$msg = [
				'data' => view('user/modalformtambah', $data)
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
			'firstname' => $this->request->getVar('firstname'),
			'lastname' => $this->request->getVar('lastname'),
			'nik' => $this->request->getVar('nik'),
			'desa_id' => $this->request->getVar('desa_id'),
			'email' => $this->request->getVar('email'),
			'password' => $this->request->getVar('password'),
			'role' => $this->request->getVar('role'),
			'status' => $this->request->getVar('status'),
		];
		// var_dump($data);
		// die;
		$this->User->insert($data);

		$msg = [
			'sukses' => 'User berhasil disimpan!',
		];

		echo json_encode($msg);
	}

	function hapus()
	{
		if ($this->request->isAJAX()) {
			$id = $this->request->getVar('id');

			$this->User->delete($id);

			$msg = [
				'sukses' => 'User berhasil dihapus'
			];
			echo json_encode($msg);
		} else {
			echo view('denied');
			exit;
		}
	}

	public function formview()
	{
		if ($this->request->isAJAX()) {
			$id = $this->request->getVar('id');
			$row = $this->User->find($id);

			$data = [
				'title' => 'View User',
				'modTtl' => 'Form. View User',
				'id' => $row['id'],
				'nik' => $row['nik'],
				'firstname' => $row['firstname'],
				'lastname' => $row['lastname'],
				'email' => $row['email'],
				'status' => $row['status'],
				'password' => $row['password'],
				'role' => $row['role'],
				'roles' => $this->Role->getRole()->getResultArray(),
			];
			// var_dump($data['role']);
			$msg = [
				'sukses' => view('user/formview', $data),
			];

			echo json_encode($msg);
		} else {
			echo view('denied');
			exit;
		}
	}

	public function updatedata()
	{
		if ($this->request->isAJAX()) {
			$simpandata = [
				'nik' => $this->request->getVar('nik'),
				'firstname' => $this->request->getVar('firstname'),
				'lastname' => $this->request->getVar('lastname'),
				'email' => $this->request->getVar('email'),
				// 'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
				'role' => $this->request->getVar('role'),
				'status' => $this->request->getVar('status'),
			];
			// var_dump($simpandata);

			$id = $this->request->getVar('id');
			$this->User->update($id, $simpandata);

			$msg = [
				'sukses' => 'Data Berhasil di update!'
			];
			echo json_encode($msg);
		} else {
			echo view('denied');
			exit;
		}
	}

	public function update_status($uid, $ustatus)
	{
		// if (null !== ($this->request->getVar('ustatus'))) {
		$model = new UserModel();
		$updated_status = $model->update_status($uid, $ustatus);
		$session = session();

		if ($updated_status > 0) {
			$session->setFlashdata('success', 'Status berhasil diubah');
		} else {
			$session->setFlashdata('danger', 'Status gagal diubah');
		}
		return redirect()->to('/user');
		// }
	}
}
