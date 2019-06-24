<?php 	
	namespace Home\Controller;
	use Think\Controller;
	class TextController extends Controller{
		public function index(){
			//路由地址CSS样式	
			//http://tp/Text?id=%3Cspan%20style=%22color:red;font-size:70px%22%3E555&ss=%3Cdiv%3E6
			$id = I('param.id','1','strip_tags');
			echo $id;
			echo '<br/>';
			echo $_GET['id'];
			//echo($_GET['ss']);
		}
	}
 ?>