<?php
	class Monitor extends MY_Controller{
		public function __construct(){
	        parent::__construct();
			$this->load->helper("url");
			
	    }
		public function index(){
			$data['title'] 		= "Bảng giá sửa chữa màn hình laptop";
			$data['online'] 	= $this->online();
			$data['access'] 	= $this->access();
			$this->write($data['access']);
			$data['pro_view'] 		= $this->mindex->list_pro_view();
			//$data['intro']		= $this->mintro->getdata();
			$data['listall'] 	= $this->mindex->listall();
			$get_setup 			= $this->mindex->get_setup();
			$data['pro_hot'] 	= $this->mindex->list_pro_hot($get_setup['set_pro_hot']);
			$this->load->view("monitor/layout",$data);
		}
	}