<?php
	class Marticles extends CI_Model{
		protected $_table 	= "tbl_categorie";
		protected $_news 	= "tbl_news";
		public function __construct(){
			parent::__construct();
			$this->load->database();
		}
		public function getdata($id){
			$this->db->where("news_id",$id);
			return $this->db->get($this->_news)->row_array();
		}
		public function getcago($id){
			$this->db->where("cago_id",$id);
			return $this->db->get($this->_table)->row_array();
		}
		public function gethot(){
			$this->db->where("news_hot",0);
			$this->db->limit(1);
			return $this->db->get($this->_news)->result_array();
		}
		public function update_news($id){
			$this->db->where("news_id",$id);
			$this->db->set('news_view', 'news_view+1',FALSE);
			$this->db->update($this->_news);
		}
		public function list_cago(){
			$this->db->where("cago_status",1);
			$this->db->order_by("cago_order","DESC");
			return $this->db->get($this->_table)->result_array();
		}
		public function list_news($cago_id){
			$this->db->where("cago_id",$cago_id);
			$this->db->where("news_status","1");
			$this->db->order_by("news_id","DESC");
			$this->db->limit(4);
			return $this->db->get($this->_news)->result_array();
		}
		public function list_news_ct(){
			$this->db->where("news_status","1");
			$this->db->order_by("news_id","DESC");
			$this->db->limit(10);
			return $this->db->get($this->_news)->result_array();
		}
		public function list_news_invole(){
			$this->db->where("news_status","1");
			$this->db->order_by("news_id","RANDOM");
			$this->db->limit(5);
			return $this->db->get($this->_news)->result_array();
		}
		public function list_new($off,$start){
			$this->db->where("news_status","1");
			$this->db->order_by("news_id","DESC");
			$this->db->limit($off,$start);
			return $this->db->get($this->_news)->result_array();
		}
		public function count_all_new($id){
			$this->db->where("cago_id",$id);
			return $this->db->count_all_results($this->_table);
		}
		public function count_all_news(){
			$this->db->where("news_status","1");
			return $this->db->count_all_results($this->_news);
		}
		public function other_list($id1,$id2){
			$this->db->where("cago_id",$id1);
			$this->db->where("news_id !=",$id2);
			$this->db->order_by("news_id","DESC");
			$this->db->limit(10);
			return $this->db->get($this->_news)->result_array();
		}
		public function listnews(){
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
		}
	}