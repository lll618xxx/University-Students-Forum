<?php
return array(
	//'配置项'=>'配置值'
	//禁止模块访问
	//'MODULE_DENY_LIST' => array('Runtime'),

	//允许模块访问
	//'MODULE_ALLOW_LIST' => array('Common', 'Runtime'),
	
	//设置默认的加载模块
	//'DEFAULT_MODULE' => 'Admin',
	
	//只允许一个模块
	//'MULTI_MODULE' => false,
	
	//设置PATHINFO的URL分隔符
	//'URL_PATHINFO_DEPR' => '_',
	
	//mysql全局定义
	//'APP_DEBUG' => true,  			//开启调试模式
	//'DB_TYPE' => 'mysql',			//数据库类型
	//'DB_HOST' => 'localhost',		//数据库服务器地址
	//'DB_NAME' => 'mytp',			//数据库名称
	//'DB_USER' => 'root',			//数据库用户名
	//'DB_PWD' => '22394463zxc',		//数据库密码
	//'DB_PORT' => '3306',			//数据库端口
	//'DB_PREFIX' => 'think_'			//数据表前缀

	//pdo专用定义,DB_TYPE => 3.21是pdo，但是3.23却是mysql
	'DB_TYPE' => 'mysql',
	'DB_USER' => 'root',
	'DB_PWD' => '22394463zxc',
	'DB_PREFIX' => 'think_',
	'DB_DSN' => 'mysql:host=localhost;dbname=mytp;charset=UTF8',

	//开启页面调试工具
	//'SHOW_PAGE_TRACE' => true,
	
	//'MODULE_ALLOW_LIST' => array('Home'),
	//'DEFAULT_MODULE' => 'Home',	//设置默认模块
);