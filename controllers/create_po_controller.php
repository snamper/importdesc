<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
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

		$order_id = 0;
		if (isset($_GET['order_id'])) {
			$order_id = $_GET['order_id'];
		} elseif (isset($_POST['update_order'])) {
			$order_id = $_POST['update_order'];
		}

		if (isset($_GET['delete_po_document'])) {
			$this->base->deletePoDocument($_GET['delete_po_document']);
			exit;
		}

		if (isset($_POST['update_order_submit'])) {

			if ($order_id > 0) {
				// IF UPDATE ORDER 
				if (isset($_POST['update_order'])) {
					$this->base->updateOrder($_POST);
					foreach ($_POST['purchase_lines'] as $car_id) {
						$car_info = $this->base->getSingleCar($car_id);
						$this->base->addPoLines($car_info, $order_id);
					}
					header('location: /create_po?order_id=' . $order_id);
					exit;
				}
			} else {
				// ELSE IF CREATE ORDER
				$order_id = $this->base->createNewOrder($_POST);

				foreach ($_POST['purchase_lines'] as $car_id) {
					$car_info = $this->base->getSingleCar($car_id);
					$this->base->addPoLines($car_info, $order_id);
				}

				header('location: /create_po?order_id=' . $order_id);
				exit;
			}
		}

		$po_documents = $this->base->getPODocuments($order_id);
		$this->setData("po_documents", $po_documents);

		$poSums = $this->base->getPOSums($order_id);
		$this->setData("poSums", $poSums);

		if (isset($_POST['clickable-table-post'])) {

			echo $this->base->changePurchaseTableCol($_POST);
			exit;
		}

		if (isset($_GET['delete_line'])) {
			$this->base->deletePoLine($_GET['delete_line']);

			header("Location: $_SESSION[last_page]");
			exit;
		}


		if (isset($_POST['save_changes_line']) && $order_id > 0) {

			foreach ($_POST['add_purchase_line'] as $car_id) {
				$car_info = $this->base->getSingleCar($car_id);
				$this->base->addPoLines($car_info, $order_id);
			}

			unset($_POST['add_purchase_line']);
		}


		if (isset($_POST['add_purchase_line'])) {

			$lines_array = [];
			$lines_array = array_merge($lines_array, $_POST['add_purchase_line']);


			if (isset($_POST['purchase_lines'])) {
				$lines_array = array_merge($lines_array, $_POST['purchase_lines']);
			}

			$lines_array = array_unique($lines_array);

			$this->setData("purchase_lines", $lines_array);
		} else if (isset($_POST['purchase_lines'])) {
			$this->setData("purchase_lines", $_POST['purchase_lines']);
		}



		if (isset($_POST['save_order'])) {

			// IF UPDATE ORDER 
			if (isset($_POST['update_order'])) {
				$this->base->updateOrder($_POST);
				foreach ($_POST['purchase_lines'] as $car_id) {
					$car_info = $this->base->getSingleCar($car_id);
					$this->base->addPoLines($car_info, $order_id);
				}

				header('location: /create_po?order_id=' . $order_id);
				exit;
			}

			// ELSE IF CREATE ORDER
			$order_id = $this->base->createNewOrder($_POST);

			foreach ($_POST['purchase_lines'] as $car_id) {
				$car_info = $this->base->getSingleCar($car_id);
				$this->base->addPoLines($car_info, $order_id);
			}

			header('location: /create_po?order_id=' . $order_id);
			exit;
		}


		$arr_items = [
			'po_number',
			'po_reference',
			'po_supplier',
			'po_date',
			'po_intermediary_supplier',
			'po_contact_person',
			'po_source_supplier',
			'po_contact_person_source',
			'po_purchasing_entity',
			'po_buyer',
			'po_currency',
			'po_vat_deposit',
			'po_vat_percentage',
			'po_down_payment',
			'po_down_payment_amount',
			'po_exchange',
			'po_invoice',
			'po_currency_rate',
			'po_purchase_type',
			'po_internal_reference_custom',
			'po_external_order_number',
			'po_payment_terms',
			'po_prepayment_amount',
			'po_expected_invoice_date',
			'po_remarks',
			'po_created_by_id',
			'po_status',
			'status_label'
		];
		$arr = [];

		if ($order_id > 0) {
			$singleOrder = $this->base->getSinglePurchaseOrder($order_id);
			foreach ($arr_items as $item) {
				$arr[$item] = isset($singleOrder[$item]) ? $singleOrder[$item] : '';
			}
			if($singleOrder['po_exchange'] == 1) {
				$currencyFixedRate = $singleOrder['po_currency_rate'];
				$this->setData('converted_values', [
					'total_purchase_value_eur' => round($poSums['total_purchase_value'] * $currencyFixedRate, 2),
					'total_fee_intermediate_supplier_eur' => round($poSums['total_fee_intermediate_supplier'] * $currencyFixedRate, 2),
					'total_transport_cost_eur' => round($poSums['total_transport_cost'] * $currencyFixedRate, 2),
					'total_vehicle_bpm_eur' => round($poSums['total_vehicle_bpm'] * $currencyFixedRate, 2)
				]);
			}
			else {
				$currencyLiveRate = $this->base->getEurConversion($singleOrder['po_currency']);
				$this->setData('converted_values', [
					'total_purchase_value_eur' => round($poSums['total_purchase_value'] * $currencyLiveRate, 2),
					'total_fee_intermediate_supplier_eur' => round($poSums['total_fee_intermediate_supplier'] * $currencyLiveRate, 2),
					'total_transport_cost_eur' => round($poSums['total_transport_cost'] * $currencyLiveRate, 2),
					'total_vehicle_bpm_eur' => round($poSums['total_vehicle_bpm'] * $currencyLiveRate, 2)
				]);
			}
		} else {
			foreach ($arr_items as $item) {
				$arr[$item] = '';
			}
		}

		$this->setData('purch_order', $arr);


		if (isset($_SESSION['user'])) parent::__construct('create_po_view.php');
		else parent::__construct('login_view.php');
	}
}
