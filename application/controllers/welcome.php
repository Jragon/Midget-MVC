<?php

class Welcome extends Controller{
	public function index(){
		$this->load->model('welcome');
		//echo 'Welcome, form the welcome controller';
		$data = array('title' => 'Hellow', 'greeting' => 'hi');
		$this->load->view('welcome/index', $data);
	}
}