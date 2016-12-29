<?php
/** .-------------------------------------------------------------------
 * |  Software: [HDPHP framework, HDCMS]
 * |      Site: www.hdphp.com www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军 <2300071698@qq.com>
 * |    Video : www.houdunren.com
 * |    WeChat: aihoudun
 * | Copyright (c) 2012-2019, www.houdunwang.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace Admin\Controller;


use Common\Controller\AdminController;
use Common\Model\SystemModel;
use Common\Model\WeChatModel;
use wechat\WeChat;

class WxController extends AdminController {
	public function set() {
		if ( IS_POST ) {
			$data       = I( 'post.' );
			$data['id'] = 1;
			$this->store( new WeChatModel(), $data );
		}
		$data = ( new WeChatModel() )->find( 1 );
		$this->assign( 'field', $data ?: [ ] );
		$this->display();
	}

	//测试
	public function connect() {
		//微信SDK 实例
		$obj = new WeChat( v( 'wechat' ) );
		if ( $res = $obj->instance( 'button' )->query() ) {
			$this->success( '绑定成功' );
		} else {
			$this->success( '绑定失败,请检测appid等值' );
		}

	}

	//系统回复设置
	public function system() {
		if ( IS_POST ) {
			$data       = I( 'post.' );
			$data['id'] = 1;
			$this->store( new SystemModel(), $data );
		}
		$field = ( new SystemModel() )->find( 1 );
		$this->assign( 'field', $field );
		$this->display();
	}

	//按钮处理
	public function button() {
		if(IS_POST){
			$res = (new WeChat())->instance('button')->create(I('post.data'));
			dd($res);
		}
		$this->display();
	}
}







