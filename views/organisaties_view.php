<!-- BEGIN #content -->
<?php include './assets/tables/GetData.php'; ?>



<div id="content" class="content">
    <br /><br />

    <!-- BEGIN breadcrumb -->
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Overzichten</a></li>
        <li class="breadcrumb-item active">Alle organisaties </li>
    </ul>
    <!-- END breadcrumb -->
    <!-- BEGIN page-header -->
    <h1 class="page-header">
        Alle organisaties
        <small>Hieronder alle organisaties...</small>
    </h1>
    <!-- END page-header -->

    <!-- BEGIN table sample-table-1-->

    <table id="sample-table-5" class="table table-sm table-striped table-condensed table-bordered table-hover bg-white">
        <thead>
            <th>BcCo</th>
            <th style="white-space: nowrap">Name_afas</th>

            <th style="white-space: nowrap">AdressLine1</th>

            <th>AdressLine3</th>
            <th style="white-space: nowrap">TelWork</th>
            <th style="white-space: nowrap">MailWork</th>
            <th style="white-space: nowrap">Homepage</th>

        </thead>
        <tbody>
            <?php StatusTables_organisaties(); ?>
        </tbody>
    </table>

    <!-- END table -->

</div>