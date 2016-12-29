<?php namespace Api\Controller;

use Common\Controller\ApiController;

class ArticleController extends ApiController {
	/**
	 * @api {get} /api/article/get/id/:id 获取文章
	 * @apiSampleRequest /api/article/get
	 * @apiPermission 无
	 * @apiName get
	 * @apiGroup article
	 * @apiVersion 0.1.0
	 * @apiDescription  api   获取课程api
	 * @apiParam {string} id  文章编号    (必填).
	 */
	public function get() {
		$id = $_GET['id'];
		if ( $res = m( "article" )->find( $id ) ) {
			$this->response( $res );
		} else {
			$this->responseNotFound();
		}
	}
	public function lists() {
		if ( $res = m( "article" )->limit(3)->select()) {
			$this->response( $res );
		} else {
			$this->responseNotFound();
		}
	}
}