<?php 
namespace Home\Controller;
use Think\Controller;
use Home\Event\UserEvent;

/*user中的U一定要大写，否则会报错*/
class UserController extends Controller{
	public function index(){
		
		$this->assign('user','蜡笔');

		//数组输出
		$arr['name'] = 'array名字';
		$arr['age'] = 12;
		$this->assign('arr',$arr);

		//对象输出
		$obj = new \stdClass();
		$obj -> user = '对象名字';
		$this->assign('obj',$obj);

		//日期格式化
		$this->assign('date',time());

		$this->display();
		//$content = $this->fetch();
		//$this->show($content)
		
	
		//echo U();  //默认得到当前的URL

		/*
		$flag = true;
		if ($flag) {
			//参数1：提示信息，参数2，跳转地址，参数3，等待时间
			$this->success('新增成功','../user/all',6);
		}else{
			//会跳转到本页的上一页
			$this->error('新增失败');
		}
		*/
	}

	public function all(){
		echo '显示所有用户列表';
	}

	public function second(){
		$this->assign('user','蜡笔ass11');
		$this->display();	
	}

	public function urls(){
		echo U('in','ss=3');
	}

	/*
	//前置执行
	public function _before_index(){
		echo '前置方法'."<br/>";
	}

	//后置执行
	public function _after_index(){
		echo "<br/>".'后置方法';
	}
	*/

	public function test(){
		//(new UserEvent())->test();
		A('User','Event')->test();
	}
}
