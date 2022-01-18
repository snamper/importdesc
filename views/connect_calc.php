<div class="panel panel-default">
    <div class="panel-body">
        <p class="desc">Fill the fields to create model.</p>
        <form action="show_calculations" method="post">
            <div class="form-group" style="display: grid; gap:10px;width: 100%;">
                <label class="control-label">Select Brand<span class="text-danger">*</span></label>
                    <select class="form-control" name="car_id_to_connect" id="car_id_to_connect" class="js-example-basic-multiple">
                        <option value=""> - </option>
                        <?php
                        foreach ($data['cars'] as $car) {
                           if( $calc['calculation_for_car_id'] == $car['carID'][0] ) {
                               $selected  = "selected";
                           }else {
                               $selected = "";
                           }
                            ?>
                            <option  value="<?php echo $car['carID'][0] ?>"> <?php echo $car['carID'][0] .':'.  $car['name'][0].' '.$car['name'][1] .' - ' .$car['motor']  ?></option>
                        <?php }
                        ?>
                    </select>
            </div>
           
            <input type="hidden" id="connect_car" name="connect_car">
            <button type="submit" onsubmit="this.disabled=true; this.innerText='Adding..'; " class="btn btn-primary">Create Model</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> 
        </form>
    </div>
    <!-- END panel-body -->
</div>