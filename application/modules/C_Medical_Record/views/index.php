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

                <h4 class="mt-0 header-title">Kunjungan Pasien</h4>
                <hr>
                <p class="sub-title">Use the tab JavaScript plugin—include
                    it individually or through the compiled <code class="highlighter-rouge">bootstrap.js</code>
                    file—to extend our navigational tabs and pills to create tabbable panes
                    of local content, even via dropdown menus.</p>

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#home" role="tab">
                            <span class="d-none d-md-block">Personal Info Pasien</span><span class="d-block d-md-none"><i class="mdi mdi-home-variant h5"></i></span>
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
                                        <label>Pilih Pasien</label>
                                        <div>
                                            <select class="form-control">
                                                <option disabled selected>...</option>

                                                <option>erwer</option>
                                                <option>erwer</option>
                                                <option>erwer</option>
                                                <option>erwer</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" x-show="!showPilihPasien">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>NIK</label>
                                        <div>
                                            <input type="number" name="nik" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" x-show="!showPilihPasien">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Depan</label>
                                        <div>
                                            <input type="text" name="nama_depan" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Belakang</label>
                                        <div>
                                            <input type="text" name="nama_belakang" class="form-control">

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

                                                <option>Pria</option>
                                                <option>Wanita</option>
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
                                                <option>A</option>
                                                <option>B</option>
                                                <option>AB</option>
                                                <option>O</option>
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
                                            <textarea name="alamat" id="" class="form-control" cols="10" rows="3" placeholder="alamat lengkap pasien"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Catatan</label>
                                        <div>
                                            <textarea name="catatan" id="" class="form-control" cols="10" rows="3" placeholder="isi keterangan pasien mengenai riwayat medis atau alergi dll"></textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <hr>
                            <!-- <button type="button" class="btn btn-primary col-md-1 col-sm-2 col-lg-2 btn-pasien">Save</button> -->
                            <a class="btn btn-primary  col-md-1 col-sm-2 col-lg-2" data-toggle="tab" href="#profile" role="tab">Next</a>
                            <button type="button" class="btn btn-success col-md-1 col-sm-2 col-lg-2 btn-find">Find</button>
                        </div>
                    <!-- Info Pasien -->

                    <!-- Anamensa -->
                        <div class="tab-pane p-3" id="profile" role="tabpanel">
                            <div class="row" x-show="!showPilihPasien">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Keluhan Pasien</label>
                                        <div>
                                            <textarea name="keluhan" id="" class="form-control" cols="10" rows="3" placeholder="isi keluhan pasien"></textarea>

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
                                            <input name="tinggi_badan" type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Berat Badan (kg)</label>
                                        <div>
                                            <input type="text" name="berat_badan" class="form-control">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" x-show="!showPilihPasien">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tekanan Darah (cm)</label>
                                        <div>
                                            <input type="text" name="tekanan_darah" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Pernapasan</label>
                                        <div>
                                            <input type="text" name="pernapasan" class="form-control">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" x-show="!showPilihPasien">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Detak Jantung</label>
                                        <div>
                                            <input type="text" name="detak_jantung" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Suhu Tubuh</label>
                                        <div>
                                            <input type="text" name="suhu_tubuh" class="form-control">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <a class="btn btn-primary col-md-2 col-lg-3 col-sm-3" data-toggle="tab" href="#messages" role="tab">Next</a>
                            <button type="button" class="btn btn-success col-md-2 col-lg-3 col-sm-3 btn-find">Find</button>

                            

                        </div>
                    <!-- End Anamensa -->


                    <!-- Diagnosa -->
                        <div class="tab-pane p-3" id="messages" role="tabpanel">
                            <div class="row" x-show="!showPilihPasien">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Subjektif</label>
                                        <div>
                                            <textarea name="subjektif" id="" class="form-control" cols="10" rows="3" placeholder="alamat lengkap pasien"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Objektif</label>
                                        <div>
                                            <textarea name="objektif" id="" class="form-control" cols="10" rows="3" placeholder="isi keterangan pasien mengenai riwayat medis atau alergi dll"></textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row" x-show="!showPilihPasien">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Assesment</label>
                                        <div>
                                            <textarea name="assesment" id="" class="form-control" cols="10" rows="3" placeholder="alamat lengkap pasien"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Planning</label>
                                        <div>
                                            <textarea name="planning" id="" class="form-control" cols="10" rows="3" placeholder="isi keterangan pasien mengenai riwayat medis atau alergi dll"></textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <hr>
                            <!-- <button type="button" class="btn btn-primary col-md-1 btn-pasien">Save</button> -->
                            <a class="btn btn-primary col-md-2 col-lg-3 col-sm-3" data-toggle="tab" href="#settings" role="tab">Next</a>
                            <button type="button" class="btn btn-success col-md-2 col-lg-3 col-sm-3 btn-find">Find</button>


                        </div>
                    <!-- End Diagnosa -->

                    <!-- Resep Obat -->
                        <div class="tab-pane p-3" id="settings" role="tabpanel">
                            <div class="row" x-show="!showPilihPasien">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Reset Obat</label>
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
                                            <th>Nama Obat</th>
                                            <th>Qty</th>
                                            <th>Subtotal</th>
                                        </thead>
                                        <tbody id="loadCart">

                                        </tbody>
                                    </table>
                                    <div class="alert alert-danger">
                                            Tota Tagihan : <b class="grandTotal">Rp. 12.000,00</b>
                                    </div>
                                    </div>
                                </div><hr>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Catatan</label>
                                        <div>
                                            <textarea name="catatan" id="" class="form-control" cols="10" rows="3" placeholder="isi keterangan pasien mengenai riwayat medis atau alergi dll"></textarea>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row">
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Diperikasa Oleh</label>
                                        <div>
                                            <input name="diperiksa_oleh" type="text" class="form-control" placeholder="isi nama dokter yang menangani pasien">
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <hr>
                                <button type="button" class="btn btn-primary btn-pasien col-md-2 col-lg-3 col-sm-3">Save & Complete</button>
                                 <button type="button" class="btn btn-success col-md-2 col-lg-3 col-sm-3 btn-find pl-4">Find</button>

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

<script>

$('.btn.btn-primary').click(function() {
    // Menghapus class "active" dari semua tab
    $('.nav-tabs .nav-item .nav-link').removeClass('active');

    // Menambahkan class "active" pada tab dengan href yang sesuai
    var targetHref = $(this).attr('href');
    $('.nav-tabs .nav-item .nav-link[href="' + targetHref + '"]').addClass('active');
  });

    getCart()
    
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
                            // setTimeout(() => {
                            //     if (response.code == 200) {
                            //         sw_alert("Success", String(response.message), "success");
                            //         // setTimeout(() => {
                            //         //     location.reload()
                            //         // }, 3000);
                            //     } else {
                            //         sw_alert("Error", String(response.message), "error");
                            //         $('.btn-save').html('Save');
                            //     }
                                
                            // $('.btn-pasien').html('save');
                            // $('.btn-pasien').attr('disabled', false);
                            // }, 3000);


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
    
</script>

<?php $this->load->view("_partials/script") ?>