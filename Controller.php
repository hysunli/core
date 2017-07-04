<?php
namespace hysunli\core;
class Controller{
	private $url='window.history.back()';
	/**
	 * 跳转
	 */
	protected function setRedirect($url=''){
		if(empty($url)){
			$this->url = "window.history.back()";
		}else{
			$this->url = "location.href='{$url}'";
		}
		return $this;
	}

	/**
	 * 消息提示
	 * @param $msg
	 */
	protected function message($msg){
		include './view/message.php';
		exit;
	}

}







