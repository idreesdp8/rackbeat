<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prints extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->dbs_user_id = $vs_id = $this->session->userdata('vs_user_id');
		$this->login_usr_role_id = $this->dbs_user_role_id = $vs_user_role_id = $this->session->userdata('vs_user_role_id');
		// $this->load->model('user/general_model', 'general_model');
		// $this->load->model('user/permissions_model', 'permissions_model');
		// $this->load->model('user/gigs_model', 'gigs_model');
		$this->load->model('user/designs_model', 'designs_model');
		if (isset($vs_id) && (isset($vs_user_role_id) && $vs_user_role_id >= 1)) {
		} else {
			redirect('login');
		}

		$this->load->model('user/dashboard_model', 'dashboard_model');
		// $this->load->model('user/admin_model', 'admin_model');
		$this->load->library('Ajax_pagination');
		// $this->perPage = 12;
	}

	public function design()
	{
		$id = $this->input->get('id');
		$design = $this->designs_model->get_design_by_id($id);
		$data['design'] =  $design;
		$data['default_barcode'] = barcode_url().'barcode.png';
		// echo $id;
		// die();
		$this->load->view('frontend/print/design', $data);
	}
}
