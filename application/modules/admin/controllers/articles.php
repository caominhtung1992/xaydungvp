<?php
	require("libraries/student.php");
	class Articles extends Student{
		public function __construct(){
			parent::__construct();
			$this->load->helper("url");
			$this->load->model("marticles");
			$this->load->library("string");
		}
		public function index(){
			$config['base_url'] 	= base_url()."admin/articles/index";
			$config['total_rows'] 	= $this->marticles->count_all();
			$config['per_page'] 	= "10";
			$config['uri_segment'] 	= "4";
			$config['next_link'] 	= "Next";
			$config['prev_link'] 	= "Prev";
			$config['first_link'] 	= "First";
			$config['last_link'] 	= "Last";
			$this->load->library("pagination");
			$this->pagination->initialize($config);
			$start = $this->uri->segment(4);
			$data['list_news'] = $this->marticles->list_news($config['per_page'],$start);
			$data['row'] 	= $this->marticles->count_all();
			$data['list_cago'] = $this->marticles->list_cago();
			$data['act'] = "5";
			$data['title'] = "Danh sách tin tức";
			$data['template'] = "articles/list_articles";
			$this->load->view("layout",$data);
		}
		public function add(){
			$data['act'] = "5";
			$data['title'] = "Thêm mới tin tức";
			$data['template'] = "articles/add_articles";
			$id = $this->uri->segment(4);
			$data['get'] = $this->marticles->getdata($id);
			$data['list_cago'] = $this->marticles->list_cago();
			$this->load->helper("form");
			if($this->input->post('ok') != ""){
				$url = str_replace(' ', '-',strtolower($this->string->replace($this->input->post('news_title'))));
				$val = array(
					"cago_id"		=> $this->input->post("cago_id"),
					"news_rewrite"	=> $this->fillter($url),
					"news_title"	=> $this->fillter($this->input->post("news_title")),
					"news_info"		=> $this->fillter($this->input->post("news_info")),
					"news_full"		=> $this->input->post("news_full"),
					"news_external"	=> $this->fillter($this->input->post("news_external")),
					"news_key"		=> $this->fillter($this->input->post("news_key")),
					"news_des"		=> $this->fillter($this->input->post("news_des")),
					"news_date" => date("H:i:s - d/m/Y")
				);
				if($_FILES['news_images']['name'] != NULL){
					$config['upload_path'] = './uploads/news';
					$config['file_name'] = time() . rand(1,988);
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_size']	= '2000';
					$config['max_width']  = '1400';
					$config['max_height']  = '1400';
					$this->load->library('upload',$config);
					if(!$this->upload->do_upload("news_images")){
						$data = array('error' => $this->upload->display_errors());
						$data['act'] = "5";
						$data['title'] = "Sửa tin tức";
						$data['template'] = "articles/add_articles";
						$id = $this->uri->segment(4);
						$data['get'] = $this->marticles->getdata($id);
						$data['list_cago'] = $this->marticles->list_cago();
						$this->load->view("layout",$data);
						return FALSE;
					}else{
						//$imgs = $data['get']['news_images'];
						//@unlink("uploads/news/".$imgs);
						//@unlink("uploads/news/thumb/".$imgs);
						$data = $this->upload->data();
						$val['news_images'] = $data['file_name'];
						$this->createThumbnail("uploads/news",$val['news_images'],170,160);
					}
				 } 
				$this->marticles->add($val,$id);
				redirect(base_url()."admin/articles");
			}else{
				$this->load->view("layout",$data);
			}
		}
		public function update(){
			$data['act'] = "5";
			$data['title'] = "Sửa tin tức";
			$data['template'] = "articles/edit_articles";
			$id = $this->uri->segment(4);
			$data['get'] = $this->marticles->getdata($id);
			if($id == NULL || !isset($data['get']['news_id'])){
				redirect(base_url()."admin/articles");
			}
			$data['list_cago'] = $this->marticles->list_cago();
			$this->load->helper("form");
			if($this->input->post('ok') != ""){
				$url = str_replace(' ', '-',strtolower($this->string->replace($this->input->post('news_title'))));
				$val = array(
					"cago_id"		=> $this->input->post("cago_id"),
					"news_rewrite"	=> $this->fillter($url),
					"news_title"	=> $this->fillter($this->input->post("news_title")),
					"news_info"		=> $this->fillter($this->input->post("news_info")),
					"news_full"		=> $this->input->post("news_full"),
					"news_external"	=> $this->fillter($this->input->post("news_external")),
					"news_key"		=> $this->fillter($this->input->post("news_key")),
					"news_des"		=> $this->fillter($this->input->post("news_des"))
				);
				if($_FILES['news_images']['name'] != NULL){
					$config['upload_path'] = './uploads/news';
					$config['file_name'] = time() . rand(1,988);
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_size']	= '2000';
					$config['max_width']  = '1400';
					$config['max_height']  = '1400';
					$this->load->library('upload',$config);
					if(!$this->upload->do_upload("news_images")){
						$data = array('error' => $this->upload->display_errors());
						$data['act'] = "5";
						$data['title'] = "Sửa tin tức";
						$data['template'] = "articles/edit_articles";
						$id = $this->uri->segment(4);
						$data['get'] = $this->marticles->getdata($id);
						$data['list_cago'] = $this->marticles->list_cago();
						$this->load->view("layout",$data);
						return FALSE;
					}else{
						$imgs = $data['get']['news_images'];
						@unlink("uploads/news/".$imgs);
						@unlink("uploads/news/thumb/".$imgs);
						$data = $this->upload->data();
						$val['news_images'] = $data['file_name'];
						$this->createThumbnail("uploads/news",$val['news_images'],170,160);
					}
				 } 
				$this->marticles->update_news($val,$id);
				redirect(base_url()."admin/articles");
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
						"news_status" => "1"
					);
					$this->marticles->update_news($val,$id);
					die();
				}else{
					$val = array(
						"news_status" => "0"
					);
					$this->marticles->update_news($val,$id);
					die();
				}
			}
		}
		public function update_hot(){
			$id = $this->input->post('rel');
			echo $id;
			if($this->input->post("type")){
				$status = $this->input->post('val');
				if($status == 0){
					$val = array(
						"news_hot" => "1"
					);
					$this->marticles->update_news($val,$id);
					die();
				}else{
					$val = array(
						"news_hot" => "0"
					);
					$this->marticles->update_news($val,$id);
					die();
				}
			}
		}
		public function change_articles(){
			$id = $this->input->post('val');
			$config['base_url'] 	= base_url()."admin/articles/index";
			$config['total_rows'] 	= $this->marticles->count_alls($id);
			$config['per_page'] 	= "10";
			$config['uri_segment'] 	= "4";
			$config['next_link'] 	= "Next";
			$config['prev_link'] 	= "Prev";
			$config['first_link'] 	= "First";
			$config['last_link'] 	= "Last";
			$this->load->library("pagination");
			$this->pagination->initialize($config);
			$start = $this->uri->segment(4);
			$data['row'] 	= $this->marticles->count_alls($id);
			$list_news = $this->marticles->list_news_change($config['per_page'],$start,$id);
			
			$stt = 0;
			echo "<table id='tb_padding' border='1' bordercolor='#CCC' style='border-collapse:collapse;' width='100%'>
			  <tbody>
				<tr style='background-color:#EEE; font-weight:bold;'>
				  <td width='40px' style='text-align:center;'>STT</td>
				  <td width='120px'>Ảnh</td>
				  <td>Danh sách tin. Có ".$data['row']." tin tức</td>
				  <td width='60px' style='text-align:center;'>Lần xem</td>
				  <td width='150px'>Thời gian cập nhật</td>
				  <td width='100px'>Lựa chọn</td>
				  <td width='140px'>Khác</td>
				</tr>";
			if($list_news != NULL){
			foreach($list_news as $value){
			$stt++;
			?>
			<tr id="row_<?php echo $value['news_id']; ?>" onMouseOver="this.className='row-hover'" onMouseOut="this.className=''" class="">
		        <td style="text-align:center;"><?php echo $stt ?></td>
		        <td style="text-align:center;">
                <?php
					if($value['news_images'] == NULL){
						echo "<img style='max-width: 150px;' src='".base_url()."public/admin/images/no-images.jpg' alt='No images' />";
					}else{
						echo "<img style='max-width: 150px;' src='".base_url()."uploads/news/".$value['news_images']."'>";
					}
				?>
                </td>
		        <td><a href="" target="_blank"><b><?php echo $value['news_title']; ?></b></a><br />
	            	<?php echo $value['news_info']; ?>
	            <br />
		        <br />
	            </td>
		        <td style="text-align:center;"><?php echo $value['news_view']; ?></td>
		        <td> <?php echo $value['news_date']; ?> </td>
		        <td><a href="<?php echo base_url()."admin/articles/update/".$value['news_id']."" ; ?>">Sửa lại</a><br />
	            <?php
					if($value['news_status'] == 1){
						echo "<a rel='".$value['news_id']."' name='1' class='status_active' href='javascript:void(0);'>Hạ xuống</a>";
					}else{
						echo "<a style='background:#FFB800;' rel='".$value['news_id']."' name='0' class='status_active' href='javascript:void(0);'>Cho hiển thị</a>";
					}
				?>
	            <br />
		          <?php echo "<a href='javascript:del_news(".$value['news_id'].")'>Xóa bài</a>"; ?>
	             </td>
		        <td>
	            <?php
					if($value['news_hot'] == 1){
						echo "<a rel='".$value['news_id']."' name='1' class='hot_active' href='javascript:void(0);'>Chọn nổi bật</a>";
					}else{
						echo "<a style='background:#FFB800;' rel='".$value['news_id']."' name='0' class='hot_active' href='javascript:void(0);'>Hạ nổi bật</a>";
					}
				?>
	                
	            <br />
	              </td>
		      </tr>
			<?php
			}
			}else{
				echo "<tr><td colspan='7'>Không có tin tức nào.</td></tr>";
			}
			?>
            <?php
			echo "</tbody></table>";
			echo "<br />".$this->pagination->create_links();
		}
		public function del(){
			$id = $this->input->post('id');
			$imgs = $this->marticles->getdata($id);
			@unlink("uploads/news/".$imgs['news_images']);
			@unlink("uploads/news/thumb/".$imgs['news_images']);
			$this->marticles->del($id);
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