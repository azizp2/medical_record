<style>
    .opacity-50 {
        opacity: 0.5;
    }

    .pointer-events-none {
        pointer-events: none;
    }
</style>
<div class="row">
    <div class="col-xl-12">
        <div class="card m-b-30">
            <div class="card-body">

                <h4 class="mt-0 header-title">Rekam Medis</h4>
                <hr>
                <p class="sub-title">Use the tab JavaScript plugin—include
                    it individually or through the compiled <code class="highlighter-rouge">bootstrap.js</code>
                    file—to extend our navigational tabs and pills to create tabbable panes
                    of local content, even via dropdown menus.</p>

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#home" role="tab">
                            <span class="d-none d-md-block">Data Pasien</span><span class="d-block d-md-none"><i class="mdi mdi-home-variant h5"></i></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#profile" role="tab">
                            <span class="d-none d-md-block">Anamnesis</span><span class="d-block d-md-none"><i class="mdi mdi-account h5"></i></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#messages" role="tab">
                            <span class="d-none d-md-block">Diagnosis</span><span class="d-block d-md-none"><i class="mdi mdi-email h5"></i></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#settings" role="tab">
                            <span class="d-none d-md-block">Tindakan dan Pengobatan</span><span class="d-block d-md-none"><i class="mdi mdi-settings h5"></i></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#finish" role="tab">
                            <span class="d-none d-md-block">Selesai</span><span class="d-block d-md-none"><i class="mdi mdi-settings h5"></i></span>
                        </a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <form class="form-data">
                <div class="tab-content">
                    <!-- Info Pasien -->
                    
                        <div x-data="{ pasienLama: true, pasienBaru: false, showPilihPasien: false }" class="tab-pane active p-3" id="home" role="tabpanel">
                            <div class="row">
                                <!-- <div class="col-md-6">
                                    <div x-bind:class="{ 'alert alert-primary mb-0 opacity-50 pointer-events-none': pasienLama, 'alert alert-primary mb-0': !pasienLama }" role="alert" x-on:click="pasienLama = true; pasienBaru = false; showPilihPasien = false">
                                        <h4 class="alert-heading mt-10 font-18">Pasien Lama</h4>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div x-bind:class="{ 'alert alert-success mb-0 opacity-50 pointer-events-none': pasienBaru, 'alert alert-success mb-0': !pasienBaru }" role="alert" x-on:click="pasienLama = false; pasienBaru = true; showPilihPasien = true">
                                        <h4 class="alert-heading mt-10 font-18">Pasien Baru</h4>
                                    </div>
                                </div> -->
                            </div>

                            <hr>

                            <span class="d-block mt-3"></span>
                            
                            <div x-show="showPilihPasien" class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div> 
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php $d = $row['hdr']; ?>
                            <div class="row" x-show="!showPilihPasien">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tanggal Kunjungan</label>
                                        <div>
                                            <input type="datetime-local" name="create_date" class="form-control" value="<?php echo date("Y-m-d\TH:i:s"); ?>">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" x-show="!showPilihPasien">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>NIK</label>
                                        <div>
                                            <input  name="nik" class="form-control" value="<?php echo $d->nik ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>No Rkm</label>
                                        <div>
                                            <input  name="id" class="form-control" value="<?php echo $d->id ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" x-show="!showPilihPasien">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Depan</label>
                                        <div>
                                            <input type="text" name="nama_depan" class="form-control" value="<?php echo $d->nama_depan ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Belakang</label>
                                        <div>
                                            <input type="text" name="nama_belakang" class="form-control" value="<?php echo $d->nama_belakang ?>">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Umur</label>
                                        <div>
                                            <input type="text" name="umur" class="form-control" value="<?php echo $d->umur ?>">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" x-show="!showPilihPasien">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <div>
                                            <select class="form-control" name="gender">
                                                <option disabled selected>...</option>

                                                <option <?= $d->gender == 'Pria' ? "selected" : "" ?>>Pria</option>
                                                <option <?= $d->gender == 'Wanita' ? "selected" : "" ?>>Wanita</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Golongan Darah</label>
                                        <div>
                                            <select class="form-control" name="golongan_darah">
                                                <option disabled selected>...</option>
                                                <option <?= $d->gender == 'A' ? "selected" : "" ?>>A</option>
                                                <option <?= $d->gender == 'B' ? "selected" : "" ?>>B</option>
                                                <option <?= $d->gender == 'AB' ? "selected" : "" ?>>AB</option>
                                                <option <?= $d->gender == 'O' ? "selected" : "" ?>>O</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" x-show="!showPilihPasien">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <div>
                                            <textarea name="alamat" id="" class="form-control" cols="10" rows="3" placeholder="alamat lengkap pasien"><?= $d->alamat ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Catatan</label>
                                        <div>
                                            <textarea name="catatan" id="" class="form-control" cols="10" rows="3" placeholder="isi keterangan pasien mengenai riwayat medis, alergi dsb "><?= $d->catatan_pasien ?></textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <hr>
                            <!-- <button type="button" class="btn btn-primary col-md-1 col-sm-2 col-lg-2 btn-pasien">Save</button> -->
                            <a type="button" class="btn btn-warning btn-sm col-md-2 col-lg-2 col-sm-3" style="padding: 7px;" href="<?= base_url('C_Medical_Record') ?>">Create New</a>

                            <a class="btn btn-primary  col-md-1 col-sm-2 col-lg-2" data-toggle="tab" href="#profile" role="tab">Next</a>
                            <button type="button" class="btn btn-success col-md-1 col-sm-2 col-lg-2 btn-find">Find</button>
                            <a class="btn btn-danger col-md-1 col-sm-2 col-lg-2" <?= isset($edit) ? "" : "hidden" ?> target="_blank" href="<?= base_url("C_Medical_Record/cetak/$id") ?>" >Cetak</a>

                        </div>
                    <!-- Info Pasien -->

                    <!-- Anamensa -->
                        <div class="tab-pane p-3" id="profile" role="tabpanel">
                            <div class="row" x-show="!showPilihPasien">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Keluhan Pasien</label>
                                        <div>
                                            <textarea name="keluhan" id="" class="form-control" cols="10" rows="3" placeholder="isi keluhan pasien"><?= $d->keluhan ?></textarea>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h5>Pemeriksaan Fisik</h5>
                            <hr>
                            <div class="row" x-show="!showPilihPasien">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tinggi Badan (cm)</label>
                                        <div>
                                            <input name="tinggi_badan" type="text" class="form-control" value="<?= $d->tinggi_badan ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Berat Badan (kg)</label>
                                        <div>
                                            <input type="text" name="berat_badan" class="form-control" value="<?= $d->berat_badan ?>">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" x-show="!showPilihPasien">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tekanan Darah (cm)</label>
                                        <div>
                                            <input type="text" name="tekanan_darah" class="form-control" value="<?= $d->tekanan_darah ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Pernapasan</label>
                                        <div>
                                            <input type="text" name="pernapasan" class="form-control" value="<?= $d->pernapasan ?>">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" x-show="!showPilihPasien">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Detak Jantung</label>
                                        <div>
                                            <input type="text" name="detak_jantung" class="form-control" value="<?= $d->detak_jantung ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Suhu Tubuh</label>
                                        <div>
                                            <input type="text" name="suhu_tubuh" class="form-control" value="<?= $d->suhu_tubuh ?>">

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row" x-show="!showPilihPasien">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>SPO2</label>
                                        <div>
                                            <input type="text" name="spo2" class="form-control" value="<?= $d->spo2 ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nilai DM</label>
                                        <div>
                                            <input type="text" name="dm" class="form-control" value="<?= $d->dm ?>">

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row" x-show="!showPilihPasien">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nilai Kolestrol</label>
                                        <div>
                                            <input type="text" name="kolestrol" class="form-control" value="<?= $d->kolestrol ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nilai Asam Urat</label>
                                        <div>
                                            <input type="text" name="asam_urat" class="form-control" value="<?= $d->asam_urat ?>">

                                        </div>
                                    </div>
                                </div>
                            </div>


                            <hr>
                            <a type="button" class="btn btn-warning btn-sm col-md-2 col-lg-2 col-sm-3" style="padding: 7px;" href="<?= base_url('C_Medical_Record') ?>">Create New</a>

                            <a class="btn btn-primary col-md-2 col-lg-2 col-sm-3" data-toggle="tab" href="#messages" role="tab">Next</a>
                            <button type="button" class="btn btn-success col-md-2 col-lg-2 col-sm-3 btn-find">Find</button>
                            <a class="btn btn-danger col-md-1 col-sm-2 col-lg-2" <?= isset($edit) ? "" : "hidden" ?> target="_blank" href="<?= base_url("C_Medical_Record/cetak/$id") ?>" >Cetak</a>



                            

                        </div>
                    <!-- End Anamensa -->


                    <!-- Diagnosa -->
                        <div class="tab-pane p-3" id="messages" role="tabpanel">
                            <div class="row" x-show="!showPilihPasien">
                            <div class="col-md-7">
                                    <div class="form-group">
                                        <label>Diagnosa 1</label>
                                        <div>
                                            <select class="form-control" name="objektif">
                                                <option>...</option>
                                                <?php 
                                                    foreach($listMstDiagnosa as $val):
                                                        echo "<option>$val->diagnosa</option>";
                                                    endforeach;
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label>Diagnosa 2</label>
                                        <div>
                                            <select class="form-control" name="subjektif">
                                                <option>...</option>
                                                <?php 
                                                    foreach($listMstDiagnosa as $val):
                                                        echo "<option>$val->diagnosa</option>";
                                                    endforeach;
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>     

                            </div>
                           
                            <hr>
                            <!-- <button type="button" class="btn btn-primary col-md-1 btn-pasien">Save</button> -->
                            <a type="button" class="btn btn-warning btn-sm col-md-2 col-lg-2 col-sm-3" style="padding: 7px;" href="<?= base_url('C_Medical_Record') ?>">Create New</a>
                            <a class="btn btn-primary col-md-2 col-lg-2 col-sm-3" data-toggle="tab" href="#settings" role="tab">Next</a>
                            <button type="button" class="btn btn-success col-md-2 col-lg-2 col-sm-3 btn-find">Find</button>
                            <a class="btn btn-danger col-md-1 col-sm-2 col-lg-2" <?= isset($edit) ? "" : "hidden" ?> target="_blank" href="<?= base_url("C_Medical_Record/cetak/$id") ?>" >Cetak</a>




                        </div>
                    <!-- End Diagnosa -->

                    <!-- Resep Obat -->
                        <div class="tab-pane p-3" id="settings" role="tabpanel">
                            <div class="row" x-show="!showPilihPasien">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Obat & BMHP</label>
                                        <div>
                                            <select class="form-control" id="id_obat">
                                                <option disabled selected>...</option>
                                                <?php foreach($listObat as $val): ?>
                                                    <option value="<?= $val->id ?>"><?= $val->nama_obat ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Qty</label>
                                        <div>
                                        <input type="text" id="qty" class="form-control">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Action</label>
                                        <div>
                                        <button type="button" class="btn btn-primary" onclick="addCart()"> Add</button>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                    <table class="table table-hover">
                                        <thead>
                                            <th>Obat & BMHP</th>
                                            <th>Qty</th>
                                            <th>Subtotal</th>
                                        </thead>
                                        <?php 
                                            if (isset($edit)) {
                                                foreach ($row['det_obat'] as $obt) {
                                                    echo "<tr>";
                                                    echo "<td>" . $obt->nama_obat . "</td>";
                                                    echo "<td>" . $obt->qty . "</td>";
                                                    echo "<td>" . ($obt->harga * $obt->qty) . "</td>";
                                                    echo "</tr>";
                                                }
                                            }
                                            ?>

                                        <?php if(!isset($edit)) { ?>
                                        <tbody id="loadCart">
                                           

                                        </tbody>
                                        <?php } ?>
                                    </table>
                                        <div class="alert alert-danger">
                                            <?php
                                            $total = 0;
                                            if (isset($edit)) {
                                                foreach ($row['det_obat'] as $obt) {
                                                    $total += ($obt->harga * $obt->qty);
                                                } ?>
                                                Tota Tagihan : <b>Rp. <?= number_format($total) ?></b>
                                            <?php }else{ ?>
                                                Tota Tagihan : <b class="grandTotal">Rp. <?= number_format($total) ?></b>
                                                
                                            <?php } ?>
                                        </div>

                                    </div>
                                </div><hr>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Catatan</label>
                                        <div>
                                            <textarea name="catatan" id="" class="form-control" cols="10" rows="3" placeholder="isikan catatan yang diperlukan"></textarea>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Diperikasa Oleh Dokter</label>
                                        <div>
                                            <!-- <input name="diperiksa_oleh" type="text" class="form-control" placeholder="isi nama dokter yang menangani pasien"> -->
                                            <select class="form-control" name="diperiksa_oleh">
                                                <option disabled selected>...</option>
                                                <?php foreach($listDokter as $val): ?>
                                                <option><?= $val->nama ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <!-- <button type="button" class="btn btn-primary col-md-1 btn-pasien">Save</button> -->
                            <a type="button" class="btn btn-warning btn-sm col-md-2 col-lg-2 col-sm-3" style="padding: 7px;" href="<?= base_url('C_Medical_Record') ?>">Create New</a>
                            <a class="btn btn-primary col-md-2 col-lg-2 col-sm-3" data-toggle="tab" href="#finish" role="tab">Next</a>
                            <button type="button" class="btn btn-success col-md-2 col-lg-2 col-sm-3 btn-find">Find</button>
                            <a class="btn btn-danger col-md-1 col-sm-2 col-lg-2" <?= isset($edit) ? "" : "hidden" ?> target="_blank" href="<?= base_url("C_Medical_Record/cetak/$id") ?>" >Cetak</a>



                        </div>
                    <!-- End Resept Obat -->
                    <!-- Resep Obat -->
                    <div class="tab-pane p-3" id="finish" role="tabpanel">
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Status Pasien</label>
                                        <div>
                                            <select class="form-control" name="status_pulang">
                                                <option disabled selected>...</option>
                                                <option value="1">Rawat Jalan</option>
                                                <option value="2">Rawat Inap</option>
                                                <option value="3">Observasi</option>
                                                <option value="4">Penjualan Bebas</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Kamar</label>
                                        <div>
                                            <!-- <input name="kamar" type="text" class="form-control" > -->
                                            <select class="form-control" name="kamar">
                                                <option disabled selected>...</option>
                                                <?php foreach($listKamar as $val): ?>
                                                <option><?= $val->nomor_kamar ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tanggal Pulang</label>
                                        <div>
                                            <!-- <input name="tgl_selesai" type="date" class="form-control" placeholder=""> -->
                                            <input type="datetime-local" name="tgl_selesai" class="form-control" value="<?php echo date("Y-m-d\TH:i:s"); ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" x-show="!showPilihPasien">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Pilih Biaya</label>
                                        <div>
                                            <select class="form-control" id="id_layanan">
                                                <option disabled selected>...</option>
                                                <?php foreach($listLayanan as $val): ?>
                                                    <option value="<?= $val->id ?>"><?= $val->nama_layanan ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Qty</label>
                                        <div>
                                        <input type="text" id="qty_layanan" class="form-control">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Action</label>
                                        <div>
                                        <button type="button" class="btn btn-primary" onclick="addLayanan()"> Add</button>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                    <table class="table table-hover">
                                        <thead>
                                            <th>Nama Biaya</th>
                                            <th>Qty</th>
                                            <th>Subtotal</th>
                                        </thead>
                                        <?php 
                                            if (isset($edit)) {
                                                foreach ($row['det_obat'] as $obt) {
                                                    echo "<tr>";
                                                    echo "<td>" . $obt->nama_obat . "</td>";
                                                    echo "<td>" . $obt->qty . "</td>";
                                                    echo "<td>" . ($obt->harga * $obt->qty) . "</td>";
                                                    echo "</tr>";
                                                }
                                            }
                                            ?>

                                        <?php if(!isset($edit)) { ?>
                                        <tbody id="loadLayanan">
                                           

                                        </tbody>
                                        <?php } ?>
                                    </table>
                                        <div class="alert alert-danger">
                                            <?php
                                            $total = 0;
                                            if (isset($edit)) {
                                                // foreach ($row['det_obat'] as $obt) {
                                                //     $total += ($obt->harga * $obt->qty);
                                                // } 
                                                ?>
                                                Total Tagihan : <b>Rp. <?= number_format($total) ?></b>
                                            <?php }else{ ?>
                                                Total Tagihan : <b class="grandTotalLayanan">Rp. <?= number_format($total, '2', ',') ?></b>
                                                
                                            <?php } ?>
                                        </div>

                                    </div>
                                </div>
                                </div>
                            
                                <hr>
                                <a type="button" class="btn btn-warning btn-sm col-md-2 col-lg-2 col-sm-3" style="padding: 7px;" href="<?= base_url('C_Medical_Record') ?>">Create New</a>
                                <button type="button" class="btn btn-primary btn-pasien col-md-2 col-lg-2 col-sm-3" <?= isset($edit) ? "disabled" : "" ?>>Save & Complete</button>
                                <button type="button" class="btn btn-success col-md-2 col-lg-2 col-sm-3 btn-find pl-4">Find</button>
                                <a class="btn btn-danger col-md-1 col-sm-2 col-lg-2" <?= isset($edit) ? "" : "hidden" ?> target="_blank" href="<?= base_url("C_Medical_Record/cetak/$id") ?>" >Cetak</a>


                        </div>
                    <!-- End Resept Obat -->
                </div>
                </from>


            </div>
        </div>
    </div>
    <!-- <div class="col-xl-4">
        <div class="card m-b-30">
            <div class="card-body">

                <h4 class="mt-0 header-title">Riwayat Kunjungan</h4>
                <hr>
                <p class="sub-title">Use the tab JavaScript plugin—include
                    it individually or through the compiled <code class="highlighter-rouge">bootstrap.js</code>
                    file—to extend our navigational tabs and pills to create tabbable panes
                    of local content, even via dropdown menus.</p>



            </div>
        </div>
    </div> -->
