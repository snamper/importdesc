<?php include './assets/tables/GetData.php'; ?>


<!-- BEGIN #content -->
<div id="content" class="content">
    <br /><br />

    <!-- BEGIN breadcrumb -->
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Overzichten</a></li>
        <li class="breadcrumb-item active">Alle contacten </li>
    </ul>
    <!-- END breadcrumb -->
    <!-- BEGIN page-header -->
    <h1 class="page-header">
        Alle contacten
        <small>Hieronder alle contacten...</small>
    </h1>
    <!-- END page-header -->

    <!-- BEGIN table sample-table-1-->

    <table id="sample-table-4" class="table table-sm table-striped table-condensed table-bordered table-hover bg-white">
        <thead>
            <th>ContactId</th>
            <th style="white-space: nowrap">Name_afas</th>
            <th style="white-space: nowrap">Department</th>
            <th style="white-space: nowrap">AddressLine1</th>

            <th>AddressLine3</th>
            <th style="white-space: nowrap">TelWork</th>
            <th style="white-space: nowrap">MailWork</th>

        </thead>
        <tbody>
            <?php StatusTables_contacten(); ?>
        </tbody>
    </table>

    <!-- END table -->

</div>