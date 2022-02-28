<div class="panel panel-default">
    <div class="panel-body">
        <p class="desc">Fill the fields to create a new brand.</p>
        <form action="create_make" method="post">
            <div class="form-group">
                <label class="control-label">Select Brand<span class="text-danger">*</span></label>
                <select class="form-control create_motor js-car-make" name="car_make" id="carMake">
                    <option value="">-</option>
                </select>
            </div>
            <div class="form-group">
                <label class="control-label">Motor Name<span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="create_motor_name" name="create_motor_name" value="" placeholder="Motor Name" required />
            </div>

            <div class="form-group">
                <label class="control-label">Fuel Type<span class="text-danger">*</span></label>
                <select class="form-control" name="fuelType" id="fuelType">
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

            <input type="hidden" id="create_motor" name="create_motor">
            <button type="submit" onsubmit="this.disabled=true; this.innerText='Adding..'; " class="btn btn-primary">Create Motor</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </form>
    </div>
    <!-- END panel-body -->
</div>