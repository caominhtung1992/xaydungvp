<?php
	require("libraries/student.php");
	class Report extends Student{
		public function __construct(){
			parent::__construct();
			$this->load->helper("url");
			$this->load->model("mreport");
		}
		public function index(){
			$data['act'] = "6";
			$data['title'] = "Thống kê khách hàng";
			$config['base_url'] 	= base_url()."admin/report/index";
			$config['total_rows'] 	= $this->mreport->count_all();
			$config['per_page'] 	= "30";
			$config['uri_segment'] 	= "4";
			$config['next_link'] 	= "Next";
			$config['prev_link'] 	= "Prev";
			$config['first_link'] 	= "First";
			$config['last_link'] 	= "Last";
			$this->load->library("pagination");
			$this->pagination->initialize($config);
			$start = $this->uri->segment(4);
			$data['list_cus'] = $this->mreport->list_cus($config['per_page'],$start);
			$data['template'] = "report/customer";
			$this->load->view("layout",$data);
		}
		public function order(){
			$data['act'] = "6";
			$data['title'] = "Thống kê đơn hàng";
			$config['base_url'] 	= base_url()."admin/report/order";
			$config['total_rows'] 	= $this->mreport->count_all_order();
			$config['per_page'] 	= "30";
			$config['uri_segment'] 	= "4";
			$config['next_link'] 	= "Next";
			$config['prev_link'] 	= "Prev";
			$config['first_link'] 	= "First";
			$config['last_link'] 	= "Last";
			$this->load->library("pagination");
			$this->pagination->initialize($config);
			$start = $this->uri->segment(4);
			$data['list_cus'] = $this->mreport->list_order($config['per_page'],$start);
			$data['template'] = "report/order";
			$this->load->view("layout",$data);
		}
		public function product_buy(){
			$data['act'] = "6";
			$data['title'] = "Thống kê sản phẩm mua nhiều";
			$config['base_url'] 	= base_url()."admin/report/product_buy";
			$config['total_rows'] 	= $this->mreport->count_all_pro_buy();
			$config['per_page'] 	= "30";
			$config['uri_segment'] 	= "4";
			$config['next_link'] 	= "Next";
			$config['prev_link'] 	= "Prev";
			$config['first_link'] 	= "First";
			$config['last_link'] 	= "Last";
			$this->load->library("pagination");
			$this->pagination->initialize($config);
			$start = $this->uri->segment(4);
			$data['list_pro'] = $this->mreport->list_pro_buy($config['per_page'],$start);
			$data['template'] = "report/product_buy";
			$this->load->view("layout",$data);
		}
		public function product_view(){
			$data['act'] = "6";
			$data['title'] = "Thống kê sản phẩm xem nhiều";
			$config['base_url'] 	= base_url()."admin/report/product_view";
			$config['total_rows'] 	= $this->mreport->count_all_pro_view();
			$config['per_page'] 	= "30";
			$config['uri_segment'] 	= "4";
			$config['next_link'] 	= "Next";
			$config['prev_link'] 	= "Prev";
			$config['first_link'] 	= "First";
			$config['last_link'] 	= "Last";
			$this->load->library("pagination");
			$this->pagination->initialize($config);
			$start = $this->uri->segment(4);
			$data['list_pro'] = $this->mreport->list_pro_view($config['per_page'],$start);
			$data['template'] = "report/product_view";
			$this->load->view("layout",$data);
		}
		public function referer(){
			$data['act'] = "6";
			$data['title'] = "Thống kê website giới thiệu";
			$config['base_url'] 	= base_url()."admin/report/referer";
			$config['total_rows'] 	= $this->mreport->count_all_referer();
			$config['per_page'] 	= "30";
			$config['uri_segment'] 	= "4";
			$config['next_link'] 	= "Next";
			$config['prev_link'] 	= "Prev";
			$config['first_link'] 	= "First";
			$config['last_link'] 	= "Last";
			$this->load->library("pagination");
			$this->pagination->initialize($config);
			$start = $this->uri->segment(4);
			$data['list_referer'] = $this->mreport->list_referer($config['per_page'],$start);
			$data['template'] = "report/referer";
			$this->load->view("layout",$data);
		}
		public function search(){
			$data['act'] = "6";
			$data['title'] = "Thống kê tìm kiếm";
			$config['base_url'] 	= base_url()."admin/report/search";
			$config['total_rows'] 	= $this->mreport->count_all_search();
			$config['per_page'] 	= "30";
			$config['uri_segment'] 	= "4";
			$config['next_link'] 	= "Next";
			$config['prev_link'] 	= "Prev";
			$config['first_link'] 	= "First";
			$config['last_link'] 	= "Last";
			$this->load->library("pagination");
			$this->pagination->initialize($config);
			$start = $this->uri->segment(4);
			$data['list_search'] = $this->mreport->list_search($config['per_page'],$start);
			$data['template'] = "report/search";
			$this->load->view("layout",$data);
		}
	}