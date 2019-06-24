<?php 
namespace Api\Controller;
use Think\Controller;

/*user中的U一定要大写，否则会报错*/
class UserController extends BaseController{
	
	/**
     * 用户注册
     */
	public function register(){

		//mode: 1,意为仅验证用户名是否存在

		if (IS_POST) {	
			$data = $_POST;

			if($data['mode']){
				if(M('user')->where(array('username' => $data['username']))->find())
                	$this->ajaxReturn(array('status' => 0,'info' => '用户名被占用'));
            	else
            		$this->ajaxReturn(array('status' => 1,'info' => '用户名可注册'));
            	return;
			}


			$value['username'] 		= 	$data['username'];
			$value['phone']    		= 	$data['phone'];
			$value['password'] 		= 	md5($data['password']);
			$value['create_time']   = 	time();
			$value['nickname']   	= 	'用户'.time();
			$value['email']   		= 	'1';

			$status = M("user")->add($value);

			
			if($status)
            	$this->ajaxReturn(array('status' => $status,'info' => '注册成功'));
        	else
            	$this->ajaxReturn(array('status' => $status,'info' => '注册失败'));
		}
	}

	/**
     * 用户登录
     */
    public function login(){
		
		if (IS_POST) {	
			$data = $_POST;
			$result = M('user')->where(array('username' => $data['username']))->find();
			if ($result) {

				$map['id'] 		 =  $result['id'];
				$map['password'] =  md5($data['password']);
				$status = M('user')->where($map)->find();
			}
			if ($result && $status){

				$token = setToken($result['id'], $result['username']);
				$this->ajaxReturn(array('status' => 1, 'info' => '登录成功', 'token' => $token));
			} 
			else
				$this->ajaxReturn(array('status' => 0, 'info' => '登录失败'));
		}
	}

	/**
	 * [用户信息]
	 */
    public function userInfo(){

    	$id = encodeToken($this->token);
    	$map['id'] =  $id;

    	if (IS_GET) {
    		$result = M('user')->where($map)->field(array('id','password','create_time'), true)->find();
    		// 处理图片
    		$result['headimgurl'] = getQiniuOutUrl($result['portrait']);
    		$this->ajaxReturn(array('status' => 1, 'data' => $result));
    	}
    	if (IS_PUT) {
    		// 在put请求下 $_PUT(返回NULL) $_POST{返回[])
    		parse_str(file_get_contents('php://input'), $data);
    		$status = M("user")->where($map)->save($data);
    		if ($status)   			
    			$this->ajaxReturn(array('status' => 1, 'data' => '保存成功'));
    		else
    			$this->ajaxReturn(array('status' => 0, 'data' => '保存失败'));
    	}
    }

    public function nickNameCheck(){
    	$data = $_POST;
    	if(M('user')->where(array('nickname' => $data['nickname']))->find())
        	$this->ajaxReturn(array('status' => 0,'info' => '昵称被占用'));
    	else
    		$this->ajaxReturn(array('status' => 1,'info' => '昵称可使用'));
    }

	public function deleteTest(){

		$id = I('id');
		$map['id'] = $id;
		
		$status = M("user")->where($map)->delete();
		
		if($status)
            $this->ajaxReturn(array('status' => $status,'info' => '删除成功'));
        else
            $this->ajaxReturn(array('status' => $status,'info' => '删除失败'));
	}

	public function putTest(){

		$id = I('id');
		$map['id'] = $id;
		$data['email'] = 'bbaa';

		$status = M("user")->where($map)->save($data);

		if($status)
            $this->ajaxReturn(array('status' => $status,'info' => '更新成功'));
        else
            $this->ajaxReturn(array('status' => $status,'info' => '更新失败'));
	}

	public function test(){
		$data = $_FILES['file'];
		$this->ajaxReturn(array('status' => 1, 'data' => $data ));
	}

}

?>