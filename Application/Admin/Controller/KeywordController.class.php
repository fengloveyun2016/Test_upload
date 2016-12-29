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
use Common\Model\KeywordModel;

class KeywordController extends AdminController {
	protected $db;

	//关键词列表
	public function lists() {
		$this->display();
	}

	public function add() {
		//模块类
		$class  = 'Addons\\' . MODULE . '\Field';
		$module = new $class();
		if ( IS_POST ) {
			$data           = I( 'post.' );
			$data['module'] = MODULE;
			$this->store( new KeywordModel(), $data, function ( $res ) {
				$class = 'Addons\\' . MODULE . '\Field';
				( new $class() )->submit( $res['data'], I( 'post.' ) );
			} );
		}
		$moduleField = $module->getForm();
		$this->assign( 'moduleField', $moduleField );
		$this->display();
	}
}















