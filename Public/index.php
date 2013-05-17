<?php
//程序入口文件
header("Content-Type:text/html;charset=utf-8");
defined('APP_PATH') || define('APP_PATH', dirname(__FILE__) . '/..');
defined('FRAMEWORK_PATH') || define('FRAMEWORK_PATH', APP_PATH . '/Library/Test');
include FRAMEWORK_PATH . '/Route.php';
Route::run();
