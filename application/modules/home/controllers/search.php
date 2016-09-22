<?php
	class Search extends MY_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->helper("url");
			$this->load->model("mproduct");
			$this->load->library("string");
		}
		public function index(){
			$data['online'] 		= $this->online();
			$get_setup 				= $this->mindex->get_setup();
			$data['access'] 	= $this->access();
			$this->write($data['access']);
			$data['pro_view'] 		= $this->mindex->list_pro_view();
			$data['pro_hot'] 		= $this->mindex->list_pro_hot($get_setup['set_pro_hot']);
			$data['listall'] 		= $this->mindex->listall();
			$data['list_support'] 	= $this->mindex->list_support();
			$data['list_pro_best'] 	= $this->mcolumn_right->list_product();
			$data['list_news'] 		= $this->mcolumn_right->list_news();
			$name = $this->fillter($this->input->get("keywords"));
			if(isset($name) && $name != NULL){
				$text = $this->mproduct->check_search($name);
				if($text == FALSE){
					$this->mproduct->update_search($name);
				}else{
					$db = array(
						"count_name" 	=> $name,
					);
					$this->mproduct->add_search($db);
				}
			}
			$config['base_url'] 	= base_url()."home/search/index/".$name;
		    $config['total_rows'] 	= $this->mproduct->count_all_search($name);
		    $config['per_page'] 	= $get_setup['set_count_pro'];
		    $config['uri_segment'] 	= 4;
		    $config['next_link'] 	= "Next";
			$config['prev_link'] 	= "Prev";
			$config['first_link'] 	= "First";
			$config['last_link'] 	= "Last";
			$this->load->library("pagination");
			$this->pagination->initialize($config);
			$data['title']   		= "Tìm kiếm &raquo; từ khóa: ".$name." có ".$config['total_rows']." sản phẩm";
			$start = (int)$this->uri->segment(4);
			$data['list_pro'] = $this->mproduct->search($name,$config['per_page'],$start);
			$this->load->view("product/all/layout",$data);
		}
	}