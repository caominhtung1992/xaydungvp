<?php
	require("libraries/student.php");
  	class Template extends Student{
		public function __construct(){
			parent::__construct();
			$this->load->helper("url");
			$this->load->library("string");
			$this->load->helper('directory');
		}
		public function index(){
			$data['act'] 			= 7;
			$data['title'] 			= "Sửa file template";
			$files = directory_map('./application/modules/home/views');
			$this->debug($files);
			//$allowed_extensions = array("gif", "jpg", "jpeg", "png");
			//$this->php_file_tree("./application/modules/home/views","javascript:alert('You clicked on [link]');");
			$data['template'] = "template/index";
			$this->load->view("layout",$data);
		}
	}