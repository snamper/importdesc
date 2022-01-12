<?php include './assets/tables/GetData.php'; ?>



<!-- BEGIN #content -->
<div id="content" class="content">
    <br /><br />

    <!-- BEGIN breadcrumb -->
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Overzichten</a></li>
        <li class="breadcrumb-item active">Alle artikelen </li>
    </ul>
    <!-- END breadcrumb -->
    <!-- BEGIN page-header -->
    <h1 class="page-header">
        Alle artikelen
        <small>Hieronder alle artikelen...</small>
    </h1>
    <!-- END page-header -->

    <!-- BEGIN table sample-table-1-->

    <table id="sample-table-3" class="table table-sm table-striped table-condensed table-bordered table-hover bg-white">
        <thead>
            <th>Artikel ID</th>
            <th style="white-space: nowrap">Omschrijving</th>
            <th style="white-space: nowrap">Code</th>
            <th style="white-space: nowrap">Type</th>

        </thead>
        <tbody>
            <?php StatusTables_article(); ?>
        </tbody>
    </table>

    <!-- END table -->

</div>