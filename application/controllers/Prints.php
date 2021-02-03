<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Prints extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->dbs_user_id = $vs_id = $this->session->userdata('vs_user_id');
		$this->login_usr_role_id = $this->dbs_user_role_id = $vs_user_role_id = $this->session->userdata('vs_user_role_id');
		// $this->load->model('user/general_model', 'general_model');
		// $this->load->model('user/permissions_model', 'permissions_model');
		$this->load->model('user/prints_model', 'prints_model');
		$this->load->model('user/designs_model', 'designs_model');
		if (isset($vs_id) && (isset($vs_user_role_id) && $vs_user_role_id >= 1)) {
		} else {
			redirect('login');
		}

		$this->api_token = $this->config->item('api_token');
		// $this->load->model('user/dashboard_model', 'dashboard_model');
		// $this->load->model('user/admin_model', 'admin_model');
		// $this->load->library('Ajax_pagination');
		// $this->perPage = 12;
	}

	public function design()
	{
		$id = $this->input->get('id');
		$design = $this->designs_model->get_design_by_id($id);
		$data['design'] =  $design;
		$data['default_barcode'] = barcode_url() . 'barcode.png';
		// echo $id;
		// die();
		$this->load->view('frontend/print/design', $data);
	}

	public function label()
	{
		$data = $_POST;
		if ($data && !empty($data)) {
			$product_id = $data['product_id'];
			// $qty = $data['qty'];
			// $design_id = $data['design_id'];

			$url = "https://app.rackbeat.com/api/products/$product_id";
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
			$data['barcode_image'] = $response->product->barcode . '.png';
			$data['created_on'] = date('Y-m-d H:i:s');

			$insert = $this->prints_model->insert_print_data($data);
			if ($insert) {
				$design = $this->designs_model->get_design_by_id($data['design_id']);
				$datas = [
					'design' => $design,
					'qty' => $data['qty'],
					'barcode_image' => $data['barcode_image']
				];
				// echo json_encode($datas);
				// die();
				$this->load->view('frontend/print/label', $datas);
			} else {
				$this->session->set_flashdata('error_msg', 'An error has been generated while printing label, please try again!');
				redirect('label');
			}
		} else {
			$this->session->set_flashdata('error_msg', 'Error: Label not found!');
			redirect('label');
		}
		// $id = $this->input->post('id');
		// $design = $this->designs_model->get_design_by_id($id);
		// $data['design'] =  $design;
		// $data['default_barcode'] = barcode_url() . 'barcode.png';
		// // echo $id;
		// // die();
		// $this->load->view('frontend/print/design', $data);
	}
}
