<?php
  class Mcustomer_newsletter extends CI_Model{
	  protected $_newsletter = "tbl_newsletter";
	  public function __construct(){
		  parent::__construct();
		  $this->load->database();
	  }
	  public function list_newsletter($off,$start){
		  $this->db->order_by("letter_id","DESC");
		  $this->db->limit($off,$start);
		  return $this->db->get($this->_newsletter)->result_array();
	  }
	  public function count_all(){
		  return $this->db->count_all($this->_newsletter);
	  }
	  public function update($data,$id){
			$this->db->where("letter_id",$id);
			$this->db->update($this->_newsletter,$data);
		}
	  public function check_email($email,$id=""){
			if($id != ""){
				$this->db->where("letter_id !=",$id);
			}
			$this->db->where("letter_email",$email);
			$query=$this->db->get($this->_newsletter);
			if($query->num_rows() == 0){
				return TRUE;
			}else{
				return FALSE;
			}
	  }
	  public function del_newsletter($id){
		  $this->db->where("letter_id",$id);
		  $this->db->delete($this->_newsletter);
	  }
  }