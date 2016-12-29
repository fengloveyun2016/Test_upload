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

namespace Addons;

use Common\Model\AddonsModel;
use Think\Controller;

class AddonsController extends Controller {
	protected $template;

	public function __construct() {
		parent::__construct();
		$this->template = 'Addons/' . MODULE . '/template';
		$this->assignModuleMenus();
	}

	public function assignModuleMenus() {
		$modules = ( new AddonsModel() )->select();
		foreach ( $modules as $k => $v ) {
			$modules[ $k ]['action'] = json_decode( $v['action'], true );
		}
		$this->assign( '_modules', $modules );
	}

	public function fetch( $tpl ) {
		$content = file_get_contents( $this->template . '/' . $tpl );
		ob_start();
		$this->show( $content );

		return ob_get_clean();
	}

	public function display( $tpl ) {
		$content = file_get_contents( $this->template . '/' . $tpl );
		$this->show( $content );
	}
}