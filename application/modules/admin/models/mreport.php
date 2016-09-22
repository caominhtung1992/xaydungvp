<?php
	class Mreport extends CI_Model{
		protected $_customer = "tbl_customer";
		protected $_order 	 = "tbl_order";
		protected $_product	 = "tbl_products";
		protected $_referer	 = "tbl_referer";
		protected $_search	 = "tbl_count_search";
		public function __construct(){
			parent::__construct();
			$this->load->database();
		}
		public function list_cus($off,$start){
			if($start != NULL){
				$sql = "Select cus_day,count(cus_day) as soluong from $this->_customer group by cus_day limit $start,$off";
			}else{
				$sql = "Select cus_day,count(cus_day) as soluong from $this->_customer group by cus_day limit 0,$off";
			}
			$query = $this->db->query($sql);
			return $query->result_array();
		}
		public function count_all(){
			$query = $this->db->query("Select cus_day,count(cus_day) as soluong from $this->_customer group by cus_day");
			return $query->num_rows();
		}
		public function list_order($off,$start){
			if($start != NULL){
				$sql = "Select date_count,count(date_count) as soluong from $this->_order group by date_count limit $start,$off";
			}else{
				$sql = "Select date_count,count(date_count) as soluong from $this->_order group by date_count limit 0,$off";
			}
			$query = $this->db->query($sql);
			return $query->result_array();
		}
		public function count_all_order(){
			$query = $this->db->query("Select date_count,count(date_count) as soluong from $this->_order group by date_count");
			return $query->num_rows();
		}
		public function list_pro_buy($off,$start){
			$this->db->where("pro_buy !=",0);
			$this->db->order_by("pro_buy","DESC");
			$this->db->limit($off,$start);
			return $this->db->get($this->_product)->result_array();
		}
		public function count_all_pro_buy(){
			$this->db->where("pro_buy !=",0);
			return $this->db->count_all_results($this->_product);
		}
		public function list_pro_view($off,$start){
			$this->db->where("pro_view !=",0);
			$this->db->order_by("pro_view","DESC");
			$this->db->limit($off,$start);
			return $this->db->get($this->_product)->result_array();
		}
		public function count_all_pro_view(){
			$this->db->where("pro_view !=",0);
			return $this->db->count_all_results($this->_product);
		}
		public function list_referer($off,$start){
			$this->db->order_by("re_count","DESC");
			$this->db->limit($off,$start);
			return $this->db->get($this->_referer)->result_array();
		}
		public function count_all_referer(){
			return $this->db->count_all($this->_referer);
		}
		public function list_search($off,$start){
			$this->db->order_by("count_total","DESC");
			$this->db->limit($off,$start);
			return $this->db->get($this->_search)->result_array();
		}
		public function count_all_search(){
			return $this->db->count_all($this->_search);
		}
	}