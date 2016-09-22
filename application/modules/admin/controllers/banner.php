<?php
	require("libraries/student.php");
	class Banner extends Student{
		public function __construct(){
			parent::__construct();
			$this->load->helper("url");
			$this->load->model("mbanner");
		}
		public function index(){
			$config['base_url'] 	= base_url()."admin/banner/index";
			$config['total_rows'] 	= $this->mbanner->count_all();
			$config['per_page'] 	= "10";
			$config['uri_segment'] 	= "4";
			$config['next_link'] 	= "Next";
			$config['prev_link'] 	= "Prev";
			$config['first_link'] 	= "First";
			$config['last_link'] 	= "Last";
			$this->load->library("pagination");
			$this->pagination->initialize($config);
			$start = $this->uri->segment(4);
			if(isset($_GET['location'])){
				$location = $_GET['location'];
			}else{
				$location = '';
			}
			//$this->debug($location);
			$data['list_slide'] = $this->mbanner->list_slide($location,$config['per_page'],$start);
			$data['list_location'] = $this->mbanner->list_location();
			$data['act'] = "4";
			$data['title'] = "Danh sách banner";
			$data['template'] = "banner/list_banner";
			$this->load->view("layout",$data);
		}
		public function add(){
			$data['act'] = "4";
			$data['title'] = "Thêm mới banner";
			$data['template'] = "banner/add_banner";
			$data['list_location'] = $this->mbanner->list_location();
			if($this->input->post('ok') != ""){
				$val = array(
					"slide_title"	=> $this->fillter($this->input->post("slide_name")),
					"slide_link"	=> $this->input->post("desUrl"),
					"slide_type" 	=> $this->fillter($this->input->post("locationId"))
				);
				
				if($_FILES['media_file_1']['name'] != NULL){
					$config['upload_path'] = './uploads/banner';
					$config['file_name'] = time() . rand(1,988);
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_size']	= '2000';
					$config['max_width']  = '10400';
					$config['max_height']  = '10400';
					$this->load->library('upload',$config);
					if(!$this->upload->do_upload("media_file_1")){
						$data = array('error' => $this->upload->display_errors());
						$data['act'] = "4";
						$data['title'] = "Sửa banner";
						$data['list_location'] = $this->mbanner->list_location();
						$data['template'] = "banner/add_banner";
						$this->load->view("layout",$data);
						return FALSE;
					}else{
						$imgs = $data['get']['slide_image'];
						@unlink("uploads/banner/".$imgs);
						@unlink("uploads/banner/thumb/".$imgs);
						$data = $this->upload->data();
						$val['slide_image'] = $data['file_name'];
						$this->createThumbnail("uploads/banner",$val['slide_image'],170,160);
					}
				 } 
				 
				$this->mbanner->add($val);
				redirect(base_url()."admin/banner");
			}else{
				$this->load->view("layout",$data);
			}
		}
		public function update(){
			$data['act'] = "4";
			$data['title'] = "Sửa banner";
			$data['template'] = "banner/edit_banner";
			$id = $this->uri->segment(4);
			$data['get'] = $this->mbanner->getdata($id);
			$data['list_location'] = $this->mbanner->list_location();
			if($id == NULL || !isset($data['get']['slide_id'])){
				redirect(base_url()."admin/banner");
			}
			if($this->input->post('ok') != ""){
				$val = array(
					"slide_title"	=> $this->fillter($this->input->post("slide_name")),
					"slide_link"	=> $this->input->post("desUrl"),
					"slide_type" 	=> $this->fillter($this->input->post("locationId"))
				);
				
				if($_FILES['media_file_1']['name'] != NULL){
					$config['upload_path'] = './uploads/banner';
					$config['file_name'] = time() . rand(1,988);
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_size']	= '2000';
					$config['max_width']  = '10400';
					$config['max_height']  = '10400';
					$this->load->library('upload',$config);
					if(!$this->upload->do_upload("media_file_1")){
						$data = array('error' => $this->upload->display_errors());
						$data['act'] = "4";
						$data['title'] = "Sửa banner";
						$data['template'] = "banner/edit_banner";
						$id = $this->uri->segment(4);
						$data['get'] = $this->mbanner->getdata($id);
						$this->load->view("layout",$data);
						return FALSE;
					}else{
						$imgs = $data['get']['slide_image'];
						@unlink("uploads/banner/".$imgs);
						@unlink("uploads/banner/thumb/".$imgs);
						$data = $this->upload->data();
						$val['slide_image'] = $data['file_name'];
						$this->createThumbnail("uploads/banner",$val['slide_image'],170,160);
					}
				 } 
				 
				$this->mbanner->update_slide($val,$id);
				redirect(base_url()."admin/banner");
			}else{
				$this->load->view("layout",$data);
			}
		}
		
		public function update_status(){
			$id = $this->input->post('rel');
			if($this->input->post("type")){
				$status = $this->input->post('val');
				if($status == 0){
					$val = array(
						"slide_status" => "1"
					);
					$this->mbanner->update_slide($val,$id);
					die();
				}else{
					$val = array(
						"slide_status" => "0"
					);
					$this->mbanner->update_slide($val,$id);
					die();
				}
			}
		}
		public function del(){
			$id = $this->input->post('id');
			$this->mbanner->del($id);
		}
		
		public function update_order(){
			$id = $this->input->post('id');
			$val = $this->fillter($this->input->post('val'));
			$data = array(
				"slide_order" => $val
			);
			$this->mbanner->update_slide($data,$id);
		}
		//Banner Location
		public function location(){
			$data['act'] = "4";
			$data['title'] = "Vị trí banner";
			$data['template'] = "banner/location";
			$data['list_location'] = $this->mbanner->list_location();
			if($this->input->post('addNew') == "yes"){
				if($this->input->post("txt_name") == ""){
					$data['error'] = "Lỗi! vui lòng thử lại.";
				}else{
					$val = array(
						"location_name"	=> $this->input->post("txt_name"),
						"location_description"	=> $this->input->post("description"),
						"location_date" => date("d-m-Y")
					);
					$this->mbanner->add_location($val);
					redirect(base_url()."admin/banner/location");
				}
			}else if($this->input->post('changeId') != ""){
				$id = 'txt_name_'.$this->input->post("changeId");
				$description = 'description_'.$this->input->post("changeId");
				$val = array(
					"location_name"	=> $this->input->post($id),
					"location_description"	=> $this->input->post($description)
				);
				$this->mbanner->update_location($val,$this->input->post("changeId"));
				redirect(base_url()."admin/banner/location");
			}else if($this->input->post('deleteId') != ""){
				$id = $this->input->post("deleteId");
				$this->mbanner->del_location($id);
				redirect(base_url()."admin/banner/location");
			}
			$this->load->view("layout",$data);
		}
		
		public function createThumbnail($parth,$fileName,$width,$height){
			$this->load->library('image_lib');
			$config['image_library'] = 'gd2';
			$config['source_image'] = $parth.'/'.$fileName;
			$config['new_image'] = $parth.'/thumb/'.$fileName;
			$config['create_thumb'] = TRUE;
			$config['maintain_ratio'] = TRUE;
			$config['thumb_marker'] = FALSE;
			$config['width'] = $width;
			$config['height'] = $height;
			$this->image_lib->initialize($config); 
			$this->image_lib->resize();
			$this->image_lib->clear();
		}
	}