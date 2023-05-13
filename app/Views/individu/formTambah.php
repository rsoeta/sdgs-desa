<?= $this->extend('templates/index'); ?>
<?= $this->section('content'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <a href="#" class="ignielToTop"></a>
    <section class="content">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-10">
                <?php if (isset($validation)) : ?>
                    <div class="col-12 mt-2">
                        <div class="alert alert-danger" role="alert">
                            <?= $validation->listErrors(); ?>
                        </div>
                    </div>
                <?php endif;  ?>
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
                    <form action="individutmb" method="POST">
                        <?= csrf_field(); ?>
                        <div class="tab-content" id="myTabContent">
                            <div class="card bg-gradient-blue">
                                <div class="col-12 col-sm-12 col-md-10">
                                    <div class="input-group input-group-sm my-1">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Desa</span>
                                        <select name="Desa" id="Desa" class="form-control form-control-sm">
                                            <option value="">-Pilih-</option>
                                            <?php foreach ($desKels as $row) { ?>
                                                <option <?php if (session()->get('desa_id') == $row['KodeDesa']) {
                                                            echo 'selected';
                                                        } ?> value="<?= $row['KodeDesa']; ?>"><?= $row['NamaDesa']; ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                        <span class="input-group-text" id="inputGroup-sizing-sm">No.RW</span>
                                        <select name="RW" id="RW" class="form-control input-lg">
                                            <option value="">-Pilih-</option>
                                            <?php
                                            foreach ($Rws as $row) { ?>
                                                <option value="<?= $row['no_rw']; ?>" <?= set_select('RW', $row['no_rw']); ?>><?= $row['no_rw']; ?></option>
                                            <?php } ?>
                                        </select>
                                        <span class="input-group-text" id="inputGroup-sizing-sm">No.RT</span>
                                        <select name="RT" id="RT" class="form-control input-lg">
                                            <option value="">-Pilih-</option>
                                            <?php
                                            foreach ($Rts as $row) { ?>
                                                <option value="<?= $row['no_rt']; ?>" <?= set_select('RT', $row['no_rt']); ?>><?= $row['no_rt']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="input-group input-group-sm mb-1">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">No. KK</span>
                                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="NoKK" id="NoKK" value="<?= set_value('NoKK'); ?>">
                                        <div class="invalid-feedback errorNoKK" style="display: none;"></div>
                                        <span class="input-group-text" id="inputGroup-sizing-sm">NIK</span>
                                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="NIK" id="NIK" value="<?= set_value('NIK'); ?>">
                                        <div class="invalid-feedback errorNIK" style="display: none;"></div>
                                    </div>
                                    <div class="input-group input-group-sm mb-1">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Nama Lengkap</span>
                                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="Nama" id="Nama" value="<?= set_value('Nama'); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade show active" id="individu" role="tabpanel" aria-labelledby="individu-tab">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row mb-1">
                                            <label for="JenisKelamin" class="col-5 col-sm-4 col-md-3 col-form-label col-form-label-sm">Jenis Kelamin</label>
                                            <div class="col-7 col-sm-8 col-md-9">
                                                <select name="JenisKelamin" id="JenisKelamin" class="form-control form-control-sm">
                                                    <option value="">-Pilih-</option>
                                                    <?php
                                                    foreach ($JenKels as $row) { ?>
                                                        <option value="<?= $row['IdJenKel']; ?>" <?= set_select('JenisKelamin', $row['IdJenKel']); ?>><?= $row['NamaJenKel']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="TempatLahir" class="col-5 col-sm-4 col-md-3 col-form-label col-form-label-sm">Tempat Lahir</label>
                                            <div class="col-7 col-sm-8 col-md-9">
                                                <input type="text" name="TempatLahir" id="TempatLahir" class="form-control form-control-sm" value="<?= set_value('TempatLahir'); ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="TglLahir" class="col-5 col-sm-4 col-md-3 col-form-label col-form-label-sm">Tanggal Lahir</label>
                                            <div class="col-7 col-sm-8 col-md-9">
                                                <input type="date" name="TglLahir" id="TglLahir" class="form-control form-control-sm" value="<?= set_value('TglLahir'); ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="Status" class="col-5 col-sm-4 col-md-3 col-form-label col-form-label-sm">Status Pernikahan</label>
                                            <div class="col-7 col-sm-8 col-md-9">
                                                <select name="Status" id="Status" class="form-control form-control-sm">
                                                    <?php
                                                    foreach ($Statuses as $row) { ?>
                                                        <option value="<?= $row['IdStatus']; ?>" <?= set_select('Status', $row['IdStatus']); ?>><?= $row['NamaStatus']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-1 UsiaSaatNikah">
                                            <label for="UsiaSaatNikah" class="col-5 col-sm-4 col-md-3 col-form-label col-form-label-sm">Usia saat Nikah</label>
                                            <div class="col-7 col-sm-8 col-md-9">
                                                <input type="text" name="UsiaSaatNikah" id="UsiaSaatNikah" class="form-control form-control-sm" value="<?= set_value('UsiaSaatNikah'); ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="Agama" class="col-5 col-sm-4 col-md-3 col-form-label col-form-label-sm">Agama</label>
                                            <div class="col-7 col-sm-8 col-md-9">
                                                <select name="Agama" id="Agama" class="form-control form-control-sm">
                                                    <option value="">-Pilih-</option>
                                                    <?php
                                                    foreach ($Agamas as $row) { ?>
                                                        <option value="<?= $row['IdAgama']; ?>" <?= set_select('Agama', $row['IdAgama']); ?>><?= $row['NamaAgama']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="SukuBangsa" class="col-5 col-sm-4 col-md-3 col-form-label col-form-label-sm">Suku Bangsa</label>
                                            <div class="col-7 col-sm-8 col-md-9">
                                                <input type="text" name="SukuBangsa" id="SukuBangsa" class="form-control form-control-sm" value="<?= set_value('SukuBangsa'); ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="WargaNegara" class="col-5 col-sm-4 col-md-3 col-form-label col-form-label-sm">Warga Negara</label>
                                            <div class="col-7 col-sm-8 col-md-9">
                                                <select name="WargaNegara" id="WargaNegara" class="form-control form-control-sm">
                                                    <option value="">-Pilih-</option>
                                                    <?php
                                                    foreach ($WNs as $row) { ?>
                                                        <option value="<?= $row['IdWN']; ?>" <?= set_select('WargaNegara', $row['IdWN']); ?>><?= $row['NamaWN']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="NoHP" class="col-5 col-sm-4 col-md-3 col-form-label col-form-label-sm">No. HP</label>
                                            <div class="col-7 col-sm-8 col-md-9">
                                                <input type="text" name="NoHP" id="NoHP" class="form-control form-control-sm" value="<?= set_value('NoHP'); ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="NoWA" class="col-5 col-sm-4 col-md-3 col-form-label col-form-label-sm">No. WA</label>
                                            <div class="col-7 col-sm-8 col-md-9">
                                                <input type="text" name="NoWA" id="NoWA" class="form-control form-control-sm" value="<?= set_value('NoWA'); ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="Email" class="col-5 col-sm-4 col-md-3 col-form-label col-form-label-sm">Email</label>
                                            <div class="col-7 col-sm-8 col-md-9">
                                                <input type="text" name="Email" id="Email" class="form-control form-control-sm" value="<?= set_value('Email'); ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="Facebook" class="col-5 col-sm-4 col-md-3 col-form-label col-form-label-sm">Facebook</label>
                                            <div class="col-7 col-sm-8 col-md-9">
                                                <input type="text" name="Facebook" id="Facebook" class="form-control form-control-sm" value="<?= set_value('Facebook'); ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="Twitter" class="col-5 col-sm-4 col-md-3 col-form-label col-form-label-sm">Twitter</label>
                                            <div class="col-7 col-sm-8 col-md-9">
                                                <input type="text" name="Twitter" id="Twitter" class="form-control form-control-sm" value="<?= set_value('Twitter'); ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="Instagram" class="col-5 col-sm-4 col-md-3 col-form-label col-form-label-sm">Instagram</label>
                                            <div class="col-7 col-sm-8 col-md-9">
                                                <input type="text" name="Instagram" id="Instagram" class="form-control form-control-sm" value="<?= set_value('Instagram'); ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="AktifInternet" class="col-5 col-sm-4 col-md-3 col-form-label col-form-label-sm">Apakah Aktif Menggunakan Internet sebulan terakhir</label>
                                            <div class="col-7 col-sm-8 col-md-9">
                                                <select name="AktifInternet" id="AktifInternet" class="form-control form-control-sm">
                                                    <option value="" <?= set_select('AktifInternet', ''); ?>>Tidak</option>';
                                                    <option value="1" <?= set_select('AktifInternet', '1'); ?>>Ya</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-1 Aktif">
                                            <label for="AksesInternet" class="col-5 col-sm-4 col-md-3 col-form-label col-form-label-sm">Akses Internet yang diperoleh melalui</label>
                                            <div class="col-7 col-sm-8 col-md-9">
                                                <select name="AksesInternet" id="AksesInternet" class="form-control form-control-sm">
                                                    <?php
                                                    foreach ($AksesInternets as $row) { ?>
                                                        <option value="<?= $row['IDAkses']; ?>" <?= set_select('AksesInternet', $row['IDAkses']); ?>><?= $row['NamaAkses']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-1 Aktif">
                                            <label for="KecepatanInternet" class="col-5 col-sm-4 col-md-3 col-form-label col-form-label-sm">Kecepatan Akses Internet</label>
                                            <div class="col-7 col-sm-8 col-md-9">
                                                <select name="KecepatanInternet" id="KecepatanInternet" class="form-control form-control-sm">
                                                    <?php
                                                    foreach ($KecepatanInternets as $row) { ?>
                                                        <option value="<?= $row['IDKecepatan']; ?>" <?= set_select('KecepatanInternet', $row['IDKecepatan']); ?>><?= $row['NamaKecepatan']; ?></option>
                                                    <?php } ?>
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
                                            <label for="KondisiPekerjaan" class="col-4 col-sm-3 col-form-label col-form-label-sm">Kond. Pekerjaan</label>
                                            <div class="col-8 col-sm-9">
                                                <select name="KondisiPekerjaan" id="KondisiPekerjaan" class="form-control form-control-sm">
                                                    <option value="">-Pilih-</option>
                                                    <?php
                                                    foreach ($KondisiPekerjaans as $row) { ?>
                                                        <option value="<?= $row['IDKondisi']; ?>" <?= set_select('KondisiPekerjaan', $row['IDKondisi']); ?>><?= $row['NamaKondisi']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-1 hide-kerja">
                                            <label for="PekerjaanUtama" class="col-4 col-sm-3 col-form-label col-form-label-sm">Pekerjaan Utama</label>
                                            <div class="col-8 col-sm-9">
                                                <select name="PekerjaanUtama" id="PekerjaanUtama" class="form-control form-control-sm">
                                                    <option value="">-Pilih-</option>
                                                    <?php
                                                    foreach ($PekerjaanUtamas as $row) { ?>
                                                        <option value="<?= $row['id_pekerjaan']; ?>" <?= set_select('PekerjaanUtama', $row['id_pekerjaan']); ?>><?= $row['nm_pekerjaan']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-1 hide-kerja">
                                            <label for="JaminanSosial" class="col-4 col-sm-3 col-form-label col-form-label-sm">Jaminan Sosial</label>
                                            <div class="col-8 col-sm-9">
                                                <select name="JaminanSosial" id="JaminanSosial" class="form-control form-control-sm">
                                                    <option value="">-Pilih-</option>
                                                    <option value="1" <?= set_select('JaminanSosial', '1'); ?>>Peserta</option>
                                                    <option value="" <?= set_select('JaminanSosial', ''); ?>>Bukan Peserta</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-1 hide-kerja">
                                            <label for="PenghasilanSetahun" class="col-4 col-sm-3 col-form-label col-form-label-sm">Penghasilan setahun terakhir</label>
                                            <div class="col-8 col-sm-9">
                                                <input type="text" name="PenghasilanSetahun" id="PenghasilanSetahun" class="form-control form-control-sm" value="<?= set_value('PenghasilanSetahun'); ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="hasil" role="tabpanel" aria-labelledby="hasil-tab">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row mb-1">
                                            <label for="Sumber" class="col-5 col-sm-3 col-form-label col-form-label-sm">Sumber Penghasilan</label>
                                            <div class="col-7 col-sm-9">
                                                <select name="Sumber" id="Sumber" class="form-control form-control-sm">
                                                    <option value="">-Pilih-</option>
                                                    <?php foreach ($sumberHasil as $row) { ?>
                                                        <option value="<?= $row['id']; ?>" <?= set_select('Sumber', $row['id']); ?>><?= $row['nm_sumber']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-1 SebutanSumberLain">
                                            <label for="SebutanSumberLain" class="col-5 col-sm-3 col-form-label col-form-label-sm">Sebutan Sumber Lainnya</label>
                                            <div class="col-7 col-sm-9">
                                                <input type="text" name="SebutanSumberLain" id="SebutanSumberLain" class="form-control form-control-sm" value="<?= set_value('SebutanSumberLain'); ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="Jumlah" class="col-5 col-sm-3 col-form-label col-form-label-sm">Jumlah</label>
                                            <div class="col-7 col-sm-9">
                                                <input type="text" name="Jumlah" id="Jumlah" class="form-control form-control-sm" value="<?= set_value('Jumlah'); ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="Satuan" class="col-5 col-sm-3 col-form-label col-form-label-sm">Satuan</label>
                                            <div class="col-7 col-sm-9">
                                                <select name="Satuan" id="Satuan" class="form-control form-control-sm">
                                                    <option value="">-Pilih-</option>
                                                    <?php foreach ($satuan as $row) { ?>
                                                        <option value="<?= $row['id']; ?>" <?= set_select('Satuan', $row['id']); ?>><?= $row['nm_satuan']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="PenghasilanSetahunPenghasilan" class="col-5 col-sm-3 col-form-label col-form-label-sm">Penghasilan setahun</label>
                                            <div class="col-7 col-sm-9">
                                                <input type="text" name="PenghasilanSetahunPenghasilan" id="PenghasilanSetahunPenghasilan" class="form-control form-control-sm" value="<?= set_value('PenghasilanSetahunPenghasilan'); ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="Diekspor" class="col-5 col-sm-3 col-form-label col-form-label-sm">Diekspor</label>
                                            <div class="col-7 col-sm-9">
                                                <select name="Diekspor" id="Diekspor" class="form-control form-control-sm">
                                                    <?php foreach ($Ekspors as $row) { ?>
                                                        <option value="<?= $row['IDEkspor']; ?>" <?= set_select('Diekspor', $row['IDEkspor']); ?>><?= $row['NamaEkspor']; ?></option>
                                                    <?php } ?>
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
                                            <label for="Muntaber" class="col-7 col-sm-4 col-form-label col-form-label-sm">Muntaber</label>
                                            <div class="col-5 col-sm-8">
                                                <select name="Muntaber" id="Muntaber" class="form-control form-control-sm">
                                                    <option value="" <?= set_select('Muntaber', ''); ?>>Tidak</option>
                                                    <option value="1" <?= set_select('Muntaber', '1'); ?>>Ya</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="DemamBerdarah" class="col-7 col-sm-4 col-form-label col-form-label-sm">Demam Berdarah</label>
                                            <div class="col-5 col-sm-8">
                                                <select name="DemamBerdarah" id="DemamBerdarah" class="form-control form-control-sm">
                                                    <option value="" <?= set_select('DemamBerdarah', ''); ?>>Tidak</option>
                                                    <option value="1" <?= set_select('DemamBerdarah', '1'); ?>>Ya</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="Campak" class="col-7 col-sm-4 col-form-label col-form-label-sm">Campak</label>
                                            <div class="col-5 col-sm-8">
                                                <select name="Campak" id="Campak" class="form-control form-control-sm">
                                                    <option value="" <?= set_select('Campak', ''); ?>>Tidak</option>
                                                    <option value="1" <?= set_select('Campak', '1'); ?>>Ya</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="Malaria" class="col-7 col-sm-4 col-form-label col-form-label-sm">Malaria</label>
                                            <div class="col-5 col-sm-8">
                                                <select name="Malaria" id="Malaria" class="form-control form-control-sm">
                                                    <option value="" <?= set_select('Malaria', ''); ?>>Tidak</option>
                                                    <option value="1" <?= set_select('Malaria', '1'); ?>>Ya</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="FlueBurung" class="col-7 col-sm-4 col-form-label col-form-label-sm">Flue Burung</label>
                                            <div class="col-5 col-sm-8">
                                                <select name="FlueBurung" id="FlueBurung" class="form-control form-control-sm">
                                                    <option value="" <?= set_select('FlueBurung', ''); ?>>Tidak</option>
                                                    <option value="1" <?= set_select('FlueBurung', '1'); ?>>Ya</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="Covid19" class="col-7 col-sm-4 col-form-label col-form-label-sm">Covid-19</label>
                                            <div class="col-5 col-sm-8">
                                                <select name="Covid19" id="Covid19" class="form-control form-control-sm">
                                                    <option value="" <?= set_select('Covid19', ''); ?>>Tidak</option>
                                                    <option value="1" <?= set_select('Covid19', '1'); ?>>Ya</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="HepatitisB" class="col-7 col-sm-4 col-form-label col-form-label-sm">Hepatitis B</label>
                                            <div class="col-5 col-sm-8">
                                                <select name="HepatitisB" id="HepatitisB" class="form-control form-control-sm">
                                                    <option value="" <?= set_select('HepatitisB', ''); ?>>Tidak</option>
                                                    <option value="1" <?= set_select('HepatitisB', '1'); ?>>Ya</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="Leptospirosis" class="col-7 col-sm-4 col-form-label col-form-label-sm">Leptospirosis</label>
                                            <div class="col-5 col-sm-8">
                                                <select name="Leptospirosis" id="leptospirosis" class="form-control form-control-sm">
                                                    <option value="" <?= set_select('Leptospirosis', ''); ?>>Tidak</option>
                                                    <option value="1" <?= set_select('Leptospirosis', '1'); ?>>Ya</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="Kolera" class="col-7 col-sm-4 col-form-label col-form-label-sm">Kolera</label>
                                            <div class="col-5 col-sm-8">
                                                <select name="Kolera" id="Kolera" class="form-control form-control-sm">
                                                    <option value="" <?= set_select('Kolera', ''); ?>>Tidak</option>
                                                    <option value="1" <?= set_select('Kolera', '1'); ?>>Ya</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="GiziBuruk" class="col-7 col-sm-4 col-form-label col-form-label-sm">Gizi buru (termasuk stunting)</label>
                                            <div class="col-5 col-sm-8">
                                                <select name="GiziBuruk" id="GiziBuruk" class="form-control form-control-sm">
                                                    <option value="" <?= set_select('GiziBuruk', ''); ?>>Tidak</option>
                                                    <option value="1" <?= set_select('GiziBuruk', '1'); ?>>Ya</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="Jantung" class="col-7 col-sm-4 col-form-label col-form-label-sm">Jantung</label>
                                            <div class="col-5 col-sm-8">
                                                <select name="Jantung" id="Jantung" class="form-control form-control-sm">
                                                    <option value="" <?= set_select('Jantung', ''); ?>>Tidak</option>
                                                    <option value="1" <?= set_select('Jantung', '1'); ?>>Ya</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="TBCParu2" class="col-7 col-sm-4 col-form-label col-form-label-sm">TBC paru-paru</label>
                                            <div class="col-5 col-sm-8">
                                                <select name="TBCParu2" id="TBCParu2" class="form-control form-control-sm">
                                                    <option value="" <?= set_select('TBCParu2', ''); ?>>Tidak</option>
                                                    <option value="1" <?= set_select('TBCParu2', '1'); ?>>Ya</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="Kanker" class="col-7 col-sm-4 col-form-label col-form-label-sm">Kanker</label>
                                            <div class="col-5 col-sm-8">
                                                <select name="Kanker" id="Kanker" class="form-control form-control-sm">
                                                    <option value="" <?= set_select('Kanker', ''); ?>>Tidak</option>
                                                    <option value="1" <?= set_select('Kanker', '1'); ?>>Ya</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="Diabetes" class="col-7 col-sm-4 col-form-label col-form-label-sm">Diabetes/kencing manis/gula</label>
                                            <div class="col-5 col-sm-8">
                                                <select name="Diabetes" id="Diabetes" class="form-control form-control-sm">
                                                    <option value="" <?= set_select('Diabetes', ''); ?>>Tidak</option>
                                                    <option value="1" <?= set_select('Diabetes', '1'); ?>>Ya</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="HepatitisE" class="col-7 col-sm-4 col-form-label col-form-label-sm">Hepatitis E</label>
                                            <div class="col-5 col-sm-8">
                                                <select name="HepatitisE" id="HepatitisE" class="form-control form-control-sm">
                                                    <option value="" <?= set_select('HepatitisE', ''); ?>>Tidak</option>
                                                    <option value="1" <?= set_select('HepatitisE', '1'); ?>>Ya</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="Difteri" class="col-7 col-sm-4 col-form-label col-form-label-sm">Difteri</label>
                                            <div class="col-5 col-sm-8">
                                                <select name="Difteri" id="Difteri" class="form-control form-control-sm">
                                                    <option value="" <?= set_select('Difteri', ''); ?>>Tidak</option>
                                                    <option value="1" <?= set_select('Difteri', '1'); ?>>Ya</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="Chikungunya" class="col-7 col-sm-4 col-form-label col-form-label-sm">Chikungunya</label>
                                            <div class="col-5 col-sm-8">
                                                <select name="Chikungunya" id="Chikungunya" class="form-control form-control-sm">
                                                    <option value="" <?= set_select('Chikungunya', ''); ?>>Tidak</option>
                                                    <option value="1" <?= set_select('Chikungunya', '1'); ?>>Ya</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="Lumpuh" class="col-7 col-sm-4 col-form-label col-form-label-sm">Lumpuh</label>
                                            <div class="col-5 col-sm-8">
                                                <select name="Lumpuh" id="Lumpuh" class="form-control form-control-sm">
                                                    <option value="" <?= set_select('Lumpuh', ''); ?>>Tidak</option>
                                                    <option value="1" <?= set_select('Lumpuh', '1'); ?>>Ya</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="Lainnya" class="col-7 col-sm-4 col-form-label col-form-label-sm">Lainnya</label>
                                            <div class="col-5 col-sm-8">
                                                <input type="text" name="Lainnya" id="Lainnya" class="form-control form-control-sm" value="<?= set_value('Lainnya'); ?>">
                                            </div>
                                        </div>
                                        <div class="row my-3">
                                            <label for="">Berapa kali fasilitas kesehatan berikut didatangi setahun terakhir untuk pengobatan/perawatan</label>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="RSDidatangi" class="col-7 col-sm-4 col-form-label col-form-label-sm">Rumah Sakit</label>
                                            <div class="col-5 col-sm-8">
                                                <input type="number" name="RSDidatangi" id="RSDidatangi" class="form-control form-control-sm" value="<?= set_value('RSDidatangi'); ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="RSBersalinDidatangi" class="col-7 col-sm-4 col-form-label col-form-label-sm">Rumah Sakit Bersalin</label>
                                            <div class="col-5 col-sm-8">
                                                <input type="number" name="RSBersalinDidatangi" id="RSBersalinDidatangi" class="form-control form-control-sm" value="<?= set_value('RSBersalinDidatangi'); ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="PuskesmasRIDidatangi" class="col-7 col-sm-4 col-form-label col-form-label-sm">Puskesmas dgn rawat inap</label>
                                            <div class="col-5 col-sm-8">
                                                <input type="number" name="PuskesmasRIDidatangi" id="PuskesmasRIDidatangi" class="form-control form-control-sm" value="<?= set_value('PuskesmasRIDidatangi'); ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="PuskesmasTanpaRIDidatangi" class="col-7 col-sm-4 col-form-label col-form-label-sm">Puskesmas tanpa rawat inap</label>
                                            <div class="col-5 col-sm-8">
                                                <input type="number" name="PuskesmasTanpaRIDidatangi" id="PuskesmasTanpaRIDidatangi" class="form-control form-control-sm" value="<?= set_value('PuskesmasTanpaRIDidatangi'); ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="PuskesmasPembantuDidatangi" class="col-7 col-sm-4 col-form-label col-form-label-sm">Puskesmas Pembantu</label>
                                            <div class="col-5 col-sm-8">
                                                <input type="number" name="PuskesmasPembantuDidatangi" id="PuskesmasPembantuDidatangi" class="form-control form-control-sm" value="<?= set_value('PuskesmasPembantuDidatangi'); ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="PoliklinikDidatangi" class="col-7 col-sm-4 col-form-label col-form-label-sm">Poliklinik</label>
                                            <div class="col-5 col-sm-8">
                                                <input type="number" name="PoliklinikDidatangi" id="PoliklinikDidatangi" class="form-control form-control-sm" value="<?= set_value('PoliklinikDidatangi'); ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="PraktikDokterDidatangi" class="col-7 col-sm-4 col-form-label col-form-label-sm">Tempat Praktik Dokter</label>
                                            <div class="col-5 col-sm-8">
                                                <input type="number" name="PraktikDokterDidatangi" id="PraktikDokterDidatangi" class="form-control form-control-sm" value="<?= set_value('PraktikDokterDidatangi'); ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="RumahBersalinDidatangi" class="col-7 col-sm-4 col-form-label col-form-label-sm">Rumah Bersalin</label>
                                            <div class="col-5 col-sm-8">
                                                <input type="number" name="RumahBersalinDidatangi" id="RumahBersalinDidatangi" class="form-control form-control-sm" value="<?= set_value('RumahBersalinDidatangi'); ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="PraktikBidanDidatangi" class="col-7 col-sm-4 col-form-label col-form-label-sm">Tempat Praktik Bidan</label>
                                            <div class="col-5 col-sm-8">
                                                <input type="number" name="PraktikBidanDidatangi" id="PraktikBidanDidatangi" class="form-control form-control-sm" value="<?= set_value('PraktikBidanDidatangi'); ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="PoskesdesDidatangi" class="col-7 col-sm-4 col-form-label col-form-label-sm">Poskesdes</label>
                                            <div class="col-5 col-sm-8">
                                                <input type="number" name="PoskesdesDidatangi" id="PoskesdesDidatangi" class="form-control form-control-sm" value="<?= set_value('PoskesdesDidatangi'); ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="PolindesDidatangi" class="col-7 col-sm-4 col-form-label col-form-label-sm">Polindes</label>
                                            <div class="col-5 col-sm-8">
                                                <input type="number" name="PolindesDidatangi" id="PolindesDidatangi" class="form-control form-control-sm" value="<?= set_value('PolindesDidatangi'); ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="ApotikDidatangi" class="col-7 col-sm-4 col-form-label col-form-label-sm">Apotik</label>
                                            <div class="col-5 col-sm-8">
                                                <input type="number" name="ApotikDidatangi" id="ApotikDidatangi" class="form-control form-control-sm" value="<?= set_value('ApotikDidatangi'); ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="TokoKhususObatDidatangi" class="col-7 col-sm-4 col-form-label col-form-label-sm">Toko khusus obat/jamu</label>
                                            <div class="col-5 col-sm-8">
                                                <input type="number" name="TokoKhususObatDidatangi" id="TokoKhususObatDidatangi" class="form-control form-control-sm" value="<?= set_value('TokoKhususObatDidatangi'); ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="PosyanduDidatangi" class="col-7 col-sm-4 col-form-label col-form-label-sm">Posyandu</label>
                                            <div class="col-5 col-sm-8">
                                                <input type="number" name="PosyanduDidatangi" id="PosyanduDidatangi" class="form-control form-control-sm" value="<?= set_value('PosyanduDidatangi'); ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="PosbinduDidatangi" class="col-7 col-sm-4 col-form-label col-form-label-sm">Posbindu</label>
                                            <div class="col-5 col-sm-8">
                                                <input type="number" name="PosbinduDidatangi" id="PosbinduDidatangi" class="form-control form-control-sm" value="<?= set_value('PosbinduDidatangi'); ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="PraktikDukunDidatangi" class="col-7 col-sm-4 col-form-label col-form-label-sm">Tempat Praktik Dukun Bayi/Bersalin</label>
                                            <div class="col-5 col-sm-8">
                                                <input type="number" name="PraktikDukunDidatangi" id="PraktikDukunDidatangi" class="form-control form-control-sm" value="<?= set_value('PraktikDukunDidatangi'); ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="JamsosKesehatan" class="col-7 col-sm-4 col-form-label col-form-label-sm">Jaminan Sosial Kesehatan</label>
                                            <div class="col-5 col-sm-8">
                                                <select name="JamsosKesehatan" id="JamsosKesehatan" class="form-control form-control-sm">
                                                    <option value="" <?= set_select('JamsosKesehatan', ''); ?>>Bukan Peserta</option>
                                                    <option value="1" <?= set_select('JamsosKesehatan', '1'); ?>>Peserta</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="AsiEkslusif" class="col-7 col-sm-4 col-form-label col-form-label-sm">Apakah bayi Bapak/Ibu memperoleh ASI ekslusif (pada usia 1-6 bulan hanya mengkonsumsi ASI saja)?</label>
                                            <div class="col-5 col-sm-8">
                                                <select name="AsiEkslusif" id="AsiEkslusif" class="form-control form-control-sm">
                                                    <option value="" <?= set_select('AsiEkslusif', ''); ?>>Tidak</option>
                                                    <option value="1" <?= set_select('AsiEkslusif', '1'); ?>>Ya</option>
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
                                            <label for="Tunanetra" class="col-7 col-sm-5 col-md-3 col-form-label col-form-label-sm">Tunanetra</label>
                                            <div class="col-5 col-sm-7 col-md-9">
                                                <select name="Tunanetra" id="Tunanetra" class="form-control form-control-sm">
                                                    <option value="">Tidak</option>
                                                    <option value="1">Ya</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="Tunarungu" class="col-7 col-sm-5 col-md-3 col-form-label col-form-label-sm">Tunarungu (tuli)</label>
                                            <div class="col-5 col-sm-7 col-md-9">
                                                <select name="Tunarungu" id="Tunarungu" class="form-control form-control-sm">
                                                    <option value="">Tidak</option>
                                                    <option value="1">Ya</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="Tunawicara" class="col-7 col-sm-5 col-md-3 col-form-label col-form-label-sm">Tunawicara (bisu)</label>
                                            <div class="col-5 col-sm-7 col-md-9">
                                                <select name="Tunawicara" id="Tunawicara" class="form-control form-control-sm">
                                                    <option value="">Tidak</option>
                                                    <option value="1">Ya</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="Tunarunguwicara" class="col-7 col-sm-5 col-md-3 col-form-label col-form-label-sm">Tunarungu-wicara (bisu-tuli)</label>
                                            <div class="col-5 col-sm-7 col-md-9">
                                                <select name="Tunarunguwicara" id="Tunarunguwicara" class="form-control form-control-sm">
                                                    <option value="">Tidak</option>
                                                    <option value="1">Ya</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="Tunadaksa" class="col-7 col-sm-5 col-md-3 col-form-label col-form-label-sm">Tunadaksa (cacat tubuh)</label>
                                            <div class="col-5 col-sm-7 col-md-9">
                                                <select name="Tunadaksa" id="Tunadaksa" class="form-control form-control-sm">
                                                    <option value="">Tidak</option>
                                                    <option value="1">Ya</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="Tunagrahita" class="col-7 col-sm-5 col-md-3 col-form-label col-form-label-sm">Tunagrahita (cacat mental)</label>
                                            <div class="col-5 col-sm-7 col-md-9">
                                                <select name="Tunagrahita" id="Tunagrahita" class="form-control form-control-sm">
                                                    <option value="">Tidak</option>
                                                    <option value="1">Ya</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="Tunalaras" class="col-7 col-sm-5 col-md-3 col-form-label col-form-label-sm">Tunalaras (eks sakit jiwa)</label>
                                            <div class="col-5 col-sm-7 col-md-9">
                                                <select name="Tunalaras" id="Tunalaras" class="form-control form-control-sm">
                                                    <option value="">Tidak</option>
                                                    <option value="1">Ya</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="CacatKusta" class="col-7 col-sm-5 col-md-3 col-form-label col-form-label-sm">Cacat eks-sakit kusta</label>
                                            <div class="col-5 col-sm-7 col-md-9">
                                                <select name="CacatKusta" id="CacatKusta" class="form-control form-control-sm">
                                                    <option value="">Tidak</option>
                                                    <option value="1">Ya</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="CacatGanda" class="col-7 col-sm-5 col-md-3 col-form-label col-form-label-sm">Cacat ganda (fisik+mental)</label>
                                            <div class="col-5 col-sm-7 col-md-9">
                                                <select name="CacatGanda" id="CacatGanda" class="form-control form-control-sm">
                                                    <option value="">Tidak</option>
                                                    <option value="1">Ya</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="Dipasung" class="col-7 col-sm-5 col-md-3 col-form-label col-form-label-sm">Dipasung</label>
                                            <div class="col-5 col-sm-7 col-md-9">
                                                <select name="Dipasung" id="Dipasung" class="form-control form-control-sm">
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
                                            <label for="PendTertinggi" class="col-5 col-sm-4 col-form-label col-form-label-sm">Pendidikan Tertinggi</label>
                                            <div class="col-7 col-sm-8 ">
                                                <select name="PendTertinggi" id="PendTertinggi" class="form-control form-control-sm">
                                                    <?php foreach ($pendidikan as $row) { ?>
                                                        <option value="<?= $row['IDPendidikan']; ?>" <?= set_select('PendTertinggi', $row['IDPendidikan']); ?>><?= $row['NamaPendidikan']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="BrpThnPendDasar" class="col-8 col-sm-4 col-form-label col-form-label-sm">Berapa tahun mengenyam pendidikan dasar (SD,SMP,SMA)</label>
                                            <div class="col-4 col-sm-8">
                                                <input type="number" name="BrpThnPendDasar" id="BrpThnPendDasar" class="form-control form-control-sm" placeholder="jumlah" value="<?= set_value('BrpThnPendDasar'); ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-1 PendSedangDiikuti">
                                            <label for="PendSedangDiikuti" class="col-5 col-sm-4 col-form-label col-form-label-sm">Pendidikan yang sedang diikuti</label>
                                            <div class="col-7 col-sm-8 ">
                                                <select name="PendSedangDiikuti" id="PendSedangDiikuti" class="form-control form-control-sm">
                                                    <option value="">-Pilih-</option>
                                                    <?php foreach ($pendidikan as $row) { ?>
                                                        <option value="<?= $row['IDPendidikan']; ?>" <?= set_select('PendSedangDiikuti', $row['IDPendidikan']); ?>><?= $row['NamaPendidikan']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-1 BrpKaliPelatihan">
                                            <label for="BrpKaliPelatihan" class="col-5 col-sm-4 col-form-label col-form-label-sm">Berapa kali mengikuti pelatihan</label>
                                            <div class="col-7 col-sm-8 ">
                                                <input type="text" name="BrpKaliPelatihan" id="BrpKaliPelatihan" class="form-control form-control-sm" value="<?= set_value('BrpKaliPelatihan'); ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="BahasaDiRumah" class="col-5 col-sm-4 col-form-label col-form-label-sm">Bahasa digunakan di rumah dan pemukiman</label>
                                            <div class="col-7 col-sm-8 ">
                                                <input type="text" name="BahasaDiRumah" id="BahasaDiRumah" class="form-control form-control-sm" value="<?= set_value('BahasaDiRumah'); ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="BahasaFormal" class="col-5 col-sm-4 col-form-label col-form-label-sm">Bahasa digunakan di lembaga formal</label>
                                            <div class="col-7 col-sm-8 ">
                                                <input type="text" name="BahasaFormal" id="BahasaFormal" class="form-control form-control-sm" value="<?= set_value('BahasaFormal'); ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="KerjaBakti" class="col-8 col-sm-4 col-form-label col-form-label-sm">Kerja bakti setahun terakhir</label>
                                            <div class="col-4 col-sm-8">
                                                <input type="number" name="KerjaBakti" id="KerjaBakti" class="form-control form-control-sm" placeholder="jumlah" value="<?= set_value('KerjaBakti'); ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="Siskamling" class="col-8 col-sm-4 col-form-label col-form-label-sm">Siskamling setahun terakhir</label>
                                            <div class="col-4 col-sm-8">
                                                <input type="number" name="Siskamling" id="Siskamling" class="form-control form-control-sm" placeholder="jumlah" value="<?= set_value('Siskamling'); ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="PestaRakyat" class="col-8 col-sm-4 col-form-label col-form-label-sm">Pesta Rakyat/Adat setahun terakhir</label>
                                            <div class="col-4 col-sm-8">
                                                <input type="number" name="PestaRakyat" id="PestaRakyat" class="form-control form-control-sm" placeholder="jumlah" value="<?= set_value('PestaRakyat'); ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="MenolongWargaMati" class="col-8 col-sm-4 col-form-label col-form-label-sm">Menolong warga yang mengalami kematian setahun terakhir</label>
                                            <div class="col-4 col-sm-8">
                                                <input type="number" name="MenolongWargaMati" id="MenolongWargaMati" class="form-control form-control-sm" placeholder="jumlah" value="<?= set_value('MenolongWargaMati'); ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="MenolongWargaSakit" class="col-8 col-sm-4 col-form-label col-form-label-sm">Menolong warga yang sedang sakit setahun terakhir</label>
                                            <div class="col-4 col-sm-8">
                                                <input type="number" name="MenolongWargaSakit" id="MenolongWargaSakit" class="form-control form-control-sm" placeholder="jumlah" value="<?= set_value('MenolongWargaSakit'); ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="MenolongWargaKecelakaan" class="col-8 col-sm-4 col-form-label col-form-label-sm">Menolong warga yang kecelakaan setahun terakhir</label>
                                            <div class="col-4 col-sm-8">
                                                <input type="number" name="MenolongWargaKecelakaan" id="MenolongWargaKecelakaan" class="form-control form-control-sm" placeholder="jumlah" value="<?= set_value('MenolongWargaKecelakaan'); ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="PernahPelayananDesa" class="col-8 col-sm-4 col-form-label col-form-label-sm">Dalam setahun terakhir pernah memperoleh pelayanan desa</label>
                                            <div class="col-4 col-sm-8 ">
                                                <select name="PernahPelayananDesa" id="PernahPelayananDesa" class="form-control form-control-sm">
                                                    <option value="" <?= set_select('PernahPelayananDesa', ''); ?>>Tidak</option>
                                                    <option value="1" <?= set_select('PernahPelayananDesa', '1'); ?>>Ya</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-1 PelayananDesa">
                                            <label for="PelayananDesa" class="col-8 col-sm-4 col-form-label col-form-label-sm">Bagaimana pelayanan desa yang diperoleh</label>
                                            <div class="col-4 col-sm-8 ">
                                                <select name="PelayananDesa" id="PelayananDesa" class="form-control form-control-sm">
                                                    <option value="">-Pilih-</option>
                                                    <?php foreach ($PelayananDesas as $row) { ?>
                                                        <option value="<?= $row['IDPelayanan']; ?>" <?= set_select('PelayananDesa', $row['IDPelayanan']); ?>><?= $row['NamaPelayanan']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="PernahSaranKePihakDesa" class="col-8 col-sm-4 col-form-label col-form-label-sm">Dalam setahun terakhir apakah pernah menyampaikan masukan/saran kepada pihak desa</label>
                                            <div class="col-4 col-sm-8 ">
                                                <select name="PernahSaranKePihakDesa" id="PernahSaranKePihakDesa" class="form-control form-control-sm">
                                                    <option value="" <?= set_select('PernahSaranKePihakDesa', ''); ?>>Tidak</option>
                                                    <option value="1" <?= set_select('PernahSaranKePihakDesa', '1'); ?>>Ya</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-1 KeterbukaanDesa">
                                            <label for="KeterbukaanDesa" class="col-8 col-sm-4 col-form-label col-form-label-sm">Bagaimana keterbukaan desa terhadap masukan</label>
                                            <div class="col-4 col-sm-8 ">
                                                <select name="KeterbukaanDesa" id="KeterbukaanDesa" class="form-control form-control-sm">
                                                    <option value="">-Pilih-</option>
                                                    <?php foreach ($PelayananDesas as $row) { ?>
                                                        <option value="<?= $row['IDPelayanan']; ?>" <?= set_select('KeterbukaanDesa', $row['IDPelayanan']); ?>><?= $row['NamaPelayanan']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="TerjadiBencana" class="col-8 col-sm-4 col-form-label col-form-label-sm">Dalam setahun terakhir apakah terjadi bencana</label>
                                            <div class="col-4 col-sm-8 ">
                                                <select name="TerjadiBencana" id="TerjadiBencana" class="form-control form-control-sm">
                                                    <option value="" <?= set_select('TerjadiBencana', ''); ?>>Tidak</option>
                                                    <option value="1" <?= set_select('TerjadiBencana', '1'); ?>>Ya</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-1 TerkenaBencana">
                                            <label for="TerkenaBencana" class="col-8 col-sm-4 col-form-label col-form-label-sm">Apakah anda terkena dampak bencana?</label>
                                            <div class="col-4 col-sm-8 ">
                                                <select name="TerkenaBencana" id="TerkenaBencana" class="form-control form-control-sm">
                                                    <option value="" <?= set_select('TerkenaBencana', ''); ?>>Tidak</option>
                                                    <option value="1" <?= set_select('TerkenaBencana', '1'); ?>>Ya</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-1 MenerimaBantuanBencana">
                                            <label for="MenerimaBantuanBencana" class="col-8 col-sm-4 col-form-label col-form-label-sm">Apakah menerima pemenuhan kebutuhan dasar saat bencana(makanan,pakaian,tempat tinggal)?</label>
                                            <div class="col-4 col-sm-8 ">
                                                <select name="MenerimaBantuanBencana" id="MenerimaBantuanBencana" class="form-control form-control-sm">
                                                    <option value="" <?= set_select('MenerimaBantuanBencana', ''); ?>>Tidak</option>
                                                    <option value="1" <?= set_select('MenerimaBantuanBencana', '1'); ?>>Ya</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-1 PenangananPsikologi">
                                            <label for="PenangananPsikologi" class="col-8 col-sm-4 col-form-label col-form-label-sm">Apakah ada penanganan psikososial keluarga terdampak bencana (penyuluhan/konseling/terapi)?</label>
                                            <div class="col-4 col-sm-8 ">
                                                <select name="PenangananPsikologi" id="PenangananPsikologi" class="form-control form-control-sm">
                                                    <option value="" <?= set_select('PenangananPsikologi', ''); ?>>Tidak</option>
                                                    <option value="1" <?= set_select('PenangananPsikologi', '1'); ?>>Ya</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div <?php if (session()->get('role') >= 3) {
                                                    echo 'hidden';
                                                }
                                                ?> class="row mb-1">
                                            <label for="UserID" class="col-4 col-sm-4 col-form-label col-form-label-sm">Nama Operator</label>
                                            <div class="col-8 col-sm-8 ">
                                                <select class="form-control form-control-sm" name="UserID" id="UserID">
                                                    <?php foreach ($operator as $row) { ?>
                                                        <option <?php if ($row['UserID'] == session()->get('nik')) {
                                                                    echo 'selected';
                                                                } ?> value="<?php echo $row['UserID']; ?>"><?php echo $row['NamaLengkap']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row mb-1">
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" id="TerUpload" name="TerUpload">
                                        <label class="form-check-label" for="TerUpload">
                                            Dengan ini menyatakan bahwa data telah diisi dengan benar dan lengkap!
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                Kirim
                            </button>
                            <br>
                            <p for="" style="font-size: 90%;" class="font-italic text-danger">
                                *Klik tombol Kirim setelah data terisi lengkap
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script>
    $(document).ready(function() {

        $('#RW').change(function() {

            var RW = $('#RW').val();

            var action = 'getRT';

            if (RW != '') {
                $.ajax({
                    url: "<?php echo base_url('/individu/action'); ?>",
                    method: "POST",
                    data: {
                        RW: RW,
                        action: action
                    },
                    dataType: "JSON",
                    success: function(data) {
                        var html = '<option value="">-Pilih-</option>';

                        for (var count = 0; count < data.length; count++) {

                            html += '<option value="' + data[count].no_rt + '">' + data[count].no_rt + '</option>';

                        }

                        $('#RT').html(html);
                    }
                });
            } else {
                $('#RT').val('');
            }
            $('#RT').val('');
        });

        $(".Aktif").hide();
        $(".PendSedangDiikuti").hide();
        $(".BrpKaliPelatihan").hide();
        $(".UsiaSaatNikah").hide();
        $('#Status').on('change', function() {

            if (this.value != '1')
            //.....................^.......
            {
                $(".UsiaSaatNikah").show();
            } else {
                $(".UsiaSaatNikah").hide();
            }
        });

        $('#AktifInternet').on('change', function() {

            if (this.value == '1')
            //.....................^.......
            {
                $(".Aktif").show();
            } else {
                $(".Aktif").hide();
            }
        });

        $(".hide-kerja").hide();
        $('#KondisiPekerjaan').on('change', function() {

            if (this.value != '5')
            //.....................^.......
            {
                $(".hide-kerja").hide();
            } else {
                $(".hide-kerja").show();
            }
        });

        $(".SebutanSumberLain").hide();
        $('#Sumber').on('change', function() {

            if (this.value == '43')
            //.....................^.......
            {
                $(".SebutanSumberLain").show();
            } else {
                $(".SebutanSumberLain").hide();
            }
        });

        $(".PelayananDesa").hide();
        $('#PernahPelayananDesa').on('change', function() {

            if (this.value == '1')
            //.....................^.......
            {
                $(".PelayananDesa").show();
            } else {
                $(".PelayananDesa").hide();
            }
        });

        $(".KeterbukaanDesa").hide();
        $('#PernahSaranKePihakDesa').on('change', function() {

            if (this.value == '1')
            //.....................^.......
            {
                $(".KeterbukaanDesa").show();
            } else {
                $(".KeterbukaanDesa").hide();
            }
        });

        $('#KondisiPekerjaan').on('change', function() {

            if (this.value == '1' || this.value == '3' || this.value == '4')
            //.....................^.......
            {
                $("#Sumber").prop('disabled', 'disabled');
                $("#SebutanSumberLain").prop('disabled', 'disabled');
                $("#Jumlah").prop('disabled', 'disabled');
                $("#Satuan").prop('disabled', 'disabled');
                $("#PenghasilanSetahunPenghasilan").prop('disabled', 'disabled');
                $("#Diekspor").prop('disabled', 'disabled');
            } else {
                $("#Sumber").prop('disabled', false);
                $("#SebutanSumberLain").prop('disabled', false);
                $("#Jumlah").prop('disabled', false);
                $("#Satuan").prop('disabled', false);
                $("#PenghasilanSetahunPenghasilan").prop('disabled', false);
                $("#Diekspor").prop('disabled', false);
            }
        });

        $(".TerkenaBencana").hide();
        $(".MenerimaBantuanBencana").hide();
        $(".PenangananPsikologi").hide();
        $('#TerjadiBencana').on('change', function() {

            if (this.value == '1')
            //.....................^.......
            {
                $(".TerkenaBencana").show();
                $(".MenerimaBantuanBencana").show();
                $(".PenangananPsikologi").show();
            } else {
                $(".TerkenaBencana").hide();
                $(".MenerimaBantuanBencana").hide();
                $(".PenangananPsikologi").hide();
            }
        });


        new AutoNumeric.multiple(['#PenghasilanSetahun', '#Jumlah', '#PenghasilanSetahunPenghasilan'], AutoNumeric.getPredefinedOptions().integer, {

            // currencySymbol: 'Rp. ',
            // decimalCharacter: ',',
            digitGroupSeparator: '.',
        });

    });
</script>

<?= $this->endSection(); ?>