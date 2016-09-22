<?php
	class Mpage extends CI_Model{
		protected $_page = "tbl_page";
		public function __construct(){
			parent::__construct();
			$this->load->database();
		}
		public function list_page($off,$start){
			$this->db->order_by("page_id","DESC");
			$this->db->limit($off,$start);
			return $this->db->get($this->_page)->result_array();
		}
		public function count_all(){
			return $this->db->count_all($this->_page);
		}
		public function add($value){
			$this->db->insert($this->_page,$value);
		}
		public function del($id){
			$this->db->where("page_id",$id);
			$this->db->delete($this->_page);
		}
		public function update_page($data,$id){
			$this->db->where("page_id",$id);
			$this->db->update($this->_page,$data);
		}
		public function getdata($id){
			$this->db->where("page_id",$id);
			return $this->db->get($this->_page)->row_array();
		}
	}