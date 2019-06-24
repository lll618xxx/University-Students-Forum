<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
       echo "Admin index";
    }
    public function text($user,$pass){
    	//TP的URL模式有四种，默认是PATHINFO模式
    	//在默认模式中。分隔符是/，我们可以在config设置
    	//http://tp.com:8082/admin.php/admin/Index/text/user/Lee/pass/123456
    	//http://tp.com:8082/admin.php/admin_Index_text_user_123_pass_22
    	
    	//第二种是普通模式
    	//http://tp.com:8082/admin.php/?m=Admin&c=index&a=text&user=lee&pass=123
    	echo "user:".$user."<br/>pass:".$pass;
    }
}