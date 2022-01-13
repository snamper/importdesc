<div class="content">
    <div class="form-auto">
        <div class="col-xs-12 table-list">            
        <form id="editCarForm" method="POST" action="edit_car">
            <input type="hidden" name="create_cars">
            <div class="row str justify-content-end" style="padding-bottom: 23px; margin-top: -18px;">
                <div class="col-sm-4" style="position: fixed; top: 0; z-index: 99999999; left: 0; right: 200; width: 200px; margin: auto; top: 5px;">
                    <button type="submit" class="btn btn-primary" style="width: 100%">Update</button>
                </div>
                <div class="col-sm-4" style="position: fixed; top: 0; z-index: 99999999; left: 200; right: 0; width: 200px; margin: auto; top: 5px;">
                    <button type="submit" class="btn btn-primary" style="width: 100%; background-color: orange; border: 1px solid orange;">Button</button>
                </div>
            </div>
                <?php include_once realpath("views/cars/single_car_form.php"); ?>
            </form>

            <?php include realpath("views/marge_view_include.php"); ?>

