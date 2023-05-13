<?php

namespace App\Controllers;

use App\Models\OperatorModel;
use App\Models\IndividuModel;
use App\Models\TargetModel;
use App\Models\IndLogModel;

class Home extends BaseController
{
	public function index()
	{
		$targets = new TargetModel();
		$individu = new IndividuModel();
		$IndLogModel = new IndLogModel();

		// $data = [
		// 	// 'targets' => $targets->orderBy('NamaPendata', 'asc')->findAll(),
		// 	'capaian' => $individu->getCapaian()->getResultArray(),
		// ];
		$data = [
			'title' => 'SDGs Desa Pasirlangu',
			'capaian' => $individu->getCapaian()->getResultArray(),
			'targets' => $targets->orderBy('IDTarget', 'asc')->findAll(),
			'individu_log' => $IndLogModel->getCapaian('created_by', 'asc')->getResultArray(),

		];
		// foreach($data['capaian'] as $capai){
		// 	$capai = $individu
		// }
		// dd($data);

		return view('index', $data);
	}
}
