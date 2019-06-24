<?php
namespace Home\Controller;
use Think\Controller;				//等同于class IndexController extends \Think\Controller
use Think\Image;
use Think\Verify;
class IndexController extends Controller {
    public function index(){
        // $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
        //echo "Application-home-indexcontrol"."<br/>";
        //echo THINK_VERSION."<br/>";
	   // echo C('DEFAULT_MODULE');  //使用C方法来来读取配置文件中的数据

	   	// 返回JSON数据格式到客户端 包含状态信息
		// header('Content-Type:application/json; charset=utf-8');
		// 允许访问源
		header('Access-Control-Allow-Origin:*'); 
		// 允许访问的有效期
		// header('Access-Control-Max-Age:86400'); 
		// 允许访问的方法
		// header('Access-Control-Allow-Methods:OPTIONS, GET, POST, DELETE');
		$this->ajaxReturn(array('status' => 0,'info' => "<img src='11.png' onerror='alert(111)'/>"));
		// echo "<script type='text/javascript'>alert(111)</script>";
    }

    public function verifys(){
    	$verify = new Verify();
    	$verify->entry();
    }

    public function test(){
		$this->display();
    }

    public function img(){
    	//实例化图像处理类库,默认是GD库
    	$image = new Image();
    	//加载一张预处理图片
    	$image->open('./Public/head.jpg');
    	//获取图片的信息
    	$arr['width'] = $image->width();
    	$arr['height'] = $image->height();
    	$arr['type'] = $image->type();
    	$arr['mime'] = $image->mime();
    	dump($arr);

    	//截取图片部分另外保存
    	$image->crop(400,400)->save('./Public/1.jpg');
    }
}