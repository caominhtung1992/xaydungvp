<?php
	require("libraries/student.php");
	class Merit extends Student{
		public function __construct(){
			parent::__construct();
			$this->load->helper("url");
			$this->load->model("mmerit");
		}
		public function index(){
			$config['base_url'] 	= base_url()."admin/merit/index";
			$config['total_rows'] 	= $this->mmerit->count_all();
			$config['per_page'] 	= "10";
			$config['uri_segment'] 	= "4";
			$config['next_link'] 	= "Next";
			$config['prev_link'] 	= "Prev";
			$config['first_link'] 	= "First";
			$config['last_link'] 	= "Last";
			$this->load->library("pagination");
			$this->pagination->initialize($config);
			$start = $this->uri->segment(4);
			$data['list_merit'] = $this->mmerit->list_merit($config['per_page'],$start);
			//$this->debug($data['list_user']);
			$data['act'] = "7";
			$data['title'] = "Danh sách quản trị ảnh chứng chỉ";
			$data['template'] = "merit/list_merit";
			$this->load->view("layout",$data);
		}
		public function add(){
		}
		public function update(){
		}
		public function del(){
			$id = $this->input->post('id');
			$this->mmerit->del($id);
		}
	}