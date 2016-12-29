<?php
namespace Common\Controller;


use Think\Controller;
use Think\Model;

class BaseController extends Controller {
	protected $successMessage = '操作成功';

	public function __construct() {
		parent::__construct();
		if ( method_exists( $this, '__init' ) ) {
			$this->__init();
		}
	}

	//成功消息
	protected function successMessage( $message ) {
		$this->successMessage = $message;

		return $this;
	}

	//保存数据
	public function store( Model $model, $data, \Closure $callback = null ) {
		$res = $model->store( $data );
		if ( $res['status'] == 'success' && $callback instanceof \Closure ) {
			//如果提供了闭包就执行
			$callback( $res );
		} else {
			//没有闭包时发信息
			$this->message( $res );
		}
	}

	public function message( $data ) {
		if ( $data['status'] == 'success' ) {
			$this->success( $this->successMessage );
		} else {
			$this->error( $data['message'] );
		}
		exit;
	}

}