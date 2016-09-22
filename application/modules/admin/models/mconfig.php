<?php
	class Mconfig extends CI_Model{
		protected $_table = "tbl_config";
		public function __construct(){
			parent::__construct();
			$this->load->database();
		}
		public function getdata(){
			$this->db->where("config_id","1");
			return $this->db->get($this->_table)->row_array();
		}
		public function update_config($data,$id){
			$this->db->where("config_id",$id);
			$this->db->update($this->_table,$data);
		}
	}