<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Account extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('user/general_model', 'general_model');
		$this->load->model('user/roles_model', 'roles_model');
		$this->load->model('user/users_model', 'users_model');
	}

	public function signin()
	{
		if ($_POST && !empty($_POST)) {
			// echo json_encode($_POST);
			// die();
			$username = $this->input->post("username");
			$password = $this->input->post("password");

			// form validation 
			$this->form_validation->set_rules("username", "Username", "trim|required|xss_clean");
			$this->form_validation->set_rules("password", "Password", "trim|required|xss_clean");

			if ($this->form_validation->run() == FALSE) {
				// validation fail 
				if (isset($_SESSION['error_msg'])) {
					unset($_SESSION['error_msg']);
				}
				$this->load->view('frontend/account/signin');
				// $this->session->set_flashdata('error_msg', 'Login Failed');
				// redirect('login');
			} else {
				// check for user credentials
				/*$password = md5($password);*/
				$password = $this->general_model->safe_ci_encoder($password);
				$result = $this->users_model->get_user($username, $password);
				if (isset($result)) {
					if ($result->status == 1) {

						// $last_login_on = date('Y-m-d H:i:s');
						// $ip_address = $_SERVER['REMOTE_ADDR'];

						// $update_array = array('last_login_on' => $last_login_on,'ip_address' => $ip_address); 
						// $rec = $this->users_model->update_member_data($result->id,$update_array); 

						// set session	
						$cstm_sess_data = array(
							'vs_user_login' => TRUE,
							'vs_user_id' => $result->id,
							'vs_user_role_id' => $result->role_id,
							'vs_user_username' => ucfirst($result->username),
							'vs_user_email' => $result->email
						);

						$this->session->set_userdata($cstm_sess_data);

						redirect("dashboard");
					} else {
						$this->session->set_flashdata('error_msg', 'Your account is Inactive, please contact Admin!');
						$this->load->view('frontend/account/signin');
					}
				} else {
					$this->session->set_flashdata('error_msg', 'Email or Password is incorrect!');
					redirect('login');
				}
			}
		} else {
			$this->load->view('frontend/account/signin');
		}
	}

	public function signup()
	{
		if ($_POST && !empty($_POST)) {
			// echo json_encode($_POST);
			// die();
			$username = $this->input->post("username");
			$password = $this->input->post("password");
			$email = $this->input->post("email");
			$fname = $this->input->post("fname");
			$lname = $this->input->post("lname");

			// form validation 
			$this->form_validation->set_rules("username", "Username", "trim|required|xss_clean|is_unique[users.username]");
			$this->form_validation->set_rules("email", "Email", "trim|required|xss_clean|valid_email|is_unique[users.email]");
			$this->form_validation->set_rules("password", "Password", "trim|required|xss_clean");

			if ($this->form_validation->run() == FALSE) {
				// validation fail 
				if (isset($_SESSION['error_msg'])) {
					unset($_SESSION['error_msg']);
				}
				$this->load->view('frontend/account/signup');
				// $this->session->set_flashdata('error_msg', 'An error has been generated while creating an account, please try again!');
				// redirect('register');
			} else {
				$password = $this->general_model->safe_ci_encoder($password);
				$role = $this->roles_model->get_role_by_name('User');
				$created_on = date('Y-m-d H:i:s');
				$status = 1;
				$datas = array(
					'username' => $username,
					'fname' => $fname,
					'lname' => $lname,
					'email' => $email,
					'password' => $password,
					'role_id' => $role->id,
					'status' => $status,
					'created_on' => $created_on
				);
				// echo json_encode($datas);
				// die();
				$insert_data = $this->users_model->insert_user_data($datas);
				if (isset($insert_data)) {
					$result = $this->users_model->get_user_by_id($insert_data);

					// set session	
					$cstm_sess_data = array(
						'vs_user_login' => TRUE,
						'vs_user_id' => $result->id,
						'vs_user_role_id' => $result->role_id,
						'vs_user_username' => ucfirst($result->username),
						'vs_user_fname' => ucfirst($result->fname),
						'vs_user_lname' => ucfirst($result->lname),
						'vs_user_email' => $result->email
					);

					$this->session->set_userdata($cstm_sess_data);

					redirect("dashboard");
					// $this->session->set_flashdata('success_msg', 'Your account has been created successfully, please login to access your account!');
					// redirect("login");
				} else {
					$this->session->set_flashdata('error_msg', 'An error has been generated while creating an account, please try again!');
					redirect('register');
				}
			}
		} else {
			$this->load->view('frontend/account/signup');
		}
	}

	public function profile()
	{
		$this->dbs_user_id = $vs_id = $this->session->userdata('vs_user_id');
		$this->login_usr_role_id = $this->dbs_user_role_id = $vs_user_role_id = $this->session->userdata('vs_user_role_id');
		if (isset($vs_id) && (isset($vs_user_role_id) && $vs_user_role_id >= 1)) {
		} else {
			redirect('login');
		}
		if ($_POST && !empty($_POST)) {
			// echo json_encode($_POST);
			// die();
			$fname = $this->input->post("fname");
			$lname = $this->input->post("lname");

			// form validation 
			$this->form_validation->set_rules("fname", "First Name", "trim|required|xss_clean");
			$this->form_validation->set_rules("lname", "Last Name", "trim|required|xss_clean");

			if ($this->form_validation->run() == FALSE) {
				// validation fail 
				if (isset($_SESSION['error_msg'])) {
					unset($_SESSION['error_msg']);
				}
				redirect('profile');
				// $this->session->set_flashdata('error_msg', 'An error has been generated while creating an account, please try again!');
				// redirect('register');
			} else {
				$datas = array(
					'fname' => $fname,
					'lname' => $lname
				);
				if (isset($_POST['password']) && $_POST['password'] != '') {
					$password = $this->general_model->safe_ci_encoder($_POST['password']);
					$datas['password'] = $password;
				}
				// echo json_encode($datas);
				// die();
				$insert_data = $this->users_model->update_user_data($vs_id,$datas);
				if (isset($insert_data)) {
					
					$result = $this->users_model->get_user_by_id($vs_id);
					$cstm_sess_data = array(
						'vs_user_login' => TRUE,
						'vs_user_id' => $result->id,
						'vs_user_role_id' => $result->role_id,
						'vs_user_username' => ucfirst($result->username),
						'vs_user_fname' => ucfirst($result->fname),
						'vs_user_lname' => ucfirst($result->lname),
						'vs_user_email' => $result->email
					);

					$this->session->set_userdata($cstm_sess_data);
					$this->session->set_flashdata('success_msg', 'Your profile has been updated successfully');
					redirect("profile");
				} else {
					$this->session->set_flashdata('error_msg', 'An error has been generated while updating profile, please try again!');
					redirect('profile');
				}
			}
		} else {
			$vs_user_id = $this->session->userdata('vs_user_id');
			$user = $this->users_model->get_user_by_id($vs_user_id);
			$data['user'] = $user;
			$this->load->view('frontend/account/profile', $data);
		}
	}

	public function logoff()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
}
