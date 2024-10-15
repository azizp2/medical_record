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

<form id="form-data-selesai">
    <input type="hidden" name="rujukan_id" id="triase-rujukan-id" value="<?= $getPasien->idx ?>">

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Tgl Masuk</label>
                <input type="date" class="form-control" name="tgl_masuk" value="<?= $getSelesai->tgl_masuk ?>" required>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>Tgl Keluar</label>
                <input type="date" class="form-control" name="tgl_keluar" value="<?= $getSelesai->tgl_keluar ?>" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Ruang Rawat Terakhir</label>
                <select class="form-control select-search" name="ruang_rawat">
                    <option>...</option>
                    <?php foreach ($listKamar as $val) { ?>
                        <option <?= $val->nomor_kamar == $getSelesai->ruang_rawat ? 'selected' : '' ?>><?= $val->nomor_kamar ?></option>";
                    <?php } ?>
                </select>
                <!-- <input type="text" class="form-control" name="ruang_rawat" value="<?= $getSelesai->ruang_rawat ?>" required> -->
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Penanggung Pembayaran</label>
                <input type="text" class="form-control" name="penanggung_pembayaran" value="<?= $getSelesai->penanggung_pembayaran ?>" required>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>Ringkasan Riwayat Penyakit</label>
                <textarea rows="2" class="form-control" name="riwayat_penyakit" required><?= $getSelesai->riwayat_penyakit ?></textarea>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>Pemeriksaan Fisik</label>
                <textarea rows="4" class="form-control" name="pemeriksaan_fisik" required><?= $getSelesai->pemeriksaan_fisik ?></textarea>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>Pemeriksaan Penunjang</label>
                <textarea rows="4" class="form-control" name="pemeriksaan_penunjang" required><?= $getSelesai->pemeriksaan_penunjang ?></textarea>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>Terapi Pengobatan selama di Rumah Sakit</label>
                <textarea rows="4" class="form-control" name="terapi_pengobatan" required><?= $getSelesai->terapi_pengobatan ?></textarea>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>Diagnosa Awal</label>
                <select class="form-control select-search" disabled name="diagnosa_awal">
                    <option>...</option>
                    <?php foreach ($listDiagnosa as $val) { ?>
                        <option <?= $val->diagnosa == $getDianosaSementara ? 'selected' : '' ?> value="<?= $val->id ?>"><?= $val->diagnosa ?></option>";
                    <?php } ?>
                </select>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>Diagnosa Utama</label>
                <select class="form-control select-search" name="diagnosa_awal">
                    <option>...</option>
                    <?php foreach ($listDiagnosa as $val) { ?>
                        <option <?= $val->diagnosa == $getDianosaSementara ? 'selected' : '' ?> value="<?= $val->id ?>"><?= $val->diagnosa ?></option>";
                    <?php } ?>
                </select>

            </div>
        </div>
    </div>

    <button type="button" class="btn btn-primary mb-2 m-2 col-md4" id="add-row-btn-selesai">Add Obat</button>


    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Nama Obat</th>
                <th>Qty</th>
                <th>Dosis</th>
                <th>Frekuensi</th>
                <th>Cara Pembelian</th>
            </tr>
        </thead>
        <tbody id="table-body-selesai">
            <?php foreach ($getSelesaiDet as $val) { ?>

                <tr>
                    <td>
                        <select class="form-control change-obat" name="obat_id[]">
                            <option value="">Select Obat...</option>
                            <?php foreach ($listObat as $item): ?>
                                <option value="<?= $item->id ?>" <?= $item->id == $val->obat_id ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($item->nama_obat) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                    <td>
                        <input type="number" class="form-control" name="jumlah[]" value="<?= $val->jumlah ?>" required>
                    </td>
                    <td>
                        <input type="text" class="form-control" name="dosis[]" value="<?= $val->dosis ?>" required>
                    </td>
                    <td>
                        <input type="text" class="form-control" name="frekuensi[]" required value="<?= $val->frekuensi ?>">
                    </td>
                    <td>
                        <input type="text" class="form-control" name="cara_pembelian[]" required value="<?= $val->cara_pembelian ?>">
                    </td>
                </tr>

            <?php } ?>
        </tbody>
    </table>

    <button type="button" class="btn btn-primary mb-2 m-2 col-md4" id="add-row-btn-layanan">Add Layanan Lainnya</button>


    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Nama Layanan</th>
                <th>Qty</th>
                <th>Ket</th>
            </tr>
        </thead>
        <tbody id="table-body-layanan">
            <?php foreach ($getSelesaiDetLyanan as $val) { ?>

                <tr>
                    <td>
                        <select class="form-control" name="layanan_id[]">
                            <option value="">Select Layanan...</option>
                            <?php foreach ($listLayanan as $item): ?>
                                <option value="<?= $item->id ?>" <?= $item->id == $val->layanan_id ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($item->nama_layanan) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                    <td>
                        <input type="number" class="form-control" name="qty[]" value="<?= $val->qty ?>" required>
                    </td>
                    <td>
                        <input type="text" class="form-control" name="ket[]" value="<?= $val->ket ?>" required>
                    </td>
                </tr>

            <?php } ?>
        </tbody>
    </table>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Dokter Penanggung Jawab</label>
                <select class="form-control" name="dokter_penanggung_jawab">
                    <option>...</option>
                    <?php foreach ($listDokter as $item): ?>
                        <option <?= $item->nama == "$getSelesai->dokter_penanggung_jawab" ? 'selected' : '' ?>>
                            <?= $item->nama ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <!-- <input type="text" class="form-control" value="<?= $getSelesai->dokter_penanggung_jawab ?>" name="dokter_penanggung_jawab" required> -->
            </div>
        </div>
    </div>

    <hr>

    <button type="button" class="btn btn-primary col-md-2" onclick="saveSelesai()">Save</button>
    <a class="btn btn-danger col-md-1 col-sm-2 col-lg-2 triase-btn-print" target="_blank" href="<?= base_url('C_KunjunganRujukan/printFormSelesai/' . $pasienId) ?>">Cetak</a>

</form>