<?php
$listCheckedTrauma = explode(', ', $getTriase->trauma);

function isChecked($value, $listCheckedTrauma)
{
    return in_array($value, $listCheckedTrauma) ? 'checked' : '';
}

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


<ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
        <a class="nav-link active assesmen" data-id="<?= $pasienId ?>" data-toggle="tab" href="#assesmen" role="tab">
            <span class="d-none d-md-block">Asesmen Awal IGD</span><span class="d-block d-md-none"><i class="mdi mdi-home-variant h5"></i></span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link skreningNyeri" data-id="<?= $pasienId ?>" data-toggle="tab" href="#skreningNyeri" role="tab">
            <span class="d-none d-md-block">Skreening Nyeri</span><span class="d-block d-md-none"><i class="mdi mdi-account h5"></i></span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link resikoJatuh" data-id="<?= $pasienId ?>" data-toggle="tab" href="#resikoJatuh" role="tab">
            <span class="d-none d-md-block">Resiko Jatuh</span><span class="d-block d-md-none"><i class="mdi mdi-email h5"></i></span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link serahTerima" data-id="<?= $pasienId ?>" data-toggle="tab" href="#serahTerima" role="tab">
            <span class="d-none d-md-block">Serah Terima</span><span class="d-block d-md-none"><i class="mdi mdi-settings h5"></i></span>
        </a>
    </li>
</ul>

