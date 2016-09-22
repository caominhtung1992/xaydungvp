<?php
	require("libraries/student.php");
	class Product_category extends Student{
		public function __construct(){
			parent::__construct();
			$this->load->helper("url");
			$this->load->model("mproduct_category");
			$this->load->library("string");
		}
		public function index(){
			$config['base_url'] 	= base_url()."admin/product_category/index";
			$config['total_rows'] 	= $this->mproduct_category->count_all_parent();
			$config['per_page'] 	= "10";
			$config['uri_segment'] 	= "4";
			$config['next_link'] 	= "Next";
			$config['prev_link'] 	= "Prev";
			$config['first_link'] 	= "First";
			$config['last_link'] 	= "Last";
			$this->load->library("pagination");
			$this->pagination->initialize($config);
			$start = $this->uri->segment(4);
			$data['act'] = "2";
			$data['title'] = "Danh mục sản phẩm";
			$data['list_cate'] = $this->mproduct_category->list_cate_all($config['per_page'],$start);
			//$this->Debug($data['list_cate']);
			$data['template'] = "product_category/list_category";
			$this->load->view("layout",$data);
		}
		public function add(){
			$data['act'] = "2";
			$data['title'] = "Thêm mới danh mục sản phẩm";
			$data['template'] = "product_category/add_category";
			$data['list_cate'] = $this->mproduct_category->list_cate(100,0);
			$this->load->helper("form");
			if($this->input->post('ok') != ""){
				$url = str_replace(' ', '-',strtolower($this->string->replace($this->input->post('cate_name'))));
				$val = array(
					"cate_name"		=> $this->fillter($this->input->post("cate_name")),
					"cate_rewrite"	=> $this->fillter($url),
					"cate_info"		=> $this->fillter($this->input->post("cate_info")),
					"cate_full"		=> $this->input->post("cate_full"),
					"cate_order"	=> $this->fillter($this->input->post("cate_order")),
					"cate_key"		=> $this->fillter($this->input->post("cate_key")),
					"cate_des"		=> $this->fillter($this->input->post("cate_des")),
					"cate_display"	=> $this->input->post("cate_display")
					//"cate_parent"	=> $this->input->post("cate_parent")
				);
				if($this->input->post("cate_parent") == 1){
					$val['cate_parent'] = 1;
				}else{
					$val['cate_parent'] = 2;
					$val['cate_id_parent']   	= $this->input->post("cate_parent");
				}
				if($_FILES['cate_images']['name'] != NULL){
					$config['upload_path'] = './uploads/product_category';
					$config['file_name'] = time() . rand(1,988);
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_size']	= '2000';
					$config['max_width']  = '1400';
					$config['max_height']  = '1400';
					$this->load->library('upload',$config);
					if(!$this->upload->do_upload("cate_images")){
						$data = array('error' => $this->upload->display_errors());
						$data['act'] = "2";
			  			$data['title'] = "Thêm mới danh mục sản phẩm";
			  			$data['template'] = "product_category/add_category";
			  			$data['list_cate'] = $this->mproduct_category->list_cate(100,0);
						$this->load->view("layout",$data);
						return FALSE;
					}else{
						$data = $this->upload->data();
						$val['cate_images'] = $data['file_name'];
						$this->createThumbnail("uploads/product_category",$val['cate_images'],170,160);
					}
				 } 
				//$this->debug($val);
				$this->mproduct_category->add($val);
				redirect(base_url()."admin/product_category");
			}
			$this->load->view("layout",$data);
		}
		public function update(){
			$data['act'] = "2";
			$data['title'] = "Sửa danh mục sản phẩm";
			$data['template'] = "product_category/edit_category";
			$id = $this->uri->segment(4);
			$data['get'] = $this->mproduct_category->getdata($id);
			if($id == NULL || !isset($data['get']['cate_id'])){
				redirect(base_url()."admin/product_category");
			}
			$data['list_cate'] = $this->mproduct_category->list_cate(100,0);
			if(!isset($data['get']['cate_id'])){
				redirect(base_url()."admin/product_category");
			}
			$this->load->helper("form");
			if($this->input->post('ok') != ""){
				$url = str_replace(' ', '-',strtolower($this->string->replace($this->input->post('cate_name'))));
				$val = array(
					"cate_name"		=> $this->fillter($this->input->post("cate_name")),
					"cate_rewrite"	=> $this->fillter($url),
					"cate_info"		=> $this->fillter($this->input->post("cate_info")),
					"cate_full"		=> $this->input->post("cate_full"),
					"cate_order"	=> $this->fillter($this->input->post("cate_order")),
					"cate_key"		=> $this->fillter($this->input->post("cate_key")),
					"cate_des"		=> $this->fillter($this->input->post("cate_des")),
					"cate_display"	=> $this->input->post("cate_display")
				);
				if($this->input->post("cate_parent") == 1){
					$val['cate_parent'] = 1;
					$val['cate_id_parent']   	= 0;
				}else{
					$val['cate_parent'] = 2;
					$val['cate_id_parent']   	= $this->input->post("cate_parent");
				}
				if($_FILES['cate_images']['name'] != NULL){
					$config['upload_path'] = './uploads/product_category';
					$config['file_name'] = time() . rand(1,988);
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_size']	= '2000';
					$config['max_width']  = '1400';
					$config['max_height']  = '1400';
					$this->load->library('upload',$config);
					if(!$this->upload->do_upload("cate_images")){
						$data = array('error' => $this->upload->display_errors());
						$data['act'] = "2";
						$data['title'] = "Sửa danh mục sản phẩm";
						$data['template'] = "product_category/edit_category";
						$id = $this->uri->segment(4);
						$data['list_cate'] = $this->mproduct_category->list_cate(100,0);
						$data['get'] = $this->mproduct_category->getdata($id);
						$this->load->view("layout",$data);
						return FALSE;
					}else{
						$imgs = $data['get']['cate_images'];
						@unlink("uploads/product_category/".$imgs);
						@unlink("uploads/product_category/thumb/".$imgs);
						$data = $this->upload->data();
						$val['cate_images'] = $data['file_name'];
						//$this->debug($imgs);
						$this->createThumbnail("uploads/product_category",$val['cate_images'],170,160);
					}
				 } 
				$this->mproduct_category->update_cate($val,$id);
				redirect(base_url()."admin/product_category");
			}
			$this->load->view("layout",$data);
		}
		public function update_status(){
			$id = $this->input->post('rel');
			if($this->input->post("type")){
				$status = $this->input->post('val');
				if($status == 0){
					$val = array(
						"cate_status" => "1"
					);
					$this->mproduct_category->update_cate($val,$id);
					die();
				}else{
					$val = array(
						"cate_status" => "0"
					);
					$this->mproduct_category->update_cate($val,$id);
					die();
				}
			}
		}
		public function update_order(){
			$id = $this->input->post('id');
			$val = $this->fillter($this->input->post('val'));
			$data = array(
				"cate_order" => $val
			);
			$this->mproduct_category->update_cate($data,$id);
		}
		public function del(){
			$id = $this->input->post('id');
			$imgs = $this->mproduct_category->getdata($id);
			@unlink("uploads/product_category/".$imgs['cate_images']);
			@unlink("uploads/product_category/thumb/".$imgs['cate_images']);
			$this->mproduct_category->del_cate($id);
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