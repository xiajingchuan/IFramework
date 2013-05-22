<?php
/**
 * 前端控制器
 */
defined('APP_PATH') || exit('未定义APP_PATH');
defined('FRAMEWORK_PATH') || define('FRAMEWORK_PATH', APP_PATH . '/Library/Test');

defined('MODULES_PATH') || define('MODULES_PATH', APP_PATH . '/APP/Module');
//定义配置文件路径
defined('CONFIG_PATH') || define('CONFIG_PATH', APP_PATH . '/APP/Config');
include FRAMEWORK_PATH . '/Function' . '/function.php';
class FrontControl {
	private static $_instance = null;
	
	/**
	 * 将构造函数设为private以实现单例模式
	 * 在构造函数中可以做很多事，如防止CSRF攻击
	 */
	private function __construct() {
		C(include CONFIG_PATH . '/config.php');
		//启动session
		session_start();
		//设置时区
		date_default_timezone_set('PRC');

		if (true == C('debug')) {
			echo 'debug mode:';
			ini_set('display_errors', 'On');
			error_reporting(C('errorReporting'));
		} else {
			error_reporting(0);
			ini_set('display_errors', 'Off');
		}
	}

	private function __clone() {}
	
	public static function getInstance() {
		if (!(self::$_instance instanceof self)) {
			self::$_instance = new FrontControl();
		}
		return self::$_instance;
	}

	public function run() {
		Route::run();
	}

}
