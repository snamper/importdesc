<div id="createMake" class="content">
    <!-- BEGIN breadcrumb -->
    <ul class="breadcrumb pt-4">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item active">Car Makes </li>
    </ul>
    <!-- END breadcrumb -->

    <!-- BEGIN page-header -->
    <h1 class="page-header">
        Make/Model
    </h1>
    <!-- END page-header -->
    <div class="panel-body">
        <p class="desc">


        </p>
        <!-- BEGIN nav-tabs -->
        <ul class="nav nav-tabs" id="nav-tabs">
            <li class="nav-item"><a href="#tab1" class="nav-link <?php echo (!isset($_COOKIE['active_tab']) || $_COOKIE['active_tab'] == "tab1" ? "active in" : "" )?>" data-toggle="tab">Make</a></li>
            <li class="nav-item"><a href="#tab2" class="nav-link <?php echo (isset($_COOKIE['active_tab']) && $_COOKIE['active_tab'] == "tab2" ? "active in" : "" )?>" data-toggle="tab">Models</a></li>
            <li class="nav-item"><a href="#tab3" class="nav-link <?php echo (isset($_COOKIE['active_tab']) && $_COOKIE['active_tab'] == "tab3" ? "active in" : "" )?>" data-toggle="tab">Motors</a></li>
            <li class="nav-item"><a href="#tab4" class="nav-link  <?php echo (isset($_COOKIE['active_tab']) && $_COOKIE['active_tab'] == "tab4" ? "active in" : "" )?>" data-toggle="tab">Uitvoering</a></li>
        </ul>

        <!-- END nav-tabs -->
        <!-- BEGIN tab-content -->
        <div class="tab-content tab-content-bordered">
            <!-- BEGIN tab-pane -->
            <div class="tab-pane fade <?php echo (!isset($_COOKIE['active_tab']) || $_COOKIE['active_tab'] == "tab1" ? "active in" : "" )?>" id="tab1">
                <div class="table-responsive">
                    <table id="datatables-makemodel" class="table table-striped table-condensed table-bordered bg-white vacations datatables-makemodel">
                        <thead>
                            <tr>
                                <!-- <th class="no-sort" style="white-space: nowrap"></th> -->
                                <th class="no-sort" style="width:1%">#</th>
                                <th class="select-filter-makes" style="white-space: nowrap">Make</th>
                                <th style="white-space: nowrap">Mark Actions</th>
                                <!-- <th style="white-space: nowrap">C1</th> -->
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="select-filter-makes" style="white-space: nowrap"></th>
                                <th class="select-filter-makes" style="white-space: nowrap"></th>

                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <!-- END table -->
            <!-- END tab-pane -->

            <!-- BEGIN tab-pane -->
            <div class="tab-pane fade <?php echo (isset($_COOKIE['active_tab']) && $_COOKIE['active_tab'] == "tab2" ? "active in" : "" )?>" id="tab2">

                <div class="table-responsive">
                    <table id="datatables-makemodel-models" class="table table-striped table-condensed table-bordered bg-white vacations datatables-makemodel">
                        <thead>
                            <tr>
                                <!-- <th class="no-sort" style="white-space: nowrap"></th> -->
                                <th class="no-sort" style="width:1%">#</th>
                                <th class="select-filter-models" style="white-space: nowrap">Make</th>
                                <th class="select-filter-models" style="white-space: nowrap">Model</th>
                                <th style="white-space: nowrap">Model Actions</th>
                                <!-- <th style="white-space: nowrap">C1</th> -->
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="select-filter-models" style="white-space: nowrap"></th>
                                <th class="select-filter-models" style="white-space: nowrap"></th>

                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <!-- END tab-content -->

            <!-- BEGIN tab-pane -->
            <div class="tab-pane fade <?php echo (isset($_COOKIE['active_tab']) && $_COOKIE['active_tab'] == "tab3" ? "active in" : "" )?>" id="tab3">

                <div class="table-responsive">
                    <table id="datatables-makemodel-motors" class="table table-striped table-condensed table-bordered bg-white vacations datatables-makemodel">
                        <thead>
                            <tr>
                                <!-- <th class="no-sort" style="white-space: nowrap"></th> -->
                                <th class="no-sort" style="width:1%">#</th>
                                <th class="select-filter-motors" style="white-space: nowrap">Make</th>
                                <th class="select-filter-motors" style="white-space: nowrap">Motor</th>
                                <th class="select-filter-motors" style="white-space: nowrap">Fuel</th>
                                <!-- <th style="white-space: nowrap">C1</th> -->
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="select-filter-motors" style="white-space: nowrap"></th>
                                <th class="select-filter-motors" style="white-space: nowrap"></th>

                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <!-- END table -->

            <!-- BEGIN tab-pane -->
            <div class="tab-pane fade <?php echo (isset($_COOKIE['active_tab']) && $_COOKIE['active_tab'] == "tab4" ? "active in" : "" )?>" id="tab4">

                <div class="table-responsive">
                    <table id="datatables-makemodel-uitvoering" class="table table-striped table-condensed table-bordered bg-white vacations datatables-makemodel">
                        <thead>
                            <tr>
                                <!-- <th class="no-sort" style="white-space: nowrap"></th> -->
                                <th class="no-sort" style="width:1%">#</th>
                                <th class="select-filter" style="white-space: nowrap">Make</th>
                                <th class="select-filter" style="white-space: nowrap">Uitvoering</th>
                                <!-- <th style="white-space: nowrap">C1</th> -->
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="select-filter" style="white-space: nowrap"></th>
                                <th class="select-filter" style="white-space: nowrap"></th>

                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <!-- END table -->
        </div>
        <!-- END tab-content -->






    </div>





    <td style="width:1%" class="valign-middle"><a id="create_brand" href="#create-mark" data-toggle="modal" class="btn btn-sm btn-primary JSfunc">Create Brand</a></td>
    <td style="width:1%" class="valign-middle"><a id="create_model" href="#create-model" data-toggle="modal" class="btn btn-sm btn-primary JSfunc">Create Model</a></td>
    <td style="width:1%" class="valign-middle"><a id="create_motor" href="#create-motor" data-toggle="modal" class="btn btn-sm btn-primary JSfunc">Create Motor</a></td>
    <td style="width:1%" class="valign-middle"><a id="uitvoering_add" href="#uitvoering-add" data-toggle="modal" class="btn btn-sm btn-primary JSfunc">Add Uitvoering</a></td>

</div>


<div class="modal fade" id="create-mark">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create Mark</h4>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <?php include './views/create_mark_m_view.php' ?>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="create-model">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create Model</h4>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <?php include './views/create_model_view.php' ?>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="edit-mark">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Mark</h4>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <?php include './views/edit_mark_view.php' ?>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="edit-model">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Model</h4>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></bdutton>
            </div>
            <div class="modal-body">
                <?php include './views/edit_model_view.php' ?>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="create-motor">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create Motor</h4>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></bdutton>
            </div>
            <div class="modal-body">
                <?php include './views/create_motor.php' ?>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="connect-fuel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Connect Fuel</h4>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></bdutton>
            </div>
            <div class="modal-body">
                <?php include './views/add_fuel.php' ?>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="uitvoering-add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Uitvoering</h4>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></bdutton>
            </div>
            <div class="modal-body">
                <?php include './views/uitvoering_add.php' ?>
            </div>
        </div>
    </div>
</div>
</div>