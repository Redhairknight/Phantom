<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Users extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('Page_model');
		$this->load->model('Upload_model');
		if($this->session->userdata('logged_in') !== TRUE ) {
			redirect('Pages/view');
		}
	}

	public function view() {

		$this->load->view('templates/logged_header');
		$username = $this->session->userdata('username');
		$firstName = $this->session->userdata('firstName');
		$lastName = $this->session->userdata('lastName');
		$pic_url = $this->Upload_model->get_url($username);

		$message_num = $this->Page_model->get_message_num();

		$data = array(
			'firstName' => $firstName,
			'lastName' => $lastName,
			'username' => $username,
			'profile_pics' => $pic_url,
			'message_num' => $message_num
		);

		// validate form input
		if (!empty($this->session->flashdata('error'))) {
			$data['error'] = $this->session->flashdata('error');
		}

		if ($this->session->userdata('level')==='1') {
			$level = 'normal account';
			$data['level'] = $level;
			$this->load->view('pages/user', $data);
		} else if($this->session->userdata('level')==='2') {
			$level = 'prime account';
			$data['level'] = $level;
			$this->load->view('pages/primeUser', $data);
		} else {
			echo 'Access Denied';
		}
		$this->load->view('templates/footer');
	}

	public function update() {
		$oldPass = md5($this->input->post('oldPass', TRUE));
		$username = $this->session->userdata('username');
		$result = $this->Page_model->check_pass($oldPass);
		if ($result->num_rows() > 0) {
			$this->Page_model->updatePassword($username);
			redirect('Users/view');
		} else {
			echo 'Wrong Password, Please try again';
		}
	}

	public function viewInfo() {

		// Check if user
		$username = $this->session->userdata('username');
		$password = $this->input->post('cpass', TRUE);
		$result = $this->Page_model->check_user($username, $password);

		// data from userdata session
		$firstName = $this->session->userdata('firstName');
		$lastName = $this->session->userdata('lastName');
		$birthdate = $this->session->userdata('birthdate');

		// data from tbl_info
		$query = $this->Page_model->check_info($username);
		// check if info is empty
		if ($query->num_rows() > 0) {
			$email = $this->Page_model->get_email($username);
			$phone = $this->Page_model->get_phone($username);
		} else {
			$email = 'Please go back and fill email address';
			$phone = 'Please go back and fill phone number';
		}

		// data from tbl_security
		$query = $this->Page_model->check_security($username);
		// check if security question is empty
		if ($query->num_rows() > 0) {
			$answerOne = $this->Page_model->get_answerOne($username);
			$answerTwo = $this->Page_model->get_answerTwo($username);
			$answerThree = $this->Page_model->get_answerThree($username);
		} else {
			$answerOne = 'Please go back and set security questions';
			$answerTwo = 'Please go back and set security questions';
			$answerThree = 'Please go back and set security questions';
		}

		$data = array(
			'firstName' => $firstName,
			'lastName' => $lastName,
			'birthdate' => $birthdate,
			'username' => $username,
			'email' => $email,
			'phone' => $phone,
			'answerOne' => $answerOne,
			'answerTwo' => $answerTwo,
			'answerThree' => $answerThree
		);

		if ($result->num_rows() > 0) {
			$this->load->view('templates/logged_header');
			$this->load->view('pages/info', $data);
			$this->load->view('templates/footer');
		} else {
			echo "<script>alert('The password is not correct');history.go(-1);</script>";
		}
	}

	public function updateInfo() {

		// set rules for validation
		$this->form_validation->set_rules("email", "Email format", "required|valid_email|max_length[50]");
		$this->form_validation->set_rules("phoneNum", "PhoneNumber", "required|integer|min_length[10]|max_length[10]");

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('Users/view');
		} else {
			$username = $this->session->userdata('username');
			$result = $this->Page_model->check_info($username);
			if ($result->num_rows() > 0) {
				if ($this->Page_model->check_email()->num_rows()>0) {
					echo "<script>alert('The email already registered!');document.location='../Users/view'</script>";
				} else {
					$this->Page_model->updateInfo($username);
				}
			} else {
				if ($this->Page_model->check_email()->num_rows()>0) {
					echo "<script>alert('The email is registered.');document.location='../Users/view'</script>";
				} else {
					$this->Page_model->CreateInfo($username);
				}
			}
			echo "<script>alert('You have successfully set the email and phone.');document.location='../Users/view'</script>";
		}
	}

	public function security() {

		// check if security question already set for certain user
		$username = $this->session->userdata('username');
		$result = $this->Page_model->check_security($username);
		if ($result->num_rows() > 0) {
			//update security question
			$this->form_validation->set_rules("answerOne", "Answer1", "required|alpha_numeric|max_length[50]");
			$this->form_validation->set_rules("answerTwo", "Answer2", "required|alpha_numeric|max_length[50]");
			$this->form_validation->set_rules("answerThree", "Answer3", "required|alpha_numeric|max_length[50]");
			if ($this->form_validation->run() == FALSE) {
				$this->load->view('templates/logged_header');
				$this->load->view('pages/security');
				$this->load->view('templates/footer');
			} else {
				$this->Page_model->updateSecurity($username);
				echo "<script>alert('You have successfully update the security question.');document.location='../Users/view'</script>";
			}
//			echo "<script>alert('You have already set the security question, click info button to update');document.location='../Users/view'</script>";
		} else {
			// set rules for validation
			$this->form_validation->set_rules("answerOne", "Answer1", "required|alpha_numeric|max_length[50]");
			$this->form_validation->set_rules("answerTwo", "Answer2", "required|alpha_numeric|max_length[50]");
			$this->form_validation->set_rules("answerThree", "Answer3", "required|alpha_numeric|max_length[50]");

			if ($this->form_validation->run() == FALSE) {
				$this->load->view('templates/logged_header');
				$this->load->view('pages/security');
				$this->load->view('templates/footer');
			} else {
				$this->Page_model->createSecurity();
				echo "<script>alert('You have successfully set the security question.');document.location='../Users/view'</script>";
			}
		}
	}

	public function upgrade() {
		if ($this->session->userdata('level')==='1') {
			$username = $this->session->userdata('username');
			$this->Page_model->upgrade($username);
			echo "<script>alert('Thank you for the purchase, Please login again!');document.location='../Login/logout'</script>";
		}
		else {
			echo "You are already Prime member";
		}
	}

	public function message() {
		$result = $this->Page_model->get_message_num();
		if ($result > 0) {
			echo $result;
		} else {
			echo '';
		}
	}

}
