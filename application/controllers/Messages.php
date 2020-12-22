<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Messages extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Page_model');
		$this->load->model('Video_model');
	}

	public function view() {
		$message_num = $this->Page_model->get_message_num();
		$username = $this->session->userdata('username');
		$data['message_num'] = $message_num;

		$data['messageData'] = $this->Page_model->getMessage();

		$this->load->view('templates/logged_header');
		$this->load->view('pages/message', $data);
		$this->load->view('templates/footer');

		$this->Page_model->read_message();
	}

	public function history() {
		$username = $this->session->userdata('username');

		$data['messageData'] = $this->Page_model->getHistoryMessage();

		$this->load->view('templates/logged_header');
		$this->load->view('pages/message_history', $data);
		$this->load->view('templates/footer');

		$this->Page_model->read_message();
	}
}
