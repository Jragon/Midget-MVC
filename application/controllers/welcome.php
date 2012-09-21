<?php

class Welcome extends Controller{
	public function index(){
		$this->load->model('welcome');
		$data = array('title' => 'Hellow', 'greeting' => $this->welcome->greeting);
		$this->load->view('welcome/index', $data);
	}
}
