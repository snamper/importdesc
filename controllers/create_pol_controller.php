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

class create_pol extends view
{

	public function __construct()
	{

		if (!isset($_SESSION['user'])) {
			header("Location: /login ");
			exit;
		}
		
		$this->base = $_SESSION['base'];

		if(isset($_POST['convert_to_eur'])) {
			echo $this->base->getEurConversion($_POST['convert_to_eur']);
			exit;
		}

		if(!isset($_REQUEST['order_id']) || !isset($_REQUEST['line'])) {
			header("Location: /login ");
			exit;
		}

		$po = $_REQUEST['order_id'];

		if(isset($_POST['add_order_lines'])) {
			foreach ($_POST['add_purchase_line'] as $car_id) {
				$car_info = $this->base->getSingleCar($car_id);
				$this->base->addPoLines($car_info, $po);
			}
		}

		$line = $_REQUEST['line'];
		
		if(isset($_POST['save_pol'])) {
			$this->base->updatePoLine($_POST['save_pol']);
		}

		$poData = $this->base->getSinglePurchaseOrder($po);
		if(!$poData) {
			$url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/create_po";
			header("Location: $url");
			exit;
		}

		$this->setData('po_data', $poData);

		$poLines = $this->base->getPOLines($po);

		if(empty($poLines)) {
			$url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/create_po?order_id=$po";
			header("Location: $url");
			exit;
		}

		// echo '<pre>';
		// var_dump($poLines);
		// echo '</pre>';
		// exit;

		$current_line_num = null;
		$pol_count = count($poLines);
		for($i = 0; $i < $pol_count; $i++) {
			if($poLines[$i]['pl_id'] == $line)
				$current_line_num = $i;
		}
		if($current_line_num === null) {
			$url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/create_pol?order_id=$po&line={$poLines[0]['pl_id']}";
			header("Location: $url");
			exit;
		}
		
		$this->setData('current_pol_num', $current_line_num+1);
		$this->setData('pol_data', $poLines[$current_line_num]);
		$this->setData('count_pol', $pol_count);
		$this->setData('prev_pol_id', ($current_line_num-1 < 0) ? null : $poLines[$current_line_num-1]['pl_id']);
		$this->setData('next_pol_id', ($current_line_num+1 >= $pol_count) ? null : $poLines[$current_line_num+1]['pl_id']);

		if($poData['po_exchange'] == 1) {
			$currencyFixedRate = $poData['po_currency_rate'];
			$this->setData('converted_values', [
				'purchase_value_eur' => round($poLines[$current_line_num]['pl_purchase_value'] * $currencyFixedRate, 2),
				'fee_intermediate_supplier_eur' => round($poLines[$current_line_num]['pl_fee_intermediate_supplier'] * $currencyFixedRate, 2),
				'transport_cost_eur' => round($poLines[$current_line_num]['pl_transport_cost'] * $currencyFixedRate, 2)
			]);
		}
		else {
			$currencyLiveRate = $this->base->getEurConversion($poData['po_currency']);
			$this->setData('converted_values', [
				'purchase_value_eur' => round($poLines[$current_line_num]['pl_purchase_value'] * $currencyLiveRate, 2),
				'fee_intermediate_supplier_eur' => round($poLines[$current_line_num]['pl_fee_intermediate_supplier'] * $currencyLiveRate, 2),
				'transport_cost_eur' => round($poLines[$current_line_num]['pl_transport_cost'] * $currencyLiveRate, 2)
			]);
		}
		$this->setData('documents', $this->base->getDocuments('line', $poLines[$current_line_num]['pl_id']));

		if (isset($_SESSION['user'])) parent::__construct('create_pol_view.php');
		else parent::__construct('login_view.php');
	}
}
