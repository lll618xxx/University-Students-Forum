<?php 
	return array(
		// 添加下面一行定义即可 表示在view_filter标签位置执行表单令牌检测行为。
		// 'view_filter' => array('Behavior\TokenBuild'),

		// 如果是3.2.1以上版本 需要改成
		'view_filter' => array('Behavior\TokenBuildBehavior'),
	);
 ?>