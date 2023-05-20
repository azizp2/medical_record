<div class="row">
    <div class="col-12">
        <div class="">
            <div class="">

                <hr>

                <div class="row mt-4 align-items-center">

                    <div class="col-lg-3 userLogin grab">
                        <div class="card mb-4">
                            <div class="card-body">
                                <i class="mdi mdi-account-multiple-plus font-30"></i>
                                <h5 class="font-18 mb-3">User Login Management</h5>
                                <!-- <p class="text-muted mb-0">If several languages coalesce, the grammar of the resulting language is more simple and regular than that of the individual language.</p> -->
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 groupUsers grab">
                        <div class="card mb-4">
                            <div class="card-body">
                                <i class="mdi mdi-account-group font-30"></i>
                                <h5 class="font-18 mb-3">Group Users<i class="fa fa-user-o" aria-hidden="true"></i></h5>
                                <!-- <p class="text-muted mb-0">If several languages coalesce, the grammar of the resulting language is more simple and regular than that of the individual.</p> -->
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 menuManagement grab">
                        <div class="card mb-4">
                            <div class="card-body">
                                <i class="mdi mdi-xbox-controller-menu font-30"></i>
                                <h5 class="mb-3 font-18">Menu Mangement</h5>
                                <!-- <p class="text-muted mb-0">Everyone realizes why a new common language would be desirable one could refuse to pay expensive that translators.</p> -->
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-3 menuAccessManagement grab">
                        <div class="card mb-4">
                            <div class="card-body">
                                <i class="mdi mdi-lock-open font-30"></i>
                                <h5 class="font-18 mb-3">Menu Access Management</h5>
                                <!-- <p class="text-muted mb-0">If several languages coalesce, the grammar of the resulting language is more simple and regular than that of the individual.</p> -->
                            </div>
                        </div>
                    </div>
                </div>
                <hr>

                <div class="card m-b-30">
                    <!-- List Of Users -->
                    <div class="card-body" id="tableOfUsers">



                        <div class="row">
                            <div class="col">
                                <h4 class="header-title">List Of Users Login</h4>
                            </div>
                            <div class="col">
                                <button class="btn btn-primary mt-0 float-right">Add New user</button>
                            </div>
                        </div>
                        <hr>

                        <table class="datatable table table-striped table-bordered dt-responsive nowrap table-search" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <th class="nowrap w-10">User ID</th>
                                <th>Full Name</th>
                                <th>Postion</th>
                                <th>Group User</th>
                                <th>Mobile Number</th>
                                <th>Factory</th>
                                <th>Action</th>
                            </thead>


                            <tbody id="loadListOfUsers">

                            </tbody>
                        </table>


                    </div>
                    <!-- End List Of Users -->

                    <!-- List Of Group User -->
                    <div class="card-body" id="tableOfGroupUsers">
                        <div class="row">
                            <div class="col">
                                <h4 class="header-title">List Of Group Users</h4>
                            </div>
                            <div class="col">
                                <button class="btn btn-primary mt-0 float-right">Add New user</button>
                            </div>
                        </div>
                        <hr>
                        <table class="table table-striped table-bordered dt-responsive nowrap table-search" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th class="nowrap" style="width: 10px;">Group ID</th>
                                    <th class="nowrap" style="width: 100px;">Group Name</th>
                                    <th class="nowrap" style="width: 20px;">Group Remarks</th>
                                    <th class="nowrap" style="width: 50px;">Not Active</th>
                                    <th class="nowrap" style="width: 10px;">Created</th>
                                    <th class="nowrap" style="width: 10px;">Last Update</th>
                                    <th class="nowrap" style="width: 10px;">Action</th>
                                </tr>
                            </thead>
                            <tbody id="loadListOfGroup">

                            </tbody>
                        </table>


                    </div>
                    <!-- End List Group User -->

                    <!-- List Of Menu Management -->
                    <div class="card-body" id="tableOfMenuMangement">
                        <div class="row">
                            <div class="col">
                                <h4 class="header-title">List Of Menu Management</h4>
                            </div>
                            <div class="col">
                                <button class="btn btn-primary mt-0 float-right">Add New user</button>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <form>
                                    <div class="mb-2">
                                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-2">
                                        <label for="exampleInputPassword1" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="exampleInputPassword1">
                                    </div>
                                    <div class="mb-3 form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                            <div class="col-md-8 table-responsive" style="height: 500px;">
                                <div class="custom-dd dd col-md-12" id="nestable_list_2">
                                    <div id="loadMenuList"></div>
                                </div>
                            </div>

                        </div>


                    </div>
                    <!-- End List Menu Management -->
                </div>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->


<?php $this->load->view("_partials/script") ?>