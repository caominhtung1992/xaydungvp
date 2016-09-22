<?php
  class Msupport extends CI_Model{
	protected $_table = "tbl_support";
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	public function list_sup($off,$start){
		$this->db->order_by("sup_id","DESC");
		$this->db->limit($off,$start);
		return $this->db->get($this->_table)->result_array();
	}
	public function count_all(){
		return $this->db->count_all($this->_table);
	}
	public function add($value){
		$this->db->insert($this->_table,$value);
	}
	public function del_sup($id){
		$this->db->where("sup_id",$id);
		$this->db->delete($this->_table);
	}
	public function update_sup($data,$id){
		$this->db->where("sup_id",$id);
		$this->db->update($this->_table,$data);
	}
	public function getdata($id){
		$this->db->where("sup_id",$id);
		return $this->db->get($this->_table)->row_array();
	}
  }