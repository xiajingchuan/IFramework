<?php
/**
 * 路由器类
 * 实现对地址的解析处理
 * @author panke
 * @version 2013-5-17
 */
class Route {
	public static function run() {
		//设置默认的控制器
		$control = empty($_GET['c']) ? 'Index' : trim($_GET['c']);
		//设置默认的Action
		$action = empty($_GET['a']) ? 'index' : trim($_GET['a']);
		$controlBasePath = dirname(__FILE__) . '/../../App/Module/Control';
		$controlFilePath = $controlBasePath . $control . '.php';

		if (is_file($controlFilePath)) {
			//加载控制器类
			include $controlFilePath;

			if (class_exists($control)) {
				$controlHandler = new $control();

				if (method_exists($controlHandler, $action)) {
					$controlHandler->$action();
				} else {
					echo '方法不存在';
				}
			} else {
				echo '控制器类不存在';
			}
		} else {
			echo '控制器不存在';
		}
	}
}
