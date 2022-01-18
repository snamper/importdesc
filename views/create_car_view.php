<div class="content">
    <div class="form-auto">
        <div class="col-xs-12 table-list">            
            <form action="create_car" method="POST" class="listing__form">
            <input type="hidden" name="create_cars">
            <div class="row str justify-content-end" style="padding-bottom: 23px; margin-top: -18px;">
                <div class="col-sm-4" style="position: fixed; top: 0; z-index: 99999999; left: 0; right: 0; width: 200px; margin: auto; top: 5px;">
                    <button type="submit" class="btn btn-primary ml-" style="width: 100%">Insert</button>
                </div>
            </div>
                <?php include_once realpath("views/cars/single_car_form.php"); ?>
            </form>

            <script>
                function toggle(source) {
                    checkboxes = document.getElementsByClassName('foo');
                    for (var i = 0, n = checkboxes.length; i < n; i++) {
                        checkboxes[i].checked = source.checked;
                    }
                }
            </script>