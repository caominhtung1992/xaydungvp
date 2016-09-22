<?php
	require("libraries/student.php");
	class Commit extends Student{
		public function __construct(){
			parent::__construct();
			$this->load->helper("url");
			$this->load->model("mcommit");
			$this->load->library("string");
		}
		public function index(){
			$config['base_url'] 	= base_url()."admin/commit/index";
			$config['total_rows'] 	= $this->mcommit->count_all();
			$config['per_page'] 	= "10";
			$config['uri_segment'] 	= "4";
			$config['next_link'] 	= "Next";
			$config['prev_link'] 	= "Prev";
			$config['first_link'] 	= "First";
			$config['last_link'] 	= "Last";
			$this->load->library("pagination");
			$this->pagination->initialize($config);
			$start = $this->uri->segment(4);
			$data['act'] = "7";
			$data['title'] = "Danh sách hỗ trợ trực tuyến";
			$data['list_sup'] = $this->mcommit->list_sup($config['per_page'],$start);
			$data['template'] = "commit/list_commit";
			$this->load->view("layout",$data);
		}
		public function add(){
			$data['act'] = "7";
			$data['title'] = "Thêm mới Cam kết";
			$data['template'] = "commit/add_commit";
			$this->load->helper("form");
			if($this->input->post('ok') != ""){
				$val = array(
					"commit_name"		=> $this->fillter($this->input->post("commit_name")),
				);
				$this->mcommit->add($val);
				redirect(base_url()."admin/commit");
			}
			$this->load->view("layout",$data);
		}
		public function update(){
			$data['act'] = "7";
			$data['title'] = "Sửa cam kết";
			$data['template'] = "commit/edit_commit";
			$id = $this->uri->segment(4);
			$data['get'] = $this->mcommit->getdata($id);
			if($id == NULL || !isset($data['get']['commit_id'])){
				redirect(base_url()."admin/commit");
			}
			$this->load->helper("form");
			if($this->input->post('ok') != ""){
				$val = array(
					"commit_name"		=> $this->input->post("commit_name"),
				);
				$this->mcommit->update_sup($val,$id);
				redirect(base_url()."admin/commit");
			}
			$this->load->view("layout",$data);
		}
		public function update_status(){
			$id = $this->input->post('rel');
			if($this->input->post("type")){
				$status = $this->input->post('val');
				if($status == 0){
					$val = array(
						"sup_status" => "1"
					);
					$this->mcommit->update_sup($val,$id);
					die();
				}else{
					$val = array(
						"sup_status" => "0"
					);
					$this->mcommit->update_sup($val,$id);
					die();
				}
			}
		}
		public function update_order(){
			$id = $this->input->post('id');
			$val = $this->fillter($this->input->post('val'));
			$data = array(
				"sup_order" => $val
			);
			$this->msupport->update_sup($data,$id);
		}
		public function del(){
			$id = $this->input->post('id');
			$this->mcommit->del_sup($id);
		}
	}