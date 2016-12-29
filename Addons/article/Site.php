<?php namespace Addons\article;

//后台业务功能
use Addons\AddonsController;

class Site extends AddonsController {
	public function category() {
		$this->display( 'category_list.html' );
	}
}