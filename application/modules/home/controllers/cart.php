<?php
	class Cart extends MY_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->helper("url");
			$this->load->helper('mail_helper');
			$this->load->library('cart');
			//$this->cart->product_name_rules =  "\.\:\-_ a-z0-9\"\'";
			$this->cart->product_name_rules = "^.";
			$this->load->helper('form');
			$this->load->model("mcart");
		}
		public function index(){
			$data['title'] = "Thông tin giỏ hàng";
			$data['online'] 		= $this->online();
			$data['access'] 	= $this->access();
			$this->write($data['access']);
			$data['pro_view'] 		= $this->mindex->list_pro_view();
			$data['listall'] 		= $this->mindex->listall();
			$data['list_support'] 	= $this->mindex->list_support();
			$get_setup 				= $this->mindex->get_setup();
			$data['pro_hot'] 		= $this->mindex->list_pro_hot($get_setup['set_pro_hot']);
			$data['cart'] = $this->cart->contents();
			//$this->Debug($data['cart']);
			$this->load->view("cart/layout",$data);
		}
		public function addcart(){
		   	$data 		=  $this->mcart->getpro($this->uri->segment(4));
			if($data == NULL || !isset($data['pro_id']) || is_numeric($data)){
				redirect(base_url());
			}
		   	$getshop 	=  $this->cart->contents();
			//$this->debug($data);
			$data['pro_qty'] = 1;
			if(isset($_POST['s_quantity']) && $_POST['s_quantity'] != NULL){
				$qty = $_POST['s_quantity'];
				$data['pro_qty'] = $qty;
			}else{
				foreach($getshop as $item){
					if($item['id'] == $data['pro_id']){
						$data['pro_qty'] = $item['qty']+1;
					}
				}
			}
			$shop = array(
               'id'	   => $data['pro_id'],
               'qty'	  => $data['pro_qty'],
               'price'   	=> $data['pro_price'],
               'name'     => url_title($data['pro_name']),
			   'rewrite'  => $data['pro_name_rewrite'],
               'serial'   => array('images' => $data['pro_images'])
            );
			$this->cart->insert($shop);
			redirect(base_url().'gio-hang.html','refresh');

	   }
	   public function updatecart(){
			for ($i = 1; $i <= $this->cart->total_items(); $i++){
	        $item = $this->input->post($i);
	        $data = array(
	                'rowid'    => $item['rowid'],
	                'qty'    => $item['qty']
				        );
	        $this->cart->update($data);
			}
			redirect(base_url().'gio-hang.html','refresh');		
		
		}
	   public function del(){
		  	$getshop = $this->cart->contents();
			$id = $this->uri->segment(4);
			foreach($getshop as $item){
				if($item['id'] == $id){
					$data['rowid']=$item['rowid'];
					$data['qty'] = 0;
			        $this->cart->update($data);
					break;
				}
			}
			redirect(base_url().'gio-hang.html','refresh');	
	   }
	   public function emptycart(){
		   $this->cart->destroy();
			redirect(base_url().'gio-hang.html','refresh');	
	   }
	   public function ajax(){
		   $this->load->helper("date");
		   if(isset($_POST['type'])){
			date_default_timezone_set('Asia/Ho_Chi_Minh');
			$name	= $this->fillter($this->input->post("cart_name"));
			$email	= $this->fillter($this->input->post("cart_email"));
			$phone	= $this->fillter($this->input->post("cart_tel"));
			$address = $this->fillter($this->input->post("cart_address"));
			$pay_method = $this->fillter($this->input->post("cart_pay"));
			$ship_method = $this->fillter($this->input->post("cart_ship"));
			//$message = $_POST['cart_message'];
			$cart_total	= $this->fillter($this->input->post("cart_total"));
			$rule = "/^[a-zA-Z]{1}[a-zA-Z0-9.]{2,20}\@[a-zA-Z0-9]{2,}\.[a-zA-Z]{2,5}$/";
			$rule1 = "/^[0]{1}[0-9]{9,10}$/";
			if($name == "" || $email == "" || $phone == "" || $address == ""){
				echo "1";
				die();
			}else{
				if(preg_match($rule1,$phone)){
					if(preg_match($rule,$email)){
						$data = array(
						"name"	=> $name,
						"email" => $email,
						"phone" => $phone,
						"local" => $address,
						"pay_method" => $pay_method,
						"ship_method" => $ship_method,
						"serial" => json_encode($this->cart->contents()),
						"price" => $cart_total,
						"date"	=> date("H:i:s - d/m/Y"),
						"date_count"	=> date("d-m-Y")
					  	);
					if(isset($_SESSION['userid'])){
						$data['user_id'] = $_SESSION['userid'];
					}
					$cart = $this->cart->contents();
					foreach($cart as $val){
						$this->mcart->update_pro($val['id']);
					}
					$this->sendmail($data);
					$this->sendmails($data,$email);
					$this->mcart->add($data);
					$this->emptycart();
					}else{
						echo 2;
					}
				}else{
					echo 3;
				}
			}
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
                    <h2 style="font-size: 16px;">Đơn hàng từ '.$_SERVER['HTTP_HOST'].'</h2>
                    <h3>Thông tin khách hàng</h3>

            ';
			$mesnger .= "<table><tr><td>Tên khách hàng</td><td>".$data['name']."</td></tr><tr><td>Địa chỉ email</td><td>".$data['email']."</td></tr><tr><td>Điện thoại liên hệ</td><td>".$data['phone']."</td></tr><tr><td>Địa chỉ</td><td>".$data['local']."</td></tr></table>";
			$mesnger .= '<h3>Nội dung đặt hàng</h3>
						<style type="text/css">#bachnx_cart tr td{padding:5px;}</style>
						<table id="bachnx_cart" style="border-collapse: collapse;width: 100%;" border="1" bordercolor="#CCCCCC">
						  <tr style="background-color:#FC0; font-weight:bold">
						    <td style="padding:5px;">STT</td>
						    <td style="padding:5px;">Sản phẩm</td>
						    <td style="padding:5px;">Đơn giá</td>
						    <td style="padding:5px;">Số lượng</td>
						    <td style="padding:5px;">Tổng tiền</td>
						  </tr>
			';
			$unserial = $data['serial'];
		  	$serial = json_decode($unserial,true);
		    $stt = 0;
			foreach($serial as $value){
			$stt++;
			$mesnger .= '<tr>
						    <td style="padding:5px;">'.$stt.'</td>
						    <td style="padding:5px;"><a href="'.base_url().''.$value['rewrite'].'/p'.$value['id'].'.html"><b>'.$value['name'].'</b></a></td>
						    <td style="padding:5px;">'.@number_format($value['price']).' <u>đ</u></td>
						    <td style="padding:5px;">'.$value['qty'].'</td>
						    <td style="padding:5px;">'.@number_format($value['subtotal']).' <u>đ</u></td>
						  </tr>
			';
			}
			$mesnger .= '<tr class="txt_16">
						    <td class="txt0" colspan=4 align="right" style="padding:5px;"> Tổng tiền </td>
						    <td class="txt_right" style="padding:5px;"> '.@number_format($data['price']).' <u>đ</u></td>
						  </tr>
						</table>
			';
			$mesnger .= '</body></html> ';
			
			send_mail_helper(''.$config['config_email'].'', 'Thư đặt hàng từ '.$_SERVER['HTTP_HOST'].'', htmlspecialchars_decode($mesnger));
	   }
	   
	   public function sendmails($data,$mail){
		   $mesnger = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                    <html>
                    <head>
                    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                    </head>
                    <body>
                    <h2 style="font-size: 16px;">Đơn hàng từ '.$_SERVER['HTTP_HOST'].'</h2>
                    <h3>Thông tin khách hàng</h3>

            ';
			$mesnger .= "<table><tr><td>Tên khách hàng</td><td>".$data['name']."</td></tr><tr><td>Địa chỉ email</td><td>".$data['email']."</td></tr><tr><td>Điện thoại liên hệ</td><td>".$data['phone']."</td></tr><tr><td>Địa chỉ</td><td>".$data['local']."</td></tr></table>";
			$mesnger .= '<h3>Nội dung đặt hàng</h3>
						<style type="text/css">#bachnx_cart tr td{padding:5px;}</style>
						<table id="bachnx_cart" style="border-collapse: collapse;width: 100%;" border="1" bordercolor="#CCCCCC">
						  <tr style="background-color:#FC0; font-weight:bold">
						    <td style="padding:5px;">STT</td>
						    <td style="padding:5px;">Sản phẩm</td>
						    <td style="padding:5px;">Đơn giá</td>
						    <td style="padding:5px;">Số lượng</td>
						    <td style="padding:5px;">Tổng tiền</td>
						  </tr>
			';
			$unserial = $data['serial'];
		  	$serial = json_decode($unserial,true);
		    $stt = 0;
			foreach($serial as $value){
			$stt++;
			$mesnger .= '<tr>
						    <td style="padding:5px;">'.$stt.'</td>
						    <td style="padding:5px;"><a href="'.base_url().''.$value['rewrite'].'/p'.$value['id'].'.html"><b>'.$value['name'].'</b></a></td>
						    <td style="padding:5px;">'.@number_format($value['price']).' <u>đ</u></td>
						    <td style="padding:5px;">'.$value['qty'].'</td>
						    <td style="padding:5px;">'.@number_format($value['subtotal']).' <u>đ</u></td>
						  </tr>
			';
			}
			$mesnger .= '<tr class="txt_16">
						    <td class="txt0" colspan=4 align="right" style="padding:5px;"> Tổng tiền </td>
						    <td class="txt_right" style="padding:5px;"> '.@number_format($data['price']).' <u>đ</u></td>
						  </tr>
						</table>
			';
			$mesnger .= '</body></html> ';
			
			send_mail_helper(''.$mail.'', 'Đơn hàng của bạn', htmlspecialchars_decode($mesnger));
	   }
	}
?>