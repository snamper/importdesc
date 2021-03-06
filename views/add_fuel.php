<div class="panel panel-default">
    <div class="panel-body">
        <p class="desc">Fill the fields to create a new brand.</p>
        <form action="create_make" method="post">
            <div class="form-group">
                <label class="control-label">Select Brand<span class="text-danger">*</span></label>
                    <select class="form-control connect_fuel" name="car_make" id="carMake">
                        <option value="">-</option>
                    </select>
            </div>
            <div class="form-group">
                <label class="control-label">Select Model<span class="text-danger">*</span></label>
                    <select class="form-control" name="carModel" id="carModelFuel">
                        <option value="">-</option>
                    </select>
            </div>
            <div class="form-group">
                <label class="control-label">Select Motor<span class="text-danger">*</span></label>
                    <select class="form-control" name="carMotor" id="carMotor">
                        <option value="">-</option>
                    </select>
            </div>
            <div class="form-group">
                <label class="control-label">Fuel Type<span class="text-danger">*</span></label>
                    <select class="form-control" name="fuelType" id="fuelType">
                    <option value="1" >Benzine</option>
                        <option value="2" >Diesel</option>
                        <option value="3" >Hybride</option>
                        <option value="4" >Electrisch</option>
                        <option value="5" >LPG</option>
                        <option value="6" >Aardgas</option>
                        <option value="7" >Alcohol</option>
                        <option value="8" >Cryogeen</option>
                        <option value="9" >Waterstof</option>
                    </select>
            </div>
            
            <input type="hidden" id="add_fuel" name="add_fuel">
            <button type="submit" onsubmit="this.disabled=true; this.innerText='Adding..'; " class="btn btn-primary">Add Fuel</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> 
        </form>
    </div>
    <!-- END panel-body -->
</div>


