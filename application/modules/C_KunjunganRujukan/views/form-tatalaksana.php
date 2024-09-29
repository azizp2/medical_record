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


<form id="form-data-tatalaksana">
    <div class="m-2">

        <input type="hidden" name="rujukan_id" id="triase-rujukan-id" value="<?= $getPasien->idx ?>">

        <table class="table table-bordered" id="data-table">
            <thead>
                <tr>
                    <th>Waktu</th>
                    <th>Obat/Cairan</th>
                    <th>Dosis</th>
                    <th>Cara Pembelian</th>
                    <th>TTD Dokter</th>
                    <th>Waktu Pembelian</th>
                    <th>TTD Perawat</th>
                </tr>
            </thead>
            <tbody id="table-body">
                <?php foreach ($getTatalaksanaDet as $val) { ?>
                    <tr>
                        <td><input type="date" class="form-control" name="waktu[]" value="<?= $val->waktu ?>"></td>
                        <td><input type="text" class="form-control" name="obat_cairan[]" value="<?= $val->obat_cairan ?>"></td>
                        <td><input type="text" class="form-control" name="dosis[]" value="<?= $val->dosis ?>"></td>
                        <td><input type="text" class="form-control" name="cara_pembelian[]" value="<?= $val->cara_pembelian ?>"></td>
                        <td>
                            <select class="form-control" name="dokter[]">
                                <option value="">Select Dokter...</option>
                                <?php foreach ($listDokter as $item): ?>
                                    <option value="<?= $item->nama ?>" <?= $item->nama == "$val->dokter" ? 'selected' : '' ?>>
                                        <?= $item->nama ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                        <td><input type="date" class="form-control" name="waktu_pembelian[]" value="<?= $val->waktu_pembelian ?>"></td>
                        <td><input type="text" class="form-control" name="ttd_perawat[]" value="<?= $val->ttd_perawat ?>"></td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Instruksi Lainnya</label>
                    <input class="form-control" name="instruksi_lainnya" value="<?= $getTatalaksana->instruksi_lainnya ?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Edukasi</label>
                    <input class="form-control" name="edukasi" value="<?= $getTatalaksana->edukasi ?>">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Waktu</label>
                    <input type="date" class="form-control" name="waktu" value="<?= $getTatalaksana->waktu ?>">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Pasien / Wali / Orang Tua</label>
                    <input class="form-control" name="pasien_atau_wali" value="<?= $getTatalaksana->pasien_atau_wali ?>">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Petugas</label>
                    <input class="form-control" name="petugas" value="<?= $getTatalaksana->petugas ?>">
                </div>
            </div>
        </div>

        <button type="button" class="btn btn-primary col-md-1 col-sm-2 col-lg-2" onclick="saveTT()">Save</button>
        <a class="btn btn-danger col-md-1 col-sm-2 col-lg-2 triase-btn-print" target="_blank" href="<?= base_url('C_KunjunganRujukan/printFormTatalaksana/' . $pasienId) ?>">Cetak</a>

    </div>
</form>

<script>

</script>