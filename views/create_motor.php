<div class="panel panel-default">
    <div class="panel-body">
        <p class="desc">Fill the fields to create a new brand.</p>
        <form action="create_make" method="post">
            <div class="form-group">
                <label class="control-label">Select Brand<span class="text-danger">*</span></label>
                    <select class="form-control create_motor" name="carMark" id="carMarkMotor">
                        <option value="">-</option>
                    </select>
            </div>
            <div class="form-group">
                <label class="control-label">Select Model<span class="text-danger">*</span></label>
                    <select class="form-control" name="carModel" id="carModelMotor">
                        <option value="">-</option>
                    </select>
            </div>
            <div class="form-group">
                <label class="control-label">Motor Name<span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="create_motor_name" name="create_motor_name" value="" placeholder="Motor Name" required/>
            </div>
            <input type="hidden" id="create_motor" name="create_motor">
            <button type="submit" onsubmit="this.disabled=true; this.innerText='Adding..'; " class="btn btn-primary">Create Motor</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> 
        </form>
    </div>
    <!-- END panel-body -->
</div>