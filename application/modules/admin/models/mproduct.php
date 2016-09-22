<?php
	class Mproduct extends CI_Model{
		protected $_product= "tbl_products";
		protected $_cate = "tbl_category";
		public function __construct(){
			parent::__construct();
			$this->load->database();
		}
		public function list_cate(){
			$this->db->where("cate_parent",1);
			return $this->db->get($this->_cate)->result_array();
		}
		public function list_sub($cate_id){
			$this->db->where("cate_id_parent",$cate_id);
			$this->db->where("cate_parent",2);
			return $this->db->get($this->_cate)->result_array();
		}
		public function list_cate_all(){
			$list = $this->list_cate();
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
		public function list_pro($off,$start){
			$this->db->join("tbl_category","tbl_category.cate_id = tbl_products.cate_id");
			$this->db->order_by("pro_id","DESC");
			$this->db->limit($off,$start);
			return $this->db->get($this->_product)->result_array();
		}
		public function count_all(){
			$this->db->join("tbl_category","tbl_category.cate_id = tbl_products.cate_id");
			return $this->db->count_all_results($this->_product);
		}
		public function list_pro_cate($id,$off,$start){
			$this->db->join("tbl_category","tbl_category.cate_id = tbl_products.cate_id");
			$this->db->where("tbl_products.cate_id",$id);
			$this->db->or_where("tbl_products.cate_id_parent",$id);
			$this->db->order_by("pro_id","DESC");
			$this->db->limit($off,$start);
			return $this->db->get($this->_product)->result_array();
		}
		public function count_all_procate($id){
			$this->db->join("tbl_category","tbl_category.cate_id = tbl_products.cate_id");
			$this->db->where("tbl_products.cate_id",$id);
			$this->db->or_where("tbl_products.cate_id_parent",$id);
			return $this->db->count_all_results($this->_product);
		}
		public function list_pro_change($off,$start,$id){
			$this->db->where("cate_id",$id);
			$this->db->order_by("pro_id","DESC");
			$this->db->limit($off,$start);
			return $this->db->get($this->_product)->result_array();
		}
		public function count_alls($id){
			$this->db->where("cago_id",$id);
			return $this->db->count_all_results($this->_product);
		}
		public function add($value){
			$this->db->insert($this->_product,$value);
		}
		public function del($id){
			$this->db->where("pro_id",$id);
			$this->db->delete($this->_product);
		}
		public function update_product($data,$id){
			$this->db->where("pro_id",$id);
			$this->db->update($this->_product,$data);
		}
		public function getdata($id){
			$this->db->where("pro_id",$id);
			return $this->db->get($this->_product)->row_array();
		}
	}