<form id="form-data-triase">

    <input type="hidden" name="rujukan_id" id="triase-rujukan-id" value="<?= $getPasien->idx ?>">

    <div class="tab-content">
        <!-- Info Pasien -->
        <div class="tab-pane active p-3" id="assesmen" role="tabpanel">

            <span class="d-block mt-3"></span>



            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Waktu Pasien Datang</label>
                        <div>

                            <?php
                            if ($getTriase->waktu_pasien_datang != null) {
                                $waktuPasienDatang = date('Y-m-d\TH:i', strtotime($getTriase->waktu_pasien_datang));
                            } else {
                                $waktuPasienDatang = date('Y-m-d\TH:i');
                            } ?>




                            <input type="datetime-local" class="form-control" name="waktu_pasien_datang" value="<?= $waktuPasienDatang ?>">

                        </div>
                    </div>

                    <div class="form-group">
                        <label>Cara Pasien Datang</label>
                        <div>
                            <select class="form-control" name="cara_pasien_datang">
                                <option>...</option>
                                <option <?= $getTriase->cara_pasien_datang == "Datang Sendiri" ? "selected" : "" ?>>Datang Sendiri</option>
                                <option <?= $getTriase->cara_pasien_datang == "Diantar Polisi" ? "selected" : "" ?>>Diantar Polisi</option>
                                <option <?= $getTriase->cara_pasien_datang == "Ambulance" ? "selected" : "" ?>>Ambulance</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Keluhan Utama</label>
                        <div>
                            <textarea cols="2" class="form-control" name="keluhan_utama"><?= $getTriase->keluhan_utama ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Riwayat Penyakit Terdahulu</label>
                        <div>
                            <textarea cols="2" class="form-control" name="riwayat_penyakit_sebelumnya"><?= $getTriase->riwayat_penyakit_sebelumnya ?></textarea>
                        </div>
                    </div>
                </div>
            </div>


            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Trauma" name="trauma[]" id="trauma" <?php echo isChecked('Trauma', $listCheckedTrauma) ?>>
                <label class="form-check-label" for="trauma">
                    Trauma
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Non Trauma" id="nonTrauma" name="trauma[]" <?php echo isChecked('Non Trauma', $listCheckedTrauma); ?>>
                <label class="form-check-label" for="nonTrauma">
                    Non Trauma
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Obstetri" id="obstetri" name="trauma[]" <?php echo isChecked('Obstetri', $listCheckedTrauma); ?>>
                <label class="form-check-label" for="obstetri">
                    Obstetri
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Infeksius" id="infeksius" name="trauma[]" <?php echo isChecked('Infeksius', $listCheckedTrauma); ?>>
                <label class="form-check-label" for="infeksius">
                    Infeksius
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Pediatri" id="pediatri" name="trauma[]" <?php echo isChecked('Pediatri', $listCheckedTrauma); ?>>
                <label class="form-check-label" for="pediatri">
                    Pediatri
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Nenatatus" id="nenatatus" name="trauma[]" <?php echo isChecked('Nenatatus', $listCheckedTrauma); ?>>
                <label class="form-check-label" for="nenatatus">
                    Nenatatus
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Doa" id="doa" name="trauma[]" <?php echo isChecked('Doa', $listCheckedTrauma); ?>>
                <label class="form-check-label" for="doa">
                    Doa
                </label>
            </div>
            <div class="row col-md-12 mt-4">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col" style="background-color:green; color: white">Hijau</th>
                            <th scope="col" style="background-color:yellow; color: black">Kuning</th>
                            <th scope="col" style="background-color:red; color: white">Merah</th>
                            <th scope="col" style="background-color:black; color: white">Hitam</th>
                            <th scope="col">Tanda Vita</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row"></td>
                            <td>Tidak Darurat.<br>Respon Time: 25 Menit</td>
                            <td>Urgent / Darurat.<br>Respon Time: 15 Menit</td>
                            <td>Resusitasi<br>Respon Time: SEGERA</td>
                            <td>Respon Time: SEGERA</td>
                            <td>Keadaan Umum</td>
                        </tr>
                        <tr>
                            <td scope="row"><strong>AIRWAY</strong>
                                <input name="type[]" value="AIRWAY" hidden>
                            </td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="Tidak Paten" name="lbl_hijau_airway" id="airway-lbl_hijau" <?= $getTriaseDet[0]->hijau == "Tidak Paten" ? 'checked'  : '' ?>>
                                    <label class="form-check-label" for="airway-lbl_hijau">Tidak Paten</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="Paten" name="lbl_hijau_airway" id="airway-lbl_hijau" <?= $getTriaseDet[0]->hijau == "Paten" ? 'checked'  : '' ?>>
                                    <label class="form-check-label" for="airway-lbl_hijau">Paten</label>
                                </div>
                            </td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="Tidak Paten" name="lbl_kuning_airway" id="airway-lbl_kuning" <?= $getTriaseDet[0]->kuning == "Tidak Paten" ? 'checked'  : '' ?>>
                                    <label class="form-check-label" for="airway-lbl_kuning">Tidak Paten</label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="Paten" name="lbl_kuning_airway" id="airway-lbl_kuning" <?= $getTriaseDet[0]->kuning == "Paten" ? 'checked'  : '' ?>>
                                    <label class="form-check-label" for="airway-lbl_kuning">Paten</label>
                                </div>
                            </td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="Sumbatan Total" name="lbl_merah_airway" id="merah-sumbatan-total" <?= $getTriaseDet[0]->merah == "Sumbatan Total" ? 'checked'  : '' ?>>
                                    <label class="form-check-label" for="merah-sumbatan-total">Sumbatan Total </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="Sumbatan Sebagian" name="lbl_merah_airway" id="merah-sumbatan-sebagian" <?= $getTriaseDet[0]->merah == "Sumbatan Sebagian" ? 'checked'  : '' ?>>
                                    <label class="form-check-label" for="merah-sumbatan-sebagian">Sumbatan Sebagian <?= $getTriaseDet[0]->merah ?>test</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="Paten" name="lbl_merah_airway" id="merah-paten" <?= $getTriaseDet[0]->merah == "Paten" ? 'checked'  : '' ?>>
                                    <label class="form-check-label" for="merah-paten">Paten</label>
                                </div>
                            </td>
                            <td>
                                <input class="form-control" name="response_time_airway" value="<?= $getTriaseDet[0]->hitam ?>">
                            </td>
                            <td>BB: <input class="form-control" name="bb_airway" value="<?= $getTriaseDet[0]->bb ?>"></td>
                        </tr>
                        <tr>
                            <td scope="row"><strong>Breathing</strong>
                                <input name="type[]" value="Breathing" hidden>
                            </td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="Frekuensi Nafas Total" name="lbl_hijau_breathing" id="breathing-lbl_hijau" <?= $getTriaseDet[1]->hijau == "Frekuensi Nafas Total" ? 'checked'  : '' ?>>
                                    <label class="form-check-label" for="breathing-lbl_hijau">Frekuensi Nafas Total</label>
                                </div>
                            </td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="Distres Pernapasan Ringan RR>30x/Menit" name="lbl_kuning_breathing" id="breathing-lbl_kuning" <?= $getTriaseDet[1]->kuning == "Distres Pernapasan Ringan RR>30x/Menit" ? 'checked'  : '' ?>>
                                    <label class="form-check-label" for="breathing-lbl_kuning">Distres Pernapasan Ringan RR>30x/Menit</label>
                                </div>
                            </td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="lbl_merah_breathing" value="Sumbatan Total" id="breathing-sumbatan-total" <?= $getTriaseDet[1]->merah == "Sumbatan Total" ? 'checked'  : '' ?>>
                                    <label class="form-check-label" for="breathing-sumbatan-total">Sumbatan Total</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="lbl_merah_breathing" value="Sumbatan Sebagian" id="breathing-sumbatan-sebagian" <?= $getTriaseDet[1]->merah == "Sumbatan Sebagian" ? 'checked'  : '' ?>>
                                    <label class="form-check-label" for="breathing-sumbatan-sebagian">Sumbatan Sebagian</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="RR > 30x/Menit" name="lbl_merah_breathing" id="breathing-rr-30" <?= $getTriaseDet[1]->merah == "RR > 30x/Menit" ? 'checked'  : '' ?>>
                                    <label class="form-check-label" for="breathing-rr-30">RR > 30x/Menit</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="lbl_merah_breathing" value="Penggunaan Otot Bantuan Napas" id="breathing-otot-bantuan" <?= $getTriaseDet[1]->merah == "Penggunaan Otot Bantuan Napas" ? 'checked'  : '' ?>>
                                    <label class="form-check-label" for="breathing-otot-bantuan">Penggunaan Otot Bantuan Napas</label>
                                </div>
                            </td>
                            <td>
                                <input class="form-control" name="response_time_breathing" value="<?= $getTriaseDet[1]->hitam ?>">
                            </td>
                            <td>
                                TD: <input class="form-control" name="td_breathing" value="<?= $getTriaseDet[1]->td ?>"><br>
                                HR: <input class="form-control" name="hr_breathing" value="<?= $getTriaseDet[1]->hr ?>"><br>
                                RR: <input class="form-control" name="rr_breathing" value="<?= $getTriaseDet[1]->rr ?>"><br>
                                TEMO: <input class="form-control" name="temo_breathing" value="<?= $getTriaseDet[1]->temo ?>"><br>
                            </td>
                        </tr>
                        <tr>
                            <td scope="row">
                                <strong>Circulation</strong>
                                <input name="type[]" value="Circulation" hidden>

                            </td>
                            <td>Tidak Ada Gangguan Hemodinamik</td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="Nadi Teraba (Lemah/Kuat)" name="lbl_kuning_circulation" id="nadi-teraba" <?= $getTriaseDet[2]->kuning == "Nadi Teraba (Lemah/Kuat)" ? 'checked'  : '' ?>>
                                    <label class="form-check-label" for="nadi-teraba">Nadi Teraba (Lemah/Kuat)</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="Pendarahan > 2 Detik" name="lbl_kuning_circulation" id="pendarahan-2detik" <?= $getTriaseDet[2]->kuning == "Pendarahan > 2 Detik" ? 'checked'  : '' ?>>
                                    <label class="form-check-label" for="pendarahan-2detik">Pendarahan > 2 Detik</label>
                                </div>
                            </td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="Nadi tidak teraba" name="lbl_merah_circulation" id="nadi-tidak-teraba" <?= $getTriaseDet[2]->merah == "Nadi tidak teraba" ? 'checked'  : '' ?>>
                                    <label class="form-check-label" for="nadi-tidak-teraba">Nadi tidak teraba</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="Perdarahan yang tidak terkontrol (Perdarahan aktif)" name="lbl_merah_circulation" id="pendarahan-aktif" <?= $getTriaseDet[2]->merah == "Perdarahan yang tidak terkontrol (Perdarahan aktif)" ? 'checked'  : '' ?>>
                                    <label class="form-check-label" for="pendarahan-aktif">Perdarahan yang tidak terkontrol (Perdarahan aktif)</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="Perdarahan kapiler > 2 Detik" name="lbl_merah_circulation" id="pendarahan-kapiler" <?= $getTriaseDet[2]->merah == "Perdarahan kapiler > 2 Detik" ? 'checked'  : '' ?>>
                                    <label class="form-check-label" for="pendarahan-kapiler">Perdarahan kapiler > 2 Detik</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="Nadi tidak teraba / Sangat halus" name="lbl_merah_circulation" id="nadi-sangat-halus" <?= $getTriaseDet[2]->merah == "Nadi tidak teraba / Sangat halus" ? 'checked'  : '' ?>>
                                    <label class="form-check-label" for="nadi-sangat-halus">Nadi tidak teraba / Sangat halus</label>
                                </div>
                            </td>
                            <td>
                                <input class="form-control" name="response_time_circulation" value="<?= $getTriaseDet[2]->hitam ?>">
                            </td>
                            <td>
                                Imunisasi Anak:
                                <select class=" form-control" name="imunisasi_anak">
                                    <option>...</option>
                                    <option <?= $getTriaseDet[2]->imunisasi == "Ya" ? 'selected'  : '' ?>>Ya</option>
                                    <option <?= $getTriaseDet[2]->imunisasi == "Tidak" ? 'selected'  : '' ?>>Tidak</option>
                                </select><br>
                                Riwayat Alergi: <input class="form-control" name="riwayat_alergi" value="<?= $getTriaseDet[2]->riwayat_alergi ?>"><br>
                                Makanan: <input class="form-control" name="makanan" value="<?= $getTriaseDet[2]->makanan ?>"><br>
                                Obat: <input class="form-control" name="obat" value="<?= $getTriaseDet[2]->obat ?>"><br>
                                Lainnya: <input class="form-control" name="lainnya" value="<?= $getTriaseDet[2]->lainnya ?>"><br>
                            </td>
                        </tr>
                        <tr>
                            <td scope="row">
                                <strong>Disability</strong>
                                <input name="type[]" value="Disability" hidden>

                            </td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="GCS 15" name="lbl_hijau_disability" id="gcs-15" <?= $getTriaseDet[3]->hijau == "GCS 15" ? 'checked'  : '' ?>>
                                    <label class="form-check-label" for="gcs-15">GCS 15</label>
                                </div>
                            </td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="GCS 12-14" name="lbl_kuning_disability" id="gcs-12-14" <?= $getTriaseDet[3]->kuning == "GCS 12-14" ? 'checked'  : '' ?>>
                                    <label class="form-check-label" for="gcs-12-14">GCS 12-14</label>
                                </div>
                            </td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="GCS < 12" name="lbl_merah_disability" id="gcs-kurang-12" <?= $getTriaseDet[3]->merah == "GCS < 12" ? 'checked'  : '' ?>>
                                    <label class="form-check-label" for="gcs-kurang-12">GCS < 12</label>
                                </div>
                            </td>
                            <td colspan="2"></td>
                        </tr>
                    </tbody>
                </table>

            </div>



        </div>

        <div class="tab-pane fade p-3" id="skreningNyeri" role="tabpanel">
            <span class="d-block mt-3"></span>

            <?php $d = $row['hdr']; ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nyeri</label>
                        <div>
                            <select class="form-control" name="nyeri">
                                <option>...</option>
                                <option <?= $getTriaseSkrining->nyeri == "Ya" ? 'selected' : '' ?>>Ya</option>
                                <option <?= $getTriaseSkrining->nyeri == "Tidak" ? 'selected' : '' ?>>Tidak</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Jenis</label>
                        <div>
                            <select class="form-control" name="jenis">
                                <option>...</option>
                                <option <?= $getTriaseSkrining->jenis == "Akut" ? 'selected' : '' ?>>Akut</option>
                                <option <?= $getTriaseSkrining->jenis == "Kronik" ? 'selected' : '' ?>>Kronik</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Lokasi Nyeri</label>
                        <div>
                            <textarea cols="2" class="form-control" name="lokasi_nyeri"><?= $getTriaseSkrining->lokasi_nyeri ?> </textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Skor Nyeri</label>
                        <div>
                            <select class="form-control" name="skor_nyeri">
                                <option>...</option>
                                <option <?= $getTriaseSkrining->skor_nyeri == "Tidak Nyeri" ? 'selected' : '' ?>>Tidak Nyeri</option>
                                <option <?= $getTriaseSkrining->skor_nyeri == "Ringan (1-3)" ? 'selected' : '' ?>>Ringan (1-3)</option>
                                <option <?= $getTriaseSkrining->skor_nyeri == "Sedang (4-6)" ? 'selected' : '' ?>>Sedang (4-6)</option>
                                <option <?= $getTriaseSkrining->skor_nyeri == "Berat (7-9)" ? 'selected' : '' ?>>Berat (7-9)</option>
                                <option <?= $getTriaseSkrining->skor_nyeri == "Sangat Berat (10)" ? 'selected' : '' ?>>Sangat Berat (10)</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="tab-pane fade p-3" id="resikoJatuh" role="tabpanel">
            <span class="d-block mt-3"></span>

            <?php $d = $row['hdr']; ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Resiko Jatuh</label>
                        <div>
                            <select class="form-control" name="resiko_jatuh">
                                <option>...</option>
                                <option <?= $getTriaseResikoJatuh->resiko_jatuh == "Ya" ? 'selected' : '' ?>>Ya</option>
                                <option <?= $getTriaseResikoJatuh->resiko_jatuh == "Tidak" ? 'selected' : '' ?>>Tidak</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Diagnosa Sementara</label>
                        <div>
                            <textarea cols="2" class="form-control" name="diagnosa_sementara"><?= $getDianosaSementara ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Rencana Tindak Lanjut</label>
                        <div>
                            <select class="form-control" name="rencana_tindak_lanjut">
                                <option>...</option>
                                <option <?= $getTriaseResikoJatuh->rencana_tindak_lanjut == "Pulang Berobat Jalan" ? 'selected' : '' ?>>Pulang Berobat Jalan</option>
                                <option <?= $getTriaseResikoJatuh->rencana_tindak_lanjut == "Pulang Atas Permintaan Sendiri" ? 'selected' : '' ?>>Pulang Atas Permintaan Sendiri</option>
                                <option <?= $getTriaseResikoJatuh->rencana_tindak_lanjut == "Meninggal" ? 'selected' : '' ?>>Meninggal</option>
                                <option <?= $getTriaseResikoJatuh->rencana_tindak_lanjut == "Diserahkan Kedokter Jaga" ? 'selected' : '' ?>>Diserahkan Kedokter Jaga</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Tanggal</label>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <input type="date" class="form-control" name="tanggal" value="<?= $getTriaseResikoJatuh->tanggal ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane fade p-3" id="serahTerima" role="tabpanel">
            <span class="d-block mt-3"></span>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nama & Tanda Terima Dokter Triase</label>
                        <div>
                            <select class="form-control" name="dokter_triase">
                                <option>...</option>
                                <?php foreach ($listDokter as $item): ?>
                                    <option <?= $item->nama == "$getTriaseSerahTerima->dokter_triase" ? 'selected' : '' ?>>
                                        <?= $item->nama ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nama & Tanda Terima Dokter Jaga</label>
                        <div>
                            <select class="form-control" name="dokter_jaga">
                                <option value="">...</option>
                                <?php foreach ($listDokter as $item): ?>
                                    <option <?= isset($getTriaseSerahTerima) && $item->nama == "$getTriaseSerahTerima->dokter_jaga" ? 'selected' : '' ?>>
                                        <?= $item->nama ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nama Perawat Triase</label>
                        <div>
                            <select class="form-control" name="perawat_triase">
                                <option value="">...</option>
                                <?php foreach ($listPerawat as $item): ?>
                                    <option <?= isset($getTriaseSerahTerima) && $item->nama == "$getTriaseSerahTerima->perawat_triase" ? 'selected' : '' ?>>
                                        <?= $item->nama ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <!-- <input type="" class="form-control" name="perawat_triase" value="<?= $getTriaseSerahTerima->perawat_triase ?>"> -->
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nama Perawat Jaga</label>
                        <div>
                            <select class="form-control" name="perawat_jaga">
                                <option value="">...</option>
                                <?php foreach ($listPerawat as $item): ?>
                                    <option <?= isset($getTriaseSerahTerima) && $item->nama == "$getTriaseSerahTerima->perawat_jaga" ? 'selected' : '' ?>>
                                        <?= $item->nama ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>

                            <!-- <input type="" class="form-control" name="perawat_jaga" value="<?= $getTriaseSerahTerima->perawat_jaga ?>"> -->
                        </div>
                    </div>
                </div>
            </div>




            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Edukasi Pasien</label>
                        <div>
                            <textarea rows="5" class="form-control" name="edukasi_pasien"><?= $getTriaseSerahTerima->edukasi_pasien ?></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Tanggal</label>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <?php
                                if ($getTriaseSerahTerima->tanggal != null) {
                                    $tanggal = date('Y-m-d\TH:i', strtotime($getTriaseSerahTerima->tanggal));
                                } else {
                                    $tanggal = date('Y-m-d\TH:i');
                                }
                                ?>
                                <input type="datetime-local" class="form-control" name="tanggal" value="<?= $tanggal ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class=" row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Pasien/Keluarga/Orang Tua</label>
                        <div>
                            <input class="form-control" name="keluarga_pasien" value="<?= $getTriaseSerahTerima->keluarga_pasien ?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Yang Memberikan Informasi</label>
                        <div>
                            <select class="form-control" name="infomasi_by">
                                <option>...</option>
                                <?php foreach ($listDokter as $item): ?>
                                    <option <?= isset($getTriaseSerahTerima) && $item->nama == "$getTriaseSerahTerima->infomasi_by" ? 'selected' : '' ?>>
                                        <?= $item->nama ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>





        </div>
        <hr>
        <button type="button" class="btn btn-primary col-md-1 col-sm-2 col-lg-2" onclick="saveTriase()">Save</button>
        <a class="btn btn-danger col-md-1 col-sm-2 col-lg-2 triase-btn-print" target="_blank" href="<?= base_url('C_KunjunganRujukan/printFormTriase/' . $pasienId . '/assesmen') ?>">Cetak</a>

    </div>