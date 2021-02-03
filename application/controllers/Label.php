<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Label extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->dbs_user_id = $vs_id = $this->session->userdata('vs_user_id');
		$this->login_usr_role_id = $this->dbs_user_role_id = $vs_user_role_id = $this->session->userdata('vs_user_role_id');
		// $this->load->model('user/general_model', 'general_model');
		// $this->load->model('user/permissions_model', 'permissions_model');
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

		$this->api_token = $this->config->item('api_token');
		// $this->load->model('user/dashboard_model', 'dashboard_model');
		// $this->load->model('user/admin_model', 'admin_model');
		// $this->load->library('Ajax_pagination');
		// $this->perPage = 6;
	}

	public function index()
	{
		$url = 'https://app.rackbeat.com/api/products';
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
		$data['designs'] = $designs;
		$this->load->view('frontend/label/index', $data);
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
					'message' => 500,
					'data' => []
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
