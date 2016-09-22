<?php
	require("libraries/student.php");
	class User extends Student{
		public function __construct(){
			parent::__construct();
			$this->load->helper("url");
			$this->load->model("muser");
		}
		public function index(){
			$config['base_url'] 	= base_url()."admin/user/index";
			$config['total_rows'] 	= $this->muser->count_all();
			$config['per_page'] 	= "10";
			$config['uri_segment'] 	= "4";
			$config['next_link'] 	= "Next";
			$config['prev_link'] 	= "Prev";
			$config['first_link'] 	= "First";
			$config['last_link'] 	= "Last";
			$this->load->library("pagination");
			$this->pagination->initialize($config);
			$start = $this->uri->segment(4);
			$data['list_user'] = $this->muser->list_user($config['per_page'],$start);
			//$this->debug($data['list_user']);
			$data['act'] = "7";
			$data['title'] = "Danh sách quản trị website";
			$data['template'] = "user/list_user";
			$this->load->view("layout",$data);
		}
		public function add(){
			$data['act'] = "7";
			$data['title'] = "Thêm mới quản trị website";
			$data['template'] = "user/add_user";
			if($this->input->post('ok') != ""){
				$name = $this->muser->check_user($this->input->post("user_name"));
				$email = $this->muser->check_email($this->input->post("user_email"));
				if($name == FALSE || $email == FALSE){
					$data['error'] = "Người dùng này đã tồn tại!";
					$this->load->view("layout",$data);
				}else{
					$db = array(
								"user_name" 	=> $this->fillter($this->input->post("user_name")),
								"user_password" => $this->fillter(md5($this->input->post("user_pass"))),
								"user_level" 	=> $this->fillter($this->input->post("user_level")),
								"user_fullname" => $this->fillter($this->input->post("user_fullname")),
								"user_gender" 	=> $this->fillter($this->input->post("user_gender")),
								"user_phone" 	=> $this->fillter($this->input->post("user_phone")),
								"user_email" 	=> $this->fillter($this->input->post("user_email")),
								"user_address" 	=> $this->fillter($this->input->post("user_address")),
								"user_date" 	=> date("H:i:s - d/m/Y")
								);
					$this->muser->add_user($db);
					redirect(base_url()."admin/user/");
				}
			}else{
				$this->load->view("layout",$data);
			}
		}
		public function update(){
			$id = $this->uri->segment(4);
			$data['act'] 		= "7";
			$data['title'] 		= "Sửa thông tin quản trị website";
			$data['template'] 	= "user/edit_user";
			$data['get'] 		= $this->muser->getdata($id);
			if($id == NULL || !isset($data['get']['user_id'])){
				redirect(base_url()."admin/user/");
			}
			if($this->input->post('ok') != ""){
				$name = $this->muser->check_user($this->input->post("user_name"),$id);
				$email = $this->muser->check_email($this->input->post("user_email"),$id);
				if($name == FALSE || $email == FALSE){
					$data['error'] = "Người dùng này đã tồn tại!";
					$this->load->view("layout",$data);
				}else{
					$db = array(
								"user_name" 	=> $this->fillter($this->input->post("user_name")),
								"user_level" 	=> $this->fillter($this->input->post("user_level")),
								"user_fullname" => $this->fillter($this->input->post("user_fullname")),
								"user_gender" 	=> $this->fillter($this->input->post("user_gender")),
								"user_phone" 	=> $this->fillter($this->input->post("user_phone")),
								"user_email" 	=> $this->fillter($this->input->post("user_email")),
								"user_address" 	=> $this->fillter($this->input->post("user_address"))
								);
					if($this->input->post("user_pass") != ""){
						$db['user_password'] = $this->fillter(md5($this->input->post("user_pass")));
					}
					//$this->debug($db);
					$this->muser->update_user($db,$id);
					redirect(base_url()."admin/user/");
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
						"user_status" => "1"
					);
					$this->muser->update_user($val,$id);
					die();
				}else{
					$val = array(
						"user_status" => "0"
					);
					$this->muser->update_user($val,$id);
					die();
				}
			}
		}
		public function del(){
			$id = $this->input->post('id');
			$this->muser->del($id);
		}
	}