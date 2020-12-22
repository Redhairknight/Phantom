<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Danmu extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Danmu_model');
	}

	public function sendDanmu($id) {
		$danmu = strip_tags($_POST['danmu']);
		$addtime = time();
		$this->Danmu_model->saveDanmu($danmu, $addtime, $id);
	}

	public function getDanmu($id) {
		$json = '[';
		$result = $this->Danmu_model->getDanmu($id);
		foreach ($result as $row) {
			$json .= $row->content.',';
//			echo ($row->content);
		}
		$json = substr($json,0,-1);
		$json .= ']';
		echo $json;
	}

	public function getPool() {
		$video_id = $this->input->post('v_id');
		$result = $this->Danmu_model->getDanmu($video_id);
		foreach ($result as $row) {
			$content = $row->content;
			$str = explode(",", $content);
			$str2 = $str[0];
			$str3 = substr($str2, 9);
			echo $str3;
			echo "\n\t";
//			""Get it!""123""123""123""This is awersome ""
		}
	}
}
