<?php
/**
 * 打印函数
 * @param $var
 */
function p($var){
	echo '<pre>' . print_r($var,true) . '</pre>';
}

function u($url){
	$path = '';
	$arr = explode('/',$url);
	//$arr就是[0=>'lists'];
	switch (count($arr)){
		//u('index')
		case 1:
			$path = '?s=' . MODULE . '/' . CONTROLLER . '/' . $arr[0];
			break;
		//u('arc/lists')
		case 2:
			$path = '?s=' . MODULE . '/' . $arr[0] . '/' . $arr[1];
			break;
		case 3:
			$path = '?s=' . $arr[0] . '/' . $arr[1] . '/' . $arr[2];

	}
	return __ROOT__ . $path;

}

//在home模块下面有article控制器里面有index和lists方法
//在index方法用u('lists') 生成home模块article控制器的lists方法的地址

//u('index') http://localhost/c81/frame/0628/hdphpmini/public/index.php?s=home/entry/index
//u('arc/add') http://localhost/c81/frame/0628/hdphpmini/public/index.php?s=home/arc/add
//u('admin/entry/lists') http://localhost/c81/frame/0628/hdphpmini/public/index.php?s=admin/entry/lists













