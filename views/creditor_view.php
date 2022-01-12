<?php include './assets/tables/GetData.php'; ?>



<!-- BEGIN #content -->
<div id="content" class="content">
    <br /><br />

    <!-- BEGIN breadcrumb -->
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Overzichten</a></li>
        <li class="breadcrumb-item active">Alle creditor </li>
    </ul>
    <!-- END breadcrumb -->
    <!-- BEGIN page-header -->
    <h1 class="page-header">
        Alle creditor
        <small>Hieronder alle creditor...</small>
    </h1>
    <!-- END page-header -->

    <!-- BEGIN table sample-table-1-->

    <table id="sample-table-8" class="table table-sm table-striped table-condensed table-bordered table-hover bg-white">
        <thead>
            <th>CreditorId</th>
            <th style="white-space: nowrap">CreditorName</th>

            <th style="white-space: nowrap">BcCo</th>

            <th>Adressline1</th>
            <th style="white-space: nowrap">TelNr </th>
            <th style="white-space: nowrap">Email</th>
            <th style="white-space: nowrap">PaymentCondition</th>

        </thead>
        <tbody>
            <?php StatusTables_creditor(); ?>
        </tbody>
    </table>

    <!-- END table -->

</div>