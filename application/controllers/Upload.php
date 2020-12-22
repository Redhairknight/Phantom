<?php

class Upload extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Upload_model');
	}

	public function image() {
		$this->load->view('templates/logged_header');
		$this->load->view('uploads/upload', array('error' => ' ' ));
		$this->load->view('templates/footer');
	}

	public function video() {
		$this->load->view('templates/logged_header');
		$this->load->view('uploads/uploadVideo', array('error' => ' ' ));
		$this->load->view('templates/footer');
	}

	public function upload_image() {

		$config['upload_path'] = './assets/images';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['file_name'] = $_FILES['userfile']['name'];
		$config['overwrite'] = TRUE;

		$this->load->library('upload', $config);
		// initial overwrite config
		$this->upload->initialize($config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('templates/logged_header');
			$this->load->view('uploads/upload', $error);
			$this->load->view('templates/footer');
		}
		else
		{
			$data = $this->upload->data();
			$file_name = $data['file_name'];
			$this->Upload_model->update_image($file_name);

			echo "<script>alert('You have successfully upload your profile image.');document.location='../Users/view'</script>";
		}
	}

	public function upload_video() {

		$config['upload_path'] = './assets/videos/';
		$config['allowed_types'] = 'mp4|avi|wmv';
		$config['file_name'] = $_FILES['userfile']['name'];
		$config['overwrite'] = TRUE;

		$this->load->library('upload', $config);
		// initial overwrite config
		$this->upload->initialize($config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('templates/logged_header');
			$this->load->view('uploads/uploadVideo', $error);
			$this->load->view('templates/footer');
		}
		else
		{
			$data = $this->upload->data();
			$file_name = $data['file_name'];
			$this->Upload_model->create_video($file_name);

			echo "<script>alert('You have successfully upload a new video.');document.location='../Users/view'</script>";
		}
	}

	public function download_video($name = NULL) {
		if ($name) {
			force_download('assets/videos/'.$name,NULL);
		} else {
			echo "<script>alert('The file is not exist');history.go(-1);</script>";
		}
	}

	public function upload_drag()
	{
		$username = $this->session->userdata('username');
		if ( ! empty($_FILES))
		{
			$config['upload_path'] = './assets/images/'.$username;
			if(!is_dir($config['upload_path'])) //create the folder if it's not already exists
			{
				mkdir($config['upload_path'],0755,TRUE);
			}

			$config["allowed_types"] = "gif|jpg|png";
			$config['overwrite'] = TRUE;
			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload("file")) {
				echo "<script>alert('Fail to upload');history.go(-1);</script>";
			}
			// get file name
			$data = $this->upload->data();
			$file_name = $data['file_name'];
			$this->Upload_model->create_image($file_name);
		}
	}

	public function history($username = null) {
		// fetch history of this user
		if ($username == null) {
			$username = $this->session->userdata('username');
		}
		$data['historyImg'] = $this->Upload_model->historyImg($username);
		$data['historyVideo'] = $this->Upload_model->historyVideo($username);

		$this->load->view('templates/logged_header');
		$this->load->view('uploads/history', $data);
		$this->load->view('templates/footer');
	}

	public function deleteImg($id) {
		$this->Upload_model->deleteImage($id);
		redirect("Upload/history");
	}

	public function deleteVideo($id) {
		$this->Upload_model->deleteVideo($id);
		redirect("Upload/history");
	}
}

