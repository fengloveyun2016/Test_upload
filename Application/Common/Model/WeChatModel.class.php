<?php namespace Common\Model;

class WeChatModel extends BaseModel {
	protected $pk        = 'id';
	protected $tableName = 'wechat';
	protected $_validate
	                     = [
			[ 'data', 'require', '数据不能为空' ], //默认情况下用正则进行验证
		];
}