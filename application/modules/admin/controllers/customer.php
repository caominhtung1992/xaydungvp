<?php
	require("libraries/student.php");
	class Customer extends Student{
		public function __construct(){
			parent::__construct();
			$this->load->helper("url");
			$this->load->model("mcustomer");
		}
		public function index(){
			$config['base_url'] 	= base_url()."admin/customer/index";
			$config['total_rows'] 	= $this->mcustomer->count_all();
			$config['per_page'] 	= "10";
			$config['uri_segment'] 	= "4";
			$config['next_link'] 	= "Next";
			$config['prev_link'] 	= "Prev";
			$config['first_link'] 	= "First";
			$config['last_link'] 	= "Last";
			$this->load->library("pagination");
			$this->pagination->initialize($config);
			$start = $this->uri->segment(4);
			$data['list_cus'] = $this->mcustomer->list_cus($config['per_page'],$start);
			//$this->debug($data['list_cus']);
			$data['act'] = "3";
			$data['title'] = "Danh sách khách hàng";
			$data['template'] = "customer/list_customer";
			$this->load->view("layout",$data);
		}
		public function add(){
			$data['act'] = "3";
			$data['title'] = "Thêm mới khách hàng";
			$data['template'] = "customer/add_customer";
			if($this->input->post('ok') != ""){
				$name = $this->mcustomer->check_cus($this->input->post("cus_name"));
				$email = $this->mcustomer->check_email($this->input->post("cus_email"));
				if($name == FALSE || $email == FALSE){
					$data['error'] = "Khách hàng này đã tồn tại!";
					$this->load->view("layout",$data);
				}else{
					$db = array(
								"cus_name" 	=> $this->fillter($this->input->post("cus_name")),
								"cus_password" => $this->fillter(md5($this->input->post("cus_pass"))),
								"cus_level" 	=> 2,
								"cus_fullname" => $this->fillter($this->input->post("cus_fullname")),
								"cus_gender" 	=> $this->fillter($this->input->post("cus_gender")),
								"cus_phone" 	=> $this->fillter($this->input->post("cus_phone")),
								"cus_email" 	=> $this->fillter($this->input->post("cus_email")),
								"cus_address" 	=> $this->fillter($this->input->post("cus_address")),
								"cus_date" 	=> date("H:i:s - d/m/Y")
								);
					$this->mcustomer->add_cus($db);
					redirect(base_url()."admin/customer");
				}
			}else{
				$this->load->view("layout",$data);
			}
		}
		public function update(){
			$id = $this->uri->segment(4);
			$data['act'] 		= "3";
			$data['title'] 		= "Sửa thông tin khách hàng";
			$data['template'] 	= "customer/edit_customer";
			$data['get'] 		= $this->mcustomer->getdata($id);
			if(!isset($data['get']['cus_id'])){
				redirect(base_url()."admin/customer");
			}
			if($this->input->post('ok') != ""){
				$name = $this->mcustomer->check_cus($this->input->post("cus_name"),$id);
				$email = $this->mcustomer->check_email($this->input->post("cus_email"),$id);
				if($name == FALSE || $email == FALSE){
					$data['error'] = "Khách hàng này đã tồn tại!";
					$this->load->view("layout",$data);
				}else{
					$db = array(
								"cus_name" 	=> $this->fillter($this->input->post("cus_name")),
								"cus_level" 	=> 2,
								"cus_fullname" => $this->fillter($this->input->post("cus_fullname")),
								"cus_gender" 	=> $this->fillter($this->input->post("cus_gender")),
								"cus_phone" 	=> $this->fillter($this->input->post("cus_phone")),
								"cus_email" 	=> $this->fillter($this->input->post("cus_email")),
								"cus_address" 	=> $this->fillter($this->input->post("cus_address"))
								);
					if($this->input->post("cus_pass") != ""){
						$db['cus_password'] = $this->fillter(md5($this->input->post("cus_pass")));
					}
					//$this->debug($db);
					$this->mcustomer->update_cus($db,$id);
					redirect(base_url()."admin/customer");
				}
			}else{
				$this->load->view("layout",$data);
			}
		}
		public function update_status(){
			$id = $this->input->post('rel');
			if($this->input->post("type")){
				$status = $this->input->post('val');
				if($status == 0){
					$val = array(
						"cus_status" => "1"
					);
					$this->mcustomer->update_cus($val,$id);
					die();
				}else{
					$val = array(
						"cus_status" => "0"
					);
					$this->mcustomer->update_cus($val,$id);
					die();
				}
			}
		}
		public function del(){
			$id = $this->input->post('id');
			$this->mcustomer->del($id);
		}
	}