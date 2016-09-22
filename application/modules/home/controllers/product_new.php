<?php
	class Product_new extends MY_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->helper("url");
			$this->load->model("mproduct");
			$this->load->library("string");
		}
		public function index(){
			$data['online'] 		= $this->online();
			$data['access'] 	= $this->access();
			$this->write($data['access']);
			$data['pro_view'] 		= $this->mindex->list_pro_view();
			$get_setup 				= $this->mindex->get_setup();
			$data['pro_hot'] 		= $this->mindex->list_pro_hot($get_setup['set_pro_hot']);
			$id2 = $this->uri->segment(1);
			$config['base_url'] 	= base_url()."".$id2."";
			$config['total_rows'] 	= $this->mproduct->count_all_new();
			$config['per_page'] 	= $get_setup['set_count_pro'];
			$config['uri_segment'] 	= "2";
			$config['next_link'] 	= "Next";
			$config['prev_link'] 	= "Prev";
			$config['first_link'] 	= "First";
			$config['last_link'] 	= "Last";
			$this->load->library("pagination");
			$this->pagination->initialize($config);
			$data['title']   		= "Sản phẩm mới";
			$data['listall'] 		= $this->mindex->listall();
			$data['list_support'] 	= $this->mindex->list_support();
			$data['list_pro_best'] 	= $this->mcolumn_right->list_product();
			$data['list_news'] 		= $this->mcolumn_right->list_news();
			$start = $this->uri->segment(2);
			$data['list_pro'] 		= $this->mproduct->list_pro_new($config['per_page'],$start);
			//$this->debug($config['base_url']);
			$this->load->view("product/all/layout",$data);
		}
	}