<?php
	class Morder extends CI_Model{
		protected $_table = "tbl_order";
		public function __construct(){
			parent::__construct();
			$this->load->database();
		}
		public function getdata($id){
			$this->db->where("id",$id);
			return $this->db->get($this->_table)->row_array();
		}
		public function count_all(){
			return $this->db->count_all($this->_table);
		}
		public function list_order($off,$start){
			$this->db->order_by("id","DESC");
			$this->db->limit($off,$start);
			return $this->db->get($this->_table)->result_array();
		}
		public function del_order($id){
			$this->db->where("id",$id);
			$this->db->delete($this->_table);
		}
		public function update_order($data,$id){
			$this->db->where("id",$id);
			$this->db->update($this->_table,$data);
		}
	}