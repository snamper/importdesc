    <!-- <div class="content">
    <div class="form-auto">
        <div class="col-xs-12 table-list">
            <form action="create_make" method="POST" class="listing__form" id="carMarkForm">
                <div class="dashboardPageTitle text-center">
                    <h2 style="opacity: 0;">Placeholder</h2>
                </div>
                <div class="dashboardBoxBg mb30">
                    <div class="row">
                        <div class="col-sm-12 table-list">

                            <div class="row str">
                                <div class="col-sm-2"><label for="carMark">Select Make</label></div>
                                <div class="col-sm-4">
                                    <select class="form-control" name="carMark" id="carMark">
                                        <option value="">-</option>
                                    </select>
                                </div>
                                <div class="col-sm-2"><label for="carModel">Select Model</label></div>
                                <div class="col-sm-4">
                                    <select class="form-control" name="carModel" id="carModel">
                                        <option value="">-</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row str">
                                <div class="col-sm-2"><label for="carMarkInput">Add/Edit Make</label>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="carMarkInput" id="carMarkInput">
                                </div>
                                <div class="col-sm-2"><label for="carModelInput">Add/Edit Model</label>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="carModelInput" id="carModelInput">
                                </div>
                            </div>

                            <div class="row str">
                                <div class="col-sm-4">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div> -->
        <div id="createBrandPage" class="content" style="padding-top:4vh;">
            <!-- BEGIN page-header -->
            <h1 class="page-header">
                Mark/Model
            </h1>
            <!-- END page-header -->
            
            <!-- BEGIN table -->
            <div class="table-responsive">
            <table id="datatables-makemodel" class="table table-striped table-condensed table-bordered bg-white vacations">
                <thead>
                    <tr>                       
                        <!-- <th class="no-sort" style="white-space: nowrap"></th> -->
                        <th class="no-sort" style="width:1%">#</th>
                        <th class="select-filter" style="white-space: nowrap">Make</th>
                        <th class="select-filter" style="white-space: nowrap">Model</th>
                        <th class="select-filter" style="white-space: nowrap">Motor</th>
                        <th class="select-filter" style="white-space: nowrap">Fuel</th>
                        <th class="select-filter" style="white-space: nowrap">Versie</th>
                        <th style="white-space: nowrap">Model Actions</th>
                        <th style="white-space: nowrap">Mark Actions</th>
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
            <!-- END table -->

     
    <td style="width:1%" class="valign-middle"><a   id ="create_brand" href="#create-mark" data-toggle="modal" class="btn btn-sm btn-primary JSfunc">Create Brand</a></td>
    <td style="width:1%" class="valign-middle"><a   id ="create_model" href="#create-model" data-toggle="modal" class="btn btn-sm btn-primary JSfunc">Create Model</a></td>
    <td style="width:1%" class="valign-middle"><a   id ="create_motor" href="#create-motor" data-toggle="modal" class="btn btn-sm btn-primary JSfunc">Create Motor</a></td>
    <td style="width:1%" class="valign-middle"><a   id ="connect_fuel" href="#connect-fuel" data-toggle="modal" class="btn btn-sm btn-primary JSfunc">Connect Fuel</a></td>
    <td style="width:1%" class="valign-middle"><a   id ="uitvoering_add" href="#uitvoering-add" data-toggle="modal" class="btn btn-sm btn-primary JSfunc">Add Uitvoering</a></td>
    <span class="btn btn-sm btn-primary js-add-merk">Add Information</span>  

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
