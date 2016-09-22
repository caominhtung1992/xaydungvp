<?php
   class Users extends MY_Controller{
	   public function __construct(){
		   parent::__construct();
		   $this->load->helper("url");
		   $this->load->model("muser");
		   $this->load->library("form_validation");
	   }
	   public function index(){	   
		   	$data['title'] 		= "Đăng ký tài khoản";
			$data['online'] 	= $this->online();
			$data['access'] 	= $this->access();
			$this->write($data['access']);
			$data['pro_view'] 		= $this->mindex->list_pro_view();
			$data['listall'] 	= $this->mindex->listall();
			$get_setup 			= $this->mindex->get_setup();
			$data['pro_hot'] 	= $this->mindex->list_pro_hot($get_setup['set_pro_hot']);
			$data['template'] = "user/register";
			$this->load->view("user/layout",$data);
	   }
	   public function login(){
		   	$data['title'] 		= "Đăng nhập";
			$data['online'] 	= $this->online();
			$data['access'] 	= $this->access();
			$this->write($data['access']);
			$data['pro_view'] 		= $this->mindex->list_pro_view();
			$data['listall'] 	= $this->mindex->listall();
			$get_setup 			= $this->mindex->get_setup();
			$data['pro_hot'] 	= $this->mindex->list_pro_hot($get_setup['set_pro_hot']);
			$data['template'] = "user/login";
			$this->load->view("user/layout",$data);
	   }
	   public function logout(){
		   session_destroy();
		   redirect(base_url());
	   }
	   public function verify(){
		   if($_POST == NULL){die();}
		   $name = $this->fillter($_POST['name']);
		   $pass = $this->fillter(md5($_POST['pass']));
		   $checklog = $this->muser->login($name,$pass);
		   if($checklog == FALSE){
			   echo "Tài khoản đăng nhập sai";
		   }else{
			   $_SESSION['userid'] = $checklog['cus_id'];
			   $_SESSION['username'] = $checklog['cus_name'];
			   $_SESSION['userlevel'] = $checklog['cus_level'];
			   $_SESSION['userlevel'] = $checklog['cus_level'];
			   $_SESSION['userlevel'] = $checklog['cus_level'];
			   $db 	 = array(
					"cus_lastlogin" => date("H:i:s - d/m/Y"),
					"cus_ip" 		 => getenv("REMOTE_ADDR")
				);
				$this->muser->update($db,$checklog['cus_id']);
			   echo "bachnx";
		   }
	   }
	   public function ajax(){
		   if($_POST == NULL){die();}
		   $code = $_SESSION['security_code'];
		   $name = $this->fillter($_POST['name']);
		   $pass = $this->fillter($_POST['pass']);
		   $fullname = $this->fillter($_POST['fullname']);
		   $email = $this->fillter($_POST['email']);
		   $phone = $this->fillter($_POST['phone']);
		   $gender = $this->fillter($_POST['gender']);
		   $captcha = $this->fillter($_POST['captcha']);
		   $data = array("cus_name"=>$name,"cus_password"=>md5($pass),"cus_fullname"=>$fullname,"cus_gender"=>$gender,"cus_phone"=>$phone,"cus_email"=>$email,"cus_level"=>"2","cus_status"=>"1","cus_date" 	=> date("H:i:s - d/m/Y"),"cus_day" 	=> date("d-m-Y"));
		   if($code != $captcha){
			   echo "Mã captcha chưa đúng";
		   }else{
			   $rulem = "/^[a-zA-Z]{1}[a-zA-Z0-9._]{3,25}\@[a-zA-Z0-9]{3,}\.[a-zA-Z.]{2,8}$/";
			   $rulep =  "/^[0]{1}[0-9]{8,12}$/";
			   if(!preg_match($rulem,$email)){
				   echo  "Email không hợp lệ"; die();
			   }else{
				   $checkname = $this->muser->getdata(array("cus_name"=>$name));
				   $checkemail = $this->muser->getdata(array("cus_email"=>$email));
				   if($checkname > 0){
					   echo "Tên đăng nhập đã tồn tại";
				   }elseif($checkemail > 0){
					   echo "Email này đã tồn tại";
				   }else{
					   $this->muser->add($data);
					   echo "bachnx";
				   }
			   }
		   }
	   }
	   public function manage(){
		   	$data['title'] 		= "Quản lý tài khoản";
			$id = $_SESSION['userid'];
			$data['online'] 	= $this->online();
			$data['access'] 	= $this->access();
			$this->write($data['access']);
			$data['pro_view'] 		= $this->mindex->list_pro_view();
			$data['listall'] 	= $this->mindex->listall();
			$get_setup 			= $this->mindex->get_setup();
			$data['pro_hot'] 	= $this->mindex->list_pro_hot($get_setup['set_pro_hot']);
			$data['info']		= $this->muser->getuser($id);
			//$this->debug($data['info']);
			$data['template'] = "user/user_info";
			$this->load->view("user/layout",$data);
	   }
	   public function order(){
		   	$data['title'] 		= "Danh sách đơn hàng";
			$id = $_SESSION['userid'];
			$data['online'] 	= $this->online();
			$data['access'] 	= $this->access();
			$this->write($data['access']);
			$data['pro_view'] 		= $this->mindex->list_pro_view();
			$data['listall'] 	= $this->mindex->listall();
			$get_setup 			= $this->mindex->get_setup();
			$data['pro_hot'] 	= $this->mindex->list_pro_hot($get_setup['set_pro_hot']);
			$data['list'] = $this->muser->list_order($id,10,0);
			//$this->debug($data['list']);
			$data['template'] = "user/user_order";
			$this->load->view("user/layout",$data);
	   }
	   public function save(){
		   	$data['title'] 		= "Sản phẩm yêu thích";
			$id = $_SESSION['userid'];
			$data['online'] 	= $this->online();
			$data['access'] 	= $this->access();
			$this->write($data['access']);
			$data['pro_view'] 		= $this->mindex->list_pro_view();
			$data['listall'] 	= $this->mindex->listall();
			$get_setup 			= $this->mindex->get_setup();
			$data['pro_hot'] 	= $this->mindex->list_pro_hot($get_setup['set_pro_hot']);
			$data['list'] = $this->muser->user_like_content($id);
			$data['template'] = "user/user_save";
			$this->load->view("user/layout",$data);
	   }
	   public function remove_like(){
		   $pro_id = $_POST['pro_id'];
		   $this->muser->del_like_content($pro_id);
	   }
	   public function update_info(){
		   	$data['title'] 		= "Cập nhật thông tin";
			$id = $_SESSION['userid'];
			$data['info']		= $this->muser->getuser($id);
			$data['online'] 	= $this->online();
			$data['access'] 	= $this->access();
			$this->write($data['access']);
			$data['pro_view'] 		= $this->mindex->list_pro_view();
			$data['listall'] 	= $this->mindex->listall();
			$get_setup 			= $this->mindex->get_setup();
			$data['pro_hot'] 	= $this->mindex->list_pro_hot($get_setup['set_pro_hot']);
			$data['template'] = "user/user_update";
			if($this->input->post("ok")){
				$val = array(
					"cus_fullname" => $this->fillter($this->input->post("fullname")),
					"cus_address" => $this->fillter($this->input->post("address")),
					"cus_phone" => $this->fillter($this->input->post("phone")),
					"cus_gender" => $this->fillter($this->input->post("gender")),
					"cus_email" => $this->fillter($this->input->post("email"))
				);
				if($this->input->post("password") != NULL){
					if($this->input->post("password") != $this->input->post("repass")){
						$data['error'] = "Nhập lại mật khẩu không đúng !";
						$this->load->view("user/layout",$data);
						return FALSE;
					}else{
					  	$val['cus_password'] = $this->fillter(md5($this->input->post("password")));
					}
				}
				$email = $this->muser->check_email($this->fillter($this->input->post("email")),$id);
				if($email == FALSE){
					$data['error'] = "Tài khoản này đã tồn tại !";
					$this->load->view("user/layout",$data);
				}else{
					$this->muser->update($val,$id);
					$data['error'] = "Cập nhật thành công !";
					$this->load->view("user/layout",$data);
				}
			}else{
				$this->load->view("user/layout",$data);
			}	
	   }
	   public function detail(){
		   	$data['title'] 		= "Chi tiết đơn hàng";
			$id = $this->uri->segment(4);
			$data['info'] = $this->muser->get_order($id);
			//$this->debug($data['info']);
			$data['online'] 	= $this->online();
			$data['access'] 	= $this->access();
			$this->write($data['access']);
			$data['pro_view'] 		= $this->mindex->list_pro_view();
			$data['listall'] 	= $this->mindex->listall();
			$get_setup 			= $this->mindex->get_setup();
			$data['pro_hot'] 	= $this->mindex->list_pro_hot($get_setup['set_pro_hot']);
			$data['template'] = "user/user_detail";
			$this->load->view("user/layout",$data);
	   }
	   public function user_like_content(){
		   if(isset($_SESSION['userid'])){
				$pro_id = $_POST['pro_id'];
				$uid = $_SESSION['userid'];
				$data = $this->muser->check_like_content($uid,$pro_id);
				if($data == FALSE){
					echo 2;
				}else{
					$data = array(
						"fa_userid" 	=> $uid,
						"pro_id"	=> $pro_id
					);
					$this->muser->insert($data);
				}
			}else{
				echo 1;
			}
	   }
	   public function forgot(){
		   $data['title'] = "Quên mật khẩu";
		   $data['access'] = $this->access();
		   $data['online'] = $this->online();
		   if($this->input->post("ok")){
			   $this->form_validation->set_rules("email","Email","required|min_length[5]|valid_emails");
			   $this->form_validation->set_rules("captcha","Mã xác nhận","required|min_length[4]");
			   if($this->form_validation->run() == FALSE){
				  $this->load->view("user/forgot/layout",$data); 
			   }else{
				   $ses = $_SESSION['security_code'];
				   $code = $this->input->post("captcha");
				   $email = $this->input->post("email");
				   if($code != $ses){
					   $data['error'] = "Mã xác nhận không chính xác";
					   $this->load->view("user/forgot/layout",$data);
				   }else{
					   if($this->muser->check_email($email) == TRUE){
						  	$data['error'] = "Không tìm thấy email của bạn trong cơ sở dữ liệu";
					   		$this->load->view("user/forgot/layout",$data); 
					   }else{
						   	$rand = rand(0,999);
							$pass = md5($rand);
							$profile = $this->muser->get_forgot($email);
						    $message  = "Chúng tôi nhận được yêu cầu lấy lại mật khẩu của bạn từ http://vinhphucit.org/ <br />";
							$message .= "Tài khoản của bạn : ".$profile['username']. "<br />";
							$message .= "Mật khẩu mới của bạn : ".$rand;
							$mail = array(
	                            "to_receiver"   => $email,
	                            "message"       => $message,
	                        	);	
							$pa = array("password"=>"$pass");			                
							$this->muser->forgot($email,$pa);
							$this->load->library("my_email");
				            $this->my_email->config($mail);
				            $this->my_email->sendmail();
							$data['error'] = "Một tin nhắn đã gửi đến email của bạn,vui lòng check email để lấy lại mật khẩu !";
							$this->load->view("user/forgot/layout",$data);
						}
				   }
			   }
		   }else{
		   		$this->load->view("user/forgot/layout",$data);
		   }
	   }
	   public function sendmail($data){
	   }
	   public function createThumbnail($fileName,$width,$height){
			$this->load->library('image_lib');
			//$this->load->helper('thumbnail_helper');
			$config['image_library'] = 'gd2';
			$config['source_image'] = 'uploads/users/'.$fileName;
			$config['new_image'] = 'uploads/users/thumb/'.$fileName;
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