<style>
  .center-table {
    margin: 0 auto;
    width: 100%;
  }
</style>

<table class="center-table" border="0">
    <tr style="width: 100px;">
    <tr style="width: 100px;">
        <td colspan="1" align="left"></td>
        <td colspan="1" width="100px" align="left" style="padding-left: 140px;"><img src="<?= base_url('assets/images/logokop.png') ?>"></td>
        <td colspan="1" align="left" style="padding-left: 15px;">
            <font><b>KLINIK UTAMA PERMATA MEDIKA<br>
            <font>Jl. Imam Bonjol - Meulaboh - Aceh Barat<br>
            <font>Phone : 081361589973<br>
            <font>e-mail : klinikutamapermatamedika@yahoo.com<br>
            </td>
    </tr>
    <tr>
    <td colspan="3" align="center"><b>RESUME DOKTER</td>
    </tr>
        <td colspan="3" align="center"><b>  <?= getStatusPulang($row['hdr']->status_pulang) ?></td></td>
    </tr>

    <tr>
        <td style="height: 40px;"></td>
    </tr>
    <tr>
        <td align="left" style="width:200px;"><b>No RM</td>
        <td align="left"><b>: <?= $row['hdr']->id ?></td>
        <td align="center"><b></td>
    </tr>
    <td align="left" style="width:200px;"><b>Nama</td>
        <td align="left"><b>: <?= $row['hdr']->nama_depan ." ".$row['hdr']->nama_belakang?></td>
        <td align="center"><b></td>
    </tr>
    <td align="left" style="width:200px;"><b>NIK</td>
        <td align="left"><b>: <?= $row['hdr']->nik ?></td>
        <td align="center"><b></td>
    </tr>
    <tr>
        <td align="left" style="width:200px;"><b>Umur</td>
        <td align="left"><b>: <?= $row['hdr']->umur ?> Tahun</td>
        <td align="center"><b></td>
    </tr>
    <tr>
        <td align="left" style="width:200px;"><b>Kamar</td>
        <td align="left"><b>:  <?= $row['hdr']->kamar ?></td>
        <td align="center"><b></td>
    </tr>
    <tr>
        <td align="left" style="width:200px;"><b>Alamat</td>
        <td align="left"><b>: <?= $row['hdr']->alamat ?></td>
        <td align="center"><b></td>
    </tr>
    <tr>
        <td align="left" style="width:200px;"><b>Dokter Yang Merawat/Memeriksa</td>
        <td align="left"><b>: <?= $row['det_obat'][0]->diperiksa_oleh ?></td>
        <td align="center"><b></td>
    </tr>
    <tr>
        <td align="left" style="width:200px;"><b>Diagnosa 1</td>
        <td align="left"><b> : <?= $row['hdr']->objektif ?></b></td>
        <td align="center"><b></td>
    </tr>
    <tr>
        <td align="left" style="width:200px;"><b>Diagnosa 2</td>
        <td align="left"><b> : <?= $row['hdr']->subjektif ?></b></td>
        <td align="center"><b></td>
    </tr>
    <tr>
        <td align="left" style="width:200px;"><b>Tanggal Masuk</td>
        <td align="left"><b>: <?= $row['hdr']->create_date ?></td>
        <td align="center"><b></td>
    </tr>
    <tr>
        <td align="left" style="width:200px;"><b>Tanggal Keluar</td>
        <td align="left"><b>: <?= $row['hdr']->tgl_selesai ?></td>
        <td align="center"><b></td>
    </tr>
  <tr>
        <td align="left" style="width:200px;"><b>Keluhan</td>
        <td align="left"><b>:  <?= $row['hdr']->keluhan ?></td>
        <td align="center"><b></td>
    </tr>
        <tr>
        <td align="left" style="width:200px;"><b>SPO2</td>
        <td align="left"><b>:  <?= $row['hdr']->spo2 ?></td>
        <td align="center"><b></td>
    </tr>
    <tr>
        <td align="left" style="width:200px;"><b>Tinggi Badan</td>
        <td align="left"><b>:  <?= $row['hdr']->tinggi_badan ?></td>
        <td align="center"><b></td>
    </tr>
    <tr>
        <td align="left" style="width:200px;"><b>Berat Badan</td>
        <td align="left"><b>:  <?= $row['hdr']->berat_badan ?></td>
        <td align="center"><b></td>
    </tr>
    <tr>
        <td align="left" style="width:200px;"><b>Tekanan Darah</td>
        <td align="left"><b>:  <?= $row['hdr']->tekanan_darah ?></td>
        <td align="center"><b></td>
    </tr>
    <tr>
        <td align="left" style="width:200px;"><b>Pernapasan</td>
        <td align="left"><b>:  <?= $row['hdr']->pernapasan ?></td>
        <td align="center"><b></td>
    </tr>
    <tr>
        <td align="left" style="width:200px;"><b>Detak Jantung</td>
        <td align="left"><b>:  <?= $row['hdr']->detak_jantung ?></td>
        <td align="center"><b></td>
    </tr>
    <tr>
        <td align="left" style="width:200px;"><b>Suhu Tubuh</td>
        <td align="left"><b>:  <?= $row['hdr']->suhu_tubuh ?></td>
        <td align="center"><b></td>
    </tr>
    <tr>
        <td align="left" style="width:200px;"><b>Nilai DM</td>
        <td align="left"><b>:  <?= $row['hdr']->dm ?></td>
        <td align="center"><b></td>
    </tr>
    <tr>
        <td align="left" style="width:200px;"><b>Nilai Kolestrol</td>
        <td align="left"><b>:  <?= $row['hdr']->kolestrol ?></td>
        <td align="center"><b></td>
    </tr>
    <tr>
        <td align="left" style="width:200px;"><b>Nilai Asam Urat</td>
        <td align="left"><b>:  <?= $row['hdr']->asam_urat ?></td>
        <td align="center"><b></td>
    </tr>

</table>

<br>
<table style="border-collapse: collapse; width: 100%" border="1">
<tr>
    <th style="width: 10px;">No</th>
    <th>Description</th>
    <th>Qty</th>
    <th>Satuan</th>
</tr>
<?php foreach($row['det_obat'] as $key => $obt): 
    // $total = 0;
    ?>
<tr>
    <td><?= $key +1 ?></td>
    <td><?= $obt->nama_obat ?></td>
    <td><?= $obt->qty ?></td>
    <td><?= $obt->satuan ?></td>
</tr>
<?php
endforeach; ?>
