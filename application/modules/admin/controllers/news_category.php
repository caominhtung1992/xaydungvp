<?php
	require("libraries/student.php");
	class News_category extends Student{
		public function __construct(){
			parent::__construct();
			$this->load->helper("url");
			$this->load->model("mnews_category");
			$this->load->library("string");
		}
		public function index(){
			$config['base_url'] 	= base_url()."admin/news_category/index";
			$config['total_rows'] 	= $this->mnews_category->count_all();
			$config['per_page'] 	= "10";
			$config['uri_segment'] 	= "4";
			$config['next_link'] 	= "Next";
			$config['prev_link'] 	= "Prev";
			$config['first_link'] 	= "First";
			$config['last_link'] 	= "Last";
			$this->load->library("pagination");
			$this->pagination->initialize($config);
			$start = $this->uri->segment(4);
			$data['act'] = "5";
			$data['title'] = "Danh mục tin tức";
			$data['list_cago'] = $this->mnews_category->list_cate($config['per_page'],$start);
			$data['template'] = "news_category/list_category";
			$this->load->view("layout",$data);
		}
		public function add(){
			$data['act'] = "5";
			$data['title'] = "Thêm mới danh mục tin tức";
			$data['template'] = "news_category/add_category";
			$this->load->helper("form");
			if($this->input->post('ok') != ""){
				$url = str_replace(' ', '-',strtolower($this->string->replace($this->input->post('cago_name'))));
				$val = array(
					"cago_name"		=> $this->fillter($this->input->post("cago_name")),
					"cago_rewrite"	=> $this->fillter($url),
					"cago_info"		=> $this->fillter($this->input->post("cago_info")),
					"cago_full"		=> $this->input->post("cago_full"),
					"cago_order"	=> $this->fillter($this->input->post("cago_order")),
					"cago_key"		=> $this->fillter($this->input->post("cago_key")),
					"cago_des"		=> $this->fillter($this->input->post("cago_des"))
				);
				$this->mnews_category->add($val);
				redirect(base_url()."admin/news_category");
			}
			$this->load->view("layout",$data);
		}
		public function update(){
			$data['act'] = "5";
			$data['title'] = "Sửa danh mục tin tức";
			$data['template'] = "news_category/edit_category";
			$id = $this->uri->segment(4);
			$data['get'] = $this->mnews_category->getdata($id);
			if($id == NULL || !isset($data['get']['cago_id'])){
				redirect(base_url()."admin/news_category");
			}
			$this->load->helper("form");
			if($this->input->post('ok') != ""){
				$url = str_replace(' ', '-',strtolower($this->string->replace($this->input->post('cago_name'))));
				$val = array(
					"cago_name"		=> $this->fillter($this->input->post("cago_name")),
					"cago_rewrite"	=> $this->fillter($url),
					"cago_info"		=> $this->fillter($this->input->post("cago_info")),
					"cago_full"		=> $this->input->post("cago_full"),
					"cago_order"	=> $this->fillter($this->input->post("cago_order")),
					"cago_key"		=> $this->fillter($this->input->post("cago_key")),
					"cago_des"		=> $this->fillter($this->input->post("cago_key"))
				);
				$this->mnews_category->update_cate($val,$id);
				redirect(base_url()."admin/news_category");
			}
			$this->load->view("layout",$data);
		}
		public function update_status(){
			$id = $this->input->post('rel');
			if($this->input->post("type")){
				$status = $this->input->post('val');
				if($status == 0){
					$val = array(
						"cago_status" => "1"
					);
					$this->mnews_category->update_cate($val,$id);
					die();
				}else{
					$val = array(
						"cago_status" => "0"
					);
					$this->mnews_category->update_cate($val,$id);
					die();
				}
			}
		}
		public function update_order(){
			$id = $this->input->post('id');
			$val = $this->input->post('val');
			$data = array(
				"cago_order" => $val
			);
			$this->mnews_category->update_cate($data,$id);
		}
		public function del(){
			$id = $this->input->post('id');
			$this->mnews_category->del_cate($id);
		}
	}