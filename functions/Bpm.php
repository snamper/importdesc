<?php
/** Error reporting */
// error_reporting( E_ALL );
// ini_set( 'display_errors', true );
// ini_set( 'display_startup_errors', true );
//date_default_timezone_set( 'Europe/London' );



function calculateBpmTest($co2 = 0, $datum_toelating = null, $bpm_brandstof_type_id = 1) {
    $jaar_toelating = date( 'Y', strtotime( $datum_toelating ) );

    // Selecteer bpm_periode_id van bpm_periode waar de opgegeven datum binnen valt.
    $datum_toelating_nl = date( 'Y-m-d', strtotime( $datum_toelating ) );
    $bpm_periode        = selectBpmPeriod( $datum_toelating_nl );
    $bpm_periode_id     = $bpm_periode[0]['id'];

//    echo "STart <br />";
//    echo $datum_toelating."<br />";
//    echo $datum_toelating_nl."<br />";
//    echo print_r($bpm_periode)." bpm periode<br />";
//    echo $bpm_periode_id." bpm periode id<br />";
//    echo $jaar_toelating."<br />";
//    echo $co2."<br />";
//
//    echo "Einde <br />";
//    exit;
    if ($jaar_toelating < 2018) {

        $bpm='0';

    } elseif ($jaar_toelating == 2018 && $bpm_brandstof_type_id == 2) {
        $diesel_toeslag_vanaf_co2 = 80;
        $diesel_toeslag           = 78.82;
        $co2_diesel               = $co2 - $diesel_toeslag_vanaf_co2;
        $co2_diesel_toeslag       = $co2_diesel * $diesel_toeslag;
        $bpm_arr                  = selectBpmWLTP( $co2, $bpm_periode_id, 1 ); // Brandstof Type op benzine (1) i.v.m. berekening.
        $pre_bpm                  = (($co2 - $bpm_arr[0]['meer_dan']) * $bpm_arr[0]['bedrag_vermenigvuldigen']) + $bpm_arr[0]['bedrag_optellen'];
        $bpm                      = $pre_bpm + $co2_diesel_toeslag;
    } elseif ($jaar_toelating == 2019 && $bpm_brandstof_type_id == 2) {
        $diesel_toeslag_vanaf_co2 = 80;
        $diesel_toeslag           = 78.82;
        $co2_diesel               = $co2 - $diesel_toeslag_vanaf_co2;
        $co2_diesel_toeslag       = $co2_diesel * $diesel_toeslag;
        $bpm_arr                  = selectBpmWLTP( $co2, $bpm_periode_id, 1 ); // Brandstof Type op benzine (1) i.v.m. berekening.
        $pre_bpm                  = (($co2 - $bpm_arr[0]['meer_dan']) * $bpm_arr[0]['bedrag_vermenigvuldigen']) + $bpm_arr[0]['bedrag_optellen'];
        $bpm                      = $pre_bpm + $co2_diesel_toeslag;
    } elseif ($jaar_toelating == 2020 && $bpm_brandstof_type_id == 2) {
        $diesel_toeslag_vanaf_co2 = 80;
        $diesel_toeslag           = 78.82;
        $co2_diesel               = $co2 - $diesel_toeslag_vanaf_co2;
        $co2_diesel_toeslag       = $co2_diesel * $diesel_toeslag;
        $bpm_arr                  = selectBpmWLTP( $co2, $bpm_periode_id, 3 ); // Brandstof Type op benzine (1) i.v.m. berekening.
        $pre_bpm                  = (($co2 - $bpm_arr[0]['meer_dan']) * $bpm_arr[0]['bedrag_vermenigvuldigen']) + $bpm_arr[0]['bedrag_optellen'];
        $bpm                      = $pre_bpm + $co2_diesel_toeslag;
    }elseif ($jaar_toelating == 2021 && $bpm_brandstof_type_id == 2) {

        $diesel_toeslag_vanaf_co2 = 77;
        $diesel_toeslag           = 83.59;
        $co2_diesel               = $co2 - $diesel_toeslag_vanaf_co2;
        $co2_diesel_toeslag       = $co2_diesel * $diesel_toeslag;
        $bpm_arr                  = selectBpmWLTP( $co2, $bpm_periode_id, 3 ); // Brandstof Type op benzine (1) i.v.m. berekening.
        $pre_bpm                  = (($co2 - $bpm_arr[0]['meer_dan']) * $bpm_arr[0]['bedrag_vermenigvuldigen']) + $bpm_arr[0]['bedrag_optellen'];
        $bpm                      = $pre_bpm + $co2_diesel_toeslag;

    }elseif ($jaar_toelating == 2018 && $bpm_brandstof_type_id == 4) {// nu PHEV + diesel
        $diesel_toeslag_vanaf_co2 = 80;
        $diesel_toeslag           = 78.82;
        $co2_diesel               = $co2 - $diesel_toeslag_vanaf_co2;
        $co2_diesel_toeslag       = $co2_diesel * $diesel_toeslag;
        $bpm_arr                  = selectBpmWLTP( $co2, $bpm_periode_id, 3 ); // Brandstof Type op benzine (1) i.v.m. berekening.
        $pre_bpm                  = (($co2 - $bpm_arr[0]['meer_dan']) * $bpm_arr[0]['bedrag_vermenigvuldigen']) + $bpm_arr[0]['bedrag_optellen'];
        $bpm                      = $pre_bpm + $co2_diesel_toeslag;
    } elseif ($jaar_toelating == 2019 && $bpm_brandstof_type_id == 4) {
        $diesel_toeslag_vanaf_co2 = 80;
        $diesel_toeslag           = 78.82;
        $co2_diesel               = $co2 - $diesel_toeslag_vanaf_co2;
        $co2_diesel_toeslag       = $co2_diesel * $diesel_toeslag;
        $bpm_arr                  = selectBpmWLTP( $co2, $bpm_periode_id, 3 ); // Brandstof Type op benzine (1) i.v.m. berekening.
        $pre_bpm                  = (($co2 - $bpm_arr[0]['meer_dan']) * $bpm_arr[0]['bedrag_vermenigvuldigen']) + $bpm_arr[0]['bedrag_optellen'];
        $bpm                      = $pre_bpm + $co2_diesel_toeslag;
    } elseif ($jaar_toelating == 2020 && $bpm_brandstof_type_id == 4) {
        $diesel_toeslag_vanaf_co2 = 80;
        $diesel_toeslag           = 78.82;
        $co2_diesel               = $co2 - $diesel_toeslag_vanaf_co2;
        $co2_diesel_toeslag       = $co2_diesel * $diesel_toeslag;
        $bpm_arr                  = selectBpmWLTP( $co2, $bpm_periode_id, 3 ); // Brandstof Type op benzine (1) i.v.m. berekening.
        $pre_bpm                  = (($co2 - $bpm_arr[0]['meer_dan']) * $bpm_arr[0]['bedrag_vermenigvuldigen']) + $bpm_arr[0]['bedrag_optellen'];
        $bpm                      = $pre_bpm + $co2_diesel_toeslag;
    } elseif ($jaar_toelating == 2021 && $bpm_brandstof_type_id == 4) {

        $diesel_toeslag_vanaf_co2 = 77;
        $diesel_toeslag           = 83.59;
        $co2_diesel               = $co2 - $diesel_toeslag_vanaf_co2;
        $co2_diesel_toeslag       = $co2_diesel * $diesel_toeslag;
        $bpm_arr                  = selectBpmWLTP( $co2, $bpm_periode_id, 3 ); // Brandstof Type op benzine (1) i.v.m. berekening.
        $pre_bpm                  = (($co2 - $bpm_arr[0]['meer_dan']) * $bpm_arr[0]['bedrag_vermenigvuldigen']) + $bpm_arr[0]['bedrag_optellen'];
        $bpm                      = $pre_bpm + $co2_diesel_toeslag;
    }elseif ($jaar_toelating == 2022 && $bpm_brandstof_type_id == 4) {

    $diesel_toeslag_vanaf_co2 = 75;
    $diesel_toeslag           = 86.67;
    $co2_diesel               = $co2 - $diesel_toeslag_vanaf_co2;
    $co2_diesel_toeslag       = $co2_diesel * $diesel_toeslag;
    $bpm_arr                  = selectBpmWLTP( $co2, $bpm_periode_id, 3 ); // Brandstof Type op benzine (1) i.v.m. berekening.
    $pre_bpm                  = (($co2 - $bpm_arr[0]['meer_dan']) * $bpm_arr[0]['bedrag_vermenigvuldigen']) + $bpm_arr[0]['bedrag_optellen'];
    $bpm                      = $pre_bpm + $co2_diesel_toeslag;
    }elseif ($jaar_toelating == 2022 && $bpm_brandstof_type_id == 2) {

        $diesel_toeslag_vanaf_co2 = 75;
        $diesel_toeslag           = 86.67;
        $co2_diesel               = $co2 - $diesel_toeslag_vanaf_co2;
        $co2_diesel_toeslag       = $co2_diesel * $diesel_toeslag;
        $bpm_arr                  = selectBpmWLTP( $co2, $bpm_periode_id, 3 ); // Brandstof Type op benzine (1) i.v.m. berekening.
        $pre_bpm                  = (($co2 - $bpm_arr[0]['meer_dan']) * $bpm_arr[0]['bedrag_vermenigvuldigen']) + $bpm_arr[0]['bedrag_optellen'];
        $bpm                      = $pre_bpm + $co2_diesel_toeslag;
    
    }else {        
        $bpm_arr = selectBpmWLTP( $co2, $bpm_periode_id, $bpm_brandstof_type_id );
        $bpm     = (($co2 - $bpm_arr[0]['meer_dan']) * $bpm_arr[0]['bedrag_vermenigvuldigen']) + $bpm_arr[0]['bedrag_optellen'];
    }

    return $bpm;
}




