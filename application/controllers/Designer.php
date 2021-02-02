<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Designer extends CI_Controller {

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

		// $this->load->model('user/dashboard_model', 'dashboard_model');
		// $this->load->model('user/admin_model', 'admin_model');
		// $this->load->library('Ajax_pagination');
		// $this->perPage = 6;
	}

	public function index()
	{
		$designs = $this->designs_model->get_all_designs();
		// echo json_encode($designs);
		// die();
		$data['designs'] = $designs;
		$this->load->view('frontend/designer/index', $data);
	}

	public function get_design()
	{
		$id = $this->input->post("id");
		if($id) {
			$design = $this->designs_model->get_design_by_id($id);
			$response = [
				'message' => 200,
				'data' => $design,
				'image' => barcode_url().'barcode.png'
			];
		} else {
			$response = [
				'message' => 500,
				'data' => []
			];
		}
		echo json_encode($response);
	}

	public function create()
	{
		if ($_POST && !empty($_POST)) {
			$data = $_POST;

			// echo json_encode($data);
			// die();
			$this->form_validation->set_rules("name", "Name", "trim|required|xss_clean");
			$this->form_validation->set_rules("type", "Type", "trim|required|xss_clean");
			$this->form_validation->set_rules("width", "Width", "trim|required|xss_clean");
			$this->form_validation->set_rules("height", "Height", "trim|required|xss_clean");
			$this->form_validation->set_rules("w_location", "W Location", "trim|required|xss_clean");
			$this->form_validation->set_rules("h_location", "H Location", "trim|required|xss_clean");
			$this->form_validation->set_rules("size", "Size", "trim|required|xss_clean");
			$this->form_validation->set_rules("font_style", "Font Style", "trim|required|xss_clean");

			if ($this->form_validation->run() == FALSE) {
				// validation fail 
				if (isset($_SESSION['error_msg'])) {
					unset($_SESSION['error_msg']);
				}
				$data['default_barcode'] = barcode_url().'barcode.png';
				$this->load->view('frontend/designer/create');
			} else {
				$created_on = date('Y-m-d H:i:s');
				$datas = array(
					'width' => $data['width'],
					'height' => $data['height'],
					'w_location' => $data['w_location'],
					'h_location' => $data['h_location'],
					'name' => $data['name'],
					'type' => $data['type'],
					'size' => $data['size'],
					'font_style' => $data['font_style'],
					'user_id' => $this->dbs_user_id,
					'created_on' => $created_on
				);
				// echo json_encode($datas);
				// die();
				$insert_data = $this->designs_model->insert_design_data($datas);
				if (isset($insert_data)) {
					$this->session->set_flashdata('success_msg', 'Design Added');
					redirect("designer");
				} else {
					$this->session->set_flashdata('error_msg', 'An error has been generated while adding design, please try again!');
					$data['default_barcode'] = barcode_url().'barcode.png';
					redirect('designer/create');
				}
			}
		} else {
			$data['default_barcode'] = barcode_url().'barcode.png';
			$this->load->view('frontend/designer/create', $data);
		}
	}
}
