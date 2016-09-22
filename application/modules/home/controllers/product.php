<?php
	class Product extends MY_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->helper("url");
			$this->load->library("string");
			$this->load->model("mproduct");
			$this->load->model("marticles");
			$this->load->model("mindex");
			//$this->output->cache(30);
			
		}
		public function index(){
			$id1 = $this->uri->segment(2);
		    $id  = explode('c', $id1);
		    $id = $id[1];
			$id2 = $this->uri->segment(1);
			$data['online'] 		= $this->online();
			$data['access'] 	= $this->access();
			$this->write($data['access']);
			$data['pro_view'] 		= $this->mindex->list_pro_view();
			$data['config'] 		= $cate_name = $this->mproduct->getcate($id);
			if($id1 == NULL || !isset($cate_name['cate_id'])){
				redirect(base_url());
			}
			$data['list_news_invole'] 	= $this->marticles->list_news_invole();
			$get_setup 				= $this->mindex->get_setup();
			$data['pro_hot'] 		= $this->mindex->list_pro_hot($get_setup['set_pro_hot']);
			$config['base_url'] 	= base_url()."".$id2."/c".$id."";
			$config['total_rows'] 	= $this->mproduct->count_all_cate($id);
			$config['per_page'] 	= $get_setup['set_count_pro'];
			$config['uri_segment'] 	= "3";
			$config['next_link'] 	= "Next";
			$config['prev_link'] 	= "Prev";
			$config['first_link'] 	= "First";
			$config['last_link'] 	= "Last";
			$this->load->library("pagination");
			$this->pagination->initialize($config);
			$data['title'] 			= $cate_name['cate_name'];
			$data['listall'] 		= $this->mindex->listall();
			$data['list_cate_menu'] = $this->mindex->listall_cate($cate_name['cate_id'],$cate_name['cate_id_parent']);
			$data['list_support'] 	= $this->mindex->list_support();
			$data['list_pro_best'] 	= $this->mcolumn_right->list_product();
			$data['list_news'] 		= $this->mcolumn_right->list_news();
			$start = $this->uri->segment(3);
			$data['list_pro'] 		= $this->mproduct->list_pro($id,$config['per_page'],$start);
			$data['slide_adv']			= $this->mindex->get_listslide('23');
			$data['link_videos']			= $this->mindex->get_videos();
			$this->mproduct->update_cate($id);
			//$this->debug($data['list_cate_menu']);
			$this->load->view("product/all/layout",$data);
		}
	}