<?php
	require("libraries/student.php");
	class Video extends Student{
		public function __construct(){
			parent::__construct();
			$this->load->helper("url");
			$this->load->model("mvideo");
			$this->load->library("string");
		}
		public function index(){
			$config['base_url'] 	= base_url()."admin/video/index";
			$config['total_rows'] 	= $this->mvideo->count_all();
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
			$data['title'] = "Danh sách videos";
			$data['list_sup'] = $this->mvideo->list_sup($config['per_page'],$start);
			$data['template'] = "video/list_video";
			$this->load->view("layout",$data);
		}
		public function add(){
			$data['act'] = "7";
			$data['title'] = "Thêm mới hỗ trợ";
			$data['template'] = "video/add_video";
			$this->load->helper("form");
			if($this->input->post('ok') != ""){
				$val = array(
					"video_link"		=> $this->fillter($this->input->post("video_link")),
				);
				$this->mvideo->add($val);
				redirect(base_url()."admin/video");
			}
			$this->load->view("layout",$data);
		}
		public function update(){
			$data['act'] = "7";
			$data['title'] = "Sửa link video";
			$data['template'] = "video/edit_video";
			$id = $this->uri->segment(4);
			$data['get'] = $this->mvideo->getdata($id);
			if($id == NULL || !isset($data['get']['video_id'])){
				redirect(base_url()."admin/video");
			}
			$this->load->helper("form");
			if($this->input->post('ok') != ""){
				$val = array(
					"video_link"		=> $this->fillter($this->input->post("video_link")),
				
				);
				$this->mvideo->update_video($val,$id);
				redirect(base_url()."admin/video");
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
					$this->mvideo->update_sup($val,$id);
					die();
				}else{
					$val = array(
						"sup_status" => "0"
					);
					$this->mvideo->update_sup($val,$id);
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
			$this->mvideo->update_sup($data,$id);
		}
		public function del(){
			$id = $this->input->post('id');
			$this->mvideo->del_video($id);
		}
	}