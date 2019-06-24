<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	$user = new \Home\Model\UserModel('user','think_','DB_CONFIG');
    	//$user = M('user','think_','DB_CONFIG');
    
    	var_dump($user->where('id=1')->select());
    }

    public function model(){
    	$User = new \Home\Model\UserModel();
    	//$user = M('user','think_','DB_CONFIG');
    	//$user = M();
    	//var_dump($user->where('id=1')->select());
    }
}