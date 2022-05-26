<?php
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

class create_po extends view
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

		if (isset($_GET['delete_line'])) {
			$this->base->deletePoLine($_GET['delete_line']);
		}

		$order_id = $_REQUEST['order_id'] ?? 0;
		$line = $_REQUEST['line'] ?? 0;

		if(isset($_POST['delete_order'])) {
			$this->base->deletePO($order_id);
			header("location: /create_po");
			exit;
		}

		if (isset($_POST['clickable-table-post'])) {
			echo $this->base->changePurchaseTableCol($_POST);
			exit;
		}

		if (isset($_POST['add_purchase_line'])) {

			if($order_id > 0) {
				foreach ($_POST['add_purchase_line'] as $car_id) {
					$car_info = $this->base->getSingleCar($car_id);
					//if(!$this->base->checkCarInPOLine($car_id)) {
						$this->base->addPoLines($car_info, $order_id);
					//}
				}
				unset($_POST['add_purchase_line']);
			}
			else {
				$lines_array = [];
				$lines_array = array_merge($lines_array, $_POST['add_purchase_line']);

				if (isset($_POST['purchase_lines'])) {
					$lines_array = array_merge($lines_array, $_POST['purchase_lines']);
				}

				$lines_array = array_unique($lines_array);

				$this->setData("purchase_lines", $lines_array);
			}
		} else if (isset($_POST['purchase_lines'])) {
			$this->setData("purchase_lines", $_POST['purchase_lines']);
		}
		else {
			$this->setData("purchase_lines", []);
		}

		if (isset($_POST['save_order'])) {
			if ($order_id > 0) {
				$status = $this->base->getOrderStatus($order_id);
				if($status && $status != 2) {
					$this->updateOrder($order_id, $line);
					$this->base->updateOrderStatus($order_id, $_POST['save_order']);
				}
				header("location: /create_po?order_id=$order_id&line=$line");
				exit;
			}
			$order_id = $this->createOrder();
			header("location: /create_po?order_id=$order_id&line=$line");
			exit;
		}

		$this->setData('po_documents', $this->base->getDocuments('order', $order_id));

		$poSums = $this->base->getPOSums($order_id);
		$this->setData("poSums", $poSums);

		if ($order_id > 0) {

			if(isset($_POST['update_status'])) {
				$this->base->updateOrderStatus($order_id, $_POST['update_status']);
			}

			$singleOrder = $this->base->getSinglePurchaseOrder($order_id);
			$this->setData('purch_order', $singleOrder);

			$useCurrency = floatval(($singleOrder['po_exchange'] == 1) ? $singleOrder['po_currency_rate'] : $this->base->getEurConversion($singleOrder['po_currency']));

			$poLines = $this->base->getPOLines($order_id);

			if(!empty($poLines)) {
				$current_line_num = null;
				$pol_count = count($poLines);
				for($i = 0; $i < $pol_count; $i++) {
					if($poLines[$i]['pl_id'] == $line)
						$current_line_num = $i;
				}
				if($current_line_num === null) {
					$url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/create_po?order_id=$order_id&line={$poLines[0]['pl_id']}";
					header("Location: $url");
					exit;
				}
				
				$this->setData('current_pol_num', $current_line_num+1);
				$this->setData('pol_data', $poLines[$current_line_num]);
				$this->setData('count_pol', $pol_count);
				$this->setData('prev_pol_id', ($current_line_num-1 < 0) ? null : $poLines[$current_line_num-1]['pl_id']);
				$this->setData('next_pol_id', ($current_line_num+1 >= $pol_count) ? null : $poLines[$current_line_num+1]['pl_id']);

				if($singleOrder['po_exchange'] == 1) {
					$currencyFixedRate = $singleOrder['po_currency_rate'];
					$this->setData('pl_converted_values', [
						'purchase_value_eur' => round($poLines[$current_line_num]['pl_purchase_value'] * $currencyFixedRate, 2),
						'fee_intermediate_supplier_eur' => round($poLines[$current_line_num]['pl_fee_intermediate_supplier'] * $currencyFixedRate, 2),
						'transport_cost_eur' => round($poLines[$current_line_num]['pl_transport_cost'] * $currencyFixedRate, 2)
					]);
				}
				else {
					$currencyLiveRate = $this->base->getEurConversion($singleOrder['po_currency']);
					$this->setData('pl_converted_values', [
						'purchase_value_eur' => round($poLines[$current_line_num]['pl_purchase_value'] * $currencyLiveRate, 2),
						'fee_intermediate_supplier_eur' => round($poLines[$current_line_num]['pl_fee_intermediate_supplier'] * $currencyLiveRate, 2),
						'transport_cost_eur' => round($poLines[$current_line_num]['pl_transport_cost'] * $currencyLiveRate, 2)
					]);
				}
				$this->setData('line_documents', $this->base->getDocuments('line', $poLines[$current_line_num]['pl_id']));
			}
			else {
				$this->setData('current_pol_num', 0);
				$this->setData('count_pol', 0);
			}

			$this->setData('po_converted_values', [
				'total_purchase_value_eur' => round(floatval($poSums['total_purchase_value']) * $useCurrency, 2),
				'total_fee_intermediate_supplier_eur' => round(floatval($poSums['total_fee_intermediate_supplier']) * $useCurrency, 2),
				'total_transport_cost_eur' => round(floatval($poSums['total_transport_cost']) * $useCurrency, 2),
				'total_vehicle_bpm_converted' => round(($useCurrency ? floatval($poSums['total_vehicle_bpm']) / $useCurrency : 0), 2)
			]);
		} else {
			$this->setData('current_pol_num', 0);
			$this->setData('count_pol', 0);

			$this->setData('po_converted_values', [
				'total_purchase_value_eur' => 0,
				'total_fee_intermediate_supplier_eur' => 0,
				'total_transport_cost_eur' => 0,
				'total_vehicle_bpm_converted' => 0
			]);
		}
		$this->setData('all_currencies', $this->base->getAllCurrencies());
		$this->setData('suppliers_list', $this->base->getAllSuppliersList());



		if (isset($_SESSION['user'])) parent::__construct('create_po_view.php');
		else parent::__construct('login_view.php');
	}

	public function updateOrder($order_id, $line) {
		$this->base->updateOrder($order_id, $_POST);
		
		if($line > 0) {
			$this->base->updatePoLine($line);
		}

		foreach ($_POST['purchase_lines'] as $car_id) {
			$car_info = $this->base->getSingleCar($car_id);
			//if($this->base->checkCarInPOLine($car_id)) {
				$this->base->addPoLines($car_info, $order_id);
			//}
		}
	}

	public function createOrder() {
		$order_id = $this->base->createNewOrder($_POST);

		foreach ($_POST['purchase_lines'] as $car_id) {
			$car_info = $this->base->getSingleCar($car_id);
			//if(!$this->base->checkCarInPOLine($car_id)) {
				$this->base->addPoLines($car_info, $order_id);
			//}
		}
		return $order_id;
	}
}
