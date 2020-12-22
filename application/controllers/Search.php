<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class Search extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('Video_model');
		}

		public function search() {
			// XSS filtering
			$keyword = $this->input->post('keyword', TRUE);
			$data['keyword'] = $keyword;

			$data['searchData'] = $this->Video_model->searchVideo($keyword);

			if (count($data['searchData']) == 0) {
				$data['keyword'] = "$keyword is not found";
			}

			if ($this->session->userdata('logged_in')) {
				$this->load->view('templates/logged_header');
			} else {
				$this->load->view('templates/header');
			}
			$this->load->view('pages/search', $data);
			$this->load->view('templates/footer');
		}

		public function userList(){
			// POST data
			$postData = $this->input->post();

			// Get data
			$data = $this->Video_model->getUsers($postData);

			echo json_encode($data);
		}

		public function recent($keyword) {
			$data['keyword'] = $keyword;
			$data['searchData'] = $this->Video_model->searchVideo($keyword);

			if (count($data['searchData']) == 0) {
				$data['keyword'] = "$keyword is not found";
			}

			if ($this->session->userdata('logged_in')) {
				$this->load->view('templates/logged_header');
			} else {
				$this->load->view('templates/header');
			}
			$this->load->view('pages/search', $data);
			$this->load->view('templates/footer');
		}

		public function liked($keyword) {
			$data['keyword'] = $keyword;
			$data['searchData'] = $this->Video_model->searchLike($keyword);

			if (count($data['searchData']) == 0) {
				$data['keyword'] = "$keyword is not found";
			}

			if ($this->session->userdata('logged_in')) {
				$this->load->view('templates/logged_header');
			} else {
				$this->load->view('templates/header');
			}
			$this->load->view('pages/search', $data);
			$this->load->view('templates/footer');
		}

//		public function fetch(){
//			$output = '';
//			$query = '';
//			if($this->input->post('query')){
//				$query = $this->input->post('query');
//			}
//			$data = $this->Video_model->fetch_data($query);
//			if($data->num_rows() > 0){
//				echo json_encode ($data->result());
//			}else{
//				$output .= 'No Data Found';
//			}
//			echo $output;
//		}
	}
