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
use Common\Model\AddonsModel;

class AddonsController extends AdminController {
	//插件列表
	public function lists() {
		$names = ( new AddonsModel() )->getField( 'id,name' );
		$data  = [ ];
		foreach ( glob( 'Addons/*' ) as $d ) {

			if ( is_dir( $d ) && is_file( $d . '/config.php' ) ) {
				$config = include $d . '/config.php';
				if ( ! in_array( $config['name'], $names ) ) {
					$data[] = $config;
				}
			}
		}
		$this->assign( 'data', $data );
		$this->display();
	}

	//安装插件
	public function install() {
		$db = new AddonsModel();
		if ( $db->where( "name='{$_GET['name']}'" )->select() ) {
			$this->error( '插件已经安装' );
		}
		$config = include 'Addons/' . $_GET['name'] . '/config.php';
		$this->store( $db, $config );

	}

	//发布插件
	public function add() {
		if ( IS_POST ) {
			$action = [ ];
			foreach ( preg_split( '@(\r|\n)@', $_POST['action'] ) as $a ) {
				$res = array_filter( explode( '|', $a ) );
				if ( count( $res ) == 2 ) {
					$action[] = $res;
				}
			}
			$data = I( 'post.' );
			$data['action']=json_encode( $action, JSON_UNESCAPED_UNICODE );
			if ( empty( $data['title'] ) || empty( $data['name'] ) || empty( $data['author'] ) ) {
				$this->error( '插件数据填写不正确' );
			}
			//插件目录
			$dir = 'Addons/' . I( 'post.name' );
			if ( is_dir( $dir ) ) {
				$this->error( '插件已经存在' );
			}
			//生成插件配置文件
			mkdir( $dir, 0755, true );
			file_put_contents( $dir . '/config.php', '<?php return ' . var_export( $data, true ) . ';?>' );
			//生成插件业务代码
			foreach ( glob( 'Addons\tpl\*' ) as $f ) {
				$content = file_get_contents( $f );
				$content = str_replace( '{#NAME#}', $data['name'], $content );
				file_put_contents( $dir . '/' . basename( $f ), $content );
			}
			mkdir( $dir . '/template', 0755, true );
			$this->success( '创建成功', u( 'lists' ) );
		}
		$this->display();
	}
}