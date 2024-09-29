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

            <div class="row">
                <div class="col-md-6">
                    <h4 class="mt-0 header-title">Daftar Kamar</h4>
                </div>
                <div class="col-md-6">
                    <button class='btn btn-primary float-right col-md-3 open-modal'>Tambah Data</button>
                </div>
            </div>
                <hr>
               

                    <table class="datatable table table-striped table-bordered dt-responsive nowrap table-search" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <th class="nowrap w-10">No</th>
                            <th>No. RKM</th>
                            <th>Tanggal</th>
                            <th>Nama Pasien</th>
                            <th>Jenis Kelamin</th>
                            <th>Tempat / Tgl Lahir</th>
                            <th>Telp</th>
                            <th>Alamat</th>

                            <th>Nama Wali</th>
                            <th>Tempat / Tgl Lahir</th>
                            <th>Telp Wali</th>
                            <th>Alamat Wali</th>

                            <th>Diagnosa</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                        <?php foreach ($listRujukan as $item): ?>
                            <tr>
                                <td class="nowrap w-10">5</td>
                                <td><?php echo $item->no_rkm; ?></td>
                                <td><?php echo date('d/m/Y', strtotime($item->tgl_lahir)); ?></td>
                                <td><?php echo $item->nama_depan. ' '. $item->nama_belakang; ?></td>
                                <td><?php echo $item->jenis_kelamin; ?></td>
                                <td><?php echo $item->tempat_lahir . ', ' . date('d/m/Y', strtotime($item->tgl_lahir_wali)); ?></td>
                                <td><?php echo $item->no_telp; ?></td>
                                <td><?php echo $item->alamat; ?></td>
                                
                                <td><?php echo $item->nama_wali; ?></td>
                                <td><?php echo $item->tempat_lahir_wali . ', ' . date('d/m/Y', strtotime($item->tgl_lahir_wali)); ?></td>
                                <td><?php echo $item->no_telp_wali; ?></td>
                                <td><?php echo $item->alamat_wali; ?></td>

                                <td>diagnosa</td>

                                <td>
                                    <button type="button" class="btn btn-primary btn-sm modal-triase" data-id="<?= $item->pasien_id ?>">Triase</button>
                                    <button type="button" class="btn btn-success btn-sm modal-evaluasi">Evaluasi</button>
                                    <button type="button" class="btn btn-info btn-sm modal-tatalaksana">Tatalaksana</button>
                                    <button type="button" class="btn btn-info btn-sm modal-cppt">Cppt</button>
                                    <button type="button" class="btn btn-warning btn-sm modal-farmasi">Farmasi</button>
                                    <button type="button" class="btn btn-danger btn-sm modal-selesai">Selesai</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>

            </div>
        </div>
    </div>

</div>


<!-- Modal Input Rujukan -->
<div class="modal fade" id="modalForm" tabindex="-1" role="dialog" aria-labelledby="modalFormTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-data">
                <div class="modal-body">
                    <div class="row border-right ml-2 mb-3">
                        <div class="col-md-6 border-right">
                        <h5>Data Pasien</h5><hr>    
                            <div class="form-group">
                                <label for="exampleInputEmail1">Pilih Pasien</label>
                                <select class="form-control pilih-pasien" name="pasien_id">
                                    <option>...</option>
                                    <?php foreach($listPasien as $val)
                                    {
                                        echo "<option value=\"{$val->idx}\">{$val->idx} - {$val->nama_depan} {$val->nama_belakang}</option>";
                                    }
                                     ?>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="exampleInputEmail1">No RKM</label>
                                <input type="hidden" class="form-control" name="id">
                                <input type="text" readonly class="form-control" name="no_rkm">
                            </div>                    

                            <div class="form-group">
                                <label for="exampleInputEmail1">Jenis Kelamin</label>
                                <select class="form-control" readonly name="jenis_kelamin">
                                    <option selected disabled>...</option>
                                    <option>Wanita</option>
                                    <option>Pria</option>

                                </select>

                            </div>                    

                            <div class="form-group">
                                <label for="exampleInputEmail1">Tgl Lahir</label>
                                <input type="" class="form-control tgl-lahir" readonly  name="tgl_lahir">
                            </div>                    

                            <div class="form-group">
                                <label for="exampleInputEmail1">Umur</label>
                                <input type="text" readonly class="form-control umur" name="umur">
                            </div>                    
                        </div>

                        <!-- Data Wali -->
                        
                        <div class="col-md-6 border-right">
                        <h5>Data Pasien / Wali</h5><hr>    
                            
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama </label>
                                <input type="text" class="form-control" name="nama_wali">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Tempat Lahir</label>
                                <input type="text" class="form-control" name="tempat_lahir_wali">
                            </div>                   

                            <div class="form-group">
                                <label for="exampleInputEmail1">Tgl Lahir</label>
                                <input type="date" class="form-control" name="tgl_lahir_wali">
                            </div>                    

                            <div class="form-group">
                                <label for="exampleInputEmail1">Alamat</label>
                                <input type="text" class="form-control" name="alamat_wali">
                            </div>                    

                            <div class="form-group">
                                <label for="exampleInputEmail1">No. Telp / Hp</label>
                                <input type="text" class="form-control" name="no_telp_wali">
                            </div>                    
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary btn-group-user btn-action" onclick="save()" >Save changes</button>
                </div>
            </form>

        </div>
    </div>
