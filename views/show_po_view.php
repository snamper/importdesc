<?php include './assets/tables/GetData.php'; ?>




<div id="content" class="content">


    <!-- BEGIN breadcrumb -->
    <!-- <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Overzichten</a></li>
        <li class="breadcrumb-item active">Alle dossiers </li>
    </ul> -->
    <!-- END breadcrumb -->
    <!-- BEGIN page-header -->
    <h1 class="page-header">
        Cars
    </h1>
    <!-- END page-header -->

    
    <!-- BEGIN table sample-table-1-->

<div class="table-responsive">
    <table id="" class="table table-sm table-striped table-condensed table-bordered table-hover bg-white">
        <thead>
            <th class="text-center">#</th>
            <th class="text-center">Vehicle ID*</th>
            <th style="white-space: nowrap">Car reference (custom)</th>
            <th style="white-space: nowrap">Duplication Batch ID</th>
            <th style="white-space: nowrap">Pre-order</th>
            <th style="white-space: nowrap">VIN</th>
            <th style="white-space: nowrap">Configuration Number</th>
            <th style="white-space: nowrap">NL Registration Number</th>
            <th class="select-filter" style="white-space: nowrap">Make</th>
            <th class="select-filter" style="white-space: nowrap">Model</th>
            <th style="white-space: nowrap">Variant</th>
            <th class="select-filter" style="white-space: nowrap">Engine</th>
            <th style="white-space: nowrap">Body Style</th>
            <th class="select-filter" style="white-space: nowrap">Created By</th>
            <th class="select-filter" class="text-center">Created On</th>
            <th style="white-space: nowrap">Edit</th>
            <th style="white-space: nowrap">Duplicate</th>

        </thead>
        <tbody>
        </tbody>
    </table>
</div>
    <!-- END table -->

    <!-- Modal -->
    <div class="modal fade" id="editCarForm" tabindex="-1" role="dialog" aria-labelledby="editCarForm" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Edit car</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editCarForm" method="POST" action="edit_car">
                        <?php include_once realpath("views/cars/single_car_form.php"); ?>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" style="position: absolute; right: 10;" class="btn btn-primary send-form ">Save changes</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>