<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class Videos extends CI_Controller{

		public function __construct()
		{
			parent::__construct();
			$this->load->model('Page_model');
			$this->load->model('Video_model');
			$this->load->model('Danmu_model');
		}

		public function create($name) {
			if ($this->session->userdata('logged_in')) {
				$this->Page_model->createComment($name);
				redirect("Videos/view/".$name);
			} else {
				echo "<script>alert('You need to login to comment');document.location='../Pages/view/video'</script>";
			}
		}

		public function view($name) {
			$data['results'] = $this->Page_model->readComment($name);
			$data['file_name'] = $name;

			// find the certain role with filename $name
			$result = $this->Page_model->getVideo($name);

			// get value in array
			$data['check_video'] = $result;
			if ($this->session->userdata('logged_in')) {
				$this->load->view('templates/logged_header');
			} else {
				$this->load->view('templates/header');
			}

			$this->load->view('pages/video', $data);
			$this->load->view('templates/footer');
		}

		public function update($id) {
			$this->Page_model->updateComment($id);
			$name = $this->Page_model->get_vname($id);

			redirect("Videos/view/".$name);
		}

		public function delete($id) {
			$name = $this->Page_model->get_vname($id);
			$this->Page_model->deleteComment($id);

			redirect("Videos/view/".$name);
		}

		public function like(){
			$video_id = $this->input->post('v_id');
			$username = $this->session->userdata('username');
			$data = array(
				'video_id' => $video_id,
				'username' => $username
			);
			$result = $this->Video_model->checkLike($data);
			if ($result->num_rows() > 0) {
				echo $this->Video_model->count($video_id);
			} else {
				if ($this->session->userdata("logged_in")) {
					$this->Video_model->likePost($data);
					$this->Video_model->countLike($video_id);
					echo $this->Video_model->count($video_id);
				} else {
					echo $this->Video_model->count($video_id);
				}
			}
		}

		public function unlike() {
			$video_id = $this->input->post('v_id');
			$username = $this->session->userdata('username');
			$data = array(
				'video_id' => $video_id,
				'username' => $username
			);
			$result = $this->Video_model->checkLike($data);
			if ($result->num_rows() > 0) {
				if ($this->session->userdata("logged_in")) {
					$this->Video_model->unlikePost($data);
					$this->Video_model->disLike($video_id);
					echo $this->Video_model->count($video_id);
				} else {
					echo $this->Video_model->count($video_id);
				}
			} else {
				echo $this->Video_model->count($video_id);
			}
		}

		public function message($receiver) {
			if ($this->session->userdata('logged_in')) {
				$this->Video_model->send_message($receiver);
				echo "<script>alert('Message sent');history.go(-1)</script>";
			} else {
				echo "<script>alert('You need to login to send message');history.go(-1)</script>";
			}
		}

		public function subscribed() {
			if ($this->session->userdata("logged_in")) {
				$video_id = $this->input->post('v_id');
				$uploader = $this->Video_model->find_uploader($video_id);
				if ($this->Video_model->check_subscribe($uploader) == 0) {
					$this->Video_model->subscribing($uploader);
					echo "Unsubscribed";
				} else {
					$this->Video_model->unsubscribing($uploader);
					echo "Subscribe";
				}
			}
			else {
				echo "Subscribe";
			}
		}

		public function view_subs() {
			$subscribe_num = $this->Video_model->get_subscribe_num();
			$data['sub_num'] = $subscribe_num;
			$result = $this->Video_model->getSubscribe();
			$data['subData'] = $result;

			$this->load->view('templates/logged_header');
			$this->load->view('pages/subscribe' , $data);
			$this->load->view('templates/footer');
		}

		// test
//		public function userDetails($video_id){
//			// POST data
////			$postData = $this->input->post();
//
//			// get data
////			$this->Page_model->updateLike($id);
//////			$data = $this->Main_model->getUserDetails($postData);
////			$myObj = $this->Page_model->readSingleVideo('test1.mp4');
////			$this->update();
////
////
////			$myJSON = json_encode($myObj);
//
//			$total = $this->Video_model->countLike($video_id);
//			echo '[{"total":$total}]';
////			echo $myJSON;
////			echo json_encode($data);
//		}
	}
