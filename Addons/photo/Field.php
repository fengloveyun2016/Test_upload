<?php namespace Addons\photo;

//关键词处
use Addons\AddonsController;

class Field extends AddonsController {
	//获取表单样式
	public function getForm() {
		return $this->fetch('');
	}
}