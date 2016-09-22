<?php
	class Customer_contact extends MY_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->helper("url");
			$this->load->helper('mail_helper');
			$this->load->model("mcontact");
		}
		public function index(){
			$data['title'] = "Liên hệ";
			$data['online'] 		= $this->online();
			$data['access'] 	= $this->access();
			$this->write($data['access']);
			$data['pro_view'] 		= $this->mindex->list_pro_view();
			$data['listall'] 		= $this->mindex->listall();
			$data['list_support'] 	= $this->mindex->list_support();
			$get_setup 				= $this->mindex->get_setup();
			$data['pro_hot'] 		= $this->mindex->list_pro_hot($get_setup['set_pro_hot']);
			//$data['contact'] 	= $this->mcontact->contact();
			$this->load->view("customer_contact/layout",$data);
		}
		public function ajax(){
		   $name  = $this->fillter($this->input->post("name"));
		   $email = $this->fillter($this->input->post("email"));
		   $phone = $this->fillter($this->input->post("phone"));
		   $info  =  $this->fillter($this->input->post("noi"));
		   $ok1   = $ok2 = "";
		   if($name != NULL && $email != NULL && $info != NULL && $phone != NULL){
				$null = "/^[a-zA-Z]{1}[a-zA-Z0-9._]{3,25}\@[a-zA-Z0-9]{3,}\.[a-zA-Z.]{2,8}$/";
				$pho =  "/^[0]{1}[0-9]{8,10}$/";
				if(preg_match($null,$email)){
					$ok1 = TRUE;
				}else{
					echo "Email không hợp lệ <br />";
				}
				if(preg_match($pho,$phone)){
					$ok2 = TRUE;
				}else{
					echo "Số điện thoại không hợp lệ<br />";
				}
				if($ok1 == TRUE && $ok2 == TRUE){
					$data = array(
							"con_name" => $name,
							"con_email" => $email,
							"con_phone" => $phone,
							"con_full" => $info,
							"con_date" => date("H:i:s - d/m/Y")
						);
					$this->sendmail($data);
					//$this->debug($data['config']);
					$this->mcontact->insert_contact($data);
					echo "<span style='color:#639537;font-weight:bold;'><img class='check_suscess' src='public/images/check_suscess.png' /> Ý kiến của bạn đã được gửi,chúng tôi liên hệ với bạn trong thời gian gần nhất .</span>";
				}
			}else{
				echo 1;
			}
	   }
	   public function sendmail($data){
		   $config = $this->mindex->getdata();
		   $mesnger = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                    <html>
                    <head>
                    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                    </head>
                    <body>
                    <h2 style="font-size: 16px;">Liên hệ từ '.$_SERVER['HTTP_HOST'].'</h2>
                    <br/><br/>
                    <p>THÔNG TIN LIÊN HỆ</p>

            ';
			$mesnger .= "Họ tên : ".$data['con_name']." <br />Email : ".$data['con_email']." <br />Phone : ".$data['con_phone']." <br />Nội dung : ".$data['con_full']."";
			$mesnger .= '</body></html> ';
			send_mail_helper(''.$config['config_email'].'', 'Liên hệ từ '.$_SERVER['HTTP_HOST'].'', htmlspecialchars_decode($mesnger));
	   }
	}