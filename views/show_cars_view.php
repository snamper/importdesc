<?php include './assets/tables/GetData.php'; ?>




<div id="content" class="content">
    <br /><br />

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

    <?php

    ?>

<div class="table-responsive">
    <table id="table_show_car" class="table table-sm table-striped table-condensed table-bordered table-hover bg-white">
        <thead>
            <th class="text-center">Datum aangemaakt</th>
            <th style="white-space: nowrap">Auto referentie</th>
            <th style="white-space: nowrap">Auto referentie (custom)</th>
            <th style="white-space: nowrap">Type</th>
            <th style="white-space: nowrap">Merk</th>
            <th style="white-space: nowrap">Model</th>
            <th style="white-space: nowrap">Uitvoering</th>
            <th style="white-space: nowrap">Motor</th>
            <th style="white-space: nowrap">Brandstof</th>
            <th style="white-space: nowrap">Transmissie</th>
            <th style="white-space: nowrap">Datum eerste toelating</th>
            <th style="white-space: nowrap">Km-stand</th>
            <th style="white-space: nowrap">Huidig land geregistreerd</th>
            <th style="white-space: nowrap">Vin</th>
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