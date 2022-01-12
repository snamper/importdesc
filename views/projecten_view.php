<?php include './assets/tables/GetData.php'; ?>



<!-- BEGIN #content -->
<div id="content" class="content">
    <br /><br />

    <!-- BEGIN breadcrumb -->
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Overzichten</a></li>
        <li class="breadcrumb-item active">Alle Projecten </li>
    </ul>
    <!-- END breadcrumb -->
    <!-- BEGIN page-header -->
    <h1 class="page-header">
        Alle Projecten
        <small>Hieronder alle Projecten...</small>
    </h1>
    <!-- END page-header -->

    <!-- BEGIN table sample-table-1-->

    <table id="sample-table-6" class="table table-sm table-striped table-condensed table-bordered table-hover bg-white">
        <thead>
            <th>ProjectId</th>
            <th style="white-space: nowrap">Description</th>



            <th>ProjectGroup</th>
            <th style="white-space: nowrap">BcCo</th>


        </thead>
        <tbody>
            <?php StatusTables_projecten(); ?>
        </tbody>
    </table>

    <!-- END table -->

</div>