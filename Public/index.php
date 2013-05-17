<?php
//程序入口文件
header("Content-Type:text/html;charset=utf-8");
include dirname(__FILE__) . '/../Library/Test/Route.php';
Route::run();
