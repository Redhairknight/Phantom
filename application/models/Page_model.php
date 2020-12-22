<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	function createData() {
		$data = array (
			"lastName" => $this->input->post('lastName'),
			"firstName" => $this->input->post('firstName'),
			"birthdate" => $this->input->post('birthdate'),
			"username" => $this->input->post('username'),
			"password" => md5($this->input->post('password'))
		);
		$this->db->insert('tbl_register', $data);
	}

	function createComment($v_name) {
		$data = array(
			'video_name' => $v_name,
			"comment" => $this->input->post('content'),
			"username" => $this->session->userdata('username')
		);
		$this->db->insert('tbl_comment', $data);
	}

	function createSecurity() {
		$data = array(
			"username" => $this->session->userdata('username'),
			"answerOne" => $this->input->post('answerOne'),
			"answerTwo" => $this->input->post('answerTwo'),
			"answerThree" => $this->input->post('answerThree')
		);
		$this->db->insert('tbl_security', $data);
	}

	function createInfo() {
		$data = array(
			"username" => $this->session->userdata('username'),
			'email' => $this->input->post('email'),
			'phone' => $this->input->post('phoneNum')
		);
		$this->db->insert('tbl_info', $data);
	}

	function readVideo() {

		// get the 8 latest upload video
		$this->db->select('*');
		$this->db->from('tbl_video');
		$this->db->limit(8);
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}

	function readLike() {
		// get the 8 video with most likes
		$this->db->select('*');
		$this->db->from('tbl_video');
		$this->db->limit(8);
		$this->db->order_by('recommend', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}

	function getVideo($name) {
		$this->db->select('*');
		$this->db->from('tbl_video');
		$this->db->where('file_name', $name);
		$query = $this->db->get();
		return $query->result();
	}

	function readComment($v_name) {
		$this->db->select('*');
		$this->db->from('tbl_comment');
		$this->db->where('video_name', $v_name);

		$query = $this->db->get();
//		$query = $this->db->query('SELECT * FROM tbl_comment');
		return $query->result();
	}

	function updateComment($id) {
		$data = array(
			"comment" => $this->input->post('content'),
			"username" => $this->session->userdata('username')
		);
		$this->db->where('id', $id);
		$this->db->update('tbl_comment', $data);
	}

	function updatePassword($username) {
		$data = array(
			"password" => md5($this->input->post('newPass'))
		);

		$this->db->where('username', $username);
		$this->db->update('tbl_register', $data);
	}

	function updateInfo($username) {
		$data = array(
			'email' => $this->input->post('email'),
			'phone' => $this->input->post('phoneNum')
		);
		$this->db->where('username', $username);
		$this->db->update('tbl_info', $data);
	}

	function get_email($username) {
		$this->db->select('email');
		$this->db->from('tbl_info');
		$this->db->where('username', $username);
		$query = $this->db->get();
		$value = $query->row();
		return $value->email;
	}

	function get_phone($username) {
		$this->db->select('phone');
		$this->db->from('tbl_info');
		$this->db->where('username', $username);
		$query = $this->db->get();
		$value = $query->row();
		return $value->phone;
	}

	// get video name by its id
	function get_vname($c_id) {
		$this->db->select('video_name');
		$this->db->from('tbl_comment');
		$this->db->where('id', $c_id );
		$query = $this->db->get();
		$value = $query->row();
		return $value->video_name;
	}

	function updateSecurity($username) {
		$data = array(
			"answerOne" => $this->input->post('answerOne'),
			"answerTwo" => $this->input->post('answerTwo'),
			"answerThree" => $this->input->post('answerThree')
		);
		$this->db->where('username', $username);
		$this->db->update('tbl_security', $data);
	}

	function get_answerOne($username) {
		$this->db->select('answerOne');
		$this->db->from('tbl_security');
		$this->db->where('username', $username);
		$query = $this->db->get();
		$value = $query->row();
		return $value->answerOne;
	}

	function get_answerTwo($username) {
		$this->db->select('answerTwo');
		$this->db->from('tbl_security');
		$this->db->where('username', $username);
		$query = $this->db->get();
		$value = $query->row();
		return $value->answerTwo;
	}

	function get_answerThree($username) {
		$this->db->select('answerThree');
		$this->db->from('tbl_security');
		$this->db->where('username', $username);
		$query = $this->db->get();
		$value = $query->row();
		return $value->answerThree;
	}

	function deleteComment($id) {
		$this->db->where('id', $id);
		$this->db->delete('tbl_comment');
	}

	function check_pass($oldPass) {
		$this->db->select('*');
		$this->db->from('tbl_register');
		$this->db->where('password', $oldPass);
		$query = $this->db->get();
		return $query;
	}

	function check_email() {
		$email = $this->input->post('email');
		$this->db->select('*');
		$this->db->from('tbl_info');
		$this->db->where('email', $email);
		$query = $this->db->get();
		return $query;
	}

	function check_username($username) {
		$this->db->select('*');
		$this->db->from('tbl_register');
		$this->db->where('username', $username);
		$query = $this->db->get();
		return $query;
	}

	function check_user($username, $password) {
		$this->db->select('*');
		$this->db->from('tbl_register');
		$this->db->where('username', $username);
		$this->db->group_start()->where('password', md5($password))->or_where('password', $password)->group_end();
		$query = $this->db->get();
		return $query;
	}

	function check_security($username) {
		$this->db->select('*');
		$this->db->from('tbl_security');
		$this->db->where('username', $username);
		$query = $this->db->get();
		return $query;
	}

	function check_info($username) {
		$this->db->select('*');
		$this->db->from('tbl_info');
		$this->db->where('username', $username);
		$query = $this->db->get();
		return $query;
	}

	function upgrade($username)
	{
		$data = array(
			'level' => 2
		);
		$this->db->set($data);
		$this->db->where('username', $username);
		$this->db->update('tbl_register');
	}

	function get_message_num() {
		$username = $this->session->userdata('username');
		$this->db->select('*');
		$this->db->from('tbl_message');
		$this->db->where('receiver', $username);
		$this->db->where('status', 0);
		return $this->db->get()->num_rows();
	}

	function getMessage() {
		$username = $this->session->userdata('username');
		$this->db->select('*');
		$this->db->from('tbl_message');
		$this->db->where('receiver', $username);
		$this->db->where('status', 0);
		return $this->db->get()->result();
	}

	function getHistoryMessage() {
		$username = $this->session->userdata('username');
		$this->db->select('*');
		$this->db->from('tbl_message');
		$this->db->where('receiver', $username);
		$this->db->where('status', 1);
		return $this->db->get()->result();
	}

	function read_message() {
		$username = $this->session->userdata('username');
		$data = array(
			"status" => 1
		);
		$this->db->select('*');
		$this->db->from('tbl_message');
		$this->db->where('receiver', $username);
		$this->db->update('tbl_message', $data);
	}
}