function calculateBpm($co2 = 0, $datum_toelating = null, $bpm_brandstof_type_id = 1) {
       $jaar_toelating = date( 'Y', strtotime( $datum_toelating ) );

    // Selecteer bpm_periode_id van bpm_periode waar de opgegeven datum binnen valt.
    $datum_toelating_nl = date( 'Y-m-d', strtotime( $datum_toelating ) );
    $bpm_periode        = selectBpmPeriod( $datum_toelating_nl );
    $bpm_periode_id     = $bpm_periode[0]['id'];

    if ($jaar_toelating == 2015 && $bpm_brandstof_type_id == 2) {
        $diesel_toeslag_vanaf_co2 = 70;
        $diesel_toeslag           = 86;
        $co2_diesel               = $co2 - $diesel_toeslag_vanaf_co2;
        $co2_diesel_toeslag       = $co2_diesel * $diesel_toeslag;
        $bpm_arr                  = selectBpm( $co2, $bpm_periode_id, 1 ); // Brandstof Type op benzine (1) i.v.m. berekening.
        $pre_bpm                  = (($co2 - $bpm_arr[0]['meer_dan']) * $bpm_arr[0]['bedrag_vermenigvuldigen']) + $bpm_arr[0]['bedrag_optellen'];
        $bpm                      = $pre_bpm + $co2_diesel_toeslag;
    } elseif ($jaar_toelating == 2016 && $bpm_brandstof_type_id == 2) {
        $diesel_toeslag_vanaf_co2 = 67;
        $diesel_toeslag           = 86.43;
        $co2_diesel               = $co2 - $diesel_toeslag_vanaf_co2;
        $co2_diesel_toeslag       = $co2_diesel * $diesel_toeslag;
        $bpm_arr                  = selectBpm( $co2, $bpm_periode_id, 1 ); // Brandstof Type op benzine (1) i.v.m. berekening.
        $pre_bpm                  = (($co2 - $bpm_arr[0]['meer_dan']) * $bpm_arr[0]['bedrag_vermenigvuldigen']) + $bpm_arr[0]['bedrag_optellen'];
        $bpm                      = $pre_bpm + $co2_diesel_toeslag;
    } elseif ($jaar_toelating == 2017 && $bpm_brandstof_type_id == 2) {

        $diesel_toeslag_vanaf_co2 = 65;
        $diesel_toeslag           = 86.69;
        $co2_diesel               = $co2 - $diesel_toeslag_vanaf_co2;
        $co2_diesel_toeslag       = $co2_diesel * $diesel_toeslag;
        $bpm_arr                  = selectBpm( $co2, $bpm_periode_id, 1 ); // Brandstof Type op benzine (1) i.v.m. berekening.
        $pre_bpm                  = (($co2 - $bpm_arr[0]['meer_dan']) * $bpm_arr[0]['bedrag_vermenigvuldigen']) + $bpm_arr[0]['bedrag_optellen'];
        $bpm                      = $pre_bpm + $co2_diesel_toeslag;
    } elseif ($jaar_toelating == 2018 && $bpm_brandstof_type_id == 2) {
        $diesel_toeslag_vanaf_co2 = 63;
        $diesel_toeslag           = 87.38;
        $co2_diesel               = $co2 - $diesel_toeslag_vanaf_co2;
        $co2_diesel_toeslag       = $co2_diesel * $diesel_toeslag;
        $bpm_arr                  = selectBpm( $co2, $bpm_periode_id, 1 ); // Brandstof Type op benzine (1) i.v.m. berekening.
        $pre_bpm                  = (($co2 - $bpm_arr[0]['meer_dan']) * $bpm_arr[0]['bedrag_vermenigvuldigen']) + $bpm_arr[0]['bedrag_optellen'];
        $bpm                      = $pre_bpm + $co2_diesel_toeslag;
    } elseif ($jaar_toelating == 2019 && $bpm_brandstof_type_id == 2) {
        $diesel_toeslag_vanaf_co2 = 61;
        $diesel_toeslag           = 88.43;
        $co2_diesel               = $co2 - $diesel_toeslag_vanaf_co2;
        $co2_diesel_toeslag       = $co2_diesel * $diesel_toeslag;
        $bpm_arr                  = selectBpm( $co2, $bpm_periode_id, 1 ); // Brandstof Type op benzine (1) i.v.m. berekening.
        $pre_bpm                  = (($co2 - $bpm_arr[0]['meer_dan']) * $bpm_arr[0]['bedrag_vermenigvuldigen']) + $bpm_arr[0]['bedrag_optellen'];
        $bpm                      = $pre_bpm + $co2_diesel_toeslag;
    } elseif ($jaar_toelating == 2020 && $bpm_brandstof_type_id == 2) {
        $diesel_toeslag_vanaf_co2 = 61;
        $diesel_toeslag           = 88.43;
        $co2_diesel               = $co2 - $diesel_toeslag_vanaf_co2;
        $co2_diesel_toeslag       = $co2_diesel * $diesel_toeslag;
        $bpm_arr                  = selectBpm( $co2, $bpm_periode_id, 1 ); // Brandstof Type op benzine (1) i.v.m. berekening.
        $pre_bpm                  = (($co2 - $bpm_arr[0]['meer_dan']) * $bpm_arr[0]['bedrag_vermenigvuldigen']) + $bpm_arr[0]['bedrag_optellen'];
        $bpm                      = $pre_bpm + $co2_diesel_toeslag;
    } elseif ($jaar_toelating == 2021 && $bpm_brandstof_type_id == 2) {
        $diesel_toeslag_vanaf_co2 = 77;
        $diesel_toeslag           = 83.59;
        $co2_diesel               = $co2 - $diesel_toeslag_vanaf_co2;
        $co2_diesel_toeslag       = $co2_diesel * $diesel_toeslag;
        $bpm_arr                  = selectBpm( $co2, $bpm_periode_id, 1 ); // Brandstof Type op benzine (1) i.v.m. berekening.
        $pre_bpm                  = (($co2 - $bpm_arr[0]['meer_dan']) * $bpm_arr[0]['bedrag_vermenigvuldigen']) + $bpm_arr[0]['bedrag_optellen'];
        $bpm                      = $pre_bpm + $co2_diesel_toeslag;
    }elseif ($jaar_toelating == 2022 && $bpm_brandstof_type_id == 2) {
        $diesel_toeslag_vanaf_co2 = 75;
        $diesel_toeslag           = 86.67;
        $co2_diesel               = $co2 - $diesel_toeslag_vanaf_co2;
        $co2_diesel_toeslag       = $co2_diesel * $diesel_toeslag;
        $bpm_arr                  = selectBpm( $co2, $bpm_periode_id, 1 ); // Brandstof Type op benzine (1) i.v.m. berekening.
        $pre_bpm                  = (($co2 - $bpm_arr[0]['meer_dan']) * $bpm_arr[0]['bedrag_vermenigvuldigen']) + $bpm_arr[0]['bedrag_optellen'];
        $bpm                      = $pre_bpm + $co2_diesel_toeslag;
    }elseif($bpm_brandstof_type_id == 4) {// in de NEDC versie is type 4 (PHEV diesel) hetzelfde als PHEV benzine, type 3)
        $bpm_brandstof_type_id=3;
        $bpm_arr = selectBpm( $co2, $bpm_periode_id, $bpm_brandstof_type_id );
        $bpm     = (($co2 - $bpm_arr[0]['meer_dan']) * $bpm_arr[0]['bedrag_vermenigvuldigen']) + $bpm_arr[0]['bedrag_optellen'];
    }else {

        $bpm_arr = selectBpm( $co2, $bpm_periode_id, $bpm_brandstof_type_id );
        $bpm     = (($co2 - $bpm_arr[0]['meer_dan']) * $bpm_arr[0]['bedrag_vermenigvuldigen']) + $bpm_arr[0]['bedrag_optellen'];
    }

    return $bpm;
}

