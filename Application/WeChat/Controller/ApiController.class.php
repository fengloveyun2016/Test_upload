<?php namespace WeChat\Controller;

use Common\Model\SystemModel;
use Think\Controller;
use wechat\WeChat;

/**
 * 微信接口
 * Class ApiController
 * @package WeChat\Controller
 */
class ApiController extends Controller {
	protected static $wx;

	public function __construct() {
		self::$wx = new WeChat( v( 'wechat' ) );
		self::$wx->valid();
	}

	public function handler() {
		//关注时回复消息
		$instance = self::$wx->instance( 'message' );
		if ( $instance->isSubscribeEvent() ) {
			//关注时
			$system = ( new SystemModel() )->find( 1 );
			$instance->text( $system['welcome'] );
		}

		if ( $instance->isTextMsg() ) {
			//获取消息内容
			$message = $instance->getMessage();
			//所有关键词
			$keywords = m( 'keyword' )->select();
			foreach ( $keywords as $k ) {
				switch ( $k['type'] ) {
					case 2:
						//正则
						$find = preg_match('@'.$k['keyword'].'@', $message->Content);
						break;
					case 0:
						$find = strpos( $message->Content, $k['keyword'] ) !== false;
						break;
					case 1:
					default:
						//完全匹配
						$find = $k['keyword'] == $message->Content;
						break;

				}
				if ( $find ) {
					$class = 'Addons\\' . $k['module'] . '\Handler';
					( new $class() )->run( $k['id'] );
				}
			}
		}
		//默认回复
		//		$instance->text($system['default']);
	}
}













