<?php namespace Addons\{#NAME#};

//关键词处
use Addons\AddonsController;

class Field extends AddonsController {
	//获取表单样式
	public function getForm() {
		return $this->fetch( 'form.html' );
	}

	//保存数据
	public function submit( $kid, $data ) {

	}
}