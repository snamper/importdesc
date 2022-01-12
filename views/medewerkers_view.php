<?php include './assets/tables/GetData.php'; ?>



<!-- BEGIN #content -->
<div id="content" class="content">
    <br /><br />

    <!-- BEGIN breadcrumb -->
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Overzichten</a></li>
        <li class="breadcrumb-item active">Alle medewerkers </li>
    </ul>
    <!-- END breadcrumb -->
    <!-- BEGIN page-header -->
    <h1 class="page-header">
        Alle medewerkers
        <small>Hieronder alle medewerkers...</small>
    </h1>
    <!-- END page-header -->

    <!-- BEGIN table sample-table-1-->

    <table id="sample-table-7" class="table table-sm table-striped table-condensed table-bordered table-hover bg-white">
        <thead>
            <th>PersonId</th>
            <th style="white-space: nowrap">Initials</th>

            <th style="white-space: nowrap">BirthName</th>

            <th>DateOfBirth</th>
            <th style="white-space: nowrap">Street HouseNumber</th>
            <th style="white-space: nowrap">City</th>
            <th style="white-space: nowrap">FunctionDesc</th>

        </thead>
        <tbody>
            <?php StatusTables_medewerkers(); ?>
        </tbody>
    </table>

    <!-- END table -->

</div>