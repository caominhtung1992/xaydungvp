<?php
  	class Mcart extends CI_Model{
		protected $_pro 	= "tbl_products";
		protected $_cart 	= "tbl_order";
		public function __construct(){
			parent::__construct();
			$this->load->database();
		}
		public function getpro($id){
			$this->db->where("pro_id",$id);
			return $this->db->get($this->_pro)->row_array();
		}
		public function add($value){
			$this->db->insert($this->_cart,$value);
		}
		public function update_pro($id){
			$this->db->where("pro_id",$id);
			$this->db->set('pro_buy','pro_buy+1',FALSE);
			$this->db->update($this->_pro);
		}
	}