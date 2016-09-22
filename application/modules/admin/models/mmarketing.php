<?php
	class Mmarketing extends CI_Model{
		protected $_popup = "tbl_popup";
		public function __construct(){
			parent::__construct();
			$this->load->database();
		}
		public function getpop(){
			$this->db->where("pop_id","1");
			return $this->db->get($this->_popup)->row_array();
		}
		public function update_popup($data,$id){
			$this->db->where("pop_id",$id);
			$this->db->update($this->_popup,$data);
		}
	}