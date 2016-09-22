<?php
	class Mpage extends CI_Model{
		protected $_page 	= "tbl_page";
		public function __construct(){
			parent::__construct();
			$this->load->database();
		}
		public function getdata($id){
			$this->db->where("page_id",$id);
			return $this->db->get($this->_page)->row_array();
		}
		public function update_page($id){
			$this->db->where("page_id",$id);
			$this->db->set('page_view', 'page_view+1',FALSE);
			$this->db->update($this->_page);
		}
	}