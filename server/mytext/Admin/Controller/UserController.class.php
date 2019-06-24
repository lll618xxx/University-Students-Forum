<?php 
namespace Home\Controller;
use Think\Controller;

/*user中的U一定要大写，否则会报错*/
class UserController extends Controller{
	public function index(){
		echo 'Admin user';
	}
}
?>