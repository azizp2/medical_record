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
                    <h4 class="mt-0 header-title">Laporan Obat Keluar</h4>
                </div>
                
            </div>
                <hr>
                <form action="<?= base_url('C_Report_Kunjungan/report_trans_obat') ?>">
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

               

                    <table class="table table-bordered"  style="border-collapse: collapse; border-spacing: 0; width: 100%; font-size:10px;">
                        <thead>
                            <th>Kode Obat</th>
                            <th>Satuan</th>
                            <th>Tanggal Trans</th>
                            <th>Harga</th>
                            <th>Qty</th>
                            <th>Subtotal</th>
                        </thead>
                        <tbody>
                        <?php foreach($listObat as $val)
                        {
                            $status_pasien = $val->status_pulang == 1 ? "Rawat Jalan" : "Rawat Inap";
                            echo "<tr style='background-color: #2F4F4F;color: white; line-height: 0.5px;'>";
                            echo "<td colspan=6 style='padding-left: 50px;'>$val->nama_obat</td>";
                            echo "</tr>";

                            
                            foreach($listTrans as $item):
                                if($item->id_obat == $val->id){
                                    echo "<tr style='line-height: 0.5px;'>";
                                    echo "<td style='padding-left: 100px;'>$val->kode_obat</td>";
                                    echo "<td>$val->satuan</td>";
                                    echo "<td>$item->create_date</td>";
                                    echo "<td>Rp. ".number_format($val->harga)."</td>";
                                    echo "<td>$item->qty</td>";
                                    echo "<td>Rp. ".number_format($item->qty * $val->harga)."</td>";
                                    echo "</tr>";
                                    $total += $item->qty * $val->harga;
                                }
                            endforeach;
                        } ?>
                        </tbody>
                    </table>


                    <div class="alert alert-danger col-md-4"><b>Total Terjual : Rp. <?= number_format($total) ?></b></div>


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