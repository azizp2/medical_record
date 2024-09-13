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
        <td colspan="1" align="left" style="padding-left: 15px; width: 300px" >
            <font><b>KLINIK UTAMA PERMATA MEDIKA<br>
            <font>Jl. Imam Bonjol - Meulaboh - Aceh Barat<br>
            <font>Phone : 081361589973<br>
            <font>e-mail : klinikutamapermatamedika@yahoo.com<br>
            </td>
            <td colspan="1" width="" align="left" style=""><img width="100px" src="https://www.seekpng.com/png/detail/640-6408308_lambang-kemkes-logo-bakti-husada-vector.png"></td>
    </tr>
    <tr>
    <td colspan="4" align="center"><b>PERINCIAN BIAYA</td>
    </tr>
        <td colspan="4" align="center"><b>

        <?= getStatusPulang($row['hdr']->status_pulang) ?></td>
    </tr>

    <tr>
        <td style="height: 40px;"></td>
    </tr>
    <tr>
        <td align="left" style="width:200px;"><b>No RM</td>
        <td align="left"><b>: <?= $row['hdr']->id ?></td>
        <td align="center"><b></td>
    </tr>
    <tr>
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
        <td align="left"><b>: <?= $row['hdr']->subjektif ?></b></td>
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
</table>

<br>
<table style="border-collapse: collapse; width: 100%" border="1">
<tr>
    <th style="width: 10px;">No</th>
    <th>Description</th>
    <th>Jumlah</th>
    <th>Satuan</th>
    <th>Harga</th>
    <th>Total</th>
</tr>
<?php foreach($row['det_obat'] as $key => $obt): 
    // $total = 0;
    ?>
<tr>
    <td><?= $key +1 ?></td>
    <td><?= $obt->nama_obat ?></td>
    <td><?= $obt->qty ?></td>
    <td><?= $obt->satuan ?></td>
    <td>Rp. <?= number_format($obt->harga) ?></td>
    <td>Rp. <?= number_format($obt->harga * $obt->qty) ?></td>
</tr>
<?php
    $total += $obt->harga * $obt->qty;
endforeach; ?>
<tr>
    <td colspan="6" align="center"><b>Obat-Obatan & BMHP</b></td>
</tr>
<?php foreach($row['det_layanan'] as $key => $obt): 
    // $total2 = 0;
    ?>
<tr>
    <td><?= $key +1 ?></td>
    <td><?= $obt->nama_layanan ?></td>
    <td><?= $obt->qty ?></td>
    <td><?= $obt->satuan ?></td>
    <td>Rp. <?= number_format($obt->harga) ?></td>
    <td>Rp. <?= number_format($obt->harga * $obt->qty) ?></td>
</tr>
<?php 
    $total2 += $obt->harga * $obt->qty;
endforeach; ?>
<tr>
    <td colspan="5" align="center"><b>Total </b></td>
    <td>Rp.  <b><?= number_format($total + $total2) ?></b></td>
</tr>
</table>


<table style="width: 100%;">
<tr>
<td style="width: 23.3%; text-align: center;">Administrasi</td>
<td style="width: 23.3%; text-align: center; padding-top: 130px">Direktur Klinik Utama Permata Medika</td>
    <td style="width: 23.3%;  text-align: center;">
        Pasien / Keluarga Pasien<br>
        Meulaboh, <?= $row['hdr']->tgl_selesai ?>
    </td>
</tr>
<tr>
    <td style="height: 60px;"></td>
</tr>
<tr>
<td style="width: 23.3%; text-align: center;"><b>Klinik Utama Permata Medika</b></td>
<td style="width: 23.3%; text-align: center;"><b>dr. Destri Sanghadwi</b></td>
<td style="width: 23.3%; text-align: center;"><b>( <?= $row['hdr']->nama_depan." ".$row['hdr']->nama_belakang ?>)</b></td>
    
</tr>
</table>