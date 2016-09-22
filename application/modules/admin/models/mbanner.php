<?php
	class Mbanner extends CI_Model{
		protected $_slide = "tbl_banner";
		protected $_location = "tbl_banner_location";
		public function __construct(){
			parent::__construct();
			$this->load->database();
		}
		public function list_slide($id = '',$off,$start){
			$this->db->order_by("slide_id","DESC");
			if($id != ''){
				$this->db->where("slide_type",$id);
			}
			$this->db->limit($off,$start);
			return $this->db->get($this->_slide)->result_array();
		}
		public function count_all(){
			return $this->db->count_all($this->_slide);
		}
		public function add($value){
			$this->db->insert($this->_slide,$value);
		}
		public function del($id){
			$this->db->where("slide_id",$id);
			$this->db->delete($this->_slide);
		}
		public function update_slide($data,$id){
			$this->db->where("slide_id",$id);
			$this->db->update($this->_slide,$data);
		}
		public function getdata($id){
			$this->db->where("slide_id",$id);
			return $this->db->get($this->_slide)->row_array();
		}
		
		//Banner Location
		public function list_location(){
			$this->db->order_by("location_id","DESC");
			return $this->db->get($this->_location)->result_array();
		}
		public function add_location($value){
			$this->db->insert($this->_location,$value);
		}
		public function del_location($id){
			$this->db->where("location_id",$id);
			$this->db->delete($this->_location);
		}
		public function update_location($data,$id){
			$this->db->where("location_id",$id);
			$this->db->update($this->_location,$data);
		}
	}