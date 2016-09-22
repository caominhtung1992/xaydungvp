<?php 
  	class MY_Controller extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->library("session");
			$this->load->helper('file');
			$this->load->library("string");
			$this->load->library('cart');
			$this->load->model("mindex");
			$this->load->model("monline");
			$this->load->model("mcolumn_right");
			//lấy ra url từ website khác dến website mh
			if(isset($_SERVER['HTTP_REFERER'])) {
				$domain2 = $_SERVER['HTTP_REFERER'];
				$col = explode("/",$domain2);
				$rule = "/".$_SERVER['SERVER_NAME']."/";
				if(!preg_match($rule,$domain2)){
					$domain = $this->mindex->check_referer($col['2']);
					if($domain == FALSE){
						$this->mindex->update_referer($col['2']);
					}else{
						$db = array(
							"re_domain" 	=> $col['2'],
						);
						$this->mindex->add_referer($db);
					}
				}
			}
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
		public function cut_str($str,$start,$end){
			$val = substr($str,$start,$end);
			return $val;
		}
		public function debug($val){
			echo "<pre>";
			print_r($val);
			echo "</pre>";
			die();
		}
		public function access(){
			return read_file('libraries/source.txt');
		}
		public function write($data){
			$ok = $data + 1;
			write_file('libraries/source.txt',$ok);
		}
		public function online(){
			$tg = time();
		  	$tgout = 900;
		  	$tgnew = $tg - $tgout;
		  	$REMOTE_ADDR = $_SERVER["REMOTE_ADDR"];
		  	$PHP_SELF = $_SERVER["PHP_SELF"];
			$data = array(
					"time" => $tg,
					"user_ip" => $REMOTE_ADDR,
					"local" => $PHP_SELF,
					//"date" => date('d')
				);
		  	$this->monline->online($data);
		  	$this->monline->online_del($tgnew);
		  	return $this->monline->online_total($PHP_SELF);
		}
		public function online_view(){
			return $this->monline->online_view();
		}
	}