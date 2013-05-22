<?php
/**
 * 定义框架自己的函数
 * @author panke
 * @version 2013-5-17
 */


/**
 * 自动加载函数
 */
function __autoload($className) {
	$frameworkFileName = FRAMEWORK_PATH . '/' . $className . '.php';
	if (is_file($frameworkFileName)) {
		include $frameworkFileName;
	} else {
		//用户类文件
		$controlFileName = MODULES_PATH . '/Control/' . $className . '.php';

		if (is_file($controlFileName)) {
			include $controlFileName;
		} else {
			$modelFileName = MODULES_PATH . '/Model/' . $className . '.php';

			if (is_file($modelFileName)) {
				include $modelFileName;
			} else {
				$helperFileName = MODULES_PATH . '/Helpers/' . $className. '.php';

				if (is_file($helperFileName)) {
					include $helperFileName;
				} else {
					echo "类文件未找到";
				}
			}
		}
	}
}

/**
 * 配置文件函数
 * 可读取配置和修改配置
 * @author panke
 * @version 2013-5-22
 */
function C($name=null, $val=null) {
	static $_config = array();

	if (empty($name)) {
		return $_config;
	} elseif (is_string($name)) {
		if (empty($val)) {
			if (!strpos($name, '=>')) {
				return isset($_config[$name]) ? $_config[$name] : null;
			} else {
				$name = explode("=>", $name);
				return isset($_config[$name[0]][$name[1]]) ? $_config[$name[0]][$name[1]] : null;
			}
		} else {
			if (!strpos($name, '=>')) {
				$_config[$name] = $val;
			} else {
				//设置二维
				$name = explode("=>", $name);
				$_config[$name[0]][$name[1]] = $val;
			}
		}
	} elseif (is_array($name)) {
		foreach ($name as $key=>$value) {
			$_config[$key] = $value;
		}
		return;
	} else {
		echo '参数类型出错';
		return;
	}
}
