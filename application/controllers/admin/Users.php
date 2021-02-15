<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Users extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();


		$this->dbs_user_id = $vs_id = $this->session->userdata('us_id');
		$this->login_vs_role_id = $this->dbs_role_id = $vs_role_id = $this->session->userdata('us_role_id');
		$this->load->model('admin/general_model', 'general_model');
		$this->load->model('admin/permissions_model', 'permissions_model');
		// if(isset($vs_id) && (isset($vs_role_id) && $vs_role_id>=1)){

		// 	$res_nums = $this->general_model->check_controller_permission_access('Admin/Users',$vs_role_id,'1');
		// 	if($res_nums>0){

		// 	}else{
		// 		redirect('/');
		// 	} 
		// }else{
		// 	redirect('/');
		// }

		$this->load->model('admin/roles_model', 'roles_model');
		$this->load->model('admin/users_model', 'users_model');
		$this->load->model('admin/countries_model', 'countries_model');
		$this->load->model('admin/admin_model', 'admin_model');
		$perms_arrs = array('role_id' => $vs_role_id);

		$this->load->library('Ajax_pagination');
		$this->perPage = 25;
	}

	/* users functions starts */
	function index()
	{
		// $res_nums = $this->general_model->check_controller_method_permission_access('Admin/Users', 'index', $this->dbs_role_id, '1');
		// if ($res_nums > 0) {


		$users = $this->general_model->get_all_users_without_admin_with_roles();
		$data['roles'] = $this->roles_model->get_all_roles_without_admin();
		$data['records'] = $users;
		// echo json_encode($data);
		// die();
		// $data['page_headings'] = "Users List";
		$this->load->view('admin/users/index', $data);
		// } else {
		// 	$this->load->view('admin/no_permission_access');
		// }
	}

	function trash($args2 = '')
	{
		// $res_nums = $this->general_model->check_controller_method_permission_access('Admin/Users', 'trash', $this->dbs_role_id, '1');
		// if ($res_nums > 0) {

		// $data['page_headings'] = "Users List";
		$user = $this->users_model->get_user_by_id($args2);
		$this->users_model->trash_user($args2);
		$this->session->set_flashdata('deleted_msg', 'User is deleted');
		redirect('admin/users');
		// } else {
		// 	$this->load->view('admin/no_permission_access');
		// }
	}


	function trash_aj()
	{
		$res_nums = $this->general_model->check_controller_method_permission_access('Admin/Users', 'trash', $this->dbs_role_id, '1');
		if ($res_nums > 0) {

			if (isset($_POST["args1"]) && $_POST["args1"] > 0) {
				$args1 = $this->input->post("args1");
				$this->users_model->trash_user($args1);
			}

			$data['records'] = $this->general_model->get_all_users_with_roles();
			$this->load->view('admin/users/index_aj', $data);
		} else {
			$this->load->view('admin/no_permission_access');
		}
	}

	function trash_multiple()
	{

		$res_nums = $this->general_model->check_controller_method_permission_access('Admin/Users', 'trash', $this->dbs_role_id, '1');
		if ($res_nums > 0) {

			if (isset($_POST["multi_action_check"]) && count($_POST["multi_action_check"]) > 0) {
				$del_checks = $_POST["multi_action_check"];
				foreach ($del_checks as $args2) {
					$this->users_model->trash_user($args2);
				}
			}

			$data['records'] = $this->general_model->get_all_users_with_roles();
			$this->load->view('admin/users/index_aj', $data);
		} else {
			$this->load->view('admin/no_permission_access');
		}
	}


	function add()
	{

		// $res_nums = $this->general_model->check_controller_method_permission_access('Admin/Users','add',$this->dbs_role_id,'1'); 
		// if($res_nums>0){ 

		// $data['page_headings'] = 'Add User';

		// $arrs_field = array('role_id' => '2');
		// $data['manager_arrs'] = $this->general_model->get_gen_all_users_by_field($arrs_field);
		$role = $this->general_model->get_role_by_name('User');
		// echo json_encode($role);
		// die();

		if (isset($_POST) && !empty($_POST)) {

			// get form input
			$data = $_POST;
			// echo json_encode($data);
			// die();

			$is_unique_email = '|is_unique[users.email]';
			// if (isset($update_record_arr)) {
			// 	if ($update_record_arr->email == $data['email']) {
			// 		$is_unique_email = '';
			// 	}
			// }
			// form validation
			$this->form_validation->set_rules("fname", "Name", "trim|required|xss_clean");
			$this->form_validation->set_rules("email", "Email", "trim|required|xss_clean|valid_email{$is_unique_email}");
			$this->form_validation->set_rules("username", "Username", "trim|required|xss_clean|is_unique[users.username]");
			$this->form_validation->set_rules("password", "Password", "trim|required|xss_clean");
			$this->form_validation->set_rules("api_key", "Api Key", "trim|required|xss_clean");

			if ($this->form_validation->run() == FALSE) {
				// validation fail
				if (isset($_SESSION['error_msg'])) {
					unset($_SESSION['error_msg']);
				}
				$this->load->view('admin/users/add', $data);
				// redirect('admin/users/add');
			} else {

				$created_on = date('Y-m-d H:i:s');
				$password = $this->general_model->safe_ci_encoder($data['password']);
				$datas = array(
					'fname' => $data['fname'],
					'lname' => $data['lname'],
					'username' => $data['username'],
					'role_id' => $role->id,
					'email' => $data['email'],
					'password' => $password,
					'api_key' => $data['api_key'],
					'created_on' => $created_on,
					'status' => $data['status'],
				);
				// echo json_encode($social_links);
				// die();
				$res = $this->users_model->insert_user_data($datas);

				if (isset($res)) {
					$this->session->set_flashdata('success_msg', 'User added successfully!');
				} else {
					$this->session->set_flashdata('error_msg', 'Error: while adding user!');
				}
				redirect("admin/users");
			}
		} else {
			// $data['countries'] = $this->countries_model->get_all_countries();
			$this->load->view('admin/users/add');
		}

		// }else{ 
		// 	$this->load->view('admin/no_permission_access'); 
		// }   
	}

	function update($args1 = '')
	{

		// $res_nums = $this->general_model->check_controller_method_permission_access('Admin/Users', 'update', $this->dbs_role_id, '1');
		// if ($res_nums > 0) {

		// if (isset($args1) && $args1 != '') {
		// 	$data['args1'] = $args1;
		// 	$data['page_headings'] = 'Update User';
		// 	$update_record_arr = $data['record'] = $this->users_model->get_user_by_id($args1);
		// } else {`	
		// 	$data['page_headings'] = 'Add User';
		// }
		// $arrs_field = array('role_id' => '2');
		// $data['manager_arrs'] = $this->general_model->get_gen_all_users_by_field($arrs_field);
		// $data['role_arrs'] = $this->roles_model->get_all_roles();

		if (isset($_POST) && !empty($_POST)) {
			// get form input
			$data = $_POST;
			// echo json_encode($data);
			// die();

			// form validation
			$this->form_validation->set_rules("fname", "Name", "trim|required|xss_clean");
			$this->form_validation->set_rules("api_key", "Api Key", "trim|required|xss_clean");

			if ($this->form_validation->run() == FALSE) {
				// validation fail
				if (isset($_SESSION['error_msg'])) {
					unset($_SESSION['error_msg']);
				}
				// $this->load->view('admin/users/update', $data);
				redirect('admin/users/update/' . $data['id']);
			} else {
				$datas = array(
					'fname' => $data['fname'],
					'lname' => $data['lname'],
					'api_key' => $data['api_key'],
					'status' => $data['status'],
				);
				if (isset($data['password']) && $data['password'] != '') {
					$password = $this->general_model->safe_ci_encoder($data['password']);
					$datas['password'] = $password;
				}
				// echo json_encode($datas);
				// die();
				$res = $this->users_model->update_user_data($data['id'], $datas);
				if (isset($res)) {
					$this->session->set_flashdata('success_msg', 'User updated successfully!');
				} else {
					$this->session->set_flashdata('error_msg', 'Error: while updating user!');
				}

				redirect("admin/users");
			}
		} else {
			$data['user'] = $this->users_model->get_user_by_id($args1);
			$this->load->view('admin/users/update', $data);
		}
		// } else {
		// 	$this->load->view('admin/no_permission_access');
		// }
	}

	function search()
	{
		$role_id = $this->input->post('role_id');
		$search = $this->input->post('search');
		$paras_arrs = [];
		if($role_id){
			$paras_arrs['role_id'] = $role_id;
		}
		if($search){
			$paras_arrs['q_val'] = $search;
		}
		$users = $this->users_model->get_all_filter_users($paras_arrs);
		foreach($users as $user){
			$role= $this->roles_model->get_role_by_id($user->role_id);
			$user->role_name = $role->name;
		}
		$data['records'] = $users;
		$this->load->view('admin/users/index_partial', $data);
		// echo json_encode($data);
	}
	/* users functions ends */
}
