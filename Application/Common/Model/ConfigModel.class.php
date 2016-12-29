<?php namespace Common\Model;

class ConfigModel extends BaseModel {
	protected $pk        = 'id';
	protected $tableName = 'config';
	protected $_validate
	                     = [
			[ 'data', 'require', '数据不能为空' ], //默认情况下用正则进行验证
		];


}