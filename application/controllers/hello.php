<?php

class Hello extends Controller{
	public function index(){
		$data = array('title' => 'Hellow', 'greeting' => 'Hi');
		$this->load->view('welcome/index', $data);
	}

	public function hey($input = 'hi'){
		echo $input;
	}
}
