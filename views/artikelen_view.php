<?php include './assets/tables/GetData.php'; ?>



<!-- BEGIN #content -->
<div id="content" class="content">
    <br /><br />

    <!-- BEGIN breadcrumb -->
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><?php echo $_SESSION['lang']['articles_page_1'] ?></a></li>
        <li class="breadcrumb-item active"><?php echo $_SESSION['lang']['articles_page_2'] ?></li>
    </ul>
    <!-- END breadcrumb -->
    <!-- BEGIN page-header -->
    <h1 class="page-header">
        <?php echo $_SESSION['lang']['articles_page_3'] ?>
        <small><?php echo $_SESSION['lang']['articles_page_4'] ?></small>
    </h1>
    <!-- END page-header -->

    <!-- BEGIN table sample-table-1-->

    <table id="sample-table-3" class="table table-sm table-striped table-condensed table-bordered table-hover bg-white">
        <thead>
            <th><?php echo $_SESSION['lang']['articles_page_5'] ?></th>
            <th style="white-space: nowrap"><?php echo $_SESSION['lang']['articles_page_6'] ?></th>
            <th style="white-space: nowrap"><?php echo $_SESSION['lang']['articles_page_7'] ?></th>
            <th style="white-space: nowrap"><?php echo $_SESSION['lang']['articles_page_8'] ?></th>

        </thead>
        <tbody>
            <?php StatusTables_article(); ?>
        </tbody>
    </table>

    <!-- END table -->

</div>