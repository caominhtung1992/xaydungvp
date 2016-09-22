<?php
	require("libraries/student.php");
	class Order extends Student{
		public function __construct(){
			parent::__construct();
			$this->load->helper("url");
			$this->load->model("morder");
		}
		public function index(){
			$config['base_url'] 	= base_url()."admin/order/index";
			$config['total_rows'] = $data['row'] 	= $this->morder->count_all();
			$config['per_page'] 	= "10";
			$config['uri_segment'] 	= "4";
			$config['next_link'] 	= "Next";
			$config['prev_link'] 	= "Prev";
			$config['first_link'] 	= "First";
			$config['last_link'] 	= "Last";
			$this->load->library("pagination");
			$this->pagination->initialize($config);
			$start = $this->uri->segment(4);
			$data['list_order'] = $this->morder->list_order($config['per_page'],$start);
			//$this->debug($data['list_order']);
			$data['act'] = "1";
			$data['title'] = "Danh sách đơn hàng";
			$data['template'] = "order/list_order";
			$this->load->view("layout",$data);
		}
		public function detail(){
			$data['act'] = "1";
			$id = $this->uri->segment(4);
			$data['detail']	= $this->morder->getdata($id);
			//$this->debug($data['detail']);
			$data['title'] = "Chi tiết đơn hàng";
			$data['template'] = "order/detail_order";
			$this->load->view("layout",$data);
		}
		public function del(){
			$id = $this->input->post('id');
			$this->morder->del_order($id);
		}
		public function ajax(){
			$id = $this->input->post('order_id');
			$status = $this->input->post('status_id');
			$comment = $this->fillter($this->input->post('comment'));
			$val = array(
				"status"	=> $status,
				"comment"	=> $comment
			);
			$this->morder->update_order($val,$id);
		}
	}