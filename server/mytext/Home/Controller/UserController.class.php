<?php 
namespace Home\Controller;
use Think\Controller;
//use Think\Model;

/*user中的U一定要大写，否则会报错*/
class UserController extends Controller{
	public function index(){
		echo 'user';
	}
	public function model(){
		//创建Model基类，传递user表，think_user
		//$user = new Model('User');
		
		$user = M('User');  //M方法可以解决要use Think\Model;

		//字符串查询
		var_dump($user->where('id=1')->select());
		echo '<br/><br/>';

		//数组索引查询，，两个的时候默认是AND
		$condition['id'] = 1;
		$condition['user'] = '蜡笔小新';
		//改变AND方式
		//$condition['_logic'] = 'OR';
		var_dump($user->where($condition)->select());
		echo '<br/><br/>';

		//对象查询
		//stdClass类是PHP内置的类，可以理解为一个空类，把条件的字段作为成员保存到stdClass类里，而\stdClass前面的'\'将命名空间设置为根目录
		//使用数组查询的形式效率会更高
		$con = new \stdClass();
		$con->id = 2;
		var_dump($user->where($con)->select());
		echo '<br/><br/>';

		//$user = new Model('User','think_','mysql://root:22394463zxc@localhost/mytp');
		
		//表达式查询
		$map1['id'] = array('eq',3);   //id == 3
		dump($user->where($map1)->select());
	}
	public function create(){
		$user = M('User');
		$data['user'] = $_POST['user'];
		$data['email'] = $_POST['email'];
		$data['date'] = date('Y-m-d H:i:s');
		var_dump($user->create($data));
	}
}
