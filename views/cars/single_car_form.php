<div class="dashboardPageTitle text-center">
    <h2 style="opacity: 0;">Placeholder</h2>
</div>
<div class="dashboardBoxBg mb30">
    <div class="row">
        <div class="table-list body1" style="width: 100%;">      
        
            <input type="hidden" id="editCarHiddenInput" name="car_id" value="">
        
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
                    <select class="form-control" data-name="car_merk" name="carMark" id="carMark">
                       
                    </select>
                </div>

                <div class="col-sm-2">Model</div>
                <div class="col-sm-4">
                    <select class="form-control" data-name="car_model" name="carModel" id="carModel">
                        <option value="">-</option>
                    </select>
                </div>
                <div class="col-sm-2">Uitvoering</div>
                <div class="col-sm-4">
                    <input type="text" class="form-control" data-name="uitvoering" name="caUitvoering" id="carUitvoering">
                </div>

                <div class="col-sm-2">Motor</div>
                <div class="col-sm-4">
                    <input class="form-control" type="text" data-name="motor" name="carModification">
                </div>

            </div>

            <div class="row str">
                <div class="col-sm-2">Aantal deuren</div>
                <div class="col-sm-4">
                    <select class="form-control" data-name="aantal_deuren" name="doors_number" id="doorNumber">
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
                    <input class="form-control" type="text" data-name="kleur" name="kleur">
                </div>
            </div>

            <div class="row str">
                <div class="col-sm-2">Opties</div>
                <div class="col-sm-4">
                    <textarea class="w-100" data-name="optie" name="opties" id="opties"></textarea>
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
                    <select data-name="brandstof" name="BPMbrandstof" id="BPMbrandstof" class="form-control">
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
                    <select data-name="transmissieSoort" name="transmissieSoort" id="transmissieSoort" class="text-input form-control" required>
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
                    <input type="number" class="form-control" id="BPMCO2" data-name="co2" name="BPMCO2" placeholder="CO² NEDC" value="">
                </div>
            </div>

            <div class="row str">
                <div class="col-sm-2">
                    CO² WLTP
                </div>
                <div class="col-sm-4">
                    <input type="number" class="form-control" id="BPMCO2WLTP" data-name="" name="BPMCO2WLTP" placeholder="CO² WLTP" value="">
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
                    <input type="text" class="form-control text-input" id="datepicker1" value="" data-name="productiedatum" name="productiedatum">
                </div>

                <div class="col-sm-2">
                    Huidig land geregistreerd
                </div>
                <div class="col-sm-4">
                    <input class="form-control" type="text" data-name="huidigland" name="huidigland">
                </div>
            </div>


            <div class="row str">
                <div class="col-sm-2">
                    Kilometerstand
                </div>
                <div class="col-sm-4">
                    <input type="text" class="form-control" value="" data-name="km_stand" name="km_stand">
                </div>

                <div class="col-sm-2">
                    VIN
                </div>
                <div class="col-sm-4">
                    <input class="form-control" type="text" data-name="vinnummer" name="vinnummer">
                </div>
            </div>


            <div class="row str">
                <div class="col-sm-2">
                    NL kenteken
                </div>
                <div class="col-sm-4">
                    <input type="text" class="form-control text-input" value="" data-name="kenteken" name="kenteken">
                </div>

                <div class="col-sm-2">
                    Leverancier
                </div>
                <div class="col-sm-4">
                    <select class="form-control" data-name="levering" name="levering">
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
                    <textarea class="w-100" data-name="opmerkingen" name="opmerkingen" id="opmerkingen"></textarea>
                </div>
            </div>

            <h4>Bij SUBMIT wordt auto toegevoegd aan auto templates tabel</h4>

            <div class="row">
                <div class="col-sm-3">Calculatie</div>
                <div class="col-sm-2 switcher" style="padding-bottom: 5px;">
                    <input type="checkbox" data-name="" name="switchPrice" id="switchPrice" checked />
                    <label for="switchPrice"></label>
                </div>
                <div class="col-sm-6">
                    input
                </div>