<?php
// Extract values from $getEvaluasi
$autoanamnesa = isset($getEvaluasi->autoanamnesa) ? $getEvaluasi->autoanamnesa : '';
$alloanamnesa = isset($getEvaluasi->alloanamnesa) ? $getEvaluasi->alloanamnesa : '';
$rpo = isset($getEvaluasi->rpo) ? $getEvaluasi->rpo : '';
$status_psikologis = isset($getEvaluasi->status_psikologis) ? explode(', ', $getEvaluasi->status_psikologis) : [];
$status_pernikahan = isset($getEvaluasi->status_pernikahan) ? $getEvaluasi->status_pernikahan : '';
$hub_pasien_dengan_anggota_keluarga = isset($getEvaluasi->hub_pasien_dengan_anggota_keluarga) ? $getEvaluasi->hub_pasien_dengan_anggota_keluarga : '';
$kegiatan_keagamaan_yang_diikuti = isset($getEvaluasi->kegiatan_keagamaan_yang_diikuti) ? $getEvaluasi->kegiatan_keagamaan_yang_diikuti : '';
$penanggung_jawab = isset($getEvaluasi->penanggung_jawab) ? $getEvaluasi->penanggung_jawab : '';
$keadaan_umum = isset($getEvaluasi->keadaan_umum) ? $getEvaluasi->keadaan_umum : '';
$gcs = isset($getEvaluasi->gcs) ? $getEvaluasi->gcs : '';
$spo2 = isset($getEvaluasi->spo2) ? $getEvaluasi->spo2 : '';
$bb = isset($getEvaluasi->bb) ? $getEvaluasi->bb : '';
$td = isset($getEvaluasi->td) ? $getEvaluasi->td : '';
$rr = isset($getEvaluasi->rr) ? $getEvaluasi->rr : '';
$hr = isset($getEvaluasi->hr) ? $getEvaluasi->hr : '';
$temp = isset($getEvaluasi->temp) ? $getEvaluasi->temp : '';
$laboratorium = isset($getEvaluasi->laboratorium) ? $getEvaluasi->laboratorium : '';
$radiologi = isset($getEvaluasi->radiologi) ? $getEvaluasi->radiologi : '';
$ekg = isset($getEvaluasi->ekg) ? $getEvaluasi->ekg : '';
$lainnya = isset($getEvaluasi->lainnya) ? $getEvaluasi->lainnya : '';
$rencana_tindak_lanjut = isset($getEvaluasi->rencana_tindak_lanjut) ? $getEvaluasi->rencana_tindak_lanjut : '';
$dokter = isset($getEvaluasi->dokter) ? $getEvaluasi->dokter : '';

$kepala = isset($getEvaluasi->kepala) ? $getEvaluasi->kepala : '';
$leher = isset($getEvaluasi->leher) ? $getEvaluasi->leher : '';
$thorax = isset($getEvaluasi->thorax) ? $getEvaluasi->thorax : '';
$abdomen = isset($getEvaluasi->abdomen) ? $getEvaluasi->abdomen : '';
$extremitas = isset($getEvaluasi->extremitas) ? $getEvaluasi->extremitas : '';
$genitalia = isset($getEvaluasi->genitalia) ? $getEvaluasi->genitalia : '';
?>

<table class="col-md-12 mb-2 border" border="1">
    <tr>
        <td colspan="2">
            <h5 style="font-size: 14px;">Klinik Utama Permata Medika</h5>
        </td>
        <td>
            <h5 style="font-size: 14px;">RM.R13 / REV 1 / 2023</h5>
        </td>
    </tr>
    <tr>
        <td style="width:1px;"><img src="<?= base_url('assets/images/logokop.png') ?>"></td>
        <td align="center">
            <h4>TRIASE PASIEN TERINTEGRASI</h4>
        </td>
        <td>
            <table>
                <tr>
                    <td style="width: 70px">Nama</td>
                    <td>:</td>
                    <td> <span id="badge-fullname"><?= $getPasien->nama_depan . " " . $getPasien->nama_belakang  ?></span></td>
                </tr>
                <tr>
                    <td>Tgl Lahir</td>
                    <td>:</td>
                    <td> <span id="badge-tgl-lahir"><?= date('d/m/Y', strtotime($getPasien->tgl_lahir)) ?></span></td>
                </tr>
                <tr>
                    <td>No RKM</td>
                    <td>:</td>
                    <td> <span id="badge-norkm"><?= $getPasien->no_rkm ?></span></td>
                </tr>
            </table>
        </td>
    </tr>
</table>