</div>


<!-- Modal Triase-->
<div class="modal fade" id="modalTriase" tabindex="-1" role="dialog" aria-labelledby="modalTriaseTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="m-2">

                <!-- Nav tabs -->
                <table class="col-md-12 mb-2 border" border="1">
                    <tr>
                        <td colspan="2"><h5 style="font-size: 14px;">Klinik Utama Permata Medika</h5></td>
                        <td><h5 style="font-size: 14px;">RM.R13 / REV 1 / 2023</h5></td>
                    </tr>
                    <tr>
                        <td style="width:1px;"><img src="<?= base_url('assets/images/logokop.png') ?>"></td>
                        <td align="center"><h4>TRIASE PASIEN TERINTEGRASI</h4></td>
                        <td>
                            <table>
                                <tr>
                                    <td style="width: 70px">Nama</td>
                                    <td>:</td>
                                    <td> <span id="badge-fullname"></span></td>
                                </tr>
                                <tr>
                                    <td>Tgl Lahir</td>
                                    <td>:</td>
                                    <td> <span id="badge-tgl-lahir"></span></td>
                                </tr>
                                <tr>
                                    <td>No RKM</td>
                                    <td>:</td>
                                    <td> <span id="badge-norkm"></span></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>

                
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#assesmen" role="tab">
                            <span class="d-none d-md-block">Asesmen Awal IGD</span><span class="d-block d-md-none"><i class="mdi mdi-home-variant h5"></i></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#skreningNyeri" role="tab">
                            <span class="d-none d-md-block">Skreening Nyeri</span><span class="d-block d-md-none"><i class="mdi mdi-account h5"></i></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#resikoJatuh" role="tab">
                            <span class="d-none d-md-block">Resiko Jatuh</span><span class="d-block d-md-none"><i class="mdi mdi-email h5"></i></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#serahTerima" role="tab">
                            <span class="d-none d-md-block">Serah Terima</span><span class="d-block d-md-none"><i class="mdi mdi-settings h5"></i></span>
                        </a>
                    </li>
                </ul>


                <form class="form-data">
                <div class="tab-content">
                    <!-- Info Pasien -->
                        <div class="tab-pane active p-3" id="assesmen" role="tabpanel">
                           
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
                                        <label>Cara Pasien Datang</label>
                                        <div>
                                            <select class="form-control">
                                                <option>...</option>
                                                <option>Datang Sendiri</option>
                                                <option>Diantar Polisi</option>
                                                <option>Ambulance</option>
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
                                            <textarea cols="2" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Riwayat Penyakit Terdahulu</label>
                                        <div>
                                            <textarea cols="2" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="trauma">
                                <label class="form-check-label" for="trauma">
                                    Trauma
                                </label>
                            </div>
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="nonTrauma" >
                            <label class="form-check-label" for="nonTrauma">
                                Non Trauma
                            </label>
                            </div>
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="obstetri">
                            <label class="form-check-label" for="obstetri">
                                Obstetri
                            </label>
                            </div>
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="infeksius" >
                            <label class="form-check-label" for="infeksius">
                                Infeksius
                            </label>
                            </div>
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="pediatri">
                            <label class="form-check-label" for="pediatri">
                                Pediatri
                            </label>
                            </div>
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="nenatatus" >
                            <label class="form-check-label" for="nenatatus">
                                Nenatatus
                            </label>
                            </div>
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="doa" >
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
                                        <td>Tidak Darurat.<br>Respon Time : 25 Menit</td>
                                        <td>Urgnet / Darurat.<br>Respon Time : 15 Menit</td>
                                        <td>Resusitasi <br>Respon Time : SEGERA</td>
                                        <td>Respon Time : SEGERA</td>
                                        <td>Keadaan Umum</td>
                                    </tr>
                                    <tr>
                                        <td scope="row"><strong>AIRWAY</strong></td>
                                        <td>
                                            <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Paten
                                            </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Paten
                                            </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Sumbatan Total
                                            </label>
                                            </div>

                                            <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Sumbatan Sebgian
                                            </label>
                                            </div>

                                            <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Paten
                                            </label>
                                            </div>
                                        </td>
                                        <td></td>
                                        <td>BB : <input class="form-control"></td>
                                    </tr>

                                    <tr>
                                        <td scope="row"><strong>Breathing</strong></td>
                                        <td>
                                            <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Frekuensi Nafas Total
                                            </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Distres Pernapasan Ringan RR>30x/Menit
                                            </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Sumbatan Total
                                            </label>
                                            </div>

                                            <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Sumbatan Sebgian
                                            </label>
                                            </div>

                                            <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                RR > 30x/Menit
                                            </label>
                                            </div>
                                            <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Penggunaan Otot Bantuan Napas
                                            </label>
                                            </div>
                                        </td>
                                        <td>Tidak Ada Napas</td>
                                        <td>
                                            TD : <input class="form-control"><br>
                                            HR : <input class="form-control"><br>
                                            RR : <input class="form-control"><br>
                                            TEMO : <input class="form-control"><br>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td scope="row"><strong>Circulation</strong></td>
                                        <td>Tidak Ada Gangguan Hemodinamik</td>
                                        <td>
                                            <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Nadi Teraba(Lemah/Kuat)
                                            </label>
                                            </div>

                                            <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Pendarahan > 2 Detik
                                            </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Nadi tidak teraba
                                            </label>
                                            </div>

                                            <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Perdarahan yang tidak terkontrol (Perdarahan aktif)
                                            </label>
                                            </div>

                                            <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Perdarahan kapiler > 2 Detik
                                            </label>
                                            </div>
                                            <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Nadi tidak teraba / Sangat halus
                                            </label>
                                            </div>
                                        </td>
                                        <td>Tidak Ada Nadi</td>
                                        <td>
                                            Imunisai Anak : 
                                            <select class="form-control">
                                                <option>...</option>
                                                <option>Ya</option>
                                                <option>Tidak</option>
                                            </select><br>
                                            Riwayat Alergi : <input class="form-control"><br>
                                            Makanan : <input class="form-control"><br>
                                            Obat : <input class="form-control"><br>
                                            Lainnya  : <input class="form-control"><br>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td scope="row"><strong>Disability</strong></td>
                                        <td>
                                            <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                GCS 15
                                            </label>
                                            </div>
                                        </td>
                                        <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                GCS 12-14
                                            </label>
                                            </div>
                                        </td>
                                        <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                GCS < 12
                                            </label>
                                            </div>
                                        </td>
                                        <td colspan="2" ></td>
                                    </tr>
                                </tbody>
                                </table>
                            </div>



                        </div>

                        <div class="tab-pane fade p-3" id="skreningNyeri" role="tabpanel">
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
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nyeri</label>
                                        <div>
                                            <select class="form-control">
                                                <option>...</option>
                                                <option>Ya</option>
                                                <option>Tidak</option>
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
                                            <select class="form-control">
                                                <option>...</option>
                                                <option>Akut</option>
                                                <option>Kronik</option>
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
                                            <textarea cols="2" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Skor Nyeri</label>
                                        <div>
                                            <select class="form-control">
                                                <option>...</option>
                                                <option>Tidak Nyeri</option>
                                                <option>Ringan (1-3)</option>
                                                <option>Sedang (4-6)</option>
                                                <option>Berat (7-9)</option>
                                                <option>Sangat Berat (10)</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="tab-pane fade p-3" id="resikoJatuh" role="tabpanel">
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
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Resiko Jatuh</label>
                                        <div>
                                            <select class="form-control">
                                                <option>...</option>
                                                <option>Ya</option>
                                                <option>Tidak</option>
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
                                            <textarea cols="2" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Rencana Tindak Lanjut</label>
                                        <div>
                                            <select class="form-control">
                                                <option>...</option>
                                                <option>Pulang Berobat Jalan</option>
                                                <option>Pulang Atas Permintaan Sendiri</option>
                                                <option>Meninggal</option>
                                                <option>Diserahkan Kedokter Jaga</option>
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
                                                <input type="date" class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="time" class="form-control">
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
                                            <select class="form-control">
                                                <option>...</option>
                                                <option>Dr .......</option>
                                                <option>Dr .......</option>
                                                <option>Dr .......</option>
                                                <option>Dr .......</option>
                                                <option>Dr .......</option>
                                                <option>Dr .......</option>
                                                <option>Dr .......</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label>Nama & Tanda Terima Dokter Jaga</label>
                                        <div>
                                            <select class="form-control">
                                                <option>...</option>
                                                <option>Dr .......</option>
                                                <option>Dr .......</option>
                                                <option>Dr .......</option>
                                                <option>Dr .......</option>
                                                <option>Dr .......</option>
                                                <option>Dr .......</option>
                                                <option>Dr .......</option>
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
                                            <select class="form-control">
                                                <option>...</option>
                                                <option>Dr .......</option>
                                                <option>Dr .......</option>
                                                <option>Dr .......</option>
                                                <option>Dr .......</option>
                                                <option>Dr .......</option>
                                                <option>Dr .......</option>
                                                <option>Dr .......</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label>Nama Perawat Jaga</label>
                                        <div>
                                            <select class="form-control">
                                                <option>...</option>
                                                <option>Dr .......</option>
                                                <option>Dr .......</option>
                                                <option>Dr .......</option>
                                                <option>Dr .......</option>
                                                <option>Dr .......</option>
                                                <option>Dr .......</option>
                                                <option>Dr .......</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            


                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Edukasi Pasien</label>
                                        <div>
                                            <textarea rows="5" class="form-control"></textarea>
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
                                                <input type="date" class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="time" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Pasien/Keluarga/Orang Tua</label>
                                        <div>
                                            <input class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label>Yang Memberikan Informasi</label>
                                        <div>
                                            <select class="form-control">
                                                <option>...</option>
                                                <option>Dr .......</option>
                                                <option>Dr .......</option>
                                                <option>Dr .......</option>
                                                <option>Dr .......</option>
                                                <option>Dr .......</option>
                                                <option>Dr .......</option>
                                                <option>Dr .......</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>





                            </div>
                            <hr>
                            <button type="button" class="btn btn-primary col-md-1 col-sm-2 col-lg-2" onclick="saveTriase()">Save</button>
                            <!-- <a type="button" class="btn btn-warning btn-sm col-md-2 col-lg-2 col-sm-3" style="padding: 7px;" href="<?= base_url('C_Medical_Record') ?>">Create New</a> -->

                            <!-- <a class="btn btn-primary  col-md-1 col-sm-2 col-lg-2" data-toggle="tab" href="#profile" role="tab">Next</a> -->
                            <!-- <button type="button" class="btn btn-success col-md-1 col-sm-2 col-lg-2 btn-find">Find</button> -->
                            <a class="btn btn-danger col-md-1 col-sm-2 col-lg-2" <?= isset($edit) ? "" : "hidden" ?> target="_blank" href="<?= base_url("C_Medical_Record/cetak/$id") ?>" >Cetak</a>

                        </div>
                    </div>
                </div>
                </form>
            </div>
            
        </div>
    </div>
