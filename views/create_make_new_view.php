<div class="content" id="createCarNew">
    <div class="form-auto">
        <div class="col-xs-12 table-list">
            <form action="create_make" method="POST" class="listing__form" id="carMarkForm">
                <div class="dashboardPageTitle text-center">
                    <h2 style="opacity: 0;">Placeholder</h2>
                </div>
                <div class="dashboardBoxBg mb30">
                    <div class="row">
                        <div class="col-sm-12 table-list">
                            <div class="row str">
                                <div class="col-sm-2"><label for="carMake">Select Make</label></div>
                                <div class="col-sm-4">
                                    <select class="form-control" name="car_make" id="carMake">
                                        <option value="">-</option>
                                    </select>
                                </div>
                                <div class="col-sm-2"><label for="carModel">Select Model</label></div>
                                <div class="col-sm-4">
                                    <select class="form-control" name="carModel" id="carModel">
                                        <option value="">-</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row str">
                                <div class="col-sm-2"><label for="carMotor">Motor</label></div>
                                <div class="col-sm-4">
                                    <select class="form-control js-car-motor" name="car_motor" id="carMotor">
                                        <option value="">-</option>
                                    </select>
                                </div>
                                <div class="col-sm-2"><label for="carFuel">Fuel</label></div>
                                <div class="col-sm-4">
                                    <select class="form-control js-car-fuel" name="carFuel"  id="carFuel">
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

                            <div class="row str">
                                <div class="col-sm-2"><label for="carUitvoering">Uitvoering</label></div>
                                <div class="col-sm-4">
                                    <select class="form-control" name="car_make" id="carUitvoering">
                                        <option value="">-</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row str">
                                <div class="col-sm-4">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>