<div class="panel panel-default">
    <div class="panel-body">
        <p class="desc">Fill the fields to edit model</p>
        <form action="create_make" method="post">
            <div class="form-group">
                <label class="control-label">Model Name<span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="model_name_old" value="" placeholder="Model Name" required disabled/>
            </div>
            <div class="form-group">
                <label class="control-label">New Name<span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="model_name_new" value="" placeholder="New Name" required/>
            </div>
            <input type="hidden" id="edit_model" name="edit_model">
            <button type="submit" onsubmit="this.disabled=true; this.innerText='Adding..'; " class="btn btn-primary">Edit Model</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> 
        </form>
    </div>
    <!-- END panel-body -->
</div>