
<div class="content">
    <div class="form-auto">
        <div class="col-xs-12 table-list">
            <form method="POST" action="../data/library/bpm/BPMUpdate.php" class="listing__form">
                <div class="dashboardPageTitle text-center">
                    <h2 style="opacity: 0;">Placeholder</h2>
                </div>
                <div class="dashboardBoxBg mb30">
                    <div class="row">
                        <div class="table-list body1" style="width: 100%;">



                            <div class="form-group col-xs-12">
                                <h3>BPM Forfaitair Berekenen NEDC</h3>
                            </div>



                            <div class="row str">
                                <div class="col-sm-2">Soort Voertuig</div>
                                <div class="col-sm-4">
                                    <select name="SoortVoertuig" id="SoortVoertuig" class="form-control">
                                        <option value="0">Maak een keuze</option>
                                        <option <?php ?> value="1">Personenwagen (standaard)</option>
                                        <option <?php ?> value="2">Bedrijfswagen tot 3500KG</option>
                                        <option <?php ?> value="3">Camper</option>
                                    </select>
                                </div>

                            </div>

                            <div class="row str">
                                <div class="col-sm-2">Eerste Toelating</div>
                                <div class="col-sm-4">
                                    <input type="text" autocomplete="off" <?php ?> class="form-control" name="BPMproductiedatum" id="datepicker3">
                                </div>

                                <div class="col-sm-2">Tenaamstelling NL</div>
                                <div class="col-sm-4">
                                    <input type="text" autocomplete="off" <?php ?> value='<?php  ?>' <?php  ?> class="form-control" name="BPMtenaamstellingNL" id="datepicker4">
                                </div>
                            </div>




                            <div class="row str">
                                <div class="col-sm-2">Brandstof soort</div>
                                <div class="col-sm-4">
                                    <select name="BPMbrandstof" id="BPMbrandstof" class="form-control">
                                        <option value="0">Maak een keuze</option>
                                        <option <?php ?> value="1">Benzine</option>
                                        <option <?php ?> value="2">Diesel</option>
                                        <option <?php ?> value="3">PHEV Benzine</option>
                                        <option <?php ?> value="4">PHEV Diesel</option>
                                    </select>
                                </div>

                                <div class="col-sm-2">CO2 Gecombineerd</div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="BPMCO2" name="BPMCO2" value="<?php ?>" placeholder="CO2 Gecombineerd">
                                </div>
                            </div>

                            <div class="row str">
                                <div class="col-sm-2">Restwaarde Percentage
                                    (koerslijst)</div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="percentage" name="percentage" value="<?php  ?>" placeholder="Restwaarde Percentage">
                                </div>
                            </div>
                            <br>
                            <div class="row str">
                                <div class=" col-xs-12">
                                    <h3>Reguliere Berekening</h3>
                                </div>
                            </div>


                            <div class="row str">
                                <div class="col-sm-2">Bruto BPM</div>
                                <div class="col-sm-4">
                                  
                                        <input type="text" class="form-control" value="0" id="brutobpm" name="brutobpm" placeholder="Bruto BPM">
                                   
                                </div>
                            </div>

                            <div class="row str">
                                <div class="col-sm-2">
                                    REST BPM
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="forfaitaire" name="forfaitaire" value="<?php  ?>" placeholder="REST BPM - Huidige datum">
                                </div>

                            </div>

                            <div class="row str">
                                <div class="col-sm-2">
                                    Rest BPM koerslijst
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="PercentageBerekening" name="PercentageBerekening" value="<?php  ?>" placeholder="Rest_BPM_Koerslijst">
                                </div>

                            </div>

                        </div>






                    </div>

                </div>
            </form>
        </div>
    </div>


</div>