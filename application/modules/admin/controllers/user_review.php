<?php
	require("libraries/student.php");
	class User_review extends Student{
		public function __construct(){
			parent::__construct();
			$this->load->helper("url");
		}
		public function index(){
			$data['act'] = "2";
			$data['title'] = "Ý kiến người dùng";
			$data['template'] = "user_review/list_review";
			$this->load->view("layout",$data);
		}
	}