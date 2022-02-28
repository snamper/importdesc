<div class="panel panel-default">
    <div class="panel-body">
        <p class="desc">Fill the fields to create model.</p>
        <form action="create_make" method="post">
            <div class="form-group">
                <label class="control-label">Select Brand<span class="text-danger">*</span></label>
                <select class="form-control create_model js-car-make" name="car_make" id="carMake">
                    <option value="">-</option>
                </select>
            </div>
            <div class="form-group">
                <label class="control-label">Model Name<span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="create_model_name" name="create_model_name" value="" placeholder="Model Name" required />
            </div>
            <input type="hidden" id="create_model" name="create_model">
            <button type="submit" onsubmit="this.disabled=true; this.innerText='Adding..'; " class="btn btn-primary">Create Model</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </form>
    </div>
    <!-- END panel-body -->
</div>