</div>

<!-- Modal Triase-->
<div class="modal fade" id="modalEvaluasi" tabindex="-1" role="dialog" aria-labelledby="modalTriaseTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="m-2">

                <table class="col-md-12 mb-2 border" border="1">
                    <tr>
                        <td colspan="2"><h5 style="font-size: 14px;">Klinik Utama Permata Medika</h5></td>
                        <td><h5 style="font-size: 14px;">RM.R13 / REV 1 / 2023</h5></td>
                    </tr>
                    <tr>
                        <td style="width:1px;"><img src="<?= base_url('assets/images/logokop.png') ?>"></td>
                        <td align="center"><h4>TRIASE PASIEN TERINTEGRASI</h4></td>
                        <td>
                            <table>
                                <tr>
                                    <td style="width: 70px">Nama</td>
                                    <td>:</td>
                                    <td> Bayu Widodo</td>
                                </tr>
                                <tr>
                                    <td>Tgl Lahir</td>
                                    <td>:</td>
                                    <td> 21/10/1999</td>
                                </tr>
                                <tr>
                                    <td>No RKM</td>
                                    <td>:</td>
                                    <td> 010123</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>

                <div class="p-3">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Autoanamnesa</label>
                                <div>
                                    <textarea rows="2" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Alloanamnesa</label>
                                <div>
                                    <textarea rows="2" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>RO</label>
                                <div>
                                    <textarea rows="2" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>RO</label>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Marah
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Cemas
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Takut
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Gelisah
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Tidak Masalah
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Depresi
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Cendrung Bunuh Diri
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Lainnya
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Status Pernikahan</label>
                                <div>
                                    <select class="form-control">
                                        <option>...</option>
                                        <option>Menikah</option>
                                        <option>Belum Menikah</option>
                                        <option>Cerai</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Hub Pasien Dengan Anggota Keluarga</label>
                                <div>
                                    <select class="form-control">
                                        <option>...</option>
                                        <option>Baik</option>
                                        <option>Tidak Baik</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Kegiatan Keagamaan yang diikuti</label>
                                <div>
                                    <textarea rows="2" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Penanggung Jawab</label>
                                <div>
                                    <select class="form-control">
                                        <option>...</option>
                                        <option>BPJS</option>
                                        <option>Asuransi / Perusahaan</option>
                                        <option>Umum</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h5>Pemeriksaan Pisik</h5><hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Keadaan Umum</label>
                                <div>
                                    <input class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>TD</label>
                                <div>
                                    <input class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>RR</label>
                                <div>
                                    <input class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>GCS</label>
                                <div>
                                    <input class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>TB</label>
                                <div>
                                    <input class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>HR</label>
                                <div>
                                    <input class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>TEMP</label>
                                <div>
                                    <input class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>SpO2</label>
                                <div>
                                    <input class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>BB</label>
                                <div>
                                    <input class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Kepala</label>
                                <div>
                                    <input class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Leher</label>
                                <div>
                                    <input class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Thorax</label>
                                <div>
                                    <input class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Abdomen</label>
                                <div>
                                    <input class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Extremitas</label>
                                <div>
                                    <input class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Genitalia</label>
                                <div>
                                    <input class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>

                    <h5>Pemeriksaan Penunjang</h5><hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Laboratorium</label>
                                <div>
                                    <input class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Radiologi</label>
                                <div>
                                    <input class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Ekg</label>
                                <div>
                                    <input class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Lainnya</label>
                                <div>
                                    <input class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Rencana Tindak Lanjut</label>
                                <div>
                                    <select class="form-control">
                                        <option>...</option>
                                        <option>Konsultasi Ke SMF</option>
                                        <option>Pulang Berobat Jalan</option>
                                        <option>Pulang Atas Permintaan Sendiri</option>
                                        <option>Meninggal</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Dokter</label>
                                <div>
                                    <select class="form-control">
                                        <option>...</option>
                                        <option>Dr .... </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <button class="btn btn-primary">Simpan</button>
                <button class="btn btn-danger">Batal</button>



            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalTatalaksana" tabindex="-1" role="dialog" aria-labelledby="modalTriaseTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="m-2">
                <button type="button" class="btn btn-primary mb-2">Add New</button>  
                <table class="table table-bordered">
                    <thead>
                        <th>No</th>
                        <th>Waktu</th>
                        <th>Obat/Cairan</th>
                        <th>Dosis</th>
                        <th>Cara Pembelian</th>
                        <th>TTD Dokter</th>
                        <th>Waktu Pembelian</th>
                        <th>TTD Perawat</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="9" align="center">Data Not Found</td>
                        </tr>

                    </tbody>
                </table>
            
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Instruksi Lainnya</label>
                            <div>
                                <input class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Edukasi</label>
                            <div>
                                <input class="form-control">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Waktu</label>
                            <div>
                                <input type="date" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Pasien / Wali / Orang Tua</label>
                            <div>
                                <input class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Petugas</label>
                            <div>
                                <input class="form-control">
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modalCPPT" tabindex="-1" role="dialog" aria-labelledby="modalTriaseTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="m-2">

            <table class="col-md-12 mb-2 border" border="1">
                    <tr>
                        <td colspan="2"><h5 style="font-size: 14px;">Klinik Utama Permata Medika</h5></td>
                        <td><h5 style="font-size: 14px;">RM.R13 / REV 1 / 2023</h5></td>
                    </tr>
                    <tr>
                        <td style="width:1px;"><img src="<?= base_url('assets/images/logokop.png') ?>"></td>
                        <td align="center"><h4>TRIASE PASIEN TERINTEGRASI</h4></td>
                        <td>
                            <table>
                                <tr>
                                    <td style="width: 70px">Nama</td>
                                    <td>:</td>
                                    <td> Bayu Widodo</td>
                                </tr>
                                <tr>
                                    <td>Tgl Lahir</td>
                                    <td>:</td>
                                    <td> 21/10/1999</td>
                                </tr>
                                <tr>
                                    <td>No RKM</td>
                                    <td>:</td>
                                    <td> 010123</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>

                <button type="button" class="btn btn-primary mb-2">Add New</button>  
                <table class="table table-bordered">
                    <thead>
                        <th>No</th>
                        <th>Waktu</th>
                        <th>Profesional Pemberi Asuhan</th>
                        <th>Hasil Asesmen Pasien dan Pemberian Pelayanan</th>
                        <th>Instruksi PPA Termasuk Pasca Bedah</th>
                        <th>Preview & Verifikasi DPJP</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="7" align="center">Data Not Found</td>
                        </tr>

                    </tbody>
                </table>
            

            
            
            
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalFarmasi" tabindex="-1" role="dialog" aria-labelledby="modalTriaseTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="m-2">

                <button type="button" class="btn btn-primary mb-2">Add New</button>  
                <table class="table table-bordered">
                    <thead>
                        <th>No</th>
                        <th>Nama Obat</th>
                        <th>Dosis</th>
                        <th>Tanggal</th>
                        <th>Jumlah</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="5" align="center">Data Not Found</td>
                        </tr>

                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalSelesai" tabindex="-1" role="dialog" aria-labelledby="modalTriaseTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="m-2 p-3">

                    <table class="col-md-12 mb-2 border" border="1">
                    <tr>
                        <td colspan="2"><h5 style="font-size: 14px;">Klinik Utama Permata Medika</h5></td>
                        <td><h5 style="font-size: 14px;">RM.R13 / REV 1 / 2023</h5></td>
                    </tr>
                    <tr>
                        <td style="width:1px;"><img src="<?= base_url('assets/images/logokop.png') ?>"></td>
                        <td align="center"><h4>TRIASE PASIEN TERINTEGRASI</h4></td>
                        <td>
                            <table>
                                <tr>
                                    <td style="width: 70px">Nama</td>
                                    <td>:</td>
                                    <td> Bayu Widodo</td>
                                </tr>
                                <tr>
                                    <td>Tgl Lahir</td>
                                    <td>:</td>
                                    <td> 21/10/1999</td>
                                </tr>
                                <tr>
                                    <td>No RKM</td>
                                    <td>:</td>
                                    <td> 010123</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tgl Keluar</label>
                                <div>
                                    <input class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Ruang Rawat Terakhir</label>
                                <div>
                                    <input class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Penanggung Pembayaran</label>
                                <div>
                                    <input class="form-control">
                                </div>
                            </div>
                        </div>                        
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Ringkasan Riawayat Penyakit</label>
                                <div>
                                    <textarea rows="2" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Pemeriksanaa Fisik</label>
                                <div>
                                    <textarea rows="4" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Pemeriksanaa Penunjang</label>
                                <div>
                                    <textarea rows="4" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Terapi Pengobatan selama di rumah sakit</label>
                                <div>
                                    <textarea rows="4" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Diagnosa utama</label>
                                <div>
                                    <textarea rows="4" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="button" class="btn btn-primary mb-2">Add New</button>  
                <table class="table table-bordered">
                    <thead>
                        <th>No</th>
                        <th>Nama Obat</th>
                        <th>Jumlah</th>
                        <th>Dosis</th>
                        <th>Jumlah</th>
                        <th>Frekuensi</th>
                        <th>Cara Pembelian</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="6" align="center">Data Not Found</td>
                        </tr>

                    </tbody>
                </table>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Dokter Penanggung Jawab</label>
                            <div>
                                <input class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            <hr>
            <button class="btn btn-primary">Simpan</button>
                </div>
                </div>
    </div>
