<?php
   class Notfound extends MY_Controller{
	   public function __construct(){
		   parent::__construct();
		   $this->load->helper("url");
	   }
	  public function index(){
		   $data['title'] = "Not found 404!";
		   $this->load->view("notfound/layout",$data);
	   }
   }