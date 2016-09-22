<?php
	class Page extends MY_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->helper("url");
			$this->load->model("mpage");
			$this->load->model("mindex");
			$this->load->model("marticles");
		}
		public function detail(){
			$id = $this->uri->segment(3);
			$data['detail_page'] 	= $this->mpage->getdata($id);
			if($id == NULL || !isset($data['detail_page']['page_id'])){
				redirect(base_url());
			}
			$data['online'] 		= $this->online();
			$data['access'] 	= $this->access();
			$this->write($data['access']);
			$data['pro_view'] 		= $this->mindex->list_pro_view();
			$data['list_news_invole'] 	= $this->marticles->list_news_invole();
			$get_setup 				= $this->mindex->get_setup();
			$data['pro_hot'] 		= $this->mindex->list_pro_hot($get_setup['set_pro_hot']);
			$data['title'] = $data['detail_page']['page_title'];
			$data['listall'] 		= $this->mindex->listall();
			$data['list_support'] 	= $this->mindex->list_support();
			$data['slide_adv']			= $this->mindex->get_listslide('23');
			$data['link_videos']			= $this->mindex->get_videos();
			$this->mpage->update_page($id);
			$data['template'] = "detail";
			$this->load->view("page/layout",$data);
		}
	}