<!-- Responsive datatable examples -->
<link href="<?= base_url() ?>assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="<?= base_url() ?>assets/css/metismenu.min.css" rel="stylesheet" type="text/css">
<link href="<?= base_url() ?>assets/css/icons.css" rel="stylesheet" type="text/css">
<link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet" type="text/css">


<form id="form-data-cppt">
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
            $grandTotal = 0; // Inisialisasi grand total
            foreach ($listPemakaianObat as $item) {
                $subtotal = $item->total_qty * $item->harga; // Hitung subtotal
                $grandTotal += $subtotal; // Tambahkan subtotal ke grand total
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
                <td>Rp. <?= number_format($grandTotal, 0, ',', '.') ?>,-</td>
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
            $grandTotal = 0; // Inisialisasi grand total
            foreach ($listPemakaianObat as $item) {
                $subtotal = $item->total_qty * $item->harga; // Hitung subtotal
                $grandTotal += $subtotal; // Tambahkan subtotal ke grand total
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
                <td>Rp. <?= number_format($grandTotal, 0, ',', '.') ?>,-</td>
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
            $grandTotal = 0; // Inisialisasi grand total
            foreach ($listBiayaLayanan as $item) {
                $subtotal = $item->qty * $item->harga; // Hitung subtotal
                $grandTotal += $subtotal; // Tambahkan subtotal ke grand total
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
                <td>Rp. <?= number_format($grandTotal, 0, ',', '.') ?>,-</td>
            </tr>
        </tbody>
    </table>


</form>

<script>
    window.print();
</script>