<?php
	require("libraries/student.php");
	class Product extends Student{
		public function __construct(){
			parent::__construct();
			$this->load->helper("url");
			$this->load->model("mproduct");
			$this->load->library("string");
		}
		public function index(){
			$config['base_url'] 	= base_url()."admin/product/index";
			if(isset($_REQUEST['cate'])){
				$id_cate = $_REQUEST['cate'];	
				$config['total_rows'] 	= $this->mproduct->count_all_procate($id_cate);
			}else{
				$config['total_rows'] 	= $this->mproduct->count_all();
			}
			$config['per_page'] 	= "30";
			$config['uri_segment'] 	= "4";
			$config['next_link'] 	= "Next";
			$config['prev_link'] 	= "Prev";
			$config['first_link'] 	= "First";
			$config['last_link'] 	= "Last";
			$this->load->library("pagination");
			$this->pagination->initialize($config);
			$start = $this->uri->segment(4);
			if(isset($_REQUEST['cate'])){
				$id_cate = $_REQUEST['cate'];
				$data['list_pro'] = $this->mproduct->list_pro_cate($id_cate,$config['per_page'],$start);	
				$data['row'] 	= $this->mproduct->count_all_procate($id_cate);
			}else{
				$data['list_pro'] = $this->mproduct->list_pro($config['per_page'],$start);
				$data['row'] 	= $this->mproduct->count_all();
			}
			$data['list_cate'] = $this->mproduct->list_cate_all();
			$data['act'] = "2";
			$data['title'] = "Danh sách sản phẩm";
			$data['template'] = "product/list_product";
			$this->load->view("layout",$data);
		}
		public function add(){
			$data['act'] = "2";
			$data['title'] = "Thêm mới sản phẩm";
			$data['template'] = "product/add_product";
			$data['list_cate'] = $this->mproduct->list_cate_all();
			$cate_id = $this->input->post("cate_id");
			$arr = explode(",",$cate_id);
			$id = $this->uri->segment(4);
			$this->load->helper("form");
			if($this->input->post('ok') != ""){
				$url = str_replace(' ', '-',strtolower($this->string->replace($this->input->post('pro_name'))));
				$val = array(
					"pro_name"			=> $this->fillter($this->input->post("pro_name")),
					"pro_name_rewrite"	=> $this->fillter($url),
					"pro_info"			=> $this->input->post("pro_info"),
					"pro_code"			=> $this->fillter($this->input->post("pro_code")),
					"pro_price"			=> $this->fillter($this->input->post("pro_price")),
					"pro_market"		=> $this->fillter($this->input->post("pro_market")),
					"pro_qty"			=> $this->fillter($this->input->post("pro_qty")),
					"pro_promotion"		=> $this->fillter($this->input->post("pro_promotion")),
					"pro_war"			=> $this->fillter($this->input->post("pro_war")),
					"pro_producer"			=> $this->fillter($this->input->post("pro_producer")),
					"pro_full"			=> $this->input->post("pro_full"),
					"pro_description"			=> $this->input->post("pro_description"),
					"pro_date"			=> date("H:i:s - d/m/Y"),
					"pro_key"			=> $this->fillter($this->input->post("pro_key")),
					"pro_des"			=> $this->fillter($this->input->post("pro_des"))
				);
				if(isset($arr['1'])){
					$val['cate_id'] = $arr['0'];
					$val['cate_id_parent'] = $arr['1'];
				}else{
					$val['cate_id'] = $cate_id;
				}
				$image = $_FILES['image']['name'];
				$imgm = array();
				$nowm = "";
				if($_FILES['image']['name'][0] != NULL){
					for($i=0;$i<count($image);$i++){
						$name = $_FILES['image']['name'][$i];
						$type = $_FILES['image']['type'][$i];
						$size = $_FILES['image']['size'][$i];
						if($type == "image/jpeg" || $type == "image/png" || $type == "image/gif"){
							if($size > 1048576){
								die("File size not larger than 1mb");
							}else{
								$nowm = date("dmYhis");
								if(!file_exists("uploads/products/".$nowm)){
									mkdir("uploads/products/".$nowm,0777);
								}
								$val['pro_folderimg'] = $nowm;
								$newfilename = $nowm.end(explode("".$type."",$_FILES['image']['name'][$i]));
								move_uploaded_file($_FILES['image']['tmp_name'][$i],"uploads/products/".$nowm."/".$newfilename);
								$imgm[] = $nowm.end(explode("".$type."",$_FILES['image']['name'][$i]));
								//$newfilename = $nowm.end(explode("".$type."",$_FILES['image']['name'][$i]));
								//$this->Debug($newfilename);
								$this->createThumbnail("uploads/products/".$nowm."/","uploads/products/thumb",$newfilename,250,190);
								//$this->debug("uploads/products/".$nowm."/".$newfilename);
							}
						}else{
							die("Invalid image file type (.jpg | .gif | .png) ");
						}
					}
					$val['pro_images'] = serialize($imgm);
				}
				$this->mproduct->add($val,$id);
				redirect(base_url()."admin/product");
			}else{
				$this->load->view("layout",$data);
			}
		}
		public function update(){
			$data['act'] = "2";
			$data['title'] = "Sửa thông tin sản phẩm";
			$data['template'] = "product/edit_product";
			$cate_id = $this->input->post("cate_id");
			$arr = explode(",",$cate_id);
			$id = $this->uri->segment(4);
			$data['get'] = $imgs = $this->mproduct->getdata($id);
			if($id == NULL || !isset($data['get']['pro_id'])){
				redirect(base_url()."admin/product");
			}
			$data['list_cate'] = $this->mproduct->list_cate_all();
			$this->load->helper("form");
			if($this->input->post('ok') != ""){
				$url = str_replace(' ', '-',strtolower($this->string->replace($this->input->post('pro_name'))));
				$val = array(
					"pro_name"			=> $this->fillter($this->input->post("pro_name")),
					"pro_name_rewrite"	=> $this->fillter($url),
					"pro_info"			=> $this->input->post("pro_info"),
					"pro_code"			=> $this->fillter($this->input->post("pro_code")),
					"pro_price"			=> $this->fillter($this->input->post("pro_price")),
					"pro_market"		=> $this->fillter($this->input->post("pro_market")),
					"pro_qty"			=> $this->fillter( $this->input->post("pro_qty")),
					"pro_promotion"		=> $this->fillter($this->input->post("pro_promotion")),
					"pro_war"			=> $this->fillter($this->input->post("pro_war")),
					"pro_producer"			=> $this->fillter($this->input->post("pro_producer")),
					"pro_full"			=> $this->input->post("pro_full"),
					"pro_description"			=> $this->input->post("pro_description"),
					"pro_key"			=> $this->fillter($this->input->post("pro_key")),
					"pro_des"			=> $this->fillter($this->input->post("pro_des"))
				);
				if(isset($arr['1'])){
					$val['cate_id'] = $arr['0'];
					$val['cate_id_parent'] = $arr['1'];
				}else{
					$val['cate_id'] = $cate_id;
				}
				//$this->debug($val);
				$image = $_FILES['image']['name'];
				$imgm = array();
				$nowm = "";
				if($_FILES['image']['name'][0] != NULL){
					for($i=0;$i<count($image);$i++){
						$name = $_FILES['image']['name'][$i];
						$type = $_FILES['image']['type'][$i];
						$size = $_FILES['image']['size'][$i];
						if($type == "image/jpeg" || $type == "image/png" || $type == "image/gif"){
							if($size > 1048576){
								die("File size not larger than 1mb");
							}else{
								$nowm = date("dmYhis");
								if(!file_exists("uploads/products/".$nowm)){
									mkdir("uploads/products/".$nowm,0777);
								}
								$val['pro_folderimg'] = $nowm;
								$newfilename = $nowm.end(explode("".$type."",$_FILES['image']['name'][$i]));
								move_uploaded_file($_FILES['image']['tmp_name'][$i],"uploads/products/".$nowm."/".$newfilename);
								//move_uploaded_file($_FILES['image']['tmp_name'][$i],"uploads/products/".$nowm."/".$_FILES['image']['name'][$i]);
								$imgm[] = $nowm.end(explode("".$type."",$_FILES['image']['name'][$i]));
								//$imgs = $this->mproduct->getdata($id);
								$this->rmforder($imgs['pro_folderimg'],"uploads/products/");
								@$images = unserialize($imgs['pro_images']);
								if($images != NULL){
									foreach($images as $value){
										@unlink("uploads/products/thumb/".$value);
									}
								}
								$this->createThumbnail("uploads/products/".$nowm."/","uploads/products/thumb",$newfilename,250,190);
								//$this->createThumbnail("uploads/products/".$nowm."/","uploads/products/thumb",$_FILES['image']['name'][$i],250,190);
							}
						}else{
							die("Invalid image file type (.jpg | .gif | .png) ");
						}
					}
					$val['pro_images'] = serialize($imgm);
					//$this->createThumbnail("uploads/products/abc",$_FILES['image']['name'][$i],170,130);
				}
				$this->mproduct->update_product($val,$id);
				redirect(base_url()."admin/product");
			}else{
				$this->load->view("layout",$data);
			}
		}
		public function del(){
			$id = $this->input->post('pro_id');
			$imgs = $this->mproduct->getdata($id);
			@$images = unserialize($imgs['pro_images']);
			if($images != NULL){
				foreach($images as $value){
					@unlink("uploads/products/thumb/".$value);
				}
			}
			$this->rmforder($imgs['pro_folderimg'],"uploads/products/");
			$this->mproduct->del($id);
		}
		public function update_status(){
			$id = $this->input->post('rel');
			if($this->input->post("type")){
				$status = $this->input->post('val');
				if($status == 0){
					$val = array(
						"pro_status" => "1"
					);
					$this->mproduct->update_product($val,$id);
					die();
				}else{
					$val = array(
						"pro_status" => "0"
					);
					$this->mproduct->update_product($val,$id);
					die();
				}
			}
		}
		public function update_all(){
			$id = $this->input->post('pro_id');
			$val = array(
				"pro_new"		=> $this->input->post('pro_new'),
				"pro_hot"		=> $this->input->post('pro_hot'),
				"pro_bestsale"	=> $this->input->post('pro_bestsale'),
				"pro_saleoff"	=> $this->input->post('pro_saleoff'),
				"pro_new_check" 	=> date("HisdmY"),
				"pro_saleoff_check" 	=> date("HisdmY"),
				"pro_bestsale_check" 	=> date("HisdmY"),
				"pro_hot_check" 	=> date("HisdmY")
			);
			//$this->debug($val);
			$this->mproduct->update_product($val,$id);
		}
		public function update_order(){
			$id = $this->input->post('id');
			$val = $this->fillter($this->input->post('val'));
			$data = array(
				"pro_order" => $val
			);
			$this->mproduct->update_product($data,$id);
		}
		public function createThumbnail($parth,$parththumb,$fileName,$width,$height){
			$this->load->library('image_lib');
			//$this->load->helper('thumbnail_helper');
			$config['image_library'] = 'gd2';
			$config['source_image'] = $parth.'/'.$fileName;
			$config['new_image'] = $parththumb.'/'.$fileName;
			$config['create_thumb'] = TRUE;
			$config['maintain_ratio'] = TRUE;
			$config['thumb_marker'] = FALSE;
			$config['width'] = $width;
			$config['height'] = $height;
			$this->image_lib->initialize($config); 
			$this->image_lib->resize();
			$this->image_lib->clear();
		}
		public function rmforder($forder,$parth){
			$dirPath = $parth."/".$forder;
			if(file_exists($dirPath)){
				if(! is_dir($dirPath)) {
			        throw new InvalidArgumentException("$dirPath must be a directory");
			    }
			    if(substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
			        $dirPath .= '/';
			    }
			    $files = glob($dirPath . '*', GLOB_MARK);
			    foreach ($files as $file) {
			        if (is_dir($file)) {
			            rmdir($file);
			        } else {
			            unlink($file);
			        }
			    }
			    rmdir($dirPath);
			}
		}
	}