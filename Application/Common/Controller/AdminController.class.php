<?php namespace Common\Controller;

use Common\Model\AddonsModel;

class AdminController extends BaseController {
	public function __construct() {
		parent::__construct();
		$this->assignModuleMenus();
	}

	public function assignModuleMenus(){
		$modules=(new AddonsModel())->select();
		foreach($modules as $k=>$v){
			$modules[$k]['action']=json_decode($v['action'],true);
		}
		$this->assign('_modules',$modules);
	}
}