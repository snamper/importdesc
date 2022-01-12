<div class="dashboardPageTitle text-center">
    <h2 style="opacity: 0;">Placeholder</h2>
</div>
<div class="dashboardBoxBg mb30">
    <div class="row">
        <div class="table-list body1" style="width: 100%;">
            <input name="merkA" type="hidden" value="<!-- <?php echo $quotation['price_merk']; ?> -->" />
            <input name="modelA" type="hidden" value="<!-- <?php echo $quotation['price_model']; ?> -->" />

            <input type="hidden" name="create_cars">
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
                    <h4>Auto toevoegen</h4>
                </div>
            </div>

            <div class="row str">
                <div class="col-sm-12">
                    <h6>Auto referentie* A-(leverancier)(merk)(model)(uitvoering)(datumvandaag) / AUTOMATISCH INVULLEN</h6>
                    <h6>Auto referentie (CUSTOM) Zelf iets invullen, niet verplicht</h6>
                    <h6 class="font-weight-bold"> Basis gegevens</h6>
                </div>
            </div>

            <div class=" row str">
                <div class="col-sm-2">Make</div>
                <div class="col-sm-4">
                    <select class="form-control" name="carMark" id="carMark">
                        <option value="">-</option>
                    </select>
                </div>

                <div class="col-sm-2">Model</div>
                <div class="col-sm-4">
                    <select class="form-control" name="carModel" id="carModel">
                        <option value="">-</option>
                    </select>
                </div>
                <div class="col-sm-2">Uitvoering</div>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="caUitvoering" id="carUitvoering">
                </div>

                <div class="col-sm-2">Motor</div>
                <div class="col-sm-4">
                    <input class="form-control" type="text" name="carModification">
                </div>

            </div>

            <div class="row str">
                <div class="col-sm-2">Aantal deuren</div>
                <div class="col-sm-4">
                    <select class="form-control" name="doors_number" id="doorNumber">
                        <option value="">-</option>
                        <?php
                        foreach ($data['car_doors'] as $car_doors_type) {
                            echo "<option value='$car_doors_type[conversie_tabel_ID]'> $car_doors_type[conversie_naam]</option>";
                        }
                        ?>
                    </select>
                </div>


                <div class="col-sm-2">Kleur</div>
                <div class="col-sm-4">
                    <input class="form-control" type="text" name="kleur">
                </div>
            </div>

            <div class="row str">
                <div class="col-sm-2">Opties</div>
                <div class="col-sm-4">
                    <textarea class="w-100" name="opties" id="opties"></textarea>
                </div>
            </div>

            <div class="row str">
                <div class="col-sm-12">
                    <h6 class="font-weight-bold"> Technische gegevens</h6>
                </div>
            </div>


            <div class="row str">

                <div class="col-sm-2">Brandstof soort</div>
                <div class="col-sm-4">
                    <select name="BPMbrandstof" id="BPMbrandstof" class="form-control">
                        <option value="0"> - </option>
                        <?php

                        foreach ($data['fuel_types'] as $type) {
                            echo "<option value='$type[conversie_tabel_ID]'> $type[conversie_naam]</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="row str">
                <div class="col-sm-2">Transmissie</div>
                <div class="col-sm-4">
                    <select name="transmissieSoort" id="transmissieSoort" class="text-input form-control" required>
                        <option value="">Maak een keuze </option>
                        <?php
                        foreach ($data['transmitions'] as $transmition) {
                            echo "<option value='$transmition[conversie_tabel_ID]|$transmition[conversie_naam]'> $transmition[conversie_naam]</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="col-sm-2">
                    CO² NEDC
                </div>
                <div class="col-sm-4">
                    <input type="number" class="form-control" id="BPMCO2" name="BPMCO2" placeholder="CO² NEDC" value="">
                </div>
            </div>

            <div class="row str">
                <div class="col-sm-2">
                    CO² WLTP
                </div>
                <div class="col-sm-4">
                    <input type="number" class="form-control" id="BPMCO2WLTP" name="BPMCO2WLTP" placeholder="CO² WLTP" value="">
                </div>
            </div>


            <div class="row str">
                <div class="col-sm-12">
                    <h6 class="font-weight-bold">Herkomst en Registratie</h6>
                </div>
            </div>

            <div class="row str">
                <div class="col-sm-2">
                    Datum eerste toelating
                </div>
                <div class="col-sm-4">
                    <input type="text" class="form-control text-input" id="datepicker1" value="" name="productiedatum">
                </div>

                <div class="col-sm-2">
                    Huidig land geregistreerd
                </div>
                <div class="col-sm-4">
                    <input class="form-control" type="text" name="huidigland">
                </div>
            </div>


            <div class="row str">
                <div class="col-sm-2">
                    Kilometerstand
                </div>
                <div class="col-sm-4">
                    <input type="text" class="form-control" value="" name="km_stand">
                </div>

                <div class="col-sm-2">
                    VIN
                </div>
                <div class="col-sm-4">
                    <input class="form-control" type="text" name="vinnummer">
                </div>
            </div>


            <div class="row str">
                <div class="col-sm-2">
                    NL kenteken
                </div>
                <div class="col-sm-4">
                    <input type="text" class="form-control text-input" value="" name="kenteken">
                </div>

                <div class="col-sm-2">
                    Leverancier
                </div>
                <div class="col-sm-4">
                    <select class="form-control" name="levering">
                        <?php
                        foreach ($data['creditors'] as $creditor) {
                            echo "<option value='$creditor[CreditorId]'> $creditor[CreditorName]</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="row str">
                <div class="col-sm-12">
                    <h6 class="font-weight-bold"> Overig</h6>
                </div>
            </div>


            <div class="row str">
                <div class="col-sm-2">Opmerkingen</div>
                <div class="col-sm-4">
                    <textarea class="w-100" name="opmerkingen" id="opmerkingen"></textarea>
                </div>
            </div>

            <h4>Bij SUBMIT wordt auto toegevoegd aan auto templates tabel</h4>

            <div class="row">
                <div class="col-sm-3">Calculatie</div>
                <div class="col-sm-2 switcher" style="padding-bottom: 5px;">
                    <input type="checkbox" name="switchPrice" id="switchPrice" checked />
                    <label for="switchPrice"></label>
                </div>
                <div class="col-sm-6">
                    <div>
                        < Bij schuifje ingeschakeld wordt calculatie module hieronder uitgeklapt</div>
                            <div> Zie sheets (Calc module) Calc_BTW en (Calc module) Calc_Marge</div>
                    </div>
                </div>