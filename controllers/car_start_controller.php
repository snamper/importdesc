<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
include_once 'views/view.php';
class element
{
	private $id;


	public function __get($property)
	{
		return $this->$property;
	}
	public function __set($property, $value)
	{
		$this->$property = addslashes($value);
	}
}

class car_start extends view
{

	public function __construct()
	{
		// displayed page index
		$obj = new element();
		$this->base = $_SESSION['base'];

		// Translations 
		if (!isset($_SESSION['user'])) {

			echo json_encode($this->base->getLangTranslations(2));
			return;
		}

		if (isset($_GET['lang_page'])) {

			echo json_encode($this->base->getLangTranslations($_SESSION['user'][0]['langID'], $_GET['lang_page']));
			return;
		}


		/**
		 * At least one of the params MUST BE SET 
		 * IF isset $conversion_type - it WILL GET the conversions for Type
		 * IF isset $conversion_page and NOT SET $conversion_page will return conversions for page 
		 * @param mixed $conversion_type - DEFAULT NULL
		 * @param mixed $conversion_page - DEFAULT NULL
		 */


		$selects_conversions = $this->base->getConversions(NULL, "create_edit_car");
		if (isset($_GET['car_id'])) {
			$single_car = $this->base->getSingleCar($_GET['car_id']);
			$images = $this->base->getCarImages($_GET['car_id']);
			$documents = $this->base->getCarDocuments($_GET['car_id']);
			$this->setData("single_car", $single_car);
		} else {
			$all_car_makes = $this->base->getAllCarMakes();
			$this->setData("all_car_makes", $all_car_makes);
			$images = [];
			$documents = [];
		}

		$users = $this->base->getAllUsers();
		$this->setData("users", $users);

		if (isset($_POST['move_image'])) {
			$this->base->switchImages($_POST, $_POST['car_id']);
			exit;
		}

		if (isset($_POST['update_car'])) {
			if (isset($_POST['car_id'])) {
				$inserted_car_id = $_POST['car_id'];
				$this->base->updateCar($_POST, $_POST['car_id']);
				$this->base->updateCalculation($_POST, $_POST['car_id']);

				if (isset($_POST['car_images'])) {
					foreach ($_POST['car_images'] as $image_data) {
						/* $last_pos = $this->base->getPhotoLastPos($inserted_car_id);
						$last_pos++; */
						list($img_path, $img_pos) = explode('|', $image_data);
						$this->base->insertCarPhoto($img_path, $inserted_car_id, $img_pos);
					}
				}

				if (isset($_POST['car_documents'])) {

					foreach ($_POST['car_documents'] as $doc_path) {
						$this->base->insertCarDocument($doc_path, $inserted_car_id);
					}
				}

				header("Location: /car_start?car_id={$_POST['car_id']}");
			} else {
			}
		}

		$this->setData("car_images", $images);
		$this->setData("single_car_documents", $documents);
		foreach ($selects_conversions as $conv) {
			$this->setData($conv['conversion_type'], $conv);
		}


		if (isset($_POST['allowed']) && isset($_FILES)) {
			$paths = [];
			$imagepos = intval($_POST['last_imagepos']);
			foreach ($_FILES as $file) {
				$filename = $file['name'];
				$fileType = pathinfo($filename, PATHINFO_EXTENSION);
				$randomid = uniqid('doc-');
				$location = "";
				if ($_POST['allowed'] == "image") {
					$location = "uploads/images/" . $randomid . "." . $fileType;
					move_uploaded_file($file['tmp_name'], $location);
					array_push($paths, ['location' => $location, 'pos' => $imagepos]);
					$imagepos++;
				} else {
					$location = "uploads/documents/" . $randomid . "." . $fileType;
					move_uploaded_file($file['tmp_name'], $location);
					array_push($paths, ['name' => $filename, 'location' => $location]);
				}
			}
			echo json_encode($paths);
			exit;
		}

		if (isset($_POST['removed_image'])) {
			$this->base->removeImage($_POST['removed_image'], $_POST['moved_images']);
			exit;
		}

		if (isset($_GET['delete_car_document'])) {
			$this->base->deleteCarDocument($_GET['delete_car_document']);
			exit;
		}

		if (isset($_POST['duplicate_car'])) {
			$car_id = isset($_POST['car_id']) ? $_POST['car_id'] : 0;
			if ($car_id) {
				$num_copies = isset($_POST['duplicate_number']) ? $_POST['duplicate_number'] : 0;
				if ($num_copies) {
					$photos = $this->base->getCarImages($car_id);
					for ($i = 0; $i < $num_copies; $i++) {
						$inserted_car_id = $this->base->createCar($_POST);
						$this->base->createDuplicateEntry($car_id, ('B_' . sprintf("A%'.07d", $car_id) . '_' . ($i + 1)), $inserted_car_id);
						foreach ($photos as $photo) {
							$this->base->insertCarPhoto($photo['cp_path'], $inserted_car_id, intval($photo['cp_imagepos']));
						}
					}
					header("Location: /show_cars");
				} else
					header("Location: /car_start?car_id=$car_id&duplicate");
			}
			exit;
		}

		if (isset($_POST['create_car']) || isset($_POST['create_open_car'])) {
			$inserted_car_id = $this->base->createCar($_POST);

			if (isset($_POST['car_images'])) {
				foreach ($_POST['car_images'] as $image_data) {
					list($img_path, $img_pos) = explode('|', $image_data);
					$this->base->insertCarPhoto($img_path, $inserted_car_id, intval($img_pos));
				}
			}

			if (isset($_POST['car_documents'])) {

				foreach ($_POST['car_documents'] as $doc_info) {
					$this->base->insertCarDocument($doc_info, $inserted_car_id);
				}
			}

			if (isset($_POST['create_open_car'])) {
				header("Location: /car_start?car_id=$inserted_car_id");
			} else {
				header("Location: /show_cars");
			}
			exit;
		}

		// Fetch form fields data

		if (isset($_GET['all_car_makes'])) {
			$car_makes = $this->base->getAllCarMakes();
			echo json_encode($car_makes);
			exit;
		}

		if (isset($_GET['make_id_get_motors'])) {
			$motors = $this->base->getMotorsByMake($_GET['make_id_get_motors']);

			echo json_encode($motors, JSON_UNESCAPED_SLASHES, JSON_HEX_APOS);
			exit;
		}

		if (isset($_GET['make_id_get_uitvoering'])) {
			$uitvoerings = $this->base->getUitvoeringsByMake($_GET['make_id_get_uitvoering']);

			echo json_encode($uitvoerings, JSON_UNESCAPED_SLASHES, JSON_HEX_APOS);
			exit;
		}

		if (isset($_GET['make_id_get_fuels'])) {
			$fuels = $this->base->getFuelByMake($_GET['make_id_get_fuels']);
			echo json_encode($fuels, JSON_UNESCAPED_SLASHES, JSON_HEX_APOS);
			exit;
		}

		if (isset($_GET['get_all_fuels'])) {
			$fuels = $this->base->getFuelAllFuelTypes();
			echo json_encode($fuels, JSON_UNESCAPED_SLASHES, JSON_HEX_APOS);
			exit;
		}

		if (isset($_GET['fuel_id_get_motors'])) {
			$motors = $this->base->getMotorsByFuel($_GET['fuel_id_get_motors'], $_GET['car_make_id']);
			echo json_encode($motors, JSON_UNESCAPED_SLASHES, JSON_HEX_APOS);
			exit;
		}

		if (isset($_GET['get_fuel_by_make'])) {
			$motors = $this->base->getFuelByMake($_GET['get_fuel_by_make'], $_GET['car_make_id']);
			echo json_encode($motors, JSON_UNESCAPED_SLASHES, JSON_HEX_APOS);
			exit;
		}

		if (isset($_GET['get_fuel_by_motor'])) {
			$motors = $this->base->getFuelByMotor($_GET['get_fuel_by_motor']);
			echo json_encode($motors, JSON_UNESCAPED_SLASHES, JSON_HEX_APOS);
			exit;
		}

		if (isset($_GET['make_id_get_models'])) {
			$motors = $this->base->getModelsByMake($_GET['make_id_get_models']);
			echo json_encode($motors, JSON_UNESCAPED_SLASHES, JSON_HEX_APOS);
			exit;
		}



		if (isset($_SESSION['user'])) parent::__construct('click_model_view.php');
		else parent::__construct('login_view.php');
	}

	function checkUploadFolder()
	{
		$this_date = date('ym', time());
		$this_path = "../";

		if (!file_exists($this_path)) {
			mkdir($this_path, 0777, true);
		}
		return "$this_path/";
	}

	private function connectCalculationCar($calculation_id, $car_id)
	{

		$this->base->connectCalculationCar($calculation_id, $car_id);
	}
}
