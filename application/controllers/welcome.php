<?php

class Welcome extends Controller{
	public function index(){
		$this->load->model('welcome');
		//echo 'Welcome, form the welcome controller';
		$data = array('title' => 'Hellow', 'greeting' => 'hi');
		$this->load->view('welcome', $data);
	}

	public function test($var1, $var2){
		echo $var1 . '<br />' . $var2;
	}

	public function hello($name){
		echo "Hello $name";
	}
}