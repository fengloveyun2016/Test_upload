<?php namespace Admin\Controller;

use Common\Controller\AdminController;
use Common\Model\ConfigModel;

class ConfigController extends AdminController {
	public function set() {
		if ( IS_POST ) {
			$this->store( new ConfigModel(), I( 'post.' ) );
		}
		$data = ( new ConfigModel() )->find( 1);
		$this->assign( 'field', $data );
		$this->display();
	}
}