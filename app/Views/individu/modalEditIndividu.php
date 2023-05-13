<!-- Modal -->
<div class="modal fade editIndividu" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="content">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-10">
                            <div class="col-12 col-sm-12 col-md-12">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="individu-tab" data-bs-toggle="tab" data-bs-target="#individu" type="button" role="tab" aria-controls="individu" aria-selected="true">Individu</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pekerjaan-tab" data-bs-toggle="tab" data-bs-target="#pekerjaan" type="button" role="tab" aria-controls="pekerjaan" aria-selected="false">Pekerjaan</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="hasil-tab" data-bs-toggle="tab" data-bs-target="#hasil" type="button" role="tab" aria-controls="hasil" aria-selected="false">Penghasilan</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="sehat-tab" data-bs-toggle="tab" data-bs-target="#sehat" type="button" role="tab" aria-controls="sehat" aria-selected="false">Kesehatan</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="disabil-tab" data-bs-toggle="tab" data-bs-target="#disabil" type="button" role="tab" aria-controls="disabil" aria-selected="false">Disabilitas</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="didik-tab" data-bs-toggle="tab" data-bs-target="#didik" type="button" role="tab" aria-controls="didik" aria-selected="false">Pendidikan</button>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-12 mt-2">
                                <div class="tab-content" id="myTabContent">
                                    <div class="card bg-gradient-blue">
                                        <div class="col-12 col-sm-12 col-md-10">
                                            <div class="input-group input-group-sm my-1">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Desa</span>
                                                <select name="desa_id" id="desa_id" class="form-control form-control-sm">
                                                    <option value="2006" selected>Pasirlangu</option>
                                                    <?php foreach ($desKels as $row) { ?>
                                                        <option value="<?= $row['kd_desa']; ?>"><?= $row['nm_desa']; ?></option>
                                                    <?php } ?>
                                                </select>
                                                <span class="input-group-text" id="inputGroup-sizing-sm">No.RW</span>
                                                <select name="no_rw" id="no_rw" class="form-control input-lg">
                                                    <option value="">-Pilih-</option>
                                                    <?php
                                                    foreach ($Rw as $row) {
                                                        echo '<option value="' . $row["no_rw"] . '">' . $row["no_rw"] . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                                <span class="input-group-text" id="inputGroup-sizing-sm">No.RT</span>
                                                <select name="no_rt" id="no_rt" class="form-control input-lg">
                                                    <option value="">-Pilih-</option>
                                                </select>
                                            </div>
                                            <div class="input-group input-group-sm mb-1">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">No. KK</span>
                                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="no_kk" id="no_kk">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">NIK</span>
                                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="no_ktp" id="no_ktp">
                                            </div>
                                            <div class="input-group input-group-sm mb-1">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Nama Lengkap</span>
                                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="nama_lengkap" id="nama_lengkap">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade show active" id="individu" role="tabpanel" aria-labelledby="individu-tab">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row mb-1">
                                                    <label for="jenis_kelamin" class="col-5 col-sm-4 col-md-2 col-form-label col-form-label-sm">Jenis Kelamin</label>
                                                    <div class="col-7 col-sm-8 col-md-10">
                                                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control form-control-sm">
                                                            <option value="">-Pilih-</option>
                                                            <option value="1">Laki-laki</option>
                                                            <option value="2">Perempuan</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label for="tempat_lahir" class="col-5 col-sm-4 col-md-2 col-form-label col-form-label-sm">Tempat Lahir</label>
                                                    <div class="col-7 col-sm-8 col-md-10">
                                                        <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control form-control-sm">
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label for="tgl_lahir" class="col-5 col-sm-4 col-md-2 col-form-label col-form-label-sm">Tanggal Lahir</label>
                                                    <div class="col-7 col-sm-8 col-md-10">
                                                        <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control form-control-sm">
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label for="status_kawin" class="col-5 col-sm-4 col-md-2 col-form-label col-form-label-sm">Status Pernikahan</label>
                                                    <div class="col-7 col-sm-8 col-md-10">
                                                        <select name="status_kawin" id="status_kawin" class="form-control form-control-sm">
                                                            <option value="">-Pilih-</option>
                                                            <option value="1">Belum Kawin</option>
                                                            <option value="2">Kawin</option>
                                                            <option value="3">Cerai Hidup</option>
                                                            <option value="4">Cerai Mati</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label for="UsiaSaatNikah" class="col-5 col-sm-4 col-md-2 col-form-label col-form-label-sm">Usia saat Nikah</label>
                                                    <div class="col-7 col-sm-8 col-md-10">
                                                        <input type="text" name="UsiaSaatNikah" id="UsiaSaatNikah" class="form-control form-control-sm">
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label for="agama_id" class="col-5 col-sm-4 col-md-2 col-form-label col-form-label-sm">Agama</label>
                                                    <div class="col-7 col-sm-8 col-md-10">
                                                        <select name="agama_id" id="agama_id" class="form-control form-control-sm">
                                                            <option value="">-Pilih-</option>
                                                            <option value="1">Islam</option>
                                                            <option value="2">Kristen</option>
                                                            <option value="3">Katolik</option>
                                                            <option value="4">Hindu</option>
                                                            <option value="5">Budha</option>
                                                            <option value="6">Khonghucu</option>
                                                            <option value="7">Lainnya</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label for="suku_bangsa" class="col-5 col-sm-4 col-md-2 col-form-label col-form-label-sm">Suku Bangsa</label>
                                                    <div class="col-7 col-sm-8 col-md-10">
                                                        <input type="text" name="suku_bangsa" id="suku_bangsa" class="form-control form-control-sm">
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label for="warga_negara" class="col-5 col-sm-4 col-md-2 col-form-label col-form-label-sm">Warga Negara</label>
                                                    <div class="col-7 col-sm-8 col-md-10">
                                                        <select name="warga_negara" id="warga_negara" class="form-control form-control-sm">
                                                            <option value="">-Pilih-</option>
                                                            <option value="1">WNI</option>
                                                            <option value="2">WNA</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label for="no_hape" class="col-5 col-sm-4 col-md-2 col-form-label col-form-label-sm">No. HP</label>
                                                    <div class="col-7 col-sm-8 col-md-10">
                                                        <input type="text" name="no_hape" id="no_hape" class="form-control form-control-sm">
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label for="no_wa" class="col-5 col-sm-4 col-md-2 col-form-label col-form-label-sm">No. WA</label>
                                                    <div class="col-7 col-sm-8 col-md-10">
                                                        <input type="text" name="no_wa" id="no_wa" class="form-control form-control-sm">
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label for="email_id" class="col-5 col-sm-4 col-md-2 col-form-label col-form-label-sm">Email</label>
                                                    <div class="col-7 col-sm-8 col-md-10">
                                                        <input type="text" name="email_id" id="email_id" class="form-control form-control-sm">
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label for="fb_id" class="col-5 col-sm-4 col-md-2 col-form-label col-form-label-sm">Facebook</label>
                                                    <div class="col-7 col-sm-8 col-md-10">
                                                        <input type="text" name="fb_id" id="fb_id" class="form-control form-control-sm">
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label for="twitter_id" class="col-5 col-sm-4 col-md-2 col-form-label col-form-label-sm">Twitter</label>
                                                    <div class="col-7 col-sm-8 col-md-10">
                                                        <input type="text" name="twitter_id" id="twitter_id" class="form-control form-control-sm">
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label for="ig_id" class="col-5 col-sm-4 col-md-2 col-form-label col-form-label-sm">Instagram</label>
                                                    <div class="col-7 col-sm-8 col-md-10">
                                                        <input type="text" name="ig_id" id="ig_id" class="form-control form-control-sm">
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label for="aktif_internet" class="col-5 col-sm-4 col-md-2 col-form-label col-form-label-sm">Apakah Aktif Menggunakan Internet sebulan terakhir</label>
                                                    <div class="col-7 col-sm-8 col-md-10">
                                                        <select name="aktif_internet" id="aktif_internet" class="form-control form-control-sm">
                                                            <option value="">-Pilih-</option>
                                                            <option value="1">Ya</option>
                                                            <option value="2">Tidak</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pekerjaan" role="tabpanel" aria-labelledby="pekerjaan-tab">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row mb-1">
                                                    <label for="kondisi_pekerjaan" class="col-4 col-sm-2 col-form-label col-form-label-sm">Kond. Pekerjaan</label>
                                                    <div class="col-8 col-sm-10">
                                                        <select name="kondisi_pekerjaan" id="kondisi_pekerjaan" class="form-control form-control-sm">
                                                            <option value="">-Pilih-</option>
                                                            <option value="1">Bersekolah</option>
                                                            <option value="2">Ibu Rumah Tangga</option>
                                                            <option value="3">Tidak Bekerja</option>
                                                            <option value="4">Sedang Mencari Pekerjaan</option>
                                                            <option value="5">Bekerja</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label for="pekerjaan_utama" class="col-4 col-sm-2 col-form-label col-form-label-sm">Pekerjaan Utama</label>
                                                    <div class="col-8 col-sm-10">
                                                        <select name="pekerjaan_utama" id="pekerjaan_utama" class="form-control form-control-sm">
                                                            <option value="">-Pilih-</option>
                                                            <?php foreach ($kerja as $row) {
                                                                echo '<option value="' . $row["id_pekerjaan"] . '">' . $row["nm_pekerjaan"] . '</option>';
                                                            } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label for="jam_sos" class="col-4 col-sm-2 col-form-label col-form-label-sm">Jaminan Sosial</label>
                                                    <div class="col-8 col-sm-10">
                                                        <select name="jam_sos" id="jam_sos" class="form-control form-control-sm">
                                                            <option value="">-Pilih-</option>
                                                            <option value="1">Peserta</option>
                                                            <option value="2">Bukan Peserta</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label for="hasil_satu_tahun" class="col-4 col-sm-2 col-form-label col-form-label-sm">Penghasilan setahun terakhir</label>
                                                    <div class="col-8 col-sm-10">
                                                        <input type="text" name="hasil_satu_tahun" id="hasil_satu_tahun" class="form-control form-control-sm">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="hasil" role="tabpanel" aria-labelledby="hasil-tab">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row mb-1">
                                                    <label for="sumber_penghasilan" class="col-5 col-sm-2 col-form-label col-form-label-sm">Sumber Penghasilan</label>
                                                    <div class="col-7 col-sm-10">
                                                        <select name="sumber_penghasilan" id="sumber_penghasilan" class="form-control form-control-sm">
                                                            <option value="">-Pilih-</option>
                                                            <?php foreach ($sumberHasil as $row) {

                                                                echo '<option value="' . $row['id'] . '">' . $row['nm_sumber'] . '</option>';
                                                            } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label for="jml_hasil" class="col-5 col-sm-2 col-form-label col-form-label-sm">Jumlah</label>
                                                    <div class="col-7 col-sm-10">
                                                        <input type="text" name="jml_hasil" id="jml_hasil" class="form-control form-control-sm">
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label for="satuan_hasil" class="col-5 col-sm-2 col-form-label col-form-label-sm">Satuan</label>
                                                    <div class="col-7 col-sm-10">
                                                        <select name="satuan_hasil" id="satuan_hasil" class="form-control form-control-sm">
                                                            <option value="">-Pilih-</option>
                                                            <?php foreach ($satuan as $row) {
                                                                echo '<option value="' . $row['id'] . '">' . $row['nm_satuan'] . '</option>';
                                                            } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label for="hsl_satu_thn" class="col-5 col-sm-2 col-form-label col-form-label-sm">Penghasilan setahun</label>
                                                    <div class="col-7 col-sm-10">
                                                        <input type="text" name="hsl_satu_thn" id="hsl_satu_thn" class="form-control form-control-sm">
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label for="diekspor" class="col-5 col-sm-2 col-form-label col-form-label-sm">Diekspor</label>
                                                    <div class="col-7 col-sm-10">
                                                        <select name="diekspor" id="diekspor" class="form-control form-control-sm">
                                                            <option value="">Tidak</option>
                                                            <option value="1">Semua</option>
                                                            <option value="2">Sebagian Besar</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="sehat" role="tabpanel" aria-labelledby="sehat-tab">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row mb-1">
                                                    <label for="muntaber" class="col-8 col-sm-4 col-form-label col-form-label-sm">Muntaber</label>
                                                    <div class="col-4 col-sm-8">
                                                        <select name="muntaber" id="muntaber" class="form-control form-control-sm">
                                                            <option value="">Tidak</option>
                                                            <option value="1">Ya</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label for="demam_berdarah" class="col-8 col-sm-4 col-form-label col-form-label-sm">Demam Berdarah</label>
                                                    <div class="col-4 col-sm-8">
                                                        <select name="demam_berdarah" id="demam_berdarah" class="form-control form-control-sm">
                                                            <option value="">Tidak</option>
                                                            <option value="1">Ya</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label for="campak" class="col-8 col-sm-4 col-form-label col-form-label-sm">Campak</label>
                                                    <div class="col-4 col-sm-8">
                                                        <select name="campak" id="campak" class="form-control form-control-sm">
                                                            <option value="">Tidak</option>
                                                            <option value="1">Ya</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label for="malaria" class="col-8 col-sm-4 col-form-label col-form-label-sm">Malaria</label>
                                                    <div class="col-4 col-sm-8">
                                                        <select name="malaria" id="malaria" class="form-control form-control-sm">
                                                            <option value="">Tidak</option>
                                                            <option value="1">Ya</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label for="flu_burung" class="col-8 col-sm-4 col-form-label col-form-label-sm">Flue Burung</label>
                                                    <div class="col-4 col-sm-8">
                                                        <select name="flu_burung" id="flu_burung" class="form-control form-control-sm">
                                                            <option value="">Tidak</option>
                                                            <option value="1">Ya</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label for="covid_19" class="col-8 col-sm-4 col-form-label col-form-label-sm">Covid-19</label>
                                                    <div class="col-4 col-sm-8">
                                                        <select name="covid_19" id="covid_19" class="form-control form-control-sm">
                                                            <option value="">Tidak</option>
                                                            <option value="1">Ya</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label for="hepatitis_b" class="col-8 col-sm-4 col-form-label col-form-label-sm">Hepatitis B</label>
                                                    <div class="col-4 col-sm-8">
                                                        <select name="hepatitis_b" id="hepatitis_b" class="form-control form-control-sm">
                                                            <option value="">Tidak</option>
                                                            <option value="1">Ya</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label for="leptospirosis" class="col-8 col-sm-4 col-form-label col-form-label-sm">Leptospirosis</label>
                                                    <div class="col-4 col-sm-8">
                                                        <select name="leptospirosis" id="leptospirosis" class="form-control form-control-sm">
                                                            <option value="">Tidak</option>
                                                            <option value="1">Ya</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label for="kolera" class="col-8 col-sm-4 col-form-label col-form-label-sm">Kolera</label>
                                                    <div class="col-4 col-sm-8">
                                                        <select name="kolera" id="kolera" class="form-control form-control-sm">
                                                            <option value="">Tidak</option>
                                                            <option value="1">Ya</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label for="gizi_burunk_stunting" class="col-8 col-sm-4 col-form-label col-form-label-sm">Gizi buru (termasuk stunting)</label>
                                                    <div class="col-4 col-sm-8">
                                                        <select name="gizi_burunk_stunting" id="gizi_burunk_stunting" class="form-control form-control-sm">
                                                            <option value="">Tidak</option>
                                                            <option value="1">Ya</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label for="jantung" class="col-8 col-sm-4 col-form-label col-form-label-sm">Jantung</label>
                                                    <div class="col-4 col-sm-8">
                                                        <select name="jantung" id="jantung" class="form-control form-control-sm">
                                                            <option value="">Tidak</option>
                                                            <option value="1">Ya</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label for="tbc_paru_paru" class="col-8 col-sm-4 col-form-label col-form-label-sm">TBC paru-paru</label>
                                                    <div class="col-4 col-sm-8">
                                                        <select name="tbc_paru_paru" id="tbc_paru_paru" class="form-control form-control-sm">
                                                            <option value="">Tidak</option>
                                                            <option value="1">Ya</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label for="kanker" class="col-8 col-sm-4 col-form-label col-form-label-sm">Kanker</label>
                                                    <div class="col-4 col-sm-8">
                                                        <select name="kanker" id="kanker" class="form-control form-control-sm">
                                                            <option value="">Tidak</option>
                                                            <option value="1">Ya</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label for="diabetes" class="col-8 col-sm-4 col-form-label col-form-label-sm">Diabetes/kencing manis/gula</label>
                                                    <div class="col-4 col-sm-8">
                                                        <select name="diabetes" id="diabetes" class="form-control form-control-sm">
                                                            <option value="">Tidak</option>
                                                            <option value="1">Ya</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label for="hepatitis_e" class="col-8 col-sm-4 col-form-label col-form-label-sm">Hepatitis E</label>
                                                    <div class="col-4 col-sm-8">
                                                        <select name="hepatitis_e" id="hepatitis_e" class="form-control form-control-sm">
                                                            <option value="">Tidak</option>
                                                            <option value="1">Ya</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label for="difteri" class="col-8 col-sm-4 col-form-label col-form-label-sm">Difteri</label>
                                                    <div class="col-4 col-sm-8">
                                                        <select name="difteri" id="difteri" class="form-control form-control-sm">
                                                            <option value="">Tidak</option>
                                                            <option value="1">Ya</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label for="chikungunya" class="col-8 col-sm-4 col-form-label col-form-label-sm">Chikungunya</label>
                                                    <div class="col-4 col-sm-8">
                                                        <select name="chikungunya" id="chikungunya" class="form-control form-control-sm">
                                                            <option value="">Tidak</option>
                                                            <option value="1">Ya</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label for="lumpuh" class="col-8 col-sm-4 col-form-label col-form-label-sm">Lumpuh</label>
                                                    <div class="col-4 col-sm-8">
                                                        <select name="lumpuh" id="lumpuh" class="form-control form-control-sm">
                                                            <option value="">Tidak</option>
                                                            <option value="1">Ya</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label for="sakit_lain" class="col-8 col-sm-4 col-form-label col-form-label-sm">Lainnya</label>
                                                    <div class="col-4 col-sm-8">
                                                        <select name="sakit_lain" id="sakit_lain" class="form-control form-control-sm">
                                                            <option value="">Tidak</option>
                                                            <option value="1">Ya</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row my-3">
                                                    <label for="">Berapa kali fasilitas kesehatan berikut didatangi setahun terakhir untuk pengobatan/perawatan</label>
                                                </div>
                                                <div class="row mb-1">
                                                    <label for="rs_x" class="col-8 col-sm-4 col-form-label col-form-label-sm">Rumah Sakit</label>
                                                    <div class="col-4 col-sm-8">
                                                        <input type="number" name="rs_x" id="rs_x" class="form-control form-control-sm">
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label for="rsb_x" class="col-8 col-sm-4 col-form-label col-form-label-sm">Rumah Sakit Bersalin</label>
                                                    <div class="col-4 col-sm-8">
                                                        <input type="number" name="rsb_x" id="rsb_x" class="form-control form-control-sm">
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label for="puskesmas_inap_x" class="col-8 col-sm-4 col-form-label col-form-label-sm">Puskesmas dgn rawat inap</label>
                                                    <div class="col-4 col-sm-8">
                                                        <input type="number" name="puskesmas_inap_x" id="puskesmas_inap_x" class="form-control form-control-sm">
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label for="puskesmas_noinap_x" class="col-8 col-sm-4 col-form-label col-form-label-sm">Puskesmas tanpa rawat inap</label>
                                                    <div class="col-4 col-sm-8">
                                                        <input type="number" name="puskesmas_noinap_x" id="puskesmas_noinap_x" class="form-control form-control-sm">
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label for="puskesmas_pembantu_x" class="col-8 col-sm-4 col-form-label col-form-label-sm">Puskesmas Pembantu</label>
                                                    <div class="col-4 col-sm-8">
                                                        <input type="number" name="puskesmas_pembantu_x" id="puskesmas_pembantu_x" class="form-control form-control-sm">
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label for="poliklinik_x" class="col-8 col-sm-4 col-form-label col-form-label-sm">Poliklinik</label>
                                                    <div class="col-4 col-sm-8">
                                                        <input type="number" name="poliklinik_x" id="poliklinik_x" class="form-control form-control-sm">
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label for="praktik_dokter_x" class="col-8 col-sm-4 col-form-label col-form-label-sm">Tempat Praktik Dokter</label>
                                                    <div class="col-4 col-sm-8">
                                                        <input type="number" name="praktik_dokter_x" id="praktik_dokter_x" class="form-control form-control-sm">
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label for="rb_x" class="col-8 col-sm-4 col-form-label col-form-label-sm">Rumah Bersalin</label>
                                                    <div class="col-4 col-sm-8">
                                                        <input type="number" name="rb_x" id="rb_x" class="form-control form-control-sm">
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label for="praktik_bidak_x" class="col-8 col-sm-4 col-form-label col-form-label-sm">Tempat Praktik Bidan</label>
                                                    <div class="col-4 col-sm-8">
                                                        <input type="number" name="praktik_bidak_x" id="praktik_bidak_x" class="form-control form-control-sm">
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label for="poskesdes_x" class="col-8 col-sm-4 col-form-label col-form-label-sm">Poskesdes</label>
                                                    <div class="col-4 col-sm-8">
                                                        <input type="number" name="poskesdes_x" id="poskesdes_x" class="form-control form-control-sm">
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label for="polindes_x" class="col-8 col-sm-4 col-form-label col-form-label-sm">Polindes</label>
                                                    <div class="col-4 col-sm-8">
                                                        <input type="number" name="polindes_x" id="polindes_x" class="form-control form-control-sm">
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label for="apotik_x" class="col-8 col-sm-4 col-form-label col-form-label-sm">Apotik</label>
                                                    <div class="col-4 col-sm-8">
                                                        <input type="number" name="apotik_x" id="apotik_x" class="form-control form-control-sm">
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label for="jamu_x" class="col-8 col-sm-4 col-form-label col-form-label-sm">Toko khusus obat/jamu</label>
                                                    <div class="col-4 col-sm-8">
                                                        <input type="number" name="jamu_x" id="jamu_x" class="form-control form-control-sm">
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label for="posyandu_x" class="col-8 col-sm-4 col-form-label col-form-label-sm">Posyandu</label>
                                                    <div class="col-4 col-sm-8">
                                                        <input type="number" name="posyandu_x" id="posyandu_x" class="form-control form-control-sm">
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label for="posbindu_x" class="col-8 col-sm-4 col-form-label col-form-label-sm">Posbindu</label>
                                                    <div class="col-4 col-sm-8">
                                                        <input type="number" name="posbindu_x" id="posbindu_x" class="form-control form-control-sm">
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label for="dukun_bersalin_x" class="col-8 col-sm-4 col-form-label col-form-label-sm">Tempat Praktik Dukun Bayi/Bersalin</label>
                                                    <div class="col-4 col-sm-8">
                                                        <input type="number" name="dukun_bersalin_x" id="dukun_bersalin_x" class="form-control form-control-sm">
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label for="jam_sos_kes" class="col-8 col-sm-4 col-form-label col-form-label-sm">Jaminan Sosial Kesehatan</label>
                                                    <div class="col-4 col-sm-8">
                                                        <select name="jam_sos_kes" id="jam_sos_kes" class="form-control form-control-sm">
                                                            <option value="">Bukan Peserta</option>
                                                            <option value="1">Peserta</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label for="asi_bayi_sd_6bln" class="col-8 col-sm-4 col-form-label col-form-label-sm">Apakah bayi Bapak/Ibu memperoleh ASI ekslusif (pada usia 1-6 bulan hanya mengkonsumsi ASI saja)?</label>
                                                    <div class="col-4 col-sm-8">
                                                        <select name="asi_bayi_sd_6bln" id="asi_bayi_sd_6bln" class="form-control form-control-sm">
                                                            <option value="">Tidak</option>
                                                            <option value="1">Ya</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="disabil" role="tabpanel" aria-labelledby="disabil-tab">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row mb-1">
                                                    <label for="tunanetra" class="col-7 col-sm-5 col-md-3 col-form-label col-form-label-sm">Tunanetra</label>
                                                    <div class="col-5 col-sm-7 col-md-9">
                                                        <select name="tunanetra" id="tunanetra" class="form-control form-control-sm">
                                                            <option value="">Tidak</option>
                                                            <option value="1">Ya</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label for="tunarungu" class="col-7 col-sm-5 col-md-3 col-form-label col-form-label-sm">Tunarungu (tuli)</label>
                                                    <div class="col-5 col-sm-7 col-md-9">
                                                        <select name="tunarungu" id="tunarungu" class="form-control form-control-sm">
                                                            <option value="">Tidak</option>
                                                            <option value="1">Ya</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label for="tunawicara" class="col-7 col-sm-5 col-md-3 col-form-label col-form-label-sm">Tunawicara (bisu)</label>
                                                    <div class="col-5 col-sm-7 col-md-9">
                                                        <select name="tunawicara" id="tunawicara" class="form-control form-control-sm">
                                                            <option value="">Tidak</option>
                                                            <option value="1">Ya</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label for="tunarungu_wicara" class="col-7 col-sm-5 col-md-3 col-form-label col-form-label-sm">Tunarungu-wicara (bisu-tuli)</label>
                                                    <div class="col-5 col-sm-7 col-md-9">
                                                        <select name="tunarungu_wicara" id="tunarungu_wicara" class="form-control form-control-sm">
                                                            <option value="">Tidak</option>
                                                            <option value="1">Ya</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label for="tunadaksa" class="col-7 col-sm-5 col-md-3 col-form-label col-form-label-sm">Tunadaksa (cacat tubuh)</label>
                                                    <div class="col-5 col-sm-7 col-md-9">
                                                        <select name="tunadaksa" id="tunadaksa" class="form-control form-control-sm">
                                                            <option value="">Tidak</option>
                                                            <option value="1">Ya</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label for="tunagrahita" class="col-7 col-sm-5 col-md-3 col-form-label col-form-label-sm">Tunagrahita (cacat mental)</label>
                                                    <div class="col-5 col-sm-7 col-md-9">
                                                        <select name="tunagrahita" id="tunagrahita" class="form-control form-control-sm">
                                                            <option value="">Tidak</option>
                                                            <option value="1">Ya</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label for="tunalaras" class="col-7 col-sm-5 col-md-3 col-form-label col-form-label-sm">Tunalaras (eks sakit jiwa)</label>
                                                    <div class="col-5 col-sm-7 col-md-9">
                                                        <select name="tunalaras" id="tunalaras" class="form-control form-control-sm">
                                                            <option value="">Tidak</option>
                                                            <option value="1">Ya</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label for="kusta" class="col-7 col-sm-5 col-md-3 col-form-label col-form-label-sm">Cacat eks-sakit kusta</label>
                                                    <div class="col-5 col-sm-7 col-md-9">
                                                        <select name="kusta" id="kusta" class="form-control form-control-sm">
                                                            <option value="">Tidak</option>
                                                            <option value="1">Ya</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label for="cacat_ganda" class="col-7 col-sm-5 col-md-3 col-form-label col-form-label-sm">Cacat ganda (fisik+mental)</label>
                                                    <div class="col-5 col-sm-7 col-md-9">
                                                        <select name="cacat_ganda" id="cacat_ganda" class="form-control form-control-sm">
                                                            <option value="">Tidak</option>
                                                            <option value="1">Ya</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label for="dipasung" class="col-7 col-sm-5 col-md-3 col-form-label col-form-label-sm">Dipasung</label>
                                                    <div class="col-5 col-sm-7 col-md-9">
                                                        <select name="dipasung" id="dipasung" class="form-control form-control-sm">
                                                            <option value="">Tidak</option>
                                                            <option value="1">Ya</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="didik" role="tabpanel" aria-labelledby="didik-tab">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row mb-1">
                                                    <label for="pendidikan_tinggi" class="col-5 col-sm-4 col-form-label col-form-label-sm">Pendidikan Tertinggi</label>
                                                    <div class="col-7 col-sm-8 ">
                                                        <select name="pendidikan_tinggi" id="pendidikan_tinggi" class="form-control form-control-sm">
                                                            <option value="">-Pilih-</option>
                                                            <?php foreach ($pendidikan as $row) {
                                                                echo                                                    '<option value="' . $row['id'] . '">' . $row['nm_pendidikan'] . '</option>';
                                                            } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label for="lama_sd_smp_sma" class="col-8 col-sm-4 col-form-label col-form-label-sm">Berapa tahun mengenyam pendidikan dasar (SD,SMP,SMA)</label>
                                                    <div class="col-4 col-sm-8">
                                                        <input type="number" name="lama_sd_smp_sma" id="lama_sd_smp_sma" class="form-control form-control-sm" placeholder="jumlah">
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label for="sedang_pendidikan" class="col-5 col-sm-4 col-form-label col-form-label-sm">Pendidikan yang sedang diikuti</label>
                                                    <div class="col-7 col-sm-8 ">
                                                        <select name="sedang_pendidikan" id="sedang_pendidikan" class="form-control form-control-sm">
                                                            <option value="">-Pilih-</option>
                                                            <?php foreach ($pendidikan as $row) {
                                                                echo                                                    '<option value="' . $row['id'] . '">' . $row['nm_pendidikan'] . '</option>';
                                                            } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label for="bahasa_rumah" class="col-5 col-sm-4 col-form-label col-form-label-sm">Bahasa digunakan di rumah dan pemukiman</label>
                                                    <div class="col-7 col-sm-8 ">
                                                        <input type="text" name="bahasa_rumah" id="bahasa_rumah" class="form-control form-control-sm">
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label for="bahasa_lembaga" class="col-5 col-sm-4 col-form-label col-form-label-sm">Bahasa digunakan di lembaga formal</label>
                                                    <div class="col-7 col-sm-8 ">
                                                        <input type="text" name="bahasa_lembaga" id="bahasa_lembaga" class="form-control form-control-sm">
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label for="kerja_bakti" class="col-8 col-sm-4 col-form-label col-form-label-sm">Kerja bakti setahun terakhir</label>
                                                    <div class="col-4 col-sm-8">
                                                        <input type="number" name="kerja_bakti" id="kerja_bakti" class="form-control form-control-sm" placeholder="jumlah">
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label for="siskamling" class="col-8 col-sm-4 col-form-label col-form-label-sm">Siskamling setahun terakhir</label>
                                                    <div class="col-4 col-sm-8">
                                                        <input type="number" name="siskamling" id="siskamling" class="form-control form-control-sm" placeholder="jumlah">
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label for="pesta_rakyat" class="col-8 col-sm-4 col-form-label col-form-label-sm">Pesta Rakyat/Adat setahun terakhir</label>
                                                    <div class="col-4 col-sm-8">
                                                        <input type="number" name="pesta_rakyat" id="pesta_rakyat" class="form-control form-control-sm" placeholder="jumlah">
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label for="tolong_kematian" class="col-8 col-sm-4 col-form-label col-form-label-sm">Menolong warga yang mengalami kematian setahun terakhir</label>
                                                    <div class="col-4 col-sm-8">
                                                        <input type="number" name="tolong_kematian" id="tolong_kematian" class="form-control form-control-sm" placeholder="jumlah">
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label for="tolong_sakit" class="col-8 col-sm-4 col-form-label col-form-label-sm">Menolong warga yang sedang sakit setahun terakhir</label>
                                                    <div class="col-4 col-sm-8">
                                                        <input type="number" name="tolong_sakit" id="tolong_sakit" class="form-control form-control-sm" placeholder="jumlah">
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label for="tolong_sakit" class="col-8 col-sm-4 col-form-label col-form-label-sm">Menolong warga yang sedang sakit setahun terakhir</label>
                                                    <div class="col-4 col-sm-8">
                                                        <input type="number" name="tolong_sakit" id="tolong_sakit" class="form-control form-control-sm" placeholder="jumlah">
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label for="tolong_celaka" class="col-8 col-sm-4 col-form-label col-form-label-sm">Menolong warga yang kecelakaan setahun terakhir</label>
                                                    <div class="col-4 col-sm-8">
                                                        <input type="number" name="tolong_celaka" id="tolong_celaka" class="form-control form-control-sm" placeholder="jumlah">
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label for="pelayanan_desa" class="col-8 col-sm-4 col-form-label col-form-label-sm">Dalam setahun terakhir pernah memperoleh pelayanan desa</label>
                                                    <div class="col-4 col-sm-8 ">
                                                        <select name="pelayanan_desa" id="pelayanan_desa" class="form-control form-control-sm">
                                                            <option value="">Tidak</option>
                                                            <option value="1">Ya</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label for="saran_desa" class="col-8 col-sm-4 col-form-label col-form-label-sm">Dalam setahun terakhir apakah pernah menyampaikan masukan/saran kepada pihak desa</label>
                                                    <div class="col-4 col-sm-8 ">
                                                        <select name="saran_desa" id="saran_desa" class="form-control form-control-sm">
                                                            <option value="">Tidak</option>
                                                            <option value="1">Ya</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label for="bencana" class="col-8 col-sm-4 col-form-label col-form-label-sm">Dalam setahun terakhir apakah terjadi bencana</label>
                                                    <div class="col-4 col-sm-8 ">
                                                        <select name="bencana" id="bencana" class="form-control form-control-sm">
                                                            <option value="">Tidak</option>
                                                            <option value="1">Ya</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">
                                        Kirim
                                    </button>
                                    <br>
                                    <p for="" style="font-size: 90%;" class="font-italic text-danger">
                                        *Lengkapi seluruh data baru klik tombol Kirim
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>