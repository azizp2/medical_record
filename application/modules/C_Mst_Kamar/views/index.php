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
                            <th>Nama Kamar</th>
                            <th>Jenis Kamar</th>
                            <th>Fasilitas</th>
                            <th>Action</th>
                            <th hidd>Action</th>
                        </thead>
                        <tbody>
                        <?php foreach($list as $key=>$val)
                        {
                            echo "<tr>";
                            echo "<td>".($key+1)."</td>"; 
                            echo "<td>$val->nomor_kamar</td>";
                            echo "<td>$val->jenis_kamar</td>";
                            echo "<td>$val->fasilitas</td>";
                            echo "<td hidden>$val->id</td>";
                            echo "<td>
                                    <button class='btn btn-danger' onclick='deleted(".$val->id.")'>Delete</button>
                                    <button class='btn btn-primary open-modal'>Edit</button>
                                </td>";
                            echo "</tr>";
                        } ?>
                        </tbody>
                    </table>

            </div>
        </div>
    </div>

</div>


<!-- Modal -->
<div class="modal fade" id="modalForm" tabindex="-1" role="dialog" aria-labelledby="modalFormTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Kamar</label>
                        <input type="hidden" class="form-control" name="id">
                        <input type="text" class="form-control" name="nomor_kamar">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Jenis Kamar</label>
                        <input type="text" class="form-control" name="jenis_kamar">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Fasilitas</label>
                        <input type="text" class="form-control" name="fasilitas">
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


<script>
    $(document).ready(function() {
  // Event delegation for the "Edit" button click
        $(document).on('click', '.open-modal', function() {
            $("#exampleModalLongTitle").html("Form Create Obat")
        //     $(".btn-action").attr('onclick', 'save()');
            $("#modalForm").modal('show')
            // Get the parent table row (tr)
            var row = $(this).closest('tr');

            // Get the text content of each cell in the row
            var id = row.find('td:eq(4)').text();
            var nomor_kamar = row.find('td:eq(1)').text();
            var jenis_kamar = row.find('td:eq(2)').text();
            var fasilitas = row.find('td:eq(3)').text();
            // alert(nomor_kamar)

      

            // Populate the form fields with the retrieved values
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

            // Call your edit function or perform any other desired actions
            // ...

            // Prevent the default button click behavior
            return false;
        });
    });

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
                        url: "<?= base_url("C_Mst_Kamar/save") ?>",
                        data: $("#form-data").serialize(),
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
</script>

<?php $this->load->view("_partials/script") ?>