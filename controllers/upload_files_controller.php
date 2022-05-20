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

class upload_files extends view
{

	public function __construct()
	{

		if (!isset($_SESSION['user'])) {
			header("Location: /login ");
			exit;
		}
		
		$this->base = $_SESSION['base'];

		if(isset($_POST['delete_doc']) && isset($_POST['doc_id'])) {
			$this->base->deleteDocument($_POST['doc_id']);
			exit;
		}

		if(isset($_POST['type']) && isset($_FILES) && count($_FILES) > 0) {
			$target_id = $_POST['target'] ?? 0;
			$sort = $_POST['sort'] ?? '';
			echo json_encode($this->base->uploadFiles($_POST['type'], $sort, $target_id, $_FILES));
		}

		exit;
	}
}
