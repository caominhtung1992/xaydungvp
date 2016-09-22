<?php
	class Mproduct extends CI_Model{
		protected $_table 		= "tbl_products";
		protected $_category 	= "tbl_category";
		protected $_count_search	= "tbl_count_search";
		public function __construct(){
			parent::__construct();
			$this->load->database();
		}
		public function getdata($id){
			$this->db->where("pro_id",$id);
			return $this->db->get($this->_table)->row_array();
		}
		public function getcate($id){
			$this->db->where("cate_id",$id);
			return $this->db->get($this->_category)->row_array();
		}
		public function count_all_search($name){
			$this->db->like("pro_name",$name);
			return $this->db->count_all_results($this->_table);
		}
		public function search($name,$off,$start){
			$this->db->like("pro_name",$name);
			$this->db->where("pro_status","1");
			$this->db->limit($off,$start);
			return $this->db->get($this->_table)->result_array();
		}
		public function list_pro($cate_id,$off,$start){
			$this->db->where("cate_id",$cate_id);
			$this->db->or_where("cate_id_parent",$cate_id);
			$this->db->where("pro_status","1");
			$this->db->limit($off,$start);
			return $this->db->get($this->_table)->result_array();
		}
		public function count_all(){
			return $this->db->count_all($this->_table);
		}
		public function count_all_cate($cate_id){
			$this->db->where("cate_id",$cate_id);
			return $this->db->count_all_results($this->_table);
		}
		public function list_pro_sale($off,$start){
			$this->db->where("pro_saleoff","1");
			$this->db->where("pro_status","1");
			$this->db->order_by("pro_id","DESC");
			$this->db->limit($off,$start);
			return $this->db->get($this->_table)->result_array();
		}
		public function count_all_saleoff(){
			$this->db->where("pro_saleoff",1);
			return $this->db->count_all_results($this->_table);
		}
		public function list_pro_new($off,$start){
			$this->db->where("pro_new","1");
			$this->db->where("pro_status","1");
			$this->db->order_by("pro_id","DESC");
			$this->db->limit($off,$start);
			return $this->db->get($this->_table)->result_array();
		}
		public function count_all_new(){
			$this->db->where("pro_saleoff",1);
			return $this->db->count_all_results($this->_table);
		}
		public function list_pro_bestsale($off,$start){
			$this->db->where("pro_bestsale","1");
			$this->db->where("pro_status","1");
			$this->db->order_by("pro_id","DESC");
			$this->db->limit($off,$start);
			return $this->db->get($this->_table)->result_array();
		}
		public function count_all_bestsale(){
			$this->db->where("pro_saleoff",1);
			return $this->db->count_all_results($this->_table);
		}
		public function update_pro($id){
			$this->db->where("pro_id",$id);
			$this->db->set('pro_view','pro_view+1',FALSE);
			$this->db->update($this->_table);
		}
		public function update_cate($id){
			$this->db->where("cate_id",$id);
			$this->db->set('cate_view','cate_view+1',FALSE);
			$this->db->update($this->_category);
		}
		public function add_search($data){
			$this->db->insert($this->_count_search,$data);
		}
		public function check_search($text,$id=""){
			if($id != ""){
				$this->db->where("count_id !=",$id);
			}
			$this->db->where("count_name",$text);
			$query=$this->db->get($this->_count_search);
			if($query->num_rows() == 0){
				return TRUE;
			}else{
				return FALSE;
			}
		}
		public function update_search($text){
			$this->db->where("count_name",$text);
			$this->db->set('count_total','count_total+1',FALSE);
			$this->db->update($this->_count_search);
		}

		public function get_related_products($cate_id,$pro_id){
			$this->db->where("cate_id_parent",$cate_id);
			//$this->db->or_where("cate_id_parent",$cate_id);
			$this->db->where("pro_status",1);
			$this->db->where("pro_id !=",$pro_id);
			$this->db->limit(5);
			return $this->db->get($this->_table)->result_array();
		}
		/*public function listnews(){
			$list = $this->list_cago();
			if($list != NULL){
				foreach($list as $k => $v){
					$data[] = $this->list_news($v['cago_id']);
				}
			}
			$ok = array(
				"cago" => $list,
				"news" => $data
			);
			return $ok;
		}*/
	}