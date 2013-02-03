<?php

class Welcome extends Controller{
	public function index(){
		$this->welcome = $this->load->model('welcome');
		$data = array('title' => 'Hellow', 'greeting' => $this->welcome->greeting);
		$this->view->render('welcome/index', $data);
	}
}