<form id="form-data-evaluasi">
    <input type="hidden" name="rujukan_id" id="triase-rujukan-id" value="<?= $getPasien->idx ?>">



    <div class="p-3">
        <div class="form-group">
            <label>Tanggal dan Jam</label>
            <div>

                <?php
                if ($getTriase->modified_at != null) {
                    $waktuPasienDatang = date('Y-m-d\TH:i', strtotime($getTriase->modified_at));
                } else {
                    $waktuPasienDatang = date('Y-m-d\TH:i');
                } ?>

                <input type="datetime-local" class="form-control" name="modified_at" value="<?= $waktuPasienDatang ?>">

            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Autoanamnesa</label>
                    <textarea rows="2" class="form-control" name="autoanamnesa"><?= $autoanamnesa ?></textarea>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Alloanamnesa</label>
                    <textarea rows="2" name="alloanamnesa" class="form-control"><?= $alloanamnesa ?></textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>RPO</label>
                    <textarea name="rpo" rows="2" class="form-control"><?= $rpo ?></textarea>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Status Psikologis</label>
                    <div class="row">
                        <?php
                        $statusOptions = ['Marah', 'Cemas', 'Takut', 'Gelisah', 'Tidak Masalah', 'Depresi', 'Cendrung Bunuh Diri', 'Lainnya'];
                        foreach ($statusOptions as $status): ?>
                            <div class="col-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="status_psikologis[]" value="<?= $status ?>" id="status_<?= $status ?>"
                                        <?= in_array($status, $status_psikologis) ? 'checked' : '' ?>>
                                    <label class="form-check-label" for="status_<?= $status ?>"><?= $status ?></label>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Status Pernikahan</label>
                    <select class="form-control" name="status_pernikahan">
                        <option <?= $status_pernikahan == '...' ? 'selected' : '' ?>>...</option>
                        <option <?= $status_pernikahan == 'Menikah' ? 'selected' : '' ?>>Menikah</option>
                        <option <?= $status_pernikahan == 'Belum Menikah' ? 'selected' : '' ?>>Belum Menikah</option>
                        <option <?= $status_pernikahan == 'Cerai' ? 'selected' : '' ?>>Cerai</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Hub Pasien Dengan Anggota Keluarga</label>
                    <select class="form-control" name="hub_pasien_dengan_anggota_keluarga">
                        <option <?= $hub_pasien_dengan_anggota_keluarga == '...' ? 'selected' : '' ?>>...</option>
                        <option <?= $hub_pasien_dengan_anggota_keluarga == 'Baik' ? 'selected' : '' ?>>Baik</option>
                        <option <?= $hub_pasien_dengan_anggota_keluarga == 'Tidak Baik' ? 'selected' : '' ?>>Tidak Baik</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Kegiatan Keagamaan yang diikuti</label>
                    <textarea rows="2" class="form-control" name="kegiatan_keagamaan_yang_diikuti"><?= $kegiatan_keagamaan_yang_diikuti ?></textarea>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Penanggung Jawab</label>
                    <select class="form-control" name="penanggung_jawab">
                        <option <?= $penanggung_jawab == '...' ? 'selected' : '' ?>>...</option>
                        <option <?= $penanggung_jawab == 'BPJS' ? 'selected' : '' ?>>BPJS</option>
                        <option <?= $penanggung_jawab == 'Asuransi / Perusahaan' ? 'selected' : '' ?>>Asuransi / Perusahaan</option>
                        <option <?= $penanggung_jawab == 'Umum' ? 'selected' : '' ?>>Umum</option>
                    </select>
                </div>
            </div>
        </div>

        <h5>Pemeriksaan Fisik</h5>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Keadaan Umum</label>
                    <input class="form-control" name="keadaan_umum" value="<?= $keadaan_umum ?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label>TD</label>
                    <input class="form-control" value="<?= $td ?>" name="td">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>RR</label>
                    <input class="form-control" value="<?= $rr ?>" name="rr">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>GCS</label>
                    <input class="form-control" value="<?= $gcs ?>" name="gcs">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>TB</label>
                    <input class="form-control" value="<?= $td ?>" name="tb">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>HR</label>
                    <input class="form-control" value="<?= $hr ?>" name="hr">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>SPO2</label>
                    <input class="form-control" value="<?= $spo2 ?>" name="spo2">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Temp</label>
                    <input class="form-control" value="<?= $temp ?>" name="temp">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>BB</label>
                    <input class="form-control" value="<?= $bb ?>" name="bb">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Kepala</label>
                    <div>
                        <input class="form-control" name="kepala" value="<?= $kepala ?>">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Leher</label>
                    <div>
                        <input class="form-control" name="leher" value="<?= $leher ?>">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Thorax</label>
                    <div>
                        <input class="form-control" name="thorax" value="<?= $thorax ?>">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Abdomen</label>
                    <div>
                        <input class="form-control" name="abdomen" value="<?= $abdomen ?>">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Extremitas</label>
                    <div>
                        <input class="form-control" name="extremitas" value="<?= $extremitas ?>">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Genitalia</label>
                    <div>
                        <input class="form-control" name="genitalia" value="<?= $genitalia ?>">
                    </div>
                </div>
            </div>
        </div>


        <h5>Pemeriksaan Penunjang</h5>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Laboratorium</label>
                    <input class="form-control" name="laboratorium" value="<?= $laboratorium ?>">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Radiologi</label>
                    <input class="form-control" name="radiologi" value="<?= $radiologi ?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>EKG</label>
                    <input class="form-control" name="ekg" value="<?= $ekg ?>">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Lainnya</label>
                    <input class="form-control" name="lainnya" value="<?= $lainnya ?>">
                </div>
            </div>
        </div>

        <h5>Rencana Tindak Lanjut</h5>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <textarea class="form-control" name="rencana_tindak_lanjut" rows="3"><?= $rencana_tindak_lanjut ?></textarea>
                </div>
            </div>
        </div>

        <h5>Dokter Penanggung Jawab</h5>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <input class="form-control" name="dokter" value="<?= $dokter ?>">
                </div>
            </div>
        </div>


        <button type="button" class="btn btn-primary col-md-1 col-sm-2 col-lg-2" onclick="saveEvaluasi()">Save</button>
        <a class="btn btn-danger col-md-1 col-sm-2 col-lg-2 triase-btn-print" target="_blank" href="<?= base_url('C_KunjunganRujukan/printFormEvaluasi/' . $pasienId) ?>">Cetak</a>

    </div>
</form>