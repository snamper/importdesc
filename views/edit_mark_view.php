<div class="panel panel-default">
    <div class="panel-body">
        <p class="desc">Fill the fields to Edit Mark</p>
        <form action="create_make" method="post">
            <div class="form-group">
                <label class="control-label">Mark Name<span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="mark_old_name" name="mark_old_name" required disabled />
            </div>
            <div class="form-group">
                <label class="control-label">New Mark Name<span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="mark_new_name" name="mark_new_name" value="" placeholder="New Mark Name" required/>
            </div>
            <input type="hidden" id="edit_mark" name="edit_mark">
             <button type="submit" onsubmit="this.disabled=true; this.innerText='Adding..'; " class="btn btn-primary">Edit Brand</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> 
        </form>
    </div>
    <!-- END panel-body -->
</div>