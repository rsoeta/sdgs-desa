<?php

namespace App\Controllers;

use App\Models\DesKelModel;
use App\Models\OperatorModel;
use App\Models\IndividuModel;
use App\Models\TargetModel;
use App\Models\IndLogModel;
use App\Models\KerjaModel;
use App\Models\KondPekerjaanJmlModel;

class Chart extends BaseController
{
	public function index()
	{
		$targets = new TargetModel();
		$individu = new IndividuModel();
		$IndLogModel = new IndLogModel();
		$KerjaModel = new KerjaModel();
		$desKels = new DesKelModel();
		$KondPekerjaanJmlModel = new KondPekerjaanJmlModel();

		$desKels = $desKels->getDesKels();
		$record = $KondPekerjaanJmlModel->JmlKondisiPekerjaan();

		foreach ($record as $row) {
			$kondisis[] = array(
				// 'RW'   => $row->RW,
				'NamaKondisi'   => $row->NamaKondisi,
				'JmlKondisi' => floatval($row->JmlKondisi)
			);
		}

		$jmlKerjaModel = $KerjaModel->JmlKerjaUtama();

		foreach ($jmlKerjaModel as $row) {
			# code...
			$pekerjaan[] = [
				'NamaPekerjaan' => $row['nm_pekerjaan'],
				'JmlPekerjaan' => $row['JmlPekerjaan'],
			];
		}
		// dd($pekerjaan);

		$data = [
			'title' => 'Diagram',
			'desKels' => $desKels->getResultArray(),
			'capaian' => $individu->getCapaian()->getResultArray(),
			'targets' => $targets->orderBy('IDTarget', 'asc')->findAll(),
			'individu_log' => $IndLogModel->getCapaian('created_by', 'asc')->getResultArray(),
			'pekerjaans' => $KerjaModel->orderBy('nm_pekerjaan', 'asc'),
			'kondisis' => ($kondisis),
			'pekerjaan' => $pekerjaan,

		];
		// foreach($data['capaian'] as $capai){
		// 	$capai = $individu
		// }
		// dd($data);

		return view('chart/index', $data);
	}
}
