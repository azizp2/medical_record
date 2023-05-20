<style>
    .opacity-50 {
        opacity: 0.5;
    }

    .pointer-events-none {
        pointer-events: none;
    }
</style>
<div class="row">
    <div class="col-xl-8">
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
                <div class="tab-content">
                    <div x-data="{ pasienLama: true, pasienBaru: false, showPilihPasien: false }" class="tab-pane active p-3" id="home" role="tabpanel">
                        <div class="row">
                            <div class="col-md-6">
                                <div x-bind:class="{ 'alert alert-primary mb-0 opacity-50 pointer-events-none': pasienLama, 'alert alert-primary mb-0': !pasienLama }" role="alert" x-on:click="pasienLama = true; pasienBaru = false; showPilihPasien = false">
                                    <h4 class="alert-heading mt-10 font-18">Pasien Lama</h4>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div x-bind:class="{ 'alert alert-success mb-0 opacity-50 pointer-events-none': pasienBaru, 'alert alert-success mb-0': !pasienBaru }" role="alert" x-on:click="pasienLama = false; pasienBaru = true; showPilihPasien = true">
                                    <h4 class="alert-heading mt-10 font-18">Pasien Baru</h4>
                                </div>
                            </div>
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
                                    <label>Nama Depan</label>
                                    <div>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama Belakang</label>
                                    <div>
                                        <input type="text" class="form-control">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" x-show="!showPilihPasien">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <div>
                                        <select class="form-control">
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
                                        <select class="form-control">
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
                                        <textarea name="" id="" class="form-control" cols="10" rows="3" placeholder="alamat lengkap pasien"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Catatan</label>
                                    <div>
                                        <textarea name="" id="" class="form-control" cols="10" rows="3" placeholder="isi keterangan pasien mengenai riwayat medis atau alergi dll"></textarea>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <hr>
                        <button class="btn btn-primary col-md-1">Save</button>
                    </div>
                    <div class="tab-pane p-3" id="profile" role="tabpanel">
                        <div class="row" x-show="!showPilihPasien">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Keluhan Pasien</label>
                                    <div>
                                        <textarea name="" id="" class="form-control" cols="10" rows="3" placeholder="isi keluhan pasien"></textarea>

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
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Berat Badan (kg)</label>
                                    <div>
                                        <input type="text" class="form-control">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" x-show="!showPilihPasien">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tekanan Darah (cm)</label>
                                    <div>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Pernapasan</label>
                                    <div>
                                        <input type="text" class="form-control">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" x-show="!showPilihPasien">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Detak Jantung</label>
                                    <div>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Suhu Tubuh</label>
                                    <div>
                                        <input type="text" class="form-control">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <button class="btn btn-primary col-md-1">Save</button>
                    </div>
                    <div class="tab-pane p-3" id="messages" role="tabpanel">
                        <div class="row" x-show="!showPilihPasien">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Subjektif</label>
                                    <div>
                                        <textarea name="" id="" class="form-control" cols="10" rows="3" placeholder="alamat lengkap pasien"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Objektif</label>
                                    <div>
                                        <textarea name="" id="" class="form-control" cols="10" rows="3" placeholder="isi keterangan pasien mengenai riwayat medis atau alergi dll"></textarea>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row" x-show="!showPilihPasien">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Assesment</label>
                                    <div>
                                        <textarea name="" id="" class="form-control" cols="10" rows="3" placeholder="alamat lengkap pasien"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Planning</label>
                                    <div>
                                        <textarea name="" id="" class="form-control" cols="10" rows="3" placeholder="isi keterangan pasien mengenai riwayat medis atau alergi dll"></textarea>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <hr>
                        <button class="btn btn-primary col-md-1">Save</button>
                    </div>
                    <div class="tab-pane p-3" id="settings" role="tabpanel">
                        <div class="row" x-show="!showPilihPasien">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Reset Obat</label>
                                    <div>
                                        <select class="form-control">
                                            <option disabled selected>...</option>
                                            <option>A</option>
                                            <option>B</option>
                                            <option>AB</option>
                                            <option>O</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Qty</label>
                                    <div>
                                        <select class="form-control">
                                            <option disabled selected>...</option>
                                            <option>A</option>
                                            <option>B</option>
                                            <option>AB</option>
                                            <option>O</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Catatan</label>
                                    <div>
                                        <textarea name="" id="" class="form-control" cols="10" rows="3" placeholder="isi keterangan pasien mengenai riwayat medis atau alergi dll"></textarea>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="col-xl-4">
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
    </div>
</div>



<?php $this->load->view("_partials/script") ?>