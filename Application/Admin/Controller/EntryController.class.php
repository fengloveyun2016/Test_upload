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


use Common\Controller\BaseController;

class EntryController extends BaseController {
	public function site() {
		//访问模块后台动作,到时加上权限验证
		$class = 'Addons\\' . $_GET['module'] . '\Site';
		$action = $_GET['action'];
		(new $class())->$action();
	}

	public function web() {
		$class = 'Addons\\' . $_GET['module'] . '\Web';
		$action = $_GET['action'];
		(new $class())->$action();
	}
}