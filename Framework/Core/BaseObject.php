<?php
/**
 * 定义所有类的基类
 */
class BaseObject {
	public function __call($name, $arguments) {
		if (true === C('debug')) {
			echo '方法不存在';
			echo '名称是：';
			var_dump($name);
			echo '参数是：';
			var_dump($arguments);
		}
		throw new Exception('方法不存在');
	}
}
