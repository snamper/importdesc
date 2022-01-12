<?php include './assets/tables/GetData.php'; ?>



<!-- BEGIN #content -->
<div id="content" class="content">
    <br /><br />

    <!-- BEGIN breadcrumb -->
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Overzichten</a></li>
        <li class="breadcrumb-item active">Alle debitor </li>
    </ul>
    <!-- END breadcrumb -->
    <!-- BEGIN page-header -->
    <h1 class="page-header">
        Alle debitor
        <small>Hieronder alle debitor...</small>
    </h1>
    <!-- END page-header -->

    <!-- BEGIN table sample-table-1-->

    <table id="sample-table-9" class="table table-sm table-striped table-condensed table-bordered table-hover bg-white">
        <thead>
            <th>DebtorId</th>
            <th style="white-space: nowrap">DebtorName</th>

            <th style="white-space: nowrap">BcCo</th>

            <th>Adressline1</th>
            <th style="white-space: nowrap">TelNr </th>
            <th style="white-space: nowrap">Email</th>
            <th style="white-space: nowrap">IBAN</th>

        </thead>
        <tbody>
            <?php StatusTables_debtor(); ?>
        </tbody>
    </table>

    <!-- END table -->

</div>