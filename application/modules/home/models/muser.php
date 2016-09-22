<?php
	class Muser extends CI_Model{
		protected $_table = "tbl_customer";
		protected $_order = "tbl_order";
		protected $_fa	  = "tbl_favorites";
		protected $_pro	  = "tbl_products";
		public function __construct(){
			parent::__construct();
			$this->load->database();
		}
		public function login($name,$pass){
			$this->db->where("cus_name",$name);
			$this->db->where("cus_password",$pass);
			$this->db->where("cus_status",1);
			return $this->db->get($this->_table)->row_array();	
		}
		public function check_user($user,$id=""){
			if($id != ""){
				$this->db->where("cus_id !=",$id);
			}
			$this->db->where("cus_name",$user);
			$query = $this->db->get($this->_table);
			if($query->num_rows() == 0){
				return TRUE;
			}else{
				return FALSE;
			}
		}
		public function check_email($email,$id=""){
			if($id != ""){
				$this->db->where("cus_id !=",$id);
			}
			$this->db->where("cus_email",$email);
			$query=$this->db->get($this->_table);
			if($query->num_rows() == 0){
				return TRUE;
			}else{
				return FALSE;
			}
		}
		public function getdata($where){
			$this->db->where($where);
			return $this->db->get($this->_table)->num_rows();
		}
		public function getuser($id){
			$this->db->where("cus_id",$id);
			return $this->db->get($this->_table)->row_array();
		}
		public function get_order($id){
			$this->db->where("id",$id);
			return $this->db->get($this->_order)->row_array();
		}
		public function add($data){
			$this->db->insert($this->_table,$data);
		}
		public function update($data,$id){
			$this->db->where("cus_id",$id);
			$this->db->update($this->_table,$data);
		}
		public function list_order($id,$off,$start){
			$this->db->where("user_id",$id);
			$this->db->order_by("id","DESC");
			$this->db->limit($off,$start);
			return $this->db->get($this->_order)->result_array();
		}
		//User like product
		public function check_like_content($uid,$pid){
			$this->db->where("fa_userid",$uid);
			$this->db->where("pro_id",$pid);
			$query = $this->db->get($this->_fa);
			if($query->num_rows() > 0){
				return FALSE;
			}else{
				return TRUE;
			}
		}
		public function insert($data){
			$this->db->insert($this->_fa,$data);
		}
		public function user_like_content($uid){
			$this->db->join("$this->_fa","$this->_fa.pro_id = $this->_pro.pro_id");
			$this->db->where("$this->_fa.fa_userid",$uid);
			return $this->db->get($this->_pro)->result_array();
		}
		public function del_like_content($id){
			$this->db->where("pro_id",$id);
			$this->db->delete($this->_fa);
		}
	}