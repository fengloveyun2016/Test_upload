<?php namespace Addons\article;
//前台业务功能
use Addons\AddonsController;

class Web  extends AddonsController{
	public function index() {
		$this->display('article/index.html');
	}
}