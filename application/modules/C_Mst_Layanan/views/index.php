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
                    <h4 class="mt-0 header-title">List Of Master Layanan</h4>
                </div>
                <div class="col-md-6">
                    <button class='btn btn-primary float-right col-md-3'>Tambah Data</button>
                </div>
            </div>
                <hr>
               

                    <table class="datatable table table-striped table-bordered dt-responsive nowrap table-search" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <th>Nama Layanan</th>
                            <th>Satuan</th>
                            <th>Harga</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                        <?php foreach($list as $val)
                        {
                            echo "<tr>";
                            echo "<td>$val->nama_layanan</td>";
                            echo "<td>$val->satuan</td>";
                            echo "<td>Rp. ". number_format($val->harga, '2',',')."</td>";
                            echo "<td>
                                    <button class='btn btn-danger'>Delete</button>
                                    <button class='btn btn-primary'>Edit</button>
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