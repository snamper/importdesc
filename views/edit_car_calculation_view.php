<div class="content">
    <div class="form-auto">
        <div class="col-xs-12 table-list">            
        <form id="editCarForm" method="POST" action="edit_car">
            <input type="hidden" name="create_cars">
            <div class="row str justify-content-end" style="padding-bottom: 23px; margin-top: -18px;">
                <div class="col-sm-4" style="position: fixed; top: 0; z-index: 99999999; left: 0; right: 200; width: 200px; margin: auto; top: 5px;">
                    <button type="submit" class="btn btn-primary" style="width: 100%">Update</button>
                </div>
                <div class="col-sm-4" style="position: fixed; top: 0; z-index: 99999999; left: 200; right: 0; width: 200px; margin: auto; top: 5px;">
                    <button type="submit" class="btn btn-primary" style="width: 100%; background-color: orange; border: 1px solid orange;">Button</button>
                </div>
            </div>
                <?php include_once realpath("views/cars/single_car_form.php"); ?>
            </form>
        </div>
    </div>
    


<h5>Car calculations</h5>
    <div class="table-responsive">
    <table id="datatable-inside" class="table table-sm table-striped table-condensed table-bordered table-hover bg-white">
        <thead>
            <th class="text-center">id</th>
            <th style="white-space: nowrap">Inkoopprijs ex/ex</th>
            <th style="white-space: nowrap">Fee leverancier/bemiddelaar</th>
            <th style="white-space: nowrap">Inkoopprijs totaal</th>
            <th style="white-space: nowrap">Opknapkosten</th>
            <th style="white-space: nowrap">Transport buitenland</th>
            <th style="white-space: nowrap">Transport binnenland</th>
            <th style="white-space: nowrap">Taxatie kosten</th>
            <th style="white-space: nowrap">Totaal kosten</th>
            <th style="white-space: nowrap">Fee GWI</th>
            <th style="white-space: nowrap">Verkoopprijs ex/ex</th>
            <th style="white-space: nowrap">BTW 21%</th>
            <th style="white-space: nowrap">Verkoopprijs incl. BTW</th>
            <th style="white-space: nowrap">Rest BPM (indicatief)</th>
            <th style="white-space: nowrap">Leges (BTW vrij)</th>
            <th style="white-space: nowrap">Verkoopprijs in/in</th>
            <th style="white-space: nowrap">Disable</th>
        </thead>
        <tbody>
            
        </tbody>
    </table>
</div>
</div>
    <!-- END table -->