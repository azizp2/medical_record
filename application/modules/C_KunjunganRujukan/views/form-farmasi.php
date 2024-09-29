<form id="form-data-farmasi">
    <input type="hidden" name="rujukan_id" id="triase-rujukan-id" value="<?= $getPasien->idx ?>">

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

    <table class="table table-bordered">
        <thead>
            <th>Nama Obat</th>
            <th>Dosis</th>
            <th>Tanggal</th>
            <th>Jumlah</th>
        </thead>
        <tbody id="table-body-farmasi">
            <?php foreach ($getFarmasi as $key => $val) { ?>

                <tr>
                    <td>
                        <select class="form-control" name="obat_id[]">
                            <option value="">Select Obat...</option>
                            <?php foreach ($listObat as $item): ?>
                                <option value="<?= $item->id ?>" <?= $item->id == "$val->obat_id" ? 'selected' : '' ?>>
                                    <?= $item->nama_obat ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                    <td><input type="text" class="form-control" name="dosis[]" value="<?= $val->dosis ?>" required></td>
                    <td><input type="date" class="form-control" name="tanggal[]" value="<?= $val->tanggal ?>" required></td>
                    <td><input type="number" class="form-control" name="jumlah[]" value="<?= $val->jumlah ?>" required></td>
                </tr>
            <?php } ?>

        </tbody>
    </table>
    <button type="button" class="btn btn-primary col-md-1 col-sm-2 col-lg-2" onclick="saveFarmasi()">Save</button>
    <a class="btn btn-danger col-md-1 col-sm-2 col-lg-2 triase-btn-print" target="_blank" href="<?= base_url('C_KunjunganRujukan/printFormFarmasi/' . $pasienId) ?>">Cetak</a>


</form>