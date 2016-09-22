<?php
	class Getdata extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->helper("url");
			$this->load->model("mpro");
		}
		public function index(){
			$id = $this->input->get("id");
			$data = $this->mpro->detail($id);
			header("content-type:text/xml");
			echo "<?xml version='1.0' encoding='utf-8' ?>";
			echo "<products>";
			echo "<title>".$data['pro_name']."</title>";
			echo "<img>".base_url()."uploads/".$data['pro_images']."</img>";
			echo "<info>".$data['pro_info']."</info>";
			echo "<full>".$data['pro_full']."</full>";
			echo "<ext>".$data['pro_ext']."</ext>";
			echo "</products>";
		}
	}