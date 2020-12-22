<?php


class Validation extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('Validation_model');
		$this->load->model('Page_model');

		$this->load->helper('captcha');
		$this->load->helper('string');
	}

	public function index() {

		// create captcha
		$this->load->helper('captcha');
		$this->load->helper('string');
		$config = array(
			'word' => random_string('numeric', 5),
			'img_path' => 'assets/',
			'img_url' => 'https://infs3202-487f973c.uqcloud.net/phantom/assets/',
			'img_width' => '170',
			'img_height' => 50,
			'expiration' => 60,
			'word_length' => 5,
			'font-size' => 20,
			'colors' => array(
				'background' => array(255, 255, 255),
				'border' => array(255, 255, 255),
				'text' => array(0, 0, 0),
				'grid' => array(255, 40, 40)
			)
		);
		$captcha = create_captcha($config);
		$data['captchaImg'] = $captcha['image'];

		$this->load->view('templates/header');
		$this->load->view('pages/validate', $data);
		$this->load->view('templates/footer');
		$this->session->set_userdata($captcha);
	}

	public function resetPass() {
		// select captcha image content
		$word = $this->session->userdata('word');
		$captchaInput = $this->input->post('captcha');

		// store username in temp session
		$username = $this->input->post('username');

		$answerOne = $this->input->post('answerOne', TRUE);
		$answerTwo = $this->input->post('answerTwo', TRUE);
		$answerThree = $this->input->post('answerThree', TRUE);

		// check if three answer are correct and image content correct
		if ($word == $captchaInput) {
			$result = $this->Validation_model->check_user($answerOne, $answerTwo, $answerThree);

			if ($result->num_rows() > 0 ) {
				$this->load->view('templates/header');
				$this->load->view('pages/resetPassword');
				$this->load->view('templates/footer');

				$sessionData = array (
					'username' => $username
				);
				$this->session->set_userdata($sessionData);

			} else {
				echo "<script>alert('You entered wrong answers or you did not setup security questions or wrong captcha');history.go(-1);</script>";
			}
		}
		else {
			echo "<script>alert('Wrong captcha');history.go(-1);</script>";
		}
	}

	public function updatePass() {
		$username = $this->session->userdata('username');
		
		// form validation
		$this->form_validation->set_rules("newPass", "New Password", "required|min_length[5]|max_length[20]");
		$this->form_validation->set_rules("rePass", "Confirm Password", "required");

		$newPass = $this->input->post('newPass');
		$rePass = $this->input->post('rePass');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header');
			$this->load->view('pages/resetPassword');
			$this->load->view('templates/footer');
		} else {
			if ($newPass === $rePass) {
				$this->Page_model->updatePassword($username);
				$this->session->sess_destroy();
				echo "<script>alert('You have successfully reset your password! Please sign in.');document.location='../Pages/view'</script>";
			} else {
				$this->session->set_flashdata('error_msg', 'Two input has to be the same!');
				$this->load->view('templates/header');
				$this->load->view('pages/resetPassword');
				$this->load->view('templates/footer');
			}
		}
	}

	public function sendEmail() {
		$username = $this->input->post('username');

		$result = $this->Page_model->check_username($username);
		if ($result->num_rows() > 0) {
			$email = $this->Page_model->get_email($username);
			$to = $email;

			$subject = 'Welcome';

			$from = 'c.liu12@uqconnect.edu.au';

			$emailContent = '<!DOCTYPE><html><head></head><body><tr><td style="padding-left:3%">
						<p>Hello, '. $username.'</p></td></tr>';;

			$emailContent .= '<p>Please click link to reset your password,</p><p><strong><a href="'.site_url().'Validation/updatePass/">Click Here</a></strong>';


			$config = array(
				'protocol' => 'smtp',
				'smtp_host' => 'mailhub.eait.uq.edu.au',
				'smtp_port' => 25,
				'mailtype' => 'html',
				'charset' => 'iso-8859-1',
				'wordwrap' => TRUE,
				'newline' => '\r\n'
			);

			$this->load->library('email', $config);
			$this->email->initialize($config);
			$this->email->from($from);
			$this->email->to($to);
			$this->email->subject($subject);
			$this->email->message($emailContent);
			$this->email->send();

			$sessionData = array (
				'username' => $username
			);
			$this->session->set_userdata($sessionData);


			$this->session->set_flashdata('msg', 'Mail has been sent');
			$this->session->set_flashdata('msg_class', 'alert-success');


			return redirect('Validation/index');
		} else {
			$this->session->set_flashdata('err_msg','The username is not exist');
			$this->load->view('templates/header');
			$this->load->view('pages/validate');
			$this->load->view('templates/footer');
		}
	}
}
