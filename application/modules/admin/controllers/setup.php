<?php
	require("libraries/student.php");
	class Setup extends Student{
		public function __construct(){
			parent::__construct();
			$this->load->helper("url");
			$this->load->model("msetup");
		}
		public function index(){
			$data['title'] = "Cài đặt hiển thị";
			$data['act'] = 7;
			$data['get'] = $this->msetup->getdata();
			$data['template'] = "setup/update_general";
			if($this->input->post("update_home") != ""){
				$val = array(
					"set_pass" 				=> $this->fillter($this->input->post("set_pass")),
					"set_info"				=> $this->fillter($this->input->post("set_info")),
					"set_count_pro" 		=> $this->fillter($this->input->post("set_count_pro")),
					"set_count_news" 		=> $this->fillter($this->input->post("set_count_news")),
				);
				//$this->Debug($val);
				$this->msetup->update_setup($val,1);
				redirect(base_url()."admin/setup");
			}else{
				$this->load->view("layout",$data);
			}
		}
		public function homepage(){
			if($this->input->post("update_homepage") != ""){
				$val = array(
					"set_pro_hot" 				=> $this->fillter($this->input->post("set_pro_hot")),
					"set_pro_bestsale"			=> $this->fillter($this->input->post("set_pro_bestsale")),
					"set_pro_new" 				=> $this->fillter($this->input->post("set_pro_new")),
					"set_pro_saleoff" 			=> $this->fillter($this->input->post("set_pro_saleoff")),
				);
				$this->msetup->update_setup($val,1);
				redirect(base_url()."admin/setup");
			}
		}
	}