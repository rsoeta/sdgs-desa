<?php

namespace App\Controllers;

use App\Models\OperatorModel;
use App\Models\KetModel;
use App\Models\RwModel;
use App\Models\RtModel;
use App\Models\JenKelModel;
use App\Models\StatusModel;
use App\Models\AgamaModel;
use App\Models\WNModel;
use App\Models\AksesInternetModel;
use App\Models\KecepatanInternetModel;
use App\Models\KondisiPekerjaanModel;
use App\Models\KerjaModel;
use App\Models\DesKelModel;
use App\Models\IndividuModel;
use App\Models\SumberHasilModel;
use App\Models\SatuanModel;
use App\Models\DieksporModel;
use App\Models\PendidikanModel;
use App\Models\PelayananDesaModel;


class Individu extends BaseController
{
	public function __construct()
	{
		$this->Individu = new IndividuModel();
		$this->Ket = new KetModel();
		$this->desKel = new DesKelModel();
		$this->operator = new OperatorModel();
		$this->rwModel = new RwModel();
		$this->rtModel = new RtModel();
		$this->JenKelModel = new JenKelModel();
		$this->StatusModel = new StatusModel();
		$this->AgamaModel = new AgamaModel();
		$this->WNModel = new WNModel();
		$this->AksesInternetModel = new AksesInternetModel();
		$this->KecepatanInternetModel = new KecepatanInternetModel();
		$this->KondisiPekerjaanModel = new KondisiPekerjaanModel();
		$this->KerjaModel = new KerjaModel();
		$this->sumberHasilModel = new SumberHasilModel();
		$this->satuanModel = new SatuanModel();
		$this->DieksporModel = new DieksporModel();
		$this->pendidikan = new PendidikanModel();
		$this->PelayananDesa = new PelayananDesaModel();
		helper(['url', 'form']);
	}

	public function index()
	{
		$desKels = $this->desKel->getDesKels();

		$data = [
			'title' => 'Data Individu',
			'desKels' => $desKels->getResultArray(),
			'operator' => $this->operator->orderBy('NamaLengkap', 'asc')->findAll(),
			'rws' => $this->rwModel->orderBy('no_rw', 'asc')->findAll(),
			'kets' => $this->Ket->orderBy('NamaKeterangan', 'asc')->findAll(),

		];
		// dd($data['masuk']);
		return view('individu/index', $data);
	}

