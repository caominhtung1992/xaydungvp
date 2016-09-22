<?php
	require("libraries/student.php");
	class Support extends Student{
		public function __construct(){
			parent::__construct();
			$this->load->helper("url");
			$this->load->model("msupport");
			$this->load->library("string");
		}
		public function index(){
			$config['base_url'] 	= base_url()."admin/support/index";
			$config['total_rows'] 	= $this->msupport->count_all();
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
			$data['list_sup'] = $this->msupport->list_sup($config['per_page'],$start);
			$data['template'] = "support/list_sup";
			$this->load->view("layout",$data);
		}
		public function add(){
			$data['act'] = "7";
			$data['title'] = "Thêm mới hỗ trợ";
			$data['template'] = "support/add_sup";
			$this->load->helper("form");
			if($this->input->post('ok') != ""){
				$val = array(
					"sup_name"		=> $this->fillter($this->input->post("sup_name")),
					"sup_yahoo"		=> $this->fillter($this->input->post("sup_yahoo")),
					"sup_phone"		=> $this->fillter($this->input->post("sup_phone")),
					"sup_sky"		=> $this->fillter($this->input->post("sup_sky")),
					"sup_email"		=> $this->fillter($this->input->post("sup_email"))
				);
				$this->msupport->add($val);
				redirect(base_url()."admin/support");
			}
			$this->load->view("layout",$data);
		}
		public function update(){
			$data['act'] = "7";
			$data['title'] = "Sửa hỗ trợ trực tuyến";
			$data['template'] = "support/edit_sup";
			$id = $this->uri->segment(4);
			$data['get'] = $this->msupport->getdata($id);
			if($id == NULL || !isset($data['get']['sup_id'])){
				redirect(base_url()."admin/support");
			}
			$this->load->helper("form");
			if($this->input->post('ok') != ""){
				$val = array(
					"sup_name"		=> $this->fillter($this->input->post("sup_name")),
					"sup_yahoo"		=> $this->fillter($this->input->post("sup_yahoo")),
					"sup_phone"		=> $this->fillter($this->input->post("sup_phone")),
					"sup_sky"		=> $this->fillter($this->input->post("sup_sky")),
					"sup_email"		=> $this->fillter($this->input->post("sup_email"))
				);
				$this->msupport->update_sup($val,$id);
				redirect(base_url()."admin/support");
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
					$this->msupport->update_sup($val,$id);
					die();
				}else{
					$val = array(
						"sup_status" => "0"
					);
					$this->msupport->update_sup($val,$id);
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
			$this->msupport->del_sup($id);
		}
	}