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

		/**
		 * At least one of the params MUST BE SET 
		 * IF isset $conversion_type - it WILL GET the conversions for Type
		 * IF isset $conversion_page and NOT SET $conversion_page will return conversions for page 
		 * @param mixed $conversion_type - DEFAULT NULL
		 * @param mixed $conversion_page - DEFAULT NULL
		 */

		$selects_conversions = $this->base->getConversions(NULL, "create_edit_car");
		if(isset($_GET['car_id'])) {
			$single_car = $this->base->getSingleCar($_GET['car_id']);
			$this->setData("single_car", $single_car);
			// echo '<pre>';
			// var_dump($single_car);
			// echo '</pre>';
			// exit;
		 	$images = $this->base->getCarImages($_GET['car_id']);
		}else {
			$images = [];
		}

		$this->setData("car_images", $images);		
		foreach ($selects_conversions as $conv) {
			$this->setData($conv['conversion_type'], $conv);
		}

		if (isset($_POST['create_car'])) {
			$inserted_car_id = $this->base->createCar($_POST);

			if (!empty($_FILES['upload_photo']['name'][0])) {
				$this->createCarUploads($_FILES['upload_photo'], $inserted_car_id, "uploads/images");
			}

			if (!empty($_FILES['upload_document']['name'][0])) {

				$this->createCarUploads($_FILES['upload_document'], $inserted_car_id, "uploads/documents");
			}

			
		}


		if (isset($_SESSION['user'])) parent::__construct('click_model_view.php');
		else parent::__construct('login_view.php');
	}

	public function createCarUploads($files, $inserted_car_id, $directory)
	{

		$total_files = count($files['name']);
		for ($i = 0; $i < $total_files; $i++) {
			$target_dir = dirname(__DIR__) . "/$directory";
			$target_file = $target_dir . basename($files["name"][$i]);
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
			$new_file_name = "$inserted_car_id" . time() . "." . $imageFileType;
			$new_file_path = "$target_dir/$new_file_name";

			// Check file size
			if ($files["size"][$i] > 5 * 1048576) { // 5 MB
				$_SESSION['error_msg'][] = 'The file You are trying to upload is too large';
				$uploadOk = 0;
			}


			// Allow certain file formats			
			if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "txt") {
				// echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";              
				if (move_uploaded_file($files["tmp_name"][$i], $new_file_path)) {
					$uploadOk == 1;					
				}
			} else {
				// Check if $uploadOk is set to 0 by an error
				if ($uploadOk == 0) {
					$_SESSION['error_msg'][] = 'There was error uploading a file, please try again';
				} else { // if everything is ok, try to upload file

					move_uploaded_file($files["tmp_name"][$i], $new_file_path);
					if ($directory == "uploads/images") {

						$this->base->insertCarPhoto("$directory/$new_file_name", $inserted_car_id);
					} else {

						$this->base->insertCarDocument("$directory/$new_file_name", $inserted_car_id);
					}
				}
				sleep(1);
			}
		}
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
