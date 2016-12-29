<?php namespace Addons\text;

//微信关键词的处理
use Addons\Addons;
use wechat\WeChat;

class Handler extends Addons {
	public function run( $kid ) {
//		$content = m( 'reply_text' )->where( "keyword_id=$kid" )->getField( 'content' );
//		$this->wx->instance( 'message' )->text( $content );
		$news=array(
			array(
				'title'=>'后盾网',
				'discription'=>'后盾网 人人做后盾',
				'picurl'=>'http://www.hdphp.com/theme/article/images/hdphp.jpg',
				'url'=>'http://baidu.com'
			),
			array(
				'title'=>'快学网',
				'discription'=>'快学网 快人一步',
				'picurl'=>'http://www.hdphp.com/theme/article/images/hdphp.jpg',
				'url'=>'http://qq.com'
			),
		);
		$this->wx->instance( 'message' )->news($news);
	}
}