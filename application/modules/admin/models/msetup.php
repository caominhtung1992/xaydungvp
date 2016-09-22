<?php
	class Msetup extends CI_Model{
		protected $_table = "tbl_setup";
		public function __construct(){
			parent::__construct();
			$this->load->database();
		}
		public function getdata(){
			$this->db->where("set_id","1");
			return $this->db->get($this->_table)->row_array();
		}
		public function update_setup($data,$id){
			$this->db->where("set_id",$id);
			$this->db->update($this->_table,$data);
		}
	}