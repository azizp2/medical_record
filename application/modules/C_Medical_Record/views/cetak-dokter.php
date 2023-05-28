<style>
  .center-table {
    margin: 0 auto;
    width: 100%;
  }
</style>

<table class="center-table" border="0">
    <tr style="width: 100px;">
        <td colspan="3" align="center"><b>PERINCIAN RAWAT INAP - KLINIK UTAMA PERMATA MEDIKA</td>
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
        <td align="left" style="width:200px;"><b>Dokter Yang Merawat</td>
        <td align="left"><b>: <?= $row['det_obat'][0]->diperiksa_oleh ?></td>
        <td align="center"><b></td>
    </tr>
    <tr>
        <td align="left" style="width:200px;"><b>Diagnosa</td>
        <td align="left"><b>
                S : <?= $row['hdr']->subjektif ?><br>
                O : <?= $row['hdr']->objektif ?><br>
                A : <?= $row['hdr']->assesment ?><br>
                P : <?= $row['hdr']->planning ?><br>
        </td>
        <td align="center"><b></td>
    </tr>

</table>

<br>
<table style="border-collapse: collapse; width: 100%" border="1">
<tr>
    <th style="width: 10px;">No</th>
    <th>Description</th>
</tr>
<?php foreach($row['det_obat'] as $key => $obt): 
    // $total = 0;
    ?>
<tr>
    <td><?= $key +1 ?></td>
    <td><?= $obt->nama_obat ?></td>
</tr>
<?php
endforeach; ?>
