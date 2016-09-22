<?php
class Monline extends CI_Model{
	protected $_table="tbl_online";
	public function __construct(){
		parent::__construct();
		$this->load->database();	
	}
	public function online($data){
			$this->db->insert($this->_table,$data);;
	}
	public function online_del($tgnew){
		$this->db->where("time < ",$tgnew);
		$this->db->delete($this->_table);
	}
	public function online_total(){
		$query = $this->db->query("SELECT DISTINCT user_ip FROM ".$this->_table."");
	    return $query->num_rows();
	}
	public function online_view(){
		$query = $this->db->query("SELECT DISTINCT user_ip FROM ".$this->_table."");
	    return $query->result_array();
	}
}