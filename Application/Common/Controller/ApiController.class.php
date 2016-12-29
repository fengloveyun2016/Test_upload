<?php
namespace Common\Controller;


use Think\Controller;

class ApiController extends Controller {
	protected $code    = 200;
	protected $message = '操作成功';

	//数据找不到
	public function responseNotFound() {
		$data['code']    = 404;
		$data['message'] = 'Not Found';
		$this->ajaxReturn( $data );
	}

	public function response( $data ) {
		$res['code']    = $this->code;
		$res['message'] = $this->message;
		$res['data']    = $data;
		$this->ajaxReturn( $res );
	}
}