<style>
    .opacity-50 {
        opacity: 0.5;
    }

    .pointer-events-none {
        pointer-events: none;
    }
</style>
<?php
function hitungUmur($tgl_lahir)
{

    // Convert the birth date to a DateTime object
    $birthDate = new DateTime($tgl_lahir);
    $today = new DateTime();

    // Calculate the age
    $age = $today->diff($birthDate)->y; // Get the difference in years

    return $age;
}
?>
<div class="row">
    <div class="col-xl-12">
        <div class="card m-b-30">
            <div class="card-body">

                <div class="row">
                    <div class="col-md-6">
                        <h4 class="mt-0 header-title">Daftar Pasien</h4>
                    </div>
                    <div class="col-md-6">
                        <button class='btn btn-primary float-right col-md-3 open-modal'>Tambah Data</button>
                    </div>
                </div>
                <hr>


                <table class="datatable table table-striped table-bordered dt-responsive nowrap" id="myTable" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <th class="nowrap w-10">No</th>
                        <th class="text-nowrap">NO RKM</th>
                        <th hidden class="text-nowrap">NO RKM</th>
                        <th hidden class="text-nowrap">NO RKM</th>
                        <th class="text-nowrap">NIK</th>
                        <th class="text-nowrap">Fullname</th>
                        <th class="text-nowrap">Tempat Lahir</th>
                        <th class="text-nowrap">Tanggal Lahir</th>
                        <th class="text-nowrap">Gender</th>
                        <th class="text-nowrap">Alamat</th>
                        <th class="text-nowrap">No Telp</th>
                        <th class="text-nowrap">Umur</th>
                        <th class="text-nowrap">Action</th>
                    </thead>
                    <tbody>
                        <?php foreach ($list as $key => $val) {
                            $fullname = $val->nama_depan . " " . $val->nama_belakang;
                            echo "<tr>";
                            echo "<td hidden>" . $val->nama_depan ?? null . "</td>";
                            echo "<td hidden>" . $val->nama_belakang ?? null . "</td>";

                            echo "<td>" . ($key + 1) . "</td>";
                            echo "<td>" . $val->no_rkm ?? null . "</td>";
                            echo "<td>" . $val->nik ?? null . "</td>";
                            echo "<td>" . $fullname . "</td>";
                            echo "<td>" . $val->golongan_darah ?? null . "</td>";
                            echo "<td>" . $val->tgl_lahir ?? null . "</td>";
                            echo "<td>" . $val->gender ?? null . "</td>";
                            echo "<td>" . $val->alamat ?? null . "</td>";
                            echo "<td>" . $val->no_telp ?? null . "</td>";
                            echo "<td>" . hitungUmur($val->tgl_lahir) . " tahun</td>";
                            echo "<td>
                                    <button class='btn btn-danger' onclick='deleted(" . $val->idx . ")'>Delete</button>
                                    <button class='btn btn-primary open-modal' data-id=" . $val->idx . ">Edit</button>
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
                        <label for="exampleInputEmail1">No RKM</label>
                        <input type="hidden" class="form-control" name="id">
                        <input type="text" class="form-control" name="no_rkm">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">NIK</label>
                        <input type="text" class="form-control" name="nik">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Depan</label>
                        <input type="text" class="form-control" name="nama_depan">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Belakang</label>
                        <input type="text" class="form-control" name="nama_belakang">
                    </div>



                    <div class="form-group">
                        <label for="exampleInputPassword1">Tempat Lahir</label>
                        <input type="text" class="form-control" name="golongan_darah">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tgl_lahir">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Gender</label>
                        <select class="form-control" name="gender">
                            <option>Pria</option>
                            <option>Wanita</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Alamat</label>
                        <input type="text" class="form-control" name="alamat">
                    </div>


                    <div class="form-group">
                        <label for="exampleInputPassword1">No Telp</label>
                        <input type="text" class="form-control" name="no_telp">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary btn-group-user btn-action" onclick="save()">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable({})
    });
</script>



<script>
    $(document).ready(function() {
        // Event delegation for the "Edit" button click\
        $(document).on('click', '.open-modal', function(e) {
            $("#exampleModalLongTitle").html("Form Create Pasien")
            //     $(".btn-action").attr('onclick', 'save()');
            $("#modalForm").modal('show')
            // Get the parent table row (tr)
            var row = $(this).closest('tr');

            // Get the text content of each cell in the row
            var id = $(this).data('id')

            var no_rkm = row.find('td:eq(3)').text();
            var nama_depan = row.find('td:eq(0)').text();
            var nama_belakang = row.find('td:eq(1)').text();
            var nik = row.find('td:eq(5)').text();
            var tgl_lahir = row.find('td:eq(6)').text();
            var gender = row.find('td:eq(7)').text();
            var golongan_darah = row.find('td:eq(8)').text();
            var alamat = row.find('td:eq(9)').text();
            var notelp = row.find('td:eq(10)').text();



            // Populate the form fields with the retrieved values
            $('#form-data input[name="id"]').val(id);
            $('#form-data input[name="nama_depan"]').val(nama_depan);
            $('#form-data input[name="nama_belakang"]').val(nama_belakang);
            $('#form-data input[name="no_rkm"]').val(no_rkm);
            $('#form-data input[name="nik"]').val(nik);
            $('#form-data input[name="tgl_lahir"]').val(tgl_lahir);
            $('#form-data input[name="gender"]').val(gender);
            $('#form-data input[name="golongan_darah"]').val(golongan_darah);
            $('#form-data input[name="alamat"]').val(alamat);
            $('#form-data input[name="no_telp"]').val(notelp);

            if (id > 0) {
                $('#form-data input[name="id"]').attr('readonly', true);
            } else {
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
    function save() {
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
                        url: "<?= base_url("C_Mst_Pasien/save") ?>",
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
                        error: function(jqXHR, textError) {
                            console.log(jqXHR);
                            console.log(textError);
                        }
                    });
                });
            },
        });
    }

    function deleted(id) {
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
                        url: "<?= base_url("C_Mst_Pasien/delete") ?>",
                        data: {
                            'id': id
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
                        error: function(jqXHR, textError) {
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