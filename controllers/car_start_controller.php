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

		if(isset($_POST['move_image'])) {
			$this->base->switchImages($_POST, $_POST['car_id']);
			exit;
		}

		if (isset($_POST['update_car'])) {
			if (isset($_POST['car_id'])) {
				$inserted_car_id = $_POST['car_id'];
                $this->base->updateCar($_POST, $_POST['car_id']);
				$this->base->updateCalculation($_POST, $_POST['car_id']);

                if(isset($_POST['car_images'])) {
                    foreach($_POST['car_images'] as $image_data) {
						/* $last_pos = $this->base->getPhotoLastPos($inserted_car_id);
						$last_pos++; */
						list($img_path, $img_pos) = explode('|', $image_data);
                        $this->base->insertCarPhoto($img_path, $inserted_car_id, $img_pos);
                    }
                }

                if(isset($_POST['car_documents'])) {

                    foreach($_POST['car_documents'] as $doc_path) {
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
				} else {					
					$location = "uploads/documents/" . $randomid . "." . $fileType;
				}

				move_uploaded_file($file['tmp_name'], $location);

				array_push($paths, [ 'location' => $location, 'pos' => $imagepos ]);
				$imagepos++;
			}
			echo json_encode($paths);
			exit;
		}

		if (isset($_POST['create_car'])) {
			$inserted_car_id = $this->base->createCar($_POST);

			if(isset($_POST['car_images'])) {
				foreach($_POST['car_images'] as $image_data) {
					list($img_path, $img_pos) = explode('|', $image_data);
					$this->base->insertCarPhoto($img_path, $inserted_car_id, intval($img_pos));
				}
			}

			if(isset($_POST['car_documents'])) {
			
				foreach($_POST['car_documents'] as $doc_path) {
					$this->base->insertCarDocument($doc_path, $inserted_car_id);
				}
			}

			header("Location: /car_start?car_id=$inserted_car_id");
			exit;
		}

		if (isset($_GET['all_car_makes'])) {
			$car_makes = $this->base->getAllCarMakes();
			echo json_encode($car_makes);
			exit;
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
			if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "txt"  && $imageFileType != "docx" && $imageFileType != "pdf") {
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

						$this->base->insertCarPhoto("$directory/$new_file_name", $inserted_car_id, $files['name'][$i]);
					} else {

						$this->base->insertCarDocument("$directory/$new_file_name", $inserted_car_id, $files['name'][$i]);
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
