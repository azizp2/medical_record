<style>
  .center-table {
    margin: 0 auto;
    width: 100%;
  }
</style>

<table class="center-table" border="0">
    <tr style="width: 100px;">
        <td colspan="3" align="center"><b>PERINCIAN RAWAT INAP</td>
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
        <td align="left" style="width:200px;"><b>Dokter Merawat</td>
        <td align="left"><b>: <?= $row['det_obat'][0]->diperiksa_oleh ?></td>
        <td align="center"><b></td>
    </tr>
    <tr>
        <td align="left" style="width:200px;"><b>Diagnosis</td>
        <td align="left"><b>
                S : <?= $row['hdr']->subjektif ?><br>
                O : <?= $row['hdr']->objektif ?><br>
                A : <?= $row['hdr']->assesment ?><br>
                P : <?= $row['hdr']->planning ?><br>
        </td>
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
    $total = 0;
    ?>
<tr>
    <td><?= $key +1 ?></td>
    <td><?= $obt->nama_obat ?></td>
    <td><?= $obt->qty ?></td>
    <td><?= $obt->satuan ?></td>
    <td>Rp. <?= number_format($obt->harga, '2','.') ?></td>
    <td>Rp. <?= number_format($obt->harga * $obt->qty, '2','.') ?></td>
</tr>
<?php
    $total += $obt->harga * $obt->qty;
endforeach; ?>
<tr>
    <td colspan="6" align="center"><b>Obat Obatan & BHP</b></td>
</tr>
<?php foreach($row['det_layanan'] as $key => $obt): 
    $total2 = 0;
    ?>
<tr>
    <td><?= $key +1 ?></td>
    <td><?= $obt->nama_layanan ?></td>
    <td><?= $obt->qty ?></td>
    <td><?= $obt->satuan ?></td>
    <td>Rp. <?= number_format($obt->harga, '2','.') ?></td>
    <td>Rp. <?= number_format($obt->harga * $obt->qty, '2','.') ?></td>
</tr>
<?php 
    $total2 += $obt->harga * $obt->qty;
endforeach; ?>
<tr>
    <td colspan="5" align="center"><b>Total </b></td>
    <td>Rp.  <?= number_format($total + $total2, '2', '.') ?></td>
</tr>
</table>


<table style="width: 100%;">
<tr>
<td style="width: 50%; text-align: center;">Adminstrasi</td>
    <td style="width: 50%;  text-align: center;">
        Pasien / Keluarga Pasien<br>
        Meulaboh, <?= date("d F Y") ?>
    </td>
</tr>
<tr>
    <td style="height: 60px;"></td>
</tr>
<tr>
<td style="width: 50%; text-align: center;"><b>Bayu</b></td>
<td style="width: 50%; text-align: center;"><b>( <?= $row['hdr']->nama_depan." ".$row['hdr']->nama_belakang ?>)</b></td>
    
</tr>
</table>