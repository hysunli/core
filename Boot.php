<?php

namespace hysunli\core;
/**
 * 框架启动类
 * Class Boot
 * @package houdunwang\core
 */
class Boot {

	public static function run() {
		//错误处理
		self::handelError();
		//初始化框架
		self::init();
		//执行应用
		self::appRun();
	}

	static private function handelError() {
		$whoops = new \Whoops\Run;
		$whoops->pushHandler( new \Whoops\Handler\PrettyPageHandler );
		$whoops->register();

	}

	private static function init(){
		session_id() || session_start();
		date_default_timezone_set('PRC');
		//1.定义是否是POST提交的常量 2.因为将来我们要做是否是POST提交的判断 例如：if(IS_POST){} {}内部的代码就是指POST提交之后要处理的代码
		define('IS_POST',$_SERVER['REQUEST_METHOD'] == 'POST' ? true : false);
		//定义__ROOT__
		//p($_SERVER);
		//在u函数中组合访问地址就用到__ROOT__
		define('__ROOT__','http://' . $_SERVER['HTTP_HOST'] . $_SERVER['SCRIPT_NAME']);
		//echo __ROOT__;
	}


	private static function appRun() {
		//index.php?s=home/entry/index
		//p( $_GET );
		if ( isset( $_GET['s'] ) ) {
			$info = explode( '/', $_GET['s'] );
//			p($info);
			//模块
			$m  = strtolower($info[0]);
			//控制器
			$c = strtolower($info[1]);
			//方法
			$a = strtolower($info[2]);
		} else {
			//模块
			$m  = 'home';
			//控制器
			$c = 'entry';
			//方法
			$a = 'index';
		}

		//定义三个常量（为了将来组合模板路径的）
		define('MODULE',$m);
		define('CONTROLLER',$c);
		define('ACTION',$a);


		//new \app\home\controller\Entry();
		//因为类名首字母是大写的
		$controller = ucfirst($c);
		$class = "\app\\{$m}\controller\\{$controller}";
		//实例化控制器，执行里面的方法
		echo call_user_func_array([new $class,$a],[]);



	}
}