function getYears($datum_toelating_nl) {
	$byear = date( 'Y', strtotime( $datum_toelating_nl ) );

	$bpm_years = [];
	for ($nYear = $byear; $nYear <= date( 'Y' ); $nYear ++) {
		$in                                 = date_create( $datum_toelating_nl );
		$out                                = date_create( $in->format( $nYear . '-m-d' ) );
		$bpm_year                           = $out->format( 'Y' );
		$bpm_years[ $bpm_year ]['bpm_date'] = $out->format( 'Y-m-d' );
	}

	return $bpm_years;
}

function selectBpmPeriod($datum_toelating_nl) {
	$query = "SELECT *
		FROM bpm_periode 
		WHERE geldig_van <= \"$datum_toelating_nl\" AND geldig_tot >= \"$datum_toelating_nl\"
		";

	$result = $_POST['GWIconnector']->query( $query );
	if ( ! $result) {
		$rows[] = null;

		return $rows;
	}
	while ($row = $result->fetch_array( MYSQLI_ASSOC )) {
		$rows[] = $row;
	}

	return $rows;
}

function selectFuelType($brandstof_type) {
	$query = "SELECT *
		FROM bpm_brandstof_type 
		WHERE naam = \"$brandstof_type\"
		";

	$result = $_POST['GWIconnector']->query( $query );
	if ( ! $result) {
		$rows[] = null;

		return $rows;
	}
	while ($row = $result->fetch_array( MYSQLI_ASSOC )) {
		$rows[] = $row;
	}

	return $rows;
}

