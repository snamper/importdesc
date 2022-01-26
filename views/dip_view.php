<body>

    <div id="page-container" class="page-header-fixed page-sidebar-fixed">
        <form method="post" enctype="multipart/form-data">
            <input type="hidden" value="2" name="price_calcIDFPDF">
            <div class="panel-group" id="accordion" style="width:80%;margin-left: 17%;">
                <style>
                    img {
                        transition: transform 0.25s ease;
                    }

                    img:hover {
                        -webkit-transform: scale(3);
                        transform: scale(3);
                    }

                    label {
                        cursor: pointer;
                        font-weight: 100;
                        ;
                    }

                    #upload-photo {
                        opacity: 0;
                        position: absolute;
                        z-index: -1;
                    }
                </style>

                <nav class="navbar navbar-light bg-light">
                    <b id="one">Basisgegevens </b>
                </nav><br>

                <div class="row" style="">

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 ">

                        <table class="table table-bordered table-hover">

                            <tbody>
                                <input type="hidden" id="car_id" name="car_id" value="<?php echo $_SESSION['car_data'][0]['carID'] ?>">
                                <tr>
                                    <td>Referentie</td>
                                    <td>
                                        <input id="dossier_referentie" name="dossier_referentie" style="border:0;  width:100%; text-align: left; padding-left: 4px;" class="text-input" type="text" value="<?php echo $_SESSION['car_data'][0]['car_model'] ?>">
                                        <input name="referentie" class="text-input" type="hidden" value="">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Vin</td>
                                    <td>
                                        <input id="vinnummer" name="vinnummer" style="border:0;  width:100%; text-align: left; padding-left: 4px;" class="text-input" type="text" value="<?php echo $_SESSION['car_data'][0]['vinnummer'] ?>">
                                    </td>
                                </tr>

                                <tr>
                                    <td> Merk </td>
                                    <td><select id="carMark_dip" name="carMark_dip" size="1" style="width: 100%; border: 0px;" value="">

                                            <?php echo $_SESSION['car_make'] ?>

                                        </select></td>
                                </tr>
                                <tr>
                                    <td> Model </td>
                                    <td><select id="carModel_dip" name="carModel_dip" size="1" style="width: 100%; border: 0px;">

                                        </select> </td>
                                </tr>


                                <tr>
                                    <td>Uitvoering</td>
                                    <td>
                                        <input id="uitvoering" name="uitvoering" style="border:0;  width:100%; text-align: left; padding-left: 4px;" class="text-input" type="text" value="<?php echo $_SESSION['car_data'][0]['uitvoering'] ?>">
                                    </td>
                                </tr>

                                <tr>
                                    <td>Motor</td>
                                    <td>
                                        <input id="motor" name="motor" style="border:0;  width:100%; text-align: left; padding-left: 4px;" class="text-input" type="text" value="<?php echo $_SESSION['car_data'][0]['motor'] ?>">
                                    </td>
                                </tr>

                                <tr>
                                    <td style="padding-top:0px;padding-bottom:0px; vertical-align: middle;">Brandstof soort</td>
                                    <td style=" vertical-align: middle;">

                                        <select name="brandstof" id="brandstof" class="text-input" style="border:0;  width: 100%;  ">
                                            <option value="0">Maak een keuze </option>
                                            <option value="1">Benzine</option>
                                            <option value="2">Diesel</option>
                                            <option value="3">PHEV Benzine</option>
                                            <option value="4">PHEV Diesel</option>
                                        </select>

                                    </td>
                                </tr>

                                <tr>
                                    <td>Transmissienaam</td>
                                    <td style="vertical-align: middle;">
                                        <input id="transmissie" type="text" style="border:0;  width:100%; text-align: left; padding-left: 4px;" class="text-input" name="transmissie" value="<?php echo $_SESSION['car_data'][0]['transmissie'] ?>">
                                    </td>
                                </tr>

                                <tr>
                                    <td>Transmissie soort </td>
                                    <td style="vertical-align:" middle;="">
                                        <select name="transmissieSoort" id="transmissieSoort" class="text-input" style="border:0;  width: 100%;  ">
                                            <option value="0">Maak een keuze </option>
                                            <option <?php if ($_SESSION['car_data'][0]['transmissieSoort'] == 411) {
                                                        echo 'selected ';
                                                    } ?>value="411">Automaat</option>
                                            <option <?php if ($_SESSION['car_data'][0]['transmissieSoort'] == 412) {
                                                        echo 'selected ';
                                                    } ?>value="412">Handgeschakeld</option>
                                        </select>

                                    </td>
                                </tr>

                                <tr>
                                    <td>Exterieur kleur</td>
                                    <td>
                                        <input id="kleur" name="kleur" style="border:0;  width:100%; text-align: left; padding-left: 4px;" class="text-input" type="text" value="<?php echo $_SESSION['car_data'][0]['kleur'] ?>">
                                    </td>
                                </tr>

                                <tr>
                                    <td>Interieur kleur</td>
                                    <td>
                                        <input id="interieur_kleur" name="interieur_kleur" style="border:0;  width:100%; text-align: left; padding-left: 4px;" class="text-input" type="text" value="<?php echo $_SESSION['car_data'][0]['interieur_kleur'] ?>">
                                    </td>
                                </tr>



                                <tr>
                                    <td>CO² NEDC</td>
                                    <td>
                                        <input id="co2" name="co2" style="border:0;  width:100%; text-align: left; padding-left: 4px;" class="text-input" type="text" value="<?php echo $_SESSION['car_data'][0]['co2'] ?>">
                                    </td>
                                </tr>

                                <tr>
                                    <td>CO² WLTP</td>
                                    <td>
                                        <input id="BPMCO2WLTP" name="BPMCO2WLTP" style="border:0;  width:100%; text-align: left; padding-left: 4px;" class="text-input" type="text" value="130">
                                    </td>
                                </tr>




                                <tr>
                                    <td>Rest BPM indicatief</td>
                                    <td>
                                        <input id="xxx" name="xxx" readonly="readonly" style="border:0;  width:100%; text-align: left; padding-left: 4px;" class="text-input" type="text" value="446.00">
                                    </td>
                                </tr>

                                <tr>
                                    <td>Huidige rest BPM</td>
                                    <td>
                                        <input id="huidige_rest_bpm" name="huidige_rest_bpm" style="border:0;  width:100%; text-align: left; padding-left: 4px;" class="text-input" type="text" value="0.00">
                                    </td>
                                </tr>

                            </tbody>
                        </table>

                        <!-- hier komt de data in -->

                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 ">

                        <table class="table table-bordered table-hover">





                            <tbody>
                                <tr>
                                    <td>Levering soort</td>
                                    <td>
                                        <select name="levering_soort" id="levering_soort" class="text-input" style="border:0;  width: 100%;  ">
                                            <option value="0">Maak een keuze </option>
                                            <option <?php if ($_SESSION['car_data'][0]['levering_soort'] == 421) {
                                                        echo 'selected ';
                                                    } ?> value="421">Indicatief</option>
                                            <option <?php if ($_SESSION['car_data'][0]['levering_soort'] == 422) {
                                                        echo 'selected ';
                                                    } ?> value="422">Verwacht</option>
                                            <option <?php if ($_SESSION['car_data'][0]['levering_soort'] == 423) {
                                                        echo 'selected ';
                                                    } ?> value="423">Exact</option>
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Verwachtte levertermijn</td>
                                    <td>
                                        <input style="border:0; margin: 0px; width: 100%;  text-align: left; padding-left: 4px;" type="text" class="display-on-quotation" id="datepicker4" value="" name="levering">
                                    </td>
                                </tr>

                                <tr>
                                    <td>Verwachtte KM stand</td>
                                    <td>
                                        <input id="km_stand" name="km_stand" style="border:0;  width:100%; text-align: left; padding-left: 4px;" class="text-input" type="text" value="<?php echo $_SESSION['car_data'][0]['km_verwacht'] ?>">
                                    </td>
                                </tr>


                                <tr>
                                    <td>KM stand ontvangst</td>
                                    <td>
                                        <input id="km_verwacht" name="km_verwacht" style="border:0;  width:100%; text-align: left; padding-left: 4px;" class="text-input" type="text" value="<?php echo $_SESSION['car_data'][0]['km_stand'] ?>">
                                    </td>
                                </tr>
                                <!--                    <tr>-->
                                <!--                        <td>KM of miles</td>-->
                                <!--                        <td>-->
                                <!--                            -->
                                <!---->
                                <!--                        </td>-->
                                <!--                    </tr>-->
                                <!--                    <tr>-->
                                <!--                        <td>Type nummer</td>-->
                                <!--                        <td>-->
                                <!--                            <input-->
                                <!--                                name="type_nummer"-->
                                <!--                                style='border:0;  width:100%; text-align: left; padding-left: 4px;'-->
                                <!--                                class="text-input"-->
                                <!--                                type="text"-->
                                <!--                                value="-->
                                <!--"-->
                                <!--                                />-->
                                <!--                        </td>-->
                                <!--                    </tr>-->





                                <tr>
                                    <td>Bevestigd</td>
                                    <td>
                                        <select name="bevestigd" id="bevestigd" class="text-input" style="border:0;  width: 100%;  ">
                                            <option value="0">Maak een keuze </option>
                                            <option <?php if ($_SESSION['car_data'][0]['bevestigd'] == 186) {
                                                        echo 'selected ';
                                                    } ?>value="186">Ja</option>
                                            <option <?php if ($_SESSION['car_data'][0]['bevestigd'] == 187) {
                                                        echo 'selected ';
                                                    } ?>value="187">Nee</option>
                                            <option <?php if ($_SESSION['car_data'][0]['bevestigd'] == 294) {
                                                        echo 'selected ';
                                                    } ?>value="294">NNB</option>
                                        </select>

                                    </td>
                                </tr>
                                <!--                    <tr>-->
                                <!--                        <td>Tijdelijk nummer</td>-->
                                <!--                        <td>-->
                                <!--                            <input-->
                                <!--                                name="tijdelijk_nummer"-->
                                <!--                                style='border:0;  width:100%; text-align: left; padding-left: 4px;'-->
                                <!--                                class="text-input"-->
                                <!--                                type="text"-->
                                <!--                                value="-->
                                <!--"-->
                                <!--                                />-->
                                <!--                        </td>-->
                                <!--                    </tr>-->



                                <tr>
                                    <td>(Tijdelijk) documentnummer</td>
                                    <td>
                                        <input id="documentnr" name="documentnr" style="border:0;  width:100%; text-align: left; padding-left: 4px;" class="text-input" type="text" value="<?php echo $_SESSION['car_data'][0]['tijdelijk_nummer'] ?>">
                                    </td>
                                </tr>



                                <tr>
                                    <td>Tenaamstellings code</td>
                                    <td>
                                        <input id="tenaam_stellings_code" name="tenaam_stellings_code" style="border:0;  width:100%; text-align: left; padding-left: 4px;" class="text-input" type="text" value="<?php echo $_SESSION['car_data'][0]['tenaam_stellings_code'] ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Plaatafgifte code</td>
                                    <td>
                                        <input id="plaat_afgifte_code" name="plaat_afgifte_code" style="border:0;  width:100%; text-align: left; padding-left: 4px;" class="text-input" type="text" value="<?php echo $_SESSION['car_data'][0]['plaat_afgifte_code'] ?>">
                                    </td>
                                </tr>

                                <tr>
                                    <td style=" vertical-align: middle;">Datum eerste toelating</td>
                                    <td style=" vertical-align: middle;">

                                        <input style="border:0;  width: 100%;  text-align: left; padding-left: 4px;" type="text" class="text-input" id="datepicker1" value="<?php echo $_SESSION['car_data'][0]['productiedatum'] ?>" name="productiedatum">

                                    </td>
                                </tr>
                                <tr>
                                    <td style=" vertical-align: middle;">Huidige datum BPM </td>
                                    <td style=" vertical-align: middle;">

                                        <input id="huidigedatumbpm" style="border:0;  width: 100%;  text-align: left; padding-left: 4px;" type="text" class="text-input" readonly="readonly" value="06-12-2021 " name="huidigedatumbpm">

                                    </td>
                                </tr>

                                <tr>
                                    <td style="vertical-align: middle;">Eerste tenaamstelling NL</td>
                                    <td style="vertical-align: middle;">
                                        <input style="border:0;  width: 100%; text-align: left;  padding-left: 4px;" type="text" class="text-input" id="datepicker3" value="<?php echo $_SESSION['car_data'][0]['tenaamstellingNL'] ?>" name="tenaamstellingNL">
                                    </td>
                                </tr>

                                <tr>
                                    <td>Laatste tenaamstelling NL</td>
                                    <td>
                                        <input id="laatste_tenaamstelling" name="laatste_tenaamstelling" style="border:0;  width:100%; text-align: left; padding-left: 4px;" class="text-input" type="text" value="<?php echo $_SESSION['car_data'][0]['laatste_tenaamstelling'] ?>">
                                    </td>
                                </tr>

                                <tr>
                                    <td>NL kenteken</td>
                                    <td>
                                        <input id="kenteken" name="kenteken" style="border:0;  width:100%; text-align: left; padding-left: 4px;" class="text-input" type="text" value="<?php echo $_SESSION['car_data'][0]['kenteken'] ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tag</td>
                                    <td>
                                        <input id="tag" name="tag" style="border:0;  width:100%; text-align: left; padding-left: 4px;" class="text-input" type="text" value="<?php echo $_SESSION['car_data'][0]['tag'] ?>">
                                    </td>
                                </tr>


                            </tbody>
                        </table>

                        <!-- hier komt de data in -->

                    </div>


                </div>

                <hr>
                <div class="row">
                    <!-- Autogegevens -->
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">

                        <center>
                        </center>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">

                        <center>
                        </center>
                    </div>

                </div>


                <hr>
                <div class="row">

                    <!-- Autogegevens -->
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">


                    </div>


                </div>

                <hr>




                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 ">
                        <div class="table-responsive">
                            <!-- BEGIN table -->

                            <table class="table table-condensed  table-hover text-left">
                                <thead>
                                    <tr>
                                        <th> Documenten</th>
                                        <th> </th>

                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td>
                                            Factuur </td>
                                        <td style="width: 50%;">
                                            <input type="file" id="uploaded1_1" name="uploaded1_1">

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Inkoop contract </td>
                                        <td>
                                            <input type="file" id="uploaded1_2" name="uploaded1_2">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Autopapieren </td>
                                        <td>
                                            <input type="file" id="uploaded1_3" name="uploaded1_3">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            EU registratie certificaat </td>
                                        <td>
                                            <input type="file" id="uploaded1_4" name="uploaded1_4">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            COC </td>
                                        <td>
                                            <input type="file" id="uploaded1_5" name="uploaded1_5">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Vrijgeef papieren </td>
                                        <td>
                                            <input type="file" id="uploaded1_6" name="uploaded1_6">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            KVK </td>
                                        <td>
                                            <input type="file" id="uploaded1_7" name="uploaded1_7">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            CMR </td>
                                        <td>
                                            <input type="file" id="uploaded1_8" name="uploaded1_8">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Deel 1 </td>
                                        <td>
                                            <input type="file" id="uploaded1_9" name="uploaded1_9">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Deel 2 </td>
                                        <td>
                                            <input type="file" id="uploaded1_10" name="uploaded1_10">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            Inspectie rapport </td>
                                        <td>
                                            <input type="file" id="uploaded1_11" name="uploaded1_11">
                                        </td>
                                    </tr>



                                </tbody>
                            </table>

                            <!-- END table -->
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6  ">
                        <table class="table table-condensed  table-hover text-left">

                            <thead>
                                <tr>
                                    <th>&nbsp; </th>
                                    <th>

                                    </th>

                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>
                                        Bekijk Factuur </td>
                                    <td style="width: 50%; height: 32px;">


                                        <center> <a style="color:#0065A7; display: inline;" href="URL" onclick="window.open('../data/library/files_01/2fg236769jk/VW Tiguan 2021 - 3 months registration in CZ.pdf', 'venster_naam', 'width=580,height=830,scrollbars=yes,toolbar=yes,location=no'); return false">
                                                <center><i style="color:#0065A7;" class="ti-zoom-in f-s-18 pull-left m-r-10"></i></center>
                                            </a>
                                        </center>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Bekijk Inkoop contract </td>
                                    <td style="width: 50%; height: 32px;">

                                        <center> <a style="color:#0065A7; display: inline;" href="URL" onclick="window.open('../data/library/files_01/2fg236769jk/Spirit SEAT stock 20210414.xlsx', 'venster_naam', 'width=580,height=830,scrollbars=yes,toolbar=yes,location=no'); return false">
                                                <center><i style="color:#0065A7;" class="ti-zoom-in f-s-18 pull-left m-r-10"></i></center>
                                            </a>
                                        </center>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Bekijk Autopapieren </td>
                                    <td style="width: 50%; height: 32px;">

                                        <center> <a style="color:#0065A7; display: inline;" href="URL" onclick="window.open('../data/library/files_01/2fg236769jk/ac_upload_anlage_837682_4_6033ba3c9ec23 (1).pdf', 'venster_naam', 'width=580,height=830,scrollbars=yes,toolbar=yes,location=no'); return false">
                                                <center><i style="color:#0065A7;" class="ti-zoom-in f-s-18 pull-left m-r-10"></i></center>
                                            </a>
                                        </center>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        Bekijk EU registratie certificaat </td>
                                    <td style="width: 50%; height: 32px;">

                                        <center>Geen document gevonden </center>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Bekijk COC </td>
                                    <td style="width: 50%; height: 32px;">

                                        <center>Geen document gevonden</center>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Bekijk Vrijgeef papieren </td>
                                    <td style="width: 50%; height: 32px;">

                                        <center>Geen document gevonden</center>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Bekijk KVK </td>
                                    <td style="width: 50%; height: 32px;">

                                        <center>Geen document gevonden</center>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        Bekijk CMR </td>
                                    <td style="width: 50%; height: 32px;">

                                        <center>Geen document gevonden</center>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Bekijk Deel 1 </td>
                                    <td style="width: 50%; height: 32px;">

                                        <center>Geen document gevonden</center>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Bekijk Deel 2 </td>
                                    <td style="width: 50%; height: 32px;">

                                        <center>Geen document gevonden</center>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Bekijk Inspectie rapport </td>
                                    <td style="width: 50%; height: 32px;">

                                        <center>Geen document gevonden</center>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>






                </div>




                <br>
                <div id="two"></div>
                <br><br>
                <nav class="navbar navbar-light bg-light">
                    <b>AANBIEDING DETAILS</b>
                </nav><br>

                <div class="row" style="display: grid;grid-template-columns: 1fr 1fr;">


                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 ">



                        <input name="inkoopgegevensID" type="hidden" value="6">

                        <table class="table table-bordered table-hover">
                            <tbody>
                                <tr>
                                    <th style="background-color: #f8f9fa; border-right: 0px;">Inkoopgegevens</th>
                                    <th style="background-color: #f8f9fa; border-left: 0px;">



                                    </th>
                                </tr>

                                <tr>
                                    <td style="vertical-align: middle;">Leverancier</td>
                                    <td>


                                        <div class="btn-group bootstrap-select"><button type="button" class="btn dropdown-toggle btn-default" data-toggle="dropdown" role="button" title="Make a choice" aria-expanded="false"><span class="filter-option pull-left">
                                                    Make a choice </span>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button>
                                            <div class="dropdown-menu open" role="combobox" style="max-height: 1071.52px; overflow: hidden; min-height: 28px; position: absolute; transform: translate3d(0px, -786px, 0px); top: 0px; left: 0px; will-change: transform;" x-placement="top-start" x-out-of-boundaries="">
                                                <div class="bs-searchbox"><input type="text" class="form-control" autocomplete="off" role="textbox" aria-label="Search"></div>
                                                <ul class="dropdown-menu inner" role="listbox" aria-expanded="false" style="max-height: 1053.52px; overflow-y: auto; min-height: 10px;">
                                                    <li data-original-index="0" class="selected"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="true"><span class="text">
                                                                Make a choice </span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                                    <li data-original-index="1"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">AFAS ERP Software B.V.</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                                    <li data-original-index="2" class="active"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">RDW</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                                    <li data-original-index="3"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Florindo Holding B.V.</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                                    <li data-original-index="4"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">EmBe Holding B.V.</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                                    <li data-original-index="5"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Autobid Nederland B.V.</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                                    <li data-original-index="6"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Autohaus Rosenfeld GmbH</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                                </ul>
                                            </div><select class="selectpicker" data-live-search="true" name="CreditorId" tabindex="-98">
                                                <option>
                                                    Make a choice </option>
                                                <option value="50000">AFAS ERP Software B.V.</option>
                                                <option value="50001">RDW</option>
                                                <option value="50002">Florindo Holding B.V.</option>
                                                <option value="50003">EmBe Holding B.V.</option>
                                                <option value="50004">Autobid Nederland B.V.</option>
                                                <option value="50005">Autohaus Rosenfeld GmbH</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Contactpersoon</td>
                                    <td>
                                        <select style=" border:0; margin: 0; vertical-align: middle; width: 100%; background-color: #ffffff;" name="ContactId">
                                            <option>
                                                Make a choice </option>
                                            <option value="5"> - AFAS ERP Software B.V. - Support Afdeling</option>
                                            <option value="6"> - AFAS ERP Software B.V. - Customer Service</option>
                                            <option value="32"> - AFAS ERP Software B.V. - Financiële administratie</option>
                                            <option value="86">Toni da Cruz Pinto - Florindo Holding B.V. - Toni da Cruz Pinto</option>
                                            <option value="94">Hans Jonkers - Infra Comms - Hans Jonkers</option>
                                            <option value="95"> - Infra Comms - Afd. Crediteuren administratie</option>
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Tel direct</td>
                                    <td>
                                        <input name="tel_direct" style="border:0;  width:100%; text-align: left; padding-left: 4px;" class="text-input" type="text" value="">
                                    </td>
                                </tr>

                                <tr>
                                    <td>E-mail</td>
                                    <td>
                                        <input name="email_leverancier" style="border:0;  width:100%; text-align: left; padding-left: 4px;" class="text-input" type="text" value="">
                                    </td>
                                </tr>

                                <tr>
                                    <td>Telefoon</td>
                                    <td>
                                        <input name="telefoon_leverancier" style="border:0;  width:100%; text-align: left; padding-left: 4px;" class="text-input" type="text" value="">

                                    </td>
                                </tr>
                                <tr>
                                    <td>Inkoopadres</td>
                                    <td>
                                        <textarea style="border:0;  width:100%; text-align: left; padding-left: 4px;" name="inkoopadres"></textarea>

                                    </td>
                                </tr>

                                <tr>
                                    <td>Advertentie link</td>
                                    <td>
                                        <input name="ad_link" style="border:0;  width:100%; text-align: left; padding-left: 4px;" class="text-input" type="text" value="">
                                    </td>
                                </tr>

                                <tr>
                                    <td>Advertentie nummer</td>
                                    <td>
                                        <input name="ad_nummer" style="border:0;  width:100%; text-align: left; padding-left: 4px;" class="text-input" type="text" value="">
                                    </td>
                                </tr>

                                <tr>


                                    <th style="background-color: #f8f9fa; border-right: 0px;">Voorwaarden leverancier</th>
                                    <th style="background-color: #f8f9fa; border-left: 0px;">

                                    </th>
                                </tr>

                                <tr>
                                    <td>Levering Export</td>
                                    <td>
                                        <input name=" " style="border:0;  width:100%; text-align: left; padding-left: 4px;" class="text-input" type="date" value="">
                                    </td>
                                </tr>

                                <tr>
                                    <td>Kaution / aanbetaling</td>
                                    <td>
                                        <input name="kaution" style="border:0;  width:100%; text-align: left; padding-left: 4px;" class="text-input" type="text" value="0.00">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Overige bepaling</td>
                                    <td>
                                        <textarea style="border:0;  width:100%; text-align: left; padding-left: 4px;" name="overigebepalingen"></textarea>

                                    </td>
                                </tr>


                                <tr>
                                    <td>Leverbaar per</td>
                                    <td>
                                        <input name="leverbaar_per" style="border:0;  width:100%; text-align: left; padding-left: 4px;" class="text-input" type="date" value="">
                                    </td>
                                </tr>

                                <tr>

                                    <th style="background-color: #f8f9fa; border-right: 0px;">Besproken met leverancier</th>
                                    <th style="background-color: #f8f9fa; border-left: 0px;">

                                    </th>
                                </tr>
                                <tr>
                                    <td>Reservering</td>
                                    <td>
                                        <input name="reservering_leverancier" style="border:0;  width:100%; text-align: left; padding-left: 4px;" class="text-input" type="date" value="">
                                    </td>
                                </tr>
                                <tr>
                                    <td>COC aanwezig</td>
                                    <td>

                                        <select style=" border:0; margin: 0; vertical-align: middle; width: 100%; background-color: #ffffff;" name="coc_aanwezig">
                                            <option>
                                                Make a choice
                                            </option>
                                            <option value="424">No</option>
                                            <option value="425">Yes</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Laatste beurt</td>
                                    <td>
                                        <input name="laatste_beurt" style="border:0;  width:100%; text-align: left; padding-left: 4px;" class="text-input" type="date" value="">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Gerepareerde schade</td>
                                    <td>
                                        <textarea style="border:0;  width:100%; text-align: left; padding-left: 4px;" name="gerepareerde_schade"></textarea>

                                    </td>
                                </tr>
                                <tr>
                                    <td>Interieur netjes</td>
                                    <td>
                                        <select style=" border:0; margin: 0; vertical-align: middle; width: 100%; background-color: #ffffff;" name="interieur_ok">
                                            <option>
                                                Make a choice
                                            </option>
                                            <option value="424">No</option>
                                            <option value="425">Yes</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Velgen beschadigd</td>
                                    <td>
                                        <select style=" border:0; margin: 0; vertical-align: middle; width: 100%; background-color: #ffffff;" name="velgen_beschadigd">
                                            <option>
                                                Make a choice
                                            </option>
                                            <option value="424">No</option>
                                            <option value="425">Yes</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Opknapkosten</td>
                                    <td>
                                        <input name="opknapkosten" style="border:0;  width:100%; text-align: left; padding-left: 4px;" class="text-input" type="text" value="">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Hoogte opknapkosten</td>
                                    <td>
                                        <input name="hoogte_opknapkosten" style="border:0;  width:100%; text-align: left; padding-left: 4px;" class="text-input" type="number" value="0.00">
                                    </td>
                                </tr>

                                <tr>
                                    <td>Opmerking</td>
                                    <td>
                                        <textarea style="border:0;  width:100%; text-align: left; padding-left: 4px;" name="opmerkingen_leverancier"></textarea>

                                    </td>
                                </tr>
                                <tr>
                                    <td>Extra wielset</td>
                                    <td>
                                        <select style=" border:0; margin: 0; vertical-align: middle; width: 100%; background-color: #ffffff;" name="extra_wielset">
                                            <option>
                                                Make a choice
                                            </option>
                                            <option value="424">No</option>
                                            <option value="425">Yes</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Bandenprofiel</td>
                                    <td>
                                        <input name="bandenprofiel" style="border:0;  width:100%; text-align: left; padding-left: 4px;" class="text-input" type="text" value="">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Zomerbanden gemonteerd</td>
                                    <td>
                                        <select style=" border:0; margin: 0; vertical-align: middle; width: 100%; background-color: #ffffff;" name="zomerbanden_gemonteerd">
                                            <option>
                                                Make a choice
                                            </option>
                                            <option value="424">No</option>
                                            <option value="425">Yes</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Aantal sleutels</td>
                                    <td>
                                        <input name="aantal_sleutels" style="border:0;  width:100%; text-align: left; padding-left: 4px;" class="text-input" type="text" value="">
                                    </td>
                                </tr>

                                <tr>
                                    <td>SD kaart</td>
                                    <td>
                                        <select style=" border:0; margin: 0; vertical-align: middle; width: 100%; background-color: #ffffff;" name="sd_kaart">
                                            <option>
                                                Make a choice
                                            </option>
                                            <option value="424">No</option>
                                            <option value="425">Yes</option>
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Boek inlc. onderhoud</td>
                                    <td>

                                        <select style=" border:0; margin: 0; vertical-align: middle; width: 100%; background-color: #ffffff;" name="boek_incl_onderhoud">
                                            <option>
                                                Make a choice
                                            </option>
                                            <option value="424">No</option>
                                            <option value="425">Yes</option>
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Laadkabels</td>
                                    <td>
                                        <select style=" border:0; margin: 0; vertical-align: middle; width: 100%; background-color: #ffffff;" name="laadkabels">
                                            <option>
                                                Make a choice
                                            </option>
                                            <option value="424">No</option>
                                            <option value="425">Yes</option>
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Ontbrekende delen</td>
                                    <td>
                                        <input name="ontbrekende_delen" style="border:0;  width:100%; text-align: left; padding-left: 4px;" class="text-input" type="text" value="">
                                    </td>
                                </tr>



                            </tbody>
                        </table>


                    </div>



                    <!--            <hr />-->




                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 " style="max-width:unset !important;">

                        <script language="JavaScript">
                            function toggle(source) {
                                checkboxes = document.getElementsByClassName('display-on-quotation');
                                for (var i = 0, n = checkboxes.length; i < n; i++) {
                                    checkboxes[i].checked = source.checked;
                                }
                            }
                        </script>

                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="background-color: #f8f9fa; border-right: 0px;">PriceForm</th>
                                    <th style="background-color: #f8f9fa; border-left: 0px;">

                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>

                                    <td style="width: 40%; font-style: italic;" colspan="2">
                                        Toon alle regels op offerte.
                                    </td>

                                    <td style="padding-top:0px; padding-bottom:0px; vertical-align: middle;">
                                        <input type="checkbox" onclick="toggle(this)" style="display: block;">
                                    </td>

                                </tr>

                            </tbody>
                            <tbody>


                                <tr>
                                    <td style="width: 40%; font-size: 150%;">BTW of Marge </td>
                                    <td style="padding:0px; vertical-align: middle;"> <select name="btw_marge_bepaling" class="display-on-quotation" id="btw_marge_bepaling_dip" style="border:0;  width: 100%; ">

                                            <option>Maak een keuze</option>
                                            <option value="0">BTW</option>
                                            <option value="1">Marge</option>



                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding-top:0px;padding-bottom:0px; vertical-align: middle;">Soort voertuig </td>
                                    <td style="padding:0px; vertical-align: middle;"> <select name="SoortVoertuig" class="display-on-quotation" id="SoortVoertuig_dip" style="border:0;  width: 100%; ">
                                            <option value="0">Maak een keuze </option>

                                            <option value="1" selected="">Personenwagen (standaard)</option>
                                            <option value="2">Bedrijfswagen tot 3500KG</option>
                                            <option value="3">Camper</option>

                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding-top:0px;padding-bottom:0px; vertical-align: middle;">Datum eerste toelating</td>
                                    <td style="padding:0px; vertical-align: middle;"> <input style="border:0; margin: 0px; width: 100%;  padding-left:3px;" type="text" class="display-on-quotation" id="datepicker5" name="BPMproductiedatum">
                                    </td>
                                </tr>
                                <tr>
                                    <td style=" vertical-align: middle;">Huidige datum BPM </td>
                                    <td style="padding:0px; vertical-align: middle;">

                                        <input style="border:0; margin: 0px; width: 100%;  padding-left:3px;" type="text" class="text-input" readonly="readonly" name="huidigedatumbpm" id="datepicker6">

                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding-top:0px;padding-bottom:0px; vertical-align: middle;">Eerste tenaamstelling NL </td>
                                    <td style="padding:0px; vertical-align: middle;"> <input style="border:0; margin: 0px; width: 100%;  padding-left:3px;" type="text" class="display-on-quotation" id="datepicker7" name="BPMtenaamstellingNL">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding-top:0px;padding-bottom:0px; vertical-align: middle;">Brandstof soort </td>
                                    <td style="padding:0px; vertical-align: middle;"> <select name="BPMbrandstof" id="BPMbrandstof_dip" class="display-on-quotation" style="border:0;  width: 100%;  ">
                                            <option value="0">
                                                Maak een
                                                keuze
                                            </option>
                                            <option value="1" selected="">Benzine</option>
                                            <option value="2">Diesel</option>
                                            <option value="3">PHEV Benzine</option>
                                            <option value="4">PHEV Diesel</option>

                                        </select>

                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding-top:0px;padding-bottom:0px; vertical-align: middle;">CO² NEDC </td>
                                    <td style="padding:0px; vertical-align: middle;"><input style=" border:0;  width: 100%; padding-left:3px;" value="130" class="display-on-quotation" type="text" name="BPMCO2" id="BPMCO2_dip"></td>
                                </tr>
                                <tr>
                                    <td style="padding-top:0px;padding-bottom:0px; vertical-align: middle;">CO² WLTP </td>
                                    <td style="padding:0px; vertical-align: middle;"><input style=" border:0;  width: 100%; padding-left:3px;" value="130" class="display-on-quotation" type="text" name="BPMCO2WLTP" id="BPMCO2WLTP_dip"></td>
                                </tr>
                                <tr>
                                    <td style="padding-top:0px;padding-bottom:0px; vertical-align: middle;">Restwaarde percentage (koerslijst) </td>
                                    <td style="padding:0px; vertical-align: middle;"><input style=" border:0; width: 100%;  padding-left:3px; " value="10" class="display-on-quotation" type="text" name="percentage" id="percentage_dip"></td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td style="width: 40%; font-size: 150%;">
                                        Inkoopprijs Netto
                                    </td>
                                    <td style="padding-top:0px; padding-bottom:0px; vertical-align: middle; float: right; border: 0px;">
                                        <input name="inkoopprijs_ex_ex" id="inkoopprijs_ex_ex_dip" style="border:0;  width:100%; text-align: right; font-size: 150%; " class="text-input" type="text">
                                    </td>
                                    <td style="padding-top:0px; padding-bottom:0px; vertical-align: middle;">
                                        <input name="display_inkoopprijs_ex_ex" value="1" class="display-on-quotation" type="checkbox" style="display: block;">
                                    </td>
                                </tr>

                                <tr>
                                    <td style="width: 40%;">
                                        Afleverkosten
                                    </td>
                                    <td style="padding-top:0px; padding-bottom:0px; vertical-align: middle; float: right; border: 0px;">
                                        <input name="delivery_costs" id="delivery_costs_dip" style="border:0;  width:100%; text-align: right;" class="text-input" type="text" value="">
                                    </td>
                                    <td style="padding-top:0px; padding-bottom:0px; vertical-align: middle;">
                                        <input name="display_delivery_costs" value="1" class="display-on-quotation" type="checkbox" style="display: block;">
                                    </td>
                                </tr>





                                <tr>
                                    <td style="width: 40%;">
                                        Opknapkosten ex. BTW
                                    </td>
                                    <td style="padding-top:0px; padding-bottom:0px; vertical-align: middle; float: right; border: 0px;">
                                        <input name="opknapkosten_ex" id="opknapkosten_ex_dip" style="border:0;  width:100%; text-align: right;" class="text-input" type="text" value="">
                                    </td>
                                    <td style="padding-top:0px; padding-bottom:0px; vertical-align: middle;">
                                        <input name="display_opknapkosten_ex" value="1" class="display-on-quotation" type="checkbox" style="display: block;">
                                    </td>
                                </tr>


                                <tr>
                                    <td style="width: 40%;">
                                        Transport buitenland
                                    </td>
                                    <td style="padding-top:0px; padding-bottom:0px; vertical-align: middle; float: right; border: 0px;">
                                        <input name="transport_buitenland" id="transport_buitenland_dip" style="border:0;  width:100%; text-align: right;" class="text-input" type="text" value="">
                                    </td>
                                    <td style="padding-top:0px; padding-bottom:0px; vertical-align: middle;">

                                        <input name="display_transport_buitenland" value="1" class="display-on-quotation" type="checkbox" style="display: block;">
                                    </td>
                                </tr>

                                <tr>
                                    <td style="width: 40%;">
                                        Transport binnenland
                                    </td>
                                    <td style="padding-top:0px; padding-bottom:0px; vertical-align: middle; float: right; border: 0px;">
                                        <input name="transport_binnenland" id="transport_binnenland_dip" style="border:0;  width:100%; text-align: right;" class="text-input" type="text" value="">
                                    </td>
                                    <td style="padding-top:0px; padding-bottom:0px; vertical-align: middle;">
                                        <input name="display_transport_binnenland" value="1" class="display-on-quotation" type="checkbox" style="display: block;">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 40%;">
                                        Taxatie- en overige kosten
                                    </td>
                                    <td style="padding-top:0px; padding-bottom:0px; vertical-align: middle; float: right; border: 0px;">
                                        <input name="taxatie_kosten" id="taxatie_kosten_dip" style="border:0;  width:100%; text-align: right;" class="text-input" type="text" value="">
                                    </td>
                                    <td style="padding-top:0px; padding-bottom:0px; vertical-align: middle;">
                                        <input name="display_taxatie_kosten" value="1" class="display-on-quotation" type="checkbox" style="display: block;">
                                    </td>
                                </tr>



                                <tr>
                                    <td style="width: 40%;">
                                        Kosten totaal
                                    </td>
                                    <td style="padding-top:0px; padding-bottom:0px; vertical-align: middle; float: right; border: 0px;">
                                        <input name="kosten_totaal" id="kosten_totaal_dip" style="border:1px solid silver;   width:100%; text-align: right;" class="text-input" readonly="" type="text" value="">
                                    </td>
                                    <td style="padding-top:0px; padding-bottom:0px; vertical-align: middle;">
                                        <input name="display_kosten_totaal" value="1" class="display-on-quotation" type="checkbox" style="display: block;">
                                    </td>
                                </tr>

                                <tr>
                                    <td>&nbsp;</td>
                                    <td></td>
                                    <td></td>
                                </tr>




                                <tr>
                                    <td style="width: 40%;">
                                        Fee
                                    </td>
                                    <td style="padding-top:0px; padding-bottom:0px; vertical-align: middle; float: right; border: 0px;">
                                        <input name="fee" id="fee_dip" style="border:0;  width:100%; text-align: right;" class="text-input" type="text" value="">
                                    </td>
                                    <td style="padding-top:0px; padding-bottom:0px; vertical-align: middle;">
                                        <input name="display_fee" value="1" class="display-on-quotation" type="checkbox" style="display: block;">
                                    </td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>

                                <tr>
                                    <td style="width: 40%;font-size: 150%;">
                                        Verkoopprijs Netto
                                    </td>
                                    <td style="padding-top:0px; padding-bottom:0px; vertical-align: middle; float: right; border: 0px; ">
                                        <input name="verkoopprijs_netto" id="verkoopprijs_netto_dip" style="border:1px solid silver;  width:100%; text-align: right; font-size: 150%; " class="text-input" readonly="readonly" type="text">
                                    </td>

                                    <td style="padding-top:0px; padding-bottom:0px; vertical-align: middle;">
                                        <input name="display_verkoopprijs_netto" value="1" class="display-on-quotation" type="checkbox" style="display: block;">
                                    </td>
                                </tr>

                                <tr>
                                    <td style="width: 40%;">
                                        BTW 21%
                                    </td>
                                    <td style="padding-top:0px; padding-bottom:0px; vertical-align: middle; float: right; border: 0px; ">
                                        <input name="btw" id="btw_dip" readonly="" style="border-left:1px solid silver;  border-right:1px solid silver; border-top:1px solid silver; border-bottom:0px; width:100%; text-align: right; " class="text-input" type="text" value="">
                                    </td>
                                    <td style="padding-top:0px; padding-bottom:0px; vertical-align: middle;">
                                        <input name="display_btw" value="1" class="display-on-quotation" type="checkbox" style="display: block;">
                                    </td>
                                </tr>

                                <tr>
                                    <td style="width: 40%;">
                                        Rest BPM indicatief
                                    </td>

                                    <td style="padding-top:0px; padding-bottom:0px; vertical-align: middle; float: right; border: 0px;">
                                        <input name="gekozen_bpm_bedrag" id="gekozen_bpm_bedrag_dip" style="border:1px solid silver;  width:100%; text-align: right;" class="text-input" readonly="" type="text">
                                    </td>
                                    <td style="padding-top:0px; padding-bottom:0px; vertical-align: middle;">
                                        <input name="display_rest_bpm_indicatief" value="1" class="display-on-quotation" type="checkbox" style="display: block;">
                                    </td>
                                </tr>



                                <tr>
                                    <td style="width: 40%;">
                                        Leges
                                    </td>
                                    <td style="padding-top:0px; padding-bottom:0px; vertical-align: middle; float: right; border: 0px;">
                                        <input name="leges" id="leges_dip" style="border:0;  width:100%; text-align: right;" class="text-input" type="text" value="">
                                    </td>
                                    <td style="padding-top:0px; padding-bottom:0px; vertical-align: middle;">
                                        <input name="display_leges" value="1" class="display-on-quotation" type="checkbox" style="display: block;">
                                    </td>
                                </tr>



                                <tr>
                                    <td style="width: 40%; font-size: 150%;">
                                        Verkoopprijs in/in
                                    </td>
                                    <td style="padding-top:0px; padding-bottom:0px; vertical-align: middle; float: right; border: 0px;">
                                        <input name="verkoopprijs_in_in" id="verkoopprijs_in_in_dip" style="border:1px solid silver;  width:100%; text-align: right; font-size: 150%; " class="text-input" type="text" value="10446,00">
                                    </td>
                                    <td style="padding-top:0px; padding-bottom:0px; vertical-align: middle;">
                                        <input name="display_verkoopprijs_in_in" value="1" class="display-on-quotation" type="checkbox" style="display: block;">
                                    </td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td style="width: 40%; vertical-align: middle;">

                                    </td>
                                    <td style="padding: 0px;  vertical-align: middle; border: 0px;">
                                        <button type="submit" class="btn btn-primary btn-block" style="width: 100%; border-radius: 0px;" name="button" value="4" formaction="../data/library/Berekening/DossierBerekening.php" formmethod="post">
                                            Bereken inkoopprijs </button>
                                    </td>
                                    <td style="padding-top:0px; padding-bottom:0px; vertical-align: middle;">




                                    </td>
                                </tr>




                            </tbody>
                        </table>



                        <!--    <button-->
                        <!--        style="border-radius: 0px;"-->
                        <!--        type="submit"-->
                        <!--        class="btn btn-primary btn-block"-->
                        <!--        name="button"-->
                        <!--        value="1"-->
                        <!--        formaction='../data/library/Berekening/BerekenDossier.php'-->
                        <!--        formmethod='post'>-->
                        <!--        Bereken prijs-->
                        <!--    </button>-->




                        <!-- email voor de aanbieding verzending -->



                        <div style="background-color: #f8f9fa; font-weight: 700;"> Verzend aanbieding &amp; offerte</div><br>


                        <a href="#modal-form_mailingForm" role="button" class="blue" data-toggle="modal"><label>
                                <button style="border-radius: 0px;" type="button" class="btn btn-danger btn-sm btn-primary">
                                    <i class="ace-icon fa fa-arrow-right bigger-110"></i>
                                    Voeg e-mailadres toe
                                </button>
                            </label></a>&nbsp;






                        <button type="submit" name="offerte_pdf" formaction="../views/pdf/NewOfferPDF.php" formmethod="post" formtarget="_blank" style="border-radius: 0px;" class="btn btn-primary btn-sm btn-primary">
                            <i class="ace-icon fa fa-arrow-right bigger-110"></i>
                            Maak PDF aanbieding
                        </button>

                        <button type="submit" name="offerte_pdf" formaction="../data/library/pdf/NewQuotation.php" formmethod="post" formtarget="_blank" style="border-radius: 0px;" class="btn btn-primary btn-sm btn-info">
                            <i class="ace-icon fa fa-arrow-right bigger-110"></i>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Maak Offerte&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </button>
                        <hr>

                        <table class="table table-bordered table-hover" "="">
    <tbody>
    <tr style=" text-align: center">
                            <th>Soort</th>
                            <th style="text-align: center">View</th>


                            </tr>
                            </tbody>
                        </table>
                        <hr>
                        <table class="table table-bordered table-hover" "="">
                        <tbody>
                        <tr style=" text-align: center">
                            <th>Email</th>
                            <th style="text-align: center">Status</th>
                            <th style="text-align: center">Datum</th>
                            </tr>



                            </tbody>
                        </table>






                    </div>

                    <!-- hier komt de data in -->



                </div>
                <div class="row">



                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 ">

                        <br>
                        <input type="hidden" name="higlights_opties_totalID" value="6">


                        <div style="background-color: #f8f9fa; font-weight: 700;"> Highlights opties</div><br>

                        <input id="highlights_title" type="text" style="border:1px solid silver;  width:100%;" class="text-input" name="highlights_title" value="<?php if ($_SESSION['highlights_data1']) {
                            echo $_SESSION['highlights_data1'][0]['conditionTitle'];
                        } ?>"> <br><br>

                        <table class="table table-bordered table-hover">
                            <tbody>
                                <tr>
                                    
                                    <td><textarea id="highlights_text" name="highlights_text" style="border:0px; width: 100%; height: 150px;" value=""><?php if ($_SESSION['highlights_data1']) {
                            echo  $_SESSION['highlights_data1'][0]['conditionText'];
                        } ?></textarea>
                                    </td>
                                </tr>
                            </tbody>

                        </table>

                        <button id="updater_Highlights" class="btn btn-sm btn-primary" name="updater_Highlights" value="0" style="background-color: orange; border-radius: 4px; border-color: orange; width: 33%;">Save </button>


                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 ">

                        <br>

                        <div style="background-color: #f8f9fa; font-weight: 700;"> Toelichting &amp; voorwaarden</div><br>

                        <input id="toelichting_title" type="text" style="border:1px solid silver;  width:100%;" maxlength="77" class="text-input" name="toelichting_title" value="<?php if ($_SESSION['highlights_data2']) {
                            echo  $_SESSION['highlights_data2'][0]['explanationTitle'];
                        } ?>"> <br><br>


                        <table class="table table-bordered table-hover">
                            <tbody>
                                <tr>

                                    <td><textarea id="toelichting_text" name="toelichting_text" style="border:0px; width: 100%; height: 150px;" value="" ><?php if ($_SESSION['highlights_data2']) {
                            echo  $_SESSION['highlights_data2'][0]['explanationText'];
                        } ?></textarea>
                                    </td>
                                </tr>
                            </tbody>


                        </table>
                        <button id="updater_Toelichting" class="btn btn-sm btn-primary" name="updater_Toelichting" value="0" style="background-color: orange; border-radius: 4px; border-color: orange; width: 33%;">Save </button>
                    </div>







                </div>


                <div id="three"></div>
                <br><br>
                <nav class="navbar navbar-light bg-light">
                    <b>Verkopen</b>
                </nav><br>

                <div class="row">

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 ">

                        <input type="hidden" name="verkoopgegevensID" value="6">
                        <table class="table table-bordered table-hover">

                            <tbody>



                                <tr>
                                    <td>Referentienummer</td>
                                    <td>
                                        <input name="referentienummer_verkoop" style="border:0;  width:100%; text-align: left; padding-left: 4px;" class="text-input" type="text" value="">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Verkoper</td>
                                    <td>
                                        <select style=" border:0; margin: 0; vertical-align: middle; width: 100%; background-color: #ffffff;" name="EmployeeIdVerkoop">
                                            <option>
                                                Make a choice
                                            </option>
                                            <option value="1000072">M.W.H. Benink</option>
                                            <option value="1000073">T.C. Cruz Pinto</option>
                                            <option value="301005">R. Kroon</option>
                                            <option value="351001">A.A. Blommestein</option>
                                            <option value="351003">J.H.J. Verkleij</option>
                                            <option value="351006">D. Berg</option>
                                            <option value="351007">G. Ravenhorst</option>
                                            <option value="351014">F.J. Prie</option>
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Verkocht door</td>
                                    <td>
                                        <select style=" border:0; margin: 0; vertical-align: middle; width: 100%; background-color: #ffffff;" name="gwi_factuur_gegevens_id">
                                            <option>
                                                Make a choice
                                            </option>
                                            <option value="2">Autobid Nederland B.V.</option>
                                            <option value="3">Livebid GmbH</option>
                                            <option value="4">GWI Auto B.V.</option>
                                            <option value="6">EmBe Holding B.V.</option>
                                            <option value="7">Florindo Holding B.V.</option>
                                            <option value="8">iAuto B.V.</option>
                                        </select>
                                    </td>
                                </tr>



                                <tr>


                                    <th style="background-color: #f8f9fa; border-right: 0px;">Verkopen aan</th>
                                    <th style="background-color: #f8f9fa; border-left: 0px;">
                                    </th>
                                </tr>

                                <tr>
                                    <td>Aan</td>
                                    <td>
                                        <select style=" border:0; margin: 0; vertical-align: middle; width: 100%; background-color: #ffffff;" name="DebtorIdVerkoop">
                                            <option>
                                                Make a choice </option>
                                            <option value="10030">Auto Buikema B.V.</option>
                                            <option value="10072">Breedveld Auto's</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Contactpersoon</td>
                                    <td>
                                        <select style=" border:0; margin: 0; vertical-align: middle; width: 100%; background-color: #ffffff;" name="ContactId">
                                            <option>
                                                Make a choice </option>
                                            <option value="5"> - AFAS ERP Software B.V. - Support Afdeling</option>
                                            <option value="6"> - AFAS ERP Software B.V. - Customer Service</option>
                                            <option value="32"> - AFAS ERP Software B.V. - Financiële administratie</option>
                                            <option value="86">Toni da Cruz Pinto - Florindo Holding B.V. - Toni da Cruz Pinto</option>
                                            <option value="94">Hans Jonkers - Infra Comms - Hans Jonkers</option>
                                            <option value="95"> - Infra Comms - Afd. Crediteuren administratie</option>
                                        </select>
                                    </td>
                                </tr>


                                <tr>
                                    <td>Email</td>
                                    <td>
                                        <input name="email_koper" style="border:0;  width:100%; text-align: left; padding-left: 4px;" class="text-input" type="text" value="">

                                    </td>
                                </tr>
                                <tr>
                                    <td>Adres</td>
                                    <td>
                                        <input name="xx" style="border:0;  width:100%; text-align: left; padding-left: 4px;" class="text-input" type="text" value="" readonly="readonly">

                                    </td>
                                </tr>

                                <tr>
                                    <td>Postcode &amp; plaats</td>
                                    <td>
                                        <input name="xx" style="border:0;  width:100%; text-align: left; padding-left: 4px;" class="text-input" type="text" value="" readonly="readonly">

                                    </td>
                                </tr>

                                <tr>
                                    <td>Iban</td>
                                    <td>
                                        <input name="xx" style="border:0;  width:100%; text-align: left; padding-left: 4px;" class="text-input" type="text" value="" readonly="readonly">

                                    </td>
                                </tr>


                                <tr>
                                    <td>Afleveradres hetzelfde</td>
                                    <td>
                                        <select style=" border:0; margin: 0; vertical-align: middle; width: 100%; background-color: #ffffff;" name="aflever_zelfde">
                                            <option>
                                                Make a choice
                                            </option>
                                            <option value="424">No</option>
                                            <option value="425">Yes</option>
                                        </select>
                                    </td>
                                </tr>


                                <tr>
                                    <td>Aflever adres</td>
                                    <td>
                                        <input name="aflever_adres_koper" style="border:0;  width:100%; text-align: left; padding-left: 4px;" class="text-input" type="text" value="">

                                    </td>
                                </tr>


                                <tr>
                                    <td>Postcode &amp; plaats</td>
                                    <td>
                                        <input name="aflever_plaats_koperVerkoop" style="border:0;  width:100%; text-align: left; padding-left: 4px;" class="text-input" type="text" value="">

                                    </td>
                                </tr>

                                <tr>

                                    <td>Land</td>
                                    <td>
                                        <input name="aflever_land_koper" style="border:0;  width:100%; text-align: left; padding-left: 4px;" class="text-input" type="text" value="">

                                    </td>
                                </tr>
                                <tr>
                                    <td>Verkoopprijs</td>
                                    <td>
                                        <input name="verkoopprijs" style="border:0;  width:100%; text-align: left; padding-left: 4px;" class="text-input" type="text" value="10446.00" readonly="">

                                    </td>
                                </tr>
                                <tr>
                                    <td>BPM (via ons)</td>
                                    <td>
                                        <select style=" border:0; margin: 0; vertical-align: middle; width: 100%; background-color: #ffffff;" name="bpm_via_ons">
                                            <option>
                                                Make a choice
                                            </option>
                                            <option value="424">No</option>
                                            <option value="425">Yes</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>RDW (wij keuren)</td>
                                    <td>
                                        <select style=" border:0; margin: 0; vertical-align: middle; width: 100%; background-color: #ffffff;" name="rdw_via_ons">
                                            <option>
                                                Make a choice
                                            </option>
                                            <option value="424">No</option>
                                            <option value="425">Yes</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: middle;">Vrije tekst</td>
                                    <td>
                                        <textarea style="border:0;  width:100%; text-align: left; padding-left: 4px;" name="verkoop_tekst"></textarea>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Orderdatum</td>
                                    <td>
                                        <input name="Orderdatum" style="border:0;  width:100%; text-align: left; padding-left: 4px;" class="text-input" type="text" value="10446.00">

                                    </td>
                                </tr>





                            </tbody>
                        </table>
                    </div>



                    <!--            <hr />-->






                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 ">

                        <input type="hidden" name="reservering_verkoopID" value="8">

                        <table class="table table-bordered table-hover">

                            <tbody>



                                <tr>
                                    <td>Naam</td>
                                    <td>

                                        <select style=" border:0; margin: 0; vertical-align: middle; width: 100%; background-color: #ffffff;" name="EmployeeIdReserveren">
                                            <option>
                                                Make a choice
                                            </option>
                                            <option value="1000072">M.W.H. Benink</option>
                                            <option value="1000073">T.C. Cruz Pinto</option>
                                            <option value="301005">R. Kroon</option>
                                            <option value="351001">A.A. Blommestein</option>
                                            <option value="351003">J.H.J. Verkleij</option>
                                            <option value="351006">D. Berg</option>
                                            <option value="351007">G. Ravenhorst</option>
                                            <option value="351014">F.J. Prie</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Voor</td>
                                    <td>
                                        <select style=" border:0; margin: 0; vertical-align: middle; width: 100%; background-color: #ffffff;" name="DebtorIdReserveren">
                                            <option>
                                                Make a choice </option>
                                            <option value="10030">Auto Buikema B.V.</option>
                                            <option value="10072">Breedveld Auto's</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Contactpersoon</td>
                                    <td>
                                        <input name="contactpersoon_reserveer" value="" style="border:0;  width:100%; text-align: left; padding-left: 4px;" class="text-input" type="text">

                                    </td>
                                </tr>
                                <tr>
                                    <td>Tel</td>
                                    <td>
                                        <input name="tel_reserveer" value="" style="border:0;  width:100%; text-align: left; padding-left: 4px;" class="text-input" type="text">

                                    </td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>
                                        <input name="email_reserveer" value="" style="border:0;  width:100%; text-align: left; padding-left: 4px;" class="text-input" type="text">

                                    </td>
                                </tr>
                                <tr>
                                    <td>Van</td>
                                    <td>
                                        <input name="van_reserveer" value="" style="border:0;  width:100%; text-align: left; padding-left: 4px;" class="text-input" type="date">

                                    </td>
                                </tr>
                                <tr>
                                    <td>Tot</td>
                                    <td>
                                        <input name="tot_reserveer" value="" style="border:0;  width:100%; text-align: left; padding-left: 4px;" class="text-input" type="date">

                                    </td>
                                </tr>
                                <tr>
                                    <td>Reserveren</td>
                                    <td>

                                        <input type="checkbox" id="vehicle1" name="reserveren" value="1">
                                    </td>
                                </tr>



                            </tbody>
                        </table>

                        <div style="background-color: #f8f9fa; font-weight: 700;"> Oude reserveringen</div><br>
                        <table class="table table-bordered table-hover">
                            <tbody>

                                <tr>
                                    <th>Voor</th>
                                    <td>

                                        <!--                    <input type="hidden" id="vehicle1" name="reserverendefinitiefID[]" value="-->
                                        <!--">-->
                                    </td>


                                    <th>Contact</th>
                                    <td>
                                    </td>
                                </tr>

                                <tr>
                                    <th>Van</th>
                                    <td>
                                    </td>

                                    <th>Tot</th>
                                    <td>
                                    </td>
                                </tr>
                                <tr>

                                    <th>Maak definitief</th>
                                    <td>
                                        <center><input type="checkbox" id="vehicle1" name="reserverendefinitief[]" value="0"></center>
                                    </td>


                                </tr>
                                <tr>
                                    <th>&nbsp;</th>
                                    <td>

                                    </td>

                                    <th></th>
                                    <td>

                                    </td>
                                </tr>



                            </tbody>
                        </table>




                        <!-- email voor de aanbieding verzending -->



                        <div style="background-color: #f8f9fa; font-weight: 700;"> Verzend aanbieding &amp; offerte</div><br>


                        <a href="#modal-form_mailingForm" role="button" class="blue" data-toggle="modal"><label>
                                <button style="border-radius: 0px;" type="button" class="btn btn-danger btn-sm btn-primary">
                                    <i class="ace-icon fa fa-arrow-right bigger-110"></i>
                                    Voeg e-mailadres toe
                                </button>
                            </label></a>&nbsp;






                        <button type="submit" name="offerte_pdf" formaction="../data/library/pdf/NewOfferPDF.php" formmethod="post" formtarget="_blank" style="border-radius: 0px;" class="btn btn-primary btn-sm btn-primary">
                            <i class="ace-icon fa fa-arrow-right bigger-110"></i>
                            Maak PDF aanbieding
                        </button>

                        <button type="submit" name="offerte_pdf" formaction="../data/library/pdf/NewQuotation.php" formmethod="post" formtarget="_blank" style="border-radius: 0px;" class="btn btn-primary btn-sm btn-info">
                            <i class="ace-icon fa fa-arrow-right bigger-110"></i>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Maak Offerte&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </button>
                        <hr>

                        <table class="table table-bordered table-hover" "="">
    <tbody>
    <tr style=" text-align: center">
                            <th>Soort</th>
                            <th style="text-align: center">View</th>


                            </tr>
                            </tbody>
                        </table>
                        <hr>
                        <table class="table table-bordered table-hover" "="">
                        <tbody>
                        <tr style=" text-align: center">
                            <th>Email</th>
                            <th style="text-align: center">Status</th>
                            <th style="text-align: center">Datum</th>
                            </tr>



                            </tbody>
                        </table>




                    </div>





                    <!--            <hr />-->




                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12  ">

                        <table class="table table-bordered table-hover hidden-xs hidden-sm hidden-md">



                            <thead>
                                <tr>
                                    <th>Log tijd</th>
                                    <th>NR</th>
                                    <th>Verkoper</th>
                                    <th>Relatie</th>
                                    <th>Naam</th>
                                    <th>E-mail</th>
                                    <th>Verkoopprijs</th>
                                    <th>Soort</th>
                                    <th>Reserveer</th>
                                    <th>Van</th>
                                    <th>Tot</th>
                                    <th>Maak definitief</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>01-11-2020 12:31</td>
                                    <td>A17</td>
                                    <td>M. Benink</td>
                                    <td>Udenhout</td>
                                    <td>Zethof</td>
                                    <td>r.zethof@zethof.nl</td>
                                    <td>76.000</td>
                                    <td>BTW</td>
                                    <td>

                                        <center><input type="checkbox" id="vehicle1" name="reserveren" value="2"></center>
                                        <!--                    <a href="#reserveer" data-toggle="modal">Reserveer</a> -->
                                    </td>
                                    <td>01-11-2020 12:31</td>
                                    <td>02-11-2020 12:31</td>
                                    <td>
                                        <center><input type="checkbox" id="vehicle1" name="reserverendefinitief" value="2"></center>
                                        <!--                    <a href="#definitief" data-toggle="modal" style="color: red;">Maak definitief</a> -->
                                    </td>

                                </tr>


                                <tr>
                                    <td>01-11-2020 12:31</td>
                                    <td>A17</td>
                                    <td>T. Da cruz Pinto</td>
                                    <td>Den bosch</td>
                                    <td>De jong</td>
                                    <td>dejong@auto.nl</td>
                                    <td>43.000</td>
                                    <td>Marge</td>
                                    <td>
                                        <center><input type="checkbox" id="vehicle1" name="reserveren" value="2"></center>
                                        <!--                    <a href="#reserveer" data-toggle="modal">Reserveer</a> -->
                                    </td>
                                    <td>01-11-2020 12:31</td>
                                    <td>02-11-2020 12:31</td>
                                    <td>
                                        <center><input type="checkbox" id="vehicle1" name="reserverendefinitief" value="2"></center>

                                        <!--                    <a href="#definitief" data-toggle="modal" style="color: red;">Maak definitief</a> -->

                                    </td>

                                </tr>


                            </tbody>
                        </table>


                    </div>





                    <!--            <hr />-->


                </div>

                <div id="eight"></div>
                <br><br>
                <nav class="navbar navbar-light bg-light">
                    <b>Facturatie</b>
                </nav><br>

                <div class="row">

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 ">

                        <input type="hidden" name="invoice_lines_headID" value="6">
                        <input type="hidden" name="invoiceID" value="7">
                        <table class="table table-bordered table-hover">

                            <tbody>
                            </tbody>
                            <thead>
                                <tr>
                                    <th style="background-color: #f8f9fa; border-right: 0px;">Factuurgegevens</th>
                                    <td style="background-color: #f8f9fa; border-left: 0px;"></td>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>Soort factuur</td>
                                    <td>
                                        <select style=" border:0; margin: 0; vertical-align: middle; width: 100%; background-color: #ffffff;" name="credit">
                                            <option>
                                                Make a choice
                                            </option>
                                            <option value="false">Reguliere factuur</option>
                                            <option value="true">Creditnota</option>
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Prijs in of exclusief BTW</td>
                                    <td>
                                        <select style=" border:0; margin: 0; vertical-align: middle; width: 100%; background-color: #ffffff;" name="Prijs_inclusief_BTW">
                                            <option>
                                                Make a choice
                                            </option>
                                            <option value="true">Prijs inclusief BTW</option>
                                            <option value="false">Prijs exclusief BTW</option>
                                        </select>
                                    </td>
                                </tr>


                                <tr>
                                    <td>BTW plicht</td>
                                    <td>
                                        <select style=" border:0; margin: 0; vertical-align: middle; width: 100%; background-color: #ffffff;" name="btw_plicht">
                                            <option>
                                                Make a choice
                                            </option>
                                            <option value="2">Geen BTW plicht</option>
                                            <option value="1">BTW plicht</option>
                                        </select>
                                    </td>
                                </tr>


                                <tr>
                                    <td>Orderdatum</td>
                                    <td>
                                        <input name="Orderdatum" style="border:0;  width:100%; text-align: left; padding-left: 4px;" class="text-input" type="date" value="">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Verkooprelatie</td>
                                    <td>
                                        <input name="xx" style="border:0;  width:100%; text-align: left; padding-left: 4px;" class="text-input" type="text" value="GWI auto BV" readonly="readonly">
                                        <input name="Verkooprelatie" type="hidden" value="10105">

                                    </td>
                                </tr>



                                <tr>
                                    <td>Verkopen aan</td>
                                    <td>
                                        <input name="xx" style="border:0;  width:100%; text-align: left; padding-left: 4px;" class="text-input" type="text" value="" readonly="readonly">

                                        <input name="factuur_aan" type="hidden" value="0" <="" td="">
                                    </td>
                                </tr>


                                <tr>
                                    <td>Gewenste_leverdatum</td>
                                    <td>
                                        <input name="Gewenste_leverdatum" style="border:0;  width:100%; text-align: left; padding-left: 4px;" class="text-input" type="date" value="">

                                    </td>
                                </tr>
                                <tr>
                                    <td>Datum_levering_toegezegd</td>
                                    <td>
                                        <input name="Datum_levering_toegezegd" style="border:0;  width:100%; text-align: left; padding-left: 4px;" class="text-input" type="date" value="">

                                    </td>
                                </tr>

                                <tr>
                                    <td style="vertical-align: middle;">Omschrijving_afleveradres</td>
                                    <td>
                                        <textarea style="border:0;  width:100%; text-align: left; padding-left: 4px;" name="Omschrijving_afleveradres"></textarea>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="vertical-align: middle;">voettekst</td>
                                    <td>
                                        <textarea style="border:0;  width:100%; text-align: left; padding-left: 4px;" name="voettekst">Wij zien uw betaling graag binnen per direct tegemoet op rekeningnummer NL83 RABO 0305 0035 18 t.n.v. GWI Auto B.V.</textarea>
                                    </td>
                                </tr>

                                <tr>
                                    <td>factuur_referentie</td>
                                    <td>
                                        <input name="factuur_referentie" style="border:0;  width:100%; text-align: left; padding-left: 4px;" class="text-input" type="text" value="">

                                    </td>
                                </tr>

                                <tr>
                                    <td style="vertical-align: middle;">opmerking</td>
                                    <td>
                                        <textarea style="border:0;  width:100%; text-align: left; padding-left: 4px;" name="opmerking"></textarea>
                                    </td>
                                </tr>


                            </tbody>
                        </table>
                    </div>


                    <!--            <hr />-->



                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 ">

                        <input type="hidden" name="invoice_lines_dataID" value="">
                        <table class="table table-bordered table-hover">

                            <tbody>
                            </tbody>
                            <thead>
                                <tr>
                                    <th style="background-color: #f8f9fa; border-right: 0px;">Factuurlijnen</th>
                                    <td style="background-color: #f8f9fa; border-left: 0px;"></td>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>ItemCode</td>
                                    <td>
                                        <select style=" border:0; margin: 0; vertical-align: middle; width: 100%; background-color: #ffffff;" name="ItemCode">
                                            <option>
                                                Make a choice
                                            </option>
                                            <option value="A10004">BPM</option>
                                            <option value="A10003">Transport verzekering</option>
                                            <option value="A10002">RDW identificatie en leges</option>
                                            <option value="A10001">Verkoop Marge voertuig</option>
                                            <option value="A10000">Verkoop BTW voertuig</option>
                                            <option value="A10005">Management Fee</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Aantal_eenheden</td>
                                    <td>
                                        <input name="Aantal_eenheden" style="border:0;  width:100%; text-align: left; padding-left: 4px;" class="text-input" type="text" value="">

                                    </td>
                                </tr>

                                <tr>
                                    <td>Aantal</td>
                                    <td>
                                        <input name="Aantal" style="border:0;  width:100%; text-align: left; padding-left: 4px;" class="text-input" type="text" value="">

                                    </td>
                                </tr>


                                <tr>
                                    <td style="vertical-align: middle;">Extra Description</td>
                                    <td>
                                        <input name="invoice_lines_data_omschrijving" style="border:0;  width:100%; text-align: left; padding-left: 4px;" class="text-input" type="text" value="">
                                    </td>
                                </tr>

                                <tr>
                                    <td style="vertical-align: middle;">Regelkorting</td>
                                    <td>
                                        <input name="Regelkorting" style="border:0;  width:100%; text-align: left; padding-left: 4px;" class="text-input" type="number" value="">
                                    </td>
                                </tr>

                                <tr>
                                    <td>Prijs_per_eenheid</td>
                                    <td>
                                        <input name="Prijs_per_eenheid" style="border:0;  width:100%; text-align: left; padding-left: 4px;" class="text-input" type="text" value="">

                                    </td>
                                </tr>

                                <tr>
                                    <td>Kostprijs</td>
                                    <td>
                                        <input name="Kostprijs" style="border:0;  width:100%; text-align: left; padding-left: 4px;" class="text-input" type="text" value="">

                                    </td>
                                </tr>

                                <tr>
                                    <td>Voeg aan factuur toe</td>
                                    <td>
                                        <input type="checkbox" id="vehicle1" name="voeg_toe_regel" value="1">
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>


                    <!--            <hr />-->



                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12  ">

                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div style="font-weight: bold; font-size: 120%;"> Factuur </div><br>
                        <table class="table table-bordered table-hover hidden-xs hidden-sm hidden-md">



                            <thead>
                                <tr>
                                    <th>Artikel</th>
                                    <th>Aantal eenheden</th>
                                    <th>Aantal</th>
                                    <th>Extra beschrijving</th>
                                    <th>Regelkorting</th>
                                    <th>Prijs_per_eenheid</th>
                                    <th>Kostprijs</th>


                                    <th>Delete</th>
                                    <th>Pas aan</th>


                                </tr>
                            </thead>
                            <tbody>


                            </tbody>
                        </table>


                    </div>





                    <!--            <hr />-->


                </div>

                <br><br>
                <nav class="navbar navbar-light bg-light">
                    <b>Gefactureerde items</b>
                </nav><br>
                <div class="row">


                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12  ">


                        <table class="table table-bordered table-hover hidden-xs hidden-sm hidden-md">



                            <thead>
                                <tr>
                                    <th>Artikel</th>
                                    <th>Aantal eenheden</th>
                                    <th>Aantal</th>
                                    <th>Extra beschrijving</th>
                                    <th>Regelkorting</th>
                                    <th>Prijs_per_eenheid</th>
                                    <th>Kostprijs</th>
                                    <th>Fcatuurnummer</th>
                                    <th>Bekijk</th>


                                </tr>
                            </thead>
                            <tbody>


                            </tbody>
                        </table>


                    </div>





                    <!--            <hr />-->


                </div>


                <div id="four"></div>
                <br><br>
                <nav class="navbar navbar-light bg-light">
                    <b>INKOPEN</b>
                </nav><br>

                <div class="row">


                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 ">




                        <table class="table table-bordered table-hover">

                            <tbody>




                                <tr>
                                    <th style="background-color: #f8f9fa; border-right: 0px;">
                                        Definitieve prijs
                                    </th>
                                    <td>
                                        &nbsp;
                                    </td>
                                </tr>




                                <tr>
                                    <td>&nbsp;</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: middle;">
                                        <b>Inkoopprijs Netto</b>
                                    </td>
                                    <td style="padding-top:0px; padding-bottom:0px; vertical-align: middle; float: right; border: 0px;">
                                        <input name="xx" style="border:0;  width:100%; text-align: right; font-size: 150%; " class="text-input" type="text" value="10000,00">
                                    </td>

                                </tr>





                                <tr>
                                    <td style="">
                                        Opknapkosten ex
                                    </td>
                                    <td style="padding-top:0px; padding-bottom:0px; vertical-align: middle; float: right; border: 0px;">
                                        <input name="xx" style="border:0;  width:100%; text-align: right;" class="text-input" type="text" value="">
                                    </td>

                                </tr>


                                <tr>
                                    <td style="">
                                        Transport buitenland
                                    </td>
                                    <td style="padding-top:0px; padding-bottom:0px; vertical-align: middle; float: right; border: 0px;">
                                        <input name="xx" style="border:0;  width:100%; text-align: right;" class="text-input" type="text" value="">
                                    </td>

                                </tr>

                                <tr>
                                    <td style="">
                                        Transport binnenland
                                    </td>
                                    <td style="padding-top:0px; padding-bottom:0px; vertical-align: middle; float: right; border: 0px;">
                                        <input name="xx" style="border:0;  width:100%; text-align: right;" class="text-input" type="text" value="">
                                    </td>

                                </tr>
                                <tr>
                                    <td style="">
                                        Taxatie kosten
                                    </td>
                                    <td style="padding-top:0px; padding-bottom:0px; vertical-align: middle; float: right; border: 0px;">
                                        <input name="xx" style="border:0;  width:100%; text-align: right;" class="text-input" type="text" value="">
                                    </td>

                                </tr>



                                <tr>
                                    <td style="">
                                        Kosten totaal
                                    </td>
                                    <td style="padding-top:0px; padding-bottom:0px; vertical-align: middle; float: right; border: 0px;">
                                        <input name="xx" style="border:1px solid silver;   width:100%; text-align: right;" class="text-input" readonly="" type="text" value="">
                                    </td>

                                </tr>

                                <tr>
                                    <td>&nbsp;</td>
                                    <td></td>
                                </tr>




                                <tr>
                                    <td style="">
                                        Fee
                                    </td>
                                    <td style="padding-top:0px; padding-bottom:0px; vertical-align: middle; float: right; border: 0px;">
                                        <input name="xx" style="border:0;  width:100%; text-align: right;" class="text-input" type="text" value="">
                                    </td>

                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>

                                <tr>
                                    <td style="vertical-align: middle;">
                                        <b> Verkoopprijs Netto</b>
                                    </td>
                                    <td style="padding-top:0px; padding-bottom:0px; vertical-align: middle; float: right; border: 0px; ">
                                        <input name="xx" style="border:1px solid silver;  width:100%; text-align: right; font-size: 150%; " class="text-input" readonly="readonly" type="text" value="10000,00">
                                    </td>


                                </tr>

                                <tr>
                                    <td style="">
                                        BTW 21%
                                    </td>
                                    <td style="padding-top:0px; padding-bottom:0px; vertical-align: middle; float: right; border: 0px; ">
                                        <input name="xx" readonly="" style="border-left:1px solid silver;  border-right:1px solid silver; border-top:1px solid silver; border-bottom:0px; width:100%; text-align: right; " class="text-input" type="text" value="">
                                    </td>

                                </tr>

                                <tr>
                                    <td style="">
                                        Rest BPM indicatief
                                    </td>
                                    <td style="padding-top:0px; padding-bottom:0px; vertical-align: middle; float: right; border: 0px;">
                                        <input name="xx" style="border:1px solid silver;  width:100%; text-align: right;" class="text-input" readonly="" type="text" value="446,00">
                                    </td>

                                </tr>



                                <tr>
                                    <td style="">
                                        Leges
                                    </td>
                                    <td style="padding-top:0px; padding-bottom:0px; vertical-align: middle; float: right; border: 0px;">
                                        <input name="xx" style="border:0;  width:100%; text-align: right;" class="text-input" type="text" value="">
                                    </td>

                                </tr>



                                <tr>
                                    <td style="vertical-align: middle;">
                                        <b> Verkoopprijs in/in</b>
                                    </td>
                                    <td style="padding-top:0px; padding-bottom:0px; vertical-align: middle; float: right; border: 0px;">
                                        <input name="xx" style="border:1px solid silver;  width:100%; text-align: right; font-size: 150%; " class="text-input" readonly="readonly" type="text" value="10446,00">
                                    </td>

                                </tr>





                            </tbody>
                        </table>










                        <!-- hier komt de data in -->

                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 ">

                        <input name="inkoopgegevensID" type="hidden" value="6">

                        <table class="table table-bordered table-hover">
                            <tbody>
                                <tr>
                                    <th style="background-color: #f8f9fa; border-right: 0px;">Inkoopgegevens</th>
                                    <th style="background-color: #f8f9fa; border-left: 0px;">

                                    </th>
                                </tr>

                                <tr>
                                    <td>Leverancier</td>
                                    <td>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Contactpersoon</td>
                                    <td>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Tel direct</td>
                                    <td>
                                    </td>
                                </tr>

                                <tr>
                                    <td>E-mail</td>
                                    <td>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Telefoon</td>
                                    <td>

                                    </td>
                                </tr>
                                <tr>
                                    <td>Inkoopadres</td>
                                    <td>
                                        <textarea style="border:0;  width:100%; text-align: left; padding-left: 4px;" name="ccccc"></textarea>

                                    </td>
                                </tr>

                                <tr>
                                    <td>Advertentie link</td>
                                    <td>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Advertentie nummer</td>
                                    <td>
                                    </td>
                                </tr>

                                <tr>


                                    <th style="background-color: #f8f9fa; border-right: 0px;">Voorwaarden leverancier</th>
                                    <th style="background-color: #f8f9fa; border-left: 0px;">

                                    </th>
                                </tr>

                                <tr>
                                    <td>Levering Export</td>
                                    <td>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Kaution / aanbetaling</td>
                                    <td>
                                        0.00 </td>
                                </tr>
                                <tr>
                                    <td>Overige bepaling</td>
                                    <td>
                                        <textarea style="border:0;  width:100%; text-align: left; padding-left: 4px;" name="aadsas"></textarea>

                                    </td>
                                </tr>


                                <tr>
                                    <td>Leverbaar per</td>
                                    <td>
                                    </td>
                                </tr>

                                <tr>

                                    <th style="background-color: #f8f9fa; border-right: 0px;">Besproken met leverancier</th>
                                    <th style="background-color: #f8f9fa; border-left: 0px;">

                                    </th>
                                </tr>
                                <tr>
                                    <td>Reservering</td>
                                    <td>
                                    </td>
                                </tr>
                                <tr>
                                    <td>COC aanwezig</td>
                                    <td>



                                    </td>
                                </tr>
                                <tr>
                                    <td>Laatste beurt</td>
                                    <td>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Gerepareerde schade</td>
                                    <td>
                                        <textarea style="border:0;  width:100%; text-align: left; padding-left: 4px;" name="dsad"></textarea>

                                    </td>
                                </tr>
                                <tr>
                                    <td>Interieur netjes</td>
                                    <td>

                                    </td>
                                </tr>
                                <tr>
                                    <td>Velgen beschadigd</td>
                                    <td>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Opknapkosten</td>
                                    <td>

                                    </td>
                                </tr>
                                <tr>
                                    <td>Hoogte opknapkosten</td>
                                    <td>
                                        0.00
                                    </td>
                                </tr>

                                <tr>
                                    <td>Opmerking</td>
                                    <td>
                                        <textarea style="border:0;  width:100%; text-align: left; padding-left: 4px;" name="adasasd"></textarea>

                                    </td>
                                </tr>
                                <tr>
                                    <td>Extra wielset</td>
                                    <td>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Bandenprofiel</td>
                                    <td>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Zomerbanden gemonteerd</td>
                                    <td>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Aantal sleutels</td>
                                    <td>
                                    </td>
                                </tr>

                                <tr>
                                    <td>SD kaart</td>
                                    <td>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Boek inlc. onderhoud</td>
                                    <td>

                                    </td>
                                </tr>

                                <tr>
                                    <td>Laadkabels</td>
                                    <td>

                                    </td>
                                </tr>

                                <tr>
                                    <td>Ontbrekende delen</td>
                                    <td>
                                    </td>
                                </tr>



                            </tbody>
                        </table>


                    </div>



                    <!--            <hr />-->


                </div>

                <div id="five"></div>
                <br><br>
                <nav class="navbar navbar-light bg-light">
                    <b>WERKPLAATS</b>
                </nav><br>

                <div class="row">


                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 ">
                        <input type="hidden" name="maak_werkorderID" value="6">
                        <br><br><br><br><br><br><br><br><br>
                        <table class="table table-bordered table-hover">

                            <thead>
                                <tr>
                                    <th style="background-color: #f8f9fa; border-right: 0px;">Maak een werkorder </th>
                                    <th style="width: 50%; background-color: #f8f9fa; border-right: 0px;">

                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>WO nummer</td>
                                    <td style="width: 50%;">
                                        <input name="wo_nummer" value="" style="border:0;  width:100%; text-align: left; " class="text-input" type="text">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Naam</td>
                                    <td>
                                        <select style=" border:0; margin: 0; vertical-align: middle; width: 100%; background-color: #ffffff;" name="EmployeeIdWO">
                                            <option>
                                                Make a choice
                                            </option>
                                            <option value="1000072">M.W.H. Benink</option>
                                            <option value="1000073">T.C. Cruz Pinto</option>
                                            <option value="301005">R. Kroon</option>
                                            <option value="351001">A.A. Blommestein</option>
                                            <option value="351003">J.H.J. Verkleij</option>
                                            <option value="351006">D. Berg</option>
                                            <option value="351007">G. Ravenhorst</option>
                                            <option value="351014">F.J. Prie</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Datum</td>
                                    <td>
                                        <input name="wo_datum" value="" style="border:0;  width:100%; text-align: left; " class="text-input" type="date">

                                    </td>
                                </tr>

                                <tr>
                                    <td>RDW keuring datum</td>
                                    <td><input name="wo_rdw" value="" style="border: 0px; width: 100%;" type="date"></td>
                                </tr>
                                <tr>
                                    <td>RDW keuring tijd</td>
                                    <td><input name="wo_rdw_tijd" value="" style="border: 0px; width: 100%;" type="time"></td>
                                </tr>
                                <tr>
                                    <td>BPM</td>
                                    <td><input name="wo_bpm" value="" style="border: 0px; width: 100%;" type="date"></td>
                                </tr>
                                <tr>
                                    <td>Reconitioneren</td>
                                    <td><input name="wo_reconditoning" value="" style="border: 0px; width: 100%;" type="date"></td>
                                </tr>
                                <tr>
                                    <td>Werkzaamheden</td>
                                    <td>
                                        <textarea style="border:0;  width:100%; text-align: left; " name="wo_werkzaamheden"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Kies werk </td>
                                    <td>
                                        <select style=" border:0; margin: 0; vertical-align: middle; width: 100%; background-color: #ffffff;" name="wo_werk">
                                            <option>
                                                Make a choice
                                            </option>
                                            <option value="426">Spotrepair</option>
                                            <option value="427">Uitdeuken</option>
                                            <option value="428">Opnieuw spuiten</option>
                                            <option value="429">Hopeloos</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Poetsen</td>
                                    <td>
                                        <select style=" border:0; margin: 0; vertical-align: middle; width: 100%; background-color: #ffffff;" name="wo_poetsen">
                                            <option>
                                                Make a choice
                                            </option>
                                            <option value="424">No</option>
                                            <option value="425">Yes</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Wassen / zuigen</td>
                                    <td>
                                        <select style=" border:0; margin: 0; vertical-align: middle; width: 100%; background-color: #ffffff;" name="wo_wassenzuigen">
                                            <option>
                                                Make a choice
                                            </option>
                                            <option value="424">No</option>
                                            <option value="425">Yes</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Overige</td>
                                    <td>
                                        <textarea style="border:0;  width:100%; text-align: left; " name="wo_overige"></textarea>

                                    </td>
                                </tr>
                                <tr>
                                    <th style="background-color: #f8f9fa; border-right: 0px; vertical-align: middle;">Maak werkorder</th>
                                    <th style="background-color: #f8f9fa; border-left: 0px;">
                                        <input type="checkbox" id="vehicle1" name="maakwerkorder" value="1">
                                    </th>
                                </tr>



                            </tbody>
                        </table>






                        <table class="table table-bordered table-hover">
                            <input type="hidden" name="reclamatieID" value="">

                            <thead>
                                <tr>
                                    <th style="background-color: #f8f9fa; border-right: 0px;">Maak een reclamatie </th>
                                    <th style="width: 50%; background-color: #f8f9fa; border-right: 0px;">

                                    </th>

                                </tr>
                            </thead>
                            <tbody>


                                <tr>
                                    <td>Naam</td>
                                    <td style="width: 50%;">

                                        <input name="reclamatie_naam" value="" style="border:0;  width:100%; text-align: left; padding-left: 4px;" class="text-input" type="text">

                                    </td>
                                </tr>
                                <tr>
                                    <td>Voor</td>
                                    <td>
                                        <input name="reclamatie_voor" value="" style="border:0;  width:100%; text-align: left; padding-left: 4px;" class="text-input" type="text">

                                    </td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>
                                        <input name="reclamatie_email" value="" style="border:0;  width:100%; text-align: left; padding-left: 4px;" class="text-input" type="text">

                                    </td>
                                </tr>
                                <tr>
                                    <td>Onderwerp</td>
                                    <td>
                                        <input name="reclamatie_onderwerp" value="" style="border:0;  width:100%; text-align: left; padding-left: 4px;" class="text-input" type="text">

                                    </td>
                                </tr>

                                <tr>
                                    <td>Tekst</td>
                                    <td>
                                        <textarea style="border:0;  width:100%; text-align: left; padding-left: 4px;" name="reclamatie_tekst"></textarea>

                                    </td>
                                </tr>

                                <tr>
                                    <th style="background-color: #f8f9fa; border-right: 0px; vertical-align: middle;">Verstuur recalamatie</th>
                                    <th style="background-color: #f8f9fa; border-left: 0px;">
                                        <input type="checkbox" id="vehicle1" name="maak_reclamatie" value="1">

                                    </th>
                                </tr>



                            </tbody>
                        </table>


                        <br>
                        <div style="background-color: #f8f9fa; font-weight: 700;"> Reclamaties</div><br>





                        <!--            <hr />-->




                    </div>





                    <!--            <hr />-->


                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 ">
                        <iframe height="730px;" style="border: 0px; width: 100%;" src="../calendar/calendar.php"></iframe>
                    </div>
                </div>


                <!--                <div id="six"></div>-->
                <!--                <br /><br />-->
                <!--                <nav class="navbar navbar-light bg-light">-->
                <!--                    <b>BPM</b>-->
                <!--                </nav><br />-->

                <!--                <div class='row'>-->
                <!--                    <div class='col-xs-12 col-sm-12 col-md-12 col-lg-6 '>-->
                <!--                   -->
                <!--                </div>-->
                <!--                </div>-->



                <div id="seven"></div>
                <div id="chatbox"></div>
                <br><br>
                <nav class="navbar navbar-light bg-light">
                    <b>LOGISTIEK</b>
                </nav><br>

                <div class="row">




                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 ">
                        <br><br><br><br><br><br><br><br><br>
                        <input type="hidden" name="transport_opdrachtID" value="6">
                        <table class="table table-bordered table-hover">

                            <thead>
                                <tr>
                                    <th style="background-color: #f8f9fa; border-right: 0px;">Maak een transportorder </th>
                                    <th style="width: 50%; background-color: #f8f9fa; border-right: 0px;">
                                    </th>

                                </tr>
                            </thead>
                            <tbody>


                                <tr>
                                    <td>Transport opdrachtnummer</td>
                                    <td style="width: 50%;">
                                        <input name="to_nummer" value="" style="border:0;  width:100%; text-align: left; padding-left: 4px;" class="text-input" type="text">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Naam</td>
                                    <td>
                                        <select style=" border:0; margin: 0; vertical-align: middle; width: 100%; background-color: #ffffff;" name="EmployeeIdTansport">
                                            <option>
                                                Make a choice
                                            </option>
                                            <option value="1000072">M.W.H. Benink</option>
                                            <option value="1000073">T.C. Cruz Pinto</option>
                                            <option value="301005">R. Kroon</option>
                                            <option value="351001">A.A. Blommestein</option>
                                            <option value="351003">J.H.J. Verkleij</option>
                                            <option value="351006">D. Berg</option>
                                            <option value="351007">G. Ravenhorst</option>
                                            <option value="351014">F.J. Prie</option>
                                        </select>
                                        <!--                    <input name="to_naam" value="-->
                                        <!--" style='border:0;  width:100%; text-align: left; padding-left: 4px;' class="text-input" type="text" />-->
                                    </td>
                                </tr>
                                <tr>
                                    <td>Ophaaldatum</td>
                                    <td>
                                        <input name="to_ophaal_datum" value="" style="border:0;  width:100%; text-align: left; padding-left: 4px;" class="text-input" type="date">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Ophaaltijd</td>
                                    <td>
                                        <input name="to_ophaal_tijd" value="" style="border:0;  width:100%; text-align: left; padding-left: 4px;" class="text-input" type="time">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Van</td>
                                    <td>
                                        <input name="to_van" value="" style="border:0;  width:100%; text-align: left; padding-left: 4px;" class="text-input" type="text">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Ophaal straat</td>
                                    <td>
                                        <input name="to_ophaal_straat" value="" style="border:0;  width:100%; text-align: left; padding-left: 4px;" class="text-input" type="text">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Ophaal postcode</td>
                                    <td>
                                        <input name="to_ophaal_postcode" value="" style="border:0;  width:100%; text-align: left; padding-left: 4px;" class="text-input" type="text">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Ophaal plaats</td>
                                    <td>

                                        <input name="to_ophaal_plaats" value="" style="border:0;  width:100%; text-align: left; padding-left: 4px;" class="text-input" type="text">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Ophaal land</td>
                                    <td>

                                        <input name="to_ophaal_land" value="" style="border:0;  width:100%; text-align: left; padding-left: 4px;" class="text-input" type="text">
                                    </td>
                                </tr>

                                <tr>
                                    <td>Aan</td>
                                    <td>
                                        <input name="to_aan" value="" style="border:0;  width:100%; text-align: left; padding-left: 4px;" class="text-input" type="text">
                                    </td>
                                </tr>

                                <tr>
                                    <td>Aflever straat</td>
                                    <td>
                                        <input name="to_aflever_straat" value="" style="border:0;  width:100%; text-align: left; padding-left: 4px;" class="text-input" type="text">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Aflever postcode</td>
                                    <td>
                                        <input name="to_aflever_postcode" value="" style="border:0;  width:100%; text-align: left; padding-left: 4px;" class="text-input" type="text">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Aflever plaats</td>
                                    <td>
                                        <input name="to_aflever_plaats" value="" style="border:0;  width:100%; text-align: left; padding-left: 4px;" class="text-input" type="text">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Aflever land</td>
                                    <td>
                                        <input name="to_aflever_land" value="" style="border:0;  width:100%; text-align: left; padding-left: 4px;" class="text-input" type="text">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Contact naam</td>
                                    <td>
                                        <input name="to_contact" value="" style="border:0;  width:100%; text-align: left; padding-left: 4px;" class="text-input" type="text">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>
                                        <input name="to_contact_email" value="" style="border:0;  width:100%; text-align: left; padding-left: 4px;" class="text-input" type="text">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Telefoon</td>
                                    <td>
                                        <input name="to_contact_tel" value="" style="border:0;  width:100%; text-align: left; padding-left: 4px;" class="text-input" type="text">
                                    </td>
                                </tr>


                                <tr>
                                    <th style="background-color: #f8f9fa; border-right: 0px; vertical-align: middle;">Plan in</th>
                                    <th style="background-color: #f8f9fa; border-left: 0px;">
                                        <input type="checkbox" id="vehicle1" name="maaktransportopdracht" value="1">
                                    </th>
                                </tr>




                            </tbody>
                        </table>



                        <!--                -->

                    </div>





                    <!--            <hr />-->


                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 " style="margin-bottom: 20px;">
                        <iframe height="730px;" style="border: 0px; width: 100%;" src="../calendar/calendar.php"></iframe>


                    </div>



                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12  ">

                        <table class="table table-bordered table-hover hidden-xs hidden-sm hidden-md">



                            <thead>
                                <tr>
                                    <th>Log datum</th>
                                    <th>Soort</th>
                                    <th>Naam</th>
                                    <th>Van</th>
                                    <th>Ophaaladres</th>
                                    <th>Naar</th>
                                    <th>Afleveradres</th>
                                    <th>Afleverdatum</th>
                                    <th>Contact</th>
                                    <th>Details</th>
                                </tr>
                            </thead>
                            <tbody>



                            </tbody>
                        </table>


                    </div>





                    <!--            <hr />-->


                </div>

                <!--                -->
                <div style="position: fixed; top: 1%; left: 15.3%; z-index: 14900;" class="d-none d-sm-block d-sm-none d-md-block d-md-none d-lg-block"><button class="btn btn-sm btn-warning" name="updaters_dossier" value="0" id="updaters_dossier">Sla alle data op </button></div>
                <div style=" position: fixed; top: 1%; left: 23%; z-index: 14900;" class="d-none d-sm-block d-sm-none d-md-block d-md-none d-lg-block"><a href="#one" class="btn btn-sm btn-default"> Basis gegevens</a></div>
                <div style=" position: fixed; top: 1%; left: 30.9%; z-index: 14900;" class="d-none d-sm-block d-sm-none d-md-block d-md-none d-lg-block"><a href="#two" class="btn btn-sm btn-default"> Aanbieding details</a></div>
                <div style=" position: fixed; top: 1%; left: 39.9%; z-index: 14900;" class="d-none d-sm-block d-sm-none d-md-block d-md-none d-lg-block"><a href="#three" class="btn btn-sm btn-default"> Verkopen</a></div>
                <div style=" position: fixed; top: 1%; left: 45.6%; z-index: 14900;" class="d-none d-sm-block d-sm-none d-md-block d-md-none d-lg-block"><a href="#eight" class="btn btn-sm btn-default"> Facturatie</a></div>
                <div style=" position: fixed; top: 1%; left: 51.5%; z-index: 14900;" class="d-none d-sm-block d-sm-none d-md-block d-md-none d-lg-block"><a href="#four" class="btn btn-sm btn-default"> Inkoop</a></div>
                <div style=" position: fixed; top: 1%; left: 56.1%; z-index: 14900;" class="d-none d-sm-block d-sm-none d-md-block d-md-none d-lg-block"><a href="#five" class="btn btn-sm btn-default"> Werkplaats</a></div>
                <!--    <div style=' position: fixed; top: 1%; left: 66.6%; z-index: 14900;' class='d-none d-sm-block d-sm-none d-md-block d-md-none d-lg-block'><a href="#six" class="btn btn-sm btn-default"> BPM & RDW gegevens</a></div>-->
                <div style=" position: fixed; top: 1%; left: 62.1%; z-index: 14900;" class="d-none d-sm-block d-sm-none d-md-block d-md-none d-lg-block"><a href="#seven" class="btn btn-sm btn-default">Logistiek</a></div>

                <div style=" position: fixed; top: 1%; left: 77.5%; z-index: 14900;" class="d-none d-sm-block d-sm-none d-md-block d-md-none d-lg-block"><a href="../data/library/afas_invoice/CreateInvoice.php" class="btn btn-sm btn-default"> Maak factuur</a></div>


                <!--                <button>Update</button>-->

            </div> <!-- start accordion -->


        </form>


        <!-- END #page-container -->


        <!--    --><?php //include_once(WEB_ROOT_DATA."library/modals/taskmodal.php"); 
                    ?>

        <?php //include_once(WEB_ROOT_DATA . 'library/cssfunctions/JSBase_double.php'); 
        ?>
        <?php //include_once(WEB_ROOT_DATA . 'library/cssfunctions/JSTable.php'); 
        ?>


        <!-- ================== BEGIN PAGE LEVEL JS ================== -->
        <!--    <script src="--><?php //echo WEB_ROOT_DATA 
                                ?>
        <!--assets/plugins/chart/chart-js/Chart.min.js"></script>-->
        <!--    <script src="--><?php //echo WEB_ROOT_DATA 
                                ?>
        <!--assets/js/page/dashboard.demo.min.js"></script>-->
        <script src="<?php echo WEB_ROOT_DATA ?>assets/plugins/calendar/fullcalendar/lib/moment.min.js"></script>
        <script src="<?php echo WEB_ROOT_DATA ?>assets/plugins/calendar/fullcalendar/fullcalendar.min.js"></script>
        <script src="<?php echo WEB_ROOT_DATA ?>assets/plugins/calendar/fullcalendar/locale-all.js"></script>
        <script src="<?php echo WEB_ROOT_DATA ?>assets/js/page/calendar.demo.js"></script>
        <script src="<?php echo WEB_ROOT_DATA ?>assets/js/apps.min.js"></script>
        <!-- ================== END PAGE LEVEL JS ================== -->





        <script src="../data/assets/js/chosen.jquery.min.js"></script>
        <script type="text/javascript">
            jQuery(function($) {
                $('.chosen-select').chosen({
                    allow_single_deselect: true
                });
                $(window)
                    .off('resize.chosen')
                    .on('resize.chosen', function() {
                        $('.chosen-select').each(function() {
                            var $this = $(this);
                            $this.next().css({
                                'width': $this.parent().width()
                            });
                        })
                    }).trigger('resize.chosen');
            });
        </script>

        <script>
            $(document).ready(function() {
                App.init();
                Calendar.init();

            });
        </script>


</body>



<?php include 'include/footer.php'; ?>