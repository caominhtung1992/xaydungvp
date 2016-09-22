<?php
	require("libraries/student.php");
	class Customer_newsletter extends Student{
		public function __construct(){
			parent::__construct();
			$this->load->helper("url");
		}
		public function index(){
			$data['title'] = "Khách hàng nhận bản tin";
			$data['act'] = "3";
			$data['template'] = "customer_newsletter/list_newsletter";
			$this->load->view("layout",$data);
		}
	}