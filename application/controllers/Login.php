<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Page_model');
	}

	public function register() {
		$this->load->view('templates/header');
		$this->load->view('pages/register');
		$this->load->view('templates/footer');
	}

	public function create() {
		// set rules for validation
		$this->form_validation->set_rules("lastName", "Your Name", "required|alpha|max_length[20]");
		$this->form_validation->set_rules("firstName", "Your Name", "required|alpha|max_length[20]");
		$this->form_validation->set_rules("birthdate", "BirthDate", "required");
		$this->form_validation->set_rules("username", "Username", "required|alpha_numeric|max_length[20]");
		$this->form_validation->set_rules("password", "Password", "required|alpha_numeric|min_length[8]|max_length[20]|callback_password_check");

		if ($this->form_validation->run() == FALSE) {
			// implement for Ajax for partial loading todo
			$this->load->view('templates/header');
			$this->load->view('pages/register');
			$this->load->view('templates/footer');
		} else {
			$username = $this->input->post('username');
			// check if username already exists
			$result = $this->Page_model->check_username($username);
			if ($result->num_rows() > 0) {
				$this->session->set_flashdata('err_msg','The username has already been registered!');
				$this->load->view('templates/header');
				$this->load->view('pages/register');
				$this->load->view('templates/footer');
			} else {
				$this->Page_model->createData();
				echo "<script>alert('You have successfully register, please sign-in');document.location='../Pages/view'</script>";
			}
		}
	}

	public function password_check($str)
	{
		if (preg_match('#[0-9]#', $str) && preg_match('#[a-zA-Z]#', $str)) {
			return TRUE;
		}
		return FALSE;
	}

	public function auth() {

		// if not exist, post Return false
		$username = $this->input->post('username', TRUE);
		$password = $this->input->post('password', TRUE);
		$remember = $this->input->post('remember_me');
		$result = $this->Page_model->check_user($username, $password);

		if ($result->num_rows() > 0) {
			$data = $result->row_array();
			$username = $data['username'];
			$password = $data['password'];
			$level = $data['level'];
			$firstName = $data['firstName'];
			$lastName = $data['lastName'];
			$birthdate = $data['birthdate'];
			$pic_url = $data['profile_pics'];
			$sessionData = array(
				'firstName' => $firstName,
				'lastName' => $lastName,
				'username' => $username,
				'password' => $password,
				'level' => $level ,
				'birthdate' => $birthdate ,
				'profile_pics' => $pic_url,
				'logged_in' => TRUE
			);
			// record login session, and set session time (test)
			$this->session->set_userdata($sessionData);
			// remember me cookie
			if ($remember && $this->session->userdata('logged_in')) {
//				$decode_pass = $this->encryption->decrypt($password, 'sasdhjkqwec');
				$this->input->set_cookie('uname', $username, 3600);
				$this->input->set_cookie('upassword', $password, 3600);
			} else {
				delete_cookie('uname');
				delete_cookie('upassword');
			}

			redirect('Users/view');

		} else {
//				go back to previous page (-1)
			echo "<script>alert('The username or password is not correct');history.go(-1);</script>";
		}
	}

	// user logo out
	public function logout() {
		$this->session->sess_destroy();
		redirect('Pages/view');

	}
}
