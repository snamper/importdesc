<div class="content">
    <div class="form-auto">
        <div class="col-xs-12 table-list">
            <form action="calculation" method="POST" class="listing__form">
                <div class="dashboardPageTitle text-center">
                    <h2 style="opacity: 0;">Placeholder</h2>
                </div>
                <div class="dashboardBoxBg mb30">
                    <div class="row">
                        <div class="table-list body1" style="width: 100%;">
                            <input name="merkA" type="hidden" value="<!-- <?php echo $quotation['price_merk']; ?> -->" />
                            <input name="modelA" type="hidden" value="<!-- <?php echo $quotation['price_model']; ?> -->" />

                            <input type="hidden" name="add_calculation">
                            <div class="row str justify-content-end" style="padding-bottom: 23px; margin-top: -18px;">
                                <div class="col-sm-4" style="position: fixed; top: 0; z-index: 99999999; left: 0; right: 200; width: 200px; margin: auto; top: 5px;">
                                    <button type="submit" class="btn btn-primary" style="width: 100%">Insert</button>
                                </div>
                                <div class="col-sm-4" style="position: fixed; top: 0; z-index: 99999999; left: 200; right: 0; width: 200px; margin: auto; top: 5px;">
                                    <button type="submit" class="btn btn-primary" style="width: 100%; background-color: orange; border: 1px solid orange;">Button</button>
                                </div>
                            </div>

                            <div class="row str">
                                <div class="col-sm-12">
                                    <h4>Calculation</h4>
                                </div>
                            </div>

                            <div class="row str">
                                <div class="col-sm-2">
                                    BTW / Marge
                                </div>
                                <div class="col-sm-4 switcher" style="padding-bottom: 5px;">
                                    <input type="checkbox" name="switchPrice" id="switchPrice" checked />
                                    <label for="switchPrice"></label>
                                </div>
                               <!-- <div class="col-sm-2">
                                    Toon alle regels op offerte
                                </div>
                                <div class="col-sm-4">
                                    <input type="checkbox" class="form-check-input" onClick="toggle(this)" style="margin-left: 0;" />
                                </div>-->
                            </div>
                            <div class="row str">
                                <div class="col-sm-2">
                                    Inkoopprijs ex/ex
                                </div>
                                <div class="col-sm-3">
                                    <input type="number" class="form-control" id="inkoopprijs_ex_ex" name="inkoopprijs_ex_ex" placeholder="Inkoopprijs ex/ex">
                                </div>
                                <!--<div class="col-sm-1 ">
                                    <input type="checkbox" name="display_inkoopprijs_ex_ex" value="1" value="Inkoopprijs_Marge" id="checkInkoopprijs_Marge" class="foo">
                                </div>-->

                                <!--<div class="col-sm-1">
                                    <input type="checkbox" value="Afleverkosten" name="display_delivery_costs" value="1" id="checkAfleverkostene" class="foo">
                                </div>-->
                            </div>

                            <div class="row str">
                                <div class=" col-sm-2">
                                    Fee leverancier/bemiddelaar
                                </div>
                                <div class="col-sm-3">
                                    <input type="number" class="form-control" id="feeleverancier" name="feeleverancier" placeholder="Fee leverancier/bemiddelaar">
                                </div>
                                <!--<div class="col-sm-1">
                                    <input type="checkbox" name="foo" value="1" name="display_opknapkosten_ex" id="checkOpknapkosten" class="foo">
                                </div>-->
                            </div>
                             <br/>
                            <div class="row str">
                                <div class="col-sm-2">
                                    Inkoopprijs totaal
                                </div>
                                <div class="col-sm-3">
                                    <input type="number" class="form-control" id="inkoopprijstotaal" name="inkoopprijstotaal" placeholder="Inkoopprijs totaal">
                                </div>
                                <!--<div class="col-sm-1">
                                    <input type="checkbox" name="foo" value="1" name="display_opknapkosten_ex" id="checkOpknapkosten" class="foo">
                                </div>-->
                            </div>
                            <br/>
                            <div class="row str">
                               <div class="col-sm-2">
                                    Opknapkosten
                                </div>
                                <div class="col-sm-3">
                                    <input type="number" class="form-control" id="opknapkosten" name="opknapkosten" placeholder="Opknapkosten">
                                </div>
                                <!--<div class="col-sm-1">
                                    <input type="checkbox" name="foo" value="1" name="display_opknapkosten_ex" id="checkOpknapkosten" class="foo">
                                </div>-->
                            </div>

                            <div class="row str">
                                <div class="col-sm-2">
                                    Transport buitenland
                                </div>
                                <div class="col-sm-3">
                                    <input type="number" class="form-control" id="transport_buitenland" name="transport_buitenland" placeholder="Transport buitenland">
                                </div>
                                <!--<div class="col-sm-1">
                                    <input type="checkbox" name="display_transport_buitenland" value="1" id="checkTransport_Buitenland" class="foo">
                                </div>-->

                                <!--<div class="col-sm-1">
                                    <input type="checkbox" name="display_transport_binnenland" value="1" id="display_transport_binnenland" class="foo">
                                </div>-->
                            </div>

                            <div class="row str">
                                <div class="col-sm-2">
                                    Transport binnenland
                                </div>
                                <div class="col-sm-3">
                                    <input type="number" class="form-control" id="transport_binnenland" name="transport_binnenland" placeholder="Transport binnenland">
                                </div>
                                <!--<div class="col-sm-1">
                                    <input type="checkbox" name="display_transport_buitenland" value="1" id="checkTransport_Buitenland" class="foo">
                                </div>-->

                                <!--<div class="col-sm-1">
                                    <input type="checkbox" name="display_transport_binnenland" value="1" id="display_transport_binnenland" class="foo">
                                </div>-->
                            </div>



                            <div class="row str">
                                <div class="col-sm-2">
                                    Taxatie kosten
                                </div>
                                <div class="col-sm-3">
                                    <input type="number" class="form-control" id="taxatie_kosten" name="taxatie_kosten" placeholder="Taxatie kostene">
                                </div>
                                <!--<div class="col-sm-1">
                                    <input type="checkbox" name="display_taxatie_kosten" value="1" id="checkTaxatie_Kostene" class="foo">
                                </div>-->

                                <!--<div class="col-sm-1">
                                    <input type="checkbox" name="display_taxatie_kosten1" value="1" id="checkKosten_Totaal" class="foo">
                                </div>-->
                            </div>

                            <br/>
                            <div class="row str">
                                <div class="col-sm-2">
                                    Totaal kosten
                                </div>
                                <div class="col-sm-3">
                                    <input type="number" class="form-control" id="totaalkosten" name="totaalkosten" placeholder="Totaal kosten">
                                </div>
                                <!--<div class="col-sm-1">
                                    <input type="checkbox" name="display_taxatie_kosten" value="1" id="checkTaxatie_Kostene" class="foo">
                                </div>-->

                                <!--<div class="col-sm-1">
                                    <input type="checkbox" name="display_taxatie_kosten1" value="1" id="checkKosten_Totaal" class="foo">
                                </div>-->
                            </div>
                                <br/>



                            <div class="row str">
                                <div class="col-sm-2">
                                    Fee GWI
                                </div>
                                <div class="col-sm-3">
                                    <input type="number" class="form-control" id="fee" name="fee" placeholder="Fee GWI">
                                </div>
                                <!--<div class="col-sm-1">
                                    <input type="checkbox" name="display_fee" value="1" id="checkFee" class="foo">
                                </div>-->

                                <!--<div class="col-sm-1">
                                    <input type="checkbox" name="display_verkoopprijs_netto" value="1" id="checkVerkoopprijs_Marge_Excl" class="foo">
                                </div>-->
                            </div>
                            <br/>

                             <div class="row str">
                                <div class="col-sm-2">
                                    Verkoopprijs ex/ex
                                </div>
                                <div class="col-sm-3">
                                    <input type="number" class="form-control" id="verkoopprijs_ex" name="verkoopprijs_ex" placeholder="Verkoopprijs ex/ex">
                                </div>
                                <!--<div class="col-sm-1">
                                    <input type="checkbox" name="display_fee" value="1" id="checkFee" class="foo">
                                </div>-->

                                <!--<div class="col-sm-1">
                                    <input type="checkbox" name="display_verkoopprijs_netto" value="1" id="checkVerkoopprijs_Marge_Excl" class="foo">
                                </div>-->
                            </div>

                            <div class=" row str">
                                <div class=" col-sm-2">
                                    BTW 21%
                                </div>
                                <div class="col-sm-3">
                                    <input type="number" class="form-control" id="btw" name="btw" placeholder="BTW 21%">
                                </div>
                                <!--<div class="col-sm-1">
                                    <input type="checkbox" name="display_btw" value="1" id="BTW_21" class="foo">
                                </div>-->

                            </div>

                            <div class=" row str">
                                <div class="col-sm-2">
                                    Verkoopprijs incl. BTW
                                </div>
                                <div class="col-sm-3">
                                    <input type="number" class="form-control" id="verkoopprijsbtw" name="verkoopprijsbtw" placeholder="Verkoopprijs incl. BTW">
                                </div>
                                <!--<div class="col-sm-1">
                                    <input type="checkbox" name="display_rest_bpm_indicatief" value="1" id="checkRest_BPM" class="foo">
                                </div>-->

                            </div>
                            <br/>




                            <div class="row str">
                                <div class="col-sm-2">
                                    Rest BPM (indicatief)
                                </div>
                                <div class="col-sm-3">
                                    <input type="number" class="form-control" id="restbpm" name="restbpm" placeholder="Rest BPM">
                                </div>
                                <!--<div class="col-sm-1">
                                    <input type="checkbox" name="display_leges" value="1" id="checkLeges" class="foo">
                                </div>-->
                            </div>

                            <div class="row str">
                                <div class="col-sm-2">
                                    Leges (BTW vrij)
                                </div>
                                <div class="col-sm-3">
                                    <input type="number" class="form-control" id="leges" name="leges" placeholder="Leges">
                                </div>
                                <!--<div class="col-sm-1">
                                    <input type="checkbox" name="display_leges" value="1" id="checkLeges" class="foo">
                                </div>-->
                            </div>

                            <div class="row str">
                                <div class="col-sm-2">
                                    Verkoopprijs in/in
                                </div>
                                <div class="col-sm-3">
                                    <input type="number" class="form-control" id="verkoopprijsin" name="verkoopprijsin" placeholder="Verkoopprijs in/in">
                                </div>
                                <!--<div class="col-sm-1">
                                    <input type="checkbox" name="display_leges" value="1" id="checkLeges" class="foo">
                                </div>-->
                            </div>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

