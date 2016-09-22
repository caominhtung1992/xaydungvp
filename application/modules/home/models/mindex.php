<?php
	class Mindex extends CI_Model{
		protected $_table 			= "tbl_config";
		protected $_category 		= "tbl_category";
		protected $_subcategory 	= "tbl_subcategory";
		protected $_news 			= "tbl_news";
		protected $_support 		= "tbl_support";
		protected $_setup 			= "tbl_setup";
		protected $_product 		= "tbl_products";
		protected $_popup 			= "tbl_popup";
		protected $_referer			= "tbl_referer";
		protected $_slide			= "tbl_banner";
		protected $_videos			= "tbl_videos";
		protected $_commit			= "tbl_commit";
		public function __construct(){
			parent::__construct();
			$this->load->database();
		}
		
		public function get_setup(){
			$this->db->where("set_id","1");
			return $this->db->get($this->_setup)->row_array();
		}
		public function getdata(){
			$this->db->where("config_id","1");
			return $this->db->get($this->_table)->row_array();
		}
		public function get_popup(){
			$this->db->where("pop_id","1");
			return $this->db->get($this->_popup)->row_array();
		}
		public function list_pro_saleoff($off){
			$this->db->where("pro_status","1");
			$this->db->where("pro_saleoff","1");
			$this->db->order_by("pro_saleoff_check","DESC");
			$this->db->limit($off);
			return $this->db->get($this->_product)->result_array();
		}
		public function list_pro_new($off){
			$this->db->where("pro_status","1");
			$this->db->where("pro_new","1");
			$this->db->order_by("pro_new_check","DESC");
			$this->db->limit(20);
			return $this->db->get($this->_product)->result_array();
		}
		public function list_pro_cutting(){
			$this->db->where("cate_id","466");
			$this->db->limit(6);
			return $this->db->get($this->_product)->result_array();
		}
		public function list_pro_hate(){
			$this->db->where("cate_id","470");
			$this->db->order_by("pro_id","DESC");
			$this->db->limit(6);
			return $this->db->get($this->_product)->result_array();
		}
		public function list_pro_curling(){
			$this->db->where("cate_id","564");
			$this->db->order_by("pro_id","DESC");
			$this->db->limit(6);
			return $this->db->get($this->_product)->result_array();
		}
		public function list_pro_pkhan(){
			$this->db->where("cate_id","468");
			$this->db->order_by("pro_id","DESC");
			$this->db->limit(6);
			return $this->db->get($this->_product)->result_array();
		}
		public function list_pro_bestsale($off){
			$this->db->where("pro_status","1");
			$this->db->where("pro_bestsale","1");
			$this->db->order_by("pro_bestsale_check","DESC");
			$this->db->limit($off);
			return $this->db->get($this->_product)->result_array();
		}
		public function list_pro_hot(){
			$this->db->where("pro_status","1");
			$this->db->where("pro_hot","1");
			$this->db->order_by("pro_hot_check","DESC");
			$this->db->limit(8);
			return $this->db->get($this->_product)->result_array();
		}
		public function list_pro_view(){
			$this->db->where("pro_status","1");
			$this->db->order_by("pro_view","DESC");
			$this->db->limit(4);
			return $this->db->get($this->_product)->result_array();
		}
		public function list_news(){
			$this->db->order_by("news_id","DESC");
			$this->db->limit(6);
			return $this->db->get($this->_news)->result_array();
		}
		public function list_support(){
			$this->db->where("sup_status",1);
			$this->db->order_by("sup_id","DESC");
			return $this->db->get($this->_support)->result_array();
		}
		public function list_cate(){
			$this->db->where("cate_status",1);
			$this->db->where("cate_parent",1);
			$this->db->order_by("cate_order","DESC");
			return $this->db->get($this->_category)->result_array();
		}
		public function list_sub($cate_id){
			$this->db->where("cate_id_parent",$cate_id);
			$this->db->where("cate_parent",2);
			$this->db->order_by("cate_order","DESC");
			return $this->db->get($this->_category)->result_array();
		}
		public function listall(){
			$list = $this->list_cate();
			$data = array();
			if($list != NULL){
				foreach($list as $k => $v){
					$data[] = $this->list_sub($v['cate_id']);
				}
			}
			$ok = array(
				"cate" => $list,
				"sub" => $data
			);
			return $ok;
		}
		public function listall_cate($cate_id,$cate_id_parent){
			$this->db->where("cate_id_parent",$cate_id_parent);
			//$this->db->where("cate_id !=",$cate_id);
			//$this->db->where("cate_parent",2);
			$this->db->order_by("cate_order","DESC");
			return $this->db->get($this->_category)->result_array();
		}
		public function add_referer($data){
			$this->db->insert($this->_referer,$data);
		}
		public function check_referer($domain,$id=""){
			if($id != ""){
				$this->db->where("re_id !=",$id);
			}
			$this->db->where("re_domain",$domain);
			$query=$this->db->get($this->_referer);
			if($query->num_rows() == 0){
				return TRUE;
			}else{
				return FALSE;
			}
		}
		public function update_referer($domain){
			$this->db->where("re_domain",$domain);
			$this->db->set('re_count','re_count+1',FALSE);
			$this->db->update($this->_referer);
		}
		//Get list slideshow
		public function get_listslide($id){
			$this->db->where("slide_type",$id);
			$this->db->where("slide_status",1);
			$this->db->order_by("slide_order","DESC");
			$this->db->limit(5);
			return $this->db->get($this->_slide)->result_array();
		}
		//Get list slideshow
		public function get_videos(){
			$this->db->order_by("video_id	","DESC");
			$this->db->limit(1);
			return $this->db->get($this->_videos)->result_array();
		}
		//Get list commit
		public function get_commit(){
			$this->db->order_by("commit_id	","ASC");
			$this->db->limit(6);
			return $this->db->get($this->_commit)->result_array();
		}
	}