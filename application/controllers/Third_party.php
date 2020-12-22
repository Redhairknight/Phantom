<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Third_party extends CI_Controller {

		public function __construct() {
			parent::__construct();
		}

		public function position() {
			$this->load->library('googlemaps');

			$config['center'] = '-27.498533, 153.040040';
			$config['zoom'] = 'auto';
			$this->googlemaps->initialize($config);
			
			$marker = array();
			$marker['position'] = '-27.498533, 153.040040';
			$this->googlemaps->add_marker($marker);
			$data['map'] = $this->googlemaps->create_map();
			
			$this->load->view('pages/map', $data);
		}
}
