<?php include './assets/tables/GetData.php'; ?>




<div id="content" class="content">
    <br /><br />

    <!-- BEGIN breadcrumb -->
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Overzichten</a></li>
        <li class="breadcrumb-item active">Alle dossiers </li>
    </ul>
    <!-- END breadcrumb -->
    <!-- BEGIN page-header -->
    <h1 class="page-header">
        Alle dossier
        <small>Hieronder alle dossier met verschillende statussen...</small>
    </h1>
    <!-- END page-header -->

    <!-- BEGIN table sample-table-1-->

    <table id="sample-table-1" class="table table-sm table-striped table-condensed table-bordered table-hover bg-white">
        <thead>
            <th class="text-center">Dossier ID</th>
            <th style="white-space: nowrap">Merk model</th>
            <th style="white-space: nowrap">Uitvoering</th>
            <th style="white-space: nowrap">TNS wereld</th>
            <th style="white-space: nowrap">TNS Nederland</th>
            <th style="white-space: nowrap">KM stand</th>
            <th style="white-space: nowrap">Kenteken</th>
            <th style="white-space: nowrap">Tag</th>

            <th style="white-space: nowrap" class="text-center">Edit</th>

        </thead>
        <tbody>
            <?php StatusTables_dossier(); ?>
        </tbody>
    </table>

    <!-- END table -->

</div>