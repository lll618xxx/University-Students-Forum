<?php if (!defined('THINK_PATH')) exit();?><!-- 引入模板 -->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>标题</title>
</head>
<body>
	头部文件<br/><br/>
	
	
	<!-- 模板标签和$之间不能有空格，否则不能解析 -->
	<?php echo ($user); ?>
	<!-- [$user] -->
	<br/>
	<!-- 数组的两种输出方式 -->
	<?php echo ($arr['name']); ?>
	<br/>
	<!-- 对象的两种输出方式哦 -->
	<?php echo ($obj->user); ?>
	<br/>
	<!-- 使用PHP函数Md5加密 -->
	<?php echo (md5($obj->use)); ?>
	<br/>
	<?php echo (date('Y-m-d H:i:s',$date)); ?>
	<br/>
	<?php echo ($arr['age']+getNum(222)); ?>
<br/><br/>底部文件

</body>
</html>

<?php echo ($_GET['id']); ?>