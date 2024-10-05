<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

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
                        <h4 class="mt-0 header-title">Data Pasien Rujukan</h4>
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
                        <th>NIK</th>
                        <th>Tanggal Datang</th>
                        <th>Nama Pasien</th>
                        <th>Jenis Kelamin</th>
                        <th>Tempat / Tgl Lahir</th>
                        <th>Telp</th>

                        <th>Alamat</th>

                        <th>Sumber Rujukan</th>

                        <!-- <th>Nama Wali</th>
                        <th>Tempat / Tgl Lahir</th>
                        <th>Telp Wali</th>
                        <th>Alamat Wali</th> -->

                        <th>Diagnosa Awal</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <?php foreach ($listRujukan as $item): ?>
                            <tr>
                                <td class="nowrap w-10">5</td>
                                <td><?php echo $item->no_rkm; ?></td>
                                <td><?php echo $item->nik; ?></td>
                                <td><?php echo date('d/m/Y', strtotime($item->tgl_lahir)); ?></td>
                                <td><?php echo $item->nama_depan . ' ' . $item->nama_belakang; ?></td>
                                <td><?php echo $item->jenis_kelamin; ?></td>
                                <td><?php echo $item->tempat_lahir . ', ' . date('d/m/Y', strtotime($item->tgl_lahir_wali)); ?></td>
                                <td><?php echo $item->no_telp; ?></td>
                                <td><?php echo $item->alamat; ?></td>
                                <td><?php echo $item->rujukan_dari; ?></td>

                                <!-- <td><?php echo $item->nama_wali; ?></td> -->
                                <!-- <td><?php echo $item->tempat_lahir_wali . ', ' . date('d/m/Y', strtotime($item->tgl_lahir_wali)); ?></td> -->
                                <!-- <td><?php echo $item->no_telp_wali; ?></td> -->
                                <!-- <td><?php echo $item->alamat_wali; ?></td> -->

                                <td><?= $item->nama_diagnosa ?> </td>

                                <td>
                                    <button type="button" class="btn btn-primary btn-sm modal-triase" data-rujukan_id="<?= $item->rujukan_id ?>" data-id="<?= $item->pasien_id ?>">Triase</button>
                                    <button type="button" class="btn btn-success btn-sm modal-evaluasi" data-rujukan_id="<?= $item->rujukan_id ?>" data-id="<?= $item->pasien_id ?>">Evaluasi</button>
                                    <button type="button" class="btn btn-info btn-sm modal-tatalaksana" data-rujukan_id="<?= $item->rujukan_id ?>" data-id="<?= $item->pasien_id ?>">Tatalaksana</button>
                                    <button type="button" class="btn btn-info btn-sm modal-cppt" data-rujukan_id="<?= $item->rujukan_id ?>" data-id="<?= $item->pasien_id ?>">Cppt</button>
                                    <button type="button" class="btn btn-warning btn-sm modal-farmasi" data-rujukan_id="<?= $item->rujukan_id ?>" data-id="<?= $item->pasien_id ?>">Farmasi</button>
                                    <button type="button" class="btn btn-danger btn-sm modal-selesai" data-rujukan_id="<?= $item->rujukan_id ?>" data-id="<?= $item->pasien_id ?>">Selesai</button>
                                    <button type="button" class="btn btn-dark btn-sm modal-perincian" data-rujukan_id="<?= $item->rujukan_id ?>" data-id="<?= $item->pasien_id ?>">Perincian</button>
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
                            <h5>Data Pasien</h5>
                            <hr>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Pilih Pasien</label>
                                <select class="form-control pilih-pasien" name="pasien_id">
                                    <option>...</option>
                                    <?php foreach ($listPasien as $val) {
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
                                <input type="" class="form-control tgl-lahir" readonly name="tgl_lahir">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Umur</label>
                                <input type="text" readonly class="form-control umur" name="umur">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Diagnosa Awal</label>
                                <select class="form-control select-search" name="diagnosa_awal">
                                    <option>...</option>
                                    <?php foreach ($listDiagnosa as $val) {
                                        echo "<option value=" . $val->id . ">" . $val->diagnosa . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>


                            <h5>Cara Pasien Datang</h5>
                            <hr>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Cara Pasien Datang</label>
                                <select class="form-control" name="cara_pasien_datang">
                                    <option>...</option>
                                    <option>Datang Sendiri</option>
                                    <option>Diantar Polisi</option>
                                    <option>Ambulance</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Rujukan Dari</label>
                                <input type="text" class="form-control" name="rujukan_dari">
                            </div>
                        </div>

                        <!-- Data Wali -->

                        <div class="col-md-6 border-right">
                            <h5>Data Pasien / Wali</h5>
                            <hr>

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
                    <button type="button" class="btn btn-primary btn-group-user btn-action" onclick="save()">Save changes</button>
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


            <div class="m-2 load-triase">

                <!-- Nav tabs -->


                <div id="form-triase"></div>


            </div>
        </div>
        </form>
    </div>

</div>
</div>
</div>

<!-- Modal Evaluasi-->
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


                <div id="form-evaluasi"></div>


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

            <button type="button" class="btn btn-primary mb-2 m-2 col-md4" id="add-row-btn">Add New</button>


            <div id="form-tatalaksana"></div>


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

                <button type="button" class="btn btn-primary mb-2 m-2 col-md4" id="add-row-btn-cppt">Add New</button>


                <div id="form-cppt"></div>





            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalPerincian" tabindex="-1" role="dialog" aria-labelledby="modalTriaseTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="m-2">



                <div id="form-perincian"></div>





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

                <button type="button" class="btn btn-primary mb-2 m-2 col-md4" id="add-row-btn-farmasi">Add New</button>


                <div id="form-farmasi"></div>
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

                <!-- <button type="button" class="btn btn-primary mb-2 m-2 col-md4" id="add-row-btn-selesai">Add New</button> -->


                <div id="form-selesai"></div>
            </div>
        </div>
    </div>
</div>




<script>
    $(document).on('change', '.tgl-lahir', function(e) {
        $('.select-search').select2();


        var tanggalLahir = $(this).val();

        var umur = hitungUmur(tanggalLahir);

        var umurInput = document.querySelector('.umur');
        umurInput.value = umur;
    })


    $('.pilih-pasien').on('change', function(e) {

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
                    sw_alert("Error", String(error), "error");

                    console.error('There has been a problem with your fetch operation:', error);
                });
        }

    })

    $(document).on('click', '.modal-triase', function(e) {
        const rujukan_id = $(this).data('rujukan_id');
        const url = `<?= base_url('C_KunjunganRujukan/getFormTriase/') ?>${$(this).data('id')}`;

        fetch(url)
            .then(response => {
                console.log("Response Status:", response.status);
                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }
                return response.text();
            })
            .then(data => {
                $('#modalTriase').modal('show');
                document.getElementById('form-triase').innerHTML = data;
            })
            .catch(error => {
                sw_alert("Error", String(error), "error");

                console.error('There has been a problem with your fetch operation:', error);
            });
    });


    $(document).on('click', '.modal-evaluasi', function() {
        const rujukan_id = $(this).data('rujukan_id');
        const url = `<?= base_url('C_KunjunganRujukan/getFormEvaluasi/') ?>${$(this).data('id')}`;
        console.log("Fetching URL:", url); // Log URL yang akan di-fetch

        fetch(url)
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }
                return response.text();
            })
            .then(data => {
                $('#modalEvaluasi').modal('show')
                document.getElementById('form-evaluasi').innerHTML = data;
            })
            .catch(error => {
                sw_alert("Error", String(error), "error");

                console.error('There has been a problem with your fetch operation:', error);
            });

    });

    $(document).on('click', '.modal-tatalaksana', function() {

        const rujukan_id = $(this).data('rujukan_id');
        const url = `<?= base_url('C_KunjunganRujukan/getFormTatalaksana/') ?>${$(this).data('id')}`;
        console.log("Fetching URL:", url); // Log URL yang akan di-fetch

        fetch(url)
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }
                return response.text();
            })
            .then(data => {
                $('#modalTatalaksana').modal('show')
                document.getElementById('form-tatalaksana').innerHTML = data;
            })
            .catch(error => {
                sw_alert("Error", String(error), "error");

                console.error('There has been a problem with your fetch operation:', error);
            });




    });

    $(document).on('click', '.modal-cppt', function() {

        const rujukan_id = $(this).data('rujukan_id');
        const url = `<?= base_url('C_KunjunganRujukan/getFormCPPT/') ?>${$(this).data('id')}`;
        console.log("Fetching URL:", url); // Log URL yang akan di-fetch

        fetch(url)
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }
                return response.text();
            })
            .then(data => {
                $('#modalCPPT').modal('show')

                document.getElementById('form-cppt').innerHTML = data;
            })
            .catch(error => {
                sw_alert("Error", String(error), "error");
                console.error('There has been a problem with your fetch operation:', error);
            });



    });


    $(document).on('click', '.modal-farmasi', function() {

        const rujukan_id = $(this).data('rujukan_id');
        const url = `<?= base_url('C_KunjunganRujukan/getFormFarmasi/') ?>${$(this).data('id')}`;
        console.log("Fetching URL:", url); // Log URL yang akan di-fetch

        fetch(url)
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }
                return response.text();
            })
            .then(data => {
                $('#modalFarmasi').modal('show')

                document.getElementById('form-farmasi').innerHTML = data;
            })
            .catch(error => {
                sw_alert("Error", String(error), "error");
                console.error('There has been a problem with your fetch operation:', error);
            });



    });


    $(document).on('click', '.modal-selesai', function() {
        const rujukan_id = $(this).data('rujukan_id');
        const url = `<?= base_url('C_KunjunganRujukan/getFormSelesai/') ?>${$(this).data('id')}`;
        console.log("Fetching URL:", url); // Log URL yang akan di-fetch

        fetch(url)
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }
                return response.text();
            })
            .then(data => {
                $('#modalSelesai').modal('show');
                document.getElementById('form-selesai').innerHTML = data;

                // Move the event listener inside the fetch promise to ensure it's set after the modal is populated
                document.getElementById('add-row-btn-selesai').addEventListener('click', function() {
                    const tableBody = document.getElementById('table-body-selesai');

                    // Create a new row
                    const newRow = document.createElement('tr');

                    // Calculate the new row number
                    const rowNumber = tableBody.children.length > 0 ?
                        parseInt(tableBody.lastElementChild.cells[0].innerText) + 1 :
                        1; // Default to 1 if there are no rows

                    newRow.innerHTML = `
                        <td>
                            <select class="form-control" name="obat_id[]">
                                <option value="">Select Obat...</option>
                                <?php foreach ($listObat as $item): ?>
                                    <option value="<?= $item->id ?>" <?= $item->id == $val->obat_id ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($item->nama_obat) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                        <td>
                            <input type="number" class="form-control" name="jumlah[]" required>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="dosis[]" required>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="frekuensi[]"  required>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="cara_pembelian[]" required>
                        </td>
                            
                        `;

                    // Clear "Data Not Found" row if it exists
                    if (tableBody.children.length === 1 && tableBody.firstElementChild.cells[0].colSpan === 8) {
                        tableBody.innerHTML = ''; // Clear only if there's a single "Data Not Found" row
                    }

                    // Append the new row
                    tableBody.appendChild(newRow);
                });

                document.getElementById('add-row-btn-layanan').addEventListener('click', function() {
                    const tableBody = document.getElementById('table-body-layanan');

                    // Create a new row
                    const newRow = document.createElement('tr');

                    // Calculate the new row number
                    const rowNumber = tableBody.children.length > 0 ?
                        parseInt(tableBody.lastElementChild.cells[0].innerText) + 1 :
                        1; // Default to 1 if there are no rows

                    newRow.innerHTML = `
                            <td>
                                <select class="form-control" name="layanan_id[]">
                                    <option value="">Select Layanan...</option>
                                    <?php foreach ($listLayanan as $item): ?>
                                        <option value="<?= $item->id ?>" <?= $item->id == $val->layanan_id ? 'selected' : '' ?>>
                                            <?= htmlspecialchars($item->nama_layanan) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                            <td>
                                <input type="number" class="form-control" name="qty[]" value="<?= $val->qty ?>" required>
                            </td>
                            <td>
                                <input type="text" class="form-control" name="ket[]" value="<?= $val->ket ?>" required>
                            </td>
                        `;

                    // Clear "Data Not Found" row if it exists
                    if (tableBody.children.length === 1 && tableBody.firstElementChild.cells[0].colSpan === 8) {
                        tableBody.innerHTML = ''; // Clear only if there's a single "Data Not Found" row
                    }

                    // Append the new row
                    tableBody.appendChild(newRow);
                });
            })
            .catch(error => {
                sw_alert("Error", String(error), "error");
                console.error('There has been a problem with your fetch operation:', error);
            });
    });



    $(document).on('click', '.modal-perincian', function() {

        const rujukan_id = $(this).data('rujukan_id');
        const url = `<?= base_url('C_KunjunganRujukan/getFormPerincian/') ?>${$(this).data('id')}`;
        console.log("Fetching URL:", url); // Log URL yang akan di-fetch

        fetch(url)
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }
                return response.text();
            })
            .then(data => {
                $('#modalPerincian').modal('show')

                document.getElementById('form-perincian').innerHTML = data;
            })
            .catch(error => {
                sw_alert("Error", String(error), "error");
                console.error('There has been a problem with your fetch operation:', error);
            });



    });




    // $(document).ready(function() {
    // Event delegation for the "Edit" button click



    //region test




    $(document).on('click', '.assesmen', function(e) {
        e.preventDefault();


        var id = $(this).data('id'); // Ambil ID dari elemen yang diklik
        var newUrl = "<?= base_url() ?>/C_KunjunganRujukan/printFormTriase/" + id + "/assesmen";



        // Ganti href tombol dengan URL cetak yang baru
        $('.triase-btn-print').attr('href', newUrl);

    });


    $(document).on('click', '.skreningNyeri', function(e) {
        e.preventDefault();


        var id = $(this).data('id'); // Ambil ID dari elemen yang diklik
        var newUrl = "<?= base_url() ?>/C_KunjunganRujukan/printFormTriase/" + id + "/skreningNyeri";



        // Ganti href tombol dengan URL cetak yang baru
        $('.triase-btn-print').attr('href', newUrl);

    });


    $(document).on('click', '.resikoJatuh', function(e) {
        e.preventDefault();


        var id = $(this).data('id'); // Ambil ID dari elemen yang diklik
        var newUrl = "<?= base_url() ?>/C_KunjunganRujukan/printFormTriase/" + id + "/resikoJatuh";



        // Ganti href tombol dengan URL cetak yang baru
        $('.triase-btn-print').attr('href', newUrl);

    });

    $(document).on('click', '.serahTerima', function(e) {
        e.preventDefault();


        var id = $(this).data('id'); // Ambil ID dari elemen yang diklik
        var newUrl = "<?= base_url() ?>/C_KunjunganRujukan/printFormTriase/" + id + "/serahTerima";



        // Ganti href tombol dengan URL cetak yang baru
        $('.triase-btn-print').attr('href', newUrl);

    });




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

        if (id > 0) {
            $('#form-data input[name="id"]').attr('readonly', true);
        } else {
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
                        error: function(jqXHR, textError) {
                            console.log(jqXHR);
                            console.log(textError);
                        }
                    });
                });
            },
        });
    }


    function saveTriase() {
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
                        data: $("#form-data-triase").serialize(),
                        dataType: "json",
                        beforeSend: function() {
                            // $('#spinnerSave').attr('class', 'spinner-border spinner-border-sm')
                            $('.btn-action').html('Loading...');
                            $('.btn-action').attr('disabled', true);
                        },
                        success: function(response) {

                            console.log(response)

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
                            let message = ''; // Gunakan let untuk bisa mengubah nilai

                            // Cek jika responseJSON ada
                            if (jqXHR.responseJSON && jqXHR.responseJSON.message) {
                                message = jqXHR.responseJSON.message;
                            } else {
                                message = jqXHR.statusText; // Ambil statusText jika tidak ada message
                            }
                            sw_alert("Error", String(message), "error");

                            console.log(jqXHR);
                            console.log(textError);
                        }
                    });
                });
            },
        });
    }


    function saveEvaluasi() {
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
                        url: "<?= base_url("C_KunjunganRujukan/saveEvaluasi") ?>",
                        data: $("#form-data-evaluasi").serialize(),
                        dataType: "json",
                        beforeSend: function() {
                            // $('#spinnerSave').attr('class', 'spinner-border spinner-border-sm')
                            $('.btn-action').html('Loading...');
                            $('.btn-action').attr('disabled', true);
                        },
                        success: function(response) {

                            console.log(response)

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
                            let message = ''; // Gunakan let untuk bisa mengubah nilai

                            // Cek jika responseJSON ada
                            if (jqXHR.responseJSON && jqXHR.responseJSON.message) {
                                message = jqXHR.responseJSON.message;
                            } else {
                                message = jqXHR.statusText; // Ambil statusText jika tidak ada message
                            }
                            sw_alert("Error", String(message), "error");

                            console.log(jqXHR);
                            console.log(textError);
                        }
                    });
                });
            },
        });
    }

    function saveTT() {
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
                        url: "<?= base_url("C_KunjunganRujukan/saveTT") ?>",
                        data: $("#form-data-tatalaksana").serialize(),
                        dataType: "json",
                        beforeSend: function() {
                            // $('#spinnerSave').attr('class', 'spinner-border spinner-border-sm')
                            $('.btn-action').html('Loading...');
                            $('.btn-action').attr('disabled', true);
                        },
                        success: function(response) {

                            console.log(response)

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
                            let message = ''; // Gunakan let untuk bisa mengubah nilai

                            // Cek jika responseJSON ada
                            if (jqXHR.responseJSON && jqXHR.responseJSON.message) {
                                message = jqXHR.responseJSON.message;
                            } else {
                                message = jqXHR.statusText; // Ambil statusText jika tidak ada message
                            }
                            sw_alert("Error", String(message), "error");

                            console.log(jqXHR);
                            console.log(textError);
                        }
                    });
                });
            },
        });
    }


    function saveCPPT() {
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
                        url: "<?= base_url("C_KunjunganRujukan/saveCPPT") ?>",
                        data: $("#form-data-cppt").serialize(),
                        dataType: "json",
                        beforeSend: function() {
                            // $('#spinnerSave').attr('class', 'spinner-border spinner-border-sm')
                            $('.btn-action').html('Loading...');
                            $('.btn-action').attr('disabled', true);
                        },
                        success: function(response) {

                            console.log(response)

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
                            let message = ''; // Gunakan let untuk bisa mengubah nilai

                            // Cek jika responseJSON ada
                            if (jqXHR.responseJSON && jqXHR.responseJSON.message) {
                                message = jqXHR.responseJSON.message;
                            } else {
                                message = jqXHR.statusText; // Ambil statusText jika tidak ada message
                            }
                            sw_alert("Error", String(message), "error");

                            console.log(jqXHR);
                            console.log(textError);
                        }
                    });
                });
            },
        });
    }

    function saveFarmasi() {
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
                        url: "<?= base_url("C_KunjunganRujukan/saveFarmasi") ?>",
                        data: $("#form-data-farmasi").serialize(),
                        dataType: "json",
                        beforeSend: function() {
                            // $('#spinnerSave').attr('class', 'spinner-border spinner-border-sm')
                            $('.btn-action').html('Loading...');
                            $('.btn-action').attr('disabled', true);
                        },
                        success: function(response) {

                            console.log(response)

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
                            let message = ''; // Gunakan let untuk bisa mengubah nilai

                            // Cek jika responseJSON ada
                            if (jqXHR.responseJSON && jqXHR.responseJSON.message) {
                                message = jqXHR.responseJSON.message;
                            } else {
                                message = jqXHR.statusText; // Ambil statusText jika tidak ada message
                            }
                            sw_alert("Error", String(message), "error");

                            console.log(jqXHR);
                            console.log(textError);
                        }
                    });
                });
            },
        });
    }

    function saveSelesai() {
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
                        url: "<?= base_url("C_KunjunganRujukan/saveSelesai") ?>",
                        data: $("#form-data-selesai").serialize(),
                        dataType: "json",
                        beforeSend: function() {
                            // $('#spinnerSave').attr('class', 'spinner-border spinner-border-sm')
                            $('.btn-action').html('Loading...');
                            $('.btn-action').attr('disabled', true);
                        },
                        success: function(response) {

                            console.log(response)

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
                            let message = ''; // Gunakan let untuk bisa mengubah nilai

                            // Cek jika responseJSON ada
                            if (jqXHR.responseJSON && jqXHR.responseJSON.message) {
                                message = jqXHR.responseJSON.message;
                            } else {
                                message = jqXHR.statusText; // Ambil statusText jika tidak ada message
                            }
                            sw_alert("Error", String(message), "error");

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
                        url: "<?= base_url("C_Mst_Dokter/delete") ?>",
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


    // tataksana

    // <!-- function -- >
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

    document.getElementById('add-row-btn').addEventListener('click', function() {
        const tableBody = document.getElementById('table-body');

        // Create a new row
        const newRow = document.createElement('tr');

        // Calculate the new row number
        let rowNumber = 1; // Default to 1 if there are no rows
        if (tableBody.children.length > 0) {
            const lastRow = tableBody.lastElementChild;
            rowNumber = parseInt(lastRow.cells[0].innerText) + 1; // Get last row number and increment
        }

        newRow.innerHTML = `
            <td><input type="date" class="form-control" name="waktu[]"></td>
            <td><input type="text" class="form-control" name="obat_cairan[]"></td>
            <td><input type="text" class="form-control" name="dosis[]"></td>
            <td><input type="text" class="form-control" name="cara_pembelian[]"></td>
            <td>
                <select class="form-control" name="dokter[]">
                    <option value="">Select Dokter...</option>
                    <?php foreach ($listDokter as $item): ?>
                        <option value="<?= $item->nama ?>" <?= $item->nama == "$getTriaseSerahTerima->dokter_triase" ? 'selected' : '' ?>>
                            <?= $item->nama ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </td>
            <td><input type="date" class="form-control" name="waktu_pembelian[]"></td>
            <td><input type="text" class="form-control" name="ttd_perawat[]"></td>
        `;

        // Clear "Data Not Found" row if it exists
        if (tableBody.children.length === 1 && tableBody.firstElementChild.cells[0].colSpan === 8) {
            tableBody.innerHTML = ''; // Clear only if there's a single "Data Not Found" row
        }

        // Append the new row
        tableBody.appendChild(newRow);
    });

    document.getElementById('add-row-btn-cppt').addEventListener('click', function() {
        const tableBody = document.getElementById('table-body-cppt');

        // Create a new row
        const newRow = document.createElement('tr');

        // Calculate the new row number
        let rowNumber = tableBody.children.length + 1; // Start counting from 1



        // Clear "Data Not Found" row if it exists
        if (tableBody.children.length === 1 && tableBody.firstElementChild.cells[0].colSpan === 8) {
            tableBody.innerHTML = ''; // Clear only if there's a single "Data Not Found" row
        }

        // Add class for even or odd rows
        if (rowNumber % 2 != 0) {
            newRow.classList.add('even-row'); // Add class for even rows

            newRow.innerHTML = `
                <td><input type="date" class="form-control" name="waktu[]" required></td>
                <td>
                    <input type="text" class="form-control" name="profesional[]" required value='Perawat' readonly>
                </td>
                <td><textarea class="form-control" name="asesmen[]" required></textarea></td>
                <td><textarea class="form-control" name="instruksi[]" required></textarea></td>
                <td>
                <select class="form-control" name="verifikasi[]">
                                <option value="">...</option>
                                <?php foreach ($listPerawat as $item): ?>
                                    <option <?= isset($getTriaseSerahTerima) && $item->nama == "$getTriaseSerahTerima->perawat_triase" ? 'selected' : '' ?>>
                                        <?= $item->nama ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                </td>
            `;
        } else {

            newRow.classList.add('odd-row'); // Add class for odd rows
            newRow.innerHTML = `
                <td><input type="date" class="form-control" name="waktu[]" required></td>
                <td>
                    <input type="text" class="form-control" name="profesional[]" required value='Dokter' readonly>
                </td>
                <td><textarea class="form-control" name="asesmen[]" required></textarea></td>
                <td><textarea class="form-control" name="instruksi[]" required></textarea></td>
                <td>
                <select class="form-control" name="verifikasi[]">
                                <option>...</option>
                                <?php foreach ($listDokter as $item): ?>
                                    <option <?= isset($getTriaseSerahTerima) && $item->nama == "$getTriaseSerahTerima->infomasi_by" ? 'selected' : '' ?>>
                                        <?= $item->nama ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                </td>
            `;
        }

        // Append the new row
        tableBody.appendChild(newRow);
    });


    document.getElementById('add-row-btn-farmasi').addEventListener('click', function() {
        const tableBody = document.getElementById('table-body-farmasi');

        // Create a new row
        const newRow = document.createElement('tr');

        // Calculate the new row number
        let rowNumber = 1; // Default to 1 if there are no rows
        if (tableBody.children.length > 0) {
            const lastRow = tableBody.lastElementChild;
            rowNumber = parseInt(lastRow.cells[0].innerText) + 1; // Get last row number and increment
        }

        newRow.innerHTML = `
        <td>
                    <select class="form-control" name="obat_id[]">
                        <option value="">Select Obat...</option>
                        <?php foreach ($listObat as $item): ?>
                            <option value="<?= $item->id ?>" <?= $item->nama_obat == "$val->dokter" ? 'selected' : '' ?>>
                                <?= $item->nama_obat ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <td><input type="text" class="form-control" name="dosis[]" required></td>
                <td><input type="date" class="form-control" name="tanggal[]" required></td>
                <td><input type="number" class="form-control" name="jumlah[]" required></td>
        `;

        // Clear "Data Not Found" row if it exists
        if (tableBody.children.length === 1 && tableBody.firstElementChild.cells[0].colSpan === 8) {
            tableBody.innerHTML = ''; // Clear only if there's a single "Data Not Found" row
        }

        // Append the new row
        tableBody.appendChild(newRow);
    });
</script>