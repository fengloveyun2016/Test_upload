<?php namespace Addons;

use wechat\WeChat;

class Addons {
	protected  $wx;

	public function __construct() {
		$this->wx = new WeChat();
	}
}