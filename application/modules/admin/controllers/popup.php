<?php
	require("libraries/student.php");
	class Popup extends Student{
		public function __construct(){
			parent::__construct();
			$this->load->helper("url");
			$this->load->helper("form");
			$this->load->model("mmarketing");
		}
		public function index(){
			$data['act'] = "4";
			$data['title'] = "Banner popup";
			$data['template'] = "popup/update_popup";
			$data['popup'] = $this->mmarketing->getpop();
			
			if($this->input->post("ok") != ""){
				$val = array(
					"pop_link" 		=> $this->fillter($this->input->post("pop_link")),
					"pop_status"	=> $this->input->post("pop_status"),
				);
				if($_FILES['pop_images']['name'] != NULL){
					$config['upload_path'] = './uploads/popup';
					$config['file_name'] = time() . rand(1,988);
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_size']	= '2000';
					$config['max_width']  = '1400';
					$config['max_height']  = '1400';
					$this->load->library('upload',$config);
					if(!$this->upload->do_upload("pop_images")){
						$data = array('error' => $this->upload->display_errors());
						$data['act'] = "4";
						$data['title'] = "Banner popup";
						$data['template'] = "popup/update_popup";
						$data['popup'] = $this->mmarketing->getpop();
						$this->load->view("layout",$data);
						return FALSE;
					}else{
						$imgs = $data['popup']['pop_images'];
						@unlink("uploads/popup/".$imgs);
						$data = $this->upload->data();
						$val['pop_images'] = $data['file_name'];
					}
				 } 
				$this->mmarketing->update_popup($val,1);
				redirect(base_url()."admin/popup");
			}else{
				$this->load->view("layout",$data);
			}
		}
		public function update(){
			//$id = $this->uri->segment(4);
			if($this->input->post("ok") != ""){
				$val = array(
					"config_email" 		=> $this->fillter($this->input->post("config_email")),
					"config_title"		=> $this->fillter($this->input->post("config_title")),
					"config_key" 		=> $this->fillter($this->input->post("config_key")),
					"config_des" 		=> $this->fillter($this->input->post("config_des")),
					"config_intro" 		=> $this->fillter($this->input->post("config_intro")),
					"config_contact" 	=> $this->fillter($this->input->post("config_contact"))
				);
				$this->mconfig->update_config($val,1);
				redirect(base_url()."admin/index");
			}else{
				$this->load->view("layout",$data);
			}
		}
	}