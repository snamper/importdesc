<?php include './assets/tables/GetData.php'; ?>




<div id="content" class="content">
    <br /><br />

    <!-- BEGIN breadcrumb -->
    <ul class="breadcrumb">
        <!-- <li class="breadcrumb-item"><a href="#">Overzichten</a></li>
        <li class="breadcrumb-item active">Alle dossiers </li> -->
    </ul>
    <!-- END breadcrumb -->
    <!-- BEGIN page-header -->
    <h1 class="page-header">
        Calculations
    </h1>
    <!-- END page-header -->

    <!-- BEGIN table sample-table-1-->
<div class="table-responsive">
<table id="datatable-calculations" class="table table-sm table-striped table-condensed table-bordered table-hover bg-white">
        <thead>
            <th class="text-center">id</th>
            <th style="white-space: nowrap">Inkoopprijs ex/ex</th>
            <th style="white-space: nowrap">Fee leverancier/bemiddelaar</th>
            <th style="white-space: nowrap">Inkoopprijs totaal</th>
            <th style="white-space: nowrap">Opknapkosten</th>
            <th style="white-space: nowrap">Transport buitenland</th>
            <th style="white-space: nowrap">Transport binnenland</th>
            <th style="white-space: nowrap">Taxatie kosten</th>
            <th style="white-space: nowrap">Totaal kosten</th>
            <th style="white-space: nowrap">Fee GWI</th>
            <th style="white-space: nowrap">Verkoopprijs ex/ex</th>
            <th style="white-space: nowrap">BTW 21%</th>
            <th style="white-space: nowrap">Verkoopprijs incl. BTW</th>
            <th style="white-space: nowrap">Rest BPM (indicatief)</th>
            <th style="white-space: nowrap">Leges (BTW vrij)</th>
            <th style="white-space: nowrap">Verkoopprijs in/in</th>
            <th style="white-space: nowrap">Connect</th>
        </thead>
        <tbody>
            
        </tbody>
            </table>
    <!-- END table -->

</div>
</div>


<div class="modal fade" id="connect_calculation">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Connect</h4>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></bdutton>
            </div>
            <div class="modal-body">
                <?php include './views/connect_calc.php' ?>
            </div>
        </div>
    </div>
</div>
