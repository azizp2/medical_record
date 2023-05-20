<div class="row">
    <div class="col-12 ">
        <hr class="m-0">
        <div class="row mt-4 align-items-center">
            <div class="col-md-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Filters</h4>
                        <hr>
                        <form class="filterOutward">
                            <div class="form-group row">
                                <label for="example-date-input" class="col-sm-2 col-form-label">Shipment Date</label>
                                <div class="col-sm-2 col-md-4">
                                    <input type="date" class="form-control" name="shipment_date" placeholder="mm/dd/yyyy" id="datepicker-autoclose">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-date-input" class="col-sm-2 col-form-label">ETA</label>
                                <div class="col-sm-4 col-md-6">
                                    <select class="form-control" name="eta">
                                        <option selected class="holder">Please select</option>
                                        <option value="RSUP">Riau Sakti United Plantation</option>
                                        <option value="PSG">Pulau Sambu Guntung</option>
                                        <option value="STI">Sumatra TimurIndonesia</option>
                                    </select>
                                    <button class="btn btn-primary mt-3 btn-refresh" type="button">
                                        <span id="spinner" role="status" aria-hidden="true"></span> Refresh
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <hr>

            <div class="col-md-12">
                <div class="loadOutward"></div>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->


<?php $this->load->view("_partials/script") ?>