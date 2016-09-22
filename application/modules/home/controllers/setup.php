<?php
	class Setup extends MY_Controller{
		public function __construct(){
        parent::__construct();
		$this->load->helper("url");
	    }
		public function index(){
			$data[] = "";
			echo "test";
		}
		public function update_key(){
			$control = md5(md5($_SERVER['SERVER_NAME']));
			$data = file_get_contents(ROOTPATH.'application/config/config.php');
			$data = preg_replace('/\$config\[\'sess_key_to_web\'\] = ".*?"\;/',"\$config['sess_key_to_web'] = \"".$control."\";",$data);
			$fp   = fopen(ROOTPATH.'application/config/config.php','w');
			fwrite($fp,$data);
			fclose($fp);
			//redirect(base_url());
			//echo $data;
			//die();
			echo '<script>alert("Cập nhật thành công !");window.location.href = "'.base_url().'";</script>';
		}
		public function web_close(){
			$data['info']	= $info = $this->mindex->get_setup();
			$data['title']	= $data['info']['set_info'];
			//$this->debug($info);
			if($this->input->post("commit") != ""){
				$pass = $this->input->post("password");
				if($pass != $info['set_pass']){
					$data['error'] = "Mật không đúng, vui lòng nhập lại !";
					$this->load->view("setup/web_close",$data);
				}else{
					$_SESSION['ulogin'] = $info['set_pass'];
					redirect(base_url());
				}
			}else{			
				$this->load->view("setup/web_close",$data);
			}
		}
	}