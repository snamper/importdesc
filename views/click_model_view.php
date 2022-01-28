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
                        <div class="col-12 col-md-6">
                            <!-- Rows  -->
                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <span>Current car status* </span>
                                </div>
                                <div class="col-12 col-md-6 p-1">
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
                                <div class="col-12 col-md-6 p-1">
                                    <input class="form-control" type="text" name="" value="" placeholder="Dikke Golf Joop" />
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <span>VIN</span>
                                </div>
                                <div class="col-12 col-md-6 p-1">
                                    <input class="form-control" type="text" name="" value="" placeholder="WAUZZZ1932" />
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <span>Komm. Number</span>
                                </div>
                                <div class="col-12 col-md-6 p-1">
                                    <input class="form-control" type="text" name="" value="" />
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <span>Link to Advert</span>
                                </div>
                                <div class="col-12 col-md-6 p-1">
                                    <input class="form-control" type="text" name="" value="" />
                                </div>
                            </div>
                            <!-- ./ ROWS  -->
                        </div>
                        <!-- ./ Left col  -->

                        <!-- Rigth col  -->
                        <div class="col-12 col-md-6">
                            <!-- Rows  -->
                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <span>Source Supplier </span>
                                </div>
                                <div class="col-12 col-md-6 p-1">
                                    <input class="form-control" type="text" name="" value="" placeholder="Feser Graf, Schwabach" />
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <span>Reference Number Supplier</span>
                                </div>
                                <div class="col-12 col-md-6 p-1">
                                    <input class="form-control" type="text" name="" value="" />
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <span>Current Registration</span>
                                </div>
                                <div class="col-12 col-md-6 p-1">
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
                                <div class="col-12 col-md-6 p-1">
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
                    <div class="col-12 col-md-6">
                        <!-- Rows  -->
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <span>Vehicle Type* </span>
                            </div>
                            <div class="col-12 col-md-8 p-1">
                                <select class="form-control" name="na" id="">
                                    <option>Passenger car</option>
                                    <option>Company car max. 3500kg</option>
                                    <option>Camper</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-4">
                                <span>Make* </span>
                            </div>
                            <div class="col-12 col-md-8 p-1">
                                <select class="form-control" name="na" id="">
                                    <option>Volkswagen</option>
                                    <option>BMW</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <span>Model* </span>
                            </div>
                            <div class="col-12 col-md-8 p-1">
                                <div class="row">
                                    <div class="col-6">
                                        <select class="form-control" name="na" id="">
                                            <option>Golf 8</option>
                                            <option>With first registration</option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <input class="form-control" type="text" placeholder="(text)">
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="row">
                            <div class="col-12 col-md-4">
                                <span>Variant</span>
                            </div>
                            <div class="col-12 col-md-8 p-1">
                                <div class="row">
                                    <div class="col-6">
                                        <select class="form-control" name="na" id="">
                                            <option>Business R</option>
                                            <option>With first registration</option>
                                        </select>
                                    </div>

                                    <div class="col-6">
                                        <input class="form-control" type="text" placeholder="(text)">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-4">
                                <span>Body Style</span>
                            </div>
                            <div class="col-12 col-md-8 p-1">
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
                            <div class="col-12 col-md-8 p-1">
                                <select class="form-control" name="na" id="">
                                    <option>Gasoline</option>
                                    <option>Diesel</option>
                                    <option>Electric</option>
                                    <option>Hybrid Gasoline</option>
                                    <option>Hybrid Diesel</option>
                                    <option>Hydrogen</option>
                                    <option>LPG</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-4">
                                <span>Engine* </span>
                            </div>
                            <div class="col-12 col-md-8 p-1">
                                <div class="row">
                                    <div class="col-6">
                                        <select class="form-control" name="na" id="">
                                            <option>1.5 TSI</option>
                                            <option>With first registration</option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <input class="form-control" type="text" name="" id="" placeholder="(text)">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <span>Transmission* </span>
                            </div>
                            <div class="col-12 col-md-8 p-1">
                                <div class="row">
                                    <div class="col-6">
                                        <select class="form-control" name="na" id="">
                                            <option>Automatic</option>
                                            <option>Manual</option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <input class="form-control" type="text" placeholder="(text)">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-4">
                                <span>Power</span>
                            </div>
                            <div class="col-12 col-md-8 p-1">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="text-center">kW / Pk</div>
                                        <input class="form-control" type="text" name="" id="" placeholder="110/150">
                                    </div>
                                    <div class="col-6">
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
                            <div class="col-12 col-md-8 p-1">
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
                            <div class="col-12 col-md-8 p-1">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="text-center">WLTP</div>
                                        <input class="form-control" type="text" name="" id="" placeholder="130">
                                    </div>
                                    <div class="col-6">
                                        <div class="text-center">NEDC</div>
                                        <input class="form-control" type="text" name="" id="" placeholder="110">
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-12 col-md-4">
                                <span>Kilometers </span>
                            </div>
                            <div class="col-12 col-md-8 p-1">
                                <input class="form-control" type="text" name="" id="" placeholder="3000">
                            </div>
                        </div>

                        <hr />

                        <div class="row">
                            <div class="col-12 col-md-4">
                                <span>Colour | Colour name OEM </span>
                            </div>
                            <div class="col-12 col-md-8 p-1">
                                <div class="row">
                                    <div class="col-3">
                                        Metallic/ Pearl
                                    </div>
                                    <div class="col-6">
                                        <input type="checkbox" name="" id="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
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
                                    <div class="col-6">
                                        <input class="form-control" type="text" name="" id="" placeholder="(text)">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-4">
                                <span>Interior color | Interior name OEM </span>
                            </div>
                            <div class="col-12 col-md-8 p-1">
                                <div class="row">
                                    <div class="col-6">
                                        <select class="form-control" name="na" id="">
                                            <option>Beige</option>
                                            <option>Black</option>
                                            <option>Grey</option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <input class="form-control" type="text" name="" id="" placeholder="Samtbeige">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-4">
                                <span>Interior material </span>
                            </div>
                            <div class="col-12 col-md-8 p-1">
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
                    <div class="col-12 col-md-6">
                        <div class="container border border-light rounded">
                            <?php include realpath("views/marge_view_include.php"); ?>
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

        <p>Registration Data</p>
        <div class="row">
            <div class="col-12 col-md-2"> First registration ever (date)</div>
            <div class="col-12 col-md-4">
                <input class="form-control" type="text" name="" id="" placeholder="25.5.2021">
            </div>
        </div>
        <!-- ./ ROW  -->
        <!-- .ROW  -->
        <div class="row">
            <div class="col-12 col-md-2"> First registration in the Netherlands (date)</div>
            <div class="col-12 col-md-4">
                <input class="form-control" type="text" name="" id="" placeholder="31.3.2021">
            </div>
            <div class="col-12 col-md-2">
                NL Registration number
            </div>
            <div class="col-12 col-md-3"><input class="form-control" type="text" name="" id="" placeholder="KN-494-T"></div>
            <div class="col-12 col-md-2">
            </div>
        </div>
        <!-- ./ ROW  -->
        <!-- .ROW  -->
        <br />
        <div class="row">
            <div class="col-12 col-md-2"> First registration on a name in the Netherlands (date)</div>
            <div class="col-12 col-md-4">
                <input class="form-control" type="text" name="" id="" placeholder="25.5.2021">
            </div>
            <div class="col-12 col-md-2">
                Check code (meldcode)
            </div>
            <div class="col-12 col-md-4">1932</div>
        </div>
        <!-- ./ ROW  -->
        <!-- .ROW  -->
        <br />
        <div class="row">
            <div class="col-12 col-md-2">Last registration on a name (date)</div>
            <div class="col-12 col-md-4">
                <input class="form-control" type="text" name="" id="" placeholder="25.5.2021">
            </div>
            <div class="col-12 col-md-2">
                APK / Check valid until
            </div>
            <div class="col-12 col-md-3"><input class="form-control" type="text" name="" id="" placeholder="25.5.2025"></div>
            <div class="col-12 col-md-2 spacer"></div>
        </div>
        <!-- ./ ROW  -->
        <!-- .ROW  -->
        <br />
        <hr />
        <p>Factory Options / Highlights</p>
        <div class="row">
            <div class="col-12 col-md-2">
                <div class="row align-items-center">
                    <div class="col-1">
                        <input type="checkbox" class="" onClick="toggle(this)" />
                    </div>
                    <div class="col-11">Navigation</div>
                </div>
            </div>
            <div class="col col-12 col-md-4">
                <select name="keyless" id="keyless" class="form-control">
                    <option value="0">Keyless Entry + Go</option>
                    <option value="1">Keyless Go</option>
                    <option value="2">Keyless Entry</option>
                </select>
            </div>

            <div class="col-12 col-md-3">
                <div class="row">
                    <div class="col-1 col-md-1">
                        <input type="checkbox" onClick="toggle(this)" />
                    </div>

                    <div class="col-11 col-md-6">
                        Electrically adjustable seats
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-3">

                <div class="row">
                    <div class="col-1 col-md-1">
                        <input type="checkbox" onClick="toggle(this)" />
                    </div>

                    <div class="col-11 col-md-6">
                        Sportpackage exterior
                    </div>
                </div>
            </div>
        </div>
        <!-- ./ ROW  -->
        <!-- .ROW  -->
        <div class="row">
            <div class="col-12 col-md-2">
                <div class="row align-items-center">
                    <div class="col-1">
                        <input type="checkbox" class="" onClick="toggle(this)" />
                    </div>
                    <div class="col-11">App Connect</div>
                </div>
            </div>
            <div class="col col-12 col-md-4">
                <select name="airco" id="airco" class="form-control">
                    <option value="0">Airco Automatic</option>
                    <option value="1">Airco Automatic 2 zone</option>
                    <option value="2">Airco Automatic 3 zone</option>
                    <option value="3">Airco Automatic 4 zone</option>
                    <option value="4">Airco Manual</option>
                </select>
            </div>
            <div class="col-12 col-md-3">
                <div class="row">
                    <div class="col-1 col-md-1">
                        <input type="checkbox" onClick="toggle(this)" />
                    </div>

                    <div class="col-11 col-md-6">
                        Sport seats
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="row">
                    <div class="col-1 col-md-1">
                        <input type="checkbox" onClick="toggle(this)" />
                    </div>

                    <div class="col-11 col-md-6">
                        Sportpackage interior
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-2">
                <select name="roof" id="roof" class="form-control">
                    <option value="0">Panorama sliding roof</option>
                    <option value="1">Panorama roof</option>
                    <option value="2">Steel sliding roof</option>
                    <option value="3">Glass sliding roof</option>
                </select>
            </div>
            <div class="col col-12 col-md-4">
                <select name="wheels" id="wheels" class="form-control">
                    <option value="0">Alloy wheels 16 inch</option>
                    <option value="1">Alloy wheels 17 inch</option>
                    <option value="2">Alloy wheels 18 inch</option>
                    <option value="3">Alloy wheels 19 inch</option>
                    <option value="4">Alloy wheels 20 inch</option>
                </select>
            </div>
            <div class="col-12 col-md-3">
                <select name="wheels" id="wheels" class="form-control">
                    <option value="0">Seat heating front</option>
                    <option value="1">Seat heating front and back</option>
                </select>
            </div>
            <div class="col-12 col-md-3">
                <div class="row">
                    <div class="col-1 col-md-1">
                        <input type="checkbox" onClick="toggle(this)" />
                    </div>

                    <div class="col-11 col-md-6">
                        Add option
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-2">
                <select name="headlights" id="headlights" class="form-control">
                    <option value="0">Headlights LED</option>
                    <option value="1">Headlights Matrix LED</option>
                    <option value="2">Headlights Adaptive LED</option>
                    <option value="3">Headlights Xenon</option>
                </select>
            </div>
            <div class="col-12 col-md-4">
                <select name="pdc" id="pdc" class="form-control">
                    <option value="0">PDC Front</option>
                    <option value="1">PDC Front and Back</option>
                </select>
            </div>
            <div class="col-12 col-md-3">
                <select name="seat" id="seat" class="form-control">
                    <option value="0">Seat massage</option>
                    <option value="1">Seat ventilation</option>
                    <option value="2">Seatmassage and -ventilation</option>
                </select>
            </div>
            <div class="col-12 col-md-3">
                <div class="row">
                    <div class="col-1 col-md-1">
                        <input type="checkbox" onClick="toggle(this)" />
                    </div>

                    <div class="col-11 col-md-6">
                        Add option
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-2">
                <select name="cockpit" id="cockpit" class="form-control">
                    <option value="0">Digital Cockpit Pro</option>
                    <option value="1">Digital Cockpit</option>
                </select>
            </div>
            <div class="col-12 col-md-4">
                <select name="camera" id="camera" class="form-control">
                    <option value="0">Camera Front</option>
                    <option value="1">360 degrees camera</option>
                </select>
            </div>
            <div class="col-12 col-md-3">
                <div class="row">
                    <div class="col-1 col-md-1">
                        <input type="checkbox" onClick="toggle(this)" />
                    </div>

                    <div class="col-11 col-md-6">
                        Black optics
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-3">
                <div class="row">
                    <div class="col-1 col-md-1">
                        <input type="checkbox" onClick="toggle(this)" />
                    </div>

                    <div class="col-11 col-md-6">
                        Add option
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-2">
                <select name="cruise" id="cruise" class="form-control">
                    <option value="0">Adaptive cruise control</option>
                    <option value="1">Cruise control</option>
                </select>
            </div>
            <div class="col-12 col-md-4">
                <select name="tow" id="tow" class="form-control">
                    <option value="0">Tow bar fixed</option>
                    <option value="1">Tow bar detachable</option>
                    <option value="2">Tow bar manually collapsible</option>
                    <option value="3">Tow bar electrically collapsible</option>
                </select>
            </div>


            <div class="col-12 col-md-3">
                <div class="row">
                    <div class="col-1 col-md-1">
                        <input type="checkbox" onClick="toggle(this)" />
                    </div>

                    <div class="col-11 col-md-6">
                        Extra tinted windows
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-3">
                <div class="row">
                    <div class="col-1 col-md-1">
                        <input type="checkbox" onClick="toggle(this)" />
                    </div>

                    <div class="col-11 col-md-6">
                        Add option
                    </div>
                </div>
            </div>
        </div>
        <!-- ./ ROW  -->
        <!-- .ROW  -->
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