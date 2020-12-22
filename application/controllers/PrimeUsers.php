<?php

class PrimeUsers extends CI_Controller {
	public function __construct() {
		parent::__construct();
		
		// load model
		$this->load->model('Page_model');

		if($this->session->userdata('logged_in') !== TRUE ) {
			redirect('Pages/view');
		}
	}

	public function view() {
		if ($this->session->userdata('level')==='2') {
			$username = $this->session->userdata('username');
			$data['username'] = $username;
			$level = 'prime account';
			$data['level'] = $level;
			$this->load->view('templates/logged_header');
			$this->load->view('pages/primeUser', $data);
			$this->load->view('templates/footer');
		} else {
			echo "Access Denied";
		}
	}
	
}
