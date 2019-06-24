<?php 
use \Firebase\JWT\JWT;
require 'vendor/autoload.php';

    // 定义JWT密钥
    const KEY = '1gHuiop975cdashyex9Ud23ldsvm2Xq';

    /**
    * [使用jwt签发token]
    * @param  integer $id 		  用户ID
    * @param  string  $username  用户昵称 
    * @return string  			  jwt(token)
    */
    function setToken($id, $username){
        $nowtime = time();
        $token = [
            'iss' => 'http://www.helloweba.net', //签发者
            'aud' => 'http://www.helloweba.net', //jwt所面向的用户
            'iat' => $nowtime, //签发时间
            'nbf' => $nowtime + 10, //在什么时间之后该jwt才可用
            'exp' => $nowtime + 3600*24*3, //过期时间-10min
            'data' => [
                'userid'   => $id,
                'username' => $username
            ]
        ];
        $jwt = JWT::encode($token, KEY);
        return $jwt;
    }

  /**
   * [解码token]
   * @param  string  	$token 	用户ID
   * @param  integer  $extra  用户昵称 
   * @return object  			用户数据
   */
    function encodeToken($token){
  	    try{
            JWT::$leeway = 60;
            $jwt = JWT::decode($token, KEY, ['HS256']);
            if ($jwt->exp < time()) {
				// 时间过期
                $this->ajaxReturn(array('status' => 0, 'data' => 'token过期，请重新登录'));
                exit(0);   
            }
            return $jwt->data->userid;
        }catch(Exception $e) {
		 // 解码失败
           echo(0);
            exit(0);
        }
    }

    /**
     * [获取七牛图片外链，共有空间]
     * @param  string   $key  文件名
     * @return string         图片外链
     */
    function getQiniuOutUrl($key){
        if ($key) {
            $basePath = 'http://pmyipd0cl.bkt.clouddn.com/';
            return $basePath.$key;
        }
        return '';
    }

    /**
     * [时间戳转日期]
     * @param  [string] $timestamp  [13位时间戳]
     * @return [string] $date       [yyyy-mm-dd]
     */
    function timestamp_to_date($timestamp){
        $timestamp = substr($timestamp, 0, 10);
        $date = date('Y-m-d', $timestamp);
        return $date;
    }

    /**
     * [时间戳转日期]
     * @param  [string] $timestamp  [13位时间戳]
     * @return [string] $date       [yyyy-mm-dd hh-mm-ss]
     */
    function timestamp_to_datetime($timestamp){
        $timestamp = substr($timestamp, 0, 10);
        $datetime = date('Y-m-d H:i:s', $timestamp);
        return $datetime;
    }

?>