</div>


<script>


        $(document).on('change', '.tgl-lahir', function (e) {

            var tanggalLahir = $(this).val();
    
            var umur = hitungUmur(tanggalLahir);

            var umurInput = document.querySelector('.umur');
            umurInput.value = umur;
        })


        $('.pilih-pasien').on('change', function (e) {

            const pasienId = $(this).val();


            if (pasienId) {
                const url = `<?= base_url('C_KunjunganRujukan/getPasienById/') ?>${pasienId}`;
                console.log("Fetching URL:", url); // Log URL yang akan di-fetch

                fetch(url)
                    .then(response => {
                        console.log("Response Status:", response.status); // Log status respons
                        if (!response.ok) {
                            throw new Error(`HTTP error! Status: ${response.status}`);
                        }
                        return response.json();
                    })
                    .then(data => {
                        console.log("Data received:", data); // Log data yang diterima
                        // Memperbarui field dengan data pasien
                        document.querySelector('input[name="id"]').value = data.idx;
                        document.querySelector('input[name="no_rkm"]').value = data.no_rkm || ''; // Default jika tidak ada
                        document.querySelector('select[name="jenis_kelamin"]').value = data.jenis_kelamin || ''; // Default jika tidak ada
                        document.querySelector('input[name="tgl_lahir"]').value = data.tgl_lahir || ''; // Default jika tidak ada
                        document.querySelector('input[name="umur"]').value = data.umur || ''; // Default jika tidak ada

                    })
                    .catch(error => {
                        console.error('There has been a problem with your fetch operation:', error);
                    });
            }

        })


        $(document).on('click', '.modal-triase',function(e) {


            const url = `<?= base_url('C_KunjunganRujukan/getPasienById/') ?>${$(this).data('id')}`;
                console.log("Fetching URL:", url); // Log URL yang akan di-fetch

                fetch(url)
                    .then(response => {
                        console.log("Response Status:", response.status); // Log status respons
                        if (!response.ok) {
                            throw new Error(`HTTP error! Status: ${response.status}`);
                        }
                        return response.json();
                    })
                    .then(data => {
                        console.log("Data received:", data); // Log data yang diterima
                        // Memperbarui field dengan data pasien
                        $('#modalTriase').modal('show')

                        document.getElementById('badge-fullname').textContent = `${data.nama_depan} ${data.nama_belakang}`;
                        document.getElementById('badge-tgl-lahir').textContent = `${data.tgl_lahir}`;
                        document.getElementById('badge-norkm').textContent = `${data.no_rkm}`;

                    })
                    .catch(error => {
                        console.error('There has been a problem with your fetch operation:', error);
                    });


        });

        $(document).on('click', '.modal-evaluasi',function() {

        $('#modalEvaluasi').modal('show')

        });

        $(document).on('click', '.modal-tatalaksana',function() {

            $('#modalTatalaksana').modal('show')

        });

        $(document).on('click', '.modal-cppt',function() {

            $('#modalCPPT').modal('show')

        });

        $(document).on('click', '.modal-farmasi',function() {

        $('#modalFarmasi').modal('show')

        });

        $(document).on('click', '.modal-selesai',function() {

        $('#modalSelesai').modal('show')

        });

        

        

    // $(document).ready(function() {
  // Event delegation for the "Edit" button click
        


        //region test

        $(document).on('click', '.open-modal', function() {

            $("#exampleModalLongTitle").html("Create New Kunjungan")
            $("#modalForm").modal('show')
            var row = $(this).closest('tr');

            var id = row.find('td:eq(4)').text();
            var nomor_kamar = row.find('td:eq(1)').text();
            var jenis_kamar = row.find('td:eq(2)').text();
            var fasilitas = row.find('td:eq(3)').text();

            $('#form-data input[name="id"]').val(id);
            $('#form-data input[name="nomor_kamar"]').val(nomor_kamar);
            $('#form-data input[name="jenis_kamar"]').val(jenis_kamar);
            $('#form-data input[name="fasilitas"]').val(fasilitas);

            if(id > 0)
            {
                $('#form-data input[name="id"]').attr('readonly', true);
            }else{
                $('#form-data input[name="id"]').attr('readonly', false);

            }

            return false;
        });
        //endregion

    // });

    // function openModal(id = null)
    // {
    //     // if(id == null){
    //     //     $("#exampleModalLongTitle").html("Form Create Obat")
    //     //     $(".btn-action").attr('onclick', 'save()');
    //     //     $("#modalForm").modal('show')
    //     // }else{
    //         var row = $(this).closest('tr');

    //         // Get the text content of each cell in the row
    //         var kodeObat = row.find('td:eq(0)').text();
    //         var namaObat = row.find('td:eq(1)').text();
    //         var jenisObat = row.find('td:eq(2)').text();
    //         var harga = row.find('td:eq(3)').text();
    //         var stok = row.find('td:eq(4)').text();
    //         $('#form-data input[name="kode_obat"]').val(kodeObat);
    //         $('#form-data input[name="nama_obat"]').val(namaObat);
    //         $('#form-data input[name="jenis_obat"]').val(jenisObat);
    //         $('#form-data input[name="harga"]').val(harga);
    //         $('#form-data input[name="stok"]').val(stok);


    //     // }
    // }
    function save()
    {
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
                        url: "<?= base_url("C_KunjunganRujukan/save") ?>",
                        data: $("#form-data").serialize(),
                        dataType: "json",
                        beforeSend: function() {
                            // $('#spinnerSave').attr('class', 'spinner-border spinner-border-sm')
                            $('.btn-action').html('Loading...');
                            $('.btn-action').attr('disabled', true);
                        },
                        success: function(response) {
                            
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
                                
                            $('.btn-action').html('save');
                            $('.btn-action').attr('disabled', false);
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
    }


    function saveTriase()
    {
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
                        url: "<?= base_url("C_KunjunganRujukan/saveTriase") ?>",
                        data: $("#form-data").serialize(),
                        dataType: "json",
                        beforeSend: function() {
                            // $('#spinnerSave').attr('class', 'spinner-border spinner-border-sm')
                            $('.btn-action').html('Loading...');
                            $('.btn-action').attr('disabled', true);
                        },
                        success: function(response) {
                            
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
                                
                            $('.btn-action').html('save');
                            $('.btn-action').attr('disabled', false);
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
    }

    function deleted(id)
    {
        Swal.fire({
            title: 'Are you sure?',
            text: "It will be deleted!",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, save it!',
            showLoaderOnConfirm: true,
            preConfirm: function() {
                return new Promise(function(resolve) {
                    $.ajax({
                        type: "post",
                        url: "<?= base_url("C_Mst_Dokter/delete") ?>",
                        data: {
                            'id' : id
                        },
                        dataType: "json",
                        beforeSend: function() {
                            // $('#spinnerSave').attr('class', 'spinner-border spinner-border-sm')
                            $('.btn-action').html('Loading...');
                            $('.btn-action').attr('disabled', true);
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
                                
                            $('.btn-action').html('save');
                            $('.btn-action').attr('disabled', false);
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
    }


    <!-- function -->
function hitungUmur(tglLahir) {
    // Mengubah string tanggal lahir menjadi objek Date
    var dob = new Date(tglLahir);
    var today = new Date();
    
    // Menghitung umur
    var umur = today.getFullYear() - dob.getFullYear();
    var m = today.getMonth() - dob.getMonth();
    
    // Mengoreksi jika belum merayakan ulang tahun tahun ini
    if (m < 0 || (m === 0 && today.getDate() < dob.getDate())) {
        umur--;
    }
    
    return umur;
}
</script>















<!-- <?php $this->load->view("_partials/script") ?> -->