<div class="content">
    <div class="form-click-model">
        <div class="col-xs-12 table-list">
            <form action="calculation" method="POST" class="listing__form">
                <div class="dashboardPageTitle text-center">
                    <h2 style="opacity: 0;">Placeholder</h2>
                </div>
                <div class="dashboardBoxBg mb30">
                    <span class="ti-plus additional-options"></span>

                    <div class="custom-row">
                        <div class="custom-row-close">X</div>
                        <div class="custom-col">
                            <button type="submit" class="btn btn-danger">Delete all Data </button>
                        </div>

                        <div class="custom-col">
                            <button type="submit" class="btn btn-info">Save</button>
                        </div>

                        <div class="custom-col">
                            <button type="submit" class="btn btn-primary">Save and Close</button>
                        </div>

                        <div class="custom-col">
                            <button type="submit" class="btn btn-primary">Duplicate</button>
                        </div>

                        <div class="custom-col">
                            <button type="submit" class="btn btn-primary">Create and go to PO</button>
                        </div>

                    </div>

                    <div class="row my-4">
                        <div class="col-12 col-md-3">
                            <span class="upload-photo">Upload photo</span>
                        </div>
                        <div class="col-12 col-md-3">
                            <span class="upload-photo">Upload document</span>
                        </div>

                        <div class="col-12 col-md-3 ml-auto text-right">
                            <button type="submit" class="btn btn-primary">Create and open Offer</button>
                        </div>

                    </div>
                    <hr />
                    <div class="row">
                        <div class="col-12">
                            <span class="font-weight-bold">Basic Information</span>
                        </div>
                    </div>
                    <!-- Main row 1 -->
                    <div class="row justify-content-center align-items-start">
                        <!-- Left col  -->
                        <div class="col-12 col-md-5">
                            <!-- Rows  -->
                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <span>Current car status* </span>
                                </div>
                                <div class="col-12 col-md-8">
                                    <select class="form-control" name="na" id="">
                                        <option> Without first registration </option>
                                        <option> With first registration </option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <span>Car reference (custom)</span>
                                </div>
                                <div class="col-12 col-md-8">
                                    <input class="form-control" type="text" name="" value="" placeholder="Dikke Golf Joop" />
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <span>VIN</span>
                                </div>
                                <div class="col-12 col-md-8">
                                    <input class="form-control" type="text" name="" value="" placeholder="WAUZZZ1932" />
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <span>Komm. Number</span>
                                </div>
                                <div class="col-12 col-md-8">
                                    <input class="form-control" type="text" name="" value="" />
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <span>Link to Advert</span>
                                </div>
                                <div class="col-12 col-md-8">
                                    <input class="form-control" type="text" name="" value="" />
                                </div>
                            </div>
                            <!-- ./ ROWS  -->
                        </div>
                        <!-- ./ Left col  -->

                        <!-- Rigth col  -->
                        <div class="col-12 col-md-7">
                            <!-- Rows  -->
                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <span>Source Supplier </span>
                                </div>
                                <div class="col-12 col-md-6">
                                    <input class="form-control" type="text" name="" value="" placeholder="Feser Graf, Schwabach" />
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <span>Reference Number Supplier</span>
                                </div>
                                <div class="col-12 col-md-6">
                                    <input class="form-control" type="text" name="" value="" />
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <span>Current Registration</span>
                                </div>
                                <div class="col-12 col-md-6">
                                    <select class="form-control" name="na" id="">
                                        <option>German</option>
                                        <option>Dutch</option>
                                        <option>Polish</option>
                                        <option>Czech</option>
                                        <option>Spanish</option>
                                        <option>Slovakian</option>
                                        <option>Slovenian</option>
                                        <option>Belgian</option>
                                        <option>French</option>
                                        <option>Italian</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <span>COC</span>
                                </div>
                                <div class="col-12 col-md-6">
                                    <select class="form-control" name="na" id="">
                                        <option>Unknown</option>
                                        <option>Yes</option>
                                        <option>No</option>
                                        <option>Requested</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div> <!-- Rigth col -->
                </div>
                <!-- ./ Main row 1 -->
                <hr />
                <!-- Main row 2 -->
                <div class="row">
                    <div class="col-12">
                        <span class="font-weight-bold">Vehicle and Calculation</span>
                    </div>
                </div>
                <div class="row justify-content-center align-items-stretch">
                    <!-- Left col  -->
                    <div class="col-12 col-md-5">
                        <!-- Rows  -->
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <span>Vehicle Type* </span>
                            </div>
                            <div class="col-12 col-md-8">
                                <select name="SoortVoertuig" id="SoortVoertuig" class="form-control">
                                    <option value="0">-</option>
                                    <option value="1">Personal Car (standaard)</option>
                                    <option value="2">Company car up to 3500KG</option>
                                    <option value="3">Camper</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-4">
                                <span>Make* </span>
                            </div>
                            <div class="col-12 col-md-8">
                                <select class="form-control" name="car_make" id="carMake">
                                    <option value="">-</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <span>Model* </span>
                            </div>
                            <div class="col-12 col-md-8">
                                <div class="row">
                                    <div class="col-6 pr-0">
                                        <select class="form-control" name="carModel" id="carModel">
                                            <option value="">-</option>
                                        </select>
                                    </div>
                                    <div class="col-6 pl-0">
                                        <input class="form-control" type="text" placeholder="(text)">
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="row">
                            <div class="col-12 col-md-4">
                                <span>Variant</span>
                            </div>
                            <div class="col-12 col-md-8">
                                <div class="row">
                                    <div class="col-6 pr-0">
                                        <select class="form-control" name="car_make" id="carUitvoering">
                                            <option value="">-</option>
                                        </select>
                                    </div>

                                    <div class="col-6 pl-0">
                                        <input class="form-control" type="text" placeholder="(text)">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-4">
                                <span>Body Style</span>
                            </div>
                            <div class="col-12 col-md-8">
                                <select class="form-control" name="na" id="">
                                    <option>Hatchback</option>
                                    <option>Station</option>
                                    <option>Sedan</option>
                                    <option>SUV</option>
                                    <option>Van</option>
                                    <option>Cabrio</option>
                                    <option>Coupé</option>
                                </select>
                            </div>
                        </div>
                        <hr />

                        <div class="row">
                            <div class="col-12 col-md-4">
                                <span>Fuel Type* </span>
                            </div>
                            <div class="col-12 col-md-8">
                            <select class="form-control js-car-fuel" name="carFuel" id="BPMbrandstof">
                                        <option value="">-</option>
                                        <option value="1">Benzine</option>
                                        <option value="2">Diesel</option>
                                        <option value="3">Hybride</option>
                                        <option value="4">Electrisch</option>
                                        <option value="5">LPG</option>
                                        <option value="6">Aardgas</option>
                                        <option value="7">Alcohol</option>
                                        <option value="8">Cryogeen</option>
                                        <option value="9">Waterstof</option>
                                    </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-4">
                                <span>Engine* </span>
                            </div>
                            <div class="col-12 col-md-8">
                                <div class="row">
                                <div class="col-6 pr-0">
                                        <select class="form-control js-car-motor" name="car_motor" id="carMotor">
                                            <option value="">-</option>
                                        </select>
                                    </div>
                                    <div class="col-6 pl-0">
                                        <input class="form-control" type="text" name="" id="" placeholder="(text)">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <span>Transmission* </span>
                            </div>
                            <div class="col-12 col-md-8">
                                <div class="row">
                                    <div class="col-6 pr-0">
                                        <select class="form-control" name="na" id="">
                                            <option>Automatic</option>
                                            <option>Manual</option>
                                        </select>
                                    </div>
                                    <div class="col-6 pl-0">
                                        <input class="form-control" type="text" placeholder="(text)">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-4">
                                <span>Power</span>
                            </div>
                            <div class="col-12 col-md-8">
                                <div class="row">
                                    <div class="col-6 pr-0">
                                        <div class="text-center">kW / Pk</div>
                                        <input class="form-control" type="text" name="" id="" placeholder="110/150">
                                    </div>
                                    <div class="col-6 pl-0">
                                        <div class="text-center">Cubic Capacity</div>
                                        <input class="form-control" type="text" name="" id="" placeholder="2000">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-4">
                                <span>Drive</span>
                            </div>
                            <div class="col-12 col-md-8">
                                <select class="form-control" name="na" id="">
                                    <option>4 wd</option>
                                    <option>2 wd</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-4">
                                <span>CO²</span>
                            </div>
                            <div class="col-12 col-md-8">
                                <div class="row">
                                    <div class="col-6 pr-0">
                                        <div class="text-center">WLTP</div>
                                            <input type="text" class="form-control" id="BPMCO2WLTP" name="BPMCO2WLTP" placeholder="CO² WLTP">
                                    </div>
                                    <div class="col-6 pl-0">
                                        <div class="text-center">NEDC</div>
                                            <input type="text" class="form-control" id="BPMCO2" name="BPMCO2" placeholder="CO² NEDC">
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-12 col-md-4">
                                <span>Kilometers </span>
                            </div>
                            <div class="col-12 col-md-8">
                                <input class="form-control" type="text" name="" id="" placeholder="3000">
                            </div>
                        </div>

                        <hr />

                        <div class="row">
                            <div class="col-12 col-md-4">
                                <span>Colour | Colour name OEM </span>
                            </div>
                            <div class="col-12 col-md-8">
                                <div class="row">
                                    <div class="col-3">
                                        Metallic/ Pearl
                                    </div>
                                    <div class="col-6">
                                        <input type="checkbox" name="" id="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 pr-0">
                                        <select class="form-control" name="na" id="">
                                            <option>Black</option>
                                            <option>Silver</option>
                                            <option>Grey</option>
                                            <option>Yellow</option>
                                            <option>Orange</option>
                                            <option>Purple</option>
                                            <option>Pink</option>
                                            <option>Green</option>
                                        </select>
                                    </div>
                                    <div class="col-6 pl-0">
                                        <input class="form-control" type="text" name="" id="" placeholder="(text)">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-4">
                                <span>Interior color | Interior name OEM </span>
                            </div>
                            <div class="col-12 col-md-8">
                                <div class="row">
                                    <div class="col-6 pr-0">
                                        <select class="form-control" name="na" id="">
                                            <option>Beige</option>
                                            <option>Black</option>
                                            <option>Grey</option>
                                        </select>
                                    </div>
                                    <div class="col-6 pl-0">
                                        <input class="form-control" type="text" name="" id="" placeholder="Samtbeige">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-4">
                                <span>Interior material </span>
                            </div>
                            <div class="col-12 col-md-8">
                                <select class="form-control" name="na" id="">
                                    <option>Full Leather</option>
                                    <option>Leather / Fabric</option>
                                    <option>Leather</option>
                                    <option>Leather extended</option>
                                    <option>Full Leather extended Leatherpackage</option>
                                    <option>Fabric / Alcantara</option>
                                    <option>Alcantara</option>
                                    <option>Leather / Alcantara</option>
                                </select>
                            </div>
                        </div>


                        <!-- ./ ROWS  -->
                    </div>
                    <!-- ./ Left col  -->

                    <!-- Rigth col  -->
                    <div class="col-12 col-md-7 calculation-column">
                        <div class="container border border-light rounded">
                            <div class="form-auto">
                                <div class="col-xs-12 table-list">
                                    <form action="calculation" method="POST" class="listing__form">
                                        <div class="dashboardPageTitle text-center">
                                        </div>
                                        <div class="dashboardBoxBg mb30">
                                            <div class="row">
                                                <div class="table-list body1" style="width: 100%;">
                                                    <div class="row str">
                                                        <div class="col-sm-12 p-4">
                                                            <h4>Car and BPM</h4>
                                                        </div>
                                                    </div>

                                                    <div class="row str">
                                                        <div class="col-12 col-sm-2">
                                                            Purchase / Sale Price
                                                        </div>
                                                        <div class="col-sm-3 switcher" style="padding-bottom: 5px;">
                                                            <input type="checkbox" name="switchPrice" id="switchPrice" checked />
                                                            <label for="switchPrice"></label>
                                                        </div>
                                                        <div class="col-sm-1 ml-auto">
                                                            BTW/MARGE
                                                        </div>
                                                        <div class="col-sm-2 switcher" style="padding-bottom: 5px;">
                                                            <input type="checkbox" name="switchBTW" id="switchBTW" checked />
                                                            <label for="switchBTW"></label>
                                                        </div>
                                                    </div>

                                                    <!-- Current date  -->
                                                    <input type="hidden" autocomplete="off" class="form-control" name="huidigedatumbpm" id="datepicker2">

                                                    <div class="row str">
                                                        <div class="col-12 col-md-3">
                                                            Reference
                                                        </div>
                                                        <div class="col-12 col-md-3">
                                                            <input type="text" class="form-control" id="referentie" name="referentie" placeholder="Reference">
                                                        </div>
                                                        <div class="col-12 col-md-3">Performance</div>
                                                        <div class="col-12 col-md-3">
                                                            <input type="text" class="form-control" name="caUitvoering" id="carUitvoering">
                                                        </div>
                                                    </div>

                                                    <div class="row str">
                                                        <div class="col-12 col-md-3">
                                                            Residual Value Percentage
                                                        </div>
                                                        <div class="col-12 col-md-3">
                                                            <input type="text" class="form-control" id="percentage" name="percentage" placeholder="Residual Value Percentage">
                                                        </div>
                                                        <div class="col-12 col-md-3">
                                                            Purchase price Net VAT
                                                        </div>
                                                        <div class="col-12 col-md-3">
                                                            <input type="text" class="form-control" id="inkoopprijs_ex_ex" name="inkoopprijs_ex_ex" placeholder="Purchase price Net VAT">
                                                        </div>
                                                    </div>

                                                    <div class="row str">
                                                        <div class="col-12 col-md-3">
                                                            Delivery costs
                                                        </div>
                                                        <div class="col-12 col-md-3">
                                                            <input type="text" class="form-control" id="addAfleverkosten" name="delivery_costs" placeholder="Delivery costs">
                                                        </div>

                                                        <div class="col-12 col-md-3">
                                                            Refurbishment costs ex
                                                        </div>
                                                        <div class="col-12 col-md-3">
                                                            <input type="text" class="form-control" id="addOpknapkosten" name="opknapkosten_ex" placeholder="Refurbishment costs ex">
                                                        </div>

                                                    </div>

                                                    <div class="row str">
                                                        <div class="col-12 col-md-3">
                                                            Domestic transport
                                                        </div>
                                                        <div class="col-12 col-md-3">
                                                            <input type="text" class="form-control" id="addTransport_Binnenland" name="transport_binnenland" placeholder="Domestic transport">
                                                        </div>
                                                        <div class="col-12 col-md-3">
                                                            Transport abroad
                                                        </div>
                                                        <div class="col-12 col-md-3">
                                                            <input type="text" class="form-control" id="addTransport_Buitenland" name="transport_buitenland" placeholder="Transport abroad">
                                                        </div>
                                                    </div>

                                                    <div class="row str">
                                                        <div class="col-12 col-md-3">
                                                            Cost Total
                                                        </div>
                                                        <div class="col-12 col-md-3">
                                                            <input type="text" class="form-control" id="addKosten_Totaal" name="taxatie_kosten1" placeholder="Cost Total">
                                                        </div>
                                                        <div class="col-12 col-md-3">
                                                            Valuation Costs
                                                        </div>
                                                        <div class="col-12 col-md-3">
                                                            <input type="text" class="form-control" id="addTaxatie_Kostene" name="taxatie_kosten" placeholder="Valuation Costs">
                                                        </div>
                                                    </div>

                                                    <div class="row str">
                                                        <div class="col-12 col-md-3">
                                                            Sales price Net
                                                        </div>
                                                        <div class="col-12 col-md-3">
                                                            <input type="text" class="form-control" id="addVerkoopprijs_Marge_Excl" name="verkoopprijs_netto" placeholder="Sales price Net">
                                                        </div>

                                                        <div class="col-12 col-md-3">
                                                            Fee
                                                        </div>
                                                        <div class="col-12 col-md-3">
                                                            <input type="text" class="form-control" id="addFee" name="fee" placeholder="Fee">
                                                        </div>

                                                        <div class="col-12 col-md-3">
                                                            Rest BPM Indicative
                                                        </div>
                                                        <div class="col-12 col-md-3">
                                                            <input type="text" class="form-control" id="addRest_BPM" name="gekozen_bpm_bedrag" placeholder="Rest BPM Indicative">
                                                        </div>

                                                    </div>

                                                    <div class="row str">
                                                        <div class="col-12 col-md-3">
                                                            VAT 21%
                                                        </div>
                                                        <div class="col-12 col-md-3">
                                                            <input type="text" class="form-control" id="addBTW_21no" name="btw" placeholder="VAT 21%">
                                                        </div>

                                                        <div class="col-12 col-md-3">
                                                            Sales price Margin
                                                            incl.
                                                            BPM
                                                        </div>
                                                        <div class="col-12 col-md-3">
                                                            <input type="text" class="form-control" id="addVerkoopprijs_Marge_incl" name="addVerkoopprijs_Marge_incl" placeholder="Sales price Margin incl. BPM">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div> <!-- Rigth col -->
                </div>
        </div>
        <!-- ./ Main row 2 -->
        <hr />

        <!-- Main row 3 -->
        <div class="row">
            <div class="col-6 col-sm-2 text-left">
                <img src="https://cdn4.focus.bg/fakti/photos/big/360/volkswagen-golf-8-testvahme-go-parvi-1.jpg" width="125" height="110">
            </div>

            <div class="col-6 col-sm-2 text-left">
                <img src="https://cdn4.focus.bg/fakti/photos/original/360/volkswagen-golf-8-testvahme-go-parvi-3.jpg" width="125" height="110">
            </div>

            <div class="col-6 col-sm-2 text-left">
                <img src="https://api.hvg.hu/Img/4B5CE600-76FE-4FA2-AC62-7B04F6640281/41641772-157a-4eed-9207-45c83439aa32.jpg" width="125" height="110">
            </div>

            <div class="col-6 col-sm-2 text-left">
                <img src="https://bi.im-g.pl/im/7c/2b/18/z25344636AMP,Volkswagen-Golf-8.jpg" width="125" height="110">
            </div>

            <div class="col-6 col-sm-2 text-left">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSvHVq0KjRdi2svM0h2qwSF8krZuafToiR-xA&usqp=CAU" width="125" height="110">
            </div>

            <div class="col-6 col-sm-2 text-left">
                <img src="https://www.autocar.co.uk/sites/autocar.co.uk/files/images/car-reviews/first-drives/legacy/96-vw-golf-mk8-rear-end.jpg    " width="125" height="110">
            </div>

        </div><!-- ./ ROW  -->

        <!-- ./ Main row 3 -->

        <hr />
        <!-- ERI  -->

        <div class="row justify-content-center align-items-start">
            <!-- Left col  -->
            <div class="col-12 col-md-5">
                <!-- Rows  -->
                <div class="row">
                    <div class="col-12 col-md-4">
                        <span> First registration ever (date)</span>
                    </div>
                    <div class="col-12 col-md-8">
                        <input type="text" autocomplete="off" class="form-control" name="BPMproductiedatum" id="datepicker1">
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-4">
                        <span>First registration in the Netherlands (date)</span>
                    </div>
                    <div class="col-12 col-md-8">
                    <input type="text" autocomplete="off" class="form-control" name="BPMtenaamstellingNL" id="datepicker3">
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-4">
                        <span>First registration on a name in the Netherlands (date)</span>
                    </div>
                    <div class="col-12 col-md-8">
                        <input class="form-control" type="text" name="" value="" placeholder="25.5.2021" />
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-4">
                        <span>Last registration on a name (date)</span>
                    </div>
                    <div class="col-12 col-md-8">
                        <input class="form-control" type="text" name="" value="" placeholder="25.5.2021" />
                    </div>
                </div>
                <!-- ./ ROWS  -->
            </div>
            <!-- ./ Left col  -->

            <!-- Rigth col  -->
            <div class="col-12 col-md-7">
                <!-- Rows  -->
                <div class="row">
                    <!--<div class="col-12 col-md-4">
                                    <span>Source Supplier </span>
                                </div>
                                <div class="col-12 col-md-6">
                                    <input class="form-control" type="text" name="" value="" placeholder="Feser Graf, Schwabach" />
                                </div>-->
                </div>

                <div class="row">
                    <div class="col-12 col-md-4">
                        <span>NL Registration number</span>
                    </div>
                    <div class="col-12 col-md-6">
                        <input class="form-control" type="text" name="" value="" placeholder="KN-494-T" />
                    </div>
                </div>


                <div class="row my-1">
                    <div class="col-12 col-md-4">
                        <span>Check code (meldcode)</span>
                    </div>
                    <div class="col-12 col-md-6">
                        <span> 1932 </span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-4">
                        <span>APK / Check valid until</span>
                    </div>
                    <div class="col-12 col-md-6">
                        <input class="form-control" type="text" name="" value="" placeholder="25.5.2021" />
                    </div>
                </div>
            </div>
        </div> <!-- Rigth col -->
        <!-- ./ ROW  -->
        <!-- .ROW  -->
        <br />
        <hr />
        <p>Factory Options / Highlights</p>
        <div class="row">
            <div class="col-12 col-md-5">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <label for="">Navigation</label>
                        <select name="keyless" id="keyless" class="form-control">
                            <option value="0">-</option>
                            <option value="0">Keyless Entry + Go</option>
                            <option value="1">Keyless Go</option>
                            <option value="2">Keyless Entry</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="">Keyless entry</label>
                        <select name="keyless" id="keyless" class="form-control">
                            <option value="0">-</option>
                            <option value="0">Keyless Entry + Go</option>
                            <option value="1">Keyless Go</option>
                            <option value="2">Keyless Entry</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-6">
                        <label for="">App Connect</label>
                        <select name="keyless" id="keyless" class="form-control">
                            <option value="0">-</option>
                            <option value="0">Connect 1</option>
                            <option value="1">Connect 2 </option>
                            <option value="2">Connect 3</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="">Airco</label>
                        <select name="airco" id="airco" class="form-control">
                            <option value="0">-</option>
                            <option value="0">Airco Automatic</option>
                            <option value="1">Airco Automatic 2 zone</option>
                            <option value="2">Airco Automatic 3 zone</option>
                            <option value="3">Airco Automatic 4 zone</option>
                            <option value="4">Airco Manual</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-6">
                        <label for="roof">Panorama</label>
                        <select name="roof" id="roof" class="form-control">
                            <option value="0">-</option>
                            <option value="0">Panorama sliding roof</option>
                            <option value="1">Panorama roof</option>
                            <option value="2">Steel sliding roof</option>
                            <option value="3">Glass sliding roof</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="wheels">Alloy Wheels</label>
                        <select name="wheels" id="wheels" class="form-control">
                            <option value="0">-</option>
                            <option value="0">Alloy wheels 16 inch</option>
                            <option value="1">Alloy wheels 17 inch</option>
                            <option value="2">Alloy wheels 18 inch</option>
                            <option value="3">Alloy wheels 19 inch</option>
                            <option value="4">Alloy wheels 20 inch</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-6">
                        <label for="headlights">Headlights</label>
                        <select name="headlights" id="headlights" class="form-control">
                            <option value="0">-</option>
                            <option value="0">Headlights LED</option>
                            <option value="1">Headlights Matrix LED</option>
                            <option value="2">Headlights Adaptive LED</option>
                            <option value="3">Headlights Xenon</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="pdc">PDC</label>
                        <select name="pdc" id="pdc" class="form-control">
                            <option value="0">-</option>
                            <option value="0">PDC Front</option>
                            <option value="1">PDC Front and Back</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-6">
                        <label for="">Digital Cockpit</label>
                        <select name="cockpit" id="cockpit" class="form-control">
                            <option value="0">-</option>
                            <option value="0">Digital Cockpit Pro</option>
                            <option value="1">Digital Cockpit</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="camera">Camera</label>
                        <select name="camera" id="camera" class="form-control">
                            <option value="0">-</option>
                            <option value="0">Camera Front</option>
                            <option value="1">360 degrees camera</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-6">
                        <label for="cruise">Cruise Control</label>
                        <select name="cruise" id="cruise" class="form-control">
                            <option value="0">-</option>
                            <option value="0">Adaptive cruise control</option>
                            <option value="1">Cruise control</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="tow">Tow Bar</label>
                        <select name="tow" id="tow" class="form-control">
                            <option value="0">-</option>
                            <option value="0">Tow bar fixed</option>
                            <option value="1">Tow bar detachable</option>
                            <option value="2">Tow bar manually collapsible</option>
                            <option value="3">Tow bar electrically collapsible</option>
                        </select>
                    </div>
                </div>

            </div> <!-- ./ .col-5  -->

            <div class="col-12 col-md-7">

                <div class="row">
                    <div class="col-12 col-md-6">
                        <label for="">Sport seats</label>
                        <select name="keyless" id="keyless" class="form-control">
                            <option value="0">-</option>
                            <option value="0">Yes</option>
                            <option value="1">No </option>
                        </select>
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="">Sportpackage</label>
                        <select name="keyless" id="keyless" class="form-control">
                            <option value="0">-</option>
                            <option value="0"> Sportpackage exterior</option>
                            <option value="1"> Sportpackage no</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-6">
                        <label for="">Seats electric</label>
                        <select name="keyless" id="keyless" class="form-control">
                            <option value="0">-</option>
                            <option value="0">Type 1</option>
                            <option value="1">Type 2 </option>
                            <option value="2">Type 3</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-6"></div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-6">
                        <label for="heating">Seat heating</label>
                        <select name="heating" id="heating" class="form-control">
                            <option value="0">-</option>
                            <option value="0">Seat heating front</option>
                            <option value="1">Seat heating front and back</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-6"></div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-6">
                        <label for="seat">Seat massage</label>
                        <select name="seat" id="seat" class="form-control">
                            <option value="0">-</option>
                            <option value="0">Seat massage</option>
                            <option value="1">Seat ventilation</option>
                            <option value="2">Seatmassage and -ventilation</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-6"></div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-6">
                        <label for="optics">Optics</label>
                        <select name="optics" id="optics" class="form-control">
                            <option value="0">-</option>
                            <option value="0">Black optics</option>
                            <option value="1">No optics</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-6"></div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-6">
                        <label for="cruise">Tinted windows</label>
                        <select name="cruise" id="cruise" class="form-control">
                            <option value="0">-</option>
                            <option value="0"> Extra tinted windows</option>
                            <option value="1">Tinted</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-6"></div>
                </div>
            </div> <!-- /. .col-7 -->
        </div> <!-- ./ .row Section Factory Options / Highlights -->


        <hr />

        <p>Options (text)</p>
        <div class="row d-flex align-items-stretch">

            <div class="col col-11">
                <textarea placeholder="Toevoegen opties vrije tekst" rows="7" style="resize: none;" class="w-150 form-control" data-name="opmerkingen" name="opmerkingen" id="opmerkingen"></textarea>
            </div>
        </div>
        <!-- ./ ROW  -->
        <!-- .ROW  -->
        <hr />


        <div class="row d-flex align-items-stretch">

            <div class="col col-5">
                <p>Remarks / Notes (internal)</p>
                <textarea placeholder="Aanpas auto: aan welke dossier, PO, SO of Offerte deze auto hangt" rows="7" style="resize: none;" class="form-control" data-name="opmerkingen" name="opmerkingen" id="opmerkingen"></textarea>
            </div>
            <div class="col-12 col-md-2"></div>
            <div class="col col-12 col-md-4">
                <p>Uploaded Documents</p>
                <textarea placeholder="auto_coc.pdf
dealer call.docx" rows="7" style="resize: none;" class="form-control" data-name="opmerkingen" name="opmerkingen" id="opmerkingen"></textarea>
            </div>
        </div>
        <!-- ./ ROW  -->
        <hr />


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