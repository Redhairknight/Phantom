<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class Pages extends CI_Controller{

		public function __construct()
		{
			parent::__construct();
			$this->load->model('Page_model');
		}

		public function view($page = 'home'){
			if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
				show_404();
			}
			$data['title'] = ucfirst($page);

			// test
//			$this->load->helper('dd');
//			echo dd('123');

			// if logged-in, direct to another page
			if ($this->session->userdata('logged_in')) {
				$this->load->view('templates/logged_header');
			} else {
				$this->load->view('templates/header');
				// test
//				$this->load->helper('dd');
//				echo dd('123');
			}

			// get data for video gallery
			$data['videoData'] = $this->Page_model->readVideo();
			$data['likeData'] = $this->Page_model->readLike();
//			$data['results'] = $this->Page_model->readComment();

			$this->load->view('pages/'.$page, $data);
			$this->load->view('templates/footer');
		}

	}
