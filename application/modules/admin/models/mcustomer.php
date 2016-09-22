<?php
	class Mcustomer extends CI_Model{
		protected $_table = "tbl_customer";
		public function __construct(){
			parent::__construct();
			$this->load->database();
		}
		public function check_login($cus,$pass){
			$this->db->where("cus_status",1);
			$this->db->where("cus_level",1);
			$this->db->where("cus_name",$cus);
			$this->db->where("cus_password",md5($pass));
			$result = $this->db->get($this->_table);
			if($result->num_rows() == 0){
				return FALSE;
			}else{
				return $result->row_array();
			}
		}
		public function check_cus($cus,$id=""){
			if($id != ""){
				$this->db->where("cus_id !=",$id);
			}
			$this->db->where("cus_name",$cus);
			$query=$this->db->get($this->_table);
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
		public function add_cus($data){
			$this->db->insert($this->_table,$data);
		}
		public function list_cus($off,$start){
			$this->db->order_by("cus_id","DESC");
			$this->db->where("cus_mod",0);
			$this->db->limit($off,$start);
			return $this->db->get($this->_table)->result_array();
		}
		public function count_all(){
			return $this->db->count_all($this->_table);
		}
		public function getdata($id){
			$this->db->where("cus_id",$id);
			return $this->db->get($this->_table)->row_array();
		}
		public function update_cus($data,$id){
			$this->db->where("cus_id",$id);
			$this->db->update($this->_table,$data);
		}
		public function del($id){
			$this->db->where("cus_id",$id);
			$this->db->where("cus_id !=",1);
			$this->db->delete($this->_table);
		}
	}