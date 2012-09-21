<?php

class Helloworld extends Controller{
	public function hello($name){
		echo "Hello world, and $name!";
	}
}