<?php

//==============================Route=========================================//

    $route['home'] = 'controllers/index_controller.php';

	$route['projecten'] = 'controllers/projecten_controller.php';

	$route['contacten'] = 'controllers/contacten_controller.php';

	$route['dossier'] = 'controllers/dossier_controller.php';

	$route['agenda'] = 'controllers/agenda_controller.php';

	$route['intf'] = 'controllers/interface_controller.php';

	$route['login'] = 'controllers/login_controller.php';

	$route['organisaties'] = 'controllers/organisaties_controller.php';

	$route['artikelen'] = 'controllers/artikelen_controller.php';

	$route['medewerkers'] = 'controllers/medewerkers_controller.php';

	$route['creditor'] = 'controllers/creditor_controller.php';

	$route['debtor'] = 'controllers/debtor_controller.php';

	$route['carform'] = 'controllers/carform_controller.php';

	$route['marge'] = 'controllers/marge_controller.php';

	$route['btw'] = 'controllers/btw_controller.php';

	$route['nedc'] = 'controllers/nedc_controller.php';

	$route['wltp'] = 'controllers/wltp_controller.php';

	$route['create_car'] = 'controllers/create_car_controller.php';

	$route['show_cars'] = 'controllers/show_cars_controller.php';

	
    $route['create_make'] = 'controllers/create_make_controller.php';
	$route['edit_car'] = 'controllers/edit_car_controller.php';

	$route['calculation'] = 'controllers/calculation_controller.php';	
	$route['show_calculations'] = 'controllers/show_calculations_controller.php';
	
	$route['click_model'] = 'controllers/click_model_controller.php';
	$route['click_model2'] = 'controllers/click_model_controller-2.php';

	$route['create_make_new'] = 'controllers/create_make_new_controller.php';

	$route['car_start'] = 'controllers/car_start_controller.php';

	
	
//============================================================================//
return $route;
