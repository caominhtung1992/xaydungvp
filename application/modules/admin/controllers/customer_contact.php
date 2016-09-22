<?php
	require("libraries/student.php");
	class Customer_contact extends Student{
		public function __construct(){
			parent::__construct();
			$this->load->helper("url");
			$this->load->library("string");
			$this->load->model("mcustomer_contact");
		}
		public function index(){
			$config['base_url'] 	= base_url()."admin/customer_contact/index";
			$config['total_rows'] 	= $this->mcustomer_contact->count_all();
			$config['per_page'] 	= "10";
			$config['uri_segment'] 	= "4";
			$config['next_link'] 	= "Next";
			$config['prev_link'] 	= "Prev";
			$config['first_link'] 	= "First";
			$config['last_link'] 	= "Last";
			$this->load->library("pagination");
			$this->pagination->initialize($config);
			$start = $this->uri->segment(4);
			$data['act'] = "3";
			$data['title'] = "Khách hàng liên hệ";
			$data['list_contact'] = $this->mcustomer_contact->list_contact($config['per_page'],$start);
			$data['template'] = "customer_contact/list_contact";
			$this->load->view("layout",$data);
		}
		public function detail(){
			$id = $this->uri->segment(4);
			$data['act'] = "3";
			$data['title'] = "Thông tin khách hàng liên hệ";
			$val = array(
				"con_status" => "1"
			);
			$this->mcustomer_contact->update_status($val,$id);	
			$data['detail'] = $this->mcustomer_contact->detail_contact($this->uri->segment(4));
			$data['template'] = "customer_contact/detail_contact";
			$this->load->view("layout",$data);
		}
		public function del(){
			$id = $this->input->post('id');
			$this->mcustomer_contact->del_contact($id);
		}
	}