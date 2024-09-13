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
                    <h4 class="mt-0 header-title">Laporan Pasien</h4>
                </div>
                
            </div>
                <hr>
                <form action="<?= base_url('C_Report_Kunjungan') ?>">
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="inputEmail4">From Date</label>
                        <input type="date" name="from" class="form-control" id="inputEmail4" placeholder="Email" required value="<?= $from ?>">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputPassword4">To Date</label>
                        <input type="date" name="to" class="form-control" id="inputPassword4" placeholder="Password" required value="<?= $to ?>">
                    </div>
                    <div class="form-group col-md-3 mt-4" style="padding-top: 2px;">
                        <button type="submit" class="btn btn-danger" onclick="refresh()">Search</button>
                    </div>
                </div>
                <form>

               

                    <table class="table table-striped table-bordered table-search table-responsive"  style="border-collapse: collapse; border-spacing: 0; font-size:10px;">
                        <thead>
                            <th>No. RM</th>
                            <th>NIK</th>
                            <th>Nama Lengkap</th>
                            <th>Umur</th>
                            <th>Tanggal Masuk</th>
                            <th>Tanggal Keluar</th>
                            <th>Status Pasien</th>
                            <th>Keluhan</th>
                            <th>Diagnosa</th>
                            <th>Diperiksa Oleh</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                        <?php foreach($list as $val)
                        {
                            $status_pasien = $val->status_pulang == 3 ? "Observasi" : ($val->status_pulang == 2 ? "Rawat Inap" : "Rawat Jalan");

                            echo "<tr>";
                            echo "<td>$val->norm</td>";
                            echo "<td>$val->nikktp</td>";
                            echo "<td>$val->nama_depan $val->nama_belakang</td>";
                            echo "<td>$val->umur Tahun</td>";
                            echo "<td>$val->create_date</td>";
                            echo "<td>$val->tgl_selesai</td>";
                            echo "<td>".getStatusPulang($val->status_pulang)."</td>";
                            echo "<td>$val->keluhan</td>";
                            
                            echo "<td><pre style=text-align:left>Diangnosa 1 : $val->objektif 
Diagnosa 2 : $val->subjektif 
</pre></td>";
                            echo "<td>$val->diperiksa_oleh</td>";
                            echo "<td>
                                <a href=".base_url('C_Medical_Record/cetak/').$val->idx." class='btn btn-danger mb-2'>Cetak</a>
                                <a href=".base_url('C_Medical_Record/cetak_dokter/').$val->idx." class='btn btn-primary mb-2'>Resume Dokter</a>
                            </td>";
                            echo "</tr>";
                        } ?>
                        </tbody>
                    </table>

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
                                    // setTimeout(() => {
                                    //     location.reload()
                                    // }, 3000);
                                } else {
                                    sw_alert("Error", String(response.message), "error");
                                    $('.btn-save').html('Save');
                                }
                                
                            $('.btn-pasien').html('save');
                            $('.btn-pasien').attr('disabled', false);
                            }, 3000);


                        }
                    });
                });
            },
        });
    });
    
</script>

<?php $this->load->view("_partials/script") ?>