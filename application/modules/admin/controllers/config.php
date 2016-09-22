<?php
	require("libraries/student.php");
	class Config extends Student{
		public function __construct(){
			parent::__construct();
			$this->load->helper("url");
			$this->load->helper("form");
			$this->load->model("mconfig");
		}
		public function index(){
			$data['act'] = "7";
			$data['title'] = "Thay đổi nội dung website";
			$data['template'] = "config/edit_config";
			$data['get'] = $this->mconfig->getdata();
			//$this->debug($data['get']);
			if($this->input->post("ok") != ""){
				$val = array(
					"config_email" 		=> $this->fillter($this->input->post("config_email")),
					"config_title"		=> $this->fillter($this->input->post("config_title")),
					"config_key" 		=> $this->fillter($this->input->post("config_key")),
					"config_des" 		=> $this->fillter($this->input->post("config_des")),
					"config_intro" 		=> $this->input->post("config_intro"),
					"config_contact" 	=> $this->input->post("config_contact")
				);
				$this->mconfig->update_config($val,1);
				redirect(base_url()."admin/index");
			}
			$this->load->view("layout",$data);
		}
	}