<?php namespace Common\Behaviors;
use wechat\WeChat;

require 'Application/Common/Common/helper.php';

class AppBegin extends \Think\Behavior {
	//行为执行入口
	public function run( &$param ) {
	}

	public function app_begin() {
		//读取配置
		$data = m( 'config' )->find( 1 );
		v( 'config', json_decode( $data['data'], true ) );
		//微信配置项
		$data = m( 'wechat' )->find( 1 );
		v( 'wechat', json_decode( $data['data'], true ) );
		new WeChat(v('wechat'));
		//常量
		define('MODULE',I('get.module'));
	}
}