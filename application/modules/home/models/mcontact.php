<?php
	class Mcontact extends CI_Model{
		protected $_table = "tbl_contact";
		protected $_config = "tbl_config";
		public function __construct(){
			parent::__construct();
			$this->load->database();
		}
		public function insert_contact($data){
			$this->db->insert($this->_table,$data);
		}
		public function getdata(){
			$this->db->where("config_id","1");
			return $this->db->get($this->_config)->row_array();
		}
	}