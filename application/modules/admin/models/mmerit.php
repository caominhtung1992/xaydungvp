<?php
	class Mmerit extends CI_Model{
		protected $_merit= "tbl_merit";
		public function __construct(){
			parent::__construct();
			$this->load->database();
		}
		public function list_merit($off,$start){
			$this->db->order_by("merit_id","DESC");
			$this->db->limit($off,$start);
			return $this->db->get($this->_merit)->result_array();
		}
		public function count_all(){
			return $this->db->count_all_results($this->_merit);
		}
	}