<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
  
	public function index(){
		$this->load->view('admin/home');
	}
	public function location(){
		$this->load->view('admin/location');
	}
	public function chat(){
		$this->load->view('admin/chat');
	}
	
	public function setting(){
		$this->load->view('admin/setting');
	}
	
}
