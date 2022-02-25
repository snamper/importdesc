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
        Purchase orders
    </h1>
    <!-- END page-header -->


    <!-- BEGIN table sample-table-1-->

    <div class="row my-1">
        <div class="d-inline-flex mx-1">
            <a href="/create_po" class="btn btn-primary text-white">Add Purchase Order</a>
        </div>
        <div class="d-inline-flex">
            <a href="/show_po_lines" class="btn btn-primary text-white">Show all order lines</a>
        </div>
    </div>


    <div class="table-responsive">
        <table id="show_po_table" class="table table-sm table-striped table-condensed table-bordered table-hover bg-white">
            <thead>
                <th class="text-center">PO Number*</th>
                <th style="white-space: nowrap">Status</th>
                <th style="white-space: nowrap">Date</th>
                <th style="white-space: nowrap">Supplier</th>
                <th style="white-space: nowrap">Number of vehicles</th>
                <th style="white-space: nowrap">Total purchase value (ex. VAT)</th>
                <th style="white-space: nowrap">Total purchase value (incl. VAT)</th>
                <th class="select-filter" style="white-space: nowrap">External order number</th>
                <th class="select-filter" style="white-space: nowrap">Buyer</th>
                <th style="white-space: nowrap">Purchasing entity</th>
                <th class="select-filter" style="white-space: nowrap">Created on</th>
                <th style="white-space: nowrap">Created by</th>
                <th class="select-filter" style="white-space: nowrap">Lasted edited on</th>
                <th class="select-filter" class="text-center">Last edited by</th>
                <th style="white-space: nowrap">Approved on</th>
                <th style="white-space: nowrap">Approved by</th>

            </thead>
            <tbody>
            </tbody>
        </table>
    </div> <!-- END table -->
</div> <!-- /. content -->