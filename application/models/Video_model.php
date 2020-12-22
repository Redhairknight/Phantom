<?php


class Video_model extends CI_Model {

	public function __construct() {
		$this->load->database();
	}

	function searchVideo($name) {
		$this->db->select('*');
		$this->db->from('tbl_video');
		$this->db->like("title", $name, 'both');
		$this->db->order_by('title', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}

	function searchLike($name) {
		$this->db->select('*');
		$this->db->from('tbl_video');
		$this->db->like("title", $name, 'both');
		$this->db->order_by('recommend', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}

	function getUsers($postData){

		$response = array();

		if(isset($postData['search']) ){
			// Select record
			$this->db->select('*');
			$this->db->where("title like '%".$postData['search']."%' ");

			$records = $this->db->get('tbl_video')->result();

			foreach($records as $row ){
				$response[] = array("value"=>$row->id,"label"=>$row->title);
			}

		}

		return $response;
	}

//	function fetch_data($query)
//	{
//		$this->db->select("*");
//		$this->db->from("tbl_video");
//		if($query != '')
//		{
//			$this->db->like('title', $query);
//			$this->db->or_like('created_at', $query);
//			$this->db->or_like('uploader', $query);
//		}
//		$this->db->order_by('title', 'DESC');
//		return $this->db->get();
//	}

	public function likePost($data) {
		$query = $this->db->insert('tbl_like', $data);
//		if ($query) {
//			echo '1';
//		} else {
//			echo '0';
//		}
	}

	public function unlikePost($data) {
		$username = $data['username'];
		$v_id = $data['video_id'];
		$this->db->where('video_id', $v_id);
		$this->db->where('username', $username);
		$this->db->delete('tbl_like');
	}

	public function checkLike($data) {
		$username = $data['username'];
		$v_id = $data['video_id'];
		$this->db->select('*');
		$this->db->from('tbl_like');
		$this->db->where('username', $username);
		$this->db->where('video_id', $v_id);
		$query = $this->db->get();
		return $query;
	}

	public function countLike($id) {
		$this->db->where('id', $id);
		$this->db->set('recommend', '`recommend`+1', FALSE);
		$this->db->update('tbl_video');
	}

	public function disLike($id) {
		$this->db->where('id', $id);
		$this->db->set('recommend', '`recommend`-1', FALSE);
		$this->db->update('tbl_video');
	}

	function count($id) {
		$this->db->select('recommend');
		$this->db->from('tbl_video');
		$this->db->where('id', $id);
		$query = $this->db->get();
		$value = $query->row();
		return $value->recommend;
	}

	function send_message($receiver) {
		$data = array(
			'username' => $this->session->userdata('username'),
			'message' => $this->input->post('message'),
			'receiver' => $receiver
		);
		$this->db->insert('tbl_message', $data);
	}

	function subscribing($uploader) {
		$data = array (
			"username" => $this->session->userdata('username'),
			"uploader" => $uploader
		);
		$this->db->insert('tbl_subscribe', $data);
	}

	function unsubscribing($uploader) {
		$this->db->where('username', $this->session->userdata('username'));
		$this->db->where('uploader', $uploader);
		$this->db->delete('tbl_subscribe');
	}

	function check_subscribe($uploader) {
		$this->db->select('*');
		$this->db->from('tbl_subscribe');
		$this->db->where('username', $this->session->userdata('username'));
		$this->db->where('uploader', $uploader);
		$query = $this->db->get();
		return $query->num_rows();
	}

	function find_uploader($v_id) {
		$this->db->select('uploader');
		$this->db->from('tbl_video');
		$this->db->where('id', $v_id);
		$query = $this->db->get();
		$value = $query->row();
		return $value->uploader;
	}

	function get_subscribe_num() {
		$username = $this->session->userdata('username');
		$this->db->select('*');
		$this->db->from('tbl_subscribe');
		$this->db->where('username', $username);
		return $this->db->get()->num_rows();
	}

	function getSubscribe() {
		$username = $this->session->userdata('username');
		$this->db->select('*');
		$this->db->from('tbl_subscribe');
		$this->db->where('username', $username);
		return $this->db->get()->result();
	}



//
//	public function count_like($m_id) {
//		$query = $this->db->select('*')->from('tbl_like')->where('video_id', $m_id)->get()->result();
//		return $query;
//	}

//	public function insertLike($Video_id) {
//		$this->db->select('*');
//		$this->db->from('tbl_like');
//		$this->db->where('video_id', $Video_id);
//	}
//
//	public function countLike($video_id) {
//		echo 8;
//	}
}
