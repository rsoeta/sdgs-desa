<?php

namespace App\Models;

use CodeIgniter\Model;

class IndividuModel extends Model
{
    protected $table      = 'individu_data';
    protected $primaryKey = 'ID';

    protected $allowedFields = ['Negara', 'Provinsi', 'Kabupaten', 'Kecamatan', 'Desa', 'RW', 'RT', 'NoKK', 'NIK', 'Nama', 'JenisKelamin', 'TempatLahir', 'TglLahir', 'Status', 'UsiaSaatNikah', 'Agama', 'SukuBangsa', 'WargaNegara', 'NoHP', 'NoWA', 'Email', 'Facebook', 'Twitter', 'Instagram', 'AktifInternet', 'AksesInternet', 'KecepatanInternet', 'KondisiPekerjaan', 'PekerjaanUtama', 'JaminanSosial', 'PenghasilanSetahun', 'Sumber', 'SebutanSumberLain', 'Jumlah', 'Satuan', 'PenghasilanSetahunPenghasilan', 'Diekspor', 'Muntaber', 'DemamBerdarah', 'Campak', 'Malaria', 'FlueBurung', 'Covid19', 'HepatitisB', 'Leptospirosis', 'Kolera', 'GiziBuruk', 'Jantung', 'TBCParu2', 'Kanker', 'Diabetes', 'HepatitisE', 'Difteri', 'Chikungunya', 'Lumpuh', 'Lainnya', 'SebutanPenyakit', 'RSDidatangi', 'RSBersalinDidatangi', 'PuskesmasRIDidatangi', 'PuskesmasTanpaRIDidatangi', 'PuskesmasPembantuDidatangi', 'PoliklinikDidatangi', 'PraktikDokterDidatangi', 'RumahBersalinDidatangi', 'PraktikBidanDidatangi', 'PoskesdesDidatangi', 'PolindesDidatangi', 'ApotikDidatangi', 'TokoKhususObatDidatangi', 'PosyanduDidatangi', 'PosbinduDidatangi', 'PraktikDukunDidatangi', 'JamsosKesehatan', 'MelahirkanSetahunTerakhir', 'AsiEkslusif', 'Tunanetra', 'Tunarungu', 'Tunawicara', 'Tunarunguwicara', 'Tunadaksa', 'Tunagrahita', 'Tunalaras', 'CacatKusta', 'CacatGanda', 'Dipasung', 'PendTertinggi', 'BrpThnPendDasar', 'PendSedangDiikuti', 'BrpKaliPelatihan', 'BahasaDiRumah', 'BahasaFormal', 'KerjaBakti', 'Siskamling', 'PestaRakyat', 'MenolongWargaMati', 'MenolongWargaSakit', 'MenolongWargaKecelakaan', 'PernahPelayananDesa', 'PelayananDesa', 'PernahSaranKePihakDesa', 'KeterbukaanDesa', 'TerjadiBencana', 'TerkenaBencana', 'MenerimaBantuanBencana', 'PenangananPsikologi', 'Keterangan', 'TerUpload', 'created_by', 'created_at', 'updated_by', 'updated_at'];

    var $column_order = array('', 'Nama', 'NIK', 'NoKK', 'RT', 'RW', 'TempatLahir', 'TglLahir', 'Keterangan', 'JenisKelamin',  'Status', 'UsiaSaatNikah', 'Agama', 'SukuBangsa', 'WargaNegara', 'NoHP', 'NoWA', 'Email', 'Facebook', 'Twitter', 'Instagram', 'AktifInternet', 'AksesInternet', 'KecepatanInternet', 'KondisiPekerjaan', 'PekerjaanUtama', 'JaminanSosial', 'PenghasilanSetahun', 'Sumber', 'SebutanSumberLain', 'Jumlah', 'Satuan', 'PenghasilanSetahunPenghasilan', 'Diekspor', 'Muntaber', 'DemamBerdarah', 'Campak', 'Malaria', 'FlueBurung', 'Covid19', 'HepatitisB', 'Leptospirosis', 'Kolera', 'GiziBuruk', 'Jantung', 'TBCParu2', 'Kanker', 'Diabetes', 'HepatitisE', 'Difteri', 'Chikungunya', 'Lumpuh', 'Lainnya', 'SebutanPenyakit', 'RSDidatangi', 'RSBersalinDidatangi', 'PuskesmasRIDidatangi', 'PuskesmasTanpaRIDidatangi', 'PuskesmasPembantuDidatangi', 'PoliklinikDidatangi', 'PraktikDokterDidatangi', 'RumahBersalinDidatangi', 'PraktikBidanDidatangi', 'PoskesdesDidatangi', 'PolindesDidatangi', 'ApotikDidatangi', 'TokoKhususObatDidatangi', 'PosyanduDidatangi', 'PosbinduDidatangi', 'PraktikDukunDidatangi', 'JamsosKesehatan', 'MelahirkanSetahunTerakhir', 'AsiEkslusif', 'Tunanetra', 'Tunarungu', 'Tunawicara', 'Tunarunguwicara', 'Tunadaksa', 'Tunagrahita', 'Tunalaras', 'CacatKusta', 'CacatGanda', 'Dipasung', 'PendTertinggi', 'BrpThnPendDasar', 'PendSedangDiikuti', 'BrpKaliPelatihan', 'BahasaDiRumah', 'BahasaFormal', 'KerjaBakti', 'Siskamling', 'PestaRakyat', 'MenolongWargaMati', 'MenolongWargaSakit', 'MenolongWargaKecelakaan', 'PernahPelayananDesa', 'PelayananDesa', 'PernahSaranKePihakDesa', 'KeterbukaanDesa', 'TerjadiBencana', 'TerkenaBencana', 'MenerimaBantuanBencana', 'PenangananPsikologi', 'Keterangan', 'TerUpload', 'created_by', 'created_at', 'updated_by', 'updated_at');

