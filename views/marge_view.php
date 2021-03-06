<div class="content">
    <div class="form-auto">
        <div class="col-xs-12 table-list">
            <form action="marge" method="POST" class="listing__form">
                <div class="dashboardPageTitle text-center">
                    <h2 style="opacity: 0;">Placeholder</h2>
                </div>
                <div class="dashboardBoxBg mb30">
                    <div class="row">
                        <div class="table-list body1" style="width: 100%;">
                            <input name="merkA" type="hidden" value="<!-- <?php echo $quotation['price_merk']; ?> -->" />
                            <input name="modelA" type="hidden" value="<!-- <?php echo $quotation['price_model']; ?> -->" />

                            <input type="hidden" name="merge_insert">
                            <div class="row str justify-content-end" style="padding-bottom: 23px; margin-top: -18px;">
                                <div class="col-sm-4" style="position: fixed; top: 0; z-index: 99999999; left: 0; right: 200; width: 200px; margin: auto; top: 5px;">
                                    <button type="submit" class="btn btn-primary" style="width: 100%">Insert</button>
                                </div>
                            </div>

                            <div class="row str">
                                <div class="col-sm-12">
                                    <h4>Auto en BPM</h4>
                                </div>
                            </div>

                            <div class="row str">
                                <div class="col-sm-2">
                                    Purchase / Sale Price
                                </div>
                                <div class="col-sm-4 switcher" style="padding-bottom: 5px;">
                                    <input type="checkbox" name="switchPrice" id="switchPrice" checked />
                                    <label for="switchPrice"></label>
                                </div>
                                <div class="col-sm-2">
                                    Toon alle regels op offerte
                                </div>
                                <div class="col-sm-4">
                                    <input type="checkbox" class="form-check-input" onClick="toggle(this)" style="margin-left: 0;" />
                                </div>
                            </div>

                            <div class=" row str">
                                <div class="col-sm-2">Vehicle type</div>
                                <div class="col-sm-4">
                                    <select class="form-control" name="carType" id="carType">
                                        <option value="">-</option>
                                        <?php echo $_SESSION['carType'] ?>
                                    </select>
                                </div>
                                <div class="col-sm-2">Make</div>
                                <div class="col-sm-4">
                                    <select class="form-control" name="car_make" id="carMake">
                                        <option value="">-</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row str">
                                <div class="col-sm-2">Model</div>
                                <div class="col-sm-4">
                                    <select class="form-control" name="carModel" id="carModel">
                                        <option value="">-</option>
                                    </select>
                                </div>
                                <div class="col-sm-2">Generation</div>
                                <div class="col-sm-4">
                                    <select class="form-control" name="carGeneration" id="carGeneration">
                                        <option value="">-</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row str">
                                <div class="col-sm-2">Serie</div>
                                <div class="col-sm-4">
                                    <select class="form-control" name="carSerie" id="carSerie">
                                        <option value="">-</option>
                                    </select>
                                </div>
                                <div class="col-sm-2">Trim</div>
                                <div class="col-sm-4">
                                    <select class=" form-control" name="car_motor" id="carMotor">
                                        <option value="">-</option>
                                    </select>
                                </div>
                            </div>


                            <div class="row str">
                                <div class="col-sm-2">Equipment</div>
                                <div class="col-sm-4">
                                    <select class="form-control" name="carEquipment" id="carEquipment">
                                        <option value="">-</option>
                                    </select>
                                </div>
                                <div class="col-sm-2">Soort Voertuig</div>
                                <div class="col-sm-4">
                                    <select name="SoortVoertuig" id="SoortVoertuig" class="form-control">
                                        <option value="0">Maak een keuze</option>
                                        <option value="1">Personenwagen (standaard)</option>
                                        <option value="2">Bedrijfswagen tot 3500KG</option>
                                        <option value="3">Camper</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row str">
                                <div class="col-sm-2">Brandstof soort</div>
                                <div class="col-sm-4">
                                    <select name="BPMbrandstof" id="BPMbrandstof" class="form-control">
                                        <option value="0"></option>
                                        <option value="1">Benzine</option>
                                        <option value="2">Diesel</option>
                                        <option value="3">PHEV Benzine</option>
                                        <option value="4">PHEV Diesel</option>
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    Eerste toelating
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" autocomplete="off" class="form-control" name="BPMproductiedatum" id="datepicker1">
                                </div>
                            </div>

                            <div class="row str">
                                <div class="col-sm-2">
                                    Huidige datum BPM
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" autocomplete="off" class="form-control" name="huidigedatumbpm" id="datepicker2">
                                </div>
                                <div class="col-sm-2">
                                    Tenaamstelling NL
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" autocomplete="off" class="form-control" name="BPMtenaamstellingNL" id="datepicker3">
                                </div>
                            </div>

                            <div class="row str">
                                <div class="col-sm-2">
                                    Referentie
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="referentie" name="referentie" placeholder="Referentie">
                                </div>
                                <div class="col-sm-2">Uitvoering</div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="car_uitvoering" id="carUitvoering">
                                </div>
                            </div>

                            <div class="row str">
                                <div class="col-sm-2">
                                    CO?? NEDC
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="BPMCO2" name="BPMCO2" placeholder="CO?? NEDC">
                                </div>
                                <div class="col-sm-2">
                                    CO?? WLTP
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="BPMCO2WLTP" name="BPMCO2WLTP" placeholder="CO?? WLTP">
                                </div>
                            </div>

                            <div class="row str">
                                <div class="col-sm-2" style="font-size: 13px">
                                    Restwaarde Percentage
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="percentage" name="percentage" placeholder="Restwaarde Percentage">
                                </div>
                            </div>

                            <div class="row str">
                                <div class="col-sm-2">
                                    Inkoopprijs Netto BTW
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="inkoopprijs_ex_ex" name="inkoopprijs_ex_ex" placeholder="Inkoopprijs Marge">
                                </div>
                                <div class="col-sm-1 ">
                                    <input type="checkbox" name="display_inkoopprijs_ex_ex" value="1" value="Inkoopprijs_Marge" id="checkInkoopprijs_Marge" class="foo">
                                </div>
                                <div class=" col-sm-2">
                                    Afleverkosten
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="addAfleverkosten" name="delivery_costs" placeholder="Afleverkosten">
                                </div>
                                <div class="col-sm-1">
                                    <input type="checkbox" value="Afleverkosten" name="display_delivery_costs" value="1" id="checkAfleverkostene" class="foo">
                                </div>
                            </div>

                            <div class="row str">
                                <div class="col-sm-2">
                                    Opknapkosten ex
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="addOpknapkosten" name="opknapkosten_ex" placeholder="Opknapkosten ex">
                                </div>
                                <div class="col-sm-1">
                                    <input type="checkbox" name="foo" value="1" name="display_opknapkosten_ex" id="checkOpknapkosten" class="foo">
                                </div>
                            </div>

                            <div class="row str">
                                <div class="col-sm-2">
                                    Transport Buitenland
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="addTransport_Buitenland" name="transport_buitenland" placeholder="Transport Buitenland">
                                </div>
                                <div class="col-sm-1">
                                    <input type="checkbox" name="display_transport_buitenland" value="1" id="checkTransport_Buitenland" class="foo">
                                </div>
                                <div class="col-sm-2">
                                    Transport Binnenland
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="addTransport_Binnenland" name="transport_binnenland" placeholder="Transport Binnenland">
                                </div>
                                <div class="col-sm-1">
                                    <input type="checkbox" name="display_transport_binnenland" value="1" id="display_transport_binnenland" class="foo">
                                </div>
                            </div>

                            <div class="row str">
                                <div class="col-sm-2">
                                    Taxatie Kosten
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="addTaxatie_Kostene" name="taxatie_kosten" placeholder="Taxatie Kostene">
                                </div>
                                <div class="col-sm-1">
                                    <input type="checkbox" name="display_taxatie_kosten" value="1" id="checkTaxatie_Kostene" class="foo">
                                </div>
                                <div class="col-sm-2">
                                    Kosten Totaal
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="addKosten_Totaal" name="taxatie_kosten1" placeholder="Kosten Totaal">
                                </div>
                                <div class="col-sm-1">
                                    <input type="checkbox" name="display_taxatie_kosten1" value="1" id="checkKosten_Totaal" class="foo">
                                </div>
                            </div>

                            <div class="row str">
                                <div class="col-sm-2">
                                    Fee
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="addFee" name="fee" placeholder="Fee">
                                </div>
                                <div class="col-sm-1">
                                    <input type="checkbox" name="display_fee" value="1" id="checkFee" class="foo">
                                </div>
                                <div class="col-sm-2">
                                    Verkoopprijs Netto
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="addVerkoopprijs_Marge_Excl" name="verkoopprijs_netto" placeholder="Verkoopprijs Marge excl. BPM">
                                </div>
                                <div class="col-sm-1">
                                    <input type="checkbox" name="display_verkoopprijs_netto" value="1" id="checkVerkoopprijs_Marge_Excl" class="foo">
                                </div>
                            </div>

                            <div class=" row str">
                                <div class=" col-sm-2">
                                    BTW 21%
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="addBTW_21no" name="btw" placeholder="BTW 21%">
                                </div>
                                <div class="col-sm-1">
                                    <input type="checkbox" name="display_btw" value="1" id="BTW_21" class="foo">
                                </div>
                                <div class="col-sm-2">
                                    Rest BPM Indicatief
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="addRest_BPM" name="gekozen_bpm_bedrag" placeholder="Rest BPM Indicatief">
                                </div>
                                <div class="col-sm-1">
                                    <input type="checkbox" name="display_rest_bpm_indicatief" value="1" id="checkRest_BPM" class="foo">
                                </div>
                            </div>

                            <div class="row str">
                                <div class="col-sm-2">
                                    Leges
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="addLeges" name="leges" placeholder="Leges">
                                </div>
                                <div class="col-sm-1">
                                    <input type="checkbox" name="display_leges" value="1" id="checkLeges" class="foo">
                                </div>
                                <div class="col-sm-2">
                                    Verkoopprijs Marge
                                    incl.
                                    BPM
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="addVerkoopprijs_Marge_incl" name="addVerkoopprijs_Marge_incl" placeholder="Verkoopprijs Marge incl. BPM">
                                </div>
                                <div class="col-sm-1">
                                    <input type="checkbox" name="foo" value="Verkoopprijs_Marge_incl" id="checkVerkoopprijs_Marge_incl" class="foo">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-2">
                                </div>
                                <div class="col-sm-4">
                                    <h4>Specifications:</h4>
                                    <div id="carCharValue" class="char-value-list">-</div>
                                </div>
                                <div class="col-sm-2">
                                </div>
                                <div class="col-sm-4">
                                    <h4>Options:</h4>
                                    <div id="carOptionValue" class="option-value-list">-</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function toggle(source) {
        checkboxes = document.getElementsByClassName('foo');
        for (var i = 0, n = checkboxes.length; i < n; i++) {
            checkboxes[i].checked = source.checked;
        }
    }
</script>