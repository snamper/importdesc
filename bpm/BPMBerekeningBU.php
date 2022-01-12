<div class='row'>

    <!-- Bereken BPM -->
    <div class='col-xs-9'>

        <!-- BPM formulier -->
<?php
        echo "<div class='row'>";
            echo "<div class='col-xs-12 col-sm-12 widget-container-col'>";
                echo "<div class='widget-box'>";
                    echo "<div class='widget-header widget-header-small' style=' color: #393939'>";
                        echo "<h5 class='widget-title'>Auto</h5>";
                        echo "<div class='widget-toolbar'>
                            <a href='#' data-action='fullscreen' class='orange2'>
                                <i class='ace-icon fa fa-expand'></i>
                            </a>

                            <a href='#' data-action='collapse'>
                                <i class='ace-icon fa fa-chevron-up'></i>
                            </a>
                        </div>";
                        echo "</div>";
                    echo "<div class='widget-body no-padding'>";
                        echo "<div class='widget-main no-padding'>";

                            echo "<table class='table table-bordered table-hover'>";
                                echo "<tbody>";

                               include_once('BPMForm.php');

                                echo "</tbody>";
                                echo "</table>";

                            echo "</div>";
                        echo "</div>";
                    echo "</div>";
                echo "</div>";
            echo "</div>";
        ?>
        <!-- einde BPM formulier -->



    </div>

    <!-- Bereken BPM op basis van CO2 -->
    <div class='col-xs-3'>
        <?php $co2 = $_POST['CO2']; ?>
        <?php $datum = $_POST["productiedatum"]; ?>
        <?php $year_tns = date( 'Y', strtotime( $datum ) ); ?>
        <?php $brandstof = $_SESSION['brandstof']; ?>


        <?php $years = getYears( $datum ); ?>

        <table class="table table-bordered">
            <?php if ($co2 != '' && $year_tns != '1970' && $co2 != '')
                foreach ( $years as $key => $value ) { ?>
                    <tr>
                        <td><strong>BPM <?php echo $key; ?></strong></td>
                        <td>
                            <strong><?php echo floor( calculateBpm( $co2, $value['bpm_date'], $brandstof ) ); ?></strong>
                        </td>
                    </tr>
                <?php } else { ?>
                <tr>
                    <td><strong>BPM Berekening niet mogelijk</strong><br>
                        Niet alle benodigde gegevens zijn ingevoerd!
                    </td>
                </tr>
            <?php } ?>
        </table>



        <br/><br/>

        <table class="table table-bordered">
            <tr>
                <td colspan="2"><strong>Op basis van de onderstaande gegevens</strong></td>
            </tr>
            <tr <?php if($co2 === '') { ?> class="danger" <?php } ?>>
                <td>CO<sub>2</sub></td>
                <td><?php echo $co2; ?></td>
            </tr>
            <tr <?php if($year_tns === '1970') { ?> class="danger" <?php } ?>>
                <td>Datum<br/>(Oors. TNS)</td>
                <td><?php echo $datum; ?></td>
            </tr>
            <tr <?php if($brandstof === '') { ?> class="danger" <?php } ?>>
                <td>Brandstof (ID)</td>
                <td><?php echo $brandstof; ?></td>
            </tr>
        </table>
    </div>

</div>