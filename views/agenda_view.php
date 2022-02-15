
<div id="content" class="content">
           <br /><br />
    
    <!-- BEGIN breadcrumb -->
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><?php echo $_SESSION['lang']['agenda_page_1'] ?></a></li>
        <li class="breadcrumb-item active"><?php echo $_SESSION['lang']['agenda_page_2'] ?></li>
    </ul>
    <!-- END breadcrumb -->
    <!-- BEGIN page-header -->
    <h1 class="page-header">
    <?php echo $_SESSION['lang']['agenda_page_3'] ?>
        <small><?php echo $_SESSION['lang']['agenda_page_4'] ?></small>
    </h1>


    <div class="row">
        <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
            <iframe height="1200px;" style="border: 0; width: 100%;" src="../calendar/calendar.php"></iframe>
          </div>
    </div>


</div>
