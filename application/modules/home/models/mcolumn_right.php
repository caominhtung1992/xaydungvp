<?php
	class Mcolumn_right extends CI_Model{
		protected $_product = "tbl_products";
		protected $_news 	= "tbl_news";
		public function __construct(){
			parent::__construct();
			$this->load->database();
		}
		public function list_product(){
			$this->db->where("pro_status",1);
			$this->db->where("pro_bestsale","1");
			$this->db->limit(4);
			return $this->db->get($this->_product)->result_array();
		}
		public function list_news(){
			$this->db->where("news_status",1);
			$this->db->order_by("news_id","DESC");
			$this->db->limit(6);
			return $this->db->get($this->_news)->result_array();
		}
	}