</div>


<div class="modal fade" id="modal-find" tabindex="-1" role="dialog" aria-labelledby="modal-findTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">List Of Kunjungan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <table class="datatable table table-striped table-bordered dt-responsive nowrap table-search" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                    <th>No RKM</th>
                    <th>NIK</th>
                    <th>Fullname</th>
                    <th>Keluhan</th>
                    <th>Status Pulang</th>
                    <th>Action</th>
                </thead>
                <tbody>
                <?php foreach($listKunjungan as $val)
                {
                    $status_pulang = $val->status_pulang == 1 ? 'Rawat Jalan' : 'Rawat Inap';
                    echo "<tr>";
                    echo "<td>$val->id</td>";
                    echo "<td>$val->nik</td>";
                    echo "<td>$val->nama_depan $val->nama_belakang</td>";
                    echo "<td>$val->keluhan</td>";
                    echo "<td>$status_pulang</td>";
                    echo "<td>
                            <a href='".base_url('C_Medical_Record/index/')."$val->id' class='btn btn-primary'>show</a>
                        </td>";
                    echo "</tr>";
                } ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>

<script>

$('.btn-find').click(function() {
    $("#modal-find").modal('show')
});


$('.btn.btn-primary').click(function() {
    // Menghapus class "active" dari semua tab
    $('.nav-tabs .nav-item .nav-link').removeClass('active');

    // Menambahkan class "active" pada tab dengan href yang sesuai
    var targetHref = $(this).attr('href');
    $('.nav-tabs .nav-item .nav-link[href="' + targetHref + '"]').addClass('active');
  });

    getCart()
    getLayanan()
    
    $(document).on("click", ".btn-pasien", function() {
        Swal.fire({
            title: 'Are you sure?',
            text: "It will be saved!",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, save it!',
            showLoaderOnConfirm: true,
            preConfirm: function() {
                return new Promise(function(resolve) {
                    $.ajax({
                        type: "post",
                        url: "<?= base_url("C_Medical_Record/save") ?>",
                        data: $(".form-data").serialize(),
                        dataType: "json",
                        beforeSend: function() {
                            // $('#spinnerSave').attr('class', 'spinner-border spinner-border-sm')
                            $('.btn-pasien').html('Loading...');
                            $('.btn-pasien').attr('disabled', true);
                        },
                        success: function(response) {
                            console.log(response);
                            setTimeout(() => {
                                if (response.code == 200) {
                                    sw_alert("Success", String(response.message), "success");
                                    setTimeout(() => {
                                        location.reload()
                                    }, 3000);
                                } else {
                                    sw_alert("Error", String(response.message), "error");
                                    $('.btn-save').html('Save');
                                }
                                
                            $('.btn-pasien').html('save');
                            $('.btn-pasien').attr('disabled', false);
                            }, 3000);


                        },
                        error:  function (jqXHR, textError) { 
                            console.log(jqXHR);
                            console.log(textError);
                         }
                    });
                });
            },
        });
    });

    function getCart() {
        $.ajax({
            type: "post",
            url: "<?= base_url("C_Medical_Record/getChart") ?>",
            dataType: "json",
            success: function(response) {
                console.log(response);
                
                // Hapus semua baris tr dari tabel sebelumnya
                $('#loadCart').empty();
                
                var grandTotal = 0;
                $.each(response, function(index, obat) {
                    var row = "<tr>" +
                        "<td>" + obat.nama_obat + "</td>" +
                        "<td>" + obat.qty + "</td>" +
                        "<td>" + obat.qty * obat.harga + "</td>" +
                        "<td><button type='button' class='btn btn-danger' onclick='deleteCart(" + obat.id + ")'>Delete</button></td>" +
                        "</tr>";

                    $('#loadCart').append(row);
                    grandTotal += obat.qty * obat.harga;
                });

                // Tampilkan grand total di dalam tabel
                $('.grandTotal').text(grandTotal);
            }
        });
    }


    function getLayanan() {
        $.ajax({
            type: "post",
            url: "<?= base_url("C_Medical_Record/getLayanan") ?>",
            dataType: "json",
            success: function(response) {
                console.log(response);
                
                // Hapus semua baris tr dari tabel sebelumnya
                $('#loadLayanan').empty();
                
                var grandTotal = 0;
                $.each(response, function(index, lyn) {
                    var row = "<tr>" +
                        "<td>" + lyn.nama_layanan + "</td>" +
                        "<td>" + lyn.qty + "</td>" +
                        "<td>" + lyn.qty * lyn.harga + "</td>" +
                        "<td><button type='button' class='btn btn-danger' onclick='deleteLayanan(" + lyn.id_layanan + ")'>Delete</button></td>" +
                        "</tr>";

                    $('#loadLayanan').append(row);
                    grandTotal += lyn.qty * lyn.harga;
                });

                // Tampilkan grand total di dalam tabel
                $('.grandTotalLayanan').text(grandTotal);
            }
        });
    }


    function deleteCart(id)
    {
        $.ajax({
            type: "get",
            url: "<?= base_url("C_Medical_Record/deleteCart") ?>",
            data: { id : id},
            dataType: "json",
            success: function(response) {
                getCart()
                if(response.code == 200)
                {
                    getCart()
                }else {
                    sw_alert("Error", String(response.message), "error");
                }
                // var grandTotal = 0;
                // $.each(dataObat, function(index, obat) {
                //     grandTotal += obat.subtotal;
                // });

                // Tampilkan grand total di dalam tabel


            }
        });
    }


    function deleteLayanan(id)
    {
        $.ajax({
            type: "get",
            url: "<?= base_url("C_Medical_Record/deleteLayanan") ?>",
            data: { id : id},
            dataType: "json",
            success: function(response) {
                if(response.code == 200)
                {
                    getLayanan()
                }else {
                    sw_alert("Error", String(response.message), "error");
                }
                // var grandTotal = 0;
                // $.each(dataObat, function(index, obat) {
                //     grandTotal += obat.subtotal;
                // });

                // Tampilkan grand total di dalam tabel


            }
        });
    }
    
    function addCart() {   
        var id_obat = $("#id_obat").find(':selected').val()
        var qty = $("#qty").val()
        $.ajax({
            type: "post",
            url: "<?= base_url("C_Medical_Record/addCart") ?>",
            data: { 
                id_obat : id_obat,
                qty : qty,
            },
            dataType: "json",
            success: function(response) {
                console.log(response);
           
                if(response.code == 200)
                {
                    getCart()
                }else {
                    sw_alert("Error", String(response.message), "error");
                }
               
            }
        });

    }

    function addLayanan() {  
        var id_layanan = $("#id_layanan").find(':selected').val()
        var qty = $("#qty_layanan").val()
        $.ajax({
            type: "post",
            url: "<?= base_url("C_Medical_Record/addLayanan") ?>",
            data: { 
                id_layanan : id_layanan,
                qty_layanan : qty,
            },
            dataType: "json",
            success: function(response) {
                console.log(response);
           
                if(response.code == 200)
                {
                    getLayanan()
                }else {
                    sw_alert("Error", String(response.message), "error");
                }
               
            }
        });

    }

</script>

<?php $this->load->view("_partials/script") ?>