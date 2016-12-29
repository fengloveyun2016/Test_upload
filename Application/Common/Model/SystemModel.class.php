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

namespace Common\Model;


class SystemModel extends BaseModel{
	protected $pk='id';
	protected $tableName='system';
	protected $_validate=[
		array('welcome','require','关注时提示信息不能为空'),
		array('default','require','默认回复不能为空'),
	];
}