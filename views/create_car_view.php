<div class="content">
    <div class="form-auto">
        <div class="col-xs-12 table-list">
            <form action="create_car" method="POST" class="listing__form">
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