<?php namespace Admin\Controller;
use Think\Controller;

class IndexController extends Controller{
	public function index(){
		$d = m('user')->select();
		$this->display();
	}
}