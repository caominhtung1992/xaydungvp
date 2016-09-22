<?php
  class Mcustomer_contact extends CI_Model{
	  protected $_contact = "tbl_contact";
	  public function __construct(){
		  parent::__construct();
		  $this->load->database();
	  }
	  public function list_contact($off,$start){
		  $this->db->order_by("con_id","DESC");
		  $this->db->limit($off,$start);
		  return $this->db->get($this->_contact)->result_array();
	  }
	  public function count_all(){
		  return $this->db->count_all($this->_contact);
	  }
	  public function detail_contact($id){
		  $this->db->where("con_id",$id);
		  return $this->db->get($this->_contact)->row_array();
	  }
	  public function update_status($data,$id){
		  $this->db->where("con_id",$id);
		  $this->db->update($this->_contact,$data);
	  }
	  public function del_contact($id){
		  $this->db->where("con_id",$id);
		  $this->db->delete($this->_contact);
	  }
  }