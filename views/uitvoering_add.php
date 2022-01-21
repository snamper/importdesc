<div class="panel panel-default">
    <div class="panel-body">
        <p class="desc">Fill the fields to create a new brand.</p>
        <form action="create_make" method="post">
            <div class="form-group">
                <label class="control-label">Select Brand<span class="text-danger">*</span></label>
                    <select class="form-control uitvoering_add" name="carMark" id="carMarkUit">
                        <option value="">-</option>
                    </select>
            </div>
            <div class="form-group">
                <label class="control-label">Select Model<span class="text-danger">*</span></label>
                    <select class="form-control" name="carModel" id="carModelUit">
                        <option value="">-</option>
                    </select>
            </div>
            <div class="form-group">
                <label class="control-label">Select Motor<span class="text-danger">*</span></label>
                    <select class="form-control" name="carMotor" id="carMotorUit">
                        <option value="">-</option>
                    </select>
            </div>
            <div class="form-group">
                <label class="control-label">Uitvoering<span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="uitvoering_create" name="uitvoering_create" value="" placeholder="Uitvoering" required/>
            </div>
            
            <input type="hidden" id="add_uitvoering" name="add_Uitvoering">
            <button type="submit" onsubmit="this.disabled=true; this.innerText='Adding..'; " class="btn btn-primary">Add Fuel</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> 
        </form>
    </div>
    <!-- END panel-body -->
</div>


