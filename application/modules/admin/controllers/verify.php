<?php
  	class Verify extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->helper("url");
			$this->load->model("muser");
			$this->load->library("session");
		}
		public function index(){
			if($this->input->post("ok")){
				$user = $this->fillter($this->input->post("username"));
				$pass = $this->fillter($this->input->post("password"));
				$check = $this->muser->check_login($user,$pass);
				if($check == FALSE){
					$data['error'] = "Tài khoản không hợp lệ !";
					$this->load->view("login_view",$data);
				}else{
					$session = array(
										"ses_user" => $check['user_name'],
										"ses_level" => $check['user_level'],
										"ses_userid" => $check['user_id'],
										"ses_status" => $check['user_status']
									);
					$db 	 = array(
										"user_lastlogin" => date("H:i:s - d/m/Y"),
										"user_ip" 		 => getenv("REMOTE_ADDR")
									);
					$this->session->set_userdata($session);
					$this->muser->update_user($db,$check['user_id']);
					redirect(base_url()."admin/index");
				}
			}else{
				$data['error'] = "";
				$this->load->view("login_view",$data);
			}
		}
		public function logout(){
			$this->session->sess_destroy();
			redirect(base_url()."admin/verify");
		}
		public function fillter($str){
			$str = str_replace("<", "&lt;", $str);
			$str = str_replace(">", "&gt;", $str);
			$str = str_replace("&", "&amp;", $str);			
			$str = str_replace("|", "&brvbar;", $str);
			$str = str_replace("~", "&tilde;", $str);
			$str = str_replace("`", "&lsquo;", $str);
			$str = str_replace("#", "&curren;", $str);
			$str = str_replace("%", "&permil;", $str);
			$str = str_replace("'", "&rsquo;", $str);
			$str = str_replace("\"", "&quot;", $str);
			$str = str_replace("\\", "&frasl;", $str);
			$str = str_replace("--", "&ndash;&ndash;", $str);
			$str = str_replace("ar(", "ar&Ccedil;", $str);
			$str = str_replace("Ar(", "Ar&Ccedil;", $str);
			$str = str_replace("aR(", "aR&Ccedil;", $str);
			$str = str_replace("AR(", "AR&Ccedil;", $str);
			return htmlspecialchars($str);
		}
		public function debug($val){
			echo "<pre>";
			print_r($val);
			echo "</pre>";
			die();
		}
	}