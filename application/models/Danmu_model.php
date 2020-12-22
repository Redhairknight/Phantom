<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Danmu_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function saveDanmu($danmu, $addtime, $id) {
		$data = array (
			"content" => $danmu,
			"addtime" => $addtime,
			"video_id" => $id
		);
		$this->db->insert('tbl_danmu', $data);
	}

	public function getDanmu($id) {
		$this->db->select('*');
		$this->db->from('tbl_danmu');
		$this->db->where('video_id', $id);
		$query = $this->db->get();
		return $result = $query->result();
	}
}
