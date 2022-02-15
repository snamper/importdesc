    <div id="sidebar" class="sidebar sidebar-inverse">
        <!-- BEGIN scrollbar -->
        <div data-scrollbar="true" data-height="100%">
            <!-- BEGIN nav -->
            <ul class="nav">
                <li class="nav-profile">
                    <div class="image">
                        <img src="../assets/img/user-9.jpg" />
                    </div>
                    <div class="info">
                        <h4>Louis Hage</h4>
                        <p>GWIdesk | V4</p>
                    </div>
                </li>
                <li class="nav-divider"></li>
                <li class="nav-header active"><?php echo $_SESSION['lang']['sidebar_menu_19'] ?></li>
                <li><a href="home"><i class="ti-home"></i><span><?php echo $_SESSION['lang']['sidebar_menu_1'] ?></span></a></li>
                <li><a href="dossier"><i class="ti-target"></i><span><?php echo $_SESSION['lang']['sidebar_menu_2'] ?></span></a></li>
                <li><a href="agenda"><i class="ti-pencil-alt"></i><span><?php echo $_SESSION['lang']['sidebar_menu_3'] ?></span></a></li>
                <li><a href="intf"><i class="ti-arrows-horizontal"></i><span><?php echo $_SESSION['lang']['sidebar_menu_4'] ?></span></a></li>
                <li><a href="artikelen"><i class="ti-clip"></i><span><?php echo $_SESSION['lang']['sidebar_menu_5'] ?></span></a></li>
                <li><a href="contacten"><i class="ti-files"></i><span><?php echo $_SESSION['lang']['sidebar_menu_6'] ?></span></a></li>
                <li><a href="organisaties"><i class="ti-announcement"></i><span><?php echo $_SESSION['lang']['sidebar_menu_7'] ?></span></a></li>
                <li><a href="projecten"><i class="ti-support"></i><span><?php echo $_SESSION['lang']['sidebar_menu_8'] ?></span></a></li>
                <li><a href="medewerkers"><i class="ti-music"></i><span><?php echo $_SESSION['lang']['sidebar_menu_9'] ?></span></a></li>
                <li><a href="creditor"><i class="ti-zoom-in"></i><span><?php echo $_SESSION['lang']['sidebar_menu_10'] ?></span></a></li>
                <li><a href="debtor"><i class="ti-timer"></i><span><?php echo $_SESSION['lang']['sidebar_menu_11'] ?></span></a></li>
                <li class="nav-divider"></li>
                <li class="nav-header"><?php echo $_SESSION['lang']['sidebar_menu_12'] ?></li>
                <!-- <li><a href="carform"><i class="ti-plus"></i><span>Auto aanmaken</span></a></li> -->
                <!-- <li><a href="create_car"><i class="ti-plus"></i><span>Create car</span></a></li> -->
                <li><a href="car_start"><i class="ti-plus"></i><span><?php echo $_SESSION['lang']['sidebar_menu_13'] ?></span></a></li>
               <li><a href="show_cars"><i class="ti-plus"></i><span><?php echo $_SESSION['lang']['sidebar_menu_14'] ?></span></a></li>
                <li><a href="calculation"><i class="ti-plus"></i><span><?php echo $_SESSION['lang']['sidebar_menu_15'] ?></span></a></li>
                <li><a href="show_calculations"><i class="ti-plus"></i><span><?php echo $_SESSION['lang']['sidebar_menu_16'] ?></span></a></li>
                <!--<li><a href="marge"><i class="ti-plus"></i><span>Prijs berekening Marge</span></a></li>
                            <li><a href="btw"><i class="ti-plus"></i><span>Prijs berekening BTW</span></a></li>
                            <li><a href="nedc"><i class="ti-plus"></i><span>BPM calculator NEDC</span></a></li>
                            <li><a href="wltp"><i class="ti-plus"></i><span>BPM calculator WLTP</span></a></li>-->
                <li><a href="create_make_new"><i class="ti-plus"></i><span><?php echo $_SESSION['lang']['sidebar_menu_17'] ?></span></a></li>
                <li><a href="create_make"><i class="ti-plus"></i><span><?php echo $_SESSION['lang']['sidebar_menu_18'] ?></span></a></li>

                 <div class="m90x">
                    <select  class="form-control input-sm m-b-20" style="width:90%; margin:auto;" id="languageselect">

                        <?php
                            $langs = $_SESSION['base']->getLangs();
                        ?>
                        <?php foreach ($langs as $k => $v): ?>
                            <a href="#<?php echo $v['lang'] ?>">
                                <option <?php echo ($_SESSION['user'][0]['langID']==$v['langID']? 'selected':'') ?>  value="<?php echo $v['langID'] ?>">
                                    <span class='flag-icon flag-icon-<?php echo $v['lang']?>'> <?php echo $v['langfull'] ?> </span>
                                </option>
                            </a>
                        <?php endforeach ?>
                    </select>
                    </div>

                <!-- <li><a href="click_model"><i class="ti-plus"></i><span>Click Model</span></a></li>  -->


                <!-- 
                            <li><a href="click_model2"><i class="ti-plus"></i><span>Click Model No buttons</span></a></li> -->
                <li class="nav-divider"></li>
                <li class="nav-copyright">&copy; 2020 powered by Software Inc.</li>
            </ul>
            <!-- END nav -->
        </div>
        <!-- END scrollbar -->
    </div>
    <!-- </div>     ./ #page-container  -->
