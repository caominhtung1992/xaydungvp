<?php
	class Marticles extends CI_Model{
		protected $_news = "tbl_news";
		protected $_cago = "tbl_categorie";
		public function __construct(){
			parent::__construct();
			$this->load->database();
		}
		public function list_cago(){
			return $this->db->get($this->_cago)->result_array();
		}
		public function list_news($off,$start){
			$this->db->order_by("news_id","DESC");
			$this->db->limit($off,$start);
			return $this->db->get($this->_news)->result_array();
		}
		public function list_news_change($off,$start,$id){
			$this->db->where("cago_id",$id);
			$this->db->order_by("news_id","DESC");
			$this->db->limit($off,$start);
			return $this->db->get($this->_news)->result_array();
		}
		public function count_all(){
			return $this->db->count_all($this->_news);
		}
		public function count_alls($id){
			$this->db->where("cago_id",$id);
			return $this->db->count_all_results($this->_news);
		}
		public function add($value){
			$this->db->insert($this->_news,$value);
		}
		public function del($id){
			$this->db->where("news_id",$id);
			$this->db->delete($this->_news);
		}
		public function update_news($data,$id){
			$this->db->where("news_id",$id);
			$this->db->update($this->_news,$data);
		}
		public function getdata($id){
			$this->db->where("news_id",$id);
			return $this->db->get($this->_news)->row_array();
		}
	}