<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Paypal extends CI_Controller{

	function  __construct(){
		parent::__construct();

		// Load paypal library & product model
		$this->load->library('paypal_lib');
		$this->load->model('product');
	}

	function success(){
		// Pass the transaction data to view
		$this->load->view('paypal/success');
	}

	function cancel(){
		// Load payment failed view
		$this->load->view('paypal/cancel');
	}
}
