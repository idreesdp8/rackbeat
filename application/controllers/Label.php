<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Label extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->dbs_user_id = $vs_id = $this->session->userdata('vs_user_id');
		$this->login_usr_role_id = $this->dbs_user_role_id = $vs_user_role_id = $this->session->userdata('vs_user_role_id');
		$this->api_token = $this->session->userdata('vs_user_token');
		$this->load->model('user/sessions_model', 'sessions_model');
		// $this->load->model('user/general_model', 'general_model');
		$this->load->model('user/designs_model', 'designs_model');
		// $this->load->model('user/users_model', 'users_model');
		if (isset($vs_id) && (isset($vs_user_role_id) && $vs_user_role_id >= 1)) {
			// /* ok */
			// $res_nums = $this->general_model->check_controller_permission_access('Admin/Dashboard', $vs_user_role_id, '1');
			// if ($res_nums > 0) {
			// 	/* ok */
			// } else {
			// 	redirect('/');
			// }
		} else {
			redirect('login');
		}

		// $this->load->model('user/dashboard_model', 'dashboard_model');
		// $this->load->model('user/admin_model', 'admin_model');
		// $this->load->library('Ajax_pagination');
		// $this->perPage = 6;
	}

	public function index()
	{
		// echo $this->api_token;
		// die();
		$designs = $this->designs_model->get_all_designs();
		if ($this->api_token) {
			// $products = array();
			$url = 'https://app.rackbeat.com/api/products';
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
			curl_setopt($ch, CURLOPT_HEADER, FALSE);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
				"Authorization: Bearer $this->api_token"
			));
			$response1 = curl_exec($ch);
			$response1 = json_decode($response1);
			$products = $response1->products;
			$pages = $response1->pages;
			for ($i = 2; $i <= $pages; $i++) {
				$url = "https://app.rackbeat.com/api/products?page=$i";
				// $ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
				curl_setopt($ch, CURLOPT_HEADER, FALSE);
				curl_setopt($ch, CURLOPT_HTTPHEADER, array(
					"Authorization: Bearer $this->api_token"
				));
				$response = curl_exec($ch);
				$response = json_decode($response);
				foreach($response->products as $product){
					array_push($products, $product);
				}
				// $temp = $response->products;
			}
			curl_close($ch);
			$user_session_key = $this->dbs_user_id;
			$session = $this->sessions_model->get_session_by_session_key($user_session_key);
			$product_names = array_column($products, 'name', 'urlfriendly_number');
			$datas = [
				'session_key' => $user_session_key,
				'session_value' => json_encode($product_names)
			];
			if($session){
				$update = $this->sessions_model->update_session_data($session->id, $datas);
			} else {
				$datas['created_on'] = date('Y-m-d H:i:s');
				$insert = $this->sessions_model->insert_session_data($datas);
			}
			// $this->session->set_productData(['products' => $products]);
			// echo json_encode($datas);
			// die();
			$data['products'] = $response1->products;
			$data['pages'] = $response1->pages;
			$data['curr_page'] = $response1->page;
			$data['designs'] = $designs;
		} else {
			$data['products'] = array();
			$data['pages'] = null;
			$data['curr_page'] = null;
			$data['designs'] = $designs;
		}
		// echo json_encode($data);
		// die();
		$this->load->view('frontend/label/index', $data);
	}
	public function load_page()
	{
		$page_no = $this->input->post('page_no');
		$url = "https://app.rackbeat.com/api/products?page=$page_no";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			"Authorization: Bearer $this->api_token"
		));
		$response = curl_exec($ch);
		curl_close($ch);
		$designs = $this->designs_model->get_all_designs();
		// echo $response;
		// die();
		$response = json_decode($response);
		$data['products'] = $response->products;
		$data['pages'] = $response->pages;
		$data['curr_page'] = $response->page;
		$data['designs'] = $designs;
		$this->load->view('frontend/label/index_partial', $data);
	}
	public function search_product()
	{
		$search = $this->input->post('search');
		$user_session_key = $this->dbs_user_id;
		$session = $this->sessions_model->get_session_by_session_key($user_session_key);
		$products_names = json_decode($session->session_value);
		$product_ids = $this->array_partial_search($products_names, $search);
		$ch = curl_init();
		foreach($product_ids as $product_id) {
			$url = "https://app.rackbeat.com/api/products/$product_id";
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
			curl_setopt($ch, CURLOPT_HEADER, FALSE);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
				"Authorization: Bearer $this->api_token"
			));
			$response = curl_exec($ch);
			$temp = json_decode($response);
			$products[] = $temp->product;
		}
		curl_close($ch);
		// echo json_encode($products);
		$designs = $this->designs_model->get_all_designs();
		$data['products'] = $products ?? array();
		$data['pages'] = '0';
		$data['curr_page'] = '0';
		$data['designs'] = $designs;
		$this->load->view('frontend/label/index_partial', $data);
	}

	function array_partial_search( $array, $keyword ) {
		$found = [];
		// Loop through each item and check for a match.
		foreach ( $array as $key => $value ) {
			// If found somewhere inside the string, add.
			if ( strpos( $value, $keyword ) !== false ) {
				$found[] = $key;
			}
		}
		return $found;
	}

	public function get_product()
	{
		require 'vendor/autoload.php';
		$id = $this->input->post("id");
		if ($id) {
			$url = "https://app.rackbeat.com/api/products/$id";
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
			curl_setopt($ch, CURLOPT_HEADER, FALSE);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
				"Authorization: Bearer $this->api_token"
			));
			$response = curl_exec($ch);
			curl_close($ch);
			$response = json_decode($response);

			if ($response->product->barcode && $response->product->barcode != '') {
				//GENERATE BARCODE
				$generator = new Picqer\Barcode\BarcodeGeneratorPNG();
				file_put_contents(barcode_relative_path() . $response->product->barcode . '.png', $generator->getBarcode($response->product->barcode, $generator::TYPE_CODE_128, 3, 50));
				$barcode = barcode_url() . $response->product->barcode . '.png';
				$response = [
					'message' => 200,
					'data' => $response->product,
					'image' => $barcode
				];
			} else {
				$response = [
					'message' => 200,
					'data' => $response->product,
					'image' => ''
				];
			}
		} else {
			$response = [
				'message' => 500,
				'data' => []
			];
		}
		echo json_encode($response);
	}
}