    var $order = array('ID' => 'asc');

    function get_datatables($desa, $operator, $rw, $rt, $keterangan)
    {
        // desa
        if ($desa == "") {
            $kondisi_desa = "";
        } else {
            $kondisi_desa = " AND Desa = '$desa'";
        }

        // status
        if ($operator == "") {
            $kondisi_operator = "";
        } else {
            $kondisi_operator = " AND created_by = '$operator'";
        }
        // rw
        if ($rw == "") {
            $kondisi_rw = "";
        } else {
            $kondisi_rw = " AND RW = '$rw'";
        }
        // rt
        if ($rt == "") {
            $kondisi_rt = "";
        } else {
            $kondisi_rt = " AND RT = '$rt'";
        }
        // keterangan
        if ($keterangan == "") {
            $kondisi_keterangan = "";
        } else {
            $kondisi_keterangan = " AND Keterangan = '$keterangan'";
        }

        // search
        if ($_POST['search']['value']) {
            $search = $_POST['search']['value'];
            $kondisi_search = "(Nama LIKE '%$search%' OR NoKK LIKE '%$search%' OR NIK LIKE '%$search%') $kondisi_desa $kondisi_operator $kondisi_rw $kondisi_rt $kondisi_keterangan";
        } else {
            $kondisi_search = "ID != '' $kondisi_desa $kondisi_operator $kondisi_rw $kondisi_rt $kondisi_keterangan";
        }

        // order
        if (isset($_POST['order'])) {
            $result_order = $this->column_order[$_POST['order']['0']['column']];
            $result_dir = $_POST['order']['0']['dir'];
        } else if ($this->order) {
            $order = $this->order;
            $result_order = key($order);
            $result_dir = $order[key($order)];
        }

        if ($_POST['length'] != -1);
        $db = db_connect();
        $builder = $db->table('individu_data');
        $query = $builder->select('*')
            ->join('tb_operator', 'tb_operator.UserID=individu_data.created_by')
            ->join('tb_keterangan', 'tb_keterangan.IDKeterangan=individu_data.Keterangan')
            // ->join('pekerjaan_kondisi_pekerjaan', 'pekerjaan_kondisi_pekerjaan.IDKondisi=individu_data.KondisiPekerjaan')
            // ->join('pendidikan_pend_tinggi', 'pendidikan_pend_tinggi.IDPendidikan=individu_data.PendTertinggi')
            // ->join('ket_verivali', 'ket_verivali.id_ketvv=individu_data.ket_verivali')
            ->where($kondisi_search)
            ->orderBy($result_order, $result_dir)
            ->limit($_POST['length'], $_POST['start'])
            ->get();

        return $query->getResult();
    }

    function jumlah_semua()
    {
        $sQuery = "SELECT COUNT(ID) as jml FROM individu_data";
        $db = db_connect();
        $query = $db->query($sQuery)->getRow();

        return $query;
    }

    function jumlah_filter($desa, $operator, $rw, $rt, $keterangan)
    {
        // desa
        if ($desa == "") {
            $kondisi_desa = "";
        } else {
            $kondisi_desa = " AND Desa = '$desa'";
        }

        // operator
        if ($operator == "") {
            $kondisi_operator = "";
        } else {
            $kondisi_operator = " AND created_by = '$operator'";
        }

        // rw
        if ($rw == "") {
            $kondisi_rw = "";
        } else {
            $kondisi_rw = " AND RW = '$rw'";
        }

        // rt
        if ($rt == "") {
            $kondisi_rt = "";
        } else {
            $kondisi_rt = " AND RT = '$rt'";
        }

        // keterangan
        if ($keterangan == "") {
            $kondisi_keterangan = "";
        } else {
            $kondisi_keterangan = " AND Keterangan = '$keterangan'";
        }

        // kondisi search
        if ($_POST['search']['value']) {
            $search = $_POST['search']['value'];
            $kondisi_search = "AND (Nama LIKE '%$search%' OR NoKK LIKE  '%$search%' OR NIK LIKE  '%$search%') $kondisi_desa $kondisi_operator $kondisi_rw $kondisi_rt $kondisi_keterangan";
        } else {
            $kondisi_search = "$kondisi_desa $kondisi_operator $kondisi_rw $kondisi_rt $kondisi_keterangan";
        }

        $sQuery = "SELECT COUNT(ID) as jml FROM individu_data WHERE ID != '' $kondisi_search";
        $db = db_connect();
        $query = $db->query($sQuery)->getRow();

        return $query;
    }

    public function tambah($data)
    {
        $this->db->table('tbl_masuk')->insert($data);
    }

    public function getCapaian()
    {
        $builder = $this->db->table('individu_data');
        // $builder->where('tb_target.UserID');
        $builder->join('tb_target', 'tb_target.UserID=individu_data.created_by');
        $builder->select('NamaPendata, COUNT("created_by") AS jumlah');
        // $builder->selectCount('created_by');
        // $builder->where('')
        // $builder->select('NamaPendata, count(*)');
        // $builder->select('(SELECT COUNT(individu_data.created_by) FROM individu_data WHERE individu_data.created_by=tb_target.UserID) AS jumlah', false);
        $builder->groupBy('tb_target.NamaPendata');
        $builder->orderBy('NamaPendata', 'asc');
        $query = $builder->get();

        return $query;
    }

    public function getFindAll()
    {
        $builder = $this->db->table('tbl_masuk');
        $builder->select('*');
        $builder->orderBy('tgl_masuk', 'desc');
        $query = $builder->get();

        return $query;
    }
}
