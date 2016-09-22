<?php
	class Articles extends MY_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->helper("url");
			$this->load->model("marticles");
			$this->load->library("string");
		}
		public function index(){
			$data['title'] 		= "Tin tức";
			$data['online'] 	= $this->online();
			$data['access'] 	= $this->access();
			$this->write($data['access']);
			$data['listall'] 	= $this->mindex->listall();
			$data['list_support'] 	= $this->mindex->list_support();
			$data['listnews'] 	= $this->marticles->listnews();
			$data['list_news_invole'] 	= $this->marticles->list_news_invole();
			$data['news_hot'] 	= $this->marticles->gethot();
			$get_setup 				= $this->mindex->get_setup();
			$data['pro_hot'] 		= $this->mindex->list_pro_hot($get_setup['set_pro_hot']);
			$data['pro_view'] 		= $this->mindex->list_pro_view();
			$data['link_videos']			= $this->mindex->get_videos();
			$id = $this->uri->segment(2);
		 	$config['base_url'] 	= base_url()."tin-tuc";
			$config['total_rows'] 	= $this->marticles->count_all_news();
			$config['per_page'] 	= 5;
			$config['uri_segment'] 	= 2;
			$config['next_link'] 	= "Next";
			$config['prev_link'] 	= "Prev";
			$config['first_link'] 	= "First";
			$config['last_link'] 	= "Last";
			$this->load->library("pagination");
			$this->pagination->initialize($config);
		 	//$this->debug($config);


			$start = $this->uri->segment(2);
			$data['list_new'] 		= $this->marticles->list_new($config['per_page'],$start);
			$data['template'] = "content";
			$this->load->view("articles/layout",$data);
		}
		public function list_news(){
			$ids = $this->uri->segment(2);
			$id  = array_pop(explode('ac', $ids));
			$data['getcago']		= $this->marticles->getcago($id);
			$data['title'] 			= $data['getcago']['cago_name'];
			$data['online'] 		= $this->online();
			$data['access'] 	= $this->access();
			$this->write($data['access']);
			$data['listall'] 		= $this->mindex->listall();
			$data['list_support'] 	= $this->mindex->list_support();
			$data['listnews'] 		= $this->marticles->listnews();
			$config['base_url'] 	= base_url()."".$id."";
			$config['total_rows'] 	= $this->marticles->count_all_new($id);
			$config['per_page'] 	= 10;
			$config['uri_segment'] 	= "2";
			$config['next_link'] 	= "Next";
			$config['prev_link'] 	= "Prev";
			$config['first_link'] 	= "First";
			$config['last_link'] 	= "Last";
			$this->load->library("pagination");
			$this->pagination->initialize($config);
			$start = $this->uri->segment(2);
			$data['list_new'] 		= $this->marticles->list_new($config['per_page'],$start);
			$data['pro_view'] 		= $this->mindex->list_pro_view();
			$data['template'] = "list";
			$this->load->view("articles/layouts",$data);
			//$this->debug($data['getcago']);
			
		}
		public function detail(){
			$id = $this->uri->segment(3);
			$data['online'] 		= $this->online();
			$data['access'] 	= $this->access();
			$this->write($data['access']);
			$data['pro_view'] 		= $this->mindex->list_pro_view();
			$data['detail_news'] 	= $this->marticles->getdata($id);
			$data['link_videos']			= $this->mindex->get_videos();
			if($id == NULL || !isset($data['detail_news']['news_id'])){
				redirect(base_url());
			}
			$get_setup 				= $this->mindex->get_setup();
			$data['pro_hot'] 		= $this->mindex->list_pro_hot($get_setup['set_pro_hot']);
			$cago_id = $data['detail_news']['cago_id'];
			$data['other_list']  = $this->marticles->other_list($cago_id,$id);
			$data['title'] = $data['detail_news']['news_title'];
			$data['listall'] 	= $this->mindex->listall();
			$data['list_support'] 	= $this->mindex->list_support();
			$data['listnews'] 	= $this->marticles->listnews();
			$data['news_hot'] 	= $this->marticles->gethot();
			$this->marticles->update_news($id);
			$data['template'] = "detail";
			//$this->debug($data['news_hot']);
			$this->load->view("articles/layout",$data);
		}
	}