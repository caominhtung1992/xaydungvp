<?php
	class Detail extends MY_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->helper("url");
			$this->load->library('session');
			$this->load->library("string");
			$this->load->model("mproduct");
			$this->load->model("marticles");
			$this->load->model("mindex");
			//$this->output->cache(30);
			
		}
		public function index(){
			$id1 = $this->uri->segment(2);
		    $id  = explode('p', $id1);
		    $id = $id[1];
			$data['detail'] 		= $this->mproduct->getdata($id);
			if($id == NULL || !isset($data['detail']['pro_id'])){
				redirect(base_url());
			}
			$data['list_news_invole'] 	= $this->marticles->list_news_invole();
			$data['online'] 		= $this->online();
			$data['access'] 	= $this->access();
			$this->write($data['access']);
			$data['pro_view'] 		= $this->mindex->list_pro_view();
			$get_setup 				= $this->mindex->get_setup();
			$data['pro_hot'] 		= $this->mindex->list_pro_hot($get_setup['set_pro_hot']);
			$data['list_support'] 	= $this->mindex->list_support();
			$data['listall'] 		= $this->mindex->listall();
			$data['title'] 			= $data['detail']['pro_name'];
			$data['list_pro_best'] 	= $this->mcolumn_right->list_product();
			$data['list_news'] 		= $this->mcolumn_right->list_news();
			$data['get_related_products'] = $this->mproduct->get_related_products($data['detail']['cate_id_parent'],$data['detail']['pro_id']);
			//$this->debug($data['get_related_products']);
			$this->mproduct->update_pro($id);
			$data['slide_adv']			= $this->mindex->get_listslide('23');
			$data['link_videos']			= $this->mindex->get_videos();
			
			/*$history = $this->mproduct->getdata($id);
			$his = array(
               'id'      	=> $history['pro_id'],
               'price'   	=> $history['pro_price'],
               'name'    	=> url_title($history['pro_name']),
			   'rewrite'    => $history['pro_name_rewrite'],
               'images' 	=> $history['pro_images']
            );
			$this->debug($his);
			$this->session->set_userdata($his);*/
			
			//$this->Debug($data['list_pro_best']);
			$this->load->view("product/detail/layout",$data);
		}
	}