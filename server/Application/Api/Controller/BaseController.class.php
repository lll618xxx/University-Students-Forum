<?php 
namespace Api\Controller;
use Think\Controller;

class BaseController extends Controller{
	protected $token;

	public function _initialize(){
		// CORS处理跨域问题
		header('Content-Type:application/json; charset=utf-8');
        header('Access-Control-Allow-Origin:*'); 
        header('Access-Control-Max-Age:86400'); // 允许访问的有效期
        header('Access-Control-Allow-Headers:*'); 
        header('Access-Control-Allow-Methods:OPTIONS, GET, POST, DELETE, PUT');

        date_default_timezone_set("PRC");   //系统使用北京时间

        //apache_request_headers PHP原生函数获取header信息
    	//apache_request_headers()['AUTHOR']

        $this->token = $_SERVER['HTTP_AUTHOR'];
        if (!$this->token) {
            $this->token = I('token');
        }
	}
}

?>