<form id="form-data-perincian">
    <input type="hidden" name="rujukan_id" id="triase-rujukan-id" value="<?= $getPasien->idx ?>">


    <table class="col-md-12 mb-4 border" border="1">
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
                <h4>FORM PERINCIAN</h4>
            </td>
            <td>
                <table>
                    <tr>
                        <td style="width: 70px">Nama</td>
                        <td>:</td>
                        <td> <span id="badge-fullname"><?= $getPasien->nama_depan . " " . $getPasien->nama_belakang  ?></span></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td> <span id="badge-norkm"><?= $getPasien->alamat ?></span></td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>:</td>
                        <td> <span id="badge-norkm"><?= $getPasien->gender ?></span></td>
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


    <h5 class="mt-3">List Penggunaan Obat Terpakai</h5>
    <hr>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Obat</th>
                <th>Harga Satuan</th>
                <th>Qty</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody id="table-body-cppt">
            <?php
            $grandTotal1 = 0; // Inisialisasi grand total
            foreach ($listPemakaianObat as $item) {
                $subtotal = $item->total_qty * $item->harga; // Hitung subtotal
                $grandTotal1 += $subtotal; // Tambahkan subtotal ke grand total
            ?>
                <tr>
                    <td><?= htmlspecialchars($item->nama_obat) ?></td>
                    <td>Rp. <?= number_format($item->harga, 0, ',', '.') ?>,-</td>
                    <td><?= $item->total_qty ?></td>
                    <td>Rp. <?= number_format($subtotal, 0, ',', '.') ?>,-</td>
                </tr>
            <?php } ?>
            <tr>
                <td colspan="3" class="text-center bg-success text-white"><strong>Grand Total</strong></td>
                <td>Rp. <?= number_format($grandTotal1, 0, ',', '.') ?>,-</td>
            </tr>
        </tbody>
    </table>

    <h5 class="mt-3">List Obat Dibawa Pulang</h5>
    <hr>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Obat</th>
                <th>Harga Satuan</th>
                <th>Qty</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody id="table-body-cppt">
            <?php
            $grandTotal2 = 0; // Inisialisasi grand total
            foreach ($listObatPulang as $item) {
                $subtotal = $item->total_qty * $item->harga; // Hitung subtotal
                $grandTotal2 += $subtotal; // Tambahkan subtotal ke grand total
            ?>
                <tr>
                    <td><?= htmlspecialchars($item->nama_obat) ?></td>
                    <td>Rp. <?= number_format($item->harga, 0, ',', '.') ?>,-</td>
                    <td><?= $item->total_qty ?></td>
                    <td>Rp. <?= number_format($subtotal, 0, ',', '.') ?>,-</td>
                </tr>
            <?php } ?>
            <tr>
                <td colspan="3" class="text-center bg-success text-white"><strong>Grand Total</strong></td>
                <td>Rp. <?= number_format($grandTotal2, 0, ',', '.') ?>,-</td>
            </tr>
        </tbody>
    </table>


    <h5 class="mt-3">List Biaya Layanan</h5>
    <hr>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Layanan</th>
                <th>Harga Satuan</th>
                <th>Qty</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody id="table-body-cppt">
            <?php
            $grandTotal3 = 0; // Inisialisasi grand total
            foreach ($listBiayaLayanan as $item) {
                $subtotal = $item->qty * $item->harga; // Hitung subtotal
                $grandTotal3 += $subtotal; // Tambahkan subtotal ke grand total
            ?>
                <tr>
                    <td><?= htmlspecialchars($item->nama_layanan) ?></td>
                    <td>Rp. <?= number_format($item->harga, 0, ',', '.') ?>,-</td>
                    <td><?= $item->qty ?></td>
                    <td>Rp. <?= number_format($subtotal, 0, ',', '.') ?>,-</td>
                </tr>
            <?php } ?>
            <tr>
                <td colspan="3" class="text-center bg-success text-white"><strong>Grand Total</strong></td>
                <td>Rp. <?= number_format($grandTotal3, 0, ',', '.') ?>,-</td>
            </tr>
        </tbody>
    </table>

    <p class="bg-primary text-white p-3" style="font-size: 18px;">Total Tagihan Keseluruhan : Rp. <?= number_format($grandTotal1 + $grandTotal2 + $grandTotal3) ?></p>



    <button type="button" class="btn btn-primary col-md-1 col-sm-2 col-lg-2" onclick="savePerincian()">Save</button>
    <a class="btn btn-danger col-md-1 col-sm-2 col-lg-2 triase-btn-print" target="_blank" href="<?= base_url('C_KunjunganRujukan/printFormPerincian/' . $pasienId) ?>">Cetak</a>


</form>