function selectBpm($co2, $bpm_periode_id, $bpm_brandstof_type_id) {
	$query = "SELECT *
		FROM bpm 
		WHERE brandstof_type = \"$bpm_brandstof_type_id\"
		AND bpm_periode_id = \"$bpm_periode_id\"
		AND meer_dan < \"$co2\" AND niet_meer_dan >= \"$co2\"
		";

	$result = $_POST['GWIconnector']->query( $query );
	if ( ! $result) {
		$rows[] = null;

		return $rows;
	}
	while ($row = $result->fetch_array( MYSQLI_ASSOC )) {
		$rows[] = $row;
	}

	return $rows;
}

function selectBpmWLTP($co2, $bpm_periode_id, $bpm_brandstof_type_id) {
    $query = "SELECT *
		FROM bpm_wltp
		WHERE brandstof_type = \"$bpm_brandstof_type_id\"
		AND bpm_periode_id = \"$bpm_periode_id\"
		AND meer_dan < \"$co2\" AND niet_meer_dan >= \"$co2\"
		";

    $result = $_POST['GWIconnector']->query( $query );
    if ( ! $result) {
        $rows[] = null;

        return $rows;
    }
    while ($row = $result->fetch_array( MYSQLI_ASSOC )) {
        
        $rows[] = $row;
    }

    
    return $rows;
}

function getForfaitairePercentage($months) {
	$query = "SELECT * FROM forfaitaire WHERE maanden = $months";

	$result = $_POST['GWIconnector']->query( $query );
	if ( ! $result) {
		$rows[] = null;

		return $rows;
	}
	while ($row = $result->fetch_array( MYSQLI_ASSOC )) {
		$rows[] = $row;
	}

	return $rows[0];
}