	public function individutmb()
	{
		$data = [
			'title' => 'Tambah Data Individu',
			'desKels' => $this->desKel->orderBy('NamaDesa', 'asc')->findAll(),
			'Rws' => $this->rwModel->orderBy('no_rw', 'asc')->findAll(),
			'Rts' => $this->rtModel->getFindAll()->getResultArray(),
			'JenKels' => $this->JenKelModel->orderBy('NamaJenKel', 'asc')->findAll(),
			'Statuses' => $this->StatusModel->findAll(),
			'Agamas' => $this->AgamaModel->findAll(),
			'WNs' => $this->WNModel->findAll(),
			'AksesInternets' => $this->AksesInternetModel->findAll(),
			'KecepatanInternets' => $this->KecepatanInternetModel->findAll(),
			'KondisiPekerjaans' => $this->KondisiPekerjaanModel->findAll(),
			'PekerjaanUtamas' => $this->KerjaModel->orderBy('nm_pekerjaan', 'asc')->findAll(),
			'sumberHasil' => $this->sumberHasilModel->orderBy('nm_sumber', 'asc')->findAll(),
			'satuan' => $this->satuanModel->orderBy('nm_satuan', 'asc')->findAll(),
			'Ekspors' => $this->DieksporModel->findAll(),
			'pendidikan' => $this->pendidikan->findAll(),
			'PelayananDesas' => $this->PelayananDesa->findAll(),
			'operator' => $this->operator->orderBy('NamaLengkap', 'asc')->findAll(),

		];
		helper(['form']);

		if ($this->request->getMethod() == 'post') {
			//
			$rules = [
				'RW' => [
					'label' => 'No. RW',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong',
					]
				],
				'RT' => [
					'label' => 'No. RT',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong',
					]
				],
				'NoKK' => [
					'label' => 'No KK',
					'rules' => 'required|numeric|min_length[16]|max_length[16]',
					'errors' => [
						'required' => '{field} tidak boleh kosong',
						'numeric' => '{field} harus berupa angka',
						'min_length' => '{field} terlalu pendek',
						'max_length' => '{field} terlalu panjang',
					]
				],
				'NIK' => [
					'label' => 'NIK',
					'rules' => 'required|numeric|is_unique[individu_data.NIK]|min_length[16]|max_length[16]',
					'errors' => [
						'required' => '{field} tidak boleh kosong',
						'is_unique' => '{field} sudah terdaftar',
						'numeric' => '{field} harus berupa angka',
						'min_length' => '{field} terlalu pendek',
						'max_length' => '{field} terlalu panjang',
					]
				],
				'JenisKelamin' => [
					'label' => 'Jenis Kelamin',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong',
					]
				],
				'TempatLahir' => [
					'label' => 'Tempat lahir',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong',
					]
				],
				'TempatLahir' => [
					'label' => 'Tempat lahir',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong',
					]
				],
				'TglLahir' => [
					'label' => 'Tgl Lahir',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong',
					]
				],
				'Status' => [
					'label' => 'Status Pernikahan',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong',
					]
				],
				'Agama' => [
					'label' => 'Agama',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong',
					]
				],
				'SukuBangsa' => [
					'label' => 'Suku Bangsa',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong',
					]
				],
				'WargaNegara' => [
					'label' => 'WargaNegara',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong',
					]
				],
				'KondisiPekerjaan' => [
					'label' => 'Kondisi Pekerjaan',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong',
					]
				],
				'PendTertinggi' => [
					'label' => 'Pendidikan Tertinggi',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong',
					]
				],
				'BahasaDiRumah' => [
					'label' => 'Bahasa di Rumah',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong',
					]
				],
				'BahasaFormal' => [
					'label' => 'Bahasa di Lembaga Formal',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong',
					]
				],
				'TerUpload' => [
					'label' => 'Kotak Centang',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} harus di centang',
					]
				],
				'UserID' => [
					'label' => 'User',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong',
					]
				],
			];

			if (!$this->validate($rules)) {
				$data['validation'] = $this->validator;

				// var_dump($data['validation']);
				// die;
			} else {
				//store data to database
				$model = new IndividuModel();

				$newData = [
					'Negara' => '1',
					'Provinsi' => '32',
					'Kabupaten' => '05',
					'Kecamatan' => '33',
					'Desa' => $this->request->getVar('Desa'),
					'RW' => $this->request->getVar('RW'),
					'RT' => $this->request->getVar('RT'),
					'NoKK' => $this->request->getVar('NoKK'),
					'NIK' => $this->request->getVar('NIK'),
					'Nama' => $this->request->getVar('Nama'),
					'JenisKelamin' => $this->request->getVar('JenisKelamin'),
					'TempatLahir' => $this->request->getVar('TempatLahir'),
					'TglLahir' => $this->request->getVar('TglLahir'),
					'Status' => $this->request->getVar('Status'),
					'UsiaSaatNikah' => $this->request->getVar('UsiaSaatNikah'),
					'Agama' => $this->request->getVar('Agama'),
					'SukuBangsa' => $this->request->getVar('SukuBangsa'),
					'WargaNegara' => $this->request->getVar('WargaNegara'),
					'NoHP' => $this->request->getVar('NoHP'),
					'NoWA' => $this->request->getVar('NoWA'),
					'Email' => $this->request->getVar('Email'),
					'Facebook' => $this->request->getVar('Facebook'),
					'Twitter' => $this->request->getVar('Twitter'),
					'Instagram' => $this->request->getVar('Instagram'),
					'AktifInternet' => $this->request->getVar('AktifInternet'),
					'AksesInternet' => $this->request->getVar('AksesInternet'),
					'KecepatanInternet' => $this->request->getVar('KecepatanInternet'),
					'KondisiPekerjaan' => $this->request->getVar('KondisiPekerjaan'),
					'PekerjaanUtama' => $this->request->getVar('PekerjaanUtama'),
					'JaminanSosial' => $this->request->getVar('JaminanSosial'),
					'PenghasilanSetahun' => str_replace(',', '', $this->request->getVar('PenghasilanSetahun')),
					'Sumber' => $this->request->getVar('Sumber'),
					'SebutanSumberLain' => $this->request->getVar('SebutanSumberLain'),
					'Jumlah' => str_replace(',', '', $this->request->getVar('Jumlah')),
					'Satuan' => $this->request->getVar('Satuan'),
					'PenghasilanSetahunPenghasilan' => str_replace(',', '', $this->request->getVar('PenghasilanSetahunPenghasilan')),
					'Diekspor' => $this->request->getVar('Diekspor'),
					'Muntaber' => $this->request->getVar('Muntaber'),
					'DemamBerdarah' => $this->request->getVar('DemamBerdarah'),
					'Campak' => $this->request->getVar('Campak'),
					'Malaria' => $this->request->getVar('Malaria'),
					'FlueBurung' => $this->request->getVar('FlueBurung'),
					'Covid19' => $this->request->getVar('Covid19'),
					'HepatitisB' => $this->request->getVar('HepatitisB'),
					'Leptospirosis' => $this->request->getVar('Leptospirosis'),
					'Kolera' => $this->request->getVar('Kolera'),
					'GiziBuruk' => $this->request->getVar('GiziBuruk'),
					'Jantung' => $this->request->getVar('Jantung'),
					'TBCParu2' => $this->request->getVar('TBCParu2'),
					'Kanker' => $this->request->getVar('Kanker'),
					'Diabetes' => $this->request->getVar('Diabetes'),
					'HepatitisE' => $this->request->getVar('HepatitisE'),
					'Difteri' => $this->request->getVar('Difteri'),
					'Chikungunya' => $this->request->getVar('Chikungunya'),
					'Lumpuh' => $this->request->getVar('Lumpuh'),
					'Lainnya' => $this->request->getVar('Lainnya'),
					'SebutanPenyakit' => $this->request->getVar('SebutanPenyakit'),
					'RSDidatangi' => $this->request->getVar('RSDidatangi'),
					'RSBersalinDidatangi' => $this->request->getVar('RSBersalinDidatangi'),
					'PuskesmasRIDidatangi' => $this->request->getVar('PuskesmasRIDidatangi'),
					'PuskesmasTanpaRIDidatangi' => $this->request->getVar('PuskesmasTanpaRIDidatangi'),
					'PuskesmasPembantuDidatangi' => $this->request->getVar('PuskesmasPembantuDidatangi'),
					'PoliklinikDidatangi' => $this->request->getVar('PoliklinikDidatangi'),
					'PraktikDokterDidatangi' => $this->request->getVar('PraktikDokterDidatangi'),
					'RumahBersalinDidatangi' => $this->request->getVar('RumahBersalinDidatangi'),
					'PraktikBidanDidatangi' => $this->request->getVar('PraktikBidanDidatangi'),
					'PoskesdesDidatangi' => $this->request->getVar('PoskesdesDidatangi'),
					'PolindesDidatangi' => $this->request->getVar('PolindesDidatangi'),
					'ApotikDidatangi' => $this->request->getVar('ApotikDidatangi'),
					'TokoKhususObatDidatangi' => $this->request->getVar('TokoKhususObatDidatangi'),
					'PosyanduDidatangi' => $this->request->getVar('PosyanduDidatangi'),
					'PosbinduDidatangi' => $this->request->getVar('PosbinduDidatangi'),
					'PraktikDukunDidatangi' => $this->request->getVar('PraktikDukunDidatangi'),
					'JamsosKesehatan' => $this->request->getVar('JamsosKesehatan'),
					'MelahirkanSetahunTerakhir' => $this->request->getVar('MelahirkanSetahunTerakhir'),
					'AsiEkslusif' => $this->request->getVar('AsiEkslusif'),
					'Tunanetra' => $this->request->getVar('Tunanetra'),
					'Tunarungu' => $this->request->getVar('Tunarungu'),
					'Tunawicara' => $this->request->getVar('Tunawicara'),
					'Tunarunguwicara' => $this->request->getVar('Tunarunguwicara'),
					'Tunadaksa' => $this->request->getVar('Tunadaksa'),
					'Tunagrahita' => $this->request->getVar('Tunagrahita'),
					'Tunalaras' => $this->request->getVar('Tunalaras'),
					'CacatKusta' => $this->request->getVar('CacatKusta'),
					'CacatGanda' => $this->request->getVar('CacatGanda'),
					'Dipasung' => $this->request->getVar('Dipasung'),
					'PendTertinggi' => $this->request->getVar('PendTertinggi'),
					'BrpThnPendDasar' => $this->request->getVar('BrpThnPendDasar'),
					'PendSedangDiikuti' => $this->request->getVar('PendSedangDiikuti'),
					'BrpKaliPelatihan' => $this->request->getVar('BrpKaliPelatihan'),
					'BahasaDiRumah' => $this->request->getVar('BahasaDiRumah'),
					'BahasaFormal' => $this->request->getVar('BahasaFormal'),
					'KerjaBakti' => $this->request->getVar('KerjaBakti'),
					'Siskamling' => $this->request->getVar('Siskamling'),
					'PestaRakyat' => $this->request->getVar('PestaRakyat'),
					'MenolongWargaMati' => $this->request->getVar('MenolongWargaMati'),
					'MenolongWargaSakit' => $this->request->getVar('MenolongWargaSakit'),
					'MenolongWargaKecelakaan' => $this->request->getVar('MenolongWargaKecelakaan'),
					'PernahPelayananDesa' => $this->request->getVar('PernahPelayananDesa'),
					'PelayananDesa' => $this->request->getVar('PelayananDesa'),
					'PernahSaranKePihakDesa' => $this->request->getVar('PernahSaranKePihakDesa'),
					'KeterbukaanDesa' => $this->request->getVar('KeterbukaanDesa'),
					'TerjadiBencana' => $this->request->getVar('TerjadiBencana'),
					'TerkenaBencana' => $this->request->getVar('TerkenaBencana'),
					'MenerimaBantuanBencana' => $this->request->getVar('MenerimaBantuanBencana'),
					'PenangananPsikologi' => $this->request->getVar('PenangananPsikologi'),
					'Keterangan' => 1,
					'TerUpload' => $this->request->getVar('TerUpload'),
					'created_by' => $this->request->getVar('UserID'),
					'created_at' => date('Y-m-d H:i:s'),
				];
				// var_dump($newData);
				// die;
				$model->save($newData);
				$session = session();
				$session->setFlashdata('success', 'Data Berhasil di tambahkan');
				return redirect()->to('individu');
			}
		}
		return view('individu/formTambah', $data);
	}

	public function individuedit($ID)
	{

		// dd($this->request->getVar());
		// if ($this->request->isAJAX()) {

		helper(['form']);

		if ($this->request->getMethod() == 'post') {

			//cek nik
			$nikLama = $this->Individu->find($ID);
			if ($nikLama['NIK'] == $this->request->getVar('NIK')) {
				$rule_nik = 'required|is_natural|min_length[16]|max_length[16]';
			} else {
				$rule_nik = 'required|is_natural|is_unique[individu_data.NIK]|min_length[16]|max_length[16]';
			}

			//
			$rules = [
				'RW' => [
					'label' => 'No. RW',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong',
					]
				],
				'RT' => [
					'label' => 'No. RT',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong',
					]
				],
				'NoKK' => [
					'label' => 'No KK',
					'rules' => 'required|is_natural|min_length[16]|max_length[16]',
					'errors' => [
						'required' => '{field} tidak boleh kosong',
						'is_natural' => '{field} harus berupa angka',
						'min_length' => '{field} terlalu pendek',
						'max_length' => '{field} terlalu panjang',
					]
				],
				'NIK' => [
					'label' => 'NIK',
					'rules' => $rule_nik,
					'errors' => [
						'required' => '{field} tidak boleh kosong',
						'is_unique' => '{field} sudah terdaftar',
						'is_natural' => '{field} harus berupa angka',
						'min_length' => '{field} terlalu pendek',
						'max_length' => '{field} terlalu panjang',
					]
				],
				'JenisKelamin' => [
					'label' => 'Jenis Kelamin',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong',
					]
				],
				'TempatLahir' => [
					'label' => 'Tempat lahir',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong',
					]
				],
				'TempatLahir' => [
					'label' => 'Tempat lahir',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong',
					]
				],
				'TglLahir' => [
					'label' => 'Tgl Lahir',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong',
					]
				],
				'Status' => [
					'label' => 'Status Pernikahan',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong',
					]
				],
				'Agama' => [
					'label' => 'Agama',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong',
					]
				],
				'SukuBangsa' => [
					'label' => 'Suku Bangsa',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong',
					]
				],
				'WargaNegara' => [
					'label' => 'WargaNegara',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong',
					]
				],
				'KondisiPekerjaan' => [
					'label' => 'Kondisi Pekerjaan',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong',
					]
				],
				'PendTertinggi' => [
					'label' => 'Pendidikan Tertinggi',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong',
					]
				],
				'BahasaDiRumah' => [
					'label' => 'Bahasa di Rumah',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong',
					]
				],
				'BahasaFormal' => [
					'label' => 'Bahasa di Lembaga Formal',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong',
					]
				],
				'TerUpload' => [
					'label' => 'Kotak Centang',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} harus di centang',
					]
				],
				'UserID' => [
					'label' => 'User',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong',
					]
				],
			];

			if (!$this->validate($rules)) {
				$data['validation'] = $this->validator;
				return redirect()->to('/formview/' . $this->request->getVar('ID'))->withInput()->with('validation', $data['validation']);

				// var_dump($data['validation']);
				// die;
			} else {
				//store data to database
				$ID = $this->request->getVar('ID');
				$model = new IndividuModel();

				$newData = [
					'Negara' => '1',
					'Provinsi' => '32',
					'Kabupaten' => '05',
					'Kecamatan' => '33',
					'Desa' => $this->request->getVar('Desa'),
					'RW' => $this->request->getVar('RW'),
					'RT' => $this->request->getVar('RT'),
					'NoKK' => $this->request->getVar('NoKK'),
					'NIK' => $this->request->getVar('NIK'),
					'Nama' => $this->request->getVar('Nama'),
					'JenisKelamin' => $this->request->getVar('JenisKelamin'),
					'TempatLahir' => $this->request->getVar('TempatLahir'),
					'TglLahir' => $this->request->getVar('TglLahir'),
					'Status' => $this->request->getVar('Status'),
					'UsiaSaatNikah' => $this->request->getVar('UsiaSaatNikah'),
					'Agama' => $this->request->getVar('Agama'),
					'SukuBangsa' => $this->request->getVar('SukuBangsa'),
					'WargaNegara' => $this->request->getVar('WargaNegara'),
					'NoHP' => $this->request->getVar('NoHP'),
					'NoWA' => $this->request->getVar('NoWA'),
					'Email' => $this->request->getVar('Email'),
					'Facebook' => $this->request->getVar('Facebook'),
					'Twitter' => $this->request->getVar('Twitter'),
					'Instagram' => $this->request->getVar('Instagram'),
					'AktifInternet' => $this->request->getVar('AktifInternet'),
					'AksesInternet' => $this->request->getVar('AksesInternet'),
					'KecepatanInternet' => $this->request->getVar('KecepatanInternet'),
					'KondisiPekerjaan' => $this->request->getVar('KondisiPekerjaan'),
					'PekerjaanUtama' => $this->request->getVar('PekerjaanUtama'),
					'JaminanSosial' => $this->request->getVar('JaminanSosial'),
					'PenghasilanSetahun' => str_replace(',', '', $this->request->getVar('PenghasilanSetahun')),
					'Sumber' => $this->request->getVar('Sumber'),
					'SebutanSumberLain' => $this->request->getVar('SebutanSumberLain'),
					'Jumlah' => str_replace(',', '', $this->request->getVar('Jumlah')),
					'Satuan' => $this->request->getVar('Satuan'),
					'PenghasilanSetahunPenghasilan' => str_replace(',', '', $this->request->getVar('PenghasilanSetahunPenghasilan')),
					'Diekspor' => $this->request->getVar('Diekspor'),
					'Muntaber' => $this->request->getVar('Muntaber'),
					'DemamBerdarah' => $this->request->getVar('DemamBerdarah'),
					'Campak' => $this->request->getVar('Campak'),
					'Malaria' => $this->request->getVar('Malaria'),
					'FlueBurung' => $this->request->getVar('FlueBurung'),
					'Covid19' => $this->request->getVar('Covid19'),
					'HepatitisB' => $this->request->getVar('HepatitisB'),
					'Leptospirosis' => $this->request->getVar('Leptospirosis'),
					'Kolera' => $this->request->getVar('Kolera'),
					'GiziBuruk' => $this->request->getVar('GiziBuruk'),
					'Jantung' => $this->request->getVar('Jantung'),
					'TBCParu2' => $this->request->getVar('TBCParu2'),
					'Kanker' => $this->request->getVar('Kanker'),
					'Diabetes' => $this->request->getVar('Diabetes'),
					'HepatitisE' => $this->request->getVar('HepatitisE'),
					'Difteri' => $this->request->getVar('Difteri'),
					'Chikungunya' => $this->request->getVar('Chikungunya'),
					'Lumpuh' => $this->request->getVar('Lumpuh'),
					'Lainnya' => $this->request->getVar('Lainnya'),
					'SebutanPenyakit' => $this->request->getVar('SebutanPenyakit'),
					'RSDidatangi' => $this->request->getVar('RSDidatangi'),
					'RSBersalinDidatangi' => $this->request->getVar('RSBersalinDidatangi'),
					'PuskesmasRIDidatangi' => $this->request->getVar('PuskesmasRIDidatangi'),
					'PuskesmasTanpaRIDidatangi' => $this->request->getVar('PuskesmasTanpaRIDidatangi'),
					'PuskesmasPembantuDidatangi' => $this->request->getVar('PuskesmasPembantuDidatangi'),
					'PoliklinikDidatangi' => $this->request->getVar('PoliklinikDidatangi'),
					'PraktikDokterDidatangi' => $this->request->getVar('PraktikDokterDidatangi'),
					'RumahBersalinDidatangi' => $this->request->getVar('RumahBersalinDidatangi'),
					'PraktikBidanDidatangi' => $this->request->getVar('PraktikBidanDidatangi'),
					'PoskesdesDidatangi' => $this->request->getVar('PoskesdesDidatangi'),
					'PolindesDidatangi' => $this->request->getVar('PolindesDidatangi'),
					'ApotikDidatangi' => $this->request->getVar('ApotikDidatangi'),
					'TokoKhususObatDidatangi' => $this->request->getVar('TokoKhususObatDidatangi'),
					'PosyanduDidatangi' => $this->request->getVar('PosyanduDidatangi'),
					'PosbinduDidatangi' => $this->request->getVar('PosbinduDidatangi'),
					'PraktikDukunDidatangi' => $this->request->getVar('PraktikDukunDidatangi'),
					'JamsosKesehatan' => $this->request->getVar('JamsosKesehatan'),
					'MelahirkanSetahunTerakhir' => $this->request->getVar('MelahirkanSetahunTerakhir'),
					'AsiEkslusif' => $this->request->getVar('AsiEkslusif'),
					'Tunanetra' => $this->request->getVar('Tunanetra'),
					'Tunarungu' => $this->request->getVar('Tunarungu'),
					'Tunawicara' => $this->request->getVar('Tunawicara'),
					'Tunarunguwicara' => $this->request->getVar('Tunarunguwicara'),
					'Tunadaksa' => $this->request->getVar('Tunadaksa'),
					'Tunagrahita' => $this->request->getVar('Tunagrahita'),
					'Tunalaras' => $this->request->getVar('Tunalaras'),
					'CacatKusta' => $this->request->getVar('CacatKusta'),
					'CacatGanda' => $this->request->getVar('CacatGanda'),
					'Dipasung' => $this->request->getVar('Dipasung'),
					'PendTertinggi' => $this->request->getVar('PendTertinggi'),
					'BrpThnPendDasar' => $this->request->getVar('BrpThnPendDasar'),
					'PendSedangDiikuti' => $this->request->getVar('PendSedangDiikuti'),
					'BrpKaliPelatihan' => $this->request->getVar('BrpKaliPelatihan'),
					'BahasaDiRumah' => $this->request->getVar('BahasaDiRumah'),
					'BahasaFormal' => $this->request->getVar('BahasaFormal'),
					'KerjaBakti' => $this->request->getVar('KerjaBakti'),
					'Siskamling' => $this->request->getVar('Siskamling'),
					'PestaRakyat' => $this->request->getVar('PestaRakyat'),
					'MenolongWargaMati' => $this->request->getVar('MenolongWargaMati'),
					'MenolongWargaSakit' => $this->request->getVar('MenolongWargaSakit'),
					'MenolongWargaKecelakaan' => $this->request->getVar('MenolongWargaKecelakaan'),
					'PernahPelayananDesa' => $this->request->getVar('PernahPelayananDesa'),
					'PelayananDesa' => $this->request->getVar('PelayananDesa'),
					'PernahSaranKePihakDesa' => $this->request->getVar('PernahSaranKePihakDesa'),
					'KeterbukaanDesa' => $this->request->getVar('KeterbukaanDesa'),
					'TerjadiBencana' => $this->request->getVar('TerjadiBencana'),
					'TerkenaBencana' => $this->request->getVar('TerkenaBencana'),
					'MenerimaBantuanBencana' => $this->request->getVar('MenerimaBantuanBencana'),
					'PenangananPsikologi' => $this->request->getVar('PenangananPsikologi'),
					'Keterangan' => 1,
					'TerUpload' => $this->request->getVar('TerUpload'),
					'created_by' => $this->request->getVar('UserID'),
					'updated_by' => $this->request->getVar('UserID'),
					'updated_at' => date('Y-m-d H:i:s'),
				];
				// var_dump($newData);
				// die;
				$model->update($ID, $newData);
				$session = session();
				$session->setFlashdata('success', 'Data Berhasil diubah');
				return redirect()->to('/individu');
			}
		}

		// $data = [];
		// $data = [
		// 	'title' => 'Edit Data Individu',
		// 	'desKels' => $this->desKel->orderBy('NamaDesa', 'asc')->findAll(),
		// 	'Rws' => $this->rwModel->orderBy('no_rw', 'asc')->findAll(),
		// 	'Rts' => $this->rtModel->getFindAll()->getResultArray(),
		// 	'JenKels' => $this->JenKelModel->orderBy('NamaJenKel', 'asc')->findAll(),
		// 	'Statuses' => $this->StatusModel->findAll(),
		// 	'Agamas' => $this->AgamaModel->findAll(),
		// 	'WNs' => $this->WNModel->findAll(),
		// 	'AksesInternets' => $this->AksesInternetModel->findAll(),
		// 	'KecepatanInternets' => $this->KecepatanInternetModel->findAll(),
		// 	'KondisiPekerjaans' => $this->KondisiPekerjaanModel->findAll(),
		// 	'PekerjaanUtamas' => $this->KerjaModel->orderBy('nm_pekerjaan', 'asc')->findAll(),
		// 	'sumberHasil' => $this->sumberHasilModel->orderBy('nm_sumber', 'asc')->findAll(),
		// 	'satuan' => $this->satuanModel->orderBy('nm_satuan', 'asc')->findAll(),
		// 	'Ekspors' => $this->DieksporModel->findAll(),
		// 	'pendidikan' => $this->pendidikan->findAll(),
		// 	'PelayananDesas' => $this->PelayananDesa->findAll(),
		// 	'operator' => $this->operator->orderBy('NamaLengkap', 'asc')->findAll(),


		// ];

		// }

		return view('individu/formedit');
	}

	function action()
	{
		if ($this->request->getVar('action')) {
			$action = $this->request->getVar('action');
			if ($action == 'getRT') {
				$rtModel = new RtModel();
				$rtData = $rtModel->where('no_rw', $this->request->getVar('RW'))->findAll();

				echo json_encode($rtData);
			}
		}
	}

	function get_rt()
	{
		if ($this->request->getVar('action')) {
			$action = $this->request->getVar('action');

			if ($action == 'get_rt') {
				$RtModel = new RtModel();

				$Rtdata = $RtModel->where('no_rw', $this->request->getVar('no_rw'))->findAll();

				echo json_encode($Rtdata);
			}
		}
	}

	public function table_data()
	{
		$model = new IndividuModel();
		$KetMasalah = new KetModel();

		$csrfName = csrf_token();
		$csrfHash = csrf_hash();

		$desa = $this->request->getPost('desa');
		$operator = $this->request->getPost('operator');
		$rw = $this->request->getPost('rw');
		$rt = $this->request->getPost('rt');
		$keterangan = $this->request->getPost('keterangan');

		$listing = $model->get_datatables($desa, $operator, $rw, $rt, $keterangan);
		$jumlah_semua = $model->jumlah_semua();
		$jumlah_filter = $model->jumlah_filter($desa, $operator, $rw, $rt, $keterangan);
		// $KetMasalah = $KetMasalah->orderBy('IDKeterangan', 'asc')->findAll();
		// // dd($listing);
		// foreach ($KetMasalah as $row) {
		// 	$IDKeterangan = $row['IDKeterangan'];
		// 	$NamaKeterangan = $row['NamaKeterangan'];
		// }
		# code...


		// <span class="badge bg-secondary">Secondary</span>
		// <span class="badge bg-success">Success</span>
		// <span class="badge bg-danger">Danger</span>
		// <span class="badge bg-warning text-dark">Warning</span>
		// <span class="badge bg-info text-dark">Info</span>
		// <span class="badge bg-light text-dark">Light</span>
		// <span class="badge bg-dark">Dark</span>';

		$data = array();
		$no = $_POST['start'];
		foreach ($listing as $key) {

			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $key->Nama;
			$row[] = $key->NIK;
			$row[] = $key->NoKK;
			// $row[] = $key->NoKK;
			$row[] = $key->RT;
			$row[] = $key->RW;
			// $row[] = $key->Desa;
			$row[] = $key->TempatLahir;
			$row[] = $key->TglLahir;

			$badges = $key->Keterangan;
			if ($badges == 1) {
				$badges = '<span class="badge bg-success" selected>Clear</span>';
			} elseif ($badges == 2) {
				$badges = '<span class="badge bg-danger" selected>Duplikat NIK</span>';
			} elseif ($badges == 3) {
				$badges = '<span class="badge bg-danger" selected>Invalid NIK</span>';
			} elseif ($badges == 4) {
				$badges = '<span class="badge bg-warning" selected>Kond. Pekerjaan NULL</span>';
			} elseif ($badges == 5) {
				$badges = '<span class="badge bg-warning" selected>Pend. Tertinggi NULL</span>';
			} elseif ($badges == 6) {
				$badges = '<span class="badge bg-warning" selected>Invalid RT/RW</span>';
			}

			$row[] = $badges;
			// $row[] = $key->NamaPendidikan;
			// $row[] = "<button class='btn btn-lg' onclick='delet('" . $key->ID . "')'>
			//                                             <i class='fa fa-trash-alt'></i>
			//                                         </button>";
			$row[] = "<button type=\"button\" class=\"btn btn-sm\" onclick=\"window.location='formview/" . $key->ID . "'\"><i class='fa fa-pencil-alt'></i></button> | 
			<button class='btn btn-sm' data-id='" . $key->ID . "' id='deleteBtn'><i class='fa fa-trash-alt'></i></button>";
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $jumlah_semua->jml,
			"recordsFiltered" => $jumlah_filter->jml,
			"data" => $data,
		);
		$output[$csrfName] = $csrfHash;
		echo json_encode($output);
	}

	public function edit($id)
	{
		$row = $this->Individu->find($id);
		if ($row) {
			$data = [
				'title' => 'Form. Edit',
				'desKels' => $this->desKel->orderBy('NamaDesa', 'asc')->findAll(),
				'Rws' => $this->rwModel->orderBy('no_rw', 'asc')->findAll(),
				'Rts' => $this->rtModel->getFindAll()->getResultArray(),
				'JenKels' => $this->JenKelModel->orderBy('NamaJenKel', 'asc')->findAll(),
				'Statuses' => $this->StatusModel->orderBy('NamaStatus', 'asc')->findAll(),
				'Agamas' => $this->AgamaModel->findAll(),
				'WNs' => $this->WNModel->findAll(),
				'AksesInternets' => $this->AksesInternetModel->findAll(),
				'KecepatanInternets' => $this->KecepatanInternetModel->findAll(),
				'KondisiPekerjaans' => $this->KondisiPekerjaanModel->findAll(),
				'PekerjaanUtamas' => $this->KerjaModel->orderBy('nm_pekerjaan', 'asc')->findAll(),
				'sumberHasil' => $this->sumberHasilModel->orderBy('nm_sumber', 'asc')->findAll(),
				'satuan' => $this->satuanModel->orderBy('nm_satuan', 'asc')->findAll(),
				'Ekspors' => $this->DieksporModel->findAll(),
				'pendidikan' => $this->pendidikan->findAll(),
				'PelayananDesas' => $this->PelayananDesa->findAll(),
				'operator' => $this->operator->orderBy('NamaLengkap', 'asc')->findAll(),

				'ID' => $row['ID'],
				'Negara' => $row['Negara'],
				'Provinsi' => $row['Provinsi'],
				'Kabupaten' => $row['Kabupaten'],
				'Kecamatan' => $row['Kecamatan'],
				'Desa' => $row['Desa'],
				'RW' => $row['RW'],
				'RT' => $row['RT'],
				'NoKK' => $row['NoKK'],
				'NIK' => $row['NIK'],
				'Nama' => $row['Nama'],
				'JenisKelamin' => $row['JenisKelamin'],
				'TempatLahir' => $row['TempatLahir'],
				'TglLahir' => $row['TglLahir'],
				'Status' => $row['Status'],
				'UsiaSaatNikah' => $row['UsiaSaatNikah'],
				'Agama' => $row['Agama'],
				'SukuBangsa' => $row['SukuBangsa'],
				'WargaNegara' => $row['WargaNegara'],
				'NoHP' => $row['NoHP'],
				'NoWA' => $row['NoWA'],
				'Email' => $row['Email'],
				'Facebook' => $row['Facebook'],
				'Twitter' => $row['Twitter'],
				'Instagram' => $row['Instagram'],
				'AktifInternet' => $row['AktifInternet'],
				'AksesInternet' => $row['AksesInternet'],
				'KecepatanInternet' => $row['KecepatanInternet'],
				'KondisiPekerjaan' => $row['KondisiPekerjaan'],
				'PekerjaanUtama' => $row['PekerjaanUtama'],
				'JaminanSosial' => $row['JaminanSosial'],
				'PenghasilanSetahun' => $row['PenghasilanSetahun'],
				'Sumber' => $row['Sumber'],
				'SebutanSumberLain' => $row['SebutanSumberLain'],
				'Jumlah' => $row['Jumlah'],
				'Satuan' => $row['Satuan'],
				'PenghasilanSetahunPenghasilan' => $row['PenghasilanSetahunPenghasilan'],
				'Diekspor' => $row['Diekspor'],
				'Muntaber' => $row['Muntaber'],
				'DemamBerdarah' => $row['DemamBerdarah'],
				'Campak' => $row['Campak'],
				'Malaria' => $row['Malaria'],
				'FlueBurung' => $row['FlueBurung'],
				'Covid19' => $row['Covid19'],
				'HepatitisB' => $row['HepatitisB'],
				'Leptospirosis' => $row['Leptospirosis'],
				'Kolera' => $row['Kolera'],
				'GiziBuruk' => $row['GiziBuruk'],
				'Jantung' => $row['Jantung'],
				'TBCParu2' => $row['TBCParu2'],
				'Kanker' => $row['Kanker'],
				'Diabetes' => $row['Diabetes'],
				'HepatitisE' => $row['HepatitisE'],
				'Difteri' => $row['Difteri'],
				'Chikungunya' => $row['Chikungunya'],
				'Lumpuh' => $row['Lumpuh'],
				'Lainnya' => $row['Lainnya'],
				'SebutanPenyakit' => $row['SebutanPenyakit'],
				'RSDidatangi' => $row['RSDidatangi'],
				'RSBersalinDidatangi' => $row['RSBersalinDidatangi'],
				'PuskesmasRIDidatangi' => $row['PuskesmasRIDidatangi'],
				'PuskesmasTanpaRIDidatangi' => $row['PuskesmasTanpaRIDidatangi'],
				'PuskesmasPembantuDidatangi' => $row['PuskesmasPembantuDidatangi'],
				'PoliklinikDidatangi' => $row['PoliklinikDidatangi'],
				'PraktikDokterDidatangi' => $row['PraktikDokterDidatangi'],
				'RumahBersalinDidatangi' => $row['RumahBersalinDidatangi'],
				'PraktikBidanDidatangi' => $row['PraktikBidanDidatangi'],
				'PoskesdesDidatangi' => $row['PoskesdesDidatangi'],
				'PolindesDidatangi' => $row['PolindesDidatangi'],
				'ApotikDidatangi' => $row['ApotikDidatangi'],
				'TokoKhususObatDidatangi' => $row['TokoKhususObatDidatangi'],
				'PosyanduDidatangi' => $row['PosyanduDidatangi'],
				'PosbinduDidatangi' => $row['PosbinduDidatangi'],
				'PraktikDukunDidatangi' => $row['PraktikDukunDidatangi'],
				'JamsosKesehatan' => $row['JamsosKesehatan'],
				'MelahirkanSetahunTerakhir' => $row['MelahirkanSetahunTerakhir'],
				'AsiEkslusif' => $row['AsiEkslusif'],
				'Tunanetra' => $row['Tunanetra'],
				'Tunarungu' => $row['Tunarungu'],
				'Tunawicara' => $row['Tunawicara'],
				'Tunarunguwicara' => $row['Tunarunguwicara'],
				'Tunadaksa' => $row['Tunadaksa'],
				'Tunagrahita' => $row['Tunagrahita'],
				'Tunalaras' => $row['Tunalaras'],
				'CacatKusta' => $row['CacatKusta'],
				'CacatGanda' => $row['CacatGanda'],
				'Dipasung' => $row['Dipasung'],
				'PendTertinggi' => $row['PendTertinggi'],
				'BrpThnPendDasar' => $row['BrpThnPendDasar'],
				'PendSedangDiikuti' => $row['PendSedangDiikuti'],
				'BrpKaliPelatihan' => $row['BrpKaliPelatihan'],
				'BahasaDiRumah' => $row['BahasaDiRumah'],
				'BahasaFormal' => $row['BahasaFormal'],
				'KerjaBakti' => $row['KerjaBakti'],
				'Siskamling' => $row['Siskamling'],
				'PestaRakyat' => $row['PestaRakyat'],
				'MenolongWargaMati' => $row['MenolongWargaMati'],
				'MenolongWargaSakit' => $row['MenolongWargaSakit'],
				'MenolongWargaKecelakaan' => $row['MenolongWargaKecelakaan'],
				'PernahPelayananDesa' => $row['PernahPelayananDesa'],
				'PelayananDesa' => $row['PelayananDesa'],
				'PernahSaranKePihakDesa' => $row['PernahSaranKePihakDesa'],
				'KeterbukaanDesa' => $row['KeterbukaanDesa'],
				'TerjadiBencana' => $row['TerjadiBencana'],
				'TerkenaBencana' => $row['TerkenaBencana'],
				'MenerimaBantuanBencana' => $row['MenerimaBantuanBencana'],
				'PenangananPsikologi' => $row['PenangananPsikologi'],
				'UserID' => $row['created_by'],
				'TerUpload' => $row['TerUpload'],
				'created_by' => $row['created_by'],
				'created_at' => $row['created_at'],
				'updated_by' => $row['updated_by'],
				'updated_at' => $row['updated_at'],

				'validation' => \Config\Services::validation()
			];
			// var_dump($data['Rts']);

			return view('individu/formEdit', $data);
		} else {
			echo view('denied');
			exit;
		}
	}

	public function simpandata()
	{
		// if ($this->request->isAJAX()) {
		// 	$Negara = $this->request->getVar('Negara');
		// 	$Provinsi = $this->request->getVar('Provinsi');
		// 	$Kabupaten = $this->request->getVar('Kabupaten');
		// 	$Kecamatan = $this->request->getVar('Kecamatan');
		// 	$Desa = $this->request->getVar('Desa');
		// 	$RW = $this->request->getVar('RW');
		// 	$RT = $this->request->getVar('RT');
		// 	$NoKK = $this->request->getVar('NoKK');
		// 	$NIK = $this->request->getVar('NIK');
		// 	$Nama = $this->request->getVar('Nama');
		// 	$JenisKelamin = $this->request->getVar('JenisKelamin');
		// 	$TempatLahir = $this->request->getVar('TempatLahir');
		// 	$TglLahir = $this->request->getVar('TglLahir');
		// 	$Status = $this->request->getVar('Status');
		// 	$UsiaSaatNikah = $this->request->getVar('UsiaSaatNikah');
		// 	$Agama = $this->request->getVar('Agama');
		// 	$SukuBangsa = $this->request->getVar('SukuBangsa');
		// 	$WargaNegara = $this->request->getVar('WargaNegara');
		// 	$NoHP = $this->request->getVar('NoHP');
		// 	$NoWA = $this->request->getVar('NoWA');
		// 	$Email = $this->request->getVar('Email');
		// 	$Facebook = $this->request->getVar('Facebook');
		// 	$Twitter = $this->request->getVar('Twitter');
		// 	$Instagram = $this->request->getVar('Instagram');
		// 	$AktifInternet = $this->request->getVar('AktifInternet');
		// 	$AksesInternet = $this->request->getVar('AksesInternet');
		// 	$KecepatanInternet = $this->request->getVar('KecepatanInternet');
		// 	$KondisiPekerjaan = $this->request->getVar('KondisiPekerjaan');
		// 	$PekerjaanUtama = $this->request->getVar('PekerjaanUtama');
		// 	$JaminanSosial = $this->request->getVar('JaminanSosial');
		// 	$PenghasilanSetahun = str_replace(',', '', $this->request->getVar('PenghasilanSetahun'));
		// 	$Sumber = $this->request->getVar('Sumber');
		// 	$SebutanSumberLain = $this->request->getVar('SebutanSumberLain');
		// 	$Jumlah = str_replace(',', '', $this->request->getVar('Jumlah'));
		// 	$Satuan = $this->request->getVar('Satuan');
		// 	$PenghasilanSetahunPenghasilan = str_replace(',', '', $this->request->getVar('PenghasilanSetahunPenghasilan'));
		// 	$Diekspor = $this->request->getVar('Diekspor');
		// 	$Muntaber = $this->request->getVar('Muntaber');
		// 	$DemamBerdarah = $this->request->getVar('DemamBerdarah');
		// 	$Campak = $this->request->getVar('Campak');
		// 	$Malaria = $this->request->getVar('Malaria');
		// 	$FlueBurung = $this->request->getVar('FlueBurung');
		// 	$Covid19 = $this->request->getVar('Covid19');
		// 	$HepatitisB = $this->request->getVar('HepatitisB');
		// 	$Leptospirosis = $this->request->getVar('Leptospirosis');
		// 	$Kolera = $this->request->getVar('Kolera');
		// 	$GiziBuruk = $this->request->getVar('GiziBuruk');
		// 	$Jantung = $this->request->getVar('Jantung');
		// 	$TBCParu2 = $this->request->getVar('TBCParu2');
		// 	$Kanker = $this->request->getVar('Kanker');
		// 	$Diabetes = $this->request->getVar('Diabetes');
		// 	$HepatitisE = $this->request->getVar('HepatitisE');
		// 	$Difteri = $this->request->getVar('Difteri');
		// 	$Chikungunya = $this->request->getVar('Chikungunya');
		// 	$Lumpuh = $this->request->getVar('Lumpuh');
		// 	$Lainnya = $this->request->getVar('Lainnya');
		// 	$SebutanPenyakit = $this->request->getVar('SebutanPenyakit');
		// 	$RSDidatangi = $this->request->getVar('RSDidatangi');
		// 	$RSBersalinDidatangi = $this->request->getVar('RSBersalinDidatangi');
		// 	$PuskesmasRIDidatangi = $this->request->getVar('PuskesmasRIDidatangi');
		// 	$PuskesmasTanpaRIDidatangi = $this->request->getVar('PuskesmasTanpaRIDidatangi');
		// 	$PuskesmasPembantuDidatangi = $this->request->getVar('PuskesmasPembantuDidatangi');
		// 	$PoliklinikDidatangi = $this->request->getVar('PoliklinikDidatangi');
		// 	$PraktikDokterDidatangi = $this->request->getVar('PraktikDokterDidatangi');
		// 	$RumahBersalinDidatangi = $this->request->getVar('RumahBersalinDidatangi');
		// 	$PraktikBidanDidatangi = $this->request->getVar('PraktikBidanDidatangi');
		// 	$PoskesdesDidatangi = $this->request->getVar('PoskesdesDidatangi');
		// 	$PolindesDidatangi = $this->request->getVar('PolindesDidatangi');
		// 	$ApotikDidatangi = $this->request->getVar('ApotikDidatangi');
		// 	$TokoKhususObatDidatangi = $this->request->getVar('TokoKhususObatDidatangi');
		// 	$PosyanduDidatangi = $this->request->getVar('PosyanduDidatangi');
		// 	$PosbinduDidatangi = $this->request->getVar('PosbinduDidatangi');
		// 	$PraktikDukunDidatangi = $this->request->getVar('PraktikDukunDidatangi');
		// 	$JamsosKesehatan = $this->request->getVar('JamsosKesehatan');
		// 	$MelahirkanSetahunTerakhir = $this->request->getVar('MelahirkanSetahunTerakhir');
		// 	$AsiEkslusif = $this->request->getVar('AsiEkslusif');
		// 	$Tunanetra = $this->request->getVar('Tunanetra');
		// 	$Tunarungu = $this->request->getVar('Tunarungu');
		// 	$Tunawicara = $this->request->getVar('Tunawicara');
		// 	$Tunarunguwicara = $this->request->getVar('Tunarunguwicara');
		// 	$Tunadaksa = $this->request->getVar('Tunadaksa');
		// 	$Tunagrahita = $this->request->getVar('Tunagrahita');
		// 	$Tunalaras = $this->request->getVar('Tunalaras');
		// 	$CacatKusta = $this->request->getVar('CacatKusta');
		// 	$CacatGanda = $this->request->getVar('CacatGanda');
		// 	$Dipasung = $this->request->getVar('Dipasung');
		// 	$PendTertinggi = $this->request->getVar('PendTertinggi');
		// 	$BrpThnPendDasar = $this->request->getVar('BrpThnPendDasar');
		// 	$PendSedangDiikuti = $this->request->getVar('PendSedangDiikuti');
		// 	$BrpKaliPelatihan = $this->request->getVar('BrpKaliPelatihan');
		// 	$BahasaDiRumah = $this->request->getVar('BahasaDiRumah');
		// 	$BahasaFormal = $this->request->getVar('BahasaFormal');
		// 	$KerjaBakti = $this->request->getVar('KerjaBakti');
		// 	$Siskamling = $this->request->getVar('Siskamling');
		// 	$PestaRakyat = $this->request->getVar('PestaRakyat');
		// 	$MenolongWargaMati = $this->request->getVar('MenolongWargaMati');
		// 	$MenolongWargaSakit = $this->request->getVar('MenolongWargaSakit');
		// 	$MenolongWargaKecelakaan = $this->request->getVar('MenolongWargaKecelakaan');
		// 	$PernahPelayananDesa = $this->request->getVar('PernahPelayananDesa');
		// 	$PelayananDesa = $this->request->getVar('PelayananDesa');
		// 	$PernahSaranKePihakDesa = $this->request->getVar('PernahSaranKePihakDesa');
		// 	$KeterbukaanDesa = $this->request->getVar('KeterbukaanDesa');
		// 	$TerjadiBencana = $this->request->getVar('TerjadiBencana');
		// 	$TerkenaBencana = $this->request->getVar('TerkenaBencana');
		// 	$MenerimaBantuanBencana = $this->request->getVar('MenerimaBantuanBencana');
		// 	$PenangananPsikologi = $this->request->getVar('PenangananPsikologi');
		// 	$TerUpload = $this->request->getVar('TerUpload');
		// 	$created_by = $this->request->getVar('created_by');
		// 	$created_at = $this->request->getVar('created_at');
		// 	$updated_by = $this->request->getVar('updated_by');
		// 	$updated_at = $this->request->getVar('updated_at');

		// $validation = \Config\Services::validation();

		// $doValid = $this->validate([
		// 	'RW' => [
		// 		'label' => 'RW',
		// 		'rules' => 'required',
		// 		'errors' => [
		// 			'required' => '{field} harus diisi!',
		// 		]
		// 	],
		// 	'RT' => [
		// 		'label' => 'RT',
		// 		'rules' => 'required',
		// 		'errors' => [
		// 			'required' => '{field} harus diisi!',
		// 		]
		// 	],
		// 	'NoKK' => [
		// 		'label' => 'NoKK',
		// 		'rules' => 'required',
		// 		'errors' => [
		// 			'required' => '{field} harus diisi!',
		// 		]
		// 	],
		// 	'NIK' => [
		// 		'label' => 'NIK',
		// 		'rules' => 'required|is_unique[individu_data.NIK]',
		// 		'errors' => [
		// 			'required' => '{field} harus diisi',
		// 			'is_unique' => '{field} sudah terdaftar',
		// 		]
		// 	],
		// ]);

		// if (!$doValid) {
		// 	$msg = [
		// 		'error' => [
		// 			'errorRW' => $validation->getError('RW'),
		// 			'errorRT' => $validation->getError('RT'),
		// 			'errorNoKK' => $validation->getError('NoKK'),
		// 			'errorNIK' => $validation->getError('NIK'),
		// 		]
		// 	];
		// }
		// echo json_encode($msg);
		$data = [];
	}
	// }

	public function tambah()
	{
		if ($this->request->isAJAX()) {
			$data = [
				'title' => 'Form. Tambah Saldo',
				'modTtlIn' => 'Catat Masuk Uang',

			];
			return view('kas/formtambah', $data);
		} else {
			echo view('denied');
			exit;
		}
	}

	function delete()
	{
		if ($this->request->isAJAX()) {
			$id = $this->request->getVar('id');

			$this->Individu->delete($id);

			$msg = [
				'sukses' => 'Data berhasil dihapus'
			];
			echo json_encode($msg);
		} else {
			echo view('denied');
			exit;
		}
	}
}
