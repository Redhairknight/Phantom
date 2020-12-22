<?php


class Validation_model extends CI_Model {

	public function __construct() {
		$this->load->database();
	}

	public function check_user($answerOne, $answerTwo, $answerThree) {
		$username = $this->input->post('username');

		$this->db->select('*');
		$this->db->from('tbl_security');
		$this->db->where('username', $username);
		$this->db->where('answerOne', $answerOne);
		$this->db->where('answerTwo', $answerTwo);
		$this->db->where('answerThree', $answerThree);
		$query = $this->db->get();
		return $query;
	}
}
