<?php 
namespace Api\Controller;
use Think\Controller;
// 引入鉴权类
use Qiniu\Auth;
use Qiniu\Storage\BucketManager;
// 引入上传类
use Qiniu\Storage\UploadManager;

require 'vendor/autoload.php';

class ToolController extends BaseController
{
	/**
	 * [获取七牛token]
	 * @return [type] [description]
	 */
	public function getToken(){
		// 需要填写你的 Access Key 和 Secret Key
		$accessKey = 'eOcVuLjLGmsYkYWm2gK53EAKgDY9QrvO8W6VBwtc';
		$secretKey = 'yk3n0nZQkjzlP_WdaYGqtnJRA3xV57VTHOEwZiEv';

		// 构建鉴权对象
		$auth = new Auth($accessKey, $secretKey);

		// 要上传的空间
		$bucket = 'lixx2';

		//自定义上传回复的凭证 返回的数据
		$returnBody = '{"k.
		ey":"$(key)","hash":"$(etag)","fsize":$(fsize),"bucket":"$(bucket)","name":"$(fname)"}';
		$policy = array(
		    'returnBody' => $returnBody,

		);
		//token过期时间
		$expires = 3600;

		// 生成上传 Token
		$token = $auth->uploadToken($bucket, null, $expires, $policy, true);
		$this->ajaxReturn(array('status' => 1, 'data' => $token));
	}

	public function qiniuServerUpload(){
		// 要上传文件的本地路径
		$filePath = $_FILES['file']['tmp_name'];
		// $this->ajaxReturn(array('status' => 1, 'data' => $filePath));
		// return;
		
		// 需要填写你的 Access Key 和 Secret Key
		$accessKey = 'eOcVuLjLGmsYkYWm2gK53EAKgDY9QrvO8W6VBwtc';
		$secretKey = 'yk3n0nZQkjzlP_WdaYGqtnJRA3xV57VTHOEwZiEv';

		// 构建鉴权对象
		$auth = new Auth($accessKey, $secretKey);

		// 要上传的空间
		$bucket = 'lixx2';

		//自定义上传回复的凭证 返回的数据
		$returnBody = '{"k.
		ey":"$(key)","hash":"$(etag)","fsize":$(fsize),"bucket":"$(bucket)","name":"$(fname)"}';
		$policy = array(
		    'returnBody' => $returnBody,

		);
		//token过期时间
		$expires = 3600;

		// 生成上传 Token
		$token = $auth->uploadToken($bucket, null, $expires, $policy, true);
		
		// 上传到七牛后保存的文件名，可拼接 
		$key = time(); 

		// 初始化 UploadManager 对象并进行文件的上传。 
		$uploadMgr = new UploadManager(); 

		// 调用 UploadManager
		//  的 putFile 方法进行文件的上传。 
		list($ret, $err) = $uploadMgr->putFile($token, $key, $filePath); 


		if ($err == NULL) { 
			$this->ajaxReturn(array('status' => 0, 'data' => $err ));
		} else { 
			$url = getQiniuOutUrl($key);
			$this->ajaxReturn(array('error' => 0, 'url' => $url));
		} 

	}


	/**
     * 服务器上传本地图片测试接口
     */
	public function other(){

		// 需要填写你的 Access Key 和 Secret Key
		$accessKey = 'eOcVuLjLGmsYkYWm2gK53EAKgDY9QrvO8W6VBwtc';
		$secretKey = 'yk3n0nZQkjzlP_WdaYGqtnJRA3xV57VTHOEwZiEj';

		// 构建鉴权对象
		$auth = new Auth($accessKey, $secretKey);

		// 要上传的空间
		$bucket = 'newxiang';

		//自定义上传回复的凭证 返回的数据
		$returnBody = '{"k.
		ey":"$(key)","hash":"$(etag)","fsize":$(fsize),"bucket":"$(bucket)","name":"$(fname)"}';
		$policy = array(
		    'returnBody' => $returnBody,

		);
		//token过期时间
		$expires = 3600;

		// 生成上传 Token
		$token = $auth->uploadToken($bucket, null, $expires, $policy, true);
		
		// // 要上传文件的本地路径
		$filePath = 'D:/图片专用/bg.jpg'; 

		// 上传到七牛后保存的文件名，可拼接 
		$key = time().'.png'; 

		// 初始化 UploadManager 对象并进行文件的上传。 
		$uploadMgr = new UploadManager(); 

		// 调用 UploadManager
		//  的 putFile 方法进行文件的上传。 
		list($ret, $err) = $uploadMgr->putFile($token, $key, $filePath); 

		// // echo "\n====> putFile result: \n"; 

		if ($err !== null) { 
			var_dump($err); 
		} else { 
			var_dump($ret); 
		} 
	}

}
 

 ?>