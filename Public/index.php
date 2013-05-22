<?php
//程序入口文件
header("Content-Type:text/html;charset=utf-8");
defined('APP_PATH') || define('APP_PATH', dirname(__FILE__) . '/..');
defined('FRAMEWORK_PATH') || define('FRAMEWORK_PATH', APP_PATH . '/Framework');
//加载前端控制器
include FRAMEWORK_PATH . '/FrontControl.php';
$frontControl = FrontControl::getInstance();
$frontControl->run();
