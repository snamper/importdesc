<div class="panel panel-default">
    <div class="panel-body">
        <p class="desc">Fill the fields to create a new brand.</p>
        <form action="create_make" method="post">
            <div class="form-group">
                <label class="control-label">Brand Name<span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="create_brand_name" value="" placeholder="Brand Name" required/>
            </div>
            <input type="hidden" id="create_brand" name="create_brand">
            <button type="submit" onsubmit="this.disabled=true; this.innerText='Adding..'; " class="btn btn-primary">Create Brand</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> 
        </form>
    </div>
    <!-- END panel-body -->
</div>