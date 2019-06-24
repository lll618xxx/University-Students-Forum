<?php 
namespace Api\Controller;
use Think\Controller;

/*user中的U一定要大写，否则会报错*/
class MessController extends BaseController{
	public function index(){
		// header('Content-type: application/json');
		//获取回调函数名
		// $jsoncallback = htmlspecialchars($_REQUEST ['jsoncallback']);
		$jsoncallback = $_GET['callback'];
		//json数据
		$json_data = '2112';
		//输出jsonp格式的数据
		echo $jsoncallback . "(" . $json_data . ")";
		// $this->ajaxReturn(array('status' => 1, 'data' => $json_data));
	}

	public function test(){
		$this->ajaxReturn(array('status' => 1,'info' => 'success'));
	}
}
?>