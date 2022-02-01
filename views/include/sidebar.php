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
                <li class="nav-header active">Navigation</li>
                <li><a href="home"><i class="ti-home"></i><span>Start</span></a></li>
                <li><a href="dossier"><i class="ti-target"></i><span>Dossier</span></a></li>
                <li><a href="agenda"><i class="ti-pencil-alt"></i><span>Agenda</span></a></li>
                <li><a href="intf"><i class="ti-arrows-horizontal"></i><span>Interface</span></a></li>
                <li><a href="artikelen"><i class="ti-clip"></i><span>Artikelen</span></a></li>
                <li><a href="contacten"><i class="ti-files"></i><span>Contacten</span></a></li>
                <li><a href="organisaties"><i class="ti-announcement"></i><span>Organisaties</span></a></li>
                <li><a href="projecten"><i class="ti-support"></i><span>Projecten</span></a></li>
                <li><a href="medewerkers"><i class="ti-music"></i><span>Medewerkers</span></a></li>
                <li><a href="creditor"><i class="ti-zoom-in"></i><span>Creditor</span></a></li>
                <li><a href="debtor"><i class="ti-timer"></i><span>Debtor</span></a></li>
                <li class="nav-divider"></li>
                <li class="nav-header">Start</li>
                <!-- <li><a href="carform"><i class="ti-plus"></i><span>Auto aanmaken</span></a></li> -->
                <!-- <li><a href="create_car"><i class="ti-plus"></i><span>Create car</span></a></li> -->
                <li><a href="car_start"><i class="ti-plus"></i><span>Car start</span></a></li>
                <!--                             
                            <li><a href="show_cars"><i class="ti-plus"></i><span>Show cars</span></a></li> -->
                <li><a href="calculation"><i class="ti-plus"></i><span>Calculation</span></a></li>
                <li><a href="show_calculations"><i class="ti-plus"></i><span>Show Calculations</span></a></li>
                <!--<li><a href="marge"><i class="ti-plus"></i><span>Prijs berekening Marge</span></a></li>
                            <li><a href="btw"><i class="ti-plus"></i><span>Prijs berekening BTW</span></a></li>
                            <li><a href="nedc"><i class="ti-plus"></i><span>BPM calculator NEDC</span></a></li>
                            <li><a href="wltp"><i class="ti-plus"></i><span>BPM calculator WLTP</span></a></li>-->
                <li><a href="create_make_new"><i class="ti-plus"></i><span>Create Car NEW</span></a></li>
                <li><a href="create_make"><i class="ti-plus"></i><span>Create Make</span></a></li>

                 <div class="m90x">
                    <select  class="form-control input-sm m-b-20" style="width:90%; margin:auto;" id="languageselect">

                        <?php
                            $langs = $_SESSION['langs'];
                        ?>
                        <?php foreach ($langs as $k => $v): ?>
                            <a href="#<?php echo $v['lang'] ?>">
                                <option <?php echo ($_SESSION['lang']==$v['langID']? 'selected':'') ?>  data-content="<span class='flag-icon flag-icon-<?php echo $v['lang']?>'> <?php echo $v['langfull'] ?> </span>"value="<?php echo $v['langID'] ?>"><?php echo $v['langfull'] ?></option>
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
