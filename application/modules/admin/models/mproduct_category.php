<?php
  class Mproduct_category extends CI_Model{
	protected $_table = "tbl_category";
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	public function count_all(){
		return $this->db->count_all($this->_table);
	}
	public function add($value){
		$this->db->insert($this->_table,$value);
	}
	public function del_cate($id){
		$this->db->where("cate_id",$id);
		$this->db->delete($this->_table);
	}
	public function update_cate($data,$id){
		$this->db->where("cate_id",$id);
		$this->db->update($this->_table,$data);
	}
	public function getdata($id){
		$this->db->where("cate_id",$id);
		return $this->db->get($this->_table)->row_array();
	}
	public function count_all_parent(){
		$this->db->where("cate_parent",1);
		return $this->db->count_all_results($this->_table);
	}
	public function list_cate($off,$start){
		$this->db->where("cate_parent",1);
		$this->db->order_by("cate_order","DESC");
		$this->db->limit($off,$start);
		return $this->db->get($this->_table)->result_array();
	}
	public function list_sub($cate_id){
		$this->db->where("cate_id_parent",$cate_id);
		$this->db->where("cate_parent",2);
		$this->db->order_by("cate_order","DESC");
		return $this->db->get($this->_table)->result_array();
	}
	public function list_cate_all($off,$start){
		$list = $this->list_cate($off,$start);
		$data = array();
		if($list != NULL){
			foreach($list as $k => $v){
				$data[] = $this->list_sub($v['cate_id']);
			}
		}
		$ok = array(
			"cate" => $list,
			"sub" => $data
		);
		return $ok;
	}
  }