<?php
/**
 * 自定义异常处理类
 */
class BaseException extends Exception {
	public function printStack() {
		if (true === C('debug')) {
			echo parent::getTraceAsString();
		} else {
			$this->writeLog(parent::getTraceAsString());
			$this->outputErrorPage();
		}
	}

	public function __toString() {
		if (true !== C('debug')) {
			$this->_writeLog(parent::getTraceAsString());
			$this->_outputErrorPage();
			exit();
		}
		return parent::__toString();
	}

	protected function _writeLog($str) {
		file_put_content(APP_PATH . '/log', $str, FILE_APPEND);
	}

	protected function _outputErrorPage() {
		header("content-type:text/html");
		echo file_get_contents(APP_PATH . '/error.html');
	}
}
