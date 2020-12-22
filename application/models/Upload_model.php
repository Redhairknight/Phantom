<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Upload_model extends CI_Model {

	function __construct()
	{
		$this->load->database();
	}

	function create_video($file_name) {
		$data = array(
			'title' => $this->input->post('title') ,
			'type' => $this->input->post('type'),
			'view' => 0,
			'file_name' => $file_name,
			'uploader' => $this->session->userdata('username'),
		);
		$this->db->insert('tbl_video', $data);
	}

	function create_image($file_name) {
		$data = array(
			'file_name' => $file_name,
			'uploader' => $this->session->userdata('username'),
		);
		$this->db->insert('tbl_image', $data);
	}

	function update_image($file_name) {
		$username = $this->session->userdata('username');
		$data = array(
			"profile_pics" => $file_name
		);
		$this->db->where('username', $username);
		$this->db->update('tbl_register', $data);
	}

	function get_url($username) {
		$this->db->select('profile_pics');
		$this->db->from('tbl_register');
		$this->db->where('username', $username);
		$query = $this->db->get();
		$value = $query->row();
		return $value->profile_pics;
	}

	function historyImg($username) {
		$this->db->select('*');
		$this->db->from('tbl_image');
		$this->db->where('uploader', $username);
		$query = $this->db->get();
		return $query->result();
	}

	function historyVideo($username) {
		$this->db->select('*');
		$this->db->from('tbl_video');
		$this->db->where('uploader', $username);
		$query = $this->db->get();
		return $query->result();
	}

	function deleteImage($id) {
		$this->db->where('id', $id);
		$this->db->delete('tbl_image');
	}

	function deleteVideo($id) {
		$this->db->where('id', $id);
		$this->db->delete('tbl_video');
	}
}
